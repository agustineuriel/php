<?php
session_start();

if (isset($_POST['user_firstname'], $_POST['user_lastname'], $_POST['user_gender'], $_POST['user_contactNum'], $_POST['user_email'], $_POST['user_password'])) {
    $user_firstname = filter_input(INPUT_POST, 'user_firstname', FILTER_SANITIZE_STRING);
    $user_lastname = filter_input(INPUT_POST, 'user_lastname', FILTER_SANITIZE_STRING);
    $user_gender = filter_input(INPUT_POST, 'user_gender', FILTER_SANITIZE_STRING);
    $user_contactNum = filter_input(INPUT_POST, 'user_contactNum', FILTER_SANITIZE_NUMBER_INT);
    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
    $user_password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING);

    if (!preg_match("/^[a-zA-Z ]*$/", $user_firstname)) {
        echo "Only letters and white space allowed in first name.";
        exit();
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $user_lastname)) {
        echo "Only letters and white space allowed in last name.";
        exit();
    }

    if (!preg_match("/^[0-9]{11}$/", $user_contactNum)) {
        echo "Invalid contact number.";
        exit();
    }

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL) || strpos($user_email, '.com') !== strlen($user_email) - 4) {
        echo "Invalid email format or invalid domain.";
        exit();
    }

    if (!empty($user_firstname) && !empty($user_lastname) && !empty($user_gender) && !empty($user_contactNum) && !empty($user_email) && !empty($user_password)) {
        $connection = new mysqli('localhost', 'root', '', 'bsit2a');
        if ($connection->connect_error) {
            die('Connection Failed! : ' . $connection->connect_error);
        } else {
            
            $query = "SELECT * FROM user WHERE user_email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $user_email);
            $stmt->execute();
            $result = $stmt->get_result();
            $row_count = $result->num_rows;
            $stmt->close();

            if ($row_count > 0) {
                echo "Email address already exists.";
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
            }
        }
        $connection->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Form data not received.";
}
?>
<link rel="stylesheet" href="styles.css">
<a href="/WEBSITE/register.php"><button>Go Back</button></a>
<a href="/WEBSITE/login.php"><button>Login</button></a>