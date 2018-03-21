<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="all,follow">
		<meta name="googlebot" content="index,follow,snippet,archive">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Simple Catalog">
		<meta name="author" content="Catalog">
		<meta name="keywords" content="">
		<title>Catalog</title>

		<meta name="keywords" content="">

		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>		
		<!-- styles -->
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/owl.theme.css" rel="stylesheet">		
		<!-- theme stylesheet -->
		<link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">		
		<!-- your stylesheet with modifications -->
		<link href="css/custom.css" rel="stylesheet">
		<script src="js/respond.min.js"></script>
		<link rel="shortcut icon" href="favicon.png">		
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css/util.css">
		<link rel="stylesheet" type="text/css" href="vendor/css/main.css">
		
		<!-- *** SCRIPTS TO INCLUDE ***
	 _________________________________________________________ -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src="js/waypoints.min.js"></script>
		<script src="js/modernizr.js"></script>
		<script src="js/bootstrap-hover-dropdown.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/front.js"></script>
		
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>		
	</head>

	<body>   

		<!-- *** NAVBAR ***
	 _________________________________________________________ -->

		<div class="navbar navbar-default yamm" role="navigation" id="navbar">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand home" href="catalog.php" data-animate-hover="bounce">
						<img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
						<img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Catalog</span>
					</a>
					<div class="navbar-buttons">						
						<a class="btn btn-default navbar-toggle" href="logout.php">
							<i class="fa fa-sign-out"></i><span class="hidden-xs">sign out</span>
						</a>
						<a class="btn btn-default navbar-toggle" href="shopping-cart.php">
							<i class="fa fa-shopping-cart"></i><span class="hidden-xs">shopping cart</span>
						</a>						
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle search</span>
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
				<!--/.navbar-header -->            

				<div class="navbar-buttons">

					<div class="navbar-collapse collapse right" id="logout">
						<a class="btn btn-primary navbar-btn" href="logout.php"><i class="fa fa-sign-out"></i><span class="hidden-sm">sign out</span></a>						
					</div>
					
					<div class="navbar-collapse collapse right" id="basket-overview">
						<a class="btn btn-primary navbar-btn" href="shopping-cart.php"><i class="fa fa-shopping-cart"></i><span class="hidden-sm" id="shopping-cart">shopping cart</span></a>						
					</div>
					<!--/.nav-collapse -->

					<div class="navbar-collapse collapse right" id="search-not-mobile">
						<button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle search</span>
							<i class="fa fa-search"></i>
						</button>
					</div>

				</div>

				<div class="collapse clearfix" id="search">

					<div class="navbar-form">
						<div class="input-group">
							<input type="text" class="form-control" id="txt-search" placeholder="Search">
							<span class="input-group-btn">
								<button class="btn btn-primary" id="btn-search"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>

				</div>
				<!--/.nav-collapse -->

			</div>
			<!-- /.container -->
		</div>
		<!-- /#navbar -->

		<!-- *** NAVBAR END *** -->