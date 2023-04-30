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
$locID = $_POST['id'];
$name = $_POST['name'];
$address= $_POST['address'];


// Insert the user into the database
$sql = "UPDATE locations SET name='$name', address='$address' WHERE id='$locID' ";
if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
    header("Location: setup.php");
} else {
    echo "Error updating " . $conn->error;
}
?>


