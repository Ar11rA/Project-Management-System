<?php
$link = mysqli_connect('localhost', 'root', '', 'se_project');//connection parameters
//get data from form
$id = $_POST["pid"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$sdate = $_POST["sdate"];
$edate = $_POST["edate"];
$hours = $_POST["hours"];
$members = $_POST["members"];
//run update query
$sql = "UPDATE project SET Proj_Name = '$name', Proj_Desc = '$desc', StartDate = '$sdate', EnDate = '$edate', NoOfHrs = $hours, NoOfMembers = $members ,Status='pending' WHERE Proj_Id = '$id'";
//check for validity of query
if(mysqli_query($link, $sql))
{echo "Record updated successfully";}
else {
    echo "Error updating record: " . mysqli_error($link);
}

?>