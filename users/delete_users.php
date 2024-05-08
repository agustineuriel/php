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
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($connection);
    }
} else {
    echo "User ID not provided.";
}
?>
<br>
<a href="/WEBSITE/users/users.php"><button>Go Back</button></a>
