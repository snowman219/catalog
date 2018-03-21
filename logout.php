<?php
	
	include("common/common.php");
	
	session_start();
	unset($_SESSION['CustomerID']);
	
	header("Location: ".$server_url);
	
?>