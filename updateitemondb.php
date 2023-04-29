<?php
// Get the form data
$itemName = $_POST['itemDetailsItemName'];
$category = $_POST['itemDetailsCategory'];
$location = $_POST['itemDetailsLocation'];
$description = $_POST['itemDetailsDescription'];
$quantity = $_POST['itemDetailsQuantity'];
$unitPrice = $_POST['itemDetailsUnitPrice'];
$itemDate = $_POST['itemDetailsDate'];

// Update the database
$db = new mysqli('localhost', 'username', 'password', 'dbname');
$stmt = $db->prepare('UPDATE items SET itemName=?, category=?, itemLocation=?, description=?, quantity=?, unitPrice=?, itemDate=? WHERE productID=?');
$stmt->bind_param('ssssddsi', $itemName, $category, $location, $description, $quantity, $unitPrice, $itemDate, $_POST['productID']);
$stmt->execute();
$stmt->close();
$db->close();

// Redirect back to the item details page
header('Location: index.php?productID=' . $_POST['productID']);
exit();
?>
