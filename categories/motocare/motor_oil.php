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
    <title>Motocare - Motor Oil</title>
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
   <h1 class="header">Motocare - Motor Oil</h1>
<?php
$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : '. $connection->connect_error);
}

$type = 'Motor Oil'; 
$sql = "SELECT * FROM products WHERE product_type = '$type'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
   ?>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Brand</th>
                        <th>Product Category</th>
                        <th>Product Type</th>
                        <th>Product Capital</th>
                        <th>Product Selling Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['product_id'];?></td>
                            <td><?php echo $row['product_name'];?></td>
                            <td><?php echo $row['product_brand'];?></td>
                            <td><?php echo $row['product_category'];?></td>
                            <td><?php echo $row['product_type'];?></td>
                            <td><?php echo $row['product_capital'];?></td>
                            <td><?php echo $row['product_selling_price'];?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
} else {
    echo "<p>No products found in the '$type' category.</p>";
}

$connection->close();
?>
</div>

</body>
</html>