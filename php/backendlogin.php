<?php
	$hashed_password = crypt('TheOriginalBBQ');
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	session_start();
	
	if(hash_equals($hashed_password, crypt($password, $hashed_password))){
		switch($username){
			case "Cashier":
				echoCashier();
				break;
			case "Packer":
				echoPacker();
				break;
			default:
				echo "Incorrect username or password.";
				echo '<br><a href="http://m.originalbbqhut.com/backendlogin.php">Go back</a>';
		}
	}else{
		echo "Incorrect username or password.";
		echo '<br><a href="http://m.originalbbqhut.com/backendlogin.php">Go back</a>';
	}
	
	function echoCashier(){
		$_SESSION['Cashier'] = "yes";
		if(isset($_SESSION['Cashier'])){
			header("Location: http://m.originalbbqhut.com/cashier.php");
		}
	}
	
	function echoPacker(){
		$_SESSION['Packer'] = "yes";
		if(isset($_SESSION['Packer'])){
			header("Location: http://m.originalbbqhut.com/packer.php");
		}
	}
?>