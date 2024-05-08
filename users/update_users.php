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

if(isset($_POST['user_id'], $_POST['user_firstname'], $_POST['user_lastname'], $_POST['user_gender'], $_POST['user_contactNum'], $_POST['user_email'], $_POST['user_password'])) {
    $user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_gender = $_POST['user_gender'];
    $user_contactNum = $_POST['user_contactNum'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // Update user in the database
    $query = "UPDATE user SET user_firstname='$user_firstname', user_lastname='$user_lastname', user_gender='$user_gender', user_contactNum='$user_contactNum', user_email='$user_email', user_password='$user_password' WHERE user_id=$user_id";
    $result = mysqli_query($connection, $query);

    if($result) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user: " . mysqli_error($connection);
    }
} else {
    echo "Form data not received.";
}
?>
<br>
<a href="/WEBSITE/users/users.php"><button>Go Back</button></a>
