<!DOCTYPE html>
<html>
	<head>
	<title>Task Modification</title>
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
	<h1>Task Modification</h1>
	<br>
<form name="f2" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<?php
		session_start();
		include 'connect.php';
		global $con;

		$query = mysqli_query($con,"select * from proj_task where ProId='".$_SESSION['projid']."'"); 


		echo '<select name="Task">'; 
		while ($row = mysqli_fetch_array($query)) {
			echo "<option value=\"".$row['TaskId']."\">".$row['TaskId']."->".$row['TaskName']."</option>";
		}
		echo "</select>";
?>
	<input type="submit" value="submit" name="s1" >
</form>

<form name="f1" method="post" action="pm_task_mod.php">
	<?php
            if(isset($_POST['s1']))
            {
                $Taskid = $_POST['Task'];
                $sql= "select * FROM proj_task WHERE TaskId='".$Taskid."' AND ProId='".$_SESSION['projid']."'";
                $res=mysqli_query($con,$sql);
                $var=mysqli_fetch_array($res);   
                //$user_id=$var['UR_id'];
            }
   ?>
		<input type="hidden" name="Task" value="<?php if(isset($_POST['s1'])) { echo $Taskid; } ?>" />
		<br /><br />
		<input type="text" name="name" value="<?php if(isset($_POST['s1'])) { echo $var['TaskName']; } ?>" />
		<br  /><br  />
		<textarea name="desc" cols="50" rows="5"><?php if(isset($_POST['s1'])) { echo $var['TaskDesc']; } ?></textarea>';
		<br  /><br  />
		<input type="date" name="sdate" value="<?php if(isset($_POST['s1'])) { echo $var['TaskStartDate']; } ?>" />
		<br  /><br  />
		<input type="date" name="edate" value="<?php if(isset($_POST['s1'])) { echo $var['TaskEndDate']; } ?>" />
		<br  /><br  />
		<input type="text" name="hours" value="<?php if(isset($_POST['s1'])) { echo $var['Hours']; } ?>" />
		<br  /><br  />
		<input type="text" name="members" value="<?php if(isset($_POST['s1'])) { echo $var['Members']; } ?>" />
		<br  /><br  />
		<input type="submit" value="Update">
	</div>
	</form>
</html>