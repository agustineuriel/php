<?php
session_start();

// Unset specific session variables related to login status
unset($_SESSION['user_firstname']);
unset($_SESSION['user_lastname']);
// Add other session variables you want to unset

// Redirect the user to the login page or any other page after logout
header("location: login.php");
exit;
?>
