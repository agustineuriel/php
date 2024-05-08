<?php // htmlspecialchars
session_start();
$user_firstname = htmlspecialchars($_SESSION['user_firstname']);
$user_lastname = htmlspecialchars($_SESSION['user_lastname']);
$user_gender = htmlspecialchars($_SESSION['user_gender']);
$user_contactNum = htmlspecialchars($_SESSION['user_contactNum']);
$email = filter_var($_SESSION['user_email'], FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email,FILTER_VALIDATE_EMAIL);
$user_password = htmlspecialchars($_SESSION['user_password']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dashboard-style.css">
    <link rel="stylesheet" type="text/css" href="global.css">
    <title>Dashboard</title>
</head>
<body>
    
    <nav class="sidebar">
    <h2>Hello, </h2> 
    <h1><?php echo $user_firstname; ?>!</h1> 
    <h2>Welcome to the Dashboard</h2>
    <div>
        <a href="/WEBSITE/categories/categories.php"><button>Categories</button></a>
    </div>

    <div>
        <a href="/WEBSITE/products/products.php"><button>Products</button></a>
    </div>

    <div>
        <a href="/WEBSITE/users/users.php"><button>Users</button></a>
    </div>
   </div>
</nav>


</body>
</html>
