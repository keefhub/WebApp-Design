<?php

session_start();
if (isset($_SESSION['valid_user'])) {
    $old_user = $_SESSION['valid_user'];
    $old_id = $_SESSION['valid_id'];
}
unset($_SESSION['valid_id']);
unset($_SESSION['valid_user']);
session_destroy();
?>

<!DOCTYPE html>

<head>
    <title>Logout</title>
    <link rel="stylesheet" href="./stylesheet/app.css" />
    <link rel="stylesheet" href="./stylesheet/logout.css" />
    <link rel="stylesheet" href="./stylesheet/footer.css" />
    <meta charset="utf-8" />
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="./homepage.php"> <img src="../components/images/logo.png" alt="Logo"></a>
        </div>


    </div>
    </div>
<<<<<<< HEAD
    <div class="body">
        <h1>Log out</h1>
        <a href="./homepage.php">Back to Home</a> <br />

        <?php
=======
    <h1>Log out</h1>
    <?php
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
        if(!empty($old_user)) {
            echo 'Logged out.<br />';
            echo 'Back to log in page <a href="homepage.php">here</a>';
        } else {
            echo 'You were not logged in, and so have not been logged out.<br />';
            echo 'Back to log in page <a href="loginpage.html">here</a>';
        }
?>
    </div>
</body>

</html>