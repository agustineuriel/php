<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="global.css">
</head>
<body >
    <div class="container">
    <div class="column">
    <img class="logo" src="FULL COVER.jpg" alt="Cover Image">
    </div>
    <div class="column">
    <form action="connect.php" method="post">
        
    <h1>Register</h1>

    <label>First Name</label>
    <input type="text" name="user_firstname" name="user_firstname" hintText="First Name" required>

    <label>Last Name</label>
    <input type="text" name="user_lastname" name="user_lastname" required>

    <label>Gender</label>
    <div class="row radio-container">
        <div class="col-md-6 ">
            <label class="radio-inline">
            <input type="radio" name="gender" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male") echo "checked"; ?> /> Male
            </label>
            <label class="radio-inline">
            <input type="radio" name="gender" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female") echo "checked"; ?> /> Female
            </label>
        </div>

    </div>
    <label>Contact Number</label>
    <input type="text" name="user_contactNum" name="user_contactNum" required>

    <label>Email</label>
    <input type="text" name="user_email" name="user_email" required>

    <label>Password</label>
    <input type="password" name="user_password" name="user_password" required>

    <input class="register" type="submit" value="Register">
    
    <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
    </div>
</div>
</body>
</html>
