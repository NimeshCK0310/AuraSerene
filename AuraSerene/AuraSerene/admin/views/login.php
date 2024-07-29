<?php
session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cosmeticsdb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if (password_verify($pass, $row['password'])) {
        $_SESSION['username'] = $user;
        echo "Login successful! Welcome, " . $user;

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid password.');</script>";
    }
} else {
    echo "<script>alert('No user found with that username.');</script>";
}

$conn->close();
?>
