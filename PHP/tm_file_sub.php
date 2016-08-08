<?php
//start session
session_start();
//get session variable data
$sid = $_SESSION['id'];
//set connection parameters
$link = mysqli_connect('localhost', 'root', '', 'se_project');
//get form data
$fn = $_POST['filename'];
$noOfHours = $_POST['NoOfHours'];
$comments = $_POST['comments'];
//run query
$query = "INSERT INTO file VALUES (NULL, '$fn', '', '', '$noOfHours', '$comments', 'NOW()', '$sid', '')";
//check validity
if (mysqli_query($link,$query))
echo "Successfully Uploaded";
else
echo "Unsuccessful, Try Again";
?>