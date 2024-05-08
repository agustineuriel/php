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
    <title>Helmets</title>
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
   <h1 class="header">Helmets</h1>
    <div>
        <a href="/WEBSITE/categories/helmets/modular.php">
            <button> <img src="../../pictures/modular.jpg">Modular</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/helmets/fullface.php">
            <button> <img src="../../pictures/fullface.jpg">Full Face</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/helmets/halfface.php">
            <button> <img src="../../pictures/halfface.jpg">Half Face</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/helmets/offroad.php">
            <button>  <img src="../../pictures/offroad.jpg">Offroad</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/helmets/kids.php">
            <button> <img src="../../pictures/kids.jpg">Kids</button></a>
    </div><br>
    <div>
        <a href="/WEBSITE/categories/helmets/classic.php">
            <button> <img src="../../pictures/classic.jpg">Classic</button></a>
    </div>
    </div>
</body>
</html>
