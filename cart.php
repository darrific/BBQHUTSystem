<?php
	session_start();
	if(isset($_SESSION["OrderJSON"])){
		echo '<div id="OrderJSON" style="display:none;">'.$_SESSION["OrderJSON"].'</div>';
	}
?>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/fonts.css"> -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/moment.js"></script>
	<script type="text/javascript" src="js/velocity.js"></script>
	<script type="text/javascript" src="js/hammer.min.js"></script>
	<script type="text/javascript" src="js/mustache.js"></script>
	 <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Home | BBQH</title>

	<head>
	</head>

	<body>
		<nav class="navbar navbar-inverse bg_3 navbar-fixed-top">
			<div class="container">
				<a href="index.html" class="navbar-brand">Original Bar-B-Que Hut</a>
				<button id="navbar_menu_button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right text-center">
					<li><a href="index.html">Home</a></li>
					<li><a href="menu.html">Menu</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="family.html">Meet the Family</a></li>
					<li><a href="catering_form.html">Catering Quote</a></li>
					<li><a href="employment_application_form.pdf">Job Application</a></li>
					<li><a href="order.php"><button class="btn btn-warning btn-block">Place an Order</button></a></li>
					<br>
					<li>
						<ul id="navbar_social_media" class="list-inline">
							<li><a href="http://www.facebook.com"><img src="images/socialmedia/facebook.png"></a></li>
							<li><a href="http://www.twitter.com"><img src="images/socialmedia/twitter.png"></a></li>
							<li><a href="http://www.instagram.com"><img src="images/socialmedia/instagram.png"></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<br><br><br>
		<div class="row header text-center" id="cart_header">
			<h1>Cart</h1>
		</div>
		<div class="row">
			<div class="col-xs-12 ">
				<div class="container">
					<h3>Last chance to edit your order.</h3>
					<br>	
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1">
				<a href="order.php">
					<button type="button" class="btn btn-info btn-block text-center">
						Add Item
					</button>
				</a>
			</div>
		</div>
		<br><br>
		<div class="row" id="cart_table_list">
			<div class="col-xs-11" style="margin-left: 4.5%">
				<div class="col-xs-1">Qty</div>
				<div class="col-xs-5 col-xs-offset-1">Item</div>
				<div class="col-xs-2">Price</div>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 bg_5 text-center">
				<div class="container padding_20">
					<div id="OrderTable"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 text_center">
				<div class="col-xs-6">TOTAL</div>
				<div class="col-xs-6" id="totalPrice"><span id="totalPriceSpan">$0.00</span></div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="container ">
				<div class="row">
					<div class="col-xs-12 text-center b"><h3>Enter Information</h3></div>
					<br>
					<div class="col-xs-10 col-xs-offset-1">
						<div class="jumbotron">
							<form role="form">
								<div class="form-group">
									<label for="consumerName">Name</label>
									<input type="text" class="form-control" id="consumerName">
								</div>
								<div class="form-group">
									<label for="consumerNo">Cellphone</label>
									<input type="text" class="form-control" id="consumerNo">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 text-center b">
						<h3>Pickup Time</h3>
						<div class="row">
							<div class="col-xs-8 bg_5 col-xs-offset-2">
								<div id="time"></div>
							</div>
						</div>
						
					</div>
					<br>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-10 r col-xs-offset-1">
				<b class="text-center">NOTE</b>
				<h6><p>You will be required to collect your order within one hour of the time given.
				Your order will be cancelled one hour after the set pickup time, with no exceptions.</p>
				<p>By pressing/clicking the "Place Order" button, you agree to our Terms and Conditions
				of use <a href="#">here</a>.	
				</p></h6>

			</div>
		</div>
		<hr>
		<div class="col-xs-10 col-xs-offset-1">
			<button id="placeOrderButton" type="button" class="btn btn-success btn-block text-center">
				Place order
			</button>
		</div>
		<br><br><br>
		<div class="row bg_2" id="footer">
			<div class="col-xs-12 text-center">
				<br>
				<div class="row">
					<div class="col-xs-4">
						<b class="w">Navigation</b><br>
						<a href="index.html">Home</a>
						<a href="menu.html">Menu</a>
						<a href="#about">About</a>
						<a href="#contact">Contact</a>
						<a href="family.html">Meet the Family</a>
						<a href="catering_form.html">Catering Quote</a>
						<a href="employment_application_form.pdf">Job Application</a>
						<a href="order.php">Place an Order</a>
						<br>
					</div>
					<div class="col-xs-4">
						<b class="w">Social Media</b><br>
						<a href="#">Facebook</a><br>
						<a href="#">Twitter</a><br>
						<a href="#">Instagram</a><br>
						<br>
						<br>
					</div>
					<div class="col-xs-4">
						<b class="w">Powered by:</b><br>
						<br>
						<a href="#" class="r">Root Technologies</a>
						<br>
						<br>
						<br>
					</div>
				</div>			
			</div>  
			<br><br>
		</div>	
	</body>	
	
	<footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
		<script src="js/cart.js"></script>
	</footer>
