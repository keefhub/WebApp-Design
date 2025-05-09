<!DOCTYPE html>
<html>

<head>
  <title>Thank You</title>
  <link rel="stylesheet" href="./stylesheet/app.css" />
  <link rel="stylesheet" href="./stylesheet/footer.css" />
  <link rel="stylesheet" href="./stylesheet/contactus.css" />
  <meta charset="utf-8" />
</head>

<body>
  <div class="body">
    <div class="header">
      <div class="logo">
        <a href="./homepage.php"> <img src="../components/images/logo.png" alt="Logo"></a>
      </div>
      <div class="top-bar">
        <a href="./cart.php"><img src="../components/icons/shopping-bag.png" alt="cart" /></a>
        <?php
        if (isset($_SESSION['valid_user'])) {
            echo '<div class="profile-dropdown">';
            echo '<a href="profile.php">' . $_SESSION['valid_user'] . '</a>';
            echo '<div class="profile-dropdown-content">';
            echo '<a href="./logout.php">Logout</a>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<a href="./loginpage.html">Login</a>';
        }
        ?>

      </div>
    </div>

    <div class="nav">
      <nav>
        <ul>
          <li><a href="./homepage.php">Home</a></li>
          <li><a href="./apparel.php">Apparel</a></li>
          <li><a href="./contact-us.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="main-content">
    <h1>Thank You for Contacting Us!</h1>
    <p>We have received your message, and we will get back to you as soon as possible.</p>
    <p><a href="homepage.php">Back to Home</a></p>
  </div>
  <div class="footer">
    <div class="footer-content">
      <p>&copy; 2023 Daryl & Keith Fashion</p>
    </div>
  </div>
</body>

</html>