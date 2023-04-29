<?php
	// Connect to database
	try{
		define('DSN', 'mysql:host=127.0.0.1;dbname=ccs_inventory;charset=utf8mb4');
		$conn = new PDO(DSN, 'root', 'root');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		$errorMessage = $e->getMessage();
		echo $errorMessage;
		exit();
	}
?>