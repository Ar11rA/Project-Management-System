<?php
session_start();
include 'connect.php';
global $con;
	$name = $_POST['username'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM employee WHERE User_Name = '$name' AND Password = '".MD5($password)."' AND Emp_id NOT IN (SELECT Emp_Id from project_pm)";
	$res = mysqli_query($con, $query);

	if( mysqli_num_rows($res) > 0 ) {
		
		$row = mysqli_fetch_assoc($res);
		
		$_SESSION['id'] = $row['Emp_id'];
		$_SESSION['valid_user2'] = $row['User_Name'];
		$_SESSION['name'] = $row['Emp_Name'];
		$_SESSION['loggedin'] = 1;
		
		header("Location: teamhome.php");
	}
	else
	{
		echo "Incorrect Username or Password!";
		header("Location: TeamMemberLogin.php");
	}
?>