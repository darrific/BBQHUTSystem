<?php
	require 'php/dbconnect.php';
	session_start();

	$combos = [];
	$sides = [];

	$comboQuery = 'SELECT comboID,name,details,price,image FROM combos';
	if(!($comboResult = $db->query($comboQuery))){
		echo "Error: Query failed to execute: \n";
	    echo "Query: ". $comboQuery."\n";
	    echo "Errno: ". $db->errno."\n";
	    echo "Error: ". $db->error."\n";
	    exit;
	}
	$sidesQuery = 'SELECT sideID,name,details,price FROM sides';
	if(!($sidesResult = $db->query($sidesQuery))){
		echo "Error: Query failed to execute: \n";
	    echo "Query: ". $sidesQuery."\n";
	    echo "Errno: ". $db->errno."\n";
	    echo "Error: ". $db->error."\n";
	    exit;
	}

	while($combo = $comboResult->fetch_assoc()){
		$combo['quantity'] = 0;
		if (isset($_SESSION['OrderJSON'])){
			$order = json_decode($_SESSION['OrderJSON']);
			foreach($order->items as $item){
				if($combo['name'] == $item->name){
					$combo['quantity'] = $item->quantity;
				}
			}
		}
		array_push($combos, $combo);
	}
	while($side = $sidesResult->fetch_assoc()){
		$side['quantity'] = 0;
		if (isset($_SESSION['OrderJSON'])){
			$order = json_decode($_SESSION['OrderJSON']);
			foreach($order->items as $item){
				if($side['name'] == $item->name){
					$side['quantity'] = $item->quantity;
				}
			}
		}
		array_push($sides, $side);
	}



	if (isset($_SESSION['OrderJSON'])){
		echo '<div id="OrderJSON" style="display:none;">'.$_SESSION['OrderJSON'].'</div>'."\n";
	}
	echo '<div id="ComboJSON" style="display:none;">'.json_encode($combos).'</div>'."\n";
	echo '<div id="SidesJSON" style="display:none;">'.json_encode($sides).'</div>'."\n";
?>

<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<!-- <script type="text/javascript" src="js/scroll.js"></script> -->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/velocity.js"></script>
<script type="text/javascript" src="js/hammer.min.js"></script>
<script type="text/javascript" src="js/mustache.js"></script>
 <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Order | BBQH</title>

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
				<li><a href="index.html#about_header">About</a></li>
				<li><a href="index.html#contact_container">Contact</a></li>
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
	<div class="row">
		<div class="col-xs-12 text-center">
			<h1 class="header_1">Express Ordering</h1>
		</div>
		<div class="col-xs-12 text-center">
			<h5><i>Introducing our revolutionary Express Ordering System (EOS)</i></h5>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12 col-xs-offset-0 text-center">
			<div class="jumbotron">
				<div class="row">
					<div class="col-xs-12">
						<h5>Simply follow the 5 steps:</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h3>1</h3>
					</div>
					<div id="how_works" class="col-xs-8 col-xs-offset-2">
						<img src="images/Animations/tutorial/image_1.svg" / alt=":/">
					</div>
					<div class="col-xs-8 col-xs-offset-2 padding_20">
						<h5>Tap and Hold the option you want to order. <br>
							Repeat as necessary.</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h3>2</h3>
					</div>
					<div id="how_works" class="col-xs-8 col-xs-offset-2">
						<img src="images/Animations/tutorial/image_2.svg" / alt=":/">
					</div>
					<div class="col-xs-8 col-xs-offset-2 padding_20">
						<h5>Press the Confirm button.</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h3>3</h3>
					</div>
					<div id="how_works" class="col-xs-8 col-xs-offset-2">
						<img src="images/Animations/tutorial/image_3.svg" / alt=":/">
					</div>
					<div class="col-xs-8 col-xs-offset-2 padding_20">
						<h5>Set the time you will collect your order by and enter your contact information.</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h3>4</h3>
					</div>
					<div id="how_works" class="col-xs-8 col-xs-offset-2">
						<img src="images/Animations/tutorial/image_5.svg" / alt=":/">
					</div>
					<div class="col-xs-8 col-xs-offset-2 padding_20">
						<h5>Press the Place Order button.</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h3>5</h3>
					</div>
					<div id="how_works" class="col-xs-8 col-xs-offset-2">
						<img src="images/Animations/tutorial/image_6.svg" / alt=":/">
					</div>
					<div class="col-xs-8 col-xs-offset-2 padding_20">
						<h5>Skip those long lines and collect your order.</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-10 col-xs-offset-1"><hr></div>
		<div class="col-xs-10 col-xs-offset-1">
			<a id="ConfirmURL">
				<button id="ConfirmButton" class="btn btn-warning btn-block">Confirm Order</button>
			</a>
		</div>
		<div class="col-xs-10 col-xs-offset-1"><hr></div>
		<div class="col-xs-10 col-xs-offset-1">
			<a id="ResetSession">
				<button id="ResetButton" class="btn btn-danger btn-block">Reset All </button>
			</a>
		</div>
		<div class="col-xs-10 col-xs-offset-1"><hr></div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12 jumbotron text-center"> 
			<h5 class="default_text padding_10">Press and hold to add an order. Repeat as necessary.</h5>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<b class="header_3">Combination Meals</b>
			<br>
			<hr>
		</div>
	</div>
	<div class="row">
		<div id="CombosUI" class="noselect col-xs-10 col-xs-offset-1"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<b class="header_3">Sides</b>
			<br>
			<hr>
		</div>
	</div>
	<br>
	<div class="row">
		<div id="SidesUI" class="noselect col-xs-10 col-xs-offset-1"></div>
	</div>
	<br><br><br>
	<div class="row bg_2" id="footer">
		<div class="col-xs-12 text-center">
			<br>
			<div class="row">
				<div class="col-xs-4">
					<b class="w">Navigation</b><br>
					<a href="index.html">Home</a><br>
					<a href="menu.html">Menu</a><br>
					<a href="index.html#about">About</a><br>
					<a href="index.html#contact">Contact</a><br>
					<a href="family.html">Meet the Family</a><br>
					<a href="catering_form.html">Catering Quote</a><br>
					<a href="employment_application_form.pdf">Job Application</a><br>
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
	<script src="js/order.js"></script>
	<script>
		$(document).ready(function(){
			$
		});
	</script>
</footer>
