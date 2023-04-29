<?php
	session_start();
	
	unset($_SESSION['loggedIn']);
	unset($_SESSION['fullname']);
	session_destroy();
	header('Location: ../../login.php');
	exit();
?>