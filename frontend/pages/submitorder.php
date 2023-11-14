<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve shipping information from the form
    $_SESSION['shipname'] = $_POST["name"];
    $_SESSION['shipemail'] = $_POST["emailaddress"];
    $_SESSION['shipaddress'] = $_POST["address"];
    $_SESSION['shipcity'] = $_POST["city"];
    $_SESSION['shipstate'] = $_POST["state"];
    $_SESSION['shipzip'] = $_POST["zip"];

    // Redirect to a confirmation page or perform other actions
    header("Location: payment.php");
    exit();
}
?>
