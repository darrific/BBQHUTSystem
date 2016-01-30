<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/velocity.js"></script>
	 <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Login | BBQH</title>
</head>

<body style="margin:0;padding:0;">
	<nav class="navbars navbar navbar-inverse navbar-fixed-top">
		
	</nav>
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 padding_10 text_center">
			<br><br><br><br><br><br>
			<div class="container bg_2">
				<div class="row">
					<div class="col-lg-4 col-lg-offset-4">
						<h1 class="padding_20 text-center w">Login</h1>
					</div>
				</div>
				<form action="php/backendlogin.php" method="POST">
					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-4">
							<input type="text" name="username" class="form-control" id="input_user" placeholder="Username">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-4 col-lg-offset-4">
							<input class="form-control" name="password" id="input_password" placeholder="Password"></input>
						</div>
					</div>
					<div class="form-group">
					    <div class="col-lg-2 col-lg-offset-5">
					      <button type="submit" class="btn btn-warning btn-block">Login</button>
					    </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<footer>
	<script src="js/bootstrap.min.js"></script>
</footer>
</html>
