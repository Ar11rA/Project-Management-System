<?php
	session_start();
	if (!isset($_SESSION['valid_user2'])){
		echo "You are not logged in";
		echo "<br />";
		echo "Redirecting you to Team member login page";
		header("Refresh:2 ; url=TeamMemberLogin.php");
	}

?>

<!doctype html>
<html>
<head>
<style>
body
{
	background-color:#666;
}
</style>
<meta charset="utf-8">
<title>Team-member Home</title>
</head>

<frameset rows="23%,*">
<frame src="header.php" noresize="noresize" />

<frameset cols="8%,46%">
<frame src="vertical2.php" noresize="noresize"/>
<frame src="grey.php" name="content" />
</frameset>
</frameset><noframes></noframes>
<body>
</body>
</html>
