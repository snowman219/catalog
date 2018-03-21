<?php

	include("common/common.php");
	include("dbconfig/dbcon.php");

	if (!empty($_POST["psw"])) {
		$uname = $_POST['uname'];
		$psw = $_POST['psw'];
		$sql = "SELECT * FROM `regiter_user` WHERE `username` ='". $uname ."' and password = '".md5($psw) ."'";
		$result = $getcib->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				session_start();
				$_SESSION['CustomerID'] = $row['CustomerID'];			
				//header("Location: http://producthelpdesk.net/traveler/Lookup.php");
				header("Location: ".$server_url."catalog.php");
			}
		} else {		
			//header("Location: http://producthelpdesk.net/traveler/Lookup.php");
			header("Location: ".$server_url);
			exit();
		}
		$getcib->close();
	}else{
		
	}
?>