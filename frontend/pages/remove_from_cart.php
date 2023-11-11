<?php
session_start();

if (isset($_POST['product_id']) && isset($_POST['size'])) {
    $product_id = $_POST['product_id'];
    $size = $_POST['size'];

    if (isset($_SESSION['cart'][$product_id][$size])) {
        unset($_SESSION['cart'][$product_id][$size]);

        // If the item is removed, you might want to redirect back to the cart page or do additional processing.
        header('Location: checkoutPage.php');
        exit;
    }
}
?>