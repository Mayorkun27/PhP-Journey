<?php

// include_once "connect.php";
// header('Content-Type: application/json');

// if ($_SERVER['REQUEST_METHOD'] === 'GET') {

//     $orderStatus = mysqli_real_escape_string($conn, $_GET["orderStatus"]);
//     // Fetch all unsorted orders
//     if (isset($orderStatus) && !empty($orderStatus) && strtolower($orderStatus) === "uncompleted") {
//         $select_all_uncompleted_pending_orders = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `orderStatus` = '0'");
//         if ($select_all_uncompleted_pending_orders) {
//             $uncompleted_orders = mysqli_fetch_all($select_all_uncompleted_pending_orders, MYSQLI_ASSOC);
//             echo json_encode([
//                 "status" => 200, 
//                 "message" => "All pending orders fetched successfully", 
//                 "data" => $uncompleted_orders
//             ]);
//         };
//     }

//     // Fetch all sorted orders
//     if (isset($orderStatus) && !empty($orderStatus) && strtolower($orderStatus) === "completed") {
//         $select_all_completed_orders = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `orderStatus` = '1'");
//         if ($select_all_completed_orders) {
//             $completed_orders = mysqli_fetch_all($select_all_completed_orders, MYSQLI_ASSOC);
//             echo json_encode([
//                 "status" => 200, 
//                 "message" => "All sorted orders fetched successfully", 
//                 "data" => $completed_orders
//             ]);
//         };
//     }

//     // Fetch all details of a particular orders
//     $orderId = mysqli_real_escape_string($conn, $_GET["orderId"]);
//     if (isset($orderId) && !empty($orderId)) {
//         $find_details_of_an_order = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `orderId` = '$orderId'");
//         if ($find_details_of_an_order) {
//             $found_details_of_order = mysqli_fetch_all($find_details_of_an_order, MYSQLI_ASSOC);
//             echo json_encode([
//                 "status" => 200, 
//                 "message" => "All details of order with id of $orderId fetched successfully", 
//                 "data" => $found_details_of_order
//             ]);
//         };
//     }

//     // Fetch all order of a particular user
//     $userId = mysqli_real_escape_string($conn, $_GET["userId"]);
//     if (isset($userId) && !empty($userId)) {
//         $find_users_order = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `clientId` = '$userId'");
//         if (mysqli_num_rows($find_users_order)) {
//             $found_users_order = mysqli_fetch_all($find_users_order, MYSQLI_ASSOC);
//             echo json_encode([
//                 "status" => 200, 
//                 "message" => "All orders for user with id of $userId fetched successfully", 
//                 "data" => $found_users_order
//             ]);
//         };
//     }

//     // Fetch all uncompleted order of a particular user
//     $userId = mysqli_real_escape_string($conn, $_GET["userId"]);
//     if (isset($userId) && !empty($userId) && isset($orderStatus) && !empty($orderStatus) && strtolower($orderStatus) === "uncompleted") {
//         $find_users_uncompleted_order = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `clientId` = '$userId' AND `orderStatus` = '0'");
//         if (mysqli_num_rows($find_users_uncompleted_order)) {
//             $found_users_uncompleted_order = mysqli_fetch_all($find_users_uncompleted_order, MYSQLI_ASSOC);
//             echo json_encode([
//                 "status" => 200, 
//                 "message" => "All uncompleted orders for user with id of $userId fetched successfully", 
//                 "data" => $found_users_uncompleted_order
//             ]);
//         } else {
//             echo json_encode([
//                 "status" => 404,
//                 "message" => "No uncompleted orders found for user with id of $userId",
//                 "data" => []
//             ]);
//         };
//     };

//     // Fetch all completed order of a particular user
//     $userId = mysqli_real_escape_string($conn, $_GET["userId"]);
//     if (isset($userId) && !empty($userId) && isset($orderStatus) && !empty($orderStatus) && strtolower($orderStatus) === "completed") {
//         $find_users_completed_order = mysqli_query($conn, "SELECT * FROM `petal_power_orders` WHERE `clientId` = '$userId' AND `orderStatus` = '1'");
//         if (mysqli_num_rows($find_users_completed_order) > 0) {
//             $found_users_completed_order = mysqli_fetch_all($find_users_completed_order, MYSQLI_ASSOC);
//             echo json_encode([
//                 "status" => 200, 
//                 "message" => "All completed orders for user with id of $userId fetched successfully", 
//                 "data" => $found_users_completed_order
//             ]);
//         } else {
//             echo json_encode([
//                 "status" => 404,
//                 "message" => "No completed orders found for user with id of $userId",
//                 "data" => []
//             ]);
//         };
//     };

// } else {
//     echo json_encode(["status" => 405, "message" => "Invalid request method"]);
// }

?>


<?php

include_once "connect.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(["status" => 405, "message" => "Invalid request method"]);
    exit;
}

// Extract parameters
$orderStatus = $_GET["orderStatus"] ?? null;
$userId = $_GET["userId"] ?? null;
$orderId = $_GET["orderId"] ?? null;

// Validate parameters
if ($orderId && !ctype_alnum($orderId)) {
    echo json_encode(["status" => 400, "message" => "Invalid orderId"]);
    exit;
}
if ($userId && !ctype_digit($userId)) {
    echo json_encode(["status" => 400, "message" => "Invalid userId"]);
    exit;
}

// Build filters
$filters = [];
if ($orderStatus) {
    $filters[] = "`orderStatus` = '" . ($orderStatus === "completed" ? 1 : 0) . "'";
}
if ($userId) {
    $filters[] = "`clientId` = '$userId'";
}
if ($orderId) {
    $filters[] = "`orderId` = '$orderId'";
}

// Build query
$whereClause = !empty($filters) ? "WHERE " . implode(" AND ", $filters) : "";
$query = "SELECT * FROM `petal_power_orders` $whereClause";

$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode([
        "status" => 200,
        "message" => "Orders fetched successfully",
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => 404,
        "message" => "No orders found",
        "data" => []
    ]);
}

mysqli_close($conn);
?>
