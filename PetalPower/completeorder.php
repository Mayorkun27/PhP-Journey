<?php

    include_once "connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET["orderId"])) {
            $orderId = mysqli_real_escape_string($conn, $_GET["orderId"]);
    
            // Check if the order exists before attempting to update
            $check_order_exists = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `orderId` = '$orderId'");

            if (mysqli_num_rows($check_order_exists) > 0) {
                // Update the order status
                $update_order_status = mysqli_query($conn, "UPDATE `petal_power_orders` SET `orderStatus`='1' WHERE `orderId` = '$orderId'");

                if ($update_order_status) {
                    echo json_encode([
                        "status" => 200,
                        "message" => "Order with Id $orderId completed successfully",
                    ]);
                } else {
                    echo json_encode([
                        "status" => 500,
                        "message" => "Failed to update order status. Please try again.",
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => 404,
                    "message" => "Order with Id $orderId not found",
                ]);
            }
        } else {
            echo json_encode([
                "status" => 400,
                "message" => "Order Id is required",
            ]);
        }
    } else {
        echo json_encode([
            "status" => 405,
            "message" => "Invalid request method",
        ]);
    }

    mysqli_close($conn);

?>
