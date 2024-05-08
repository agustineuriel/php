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

$statement = $connection->prepare("UPDATE products SET product_name =?, product_brand =?, product_category =?, product_type =?, product_capital =?, product_selling_price =? WHERE product_id =?");

$statement->bind_param("ssssiis", $product_name, $product_brand, $product_category, $product_type, $product_capital, $product_selling_price, $product_id);

if ($statement->execute()) {
    echo "Product updated successfully!";
} else {
    echo "Error updating product record: " . $connection->error;
}

$statement->close();
$connection->close();
?>
<link rel="stylesheet" href="styles.css">
<a href="/WEBSITE/products/products.php"><button>Go Back</button></a>
<a href="/WEBSITE/products/view_products.php"><button>View Products</button></a>
<a href="/WEBSITE/dashboard.php"><button>Back to Dashboard</button></a>