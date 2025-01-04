<?php

include_once "connect.php";
include_once "validatetoken.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve all headers and extract the Authorization token
    $headers = getallheaders();
    $token = isset($headers['Authorization']) ? str_replace('Bearer ', '', $headers['Authorization']) : null;

    if (!$token) {
        echo json_encode(["status" => 401, "message" => "Authorization token is required"]);
        exit();
    }

    // Validate token
    if (!isTokenValid($conn, $token)) {
        echo json_encode(["status" => 401, "message" => "Token is invalid or expired"]);
        exit();
    }

    // Fetch user details using the token
    $userQuery = mysqli_query($conn, "SELECT * FROM `petal_power_users` WHERE `token`='$token'");
    if (mysqli_num_rows($userQuery) !== 1) {
        echo json_encode(["status" => 404, "message" => "User not found"]);
        exit();
    }

    $user = mysqli_fetch_assoc($userQuery);
    $clientId = $user["id"];
    $cFullName = $user["fName"] . " " . $user["lName"];
    $cTel = $user["phoneNumber"];
    $cAddress = $user["address"];
    $cEmail = $user["email"];

    if (empty($cFullName) || empty($cTel) || empty($cAddress)) {
        echo json_encode([
            "status" => 400,
            "message" => "Incomplete user details: Ensure full name, phone number, and address are provided."
        ]);
        exit();
    }

    // Retrieve and validate cart details from POST data
    $inputData = json_decode(file_get_contents("php://input"), true);

    if (!isset($inputData['cart']) || !is_array($inputData['cart']) || empty($inputData['cart'])) {
        echo json_encode(["status" => 400, "message" => "Cart details are required and must be an array"]);
        exit();
    }

    $cart = $inputData['cart'];
    $orderId = uniqid('ORD-');
    $orderStatus = "Pending";
    $totalCost = 0;

    // Validate each product in the cart
    foreach ($cart as $cartItem) {
        if (!isset($cartItem['productId'], $cartItem['quantity']) || $cartItem['quantity'] <= 0) {
            echo json_encode(["status" => 400, "message" => "Invalid cart format or quantity for a product"]);
            exit();
        }

        $productId = mysqli_real_escape_string($conn, $cartItem['productId']);
        $quantity = (int)$cartItem['quantity'];

        $productQuery = mysqli_query($conn, "SELECT * FROM `add_products` WHERE `id`='$productId'");
        if (mysqli_num_rows($productQuery) === 0) {
            echo json_encode(["status" => 404, "message" => "Product with ID $productId not found"]);
            exit();
        }

        $product = mysqli_fetch_assoc($productQuery);

        // Check stock availability
        if ((int)$product['quantity'] < $quantity) {
            echo json_encode([
                "status" => 400,
                "message" => "Insufficient stock for product: {$product['name']}. Just {$product['quantity']} left",
            ]);
            exit();
        }

        // Calculate the cost for this product and add to total
        $productCost = (float)$product['price'] * $quantity;
        $totalCost += $productCost;

        // Reduce the stock
        $newStock = (int)$product['quantity'] - $quantity;
        mysqli_query($conn, "UPDATE `add_products` SET `quantity`='$newStock' WHERE `id`='$productId'");

        // Save order details in the database
        mysqli_query($conn, "INSERT INTO `petal_power_orders` 
            (`orderId`, `clientId`, `clientName`, `clientEmail`, `clientTel`, `clientAddress`, `prodId`, `prodName`, `prodDesc`, `prodPrice`, `prodQuan`, `prodCategory`, `orderStatus`) 
            VALUES ('$orderId', '$clientId', '$cFullName', '$cEmail', '$cTel', '$cAddress', '$productId', '{$product['name']}', '{$product['description']}', '{$product['price']}', '$quantity', '{$product['category']}', '$orderStatus')");
    }

    // Return success response
    echo json_encode([
        "status" => 200,
        "message" => "Checkout successful",
        "orderId" => $orderId,
        "totalCost" => $totalCost,
        "deliveryDetails" => [
            "clientId" => $clientId,
            "clientName" => $cFullName,
            "clientTel" => $cTel,
            "clientAddress" => $cAddress
        ]
    ]);

} else {
    echo json_encode(["status" => 405, "message" => "Invalid request method"]);
}

// Close the database connection
mysqli_close($conn);

?>
