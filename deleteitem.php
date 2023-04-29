<?php
require_once('constants.php');
require_once('db.php');

if(isset($_GET['productID'])){
    $productID = $_GET['productID'];
    
    // Check if the item is in the database
    $itemSql = 'SELECT productID FROM item WHERE productID=:productID';
    $itemStatement = $conn->prepare($itemSql);
    $itemStatement->execute(['productID' => $productID]);
    
    if($itemStatement->rowCount() > 0){
        
        // Item exists in DB. Hence start the DELETE process
        $deleteItemSql = 'DELETE FROM item WHERE productID=:productID';
        $deleteItemStatement = $conn->prepare($deleteItemSql);
        $deleteItemStatement->execute(['productID' => $productID]);

        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Item deleted.</div>';
        header("Location: index.php");
        exit();
        
    } else {
        // Item does not exist, therefore, tell the user that he can't delete that item 
        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Item does not exist in DB. Therefore, can\'t delete.</div>';
        exit();
    }
}
?>
