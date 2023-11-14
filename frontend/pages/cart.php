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
  <link rel="stylesheet" href="./stylesheet/cart.css" />
  <link rel="stylesheet" href="./stylesheet/footer.css" />
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
            $mysqli = new mysqli("localhost", "root", "", "webapp");

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }
            
            $query = "SELECT * FROM inventory";

            $result = $mysqli->query($query);

            $apparelData = array();

            while ($row = $result->fetch_assoc()) {
                $apparelData[] = $row;
            }

            $mysqli->close();

            $totalCost = 0;

            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product_id => $product_sizes) {
                foreach ($product_sizes as $size => $quantity) {

                    $product_name = $apparelData["$product_id"-1]["itemname"];
                    $product_price = $apparelData["$product_id"-1]["price"];

                    $subtotal = $product_price * $quantity;
                    $totalCost += $subtotal; // Update total cost

                    echo '<div class="cart-item">';
                    echo '<img class="product-image" src="../components/images/products/' . $product_id . '.jpeg" alt=" alt="' . $product_name .'">';
                    echo '<div class="product-details">';
                    echo "<h3>$product_name (Size: $size)</h3>";
                    echo "<p>Price: $$product_price</p>";
                    echo '<div class="quantity">';
                    echo '<button class="quantity-button" data-action="decrease" onclick="updateQuantity('.$product_id.', \''.$size.'\', \'decrease\')">-</button>';
                    echo "<span>Quantity:</span><span data-product-id=\"$product_id\" data-size=\"$size\">$quantity</span>";
                    echo '<button class="quantity-button" data-action="increase" onclick="updateQuantity('.$product_id.', \''.$size.'\', \'increase\')">+</button>';
                    echo '</div>';
                    echo '<div class="subtotal-box">';
                    echo '<p>Subtotal: $' . number_format($subtotal, 2) . '</p>';
                    echo '</div>';
                    echo '<div>';
                    echo '<button class="remove-button" data-action="remove" data-product-id="'.$product_id.'" data-size="'.$size.'" onclick="removeItem('.$product_id.', \''.$size.'\', this)">Remove</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }}
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
        </div>
          <div>
          <div class="total-box">
            <h3>Total Cost</h3>
            <p>$<?php echo number_format($totalCost, 2); ?></p>
          </div>
            <?php
              if (empty($_SESSION['cart'])) {
                $cart = false;
              }
              else {
                $cart = true;
              }
            ?>
          <!-- Checkout button -->
          <div class="checkout-button-container">
            <button class="checkout-button" id="checkoutbtn" onclick="checkout(<?php echo $cart; ?>)">Checkout</button>
          </div>
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
  <script type="text/javascript" src="./cart.js"></script>
</body>
</html>