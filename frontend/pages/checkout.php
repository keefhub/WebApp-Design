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
  <script src="checkout.js" defer></script>
  <meta charset="utf-8" />
</head>

<body>
<<<<<<< HEAD
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

=======
  </div>
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
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
    <div class="main-content">
      <main>
        <h2>Shipping Information</h2>
        <form action="submitorder.php" method="post" onsubmit="return validateForm()">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" oninput="NameValidation()" required>
          <br />
          <span id="errorName" class="error"></span>
          <br />

          <label for="email address">Email Address:</label>
          <input type="text" id="emailaddress" name="emailaddress" oninput="EmailValidation()" required>
          <br />
          <span id="errorEmail" class="error"></span>
          <br />

          <label for="address">Address:</label>
          <input type="text" id="address" name="address" required>

          <label for="city">City:</label>
          <input type="text" id="city" name="city" oninput="CityValidation()" required>
          <br />
          <span id="errorCity" class="error"></span>
          <br />

          <label for="state">State:</label>
          <input type="text" id="state" name="state" oninput="StateValidation()" required>
          <br />
          <span id="errorState" class="error"></span>
          <br />

          <label for="zip">ZIP Code:</label>
<<<<<<< HEAD
          <input type="number" min="0" id="zip" name="zip" oninput="ZipCodeValidation()" required>
=======
          <input type="number" id="zip" name="zip" oninput="ZipCodeValidation()" required>
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
          <br />
          <span id="errorZipCode" class="error"></span>
          <br />

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