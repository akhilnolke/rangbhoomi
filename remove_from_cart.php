<?php
session_start();

if (isset($_POST['user_id'])) {
    $userIdToRemove = $_POST['user_id'];

    // Retrieve cart contents from session
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    // Find and remove the item with the specified user ID from the cart
    foreach ($cart as $key => $item) {
        if ($item['user_id'] === $userIdToRemove) {
            unset($cart[$key]);
            break;
        }
    }

    // Update the cart session variable
    $_SESSION['cart'] = $cart;

    // You can also calculate the updated cart total and other necessary data here

    // Return a success response
    echo json_encode(array('status' => 'success'));
} else {
    // Return an error response
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request'));
}
?>
