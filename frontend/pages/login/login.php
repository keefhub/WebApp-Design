<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform authentication (replace this with your actual authentication logic)
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Example: Check if username and password are valid
    if ($username === "user" && $password === "password") {
        // Successful authentication, redirect to the home page
        header("Location: ../homepage.html");
        exit(); // Make sure to exit to prevent further execution
    } else {
        // Invalid username or password, display an error message or redirect to a login error page
        echo "Invalid username or password. Please try again.";
    }
}
?>
