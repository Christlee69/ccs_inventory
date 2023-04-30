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
$fullname = $_POST['name'];


// Insert the user into the database

$sql = "INSERT INTO categories (name) VALUES ('$fullname')";
if ($conn->query($sql) === TRUE) {
    echo "User added successfully";
    header("Location: setup.php");
} else {
    echo "Error" . $conn->error;
}
?>