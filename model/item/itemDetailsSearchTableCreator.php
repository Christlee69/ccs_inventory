<?php
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	
	$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
	
	if(!empty($searchTerm)){
		$itemDetailsSearchSql = "SELECT * FROM item WHERE itemName LIKE '%$searchTerm%'";
	} else {
		$itemDetailsSearchSql = "SELECT * FROM item";
	}
	
	$itemDetailsSearchStatement = $conn->prepare($itemDetailsSearchSql);
	$itemDetailsSearchStatement->execute();
	
	$output = '<table id="itemDetailsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
					<th>Product ID</th>
					<th>Item Number</th>
					<th>Item Name</th>
					<th>Location</th>
					<th>Stock</th>
					<th>Unit Price</th>
					<th>Category</th>
					<th>Description</th>
					<th>Date Added</th>
					<th>Recommendations</th>
					</tr>
				</thead>
				<tbody>';
	
	// Create table rows from the selected data
	while($row = $itemDetailsSearchStatement->fetch(PDO::FETCH_ASSOC)){
		
		$output .= '<tr>' .
						'<td>' . $row['productID'] . '</td>' .
						'<td>' . $row['itemNumber'] . '</td>' .
						'<td><a href="#" class="itemDetailsHover" data-toggle="popover" id="' . $row['productID'] . '">' . $row['itemName'] . '</a></td>' .
						'<td>' . $row['itemlocation'] . '</td>' .
						'<td>' . $row['stock'] . '</td>' .
						'<td>' . $row['unitPrice'] . '</td>' .
						'<td>' . $row['category'] . '</td>' .
						'<td>' . $row['description'] . '</td>' .
						'<td>' . $row['itemdate'] . '</td>' .
						'<td>' . $row['suggestions'] . '</td>' .
						'<td>
							<a href="itemedit.php?productID=' . $row['productID'] . '">Edit</a>
							<a href="deleteitem.php?productID=' . $row['productID'] . '">Delete</a>
						</td>'.
					'</tr>';
	}
	
	$itemDetailsSearchStatement->closeCursor();
	
	$output .= '</tbody>
					<tfoot>
						<tr>
						<th>Product ID</th>
						<th>Item Number</th>
						<th>Item Name</th>
						<th>Location</th>
						<th>Stock</th>
						<th>Unit Price</th>
						<th>Category</th>
						<th>Description</th>
						<th>Date Added</th>
						<th>Recommendations</th>
						</tr>
					</tfoot>
				</table>';
	echo $output;
