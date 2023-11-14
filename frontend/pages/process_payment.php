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

<<<<<<< HEAD
$query3 = "SELECT * FROM inventory";

$result3 = $mysqli->query($query3);

$itemData = array();

while ($row3 = $result3->fetch_assoc()) {
    $itemData[] = $row3;
}


if ($mysqli->query($sql) === TRUE) {

    $to = "$email";
    $subject = 'Order Confirmation';
    $message = 'Your order has been confirmed.' . "\n" . 'Your order:' . "\n";
    foreach ($_SESSION['cart'] as $product_id => $product_sizes) {
        foreach ($product_sizes as $size => $quantity) { 
            $product_name = $itemData["$product_id"-1]["itemname"];
            $product_price = $itemData["$product_id"-1]["price"];

            $bought = "$product_name (Size: $size) x $quantity at $$product_price/pc.\n";
            $message = $message . $bought;
        }
    }
    

    ;
    $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);


=======
if ($mysqli->query($sql) === true) {
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
    echo '<script>';
    echo 'alert("Payment complete. Your order will be shipped as soon as possible. A confirmation email has been sent to you.");';
    echo 'window.location.href = "./homepage.php";';
    echo '</script>';
    unset($_SESSION['cart']);

} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
