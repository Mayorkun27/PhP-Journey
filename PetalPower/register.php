<?php
    // Include the database connection
    include_once "connect.php";

    // Set header to return JSON
    header('Content-Type: application/json');

    // Check if the submit button is clicked
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect values from the request
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"] ?? null; // Optional
        $address = $_POST["address"] ?? null; // Optional
        $password = $_POST["password"];
        $confPassword = $_POST["confPassword"];
        $subscribe = $_POST["subscribe"] ?? 0; // Default to 0 if not provided

        // Check for required fields
        if (empty($fName) || empty($lName) || empty($email) || empty($password) || empty($confPassword)) {
            echo json_encode(["status" => 400, "message" => "All fields are required except indicated optional!"]);
            exit;
        }

        // Check if passwords match
        if ($password !== $confPassword) {
            echo json_encode(["status" => 400, "message" => "Passwords do not match, Please check and try again."]);
            exit;
        }

        // Check if the email already exists
        $select = mysqli_query($conn, "SELECT * FROM `petal_power_users` WHERE `email` = '$email'");
        if (mysqli_num_rows($select) > 0) {
            echo json_encode(["status" => 400, "message" => "Email already exists!"]);
            exit;
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Sanitize inputs
        $fName = mysqli_real_escape_string($conn, $fName);
        $lName = mysqli_real_escape_string($conn, $lName);
        $email = mysqli_real_escape_string($conn, $email);
        $phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
        $address = mysqli_real_escape_string($conn, $address);
        $subscribe = mysqli_real_escape_string($conn, $subscribe);

        // Insert data into the database
        $insert = mysqli_query($conn, "INSERT INTO `petal_power_users`(`fName`, `lName`, `email`, `phoneNumber`, `address`, `password`, `subscribe`) VALUES ('$fName','$lName','$email','$phoneNumber','$address','$hashed_password','$subscribe')");
        
        if ($insert) {
            echo json_encode(["status" => 200, "message" => "User created successfully"]);
        } else {
            echo json_encode(["status" => 500, "message" => "Error occurred while creating new user!"]);
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>
