<?php

include_once "connect.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $orderStatus = mysqli_real_escape_string($conn, $_GET["orderStatus"]);
    
    if (isset($orderStatus) && strtolower($orderStatus) === "uncompleted") {
        $select_all_uncompleted_pending_orders = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `orderStatus` = '0'");
        if ($select_all_uncompleted_pending_orders) {
            $uncompleted_orders = mysqli_fetch_all($select_all_uncompleted_pending_orders, MYSQLI_ASSOC);
            echo json_encode([
                "status" => 200, 
                "message" => "All pending orders fetched successfully", 
                "data" => $uncompleted_orders
            ]);
        };
    }

    if (isset($orderStatus) && strtolower($orderStatus) === "completed") {
        $select_all_completed_orders = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `orderStatus` = '1'");
        if ($select_all_completed_orders) {
            $completed_orders = mysqli_fetch_all($select_all_completed_orders, MYSQLI_ASSOC);
            echo json_encode([
                "status" => 200, 
                "message" => "All sorted orders fetched successfully", 
                "data" => $completed_orders
            ]);
        };
    }


//     $select_all_pending_orders = mysqli_query($conn, "SELECT * FROM `petal_power_orders`");

//     if ($select_all_pending_orders) {
//         $convert_data = mysqli_fetch_all($select_all_pending_orders, MYSQLI_ASSOC);
//         echo json_encode([
//             "status" => 200, 
//             "message" => "All pending orders fetched successfully", 
//             "data" => $convert_data
//         ]);
//     } else {
//         echo json_encode(["status" => 500, "message" => "Failed to fetch all pending orders"]);
//     }
// } else {
    echo json_encode(["status" => 405, "message" => "Invalid request method"]);
}

?>