<?php 
	if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']){
		session_start();
        $secret = "6Lf4oxYTAAAAADq8InxGKpCmjL5qurIRxkPKNRg7";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
        $arr = json_decode($rsp,TRUE);
        $name = $_POST['name'];
        $num = $_POST['num'];
        if($arr['success']){
        	$_SESSION['captcha'] = true;
        	header("Location: ../cart.php?verified=true&name=$name&num=$num");
        }else{
        	echo "You're a robot. You don't get access.";
    		echo '<br/><a href="http://m.originalbbqhut.com/cart.php">Go back</a>.';
        }
    }else{
    	echo "You need to complete the captcha to verify that you're not a robot!";
    	echo '<br/><a href="http://m.originalbbqhut.com/cart.php">Go back</a>.';
    }
?>