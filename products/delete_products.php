<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Delete Product</title>
</head>
<body>
    <h2>Delete Product</h2>
    <form action="delete_products_process.php" method="post">
        <label>Product ID:</label><br>
        <input type="text" name="product_id" required><br>

        <input type="submit" value="Delete Product">
    </form>
    
<br><br>
<a href="/WEBSITE/products/products.php"><button>Go Back</button></a>
<a href="/WEBSITE/dashboard.php"><button>Back to Dashboard</button></a>
</body>
</html>
