<?php
	session_start();
		if(isset($_SESSION['valid_user'])){
		echo 'you are already logged in as: '.$_SESSION['valid_user'].' <br />';
		echo 'Redirecting to Admin home page please wait';
		header("Refresh:3 ; url=mainaccount.php");
		}else if(isset($_SESSION['valid_user1'])){
		echo 'you are already logged in as: '.$_SESSION['valid_user1'].' <br />';
		echo 'Redirecting to ProjectManager home page please wait';
		header("Refresh:3 ; url=projecthome.php");
		}else if(isset($_SESSION['valid_user2'])){
		echo 'you are already logged in as: '.$_SESSION['valid_user2'].' <br />';
		echo 'Redirecting to Team Member home page please wait';
		header("Refresh:3 ; url=teamhome.php");
		}else{
?>


		<!DOCTYPE html>
		<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="css1.css">
		<title>TM Login</title>
		</head><body>
		<form method="post" action="TeamMemberLoginProcess.php">
		<fieldset>
				<legend>Team Member Login</legend>
				<div id="content">
				<div class="label">
					<label>Registration No:</label><br>
					<label>Password:</label>
				</div>
				<div class="input">
					<input type="text" name="username" placeholder="Username" id="input1" required>
					<input type="password" name="password" placeholder="Password" id="input1" required>
				</div>
				<button type="button" name="Back" class="button" id="back"><a href="index.php" style="text-decoration:none" >Back</a></button>
				<button type="submit" name="submit" class="button">Login</a></button>
				<button type="button" value="Forgot Password" class="button"><a href="password_recovery.php" style="text-decoration:none" >Forgot Password</a></button>
				</div>
		</fieldset>
		</form>
		</body>
		</html>
		
<?php } ?>