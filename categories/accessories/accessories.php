<?php

$servername = "localhost"; 
$user_firstName = "user_firstName"; 
$user_lastName = "user_lastName";
$user_gender = "user_gender";
$user_contactNum = "user_contactNum"; 
$user_email = "user_email";
$user_password = "user_password";
$database = "user"; 

// Create connection
$connection = new mysqli('localhost', 'root', '', 'bsit2a');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php // htmlspecialchars
session_start();
$user_firstname = htmlspecialchars($_SESSION['user_firstname']);

$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : '. $connection->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../../css/global.css">
    <link rel="stylesheet" type="text/css" href="../../css/content.css">
    <title>Accessories</title>
</head>
<body>
    
    <nav class="sidebar">
    <div class="headerlogo">
                <img class ="sidebarLogo" src="../../pictures/LOGO.png" alt="logo">
                <h3 class = "padleft"> EA Street Motoshop <h3>
    </div>
    <h2>Hello, </h2> 
    <h1><?php echo $user_firstname; ?>!</h1> 
    <h2>Welcome to EA Street</h2> 
    <div>
        <a href="/WEBSITE/dashboard.php"><button class="inactive"> <img src="../../pictures/dashboard.svg">Dashboard</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/categories.php"><button class="active"> <img src="../../pictures/categories.svg">Categories</button></a>
    </div>

    <div>
        <a href="/WEBSITE/products/products.php"><button class="inactive"> <img src="../../pictures/products.svg">Products</button></a>
    </div>

    <div>
        <a href="/WEBSITE/users/users.php"><button class="inactive"> <img src="../../pictures/users.svg">Users</button></a>
    </div>
    <div>
        <a href="/WEBSITE/login.php"><button class="inactive"> <img src="../../pictures/logout.svg">Log Out</button></a>
    </div>
   </div>
</nav>
   <div class="content">
   <h1 class="header">Accessories</h1>
    <div>
        <a href="/WEBSITE/categories/accessories/horn.php">
            <button><img src="../../pictures/horn.jpg">Horn</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/accessories/mini_driving_light.php">
            <button><img src="../../pictures/minidrivinglight.jpg">Mini Driving Light</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/accessories/handle_grip.php">
            <button> <img src="../../pictures/handlegrip.jpg">Handle Grip</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/accessories/stickers.php">
            <button><img src="../../pictures/stickers.jpg">Stickers</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/accessories/intercom.php">
            <button><img src="../../pictures/intercom.jpg">Intercom</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/accessories/phone_holder.php">
            <button><img src="../../pictures/phoneholder.jpg">Phone Holder</button></a>
            </div>
    </div>
</body>
</html>
