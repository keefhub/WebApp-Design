<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clothes</title>
  <link rel="stylesheet" href="./stylesheet/app.css" />
  <link rel="stylesheet" href="./stylesheet/apparel.css">
  <link rel="stylesheet" href="./stylesheet/footer.css">
</head>

<body>
  <header>
<<<<<<< HEAD
  <div class="header">
            <div class="logo">
                <a href="./homepage.php"> <img src="../components/images/logo.png" alt="Logo"></a>
            </div>
            <div class="top-bar">
                <a href="./cart.php"><img src="../components/icons/shopping-bag.png" alt="cart" /></a>
                <?php
=======
    <!-- Header content, including navigation and logo -->
    <div class="header">
      <div class="logo">
        <a href="./homepage.php"> <img src="../components/images/logo.png" alt="Logo"></a>
      </div>
      <div class="top-bar">
        <a href="./cart.php"><img src="../components/icons/shopping-bag.png" alt="cart" /></a>
        <?php
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
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
<<<<<<< HEAD

            </div>
        </div>

=======

      </div>
    </div>
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
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
        <div class="mySlides fade">
          <div class="text">30% Off Selected Items!</div>
        </div>
      </div>
      <br />

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
  </header>
  <main>
    <h2>Clothes</h2>
    <div class="container">
      <aside class="filter-bar">
        <h3>Brands</h3>
        <ul>
          <li><input class="filter" type="checkbox" name="brand" value="1"> X Clothes</li>
          <li><input class="filter" type="checkbox" name="brand" value="2"> Y Apparels</li>
          <li><input class="filter" type="checkbox" name="brand" value="3"> Z Fashion</li>
        </ul>
        <h3>Colours</h3>
        <ul>
          <li><input class="filter" type="checkbox" name="colour" value="4"> White</li>
          <li><input class="filter" type="checkbox" name="colour" value="5"> Black</li>
          <li><input class="filter" type="checkbox" name="colour" value="6"> Red</li>
          <li><input class="filter" type="checkbox" name="colour" value="7"> Green</li>
          <li><input class="filter" type="checkbox" name="colour" value="8"> Yellow</li>
          <li><input class="filter" type="checkbox" name="colour" value="9"> Blue</li>
        </ul>
      </aside>
      <section class="product-list" id="apparel-list">
<<<<<<< HEAD
      <?php
      $mysqli = new mysqli("localhost", "root", "", "webapp");

      if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
      }
      // Query to retrieve apparel data
      $query = "SELECT * FROM inventory";
=======
        <?php
// Connect to your database
$mysqli = new mysqli("localhost", "root", "", "webapp");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// Query to retrieve apparel data
$query = "SELECT * FROM inventory";
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22

$result = $mysqli->query($query);

$apparelData = array();

<<<<<<< HEAD
      while ($row = $result->fetch_assoc()) {
          $apparelData[] = $row;
      }

      $mysqli->close();

      foreach ($apparelData as $item) {
          echo '<form class="apparel-item" method="POST" action="addtocart.php" data-brand="' . $item['brandid'] . '" data-sizeS="' . $item['sizeS'] . '" data-sizeM="' . $item['sizeM'] . '" data-sizeL="' . $item['sizeL'] . '" data-colour="' . $item['colourid'] . '">';
          echo '<input type="hidden" name="product_id" value="'.$item["itemid"].'">';
          echo '<div>';
          echo '<h2>' . $item['itemname'] . '</h2>';
          echo '<a href="./productdetail.php?itemid='.$item['itemid'].'"><img class="image" src="../components/images/products/' . $item['itemid'] . '.jpeg" alt="' . $item['itemname'] .'"></a>';
          echo '<input type="hidden" class="product-quantity" name="quantity" id="quantity" value="1">';
          echo '<p class="price">$' . $item['price'] . '</p>';
          echo '<label class="product-size" for="size">Size:</label>';
          echo '<select class="product-size" id="size" name="size">';
          if ($item["sizeS"] > 0) {
            echo '<option value="S">S</option>';
          }
          if ($item["sizeM"] > 0) {
            echo '<option value="M">M</option>';
          }
          if ($item["sizeL"] > 0) {
            echo '<option value="L">L</option>';
          }
          echo '</select>';
          echo '<input type="submit" class="addcartbutton" name="additem" value="Add to Cart">';
          echo '</div>';
          echo '</form>';
      };
      ?>
=======
// Fetch the results as an associative array
while ($row = $result->fetch_assoc()) {
    $apparelData[] = $row;
}

// Close the database connection
$mysqli->close();
// Loop through the fetched data and generate HTML for each item
foreach ($apparelData as $item) {
    echo '<form class="apparel-item" method="POST" action="addtocart.php" data-brand="' . $item['brandid'] . '" data-sizeS="' . $item['sizeS'] . '" data-sizeM="' . $item['sizeM'] . '" data-sizeL="' . $item['sizeL'] . '" data-colour="' . $item['colourid'] . '">';
    echo '<input type="hidden" name="product_id" value="'.$item["itemid"].'">';
    echo '<div>';
    echo '<h2>' . $item['itemname'] . '</h2>';
    echo '<a href="./productdetail.php?itemid='.$item['itemid'].'"><img class="image" src="../components/images/products/' . $item['itemid'] . '.jpeg" alt="' . $item['itemname'] .'"></a>';
    echo '<input type="hidden" class="product-quantity" name="quantity" id="quantity" value="1">';
    echo '<p class="price">$' . $item['price'] . '</p>';
    echo '<label class="product-size" for="size">Size:</label>';
    echo '<select class="product-size" id="size" name="size">';
    if ($item["sizeS"] > 0) {
        echo '<option value="S">S</option>';
    }
    if ($item["sizeM"] > 0) {
        echo '<option value="M">M</option>';
    }
    if ($item["sizeL"] > 0) {
        echo '<option value="L">L</option>';
    }
    echo '</select>';
    echo '<input type="submit" class="addcartbutton" name="additem" value="Add to Cart">';
    echo '</div>';
    echo '</form>';
};
?>
>>>>>>> 321b338b68fc0d7c0166034facbd35e6fef0ec22
      </section>
    </div>
  </main>

  <footer>
    <div class="footer">
      <div class="footer-content">
        <p>&copy; 2023 Daryl & Keith Fashion</p>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="apparel.js"></script>
</body>

</html>