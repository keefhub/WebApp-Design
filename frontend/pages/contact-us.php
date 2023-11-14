<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'f32ee@localhost';
    $subject = 'Contact Us Query';
    $message = "Name: $name\nContact Number: $contactNumber\nEmail: $email\nMessage:\n$message";
    $headers = 'From: f32ee@localhost' . "\r\n" . 'Reply-To: f32ee@localhost' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers, '-ff32ee@localhost');

    header('Location: thank-you.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="./stylesheet/app.css" />
  <link rel="stylesheet" href="./stylesheet/footer.css" />
  <link rel="stylesheet" href="./stylesheet/contactus.css" />
  <script src=contact-us.js defer></script>
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
      <div>
        
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
  <div class="main-content">
    <h1>Contact Us</h1>
    <p>Have questions or feedback? Please fill out the form below:</p>
    <form method="POST" action="contact-us.php" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" oninput="NameValidation()" required><br>
        <br />
        <span id="errorName" class="error"></span>
        <br />
        <label for="contactNumber">Contact Number:</label>
        <input type="tel" name="contactNumber" oninput="ContactNumberValidation()" id="contact" required><br>
        <br />
        <span id="errorContactNumber" class="error"></span>
        <br />
        <label for="email">Email:</label>
        <input type="email" name="email" oninput="EmailValidation()" id="emailaddress" required><br>
        <br />
        <span id="errorEmail" class="error"></span>
        <br />
        <label for="message">Message:</label>
        <textarea name="message" rows="4" max="300" id="message" required></textarea><br>
        <br />
        <span id="errorMessage" class="error"></span>
        <br />
        <input type="submit" value="Submit">
      </form>
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
