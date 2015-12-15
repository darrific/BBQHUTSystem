<?php
	$OrderJSON = $_POST["OrderJSON"];
	session_start();
	$_SESSION["OrderJSON"] = $OrderJSON;
?>