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
    <title>Motocare</title>
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
   <h1 class="header">Motocare</h1>
    <div>
        <a href="/WEBSITE/categories/motocare/helmet_disinfecting_foam.php">
            <button> <img src="../../pictures/soap.jpg">Helmet Disinfecting Foam</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/brake_cleaner.php">
            <button><img src="../../pictures/brakecleaner.jpg">Brake Cleaner</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/chain_cleaner.php">
            <button><img src="../../pictures/chaincleaner.jpg">Chain Cleaner</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/chain_lube.php">
            <button><img src="../../pictures/chainlube.jpg">Chain Lube</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/motor_oil.php">
            <button><img src="../../pictures/motoroil.png">Motor Oil</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/gear_oil.php">
            <button><img src="../../pictures/gearoil.jpg">Gear Oil</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/cvt_cleaner.php">
            <button><img src="../../pictures/cvtcleaner.jpg">CVT Cleaner</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/brake_fluid.php">
            <button><img src="../../pictures/brakefluid.jpg">Brake Fluid</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/coolant.php">
            <button><img src="../../pictures/coolant.jpg">Coolant</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/motocare/oil_additives.php">
            <button><img src="../../pictures/oiladditives.png">Oil Additives</button></a>
    </div>
    </div>
</body>
</html>
