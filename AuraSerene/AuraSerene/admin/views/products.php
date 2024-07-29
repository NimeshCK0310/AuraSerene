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

// Create Product
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $product = $_POST['product'];
    $category = $_POST['category'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    
    $sql = "INSERT INTO products (name, product, category, weight, price) VALUES ('$name', '$product', '$category', '$weight', '$price')";
    $conn->query($sql);
}

// Update Product
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $product = $_POST['product'];
    $category = $_POST['category'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    
    $sql = "UPDATE products SET name='$name', product='$product', category='$category', weight='$weight', price='$price' WHERE id=$id";
    $conn->query($sql);
}

// Delete Product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id=$id";
    $conn->query($sql);
}

// Fetch Products
$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px; 
            position: fixed;
            top: 0;
            left: 0;
            background-color: #009933; 
            padding-top: 20px;
        }


        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            text-align: center;
            font-size: 18px;
            color: white;
            display: block;
        }


        .sidebar a:hover {
            background-color: white;
            color: black;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            color: black;
            text-align: left;
            font-size: 25px;
        }

        .form-container {
            background-color: #fff;
            color: #333;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container form input, .form-container form textarea, .form-container form button {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container form button {
            background-color: #00b33c;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-container form button:hover {
            background-color: #00802b;
        }

        .table-container {
            background-color: #fff;
            color: #333;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .actions .edit {
            background-color: #ffc107;
            color: #fff;
            padding: 10px 20px;
        }

        .actions .delete {
            background-color: #dc3545;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .top-bar {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 15.6rem;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar input[type="text"] {
            padding: 8px;
            border: none;
            font-size: 16px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .top-bar button {
            padding: 8px 15px;
            background-color: #555;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .top-bar button:hover {
            background-color: #333;
        }

        .top-bar .icons {
            display: flex;
            align-items: center;
        }

        .top-bar .icons i {
            margin-left: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="./dashboard.php">Dashboard</a>
        <a href="./products.php">Products</a>
        <a href="./customers.php">Customers</a>
    </div>

    <div class="content">
        <div class="header">
            <h5>Product Details</h5>
        </div>

        <div class="form-container">
            <form action="products.php" method="POST">
                <input type="hidden" name="id" id="product_id">
                <input type="text" name="name" id="product_name" placeholder="Product Name" required>
                <input type="text" name="product" id="product_type" placeholder="Product type" required>
                <input type="text" name="category" id="product_category" placeholder="Product Category" required>
                <textarea name="weight" id="product_weight" placeholder="Product Weight" required></textarea>
                <input type="number" step="0.01" name="price" id="product_price" placeholder="Product Price" required>
                <button type="submit" name="create" id="create_button">Create Product</button>
                <button type="submit" name="update" id="update_button" style="display: none;">Update Product</button>
            </form>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $products->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['product'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td><?= $row['weight'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td class="actions">
                                <button class="edit" onclick="editProduct(<?= $row['id'] ?>, '<?= $row['name'] ?>', '<?= $row['weight'] ?>', <?= $row['price'] ?>)">Edit</button>
                                <a href="products.php?delete=<?= $row['id'] ?>" class="delete">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function editProduct(id, name, weight, price) {
            document.getElementById('product_id').value = id;
            document.getElementById('product_name').value = name;
            document.getElementById('product_type').value = product;
            document.getElementById('product_category').value = category;
            document.getElementById('product_weight').value = weight;
            document.getElementById('product_price').value = price;
            document.getElementById('create_button').style.display = 'none';
            document.getElementById('update_button').style.display = 'block';
        }

    </script>
</body>
</html>
