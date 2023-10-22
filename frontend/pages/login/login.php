<?php

$conn = new mysqli('localhost', 'root', '', 'webapp');
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = md5($password);
    $sql = "SELECT * FROM profile WHERE username = '$username' AND password = '$hashedPassword'";
    $result = $conn->query($sql);
    //authenticating from sql table
    if($result->num_rows > 0) {
        $_SESSION['valid_user'] = $username;
        header("Location: ../homepage.php");
    } else {
        echo 'Could not log in. <br />';
    }
    $conn->close();
}
