<html>
<body>

<?php 
//connection parameters
$link = mysqli_connect('localhost', 'root', '','se_project');
//get data from form field
$ps =$_POST["system"];
//get projects from existing system
$query = mysqli_query($link,"select * from project where Sys_Id = '$ps'");
//get number of results
$n11=mysqli_num_rows($query);
//if 1st project, then just add 1 to the end
if($n11==0)
{$arr2=$ps."1";}
else
{//else get last character and increment by 1
while ($row = mysqli_fetch_array($query))
	$a = $row['Proj_Id'];
	
$a1=str_split($a);
$cnt=$a1[count($a1)-1];
$cn=0;
$cn=(int)$cnt+1;
$a1[count($a1)-1]=(string)$cn;
$arr2=implode("",$a1);
}
//get data from form fields
$pman =$_POST["pro_man"];
$pn =$_POST["pro_name"];
$sd =$_POST["start_date"];
$ed =$_POST["end_date"];
$ta =$_POST["text_area"];
$ph =$_POST["pro_hours"];
$pm =$_POST["pro_members"];
$pn =$_POST["pro_name"];
//check if start date is lesser than end date
if($sd<$ed)
{//insert project and pm into respective tables
	$sql = "INSERT INTO `se_project`.`project` (`Sys_Id`,`Proj_Id`,`Proj_Name`,`Proj_Desc`,`StartDate`,`EnDate`,`NoOfHrs`,`NoOfMembers`,`Status`) VALUES ('$ps','$arr2','$pn','$ta','$sd','$ed',$ph,$pm,'pending')";
	$sql1 = "INSERT INTO project_pm VALUES ('$arr2','$pman')";
//echo new id generated and corresponding pm for project
	echo $arr2;
	echo " is Assigned to ";
	 echo $pman;
	 echo "<br />";
	  $retval = mysqli_query($link ,$sql );
   	$res2=mysqli_query($link, $sql1);
 if($retval && $res2)
	 echo 'successful';
 else
echo 'unsuccessful    '. mysqli_error();
}
 else
   {
	   echo 'start date should be less than end date';
	   
   }

 
 ?>
</body>
</html>