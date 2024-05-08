<?php
$connection = new mysqli('localhost', 'root', '', 'bsit2a');

if ($connection->connect_error) {
    die('Connection Failed! : '. $connection->connect_error);
}

$type = 'Oil Additives'; 
$sql = "SELECT * FROM products WHERE product_type = '$type'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
   ?>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Patient Name</th>
                        <th>Product Brand</th>
                        <th>Product Category</th>
                        <th>Product Type</th>
                        <th>Product Capital</th>
                        <th>Product Selling Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['product_id'];?></td>
                            <td><?php echo $row['product_name'];?></td>
                            <td><?php echo $row['product_brand'];?></td>
                            <td><?php echo $row['product_category'];?></td>
                            <td><?php echo $row['product_type'];?></td>
                            <td><?php echo $row['product_capital'];?></td>
                            <td><?php echo $row['product_selling_price'];?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
} else {
    echo "<p>No products found in the '$type' category.</p>";
}

$connection->close();
?>

<link rel="stylesheet" href="styles.css">
<br><br>
<a href="/WEBSITE/categories/motocare/motocare.php"><button>Go Back</button></a>
<a href="/WEBSITE/dashboard.php"><button>Back to Dashboard</button></a>

</body>
</html>