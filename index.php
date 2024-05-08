<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="index-style.css">
</head>
<body>

<body class="background">

    <form class="form" action="connect.php" method="post">
        
    <h2>Register</h2>

    <label>FIRST NAME:</label><br>
    <input type="text" name="user_firstname" name="user_firstname" required><br>

    <label>LAST NAME:</label><br>
    <input type="text" name="user_lastname" name="user_lastname" required><br>

    <label>GENDER:</label><br>
    <input type="text" name="user_gender" name="user_gender" required><br>

    <label>CONTACT NUMBER:</label><br>
    <input type="text" name="user_contactNum" name="user_contactNum" required><br>

    <label>EMAIL:</label><br>
    <input type="text" name="user_email" name="user_email" required><br>

    <label>PASSWORD:</label><br>
    <input type="password" name="user_password" name="user_password" required><br><br>

    <input type="submit" value="Register">
    
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>


</body>
</html>
