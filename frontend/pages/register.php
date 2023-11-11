<?php

session_start();
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
    $result = $conn->prepare("INSERT INTO profile (`name`, `password`, `email`, `contact_number`, `address`) VALUES (?, ?, ?, ?, ?)");
    $result->bind_param("sssis", $username, $password, $email, $mobileNumber, $address);
    if ($result->execute()) {
        // User registration successful, create a session
        $_SESSION['valid_user'] = $username;
        $_SESSION['valid_id'] = $result->insert_id; // Get the user's ID

        // Redirect to the homepage or another appropriate page
        header("Location: ./homepage.php");
        exit;
    } else {
        echo 'Error registering the user. Please try again.<br>';
    }
    $result->close();
    $conn->close();
}
