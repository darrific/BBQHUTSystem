<link rel="stylesheet" type="text/css" href="css/style.css">
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
<!-- 	<div id="add_order" class="tab-pane fade">
			<div class="row">
				<div class="col-lg-12 col-lg-offset-0 text-left">
					<div class="row">
						<div class="col-lg-11 col-lg-offset-1"><h1 class="padding_5">Add an Order</h1></div>
					</div>
					<hr>
				</div>

			</div>
			<div class="row text-center">
				<div class="col-lg-10 col-lg-offset-1 b">
					<h2>New Order</h2>
					<br>
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<form>
								<div class="form-group">
									<label for="form_name_1">Name</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="form_tel_1">Telephone</label>
									<input type="tel" class="form-control">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-12 text-center b">
											<h3 class="header_2">Pickup Time</h3>
											<div class="row">
												<div class="col-xs-8 col-xs-offset-2">
													<div id="time"></div>
												</div>
											</div>
										</div>
										<br>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
	<br><br><br><br><br>
</body>

<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/cashier.js"></script>
</footer>
