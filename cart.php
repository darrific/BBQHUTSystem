	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
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
	<title>Checkout | BBQH</title>

	<head>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>

	<body id="cart_bg_section">
		<nav  class=" navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.html" class="navbar-brand" >Original Bar-B-Que Hut</a>
				</div>
				<div class="collapse navbar-collapse navHeaderCollapse text-center" >
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">Home</a></li>
						<li><a href="menu.html">Menu</a></li>
						<li><a href="index.html#contact_container">Contact</a></li>
						<li><a href="catering_form.html">Catering Quote</a></li>
						<li><a href="order.php">Place an Order</a></li>
						<br>
					</ul>
				</div> 
			</div>
		</nav>
		<br><br>
		<div class="row header text-center" id="cart_section">
			<h1 class="header_1">Checkout</h1>
		</div>
		<div class="row">
			<div class="col-xs-12 ">
				<div class="container">
					<h3 class="default_text padding_5 text-center w">Last chance to edit your order.</h3>
					<br>	
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
				<a href="order.php">
					<button type="button" class="btn btn-info btn-block text-center">
						Add Item
					</button>
				</a>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 bg_5">
			<br>
				<div class="row" id="cart_table_list">
					<div class="col-xs-10 col-xs-offset-1">
						<div class="col-xs-2">Qty</div>
						<div class="col-xs-3 col-xs-offset-0 col-sm-offset-1">Item</div>
						<div class="col-xs-3 col-xs-offset-1 col-sm-offset-1">Price</div>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-10 col-xs-offset-1 text-center">
						<div class="container">
							<div id="OrderTable"></div>
						</div>
					</div>
				</div>
				<div class="row padding_20">
					<div class="col-xs-10 col-xs-offset-1 text_center default_text bg_5">
						<div class="col-xs-6 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2">TOTAL</div>
						<div class="col-xs-6 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2" id="totalPrice"><span id="totalPriceSpan">$0.00</span></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container ">
				<br>
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 text-center b"><h3 class="header_2 w">Enter Information</h3></div>
					<br>
					<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 col-xs-offset-1">
						<div class="jumbotron padding_20">
							<form role="form" action="php/captcha.php" method="POST">
								<div class="form-group">
									<label for="consumerName">Name</label>
									<input name="name" type="text" class="form-control" id="consumerName" <?php if(isset($_GET['name'])){ $name=$_GET['name']; echo "value=\"$name\""; } ?>>
								</div>
								<div class="form-group">
									<label for="consumerNo">Cellphone</label>
									<input name="num" type="text" class="form-control" id="consumerNo" <?php if(isset($_GET['num'])){ $num=$_GET['num']; echo "value=\"$num\""; } ?>>
								</div>
								<?php
									$toPrint = '<div class="form-group"><center><div class="g-recaptcha" data-sitekey="6Lf4oxYTAAAAAA1Hjyh58OVeecGN0FSfHe7rjSkg"></div></center></div><div class="form-group"><center><input type="submit" value="Verify" class="btn btn-success btn-block text-center"></center></div>';
									if($_GET['verified'] !== 'true'){
										echo $toPrint;
									}
								 ?>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center">
						<h3 class="header_2 w">Pickup Time</h3>
						<div class="row bg_9 br">
							<div class="col-xs-8 col-xs-offset-2">
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
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 r">
				<b class="text-center">NOTE</b>
				<h6><p>To preserve the high quality of food you expect, you will be required to collect your order within ten minutes of the pickup time set.
				Your order will be cancelled ten minutes after this time, with no exceptions.</p>
				<p>By pressing/clicking the "Place Order" button, you agree to our Terms and Conditions
				of use <a href="#">here</a>.	
				</p></h6>

			</div>
		</div>
		<hr>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<button id="placeOrderButton" type="button" class="btn btn-success btn-block text-center">
				Place order
			</button>
		</div>
		<br><br><br>
	<div class="navbars row" id="footer">
		<div class="col-xs-12 text-center">
			<br>
			<div class="row" id="footer_row">
				<div class="col-xs-4">
					<b class="w">Navigation</b><br>
					<hr>
					<a href="index.html">Home</a><br>
					<a href="menu.html">Menu</a><br>
					<a href="index.html#about">About</a><br>
					<a href="index.html#contact_container">Contact</a><br>
					<a href="order.php">Place an Order</a>
					<br>
				</div>
				<div class="col-xs-4">
					<b class="w">Social Media</b><br>
					<hr>
					<a href="https://www.facebook.com/Original-Bar-B-Que-Hut-126629500699186/">Facebook</a><br>
					<a href="https://twitter.com/OriginalBBQHut">Twitter</a><br>
					<a href="https://www.instagram.com/originalbarbquehut/">Instagram</a><br>
					<br>
					<br>
				</div>
				<div class="col-xs-4">
					<b class="w">Powered by:</b><br>
					<hr>
					<a href="#" class="g">Root Technologies</a>
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
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
		<script src="js/cart.js"></script>
	</footer>
