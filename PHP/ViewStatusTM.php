<!DOCTYPE html>

<html>
	<head>

	<title>View Status</title>
<style>
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:20px;
padding-top:20px;
padding-bottom:130px;
height:600px;
}
table
{
width:75%;
margin-left:100px;
}
table td,th
{
padding:10px;
text-align:left;
}
table,table th,table td
{
border:1px solid black;
border-collapse:collapse;
}
table th{
background-color:#003;
	color:white;
}
select,input[type="text"]{width:15%;
height:25px;
}
button,input[type="submit"]	
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
	<div class="bml">
		<h1>VIT PROJECT ASSISTANT TOOL</h1>
		<h5>Logged in as <?php session_start(); echo $_SESSION['valid_user2']; ?></h5>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
			<label>Project</label>
			<select name="project">
				<?php
					require 'connect.php';
					global $con;
					
					$query = "SELECT `Proj_Name` FROM `project`";
					$result = mysqli_query($con,$query); 
					if(!$result){
					echo "cannot run query.. cost is already entered for this phase";
					exit;
					}
					while ($row=mysqli_fetch_array($result)) {
						$Title=$row["Proj_Name"];
						echo "<option>
							$Title
							</option>";
            
						}
					mysqli_close($con);
				?>
			</select><br><br>
			<input type="submit">
			</form>
			<?php 
						$project = "";
						$result = "";
						$pid = $pname = $pdes = $pm = $st = $ed = "";
						if($_SERVER["REQUEST_METHOD"] == "POST"){
					require 'connect.php';
					global $con;
					
					$project = $_POST["project"];
					
					$query = "select * from project p,project_pm pm,employee e where p.Proj_Id = pm.Proj_Id and pm.Emp_Id = e.Emp_id and p.Proj_Name = '$project'";
					$result = mysqli_query($con,$query); 
					if(!$result){
					echo "cannot run query.. cost is already entered for this phase";
					exit;
					}
					while($row=mysqli_fetch_array($result)){
							$pid = $row["Proj_Id"];
							$pname = $row["Proj_Name"];
							$pdes = $row["Proj_Desc"];
							$pm = $row["Emp_Name"];
							$st = $row["Status"];
							$ed = $row["Emp_Designation"];
						}
					mysqli_close($con);
				}
					?>
					
			<br><br>
			<table>
				
					<tr>
						<th>Project Id</th>
						<th>Project Name</th>
						<th>Project Description</th>
						<th>Project Manager</th>
						<th>Progress</th>
						<th>Employee Designation</th>
					</tr>
				
					<tr>
						<td><?php echo $pid; ?></td>					
						<td><?php echo $pname; ?></td>
						<td><?php echo $pdes; ?></td>
						<td><?php echo $pm; ?></td>
						<td><?php echo $st; ?></td>
						<td><?php echo $ed; ?></td>
					</tr>
				
			</table>
		</div>
	</body>
</html>