<?php
include 'confige.php';
session_start();
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

/*
Usage : Assign Team Members to Task
Return : JSON file containing Success or Failure Message
Parameters : json file from user , database connection
*/

function assignTMtoTask($json,$conn)
{

$members= json_decode($json, true);
$len = count($members);
$check=0;

$task_id=$_SESSION['TaskId'];
// Retrieving the no. of members for the task
$sql_task = "SELECT `Members` FROM `proj_task` WHERE TaskId = '$task_id'" ;
$result_task = mysqli_query($conn, $sql_task);
$row_task = mysqli_fetch_assoc($result_task);
$success="";

// Check whether the submitted members do not exceed the members to be alloted
if($len==0)
{
  $success="Please Select Atleast One if members are unassigned";
}
elseif($_SESSION['remaining'] >= $len)
{
  // Assign the Members to task
for($temp=0; $temp< $len; $temp++)
{
    $sql="INSERT INTO `task_employee` VALUES ('$task_id','$members[$temp]')";
    if (mysqli_query($conn, $sql))
    {
      $success = "Task Assigned to Members successfully";
      $check=1;
    }

   else
   {
     $success="Already Assigned";
     break;
   }
}
$_SESSION['remaining']-=$len;
}
else
{
   $success="Member Assignment completed  ";
}

return json_encode(array($success,$_SESSION['remaining']));
}


if(isset($_SESSION['TaskId']))
{
  // Receiving the JSON File
  header('Content-type: application/json');
  $json = file_get_contents('php://input');
  echo assignTMtoTask($json,$conn);
}
?>
