<?php

include_once "connect.php";
include_once "validatetoken.php";
// rm -rf git

// Retrieve all headers
$headers = getallheaders();

// Check for the Authorization header
$token = isset($headers['Authorization']) ? str_replace('Bearer ', '', $headers['Authorization']) : null;

if (!$token) {
    echo json_encode(["status" => 501, "message" => "No token provided"]);
    exit();
}

if (isTokenValid($conn, $token)) {
    // Token is valid
    $query_user_details = mysqli_query($conn, "SELECT * FROM `petal_power_users` WHERE `token` = '$token'");
    $find_in_row = mysqli_num_rows($query_user_details);

    if ($find_in_row === 1) {
        $user = mysqli_fetch_assoc($query_user_details);
        
        // Return user details in the response
        echo json_encode([
            "status" => 200,
            "message" => "User details retrieved successfully",
            "data" => $user
        ]);
    } else {
        echo json_encode(["status" => 404, "message" => "User not found"]);
    }
} else {
    // Token is invalid or expired
    echo json_encode(["status" => 401, "message" => "Token is invalid or expired"]);
}

// Close the database connection
mysqli_close($conn);

?>
