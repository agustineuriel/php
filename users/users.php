<?php

$servername = "localhost"; 
$user_firstName = "user_firstName"; 
$user_lastName = "user_lastName";
$user_gender = "user_gender";
$user_contactNum = "user_contactNum"; 
$user_email = "user_email";
$user_password = "user_password";
$database = "user"; 

// Create connection
$connection = new mysqli('localhost', 'root', '', 'bsit2a');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php


$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);

// Check if query was successful
if ($result) {
    // Check if there are any users in the database
    if (mysqli_num_rows($result) > 0) {
        // Display user info sa table
        echo "<table border='1'>";
        echo "<tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>Contact Number</th><th>Email</th><th>Password</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['user_firstName']."</td>";
            echo "<td>".$row['user_lastName']."</td>";
            echo "<td>".$row['user_gender']."</td>";
            echo "<td>".$row['user_contactNum']."</td>";
            echo "<td>".$row['user_email']."</td>";
            echo "<td>".$row['user_password']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
<br>
<a href="/WEBSITE/dashboard.php"><button>Back to Dashboard</button></a>
