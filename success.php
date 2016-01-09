<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="css/fonts.css"> -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<!-- <script type="text/javascript" src="js/scroll.js"></script> -->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="js/velocity.js"></script>
 <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Finishing Up | BBQH</title>

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
				<li><a href="order.html"><button class="btn btn-warning btn-block">Place an Order</button></a></li>
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
	<br><br><br><br><br><br>	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 text-center"><h4>Looks like you're all set. See you at 8:56pm!</h4></div>
	</div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="jumbotron">
				<div class="col-xs-6 col-xs-offset-3 text-center">
					<h3><b>Summary</b></h3>
				</div>
				<div id="injectHere" class="col-xs-8 col-xs-offset-2"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 text-center">
			<b><i>The given last name and telephone number will be required to obtain the order.</i></b>
		</div>
	</div>	
	<br>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<a href="index.html">
				<button type="button" class="btn btn-success btn-block">Back to Home</button>
			</a>
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2"><hr></div>
		<div class="col-xs-10 col-xs-offset-1 text-center">
			<div class="col-xs-4"><a href="http://www.facebook.com">Facebook</a></div>
			<div class="col-xs-4"><a href="#">Twitter</a></div>
			<div class="col-xs-4"><a href="#">Instagram</a></div>
		</div>
	</div>
</body>

<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mustache.js"></script>
	<script type="text/javascript" src="js/moment.js"></script>
	<script>
		var id = "<?php echo $_GET['id']; ?>";
		var order = {};

		$.post('php/ajax.php', {action: 'getOrder', ID:id}, function(data, textStatus, xhr) {
			order = jQuery.parseJSON(data);
			var time = moment(order.pickup, "X").format("h:mm A");
			order.pickup = time;
			order.id = pad(id, 4);
			var template = '<b>Name:</b>{{consumerName}}<br><b>Telephone:</b>{{phoneNumber}}<br><b>Pickup time:</b>{{pickup}}<br><h4><b>Number:</b><br>{{id}}</h4>';
			$('#injectHere').html(Mustache.render(template, order));
		});

		function pad(n, width, z) {
		  z = z || '0';
		  n = n + '';
		  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
		}
	</script>
</footer>