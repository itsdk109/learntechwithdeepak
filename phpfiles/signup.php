<?php
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$dbname = 'ecommerce'; 

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO users (username, email, password, mobile) VALUES ('$username', '$email', '$password', '$mobile')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Signup successful. <a href='login.html'>Login here</a></p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>
