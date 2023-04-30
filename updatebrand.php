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
$brandID = $_POST['id'];
$brand_name = $_POST['brand_name'];


// Insert the user into the database
$sql = "UPDATE brands SET brand_name='$brand_name' WHERE id='$brandID' ";
if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
    header("Location: setup.php");
} else {
    echo "Error updating " . $conn->error;
}
?>


