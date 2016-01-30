<?php
	session_start();
	$page = '<link rel="stylesheet" type="text/css" href="css/style.css">
			<!-- <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
			<!-- <link rel="stylesheet" type="text/css" href="css/fonts.css"> -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<script type="text/javascript" src="js/jquery.js"></script>
			<!-- <script type="text/javascript" src="js/scroll.js"></script> -->
			<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
			<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
			<script type="text/javascript" src="js/velocity.js"></script>
			<script type="text/javascript" src="js/mustache.js"></script>
			<script type="text/javascript" src="js/moment.js"></script>
			<script type="text/javascript" src="js/hammer.min.js"></script>
			 <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
			<title>CASHIER UI | BBQH</title>
			
			<head>
			</head>
			
			<body>
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<ul class="nav nav-left nav-pills text-center">
						<li class="active"><a data-toggle="pill" href="#home">Cashier Home</a></li>
						<!-- <li><a data-toggle="pill" href="#order_history">Order History</a></li> -->
						<li><a data-toggle="pill" href="#remove">Orders for Removal</a></li>
						<li><a data-toggle="pill" href="#add_order">Add an Order</a></li>
						<li><a data-toggle="pill" href="#records">Records</a></li>
						<li><a id="logout">Logout</a></li>
					</ul>
				</nav>
				<br><br><br><br><br>
				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<div class="row">
							<div class="col-lg-12 col-lg-offset-0 text-left">
								<div class="row">
									<div class="col-lg-11 col-lg-offset-1"><h1 class="padding_5">Orders</h1></div>
								</div>
								<hr>
							</div>
						</div>
						<div id="injectStuffHere"></div>
					</div>
					<div id="order_history" class="tab-pane fade">
						history
					</div>
					<div id="remove" class="tab-pane fade">
						<div class="row">
							<div class="col-lg-12 col-lg-offset-0 text-left">
								<div class="row">
									<div class="col-lg-11 col-lg-offset-1"><h1 class="padding_5 r">Delayed Orders</h1></div>
								</div>
								<hr>
							</div>
						</div>
						<div id="injectOverdueHere" class="row padding_20 bg_7 w">
						</div>
					</div>
					<div id="records" class="tab-pane fade">
						<div class="row">
							<div class="col-lg-12 col-lg-offset-0 text-left">
								<div class="row">
									<div class="col-lg-11 col-lg-offset-1"><h1 class="padding_5 b">Records</h1></div>
								</div>
								<hr>
							</div>
						</div>
						<div id="<PUT YOUR BUSINES HERE SAYAAD>" class="row padding_20 bg_7 w">
						</div>
					</div>
				</div>
				<br><br><br><br><br>
				</div>
				<br><br><br><br><br>
			</body>
			
			<footer>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/cashier.js"></script>
			</footer>';
	if(isset($_SESSION['Cashier'])){
		echo $page;
	}else{
		echo 'You do not have permission to access this page.';
		echo '<br>Please <a href="http://m.originalbbqhut.com/backendlogin.php">login</a>.';
	}
?>