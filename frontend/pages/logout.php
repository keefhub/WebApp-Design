<?php

session_start();
$old_user = $_SESSION['valid_user'];
$old_id = $_SESSION['valid_id'];
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
    <h1>Log out</h1>
    <?php
        if(!empty($old_user)) {
            echo 'Logged out.<br />';
            echo 'Back to log in page <a href="homepage.php">here</a>';
        } else {
            echo 'You were not logged in, and so have not been logged out.<br />';
            echo 'Back to log in page <a href="homepage.php">here</a>';
        }
?>
</body>

</html>