<?php
//connection parameters
$link = mysqli_connect('localhost', 'root', '', 'se_project');
//get data  from form field
$num = $_POST["status"];
$id = $_POST["Task"];
//run update query
$sql = "UPDATE proj_task SET Status = $num WHERE TaskId = '$id';";
if(mysqli_query($link, $sql))
{echo "Record updated successfully";}
else {
    echo "Error updating record: " . mysqli_error($link);
}
?>