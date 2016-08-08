<?php
//start session
session_start();
global $con;
//set connection parameters
include 'connect.php';
//get form parameters
$id = $_POST["tid"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$sdate = $_POST["sdate"];
$edate = $_POST["edate"];
$hours = intval($_POST["hours"]);
$members = intval($_POST["members"]);
//run update query after necessary validations
if(empty($sdate)||empty($edate)){
	$sql = "UPDATE proj_task SET TaskName = '$name', TaskDesc = '$desc', TaskStartDate = '$sdate', TaskEndDate = '$edate', Hours = $hours, Members = $members WHERE TaskId = '$id'";
if(mysqli_query($con, $sql))
{echo "Record updated successfully";}
else {
    echo "Error updating record: " . mysqli_error($link);
}
//check for dates i.e. start date should be lesser than end date
}else if($sdate<$edate){
$sql = "UPDATE proj_task SET TaskName = '$name', TaskDesc = '$desc', TaskStartDate = '$sdate', TaskEndDate = '$edate', Hours = $hours, Members = $members WHERE TaskId = '$id'";
if(mysqli_query($con, $sql))
{echo "Record updated successfully";}
else {
    echo "Error updating record: " . mysqli_error($link);
}
}
else
{
	echo 'start date should be less than end date';
}

?>