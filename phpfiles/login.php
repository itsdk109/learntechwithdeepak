<?php
session_start();
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$dbname = 'ecommerce'; 

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $email;
        header("Location: index.html");
    } else {
        echo "<p>Invalid email or password.</p>";
    }
}
?>
