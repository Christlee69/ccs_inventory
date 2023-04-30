<?php
	$locationNamesSql = 'SELECT * FROM locations';
	$locationNamesStatement = $conn->prepare($locationNamesSql);
	$locationNamesStatement->execute();
	
	if($locationNamesStatement->rowCount() > 0) {
		while($row = $locationNamesStatement->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value="' .$row['name'] . '">' . $row['name'] . '</option>';
		}
	}
	$locationNamesStatement->closeCursor();
?>