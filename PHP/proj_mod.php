<!DOCTYPE html>
<html>
	<head>
	<title>Project Modification</title>

<style>
.bml{
text-align:center;
margin-left:165px;
margin-right:165px;
margin-top:10px;
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
width:30%;
padding:0;
margin:0;
height:40px;
}
textarea
{
border:1px solid black;
border-radius:5px;
width:30%;
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

b
{text-align:center;
font-size:20px;
}
</style>
</head>
<div class="bml">
<h1>Project Modification</h1>
<br>

<form name="f2" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
<?php
		//start session
		session_start();
		//set connection parameters
		include 'connect.php';
		global $con;
		//select projects
		$query = mysqli_query($con,'select * from project'); 
		//put a dropdown for projects
		echo"<center>";
		echo 'Select Project'; 
		echo "</center>"."<br>";
		echo '<select name="Project">'; 
		while ($row = mysqli_fetch_array($query)) {
			echo "<option value=\"".$row['Proj_Id']."\">".$row['Proj_Id']."->".$row['Proj_Name']."</option>";
		}
		echo "</select>";
		?>
		<br>
			<input type="submit" value="submit" name="s1" >
			<br>
		</form>

		<form name="f1" method="post" action="am_proj_mod.php">
			<?php
			//display coorect project and click submit to auto-fill
				if(isset($_POST['s1']))
					{
						$userid=$_POST['s1'];
						$sql= "select * FROM project where Proj_Id='".$_POST['Project']."'";
						$res=mysqli_query($con,$sql);
						$var=mysqli_fetch_array($res);   
						$p_id=$var['Proj_Id'];
					}
					//next part is an auto filled form, user can update as he wants
					?>

		<br  />	
		<br  />
		<input type="hidden" name="pid" value="<?php if(isset($_POST['s1'])) { echo $var['Proj_Id']; } ?>" />
		<center>Enter New Name for Project </center><br>
		<input type="text" name="name" value="<?php if(isset($_POST['s1'])) { echo $var['Proj_Name']; } ?>" placeholder="Name" required />
		<br  />
		<br  />
		<center>Enter New Description for Project </center><br>
		<textarea name="desc" placeholder="Description" cols="50" rows="5" required style="vertical-align: middle;" ><?php if(isset($_POST['s1'])) { echo $var['Proj_Desc']; } ?></textarea>
		<br  />
		<br  />
		<center>Enter New Start Date for Project </center><br>
		<input type="date" name="sdate" value="<?php if(isset($_POST['s1'])) { echo $var['StartDate']; } ?>" placeholder="Start date" required />
		<br  />
		<br  />
		<center>Enter New End Date for Project</center><br>
		<input type="date" name="edate" value="<?php if(isset($_POST['s1'])) { echo $var['EnDate']; } ?>" placeholder="End Date" required />
		<br  />
		<br  />
		<center>Enter Number of Hours for Project </center><br>
		<input type="number" name="hours" min="1" value="<?php if(isset($_POST['s1'])) { echo $var['NoOfHrs']; } ?>" placeholder="NoOFHours" required />
		<br  />
		<br  />
		<center>Select Number of Members for Project</center><br>
		<input type="number" name="members" min="1" value="<?php if(isset($_POST['s1'])) { echo $var['NoOfMembers']; } ?>" placeholder="NoOFMembers" required />
		<br  />
		<br  />
		<input type="submit" value="Update">
		</form>
		</div>