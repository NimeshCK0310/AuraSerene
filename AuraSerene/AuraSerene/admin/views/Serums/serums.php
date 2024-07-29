<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cosmeticsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">SERUMS</h2>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="price">Product Price:</label>
        <input type="text" id="price" name="price" required><br>
        
        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" required><br>
        
        <button type="submit">Add Product</button>
    </form>

    <h2>PRODUCT LIST</h2>
    <?php
    $sql = "SELECT * FROM serums";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Product Name</th><th>Price</th><th>Image</th><th>Actions</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td><img src='uploads/" . $row['image'] . "' width='100' height='100'></td>";
            echo "<td style='text-align: center;' ><a class='button update' href='update.php?id=" . $row['id'] . "'>Update</a>
                  <a class='button delete' href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found";
    }

    $conn->close();
    ?>
</body>
</html>
