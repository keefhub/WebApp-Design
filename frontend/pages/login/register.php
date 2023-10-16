<?php 
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
?>

<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h1>Registration for new account</h1>
        <?php
        echo "<p>Username: $username</p> <br />";
        echo "<p>Password: $password</p> <br />";
        echo "<p>Confirm Password: $confirm_password</p> <br />";
        if ($password === $confirm_password) {
            header("Location: ../homepage.html");
        } else {
            echo "Passwords do not match. Please try again.";
        }
        ?>
</html>