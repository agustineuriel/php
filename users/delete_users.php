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
        <h1 class="header">Delete User</h1>
        <h2>
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

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Delete user from the database
    $query = "DELETE FROM user WHERE user_id = $user_id";
    $result = mysqli_query($connection, $query);

    if($result) {
        echo "User deleted successfully. Click 'User' at navigation on the side to continue deleting.";
    } else {
        echo "Error deleting user: " . mysqli_error($connection);
    }
} else {
    echo "User ID not provided.";
}
?>
</h2>
<img style ="height: 50rem"src="../pictures/hamster.jpg" alt="dashboard">
</div>
</body>
</html>
