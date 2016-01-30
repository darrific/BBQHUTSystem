<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/velocity.js"></script>
<script type="text/javascript" src="js/hammer.min.js"></script>
<script type="text/javascript" src="js/mustache.js"></script>
 <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Order | BBQH</title>

<head>
	<script type="text/javascript" src="js/redirect.js"></script>
</head>

<body id="order_section">

	<div id="orders_buttons">
		<a id="ConfirmURL" class="padding_5">
			<img id="ResetButton" src="images/redo_button.png">
		</a>
		<a id="ResetSession" class="padding_5">
			<img id="ConfirmButton" src="images/check_button.png">
		</a>
	</div>
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
	<div class="row" id="order_header_section">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 text-center">
				<br><br>s
				<h1 class="header_1">Place An Order</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 col-xs-offset-2"><hr></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 text-center w">
				Waiting in line is a pain. We get it. <br>
				Wouldn't it be awesome if you could just go in and pick up your order at a set time?
				<br>
				<br>
				<i>Introducing our shiny new ordering system</i>
				<br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 col-xs-offset-2"><hr></div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4 text-center"><button class="btn btn-warning btn-block">Take the Tutorial</button>
		</div>
		<br>
		<br>
		<br>

		<div class="row">
			<div id="button_tutorial" class="col-xs-8 col-xs-offset-2 w text-center">
				Scroll To Begin
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 jumbotron text-center"> 
			<h5 class="default_text padding_10">Press and hold to add an order. Repeat as necessary.</h5>
			<h5 class="default_text padding_5">Press the 'Edit / Checkout' button to fine-tune your order.</h5>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
			<b class="header_3">Combination Meals</b>
			<br>
			<hr>
		</div>
	</div>
	<div class="row">
		<div id="CombosUI" class="noselect col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
			<b class="header_3">Sides</b>
			<br>
			<hr>
		</div>
	</div>
	<br>
	<div class="row">
		<div id="SidesUI" class="noselect col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"></div>
	</div>
	<br><br><br>
	<!--<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		<a id="ConfirmURL">
			<button id="ConfirmButton2" class="btn btn-warning btn-block">Edit / Checkout</button>
		</a>
	</div>
	<br><br>
	<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
		<a id="ResetSession">
			<button id="ResetButton2" class="btn btn-danger btn-block">Reset All </button>
		</a>
	</div> 
	<br><br><br><br><br> -->
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/order.js"></script>
</footer>
