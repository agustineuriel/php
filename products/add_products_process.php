<?php // htmlspecialchars
session_start();
$user_firstname = htmlspecialchars($_SESSION['user_firstname']);

$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : '. $connection->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <title>Add Products</title>
</head>
<body>
<body>
    
    <nav class="sidebar">
    <div class="headerlogo">
                <img class ="sidebarLogo" src="../pictures/LOGO.png" alt="logo">
                <h3 class = "padleft"> EA Street Motoshop <h3>
    </div>
    <h2>Hello, </h2> 
    <h1><?php echo $user_firstname; ?>!</h1> 
    <h2>Welcome to EA Street</h2> 
    <div>
        <a href="/WEBSITE/dashboard.php"><button class="inactive"> <img src="../pictures/dashboard.svg">Dashboard</button></a>
    </div>
    <div>
        <a href="/WEBSITE/categories/categories.php"><button class="inactive"> <img src="../pictures/categories.svg">Categories</button></a>
    </div>

    <div>
        <a href="/WEBSITE/products/products.php"><button class="active"> <img src="../pictures/products.svg">Products</button></a>
    </div>

    <div>
        <a href="/WEBSITE/users/users.php"><button class="inactive"> <img src="../pictures/users.svg">Users</button></a>
    </div>
    <div>
        <a href="/WEBSITE/login.php"><button class="inactive"> <img src="../pictures/logout.svg">Log Out</button></a>
    </div>
   </div>
    </nav>
    <div class="content">
        <h1 class="header">Add Products</h1>
        <h2>

<?php
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_brand = $_POST['product_brand'];
$product_category = $_POST['product_category'];
$product_type = $_POST['product_type'];
$product_capital = $_POST['product_capital'];
$product_selling_price = $_POST['product_selling_price'];

$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : ' . $connection->connect_error);
}

// gina check if may ga exist na nga product id
$check_product_id_sql = "SELECT * FROM products WHERE product_id = ?";
$check_product_id_stmt = $connection->prepare($check_product_id_sql);
$check_product_id_stmt->bind_param("i", $product_id);
$check_product_id_stmt->execute();
$check_product_id_result = $check_product_id_stmt->get_result();

if ($check_product_id_result->num_rows > 0) {
    echo "Product ID already exists!";
    $check_product_id_stmt->close();
    $connection->close();
} else {
    $check_product_id_stmt->close();

    $statement = $connection->prepare("INSERT INTO products (product_id, product_name, product_brand, product_category, product_type, product_capital, product_selling_price) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $statement->bind_param("sssssii", $product_id, $product_name, $product_brand, $product_category, $product_type, $product_capital, $product_selling_price);

    if ($statement->execute()) {
        echo "Product added successfully! Click 'Products' at navigation on the side to add again. ";
    } else {
        echo "Error adding product: " . $connection->error;
    }

    $statement->close();
    $connection->close();
}
?>
</h2>
<img style ="height: 50rem" src="../pictures/cat.jpg" alt="cat">
</div>
</body>
</html>