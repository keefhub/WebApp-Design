<?php

$username = $_POST['username'];
$password = $_POST['password'];
$contact_number = $_POST['contactNumber'];
$email = $_POST['email'];
$addressLine1 = $_POST['addressLine1'];
$addressLine2 = $_POST['addressLine2'];

$address = $addressLine1 ." " . $addressLine2;
$password = md5($password);

$conn = new mysqli('localhost', 'root', '', 'webapp');
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
} else {
    $result = $conn->prepare("INSERT INTO profile (`username`, `password`, `email`, `mobileNumber`, `address`) VALUES (?, ?, ?, ?, ?)");
    $result->bind_param("sssis", $username, $email, $password, $contact_number, $address);
    $result->execute();
    echo "Registration successfully...";
    $result->close();
    $conn->close();
}

?>

<html>

<body>
    <?php echo("$username")?>
    <?php echo("$password")?>
    <?php echo("$contact_number")?>
    <?php echo("$email")?>
    <?php echo("$address")?>
</body>

</html>