<?php
session_start();
if (!isset($_SESSION['valid_user'])) {
    echo '<script>alert("Please login to access this page");</script>';
    header('Location: ./loginpage.html');
}
?>

<!DOCTYPE html>

<head>
  <title>Cart</title>
  <link rel="stylesheet" href="./stylesheet/app.css" />
  <link rel="stylesheet" href="./stylesheet/checkout.css" />
  <link rel="stylesheet" href="./stylesheet/footer.css" />
  <meta charset="utf-8" />
</head>

<body>
  <div class="top-bar">
    <a href="./cart.php"><img src="../components/icons/shopping-bag.png" alt="cart" /></a>
    <?php
            if (isset($_SESSION['valid_user'])) {
                echo '<div class="profile-dropdown">';
                echo '<a href="profile.php">' .$_SESSION['valid_user'] . '</a>';
                echo '<div class="profile-dropdown-content">';
                echo '<a href="./logout.php">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="./loginpage.html">Login</a>';
            }

    ?>
  </div>
  <div class="body">
    <div class="nav">
      <nav>
        <ul>
          <li><a href="./homepage.php">Home</a></li>
          <li><a href="./apparel.php">Apparel</a></li>
          <li><a href="./contact-us.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
    <div class="main-content">
    <main>
    <h2>Shipping Information</h2>
    <form action="submitorder.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email address">Email Address:</label>
        <input type="text" id="emailaddress" name="emailaddress" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="zip">ZIP Code:</label>
        <input type="number" id="zip" name="zip" required>

        <input type="submit" value="Place Order">
    </form>
    </main>
    </div>
  <footer>
    <div class="footer">
      <div class="footer-content">
        <p>&copy; 2023 Daryl & Keith Fashion</p>
      </div>
    </div>
  </footer>
</body>
</html>