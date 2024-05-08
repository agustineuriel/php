<?php

$servername = "localhost"; 
$user_firstName = "user_firstName"; 
$user_lastName = "user_lastName";
$user_gender = "user_gender";
$user_contactNum = "user_contactNum"; 
$user_email = "user_email";
$user_password = "user_password";
$database = "user"; 

// Create da connection
$connection = new mysqli('localhost', 'root', '', 'bsit2a');

// Check da connection
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
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <title>Edit Users</title>
</head>
<body>
<body>
    
    <nav class="sidebar">
    <div class="headerlogo">
                <img class ="sidebarLogo" src="../pictures/LOGO.png" alt="logo">
                <h3 class = "padleft"> EA Street Motoshop <h3>
    </div>
    <h2>Hello, </h2> 
    <h1><?php echo $user_firstname; ?>!</h1> 
    <h2>Welcome to EA Street</h2> 
    <div>
        <a href="/WEBSITE/dashboard.php"><button class="inactive"> <img src="../pictures/dashboard.svg">Dashboard</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/categories.php"><button class="inactive"> <img src="../pictures/categories.svg">Categories</button></a>
    </div>

    <div>
        <a href="/WEBSITE/products/products.php"><button class="inactive"> <img src="../pictures/products.svg">Products</button></a>
    </div>

    <div>
        <a href="/WEBSITE/users/users.php"><button class="active"> <img src="../pictures/users.svg">Users</button></a>
    </div>
    <div>
        <a href="/WEBSITE/login.php"><button class="inactive"> <img src="../pictures/logout.svg">Log Out</button></a>
    </div>
   </div>
    </nav>
    <div class="content">
        <h1 class="header">Edit User</h1>

    <?php
    // Retrieve user details based on ID passed in URL
    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];
        $query = "SELECT * FROM user WHERE user_id = $user_id";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
    ?>
    <form action="update_users.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
        <label>First Name:</label>
        <input type="text" name="user_firstname" value="<?php echo $user['user_firstName']; ?>" required>
        <label>Last Name:</label>
        <input type="text" name="user_lastname" value="<?php echo $user['user_lastName']; ?>" required>
        <label>Gender:</label>
        <input type="text" name="user_gender" value="<?php echo $user['user_gender']; ?>" required>
        <label>Contact Number:</label>
        <input type="text" name="user_contactNum" value="<?php echo $user['user_contactNum']; ?>" required>
        <label>Email:</label>
        <input type="email" name="user_email" value="<?php echo $user['user_email']; ?>" required>
        <label>Password:</label>
        <input type="password" name="user_password" value="<?php echo $user['user_password']; ?>" required>
        <input class="buttonSubmit" type="submit" value="Update">
    </form>

    <?php
    } else {
        echo "User ID not provided.";
    }
    ?>
     </div>
</body>
</html>
