<html>
<body>

<?php 
//set connection
$link = mysqli_connect('localhost', 'root', '','se_project');
//get file data form form field
$fid=$_POST["File"];
//update file status query
if(isset($_POST['stat'])){
$st =$_POST["stat"];}
	$sql = "update file set status='$st' where fileid='$fid'";
  //run query
   $runq = mysqli_query( $link,$sql );
   if($runq)
	 echo 'successful';
 else
 {echo 'unsuccessful '. "Cannot update a file due to certain dependencies";
 }
 ?>
 
 </body>
</html>