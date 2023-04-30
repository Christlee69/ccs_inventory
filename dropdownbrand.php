<?php
	$brandNamesSql = 'SELECT * FROM brands';
	$brandNamesStatement = $conn->prepare($brandNamesSql);
	$brandNamesStatement->execute();
	
	if($brandNamesStatement->rowCount() > 0) {
		while($row = $brandNamesStatement->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value="' .$row['brand_name'] . '">' . $row['brand_name'] . '</option>';
		}
	}
	$brandNamesStatement->closeCursor();
?>