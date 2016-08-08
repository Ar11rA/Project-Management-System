<!DOCTYPE html>
<html>
	<head>
	<title>Task Employee Deletion</title>
	<style>
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:30px;
padding-top:20px;
padding-bottom:130px;
height:700px;
}
a{
	text-decoration:none;
	color:black;
	
}
input,select{
border:1px solid black;
border-radius:5px;
width:40%;
padding:0;
margin:0;
height:40px;
}
textarea
{
border:1px solid black;
border-radius:5px;
width:40%;
padding:0;
margin:0;
height:130px;
}
input[type=submit],button
{
margin:10px;
width:15%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}

</style>
	</head>
	<div class="bml">
	<h1>Deletion of Employee assignments from Task</h1>
	<br>
<form name="f2" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<?php
		session_start();
		include 'connect.php';
		global $con;

		$query = mysqli_query($con,"select * from task_employee"); 


		echo '<select name="Task">'; 
		while ($row = mysqli_fetch_array($query)) {
			echo "<option value=\"".$row['Emp_Id']."\">".$row['Task_ID']."->".$row['Emp_Id']."</option>";
		}
		echo "</select>";
?>
	<br /><input type="submit" value="Delete" name="s1" >
</form>
	<?php
          if(!isset($_SESSION['valid_user1'])){
							echo "You are not logged in as Project Manager";
							exit();
					}else{
						if(isset($_POST['s1']))
            {
                $Empid = $_POST['Task'];
                $sql= "delete from task_employee where Emp_Id = '$Empid'";
                $res=mysqli_query($con,$sql);
								if($res){
									echo "Deleted Successfully";
									header("Location: delete_task_employee.php");
									}else{
									echo "Error in deletetion".mysqli_error($con);
									}
            }
					}
   ?>
</html>