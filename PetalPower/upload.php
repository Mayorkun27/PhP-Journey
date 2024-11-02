<?php

include_once "connect.php";

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input data from the request
    $id = $_POST["id"];
    $category = $_POST["category"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // Check if the 'image' key exists in $_FILES
    if (!isset($_FILES["image"])) {
        echo json_encode(["status" => 400, "message" => "Image file is required"]);
        exit; // Stop further execution
    }

    $tmp_file = $_FILES["image"];

    // Validate required fields
    if (empty($id) || empty($category) || empty($name) || empty($description) || empty($price) || empty($tmp_file['name'])) {
        echo json_encode(["status" => 400, "message" => "All fields are required"]);
        exit; // Stop further execution
    }

    // Sanitize inputs
    $id = mysqli_real_escape_string($conn, $id);
    $category = mysqli_real_escape_string($conn, $category);
    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);
    $price = mysqli_real_escape_string($conn, $price);

    // Get the file name and path
    $perm_file = basename($tmp_file["name"]);
    $uploadPath = "Uploads/$perm_file";

    // Move the uploaded file
    if (move_uploaded_file($tmp_file["tmp_name"], $uploadPath)) {
        // Insert data into the database
        $insert = mysqli_query($conn, "INSERT INTO `add_products`(`id`, `category`, `name`, `description`, `price`, `image`) VALUES ('$id','$category','$name','$description','$price','$perm_file')");
        
        if ($insert) {
            echo json_encode(["status" => 200, "message" => "Product Uploaded Successfully"]);
        } else {
            echo json_encode(["status" => 500, "message" => "Failed to upload product"]);
        }
    } else {
        echo json_encode(["status" => 500, "message" => "Failed to move uploaded file"]);
    }
} else {
    echo json_encode(["status" => 405, "message" => "Method not allowed"]);
}

// Close the database connection
mysqli_close($conn);
?>
