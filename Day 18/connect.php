<?php
    $conn = mysqli_connect("localhost", "root", "", "first_work");

    if ($conn) {
        echo "Connected";
    } else {
        echo "Server Error";
    };
?>