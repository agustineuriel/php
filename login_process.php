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
    <link rel="stylesheet" href="styles.css"> 
    <title>Register</title>
</head>

<body class="background">

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
        <div class="content">
            <h4><?php echo "Login successful!"; ?></h4>
            <h5><?php echo "Welcome, " . $row['user_firstname'] . "!"; ?></h5>
            <a href="dashboard.php"><button class="button2">View Dashboard</button></a>
        </div>

    <?php
    } else {
        echo "Incorrect email/password!";
    }
    ?>

<link rel="stylesheet" href="styles.css">

</body>
</html>
