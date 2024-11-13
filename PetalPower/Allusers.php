<?php

include_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $select_all_in_table = mysqli_query($conn, "SELECT * FROM `petal_power_users`");

    if ($select_all_in_table) {
        $convert_data = mysqli_fetch_all($select_all_in_table, MYSQLI_ASSOC);
        echo json_encode(["status" => 200, "message" => "All Users fetched successfully", "data" => $convert_data]);
    } else {
        echo json_encode(["status" => 500, "message" => "Failed to fetch all Users"]);
    }
} else {
    echo json_encode(["status" => 405, "message" => "Invalid request method"]);
}

?>