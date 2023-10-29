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
    $mobileNumber = $row['mobileNumber'];
} else {
    echo "You are not logged in!";
}
$conn->close();

?>

<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="./App.css" />
    <link rel="stylesheet" href="./stylesheet/profile.css" />
    <link rel="stylesheet" href="./stylesheet/footer.css" />
    <link href="../components/footer.html" rel="import" />
    <meta charset="utf-8" />
</head>

<body>
    <div class="body">
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
                <div class="main-content">
                    <div class="profile">
                        <?php
echo '<div class="username">';
echo '<h3>Stay Vogue, ', $username, ' </span></h3>';
echo '</div>';
?>
                    </div>
                    <div class="tab-container">
                        <div class="tab">
                            <button class="tablinks" onclick="openTab(event, 'tab1')">User Profile</button>
                            <button class="tablinks" onclick="openTab(event, 'tab2')">My Purchases</button>
                            <button class="tablinks" onclick="openTab(event, 'tab3')">Order History</button>
                        </div>
                        <div id="tab1" class="tabcontent">

                            <?php

                                echo '<div class="profile-content">';
echo '<h3>Mobile Number: &nbsp;' , $mobileNumber, '</span></h3>';
echo '<h3>Registered Email: &nbsp;' , $email, '</span></h3>';
echo '<h3>Home Address: &nbsp;' , $address, '</span></h3>';
echo '</div>';?>
                        </div>
                        <div id="tab2" class="tabcontent">
                            <h3>Content for Tab 2</h3>
                            <p>This is the content for Tab 2.</p>
                        </div>
                        <div id="tab3" class="tabcontent">
                            <h3>Content for Tab 3</h3>
                            <p>This is the content for Tab 3.</p>
                        </div>
                    </div>
                    <script src="profile.js"></script>

                </div>
                <div class="footer">
                    <div class="footer-content">
                        <p>&copy; 2023 Daryl & Keith Fashion</p>
                    </div>
                </div>

            </body>

</html>