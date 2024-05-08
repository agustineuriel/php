<?php

session_start();
    $_SESSION['user_firstname'] = $_POST['user_firstname'];
    $_SESSION['user_lastname'] = $_POST['user_lastname'];
    $_SESSION['user_gender'] = $_POST['user_gender'];
    $_SESSION['user_contactNum'] = $_POST['user_contactNum'];
    $_SESSION['user_email'] = $_POST['user_email'];
    $_SESSION['user_password'] = $_POST['user_password'];
    
if(isset($_POST['user_firstname'], $_POST['user_lastname'], $_POST['user_gender'], $_POST['user_contactNum'], $_POST['user_email'], $_POST['user_password'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_gender = $_POST['user_gender'];
    $user_contactNum = $_POST['user_contactNum'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if (!empty($user_firstname) && !empty($user_lastname) && !empty($user_gender) && !empty($user_contactNum) && !empty($user_email) && !empty($user_password)) {
        $connection = new mysqli('localhost', 'root', '', 'bsit2a');
        if($connection->connect_error){
            die('Connection Failed! : '.$connection->connect_error);
        } else {
            $statement = $connection->prepare("INSERT INTO user (user_firstname, user_lastname, user_gender, user_contactNum, user_email, user_password) VALUES (?, ?, ?, ?, ?, ?)");
            $statement->bind_param("ssssss", $user_firstname, $user_lastname, $user_gender, $user_contactNum, $user_email, $user_password);
            
            if ($statement->execute()) {
               
                header("Location: login.php");
                exit();
            } else {
                echo "Error occurred while registering. Please try again.";
            }
            
            $statement->close();
            $connection->close();
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Form data not received.";
}
?>
