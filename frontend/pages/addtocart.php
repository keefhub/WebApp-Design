<?php

session_start();

if (isset($_SESSION['valid_user'])) {
    // Check if the product information is received from the client
    if (isset($_POST['product_id']) && isset($_POST['quantity']) && isset($_POST['size'])) {
        // Add the product to the user's shopping cart
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];

        // Check if the cart session variable already exists. If not, create one.
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Check if the product in the specified size is already in the cart
        if (isset($_SESSION['cart'][$product_id][$size])) {
            // If it's in the cart, update the quantity
            $_SESSION['cart'][$product_id][$size] += $quantity;
        } else {
            // If it's not in the cart, add it to the cart with quantity
            $_SESSION['cart'][$product_id][$size] = $quantity;
        }


        // Redirect back to the referring page
        if (isset($_SERVER['HTTP_REFERER'])) {
            echo '<script>';
            echo 'alert("Product added to the cart successfully.");';
            echo 'window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";';
            echo '</script>';
        } else {
            echo 'Product added to the cart successfully.';
        }
        exit;
    } else {
        echo 'Invalid product information.';
    }
} else {
    echo 'Please log in to add items to your cart.';
}
