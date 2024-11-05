<?php

    include_once "connect.php";


    // Function to validate the token
    function isTokenValid($conn, $token) {
        $query_token_expiration = mysqli_query($conn, "SELECT `token_expiration` FROM `petal_power_users` WHERE `token`='$token'");
        
        if (mysqli_num_rows($query_token_expiration) === 1) {
            $result = mysqli_fetch_assoc($query_token_expiration);
            $expirationTime = $result['token_expiration'];

            // Check if the token is expired
            if (strtotime($expirationTime) > time()) {
                return true; // Token is still valid
            } else {
                // Token is expired, delete it from the database
                mysqli_query($conn, "UPDATE `petal_power_users` SET `token`=NULL, `token_expiration`=NULL WHERE `token`='$token'");
                return false; // Token has expired
            }
        }
        return false; // Token not found
    }

   // Retrieve all headers
    $headers = getallheaders();

    // Check for the Authorization header
    $token = isset($headers['Authorization']) ? str_replace('Bearer ', '', $headers['Authorization']) : null;

    if (!$token) {
        echo json_encode(["status" => 501, "message" => "No token provided",]);
        exit();
    }

    if (isTokenValid($conn, $token)) {
        echo json_encode(["status" => 200, "message" => "Token is valid"]);

        $query_user_details = mysqli_query($conn, "SELECT * FROM `petal_power_users` WHERE `token` = '$token'");
        $find_in_row = mysqli_num_rows($query_user_details);
        
        if ($find_in_row === 1) {
            $user = mysqli_fetch_assoc($query_user_details);
            echo json_encode(["status" => 200, "message" => "User details retrieved successfully", "data" => $user]);
        } else {
            echo json_encode(["status" => 404, "message" => "User not found"]);
        }        

    } else {
        echo json_encode(["status" => 401, "message" => "Token is invalid or expired"]);
    };

?>