<html>
<body>

<?php 

$link = mysqli_connect('localhost', 'root', '','se_project'); //connection to server
	
$PId =$_POST["Project"]; //get project id from previous dropdown

$sql2 = "select * from `se_project`.`proj_task` where ProId='$PId'"; //to check if project has any existing tasks
	$runq2 = mysqli_query( $link,$sql2 ); //run previous query
	$num2 = mysqli_num_rows($runq2); //number of tasks
	if($num2==0){    //if no tasks
	$sql1 = "delete from `se_project`.`project_pm` where Proj_Id='$PId'"; //delete pm assignment with project
	$runq1 = mysqli_query( $link,$sql1 );}   //run previous query
	$sql = "delete from `se_project`.`project` where Proj_Id='$PId'"; //delete project
  
   $runq = mysqli_query( $link,$sql );   //run previous query
   if($runq)
	 echo 'Successful';
 else
 {echo 'Unsuccessful '. "Because cannot delete a project with existing tasks or has some team assignment"; //error message to show incomplete tasks
 echo"<br>";echo"First delete any corresponding tasks and notify the project manager that his project is being removed";
 }
 ?>

 </body>
</html>