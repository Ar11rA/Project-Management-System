<html>
<body>
<title>Report Generation</title>
<?php 
//start session
session_start();
//set connection parameters
include 'connect.php';
global $con;
//get proj id from form
$ProjId= $_POST['project'];
$query = mysqli_query($con,"select * from project where Proj_Id='$ProjId'");//run query
$fhandle = fopen($ProjId.".txt",'w') or die("Error downloading report");//create file
while ($row = mysqli_fetch_array($query)) {//echo corresponding report data and write it into file
	echo "PROJECT ID:".$row["Proj_Id"]."<br/>" ;
	fwrite($fhandle,"PROJECT ID:".$row["Proj_Id"]."\r\n");
	echo "PROJECT NAME:".$row["Proj_Name"]."<br/>" ;
	fwrite($fhandle,"PROJECT NAME:".$row["Proj_Name"]."\r\n");
	echo "PROJECT DESC:".$row["Proj_Desc"]."<br/>" ;
	fwrite($fhandle,"PROJECT DESC:".$row["Proj_Desc"]."\r\n");
	echo "PROJECT START DATE:".$row["StartDate"]."<br/>" ;
	fwrite($fhandle,"PROJECT START DATE:".$row["StartDate"]."\r\n");
	echo "PROJECT END DATE:".$row["EnDate"]."<br/>" ;
	fwrite($fhandle,"PROJECT END DATE:".$row["EnDate"]."\r\n");
	echo "TOTAL HOURS:".$row["NoOfHrs"] ."<br/>";
	fwrite($fhandle,"TOTAL HOURS:".$row["NoOfHrs"] ."\r\n");
	echo "TOTAL NUMBER OF MEMBERS:".$row["NoOfMembers"]."<br/>" ;
	fwrite($fhandle,"TOTAL NUMBER OF MEMBERS:".$row["NoOfMembers"]."\r\n");
	echo "PROJECT STATUS:".$row["Status"]."<br/>" ;
	fwrite($fhandle,"PROJECT STATUS:".$row["Status"]."\r\n");
	
}
//get employee details
$query1=mysqli_query($con,"select Emp_Name from employee e,project p,project_pm pm where e.Emp_Id=pm.Emp_Id and pm.Proj_Id =p.Proj_Id and p.Proj_Id='$ProjId'");
while ($row = mysqli_fetch_array($query1)) {
	echo "PROJECT MANAGER NAME:".$row["Emp_Name"]."<br/>" ;
	fwrite($fhandle,"PROJECT MANAGER NAME:".$row["Emp_Name"]."\r\n");}
	
 $query2=mysqli_query($con,"select * from proj_task,project where ProId =Proj_Id and Proj_Id='$ProjId'");//run query
 while ($row = mysqli_fetch_array($query2)) {//echo corresponding report data and write it into file
	echo "<br />";
	fwrite($fhandle,"\r\n");
	echo "<br />";
	fwrite($fhandle,"\r\n");
	echo "TASK ID:".$row["TaskId"]."<br/>" ;
	fwrite($fhandle,"TASK ID:".$row["TaskId"]."\r\n");
	echo "TASK NAME:".$row["TaskName"]."<br/>" ;
	fwrite($fhandle,"TASK NAME:".$row["TaskName"]."\r\n");
	echo "TASK DESCRIPTION:".$row["TaskDesc"]."<br/>" ;
	fwrite($fhandle,"TASK DESCRIPTION:".$row["TaskDesc"]."\r\n");
	echo "TASK START DATE:".$row["TaskStartDate"]."<br/>" ;
	fwrite($fhandle,"TASK START DATE:".$row["TaskStartDate"]."\r\n");
	echo "TASK END DATE:".$row["TaskEndDate"]."<br/>" ;
	fwrite($fhandle,"TASK END DATE:".$row["TaskEndDate"]."\r\n");
	echo "TASK  HOURS:".$row["Hours"]."<br/>" ;
	fwrite($fhandle,"TASK  HOURS:".$row["Hours"]."\r\n");
	echo "TASK MEMBERS:".$row["Members"]."<br/>" ;
	fwrite($fhandle,"TASK MEMBERS:".$row["Members"]."\r\n");
	echo "TASK STATUS:".$row["Status"]."<br/>" ;}
	fwrite($fhandle,"TASK STATUS:".$row["Status"]."\r\n");
	
	fclose($fhandle);
 ?>
</body>
</html>