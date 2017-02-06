<?php
	session_start();

	session_destroy();
		
	setcookie("user_email", $email, time()-60*5);

	header("Location:index.php?success=".urlencode("Logged Out Successfully"));
	exit();


?>