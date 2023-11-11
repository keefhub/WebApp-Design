<?php
session_start();
if (!isset($_SESSION['valid_user'])) {
    echo '<script>alert("Please login to access this page");</script>';
    header('Location: ./loginpage.html');
}
?>

<!DOCTYPE html>

<head>
  <title>Checkout</title>
  <link rel="stylesheet" href="./stylesheet/app.css" />
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
    </div>
    <div>
    <main>
        <h2>Your Cart</h2>
        <div class="cart-container">
            <?php

            // Connect to your database
            $mysqli = new mysqli("localhost", "root", "", "webapp");

            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }
            // Query to retrieve apparel data
            $query = "SELECT * FROM inventory";

            $result = $mysqli->query($query);

            $apparelData = array();

            // Fetch the results as an associative array
            while ($row = $result->fetch_assoc()) {
                $apparelData[] = $row;
            }

            // Close the database connection
            $mysqli->close();


            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product_id => $product_sizes) {
                foreach ($product_sizes as $size => $quantity) {
                    // Access product details and display them as needed
                    $product_name = $apparelData["$product_id"]["itemname"];
                    $product_price = $apparelData["$product_id"]["price"];

                    echo '<div class="cart-item">';
                    echo '<img class="product-image" src="../components/images/products/' . $product_id . '.jpeg" alt=" alt="' . $product_name .'">';
                    echo '<div class="product-details">';
                    echo "<h3>$product_name (Size: $size)</h3>";
                    echo "<p>Price: $$product_price</p>";
                    echo "<p>Quantity: $quantity</p>";
                    echo '<div class="quantity">';
                    echo '<button class="quantity-button" data-action="decrease">-</button>';
                    echo "<span>$quantity</span>";
                    echo '<button class="quantity-button" data-action="increase">+</button>';
                    echo '</div>';
                    echo '<button class="remove-button">Remove</button>';
                    echo '</div>';
                    echo '</div>';
                }
                }
            } else {
                echo '<p>Your cart is empty.</p>';
            }

            ?>
        </div>
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