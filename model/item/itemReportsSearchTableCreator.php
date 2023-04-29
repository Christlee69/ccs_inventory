<?php
	date_default_timezone_set('Asia/Manila');
	require_once('../../inc/config/constants.php');
	require_once('../../inc/config/db.php');
	


	$itemDetailsSearchSql = 'SELECT * FROM item';
	
	$itemDetailsSearchStatement = $conn->prepare($itemDetailsSearchSql);
	$itemDetailsSearchStatement->execute();
	
	$timezone = new DateTimeZone('Asia/Manila');
	// $strdate  = '01/18/2016 00:00 AM';
	
	//$datenow= new DateTime ();
	//$dateofitem = new DateTime ('itemdate');
	//$diff = $datenow->diff($dateofitem);
	
	//echo $diff;
	
	

	$output = '<table id="itemReportsTable" class="table table-sm table-striped table-bordered table-hover" style="width:100%">
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
		$sql = "SELECT category, suggestions FROM item";
		$result = $conn->query($sql);

		if ($row["category"] == "Computer") {
			$suggestion = "Every three to six months you should do a thorough cleaning of your entire hardware system";
		} elseif ($row["category"] == "Tool") {
			$suggestion = "Make it a habit to clean tools after each use before you return them to storage. ";
		} elseif ($row["category"] == "Office Furniture") {
				$suggestion = "Due to the fact that office furniture is used heavily on a daily basis, it can deteriorate quickly if not properly cleaned and maintained. As a general rule, a conscious effort should be made to clean and maintain office furniture on a weekly basis.";
		} elseif ($row["category"] == "Office Equipment") {
					$suggestion = "Maintaining your office equipment is a critical component of getting the most out of your investment. Keeping equipment running smoothly means that your workflows can continue uninterrupted, and your employees can complete projects on time and without any hiccups from machine malfunctions.";
				  
		} else {
			$suggestion = "No need maintenance";
		  }
		
		  // Dump the result to the "suggestions" column
		  $update_sql = "UPDATE item SET suggestions='$suggestion' WHERE category='" . $row["category"] . "'";
		  $conn->query($update_sql);


		  //QR code

		  // Step 2: Loop through data and create QR code for each row
		  
	  
	  
			

			
		
			
		
		
		
		$output .= '<tr>' .
						'<td>' . $row['productID'] . '</td>' .
						'<td>' . $row['itemNumber'] . '</td>' .
						//'<td>' . $row['itemName'] . '</td>' .
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
?>