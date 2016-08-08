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
			if(!isset($_POST['submit'])){
	// Visitor need to enter the username and password
?>

<!DOCTYPE html>
<html>
	<head>
	<title>PM Login</title>
	<link rel="stylesheet" type="text/css" href="css1.css" >
	
	</head>
	<body>
	
		<form class="login" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
		<fieldset>
		<legend>Project Manager Login</legend>
		<div id="content">
		<div class="label">
		<label>Registration No:</label><br/>
		<label>Password:</label>
		</div>
		<div class="input">
		<input type="text" placeholder="Enter Username" id="input1" name="user" required>
		<input type="password" placeholder="Enter password" id="input1" name="pass" required>
		</div>
		<button type="button" name="Back" class="button" id="back"><a href="index.php" style="text-decoration:none" >Back</a></button>
		<button type="submit" name="submit" class="button">Login</a></button>
		<button type="button" value="Forgot Password" class="button"><a href="password_recovery.php" style="text-decoration:none" >Forgot Password</a></button>
		</div>
		</fieldset>
		</form>
	</body>
</html>

<?php 
	}else{
		//connect to mysql
		require 'connect.php';
		
		global $con;
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$query = "select count(*),Emp_id,Emp_Name from employee where User_Name = '".$user."' and Password= '".MD5($pass)."' and Emp_id IN (select Emp_Id from project_pm) ";
		$result = mysqli_query($con,$query);
		if(!$result){
			echo "cannot run query";
			exit;
			}
		$row = mysqli_fetch_row($result);
		$count = $row[0];
		$EID = $row[1];
		$name = $row[2];
		if($count == 1){
			//visitors username and password combination is correct now check whether he is a project manager or not
				echo "Login successful";
				$query1 = "select Proj_Id from project_pm where Emp_Id = '".$EID."'";
				$result1 = mysqli_query($con , $query1);
				$row1 = mysqli_fetch_row($result1);
				
				$_SESSION['projid'] = $row1[0];
				$_SESSION['EID'] = $EID;
				$_SESSION['valid_user1'] = $name;
				echo '<br/>';
				echo "Redirecting to home page please wait";
				header("Refresh:3 ; url=projecthome.php");
			}else{
			echo "You are not an authorized user";
					header("Refresh:2 ; url=ProjectMAnagerLogin.php");
				}
	}
}
?>