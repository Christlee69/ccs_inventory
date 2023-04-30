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
$user_id = $_POST['userID'];
$fullname = $_POST['fullname'];
$userName = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert the user into the database
$sql = "UPDATE user SET fullname='$fullname', username = '$userName', email='$email', password = '$password' WHERE userID='$user_id' ";
if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
    header("Location: usermanagementdashboard.php");
} else {
    echo "Error updating user: " . $conn->error;
}
?>


