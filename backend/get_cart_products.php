<?php

require_once __DIR__ . '/rest/services/CartService.class.php';
require_once __DIR__ . '/rest/utils/auth.php';

header('Content-Type: application/json');

try {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User not authenticated");
    }
    
    $user_id = $_SESSION['user_id'];
    $cart_service = new CartService();
    $cart_items = $cart_service->get_cart_products($user_id);

    echo json_encode($cart_items);
} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['error' => $e->getMessage()]);
}