<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'updateQuantity') {
        if (isset($_POST['product_id']) && isset($_POST['size']) && isset($_POST['new_quantity'])) {
            $product_id = $_POST['product_id'];
            $size = $_POST['size'];
            $new_quantity = $_POST['new_quantity'];

            // Update the session cart with the new quantity
            if (isset($_SESSION['cart'][$product_id][$size])) {
                $_SESSION['cart'][$product_id][$size] = $new_quantity;
            }
        }
    }
}

?>
