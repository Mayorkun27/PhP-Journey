<?php

include_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET["id"])) {
        $id = mysqli_real_escape_string($conn, $_GET["id"]);

        $select_all_in_table = mysqli_query($conn, "DELETE FROM `add_products` WHERE `id` = '$id'");
        $select_row_by_row = mysqli_num_rows($select_all_in_table);

        if ($select_row_by_row > 0) {
            $convert_data = mysqli_fetch_all($select_all_in_table, MYSQLI_ASSOC);
            echo json_encode([
                "status" => 200,
                "message" => "Product with ID $id fetched successfully",
                "data" => $convert_data
            ]);
        } else {
            echo json_encode([
                "status" => 404,
                "message" => "Product with ID $id not found"
            ]);
        }
    } else {
        echo json_encode([
            "status" => 400,
            "message" => "Product ID is required"
        ]);
    }
} else {
    echo json_encode([
        "status" => 405,
        "message" => "Invalid request method"
    ]);
}

mysqli_close($conn);
?>
