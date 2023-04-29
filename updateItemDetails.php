<?php

require 'dbconnection.php';
try {
  $conn = new PDO('mysql:host=127.0.0.1;dbname=ccs_inventory', 'root', 'root');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
  exit();
}


if (isset($_POST['productID'])) {
  $productID = mysqli_real_escape_string($con, $_POST['productID']);
  $itemName = mysqli_real_escape_string($con, $_POST['itemDetailsItemName']);
  $category = mysqli_real_escape_string($con, $_POST['itemDetailsCategory']);
  $itemlocation = mysqli_real_escape_string($con, $_POST['itemDetailsLocation']);
  $description = mysqli_real_escape_string($con, $_POST['itemDetailsDescription']);
  $quantity = mysqli_real_escape_string($con, $_POST['itemDetailsQuantity']);
  $unitPrice = mysqli_real_escape_string($con, $_POST['itemDetailsUnitPrice']);
  $itemdate = mysqli_real_escape_string($con, $_POST['itemDetailsDate']);

  $stockSelectSql = 'SELECT stock FROM item WHERE productID = :productID';
			$stockSelectStatement = $conn->prepare($stockSelectSql);
			$stockSelectStatement->execute(['productID' => $productID]);
			if($stockSelectStatement->rowCount() > 0) {
				$row = $stockSelectStatement->fetch(PDO::FETCH_ASSOC); 
				$initialStock = $row['stock'];
				$newStock = $initialStock + $quantity;
			} else {
				// Item is not in DB. Therefore, stop the update and quit
				$errorAlert = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Item Number does not exist in DB. Therefore, update not possible.</div>';
				$data = ['alertMessage' => $errorAlert];
				echo json_encode($data);
				exit();
			}
  // Update item details
  $query = "UPDATE item SET itemName='$itemName', category='$category', itemlocation='$itemlocation', description='$description', quantity='$quantity', unitPrice='$unitPrice', stock='$newStock', itemdate='$itemdate' WHERE productID='$productID' ";
  if(mysqli_query($con, $query)) {
    echo "Item details updated successfully. ";

    // Update number of stocks
    

    // Redirect to homepage
    header("Location: index.php");
    exit();
  } else {
    echo "Error updating item details: " . mysqli_error($con);
  }

} else {
  echo "Invalid request";
}

mysqli_close($con);

?>
