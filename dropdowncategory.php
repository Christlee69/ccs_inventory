<?php
	$categoriesNamesSql = 'SELECT * FROM categories';
	$categoriesNamesStatement = $conn->prepare($categoriesNamesSql);
	$categoriesNamesStatement->execute();
	
	if($categoriesNamesStatement->rowCount() > 0) {
		while($row = $categoriesNamesStatement->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value="' .$row['name'] . '">' . $row['name'] . '</option>';
		}
	}
	$categoriesNamesStatement->closeCursor();
?>