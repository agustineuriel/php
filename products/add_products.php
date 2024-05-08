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
    <title>Add Product</title>
</head>
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
        <h1 class="header">Add Product</h1>
    <form action="add_products_process.php" method="post">
        <label>Serial Number</label>
        <input type="text" name="product_id" required>

        <label>Name</label>
        <input type="text" name="product_name" required>
        
        <label>Brand</label>
        <input type="text" name="product_brand" required>

        <label>Category</label>
        <select name="product_category" id="product_category" required>
            <option value="">Select Category</option>
            <option value="Helmets">Helmets</option>
            <option value="Accessories">Accessories</option>
            <option value="Gear">Gear</option>
            <option value="Motocare">Motocare</option>
        </select>
        
        <label>Type</label>
        <select name="product_type" id="product_type" required>
            <option value="">Select Type</option>
            <?php
            // Define types for each category
            $types = array(
                "Helmets" => array("Modular", "Full Face", "Half Face", "Kids", "Classic"),
                "Accessories" => array("Horn", "Mini Driving Light", "Handle Grip", "Stickers", "Intercom", "Phone Holder"),
                "Gear" => array("Long Sleeves", "T-Shirt", "Raincoat", "Gloves", "Elbow/Knee/Shin Pads", "Motorcycle Cover", "Goggles"),
                "Motocare" => array("Helmet Disinfecting Foam", "Brake Cleaner", "Chain Cleaner", "Chain Lube", "Motor Oil", "Gear Oil", "CVT Cleaner", "Brake Fluid", "Coolant", "Oil Additives")
            );
            // Generate options for the default select box
            if(isset($_POST['product_category']) && isset($types[$_POST['product_category']])) {
                foreach ($types[$_POST['product_category']] as $type) {
                    echo "<option value='$type'>$type</option>";
                }
            }
            ?>
        </select>

        <label>Capital</label>
        <input type="number" name="product_capital" min="30" required>
        
        <label>Selling Price</label>
        <input type="number" name="product_selling_price" min="30" required>

        <input class="buttonSubmit"type="submit" value="Add Product">
    </form>

    <script>
        document.getElementById('product_category').addEventListener('change', function() {
            var category = this.value;
            var types = {
                'Helmets': ['Modular', 'Full Face', 'Half Face', 'Kids', 'Classic'],
                'Accessories': ['Horn', 'Mini Driving Light', 'Handle Grip', 'Stickers', 'Intercom', 'Phone Holder'],
                'Gear': ['Long Sleeves', 'T-Shirt', 'Raincoat', 'Gloves', 'Elbow/Knee/Shin Pads', 'Motorcycle Cover', 'Goggles'],
                'Motocare': ['Helmet Disinfecting Foam', 'Brake Cleaner', 'Chain Cleaner', 'Chain Lube', 'Motor Oil', 'Gear Oil', 'CVT Cleaner', 'Brake Fluid', 'Coolant', 'Oil Additives']
            };

            var typeSelect = document.getElementById('product_type');
            typeSelect.innerHTML = ''; // Clear existing options
            types[category].forEach(function(type) {
                var option = document.createElement('option');
                option.value = type;
                option.text = type;
                typeSelect.add(option);
            });
        });
    </script>
</body>
</html>
</div>
</body>
</html>
