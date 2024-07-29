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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM serums WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    // If a new product image is uploaded
    if ($image) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE serums SET name='$name', price='$price', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE serums SET name='$name', price='$price' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2 style="text-align: center;">UPDATE</h2>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br>
        
        <label for="price">Product Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>" required><br>
        
        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image"><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
