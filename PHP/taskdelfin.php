<html>
<body>

<?php 

include 'connect.php';//include connection parameters
global $con;

$TId =$_POST["Task"];//get data of task id from previous form field
$sql = "delete from `se_project`.`proj_task` where TaskId='$TId'"; //delete according to task id
 $runq = mysqli_query($con,$sql);//run query
   if($runq){//print approriate message for success/fail case
	 echo 'successful';
	header("Location: TaskDelete.php");
	 }
 else
echo 'unsuccessful - Cannot delete a task with team assignment';
 ?>
 

</body>
</html>