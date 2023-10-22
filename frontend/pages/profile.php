<?php

$conn = new mysqli('localhost', 'root', '', 'webapp');
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$username = $_SESSION['valid_user'];
$userid = $_SESSION['valid_id'];
//connecting to db and querying every row of $username and $userid
$sql = "SELECT * FROM profile WHERE username = '$username' AND userid = '$userid'";
$result = $conn->query($sql);

if (isset($userid) && isset($username)) {
    //extracting email and address from connected db
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $address = $row['address'];
} else {
    echo "You are not logged in!";
}
$conn->close();

?>

<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="./App.css" />
    <link href="../components/footer.html" rel="import" />
    <meta charset="utf-8" />
</head>

<body>
    <div class="body">
        <div class="top-bar">
            <a href="./checkoutPage.php"><img src="../components/icons/shopping-bag.png" alt="cart" /></a>
            <?php
            if (isset($_SESSION['valid_user'])) {
                echo '<a href="profile.php">' .$_SESSION['valid_user'] . '</a>';
            } else {
                echo '<a href="./login/loginpage.html">Login</a>';
            }

?>
        </div>
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

            <body>
                <h1>Profile:</h1>
                <a href="./logout.php">Logout</a>
                <?php
    echo '<h3>username</h3>' , $username;
echo '<h3>email</h3>' , $email;
echo '<h3>address</h3>' , $address;
?>
            </body>

</html>