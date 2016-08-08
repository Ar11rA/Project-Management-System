<?php
	session_start();
	unset($_SESSION['valid_user2']);
	unset($_SESSION['id']);
	unset($_SESSION['loggedin']);
	session_destroy();
	echo "you have been successfully Logged out!!";
	header ("Refresh: 2; url = TeamMemberLogin.php");
?>