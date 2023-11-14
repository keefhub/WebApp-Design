<?php
session_start();

if (isset($_POST['product_id']) && isset($_POST['size'])) {
    $product_id = $_POST['product_id'];
    $size = $_POST['size'];

    if (isset($_SESSION['cart'][$product_id][$size])) {
        unset($_SESSION['cart'][$product_id][$size]);

        if (empty($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }

        header('Location: checkoutPage.php');
        exit;
    }
}
?>