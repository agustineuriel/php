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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
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
        <input type="text" name="user_firstname" value="<?php echo $user['user_firstName']; ?>" required><br>
        <label>Last Name:</label>
        <input type="text" name="user_lastname" value="<?php echo $user['user_lastName']; ?>" required><br>
        <label>Gender:</label>
        <input type="text" name="user_gender" value="<?php echo $user['user_gender']; ?>" required><br>
        <label>Contact Number:</label>
        <input type="text" name="user_contactNum" value="<?php echo $user['user_contactNum']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="user_email" value="<?php echo $user['user_email']; ?>" required><br>
        <label>Password:</label>
        <input type="password" name="user_password" value="<?php echo $user['user_password']; ?>" required><br>
        <input type="submit" value="Update"><br><br>
        <a href="/WEBSITE/users/users.php"><button>Go Back</button></a>
    </form>
    <?php
    } else {
        echo "User ID not provided.";
    }
    ?>
</body>
</html>
