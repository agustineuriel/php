<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : '. $connection->connect_error);
}

$statement = $connection->prepare("SELECT user_firstname, user_lastname, user_gender, user_contactNum, user_email, user_password FROM user WHERE user_email =? AND user_password =?");
$statement->bind_param("ss", $email, $password);
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_firstname'] = $row['user_firstname'];
    $_SESSION['user_lastname'] = $row['user_lastname'];
    $_SESSION['user_gender'] = $row['user_gender'];
    $_SESSION['user_contactNum'] = $row['user_contactNum'];
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_password'] = $row['user_password'];

    header('Location: dashboard.php');
    exit;
} else {
    echo "Incorrect email/password!";
}