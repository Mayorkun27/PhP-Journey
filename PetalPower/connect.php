<?php

    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    
    $conn = mysqli_connect("localhost", "root", "", "petal_power");

    if ($conn) {
        echo "connected";
        echo json_encode(["status" => 200, "message" => "Database connection successful"]);
    } else {
        echo "Not connected";
        echo json_encode(["status" => 500, "message" => "Database connection failed"]);
    };

?>