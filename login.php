<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body>
<div class="container">
    <div class="column">
    <img class="logo" src="pictures/FULL COVER.jpg" alt="Cover Image">
    </div>
    <div class="column">
    <form action="login_process.php" method="post">
    <h1>Login</h1>
        <label>Email</label>
        <input type="text" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <input class="register" type="submit" value="Login">
        <p>Don't have an account yet? <a href="index.php">Register here</a></p>
    </form>
</div>
</div>
</body>
</html>
