<?php

	include("../dbconfig/dbcon.php");	
		
	$timestamp = date("Y-m-d H:i:s");
	$insertCartContent = str_replace('timestamp', $timestamp, $insertCartContent);
	$insertCartContent = str_replace('quotenumber', $quoteNumber, $insertCartContent);
		
	$sql = "INSERT INTO customer_info(TimeStamp, FirstName, LastName, CompanyName, Address1, Address2, Address3, City, State, ZipCode, Phone, Email, PONumber, Comments, QuoteNumber) VALUES ('$timestamp', '$firstname', '$lastname', '$company', '$address1', '$address2', '$address3', '$city', '$state', $zipcode, '$phone', '$customerEmail', $ponumber, '$comments', $quoteNumber)";	
	$result = $getcib->query($sql);
	
	$sql = "INSERT INTO quote_cartlist(TimeStamp, ItemCode, Quantity, Price, QuoteNumber) VALUES $insertCartContent";	
	$result = $getcib->query($sql);
	
	$getcib->close();
	
?>