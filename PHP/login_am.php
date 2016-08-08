<?php
	session_start();
	unset($_SESSION['valid_user']);
	session_destroy();
	echo "you have been successfully Logged out!!";
	header ("Refresh: 2; url = AdminLogin.php");
?>