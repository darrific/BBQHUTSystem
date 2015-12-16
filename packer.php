<?php
	// if(!isset($_SESSION['user'])){
	// 	die();
	// }

	require 'php/dbconnect.php';

	class stdObject {
    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }
    }

    public function __call($method, $arguments) {
        $arguments = array_merge(array("stdObject" => $this), $arguments);
        if (isset($this->{$method}) && is_callable($this->{$method})) {
            return call_user_func_array($this->{$method}, $arguments);
        } else {
            throw new Exception("Fatal error: Call to undefined method stdObject::{$method}()");
        }
	    }
	}

	$orders = array();
	$Query = 'SELECT * FROM orders WHERE status="Pending"';
	if(!($result = $db->query($Query))){
		echo "Error: Query failed to execute: \n";
	    echo "Query: ". $comboQuery."\n";
	    echo "Errno: ". $db->errno."\n";
	    echo "Error: ". $db->error."\n";
	    exit;
	}

	while($order = $result->fetch_assoc()){
		$obj = new stdObject();
		$obj->id = $order['orderID'];
		$obj->consumerName = $order['consumerName'];
		$obj->phoneNumber = $order['phoneNumber'];
		$obj->pickup = $order['pickup'];
		$obj->status = $order['status'];
		$obj->items = array();
		foreach(explode("|", $order['sides']) as $strSide){
			$itemObj = new stdObject();
			$numbers = explode("-", $strSide);
			$id = $numbers[0];
			if(count($numbers) > 1){
				if($numbers[1] > 0){
					$nameResult = $db->query("SELECT name FROM combos WHERE comboID = \"$id\"");
					$priceResult = $db->query("SELECT price FROM combos WHERE comboID = \"$id\"");
					if(isset($nameResult)){
						$itemObj->name = $nameResult->fetch_assoc()['name'];
						$itemObj->price = $priceResult->fetch_assoc()['price'];
						$itemObj->quantity = intval($numbers[1]);
						array_push($obj->items, $itemObj);
					}
				}
			}
		}
		foreach(explode("|", $order['combos']) as $strCombo){
			$itemObj = new stdObject();
			$numbers = explode("-", $strCombo);
			$id = $numbers[0];
			if(count($numbers) > 1){
				if($numbers[1] > 0){
					$nameResult = $db->query("SELECT name FROM sides WHERE sideID = \"$id\"");
					$priceResult = $db->query("SELECT price FROM sides WHERE sideID = \"$id\"");
					if(isset($nameResult)){
						$itemObj->name = $nameResult->fetch_assoc()['name'];
						$itemObj->price = $priceResult->fetch_assoc()['price'];
						$itemObj->quantity = intval($numbers[1]);
						array_push($obj->items, $itemObj);
					}
				}
			}
		}
		/*for ($i=0; $i < count($obj->items); $i++) {
			$item = $obj->items[$i];
			if(!isset($item->name)){
				unset($obj->items[$i]);
			}
		}*/
		array_push($orders, $obj);
	}
	echo '<div id="OrdersJSON" style="display:none;">'.json_encode($orders).'</div>';
?>

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
<title>PACKER UI | BBQH</title>

<head>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<ul class="nav nav-left nav-pills text-center">
			<li class="active"><a data-toggle="pill" href="#home">Cashier Home</a></li>
			<!-- <li><a data-toggle="pill" href="#order_history">Order History</a></li> -->
		</ul>
	</nav>
	<br><br><br><br><br>
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<div class="row">
				<div class="col-lg-12 col-lg-offset- text-left">
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
	</div>
	<br><br><br><br><br>
	
</body>

<footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/packer.js"></script>
</footer>