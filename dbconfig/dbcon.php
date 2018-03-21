<?php

	$servername = "localhost";
	$username = "root";
	//$password = "Addon.2011";
	$password = "";
	$dbname = "helpdesk_user";

	// Create connection
	$getcib = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($getcib->connect_error) {
		die("Connection failed: " . $getcib->connect_error);
	} 

?>