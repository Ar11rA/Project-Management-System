<?php
	session_start();
				include 'connect.php';
				global $con;
				
				$name = $_GET['Username'];
				$password = $_GET['Password'];
				
				
				echo $name;
				$res = mysqli_query($con, "SELECT * FROM admin WHERE Username = '".$name."' AND Password = '".MD5($password)."'");

				if( mysqli_num_rows($res) > 0 ) {
					
					$row = mysqli_fetch_assoc($res);
					
					$_SESSION['EID'] = $row['AMID'];
					$_SESSION['valid_user'] = $row['AMName'];
					$_SESSION['loggedin'] = 1;
					
					header("Location: mainaccount.php");
				}
				else
				{
					echo "Incorrect Username or Password!";
					header("Refresh:2 , url = AdminLogin.php");
				}
?>
