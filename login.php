<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login-style.css">
</head>
<body>
   
    <form class="form2" action="login_process.php" method="post">
    <h2>Login</h2>
        <label>Email:</label><br>
        <input type="text" name="email" required><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
        <p>Don't have an account yet? <a href="theindex.php">Register here</a>.</p>
    </form>

    <br><br>
   
</body>
</html>
