<?php

	include("common/common.php");	
	session_start();	
	if ( !isset($_SESSION['CustomerID']) ){
		
?>

<html>	
		
	<style>
		form {
			border: 3px solid #f1f1f1;
		}

		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		button {
			background-color: #0b5588;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}
		.container {
			padding: 16px;
		}

		span.psw {
			float: right;
			padding-top: 16px;
		}

		/* Change styles for span and cancel button on extra small screens */
		@media screen and (max-width: 300px) {
			span.psw {
			   display: block;
			   float: none;
			}
			.cancelbtn {
			   width: 100%;
			}
		}

		form {
			max-width: 500px;
			margin: auto;
		}
	</style>
	
	<body>
	
		<center>
			<h2>Login Form</h2>
		</center>

		<form action="login.php" method="POST">
		  <div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>
				
			<button type="submit">Login</button>
		  </div>

		  <div class="container" style="background-color:#f1f1f1">
			<button type="button" class="cancelbtn">Cancel</button>
		  </div>
		</form>

	</body>
</html>

<?php 
	}else{
		header("Location: ".$server_url."catalog.php");
	}
?>