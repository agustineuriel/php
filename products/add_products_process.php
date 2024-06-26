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

$statement = $connection->prepare("INSERT INTO products (product_id, product_name, product_brand, product_category, product_type, product_capital, product_selling_price) VALUES (?, ?, ?, ?, ?, ?, ?)");
$statement->bind_param("sssssii", $product_id, $product_name, $product_brand, $product_category, $product_type, $product_capital, $product_selling_price);

if ($statement->execute()) {
    echo "Product added successfully!";
} else {
    echo "Error adding product: " . $connection->error;
}

$statement->close();
$connection->close();
?>
<link rel="stylesheet" href="styles.css">
    <a href="/WEBSITE/products/products.php"><button>Go Back</button></a>
    <a href="/WEBSITE/products/view_products.php"><button>View Products</button></a>
    <a href="/WEBSITE/dashboard.php"><button>View Dashboard</button></a>