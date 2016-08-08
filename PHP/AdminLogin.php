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
<html>
  <head>
       <title> Admin Login </title>
<link rel="stylesheet" type="text/css" href="css1.css" >

  </head>
  <body>
<br>
<br>
       <form method="GET" action="login_admin.php">
       <fieldset>
       
       <legend>Admin Login</legend> 
       <div id="content">
		<div class="label">
		<label>Username :</label><br>
		<label>Password :</label>
		</div>
		<div class="input">
             <input type="text" name="Username" placeholder="Username" id="input1" required/>
             <input type="password" name="Password" placeholder="Password" id="input1" required/>
         </div>
        <button type="submit" name="submit" class="button" <a href="mainaccount.php" style="text-decoration:none">Login</a></button>
		<button type="button" name="Back" class="button" id="back"><a href="index.php" target="_self" style="text-decoration:none">Back</a></button>
		<button type="button" value="Forgot Password" class="button" ><a href="password_recovery.php" style="text-decoration:none" >Forgot Password</a></button>
      </div>
		</fieldset>
		</form>
  </body>
</html>

<?php 
		}
?>