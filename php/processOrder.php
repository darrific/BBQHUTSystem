<?php
	require 'dbconnect.php';

	function processOrder($orders){
		foreach($orders as $order){
			$pickup = $order->pickup;
			$consumerName = $order->consumerName;
			$phoneNumber = $order->phoneNumber;
			foreach($order->item as $item){
				$name = $item->name;
				$details = $item->details;
				$quantity = $item->quantity;
				$price = $item->price;
			}
		}
	}

	function appendOrder(){

	}
?>