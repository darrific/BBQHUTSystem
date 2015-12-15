<?php
	require 'dbconnect.php';

	switch($_POST["action"]){
		case "updateOrderJSON":
			updateOrderJSON();
			break;
		case "sendOrder":
			sendOrder();
			break;
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
				$combos .= $item->ID."-".$item->quantity."|";
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
?>