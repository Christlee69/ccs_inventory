<?php

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "ccs_inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




// Get the user details from the form
$fullname = $_POST['fullname'];
$userName = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert the user into the database
$hashedPassword = md5($password);
$sql = "INSERT INTO user (fullname, username, email, password) VALUES ('$fullname','$userName', '$email','$hashedPassword')";
if ($conn->query($sql) === TRUE) {
    echo "User added successfully";
    header("Location: admin-only.php");
} else {
    echo "Error adding user: " . $conn->error;
}
?>