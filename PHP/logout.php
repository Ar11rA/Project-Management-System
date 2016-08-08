<?php
	session_start();
	unset($_SESSION['valid_user1']);
	unset($_SESSION['EID']);
	unset($_SESSION['projid']);
	session_destroy();
	echo "you have been successfully Logged out!!";
	header ("Refresh: 2; url = ProjectManagerLogin.php");
?>