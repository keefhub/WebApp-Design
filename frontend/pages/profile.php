<?php

$conn = new mysqli('localhost', 'root', '', 'webapp');
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$username = $_SESSION['valid_user'];
$userid = $_SESSION['valid_id'];
//connecting to db and querying every row of $username and $userid
$sql = "SELECT * FROM profile WHERE name = '$username' AND userid = '$userid'";
$result = $conn->query($sql);

if (isset($userid) && isset($username)) {
    //extracting email and address from connected db
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $address = $row['address'];
    $mobileNumber = $row['contact_number'];
} else {
    echo "You are not logged in!";
}
$conn->close();

?>

<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="./stylesheet/app.css" />
    <link rel="stylesheet" href="./stylesheet/profile.css" />
    <link rel="stylesheet" href="./stylesheet/footer.css" />
    <link href="../components/footer.html" rel="import" />
    <meta charset="utf-8" />
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

$query2 = "SELECT * FROM orders WHERE userid = ".$_SESSION["valid_id"]."";

$result2 = $mysqli->query($query2);

$purchasedata = array();

while ($row = $result2->fetch_assoc()) {
    $purchasedata[] = $row;
}

$mysqli->close();

if (!empty($purchasedata)) {
    foreach ($purchasedata as $purchase) {

        // Access product details and display them as needed
        $product_name = $apparelData[$purchase['userid']]["itemname"];
        $product_price = $apparelData[$purchase['userid']]["price"];
        $product_id = $purchase['itemid'];
        $quantity = $purchase['quantity'];
        $size = $purchase['itemsize'];

        $subtotal = $product_price * $purchase['quantity'];

        echo '<div class="cart-item">';
        echo '<img class="product-image" src="../components/images/products/' . $product_id . '.jpeg" alt=" alt="' . $product_name .'">';
        echo '<div class="product-details">';
        echo "<h3>$product_name (Size: $size)</h3>";
        echo "<p>Price: $$product_price</p>";
        echo '<div class="quantity">';
        echo "<span>Quantity:</span><span data-product-id=\"$product_id\" data-size=\"$size\">$quantity</span>";
        echo '</div>';
        echo '<div class="subtotal-box">';
        echo '<p>Subtotal: $' . number_format($subtotal, 2) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>You have not purchased anything.</p>';
}
?>
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