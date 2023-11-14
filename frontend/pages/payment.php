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
  <link rel="stylesheet" href="./stylesheet/payment.css" />
  <link rel="stylesheet" href="./stylesheet/footer.css" />
  <script src="payment.js" defer></script>
  <meta charset="utf-8" />
</head>

<body>
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
        <h2>Payment Information</h2>
        <form action="process_payment.php" method="post" onsubmit="return PaymentValidation()">
          <label for="card_number">Card Number:</label>
          <input type="number" min="0" id="card_number" name="card_number" oninput="CreditCardValidation()" required>
          <br />
          <span id="errorCardNumber" class="error"></span>
          <br />

          <label for="expiry_date">Expiry Date (YYYY/MM):</label>
          <input type="text" id="expiry_date" name="expiry_date" oninput="DateValidation()" required>
          <br />
          <span id="errorDate" class="error"></span>
          <br />

          <label for="cvv">CVV:</label>
          <input type="number" min="0" id="cvv" name="cvv" oninput="CvvValidation()" required>
          <br />
          <span id="errorCvv" class="error"></span>
          <br />

          <button type="submit">Submit Payment</button>
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
    <script type="text/javascript" src="./payment.js"></script>
</body>

</html>