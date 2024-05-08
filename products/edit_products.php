<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Products</title>
</head>
<body>
    <h2>Update Products</h2>
    <form action="edit_products_process.php" method="post">
        <label>Serial Number:</label><br>
        <input type="text" name="product_id" required><br>

        <label>Name:</label><br>
        <input type="text" name="product_name" required><br>
        
        <label>Brand:</label><br>
        <input type="text" name="product_brand" required><br>
        
        <label>Category:</label><br>
        <select name="product_category" id="product_category" required>
            <option value="">Select Category</option>
            <option value="Helmets">Helmets</option>
            <option value="Accessories">Accessories</option>
            <option value="Gear">Gear</option>
            <option value="Motocare">Motocare</option>
        </select><br>
        
        <label>Type:</label><br>
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
        </select><br>
        
        <label>Capital:</label><br>
        <input type="number" name="product_capital" required><br>
        
        <label>Selling Price:</label><br>
        <input type="number" name="product_selling_price" required><br>

        <input type="submit" value="Update Product">
    </form>
    
    <br><br>
    <a href="/WEBSITE/products/products.php"><button>Go Back</button></a>
    <a href="/WEBSITE/dashboard.php"><button>Back to Dashboard</button></a>

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

