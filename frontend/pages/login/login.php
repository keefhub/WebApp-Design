<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "user" && $password === "password") {
        header("Location: ../homepage.html");
        exit(); 
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>
