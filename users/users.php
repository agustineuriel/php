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
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <title>Users</title>
</head>
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
   <h1 class="header">EA Street Motoshop Users</h1>

<?php

$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);

// Check if query was successful
if ($result) {
    // Check if there are any users in the database
    if (mysqli_num_rows($result) > 0) {
        // Display user info in a table
        echo "<table border='1'>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>Contact Number</th><th>Email</th><th>Password</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['user_firstName']."</td>";
            echo "<td>".$row['user_lastName']."</td>";
            echo "<td>".$row['user_gender']."</td>";
            echo "<td>".$row['user_contactNum']."</td>";
            echo "<td>".$row['user_email']."</td>";
            echo "<td>".$row['user_password']."</td>";
            echo "<td><a href='edit_users.php?id=".$row['user_id']."'>Edit</a> | <a href='delete_users.php?id=".$row['user_id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
</div>
</body>
</html>
