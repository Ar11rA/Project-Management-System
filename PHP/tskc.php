<html>
<body>

<?php 
include 'connect.php';
global $con;
//start session as only logged in user can access
session_start();
//get data from form fields
$tn =$_POST["tskname"];
$td =$_POST["tskdesc"];
$ts =$_POST["taskstart"];
$te =$_POST["taskend"];
$noh =$_POST["noofhours"];
$nom =$_POST["noofmem"];
//get user id from session variable set in log in page
$user = $_SESSION['EID'];

//select logged in pm's project
$q2="select * from project_pm where Emp_Id='$user'";
$q1=mysqli_query($con,$q2);//run query
while ($row = mysqli_fetch_array($q1))//get all results
	$a = $row['Proj_Id'];//store the last one, for auto increment's sake
$frst=$a.'1';//add 1 to end if 1st project

$qry=mysqli_query($con,"select * from proj_task where ProId ='$a'");
$numres=mysqli_num_rows($qry);//check how many tasks exist
if($numres==0 && $ts<$te)//if no task exists and start date<end dtae
{$sql = "INSERT INTO `se_project`.`proj_task` (`ProId`, `TaskId`, `TaskName`, `TaskDesc`, `TaskStartDate`, `TaskEndDate`, `Hours`, `Members`, `Status`) VALUES ('$a', '$frst', '$tn', '$td', '$ts', '$te', '$noh', '$nom', NULL);";
   $runq = mysqli_query($con,$sql);//run insert query
   if($runq)
	 echo 'successful';
   else
echo 'unsuccessful    '. mysql_error();
}
else
{//if any task exists already
while ($rows = mysqli_fetch_array($qry))
	$las = $rows['TaskId'];//get last task id from database
//get last character and increment by 1
$a1=str_split($las);
$cnt=$a1[count($a1)-1];
$cn=0;
$cn=(int)$cnt+1;
$a1[count($a1)-1]=(string)$cn;
$arr2=implode("",$a1);
if($ts<$te)
{//start date<end dtae
echo "New Task ID";
echo"<br>";	
print_r($arr2);//print new task id
echo"<br>";	

$sql = "INSERT INTO `se_project`.`proj_task` (`ProId`, `TaskId`, `TaskName`, `TaskDesc`, `TaskStartDate`, `TaskEndDate`, `Hours`, `Members`, `Status`) VALUES ('$a', '$arr2', '$tn', '$td', '$ts', '$te', '$noh', '$nom', NULL);";
   $runq = mysqli_query($con,$sql);//run insert query
   if($runq)
	 echo 'successful';
   else
echo 'unsuccessful    '. mysql_error();
}
   else
   {
	   echo 'start date should be less than end date';
	   
   }

}
 ?>
 
</body>
</html>