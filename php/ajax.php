<?php

	require 'dbconnect.php';
	require 'stdObject.php';

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
		case "updateOrderStatus":
			updateOrderStatus($_POST["status"]);
			break;
		case "updateBackendUI":
			updateBackendUI($_POST["status"]);
			break;
	}

	function clearSession(){
		session_start();
		$_SESSION["OrderJSON"] = null;
	}

	function updateOrderJSON(){
		$OrderJSON = $_POST["OrderJSON"];
		session_start();
		$_SESSION["OrderJSON"] = $OrderJSON;
	}

	function sendOrder(){
		updateOrderJSON();
		$order = json_decode($_SESSION['OrderJSON']);

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
		$db = new mysqli('localhost','root','','dborders');

		//echo "Combos: ".$combos." Sides: ".$sides." Pickup: ".$pickup." Name: ".$consumerName." Number: ".$phoneNumber;

		if ($db->connect_errno){
			echo "Error: Failed to make a MySQL connection: \n";
			echo "Errno: " . $db->connect_errno . "\n";
			echo "Error: " . $db->connect_error . "\n";
			exit;
		}else{
			$Query = "INSERT INTO orders (combos,sides,pickup,consumerName,phoneNumber) VALUES (\"$combos\",\"$sides\",$pickup,\"$consumerName\",\"$phoneNumber\");";
			if(!($result = $db->query($Query))){
				echo "Error: Query failed to execute: \n";
			    echo "Query: ". $Query."\n";
			    echo "Errno: ". $db->errno."\n";
			    echo "Error: ". $db->error."\n";
			    exit;
			}
		}
	}

	function updateOrderStatus($status){
		$id = $_POST["id"];
		$db = new mysqli('localhost','root','','dborders');

		if ($db->connect_errno){
			echo "Error: Failed to make a MySQL connection: \n";
			echo "Errno: " . $db->connect_errno . "\n";
			echo "Error: " . $db->connect_error . "\n";
			exit;
		}

		$Query = "UPDATE orders SET status=\"$status\" WHERE orderID=$id";
		if(!($result = $db->query($Query))){
			echo "Error: Query failed to execute: \n";
		    echo "Query: ". $Query."\n";
		    echo "Errno: ". $db->errno."\n";
		    echo "Error: ". $db->error."\n";
		    exit;
		}
	}

	function updateBackendUI($status){
		$orders = array();
		$db = new mysqli('localhost','root','','dborders');

		if ($db->connect_errno){
			echo "Error: Failed to make a MySQL connection: \n";
			echo "Errno: " . $db->connect_errno . "\n";
			echo "Error: " . $db->connect_error . "\n";
			exit;
		}else{
			$Query = "SELECT * FROM orders WHERE status=\"$status\"";
			if(!($result = $db->query($Query))){
				echo "Error: Query failed to execute: \n";
			    echo "Query: ". $Query."\n";
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
				array_push($orders, $obj);
			}
			echo json_encode($orders);
		}
	}
?>