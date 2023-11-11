<!DOCTYPE html>
<html>

<head>
  <title>Product - Example</title>
  <link rel='stylesheet' href='./stylesheet/app.css' />
  <link rel='stylesheet' href='./stylesheet/product.css' />
  <link rel='stylesheet' href='./stylesheet/footer.css' />

</head>

<body>
  <header>
    <!-- Header content, including navigation and logo -->
    <div class='top-bar'>
      <a href='./checkoutPage.php'><img src='../components/icons/shopping-bag.png' alt='cart' /></a>
      <?php
            if (isset($_SESSION["valid_user"])) {
                echo "<div class='profile-dropdown'>";
                echo "<a href='./profile.php'>" .$_SESSION["valid_user"] . "</a>";
                echo "<div class='profile-dropdown-content'>";
                echo "<a href='./logout.php'>Logout</a>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<a href='./loginpage.html'>Login</a>";
            }

?>
    </div>
    <div class='nav'>
      <nav>
        <ul>
          <li><a href='./homepage.php'>Home</a></li>
          <li><a href='./apparel.php'>Apparel</a></li>
          <li><a href='./contact-us.php'>Contact Us</a></li>
        </ul>
      </nav>
    </div>
    <div class='main-content'>
      <div class='slideshow-container'>
        <div class='mySlides fade'>
          <div class='text'>11.11 Sale!</div>
        </div>
        <div class='mySlides fade'>
          <div class='text'>Free delivery with min. spend $50</div>
        </div>
        <div class='mySlides fade'>
          <div class='text'>30% Off Selected Items!</div>
        </div>
      </div>
      <br />

      <script>
        let slideIndex = 0;

        function showSlides() {
          let i;
          let slides = document.getElementsByClassName('mySlides');
          let dots = document.getElementsByClassName('dot');
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
          }
          slideIndex++;
          if (slideIndex > slides.length) {
            slideIndex = 1;
          }

          slides[slideIndex - 1].style.display = 'block';

          setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        showSlides();
      </script>
  </header>

  <main>
    <div class='product-detail'>
    <?php
      // Connect to your database
      $mysqli = new mysqli('localhost', 'root', '', 'webapp');

      // Check connection
      if ($mysqli->connect_error) {
          die('Connection failed: ' . $mysqli->connect_error);
      }

      $product_id = isset($_GET["itemid"]) ? $_GET["itemid"] : null;
      
      if ($product_id) {
        // Query to retrieve product details by product ID
        $query = "SELECT * FROM inventory WHERE itemid = $product_id";
    
        $result = $mysqli->query($query);
    
        if ($result && $result->num_rows > 0) {
            $product = $result->fetch_assoc();
            // Display product details
            echo '<form method="POST" action="addtocart.php">';
            echo '<input type="hidden" name="product_id" value="'.$product_id.'">';
            echo '<h1 class="product-name">'.$product["itemname"].'</h1>';
            echo '<img src="../components/images/products/'.$product["itemid"].'.jpeg" alt="'.$product["itemname"].'">';
            echo '<p class="product-price">Price: $'.$product["price"].'</p>';
            echo '<label for="quantity" class="product-quantity">Quantity:</label>';
            echo '<input type="number" class="product-quantity" name="quantity" id="quantity" value="1" min="1">';
            echo '<div class="product-sizes">';
            echo '<label for="size">Size:</label>';
            echo '<select id="size" name="size">';
            if ($product["sizeS"] > 0) {
              echo '<option value="S">S</option>';
            }
            if ($product["sizeM"] > 0) {
              echo '<option value="M">M</option>';
            }
            if ($product["sizeL"] > 0) {
              echo '<option value="L">L</option>';
            }
            echo '</select>';
            echo '</div>';
            echo '<button class="add-to-cart-button">Add to Cart</button>';
        } else {
            echo 'Product not found.';
        }
      } else {
          echo 'Invalid product ID.';
      }

      ?>

  </main>

  <div class='footer'>
    <div class='footer-content'>
      <p>&copy; 2023 Daryl & Keith Fashion</p>
    </div>
  </div>
</body>

</html>
