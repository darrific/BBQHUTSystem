<?php
	global $db;
	$GLOBALS['db'] = new mysqli('db.originalbbqhut.com','roottechnologies','jpjw-wdyu-tt4u-4te8-e167','dborders');

	if ($db->connect_errno) {
		echo "Error: Failed to make a MySQL connection: \n";
		echo "Errno: " . $db->connect_errno . "\n";
		echo "Error: " . $db->connect_error . "\n";
		exit;
	}
?>