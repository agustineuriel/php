<?php
session_start();

// Check if session variables are set
if (isset($_SESSION['user_firstname'], $_SESSION['user_lastname'], $_SESSION['user_gender'], $_SESSION['user_contactNum'], $_SESSION['user_email'], $_SESSION['user_password'])) {
    $user_firstname = htmlspecialchars($_SESSION['user_firstname']);
    $user_lastname = htmlspecialchars($_SESSION['user_lastname']);
    $user_gender = htmlspecialchars($_SESSION['user_gender']);
    $user_contactNum = htmlspecialchars($_SESSION['user_contactNum']);
    $email = filter_var($_SESSION['user_email'], FILTER_SANITIZE_EMAIL);
    $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    $user_password = htmlspecialchars($_SESSION['user_password']);
} else {
    // Redirect to login page if session variables are not set
    header('Location: login.php');
    exit;
}

$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : '. $connection->connect_error);
}

$sql = "SELECT product_category, COUNT(*) as total FROM products GROUP BY product_category";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  ?>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Number of Items</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['product_category'];?></td>
                            <td><?php echo $row['total'];?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
} else {
    echo "<p>No categories found.</p>";
}

$connection->close();
?>

<!-- HTML content -->
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
        <?php if (isset($user_firstname)) {?>
            <h1><?php echo $user_firstname;?>!</h1>
        <?php } else {?>
            <h1>Guest!</h1>
        <?php }?>
        <h2>Welcome to the Dashboard</h2>
        <div>
            <a href="/WEBSITE/categories/categories.php"><button>Categories</button></a>
        </div><br>

        <div>
            <a href="/WEBSITE/products/products.php"><button>Products</button></a>
        </div><br>

        <div>
            <a href="/WEBSITE/users/users.php"><button>Users</button></a>
        </div><br>

        <div>
            <a href="/WEBSITE/logout.php"><button>Logout</button></a>
        </div><br>

    </nav>
</body>
</html>