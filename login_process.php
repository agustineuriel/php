<?php
session_start();
$email= $_POST["email"];
$password = $_POST["password"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css"> 
    <title>Register</title>
</head>
<body>
    <?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = new mysqli('localhost', 'root', '', 'bsit2a');

    if ($connection->connect_error) {
        die('Connection Failed! : ' . $connection->connect_error);
    }

    $statement = $connection->prepare("SELECT user_firstname FROM user WHERE user_email = ? AND user_password = ?");
    $statement->bind_param("ss", $email, $password);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>

        <div class="center">
            <div class="headerlogo">
                <img class ="roundlogo" src="LOGO.png" alt="logo">
                <h3 class = "padleft"> EA Street Motoshop <h3>
            </div>

            <h2><?php echo "Login successful"; ?></h2>
            <h1><?php echo "Welcome, " . $row['user_firstname'] . "!"; ?></h1>
            <div class="dashboard3d">
            <img src="dashboard.png" alt="dashboard">
            </div>
            <a href="dashboard.php"><button class="viewDashboard"> View Dashboard <img class="next" src="next.png" alt="Next"></button></a>
        </div>

    <?php
    } else {
        echo "Incorrect email/password!";
    }
    ?>
</body>
</html>
