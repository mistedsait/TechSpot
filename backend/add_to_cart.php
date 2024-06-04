<?php

require_once __DIR__ . '/rest/services/CartService.class.php';

header('Content-Type: application/json');
$json_str = file_get_contents('php://input');
$payload = json_decode($json_str, true);

$cart_service = new CartService();

try {
    // Assuming user_id is retrieved from middleware and stored in a session or similar
    session_start();
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User not authenticated");
    }
    
    $user_id = $_SESSION['user_id'];
    $cart_item = [
        'user_id' => $user_id,
        'product_id' => $payload['product_id'],
        'quantity' => $payload['quantity'] ?? 1
    ];

    $added_item = $cart_service->add_to_cart($cart_item);
    echo json_encode(['message' => 'Product added to cart successfully', 'data' => $added_item]);
} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => $e->getMessage()]);
}

?>
