<?php

include_once "connect.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Parse the ID from query parameters or request body
    parse_str(file_get_contents("php://input"), $input);
    $id = isset($input["id"]) ? $input["id"] : null;

    if ($id) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM add_products WHERE id = ?");
        $stmt->bind_param("s", $id);

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            echo json_encode([
                "status" => 200,
                "message" => "Product with ID $id deleted successfully"
            ]);
        } else {
            echo json_encode([
                "status" => 404,
                "message" => "Product with ID $id not found or failed to delete"
            ]);
        }

        $stmt->close();
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
