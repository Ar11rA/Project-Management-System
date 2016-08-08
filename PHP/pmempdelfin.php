<html>
<body>

<?php 

include 'connect.php';//include connection parameters
global $con;

$EId =$_POST["Emp"];//get data of Employee id from previous form field
$sql = "delete from `se_project`.`pm_emp` where Emp_id='$EId'"; //delete according to task id
 $runq = mysqli_query($con,$sql);//run query
   if($runq){//print approriate message for success/fail case
	 echo 'successful';
 }
 else
echo 'unsuccessful - Cannot delete an employee with team assignment';
 ?>
 

</body>
</html>