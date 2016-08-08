<html>
<body>

<?php 
//start session
session_start();
//connection parameters
include 'connect.php';
global $con;
//get data from form
$id = $_POST["tid"];
$status = $_POST["status"];
//query to update project status
$sql = "UPDATE project SET Status = '$status' WHERE Proj_Id = '$id'";
$sql1 = "UPDATE project SET lessons = '$lessons' WHERE Proj_Id = '$id'";
if(mysqli_query($con, $sql) && mysqli_query($con, $sql1))
{echo "Record updated successfully";}
else {
    echo "Error updating record: " . mysqli_error($link);
}
?>
</body>
</html>