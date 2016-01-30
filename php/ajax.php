<?php
	require 'stdObject.php';
	require 'dbconnect.php';
	session_start();

	switch($_POST["action"]){
		case "updateOrderJSON":
			updateOrderJSON();
			break;
		case "sendOrder":
			sendOrder();
			break;
		case "clearOrderJSON":
			clearSession();
			break;
		case "clearSession":
			clearSession();
			break;
		case "updateOrderStatus":
			updateOrderStatus($_POST["status"]);
			break;
		case "updateBackendUI":
			updateBackendUI($_POST["status"]);
			break;
		case "reachedTablet":
			reachedTablet();
			break;
		case "checkOverdue":
			checkOverdue();
			break;
		case "getOrders":
			getOrders();
			break;
		case "deleteOrder":
			deleteOrder();
			break;
		case "checkReached":
			checkReached();
			break;
		case "getCombos":
			getCombos();
			break;
		case "getSides":
			getSides();
			break;
		case "getInfo":
			getInfo();
			break;
	}

	function getOrders(){
		if(isset($_SESSION["OrderJSON"])){
			echo $_SESSION["OrderJSON"];
		}
	}

	function clearSession(){
		if(isset($_SESSION['OrderJSON'])){
			unset($_SESSION["OrderJSON"]);
		}
		if(isset($_SESSION['OrderPlaced'])){
			unset($_SESSION["OrderPlaced"]);
		}
		if(isset($_SESSION['id'])){
			unset($_SESSION["id"]);
		}
		if(isset($_SESSION['Cashier'])){
			unset($_SESSION["Cashier"]);
		}
		if(isset($_SESSION['Packer'])){
			unset($_SESSION["Packer"]);
		}
		if(isset($_SESSION['captcha'])){
			unset($_SESSION["captcha"]);
		}
	}

	function updateOrderJSON(){
		$OrderJSON = $_POST["OrderJSON"];
		$_SESSION["OrderJSON"] = $OrderJSON;
	}

	function checkOverdue(){
		$Query = 'SELECT * FROM orders WHERE status="Packed"';
		if(!($result = $GLOBALS['db']->query($Query))){
		 //   echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		 	exit;
		}

		while($order = $result->fetch_assoc()){
			if(isset($order['pickup'])){
				$id = $order['orderID'];
				if(intval($order['pickup']) < time()){
					$Query2 = "UPDATE orders SET status=\"Overdue\" WHERE orderID=$id";
					if(!($r = $GLOBALS['db']->query($Query2))){
						// echo "Error: Query failed to execute: \n";
					 //   echo "Query: ". $Query2."\n";
					 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
					 //   echo "Error: ". $GLOBALS['db']->error."\n";
						exit;
					}
				}
			}
		}
	}

	function getCombos(){
		$combos = [];
		$comboQuery = 'SELECT comboID,name,details,price,image FROM combos';
		if(!($comboResult = $GLOBALS['db']->query($comboQuery))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $comboQuery."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
		while($combo = $comboResult->fetch_assoc()){
			$combo['quantity'] = 0;
			if (isset($_SESSION['OrderJSON'])){
				$order = json_decode($_SESSION['OrderJSON']);
				if(isset($order->items)){
					foreach($order->items as $item){
						if($combo['name'] == $item->name){
							$combo['quantity'] = $item->quantity;
						}
					}
				}
			}
			array_push($combos, $combo);
		}
		echo json_encode($combos);
	}

	function getSides(){
		$sides = [];
		$sidesQuery = 'SELECT sideID,name,details,price,image FROM sides';
		if(!($sidesResult = $GLOBALS['db']->query($sidesQuery))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $sidesQuery."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
		while($side = $sidesResult->fetch_assoc()){
			$side['quantity'] = 0;
			if (isset($_SESSION['OrderJSON'])){
				$order = json_decode($_SESSION['OrderJSON']);
				if(isset($order->items)){
					foreach($order->items as $item){
						if($side['name'] == $item->name){
							$side['quantity'] = $item->quantity;
						}
					}
				}
			}
			array_push($sides, $side);
		}
		echo json_encode($sides);
	}

	function sendOrder(){
		updateOrderJSON();
		
		$order = json_decode($_SESSION['OrderJSON']);
		$time = $_POST['timePlaced'];
		$ip = $_SERVER['REMOTE_ADDR'];
		
		if(!isset($_SESSION['captcha'])){
			echo 'not verified';
			return;
		}
		if($order->items == array()){
			echo 'empty';
			clearSession();
			return;
		}
		if($order->pickup < time()){
			echo 'early';
			return;
		}
		
		$preQuery = "SELECT * FROM orders WHERE status=\"PENDING\" OR status=\"PACKED\"";
		$preresult = $GLOBALS['db']->query($preQuery);
		while($o = $preresult->fetch_assoc()){
			if(strcmp($o["ip"], $ip) == 0){
				if(time() < $o['pickup']){ //comparing server time. More secure but users would be pissed if the time on their machine is wrong
				//if($time < $o['pickup']){ //comparing client time. Always a great user experience but opens spamming to hacker.
					echo 'spam';
					clearSession();
					return;
				}
			}
		}
		
		$pickup = $order->pickup;
		$consumerName = $order->consumerName;
		$phoneNumber = $order->phoneNumber;
		$combos = "";
		$sides = "";
		$phoneNumber = intval(str_replace("-", "", $phoneNumber));

		foreach ($order->items as $item){
			if(strcmp($item->type, "Combo")){
				$combos .= $item->ID."-".$item->quantity."|";
			}
			if(strcmp($item->type, "Side")){
				$sides .= $item->ID."-".$item->quantity."|";
			}
		}
		$Query = "INSERT INTO orders (combos,sides,pickup,consumerName,phoneNumber,ip) VALUES (\"$combos\",\"$sides\",$pickup,\"$consumerName\",\"$phoneNumber\",\"$ip\");";
		if(!($result = $GLOBALS['db']->query($Query))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
		$_SESSION["OrderPlaced"] = 1;
	}

	function updateOrderStatus($status){
		$id = $_POST["id"];
		$Query = "UPDATE orders SET status=\"$status\" WHERE orderID=$id";
		if(!($result = $GLOBALS['db']->query($Query))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
	}

	function reachedTablet(){
		$id = $_POST["id"];
		$Query = "UPDATE orders SET reachedTablet=1 WHERE orderID=$id";
		if(!($result = $GLOBALS['db']->query($Query))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
	}

	function updateBackendUI($status){
		$orders = array();
		$Query = "SELECT * FROM orders WHERE status=\"$status\" ORDER BY pickup ASC";
		if(!($result = $GLOBALS['db']->query($Query))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
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
						$nameResult = $GLOBALS['db']->query("SELECT name FROM combos WHERE comboID = \"$id\"");
						$priceResult = $GLOBALS['db']->query("SELECT price FROM combos WHERE comboID = \"$id\"");
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
						$nameResult = $GLOBALS['db']->query("SELECT name FROM sides WHERE sideID = \"$id\"");
						$priceResult = $GLOBALS['db']->query("SELECT price FROM sides WHERE sideID = \"$id\"");
						if(isset($nameResult)){
							$itemObj->name = $nameResult->fetch_assoc()['name'];
							$itemObj->price = $priceResult->fetch_assoc()['price'];
							$itemObj->quantity = intval($numbers[1]);
							array_push($obj->items, $itemObj);
						}
					}
				}
			}
			array_push($orders, $obj);
		}
		echo json_encode($orders);
	}

	function checkReached(){
		if(!isset($_SESSION["OrderPlaced"])){
			echo "No order";
			return;
		}
		$Query = "SELECT * FROM orders WHERE reachedTablet=1 AND status=\"Pending\"";
		if(!($result = $GLOBALS['db']->query($Query))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
		$O = json_decode($_SESSION["OrderJSON"]);
		$name = $O->consumerName;
		$ph = $O->phoneNumber;
		$time = $O->pickup;
		while($order = $result->fetch_assoc()){
			if(($name == $order['consumerName']) && (str_replace("-", "", $ph) == str_replace("-", "", $order['phoneNumber']))){
				$_SESSION['id'] = $order['orderID'];
				echo "Reached";
				return;
			}
			//echo '$name='.$name.' $ph='.$ph.' '.$order['consumerName'].' '.$phone;
		}
		echo "Not reached";
	}

	function getInfo(){
		$ID = $_SESSION['id'];
		$Query = "SELECT * FROM orders WHERE orderID=\"$ID\"";
		if(!($result = $GLOBALS['db']->query($Query))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
		$obj = new stdObject();
		while($order = $result->fetch_assoc()){
			$obj->pickup = $order['pickup'];
			$obj->consumerName = $order['consumerName'];
			$obj->phoneNumber = $order['phoneNumber'];
			$obj->id = $order['orderID'];
			$obj->total = 0;
			foreach(explode("|", $order['sides']) as $strSide){
				$numbers = explode("-", $strSide);
				$id = $numbers[0];
				if(count($numbers) > 1){
					if($numbers[1] > 0){
						$priceResult = $GLOBALS['db']->query("SELECT price FROM combos WHERE comboID = \"$id\"");
						if(isset($priceResult)){
							$price = intval($priceResult->fetch_assoc()['price']);
							$quantity = intval($numbers[1]);
							$obj->total += ($price * $quantity);
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
						$priceResult = $GLOBALS['db']->query("SELECT price FROM sides WHERE sideID = \"$id\"");
						if(isset($priceResult)){
							$price = intval($priceResult->fetch_assoc()['price']);
							$quantity = intval($numbers[1]);
							$obj->total += ($price * $quantity);
						}
					}
				}
			}
		}
		echo json_encode($obj);
		clearSession();
	}
	
	function deleteOrder(){
		if(!isset($_SESSION["OrderPlaced"])){
			echo "No order";
			return;
		}
		$Query = "SELECT * FROM orders WHERE status=\"Pending\"";
		if(!($result = $GLOBALS['db']->query($Query))){
			// echo "Error: Query failed to execute: \n";
		 //   echo "Query: ". $Query."\n";
		 //   echo "Errno: ". $GLOBALS['db']->errno."\n";
		 //   echo "Error: ". $GLOBALS['db']->error."\n";
		    exit;
		}
		$O = json_decode($_SESSION["OrderJSON"]);
		$name = $O->consumerName;
		$ph = $O->phoneNumber;
		while($order = $result->fetch_assoc()){
			if(($name == $order['consumerName']) && (str_replace("-", "", $ph) == str_replace("-", "", $order['phoneNumber']))){
				$Query2 = 'DELETE FROM orders WHERE orderID="'.$order['orderID'].'"';
				if(!($result = $GLOBALS['db']->query($Query2))){
					echo "Unsuccessful in deleteing.";
				}else{
					echo "Found entry and deleted";
				}
				return;
			}
		}
		clearSession();
	}
?>