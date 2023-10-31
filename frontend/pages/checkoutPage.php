<?php
session_start();
if (!isset($_SESSION['valid_user'])) {
    echo '<script>alert("Please login to access this page");</script>';
    header('Location: ./login/loginpage.html');
}
?>

<!DOCTYPE html>

<head>
  <title>Checkout</title>
  <link rel="stylesheet" href="./App.css" />
  <link rel="stylesheet" href="./stylesheet/checkout.css" />
  <link rel="stylesheet" href="./stylesheet/footer.css" />
  <meta charset="utf-8" />
</head>

<body>
  <div class="top-bar">
    <a href="./checkoutPage.php"><img src="../components/icons/shopping-bag.png" alt="cart" /></a>
    <?php
            if (isset($_SESSION['valid_user'])) {
                echo '<div class="profile-dropdown">';
                echo '<a href="profile.php">' .$_SESSION['valid_user'] . '</a>';
                echo '<div class="profile-dropdown-content">';
                echo '<a href="./logout.php">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="./login/loginpage.html">Login</a>';
            }

?>
  </div>
  <div class="body">
    <div class="nav">
      <nav>
        <ul>
          <li><a href="./homepage.php">Home</a></li>
          <div class="dropdown">
            <li><a href="javascript:void(0)">Product Catalog</a></li>
            <div class="dropdown-content">
              <a href="./product_categories/apparel.php">Apparel</a>
              <a href="./product_categories/footwear.php">Footwear</a>
            </div>
          </div>
          <li><a href="contact-us.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
    <div class="main-content">
      <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="text">11.11 Sale!</div>
        </div>

        <div class="mySlides fade">
          <div class="text">Free delivery with min. spend $50</div>
        </div>
      </div>
      <script>
        let slideIndex = 0;

        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) {
            slideIndex = 1;
          }

          slides[slideIndex - 1].style.display = "block";

          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        showSlides();
      </script>
      <div class="checkout">
        <h1>This is the checkout page</h1>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer-content">
      <p>&copy; 2023 Daryl & Keith Fashion</p>
    </div>
  </div>
</body>