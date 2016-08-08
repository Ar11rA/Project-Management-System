 <!DOCTYPE html>
<html>
	<head>
		<title>Cost Estimation</title>
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
	<body>
		<h1>VIT PROJECT ASSISTANT TOOL</h1>
	<div class="bml">
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<h2>Cost Estimation</h2>
			<br>
			<center>Select task </center><br>
			<?php
			session_start();
include 'connect.php';
global $con;

$query = mysqli_query($con,"select * from proj_task,project_pm where ProId = Proj_Id and project_pm.Emp_Id='".$_SESSION['EID']."'"); 


echo '<select name="Task">'; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['TaskId']."\">".$row['TaskId']."->".$row['TaskName']."</option>";
}echo"</select>";
?>

			<br /><br />
			
			<center>Select Start Date</center> <br>
			<input type="date" name="start_date" required>
			<br><br>
			<center>Select End Date </center> <br>
			<input type="date" name="end_date" required>
			<br><br>
			<center>No. of Team Members</center> <br>
			<input type="number" name="no_team_mem" min="1" max="10" required>
			<br><br>
			<center>No. of Hours</center> <br>
			<input type="number" name="hours" required min="1">
			<br><br>
			<input type="submit" name="s_det">
			<br><br>
			
			<br><br>
			
			
		</form>
		</div>
		<?php
			$phase = $start_date = $end_date = $no_team_mem = $hours = "";
			$per_cost = 600;
			$total_cost = "";
			if (isset($_POST["s_det"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
				require 'connect.php';
				global $con;
				
				$phase = $_POST["Task"];
				$start_date = $_POST["start_date"];
				$end_date = $_POST["end_date"];
				$no_team_mem = $_POST["no_team_mem"];
				$hours = $_POST["hours"];
				
				$total_cost = $no_team_mem * $hours * $per_cost;
				
				$query = "INSERT INTO `project_task_cost` VALUES ('$phase', '$start_date', '$end_date', '$total_cost',  '$no_team_mem', '$hours');";
				
				$result = mysqli_query($con,$query);
				if(!$result){
				echo "cannot run query.. cost is already entered for this phase";
				exit;
				mysqli_close($con);
				}
			}
		
		?>
		
		<textarea rows="5" cols="20"><?php 
			if($total_cost != ""){
			echo "Total Cost for ".$phase." is : Rs. ".$total_cost;
			}
		?>
		</textarea><br>
		
		
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input type="submit" name="down_pdf" value="Download_as_pdf">
		</form>
		
			<br><br>
		<button type="button" ><a href="AdminHome.html">Back</a></button>
		<?php /*
			if(isset($_POST["down_pdf"])){
				require 'connect.php';
				global $con;
				
				$query = "SELECT * FROM `project_task_cost`";
				$result = mysqli_query($con,$query); 
				if(!$result){
				echo "cannot run query.. cost is already entered for this phase";
				exit;
				}
				
				while(mysqli_fetch_array($result))  
				{  
					header("Content-length: $size"); 
					header("Content-type: $type"); 
					header("Content-Disposition: inline; filename=TaskCost.pdf"); 
				} 
				
				
				mysqli_close($con);
				exit;
			}*/
		?>
		
	</body>
	
	
</html>