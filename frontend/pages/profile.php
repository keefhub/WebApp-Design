<?php

session_start();
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();
?>

<html>

<body>
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