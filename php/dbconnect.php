<?php 
	$db = mysqli_connect('localhost','root','RootT3chn0logiesTT','dbOrders');
	if (!$db) {
	    die('Could not connect: ' . mysqli_error($db));
	}
?>