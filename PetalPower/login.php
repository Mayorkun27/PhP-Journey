<?php
// Include the database connection
include_once "connect.php";

// Function to generate a random token
function generateToken($length = 32) {
    return bin2hex(random_bytes($length));
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect values from the request
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email and password are provided
    if (empty($email) || empty($password)) {
        echo json_encode(["status" => 400, "message" => "All inputs are required"]);
        exit;
    }

    // Query to get the hashed password from the database
    $query_Password = mysqli_query($conn, "SELECT `password` FROM `petal_power_users` WHERE `email` = '$email'");
    $rowCount = mysqli_num_rows($query_Password);

    if ($rowCount === 1) {
        // Fetch user data
        $user = mysqli_fetch_assoc($query_Password);
        $hashed_password = $user["password"];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, generate token
            $token = generateToken();
            $expirationTime = date("Y-m-d H:i:s", strtotime("+10 minute")); // 1-hour expiration

            // Update token and expiration time in the database
            $add_token = mysqli_query($conn, "UPDATE `petal_power_users` SET `token`='$token', `token_expiration`='$expirationTime' WHERE `email`='$email'");

            if ($add_token) {
                // Return success response with the token
                echo json_encode(["status" => 200, "message" => "Login successful", "token" => $token]);
            } else {
                echo json_encode(["status" => 500, "message" => "Failed to update token"]);
            }
        } else {
            // Invalid password
            echo json_encode(["status" => 401, "message" => "Invalid credentials"]);
        }
    } else {
        // No user found with the provided email
        echo json_encode(["status" => 404, "message" => "User not found"]);
    }
}

// Close the database connection
mysqli_close($conn);

?>