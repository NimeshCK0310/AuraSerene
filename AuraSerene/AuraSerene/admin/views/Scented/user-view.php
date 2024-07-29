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

$sql = "SELECT * FROM scented";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 10px;
            width: calc(25% - 20px);
            box-sizing: border-box;
            padding: 15px;
            text-align: center;
        }
        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }
        .card h3 {
            margin: 15px 0 10px;
            font-size: 1.2em;
        }
        .card p {
            color: #777;
            font-size: 1em;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">SCENTED CANDLES</h2>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<img src='uploads/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>$" . $row['price'] . "</p>";
                echo "<a href='cart.php?id=" . $row['id'] . "' style='display: inline-block; padding: 10px 15px; border-radius: 5px; text-decoration: none; color: white; background-color: #28a745; font-weight: bold; text-align: center;'>Add to Cart</a>";
                echo "</div>";
            }
        } else {
            echo "No products found";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
