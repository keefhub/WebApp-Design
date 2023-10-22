<?php

$username = $_POST['username'];
$password = $_POST['password'];
$mobileNumber = $_POST['mobileNumber'];
$email = $_POST['email'];
$addressLine1 = $_POST['addressLine1'];
$addressLine2 = $_POST['addressLine2'];

$address = $addressLine1 ." " . $addressLine2;
$password = md5($password);

$conn = new mysqli('localhost', 'root', '', 'webapp');
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
} else {
    $result = $conn->prepare("INSERT INTO profile (`username`, `password`, `email`, `mobileNumber`, `address`) VALUES (?, ?, ?, ?, ?)");
    $result->bind_param("sssis", $username, $password, $email, $mobileNumber, $address);
    $result->execute();
    echo "Registration successfully...";
    $result->close();
    $conn->close();
}
