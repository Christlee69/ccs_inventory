<?php
	$provinceNamesSql = 'SELECT * FROM provinces';
	$provinceNamesStatement = $conn->prepare($provinceNamesSql);
	$provinceNamesStatement->execute();
	
	if($provinceNamesStatement->rowCount() > 0) {
		while($row = $provinceNamesStatement->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value="' .$row['name'] . '">' . $row['name'] . '</option>';
		}
	}
	$provinceNamesStatement->closeCursor();
?>