<?php
    // Include the database connection
include_once "connect.php";

// Retrieve all headers
$headers = getallheaders();

// Extract the token from the Authorization header
$session_token = isset($headers['Authorization']) ? str_replace('Bearer ', '', $headers['Authorization']) : null;

// Check if the token is provided
if (!$session_token) {
    echo json_encode(["status" => 400, "message" => "No token provided"]);
    exit();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Find the token in the database
    $find_token = mysqli_query($conn, "SELECT `token` FROM `petal_power_users` WHERE `token`='$session_token'");
    $find_token_in_row = mysqli_num_rows($find_token);

    if ($find_token_in_row === 1) {
        // Remove the token and expiration
        $remove_token = mysqli_query($conn, "UPDATE `petal_power_users` SET `token`=NULL, `token_expiration`=NULL WHERE `token`='$session_token'");

        if ($remove_token) {
            echo json_encode(["status" => 200, "message" => "Token deleted successfully. User logged out!"]);
        } else {
            echo json_encode(["status" => 500, "message" => "Failed to delete token"]);
        }
    } else {
        echo json_encode(["status" => 404, "message" => "User not found"]);
    }
}

// Close the database connection
mysqli_close($conn);

?>