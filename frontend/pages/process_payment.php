<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "webapp");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT orderno FROM transaction";

$result = $mysqli->query($query);

$orderno = 1;

while ($row = $result->fetch_assoc()) {
    $orderno++;
}

// Collect credit card details from the form
$card_number = (int)$_POST['card_number'];
$expiry_date = (string)$_POST['expiry_date'];
$cvv = (int)$_POST['cvv'];
$userid = (int)$_SESSION['valid_id'];
$name = $_SESSION['shipname'];
$email = $_SESSION['shipemail'];
$address = $_SESSION['shipaddress'];
$city = $_SESSION['shipcity'];
$state = $_SESSION['shipstate'];
$zip = (int)$_SESSION['shipzip'];

// Insert the credit card information into the database
$sql = "INSERT INTO transaction (orderno, userid, name, emailadd, address, city, state, zip, ccno, expdate, cvv) 
VALUES ($orderno, $userid, '$name', '$email', '$address', '$city', '$state', $zip, $card_number, '$expiry_date', $cvv)";

foreach ($_SESSION['cart'] as $product_id => $product_sizes) {
    foreach ($product_sizes as $size => $quantity) {
        $sql2 = "INSERT INTO orders (orderno, userid, itemid, itemsize, quantity) VALUES ($orderno, $userid, $product_id, '$size', $quantity)";
        $mysqli->query($sql2);
        $update = "UPDATE inventory SET size$size = size$size - $quantity WHERE itemid = $product_id;";
        $mysqli->query($update);
    }
}

if ($mysqli->query($sql) === TRUE) {
    echo '<script>';
    echo 'alert("Payment complete. Your order will be shipped as soon as possible.");';
    echo 'window.location.href = "./homepage.php";';
    echo '</script>';
    unset($_SESSION['cart']);
    
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
