<?php
$product_id = $_POST['product_id'];

$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : ' . $connection->connect_error);
}

$statement = $connection->prepare("DELETE FROM products WHERE product_id = ?");
$statement->bind_param("i", $product_id);

if ($statement->execute()) {
    echo "Product deleted successfully!";
} else {
    echo "Error deleting Product: " . $connection->error;
}

$statement->close();
$connection->close();
?>
<link rel="stylesheet" href="styles.css">
<a href="/WEBSITE/products/products.php"><button>Go Back</button></a>
<a href="/WEBSITE/dashboard.php"><button>Back to Dashboard</button></a>