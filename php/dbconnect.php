<?php
	$db = new mysqli('localhost','root','','dborders');

	if ($db->connect_errno) {
		echo "Error: Failed to make a MySQL connection: \n";
		echo "Errno: " . $db->connect_errno . "\n";
		echo "Error: " . $db->connect_error . "\n";
		exit;
	}
?>