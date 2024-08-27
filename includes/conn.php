<?php
	$con = new mysqli('localhost', 'root', '', 'lmss');

	// $con = new mysqli('localhost','u733437513_03132804Jason','03132804Jason','u733437513_lmss');
	
	if ($con->connect_error) {
	    die("Connection failed: " . $con->connect_error);
	}
	
?>