<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "se_project";

$con = mysqli_connect($host,$user,$pass,$database);

if(mysqli_connect_errno($con)){
	echo "failed to connect to database";
}
else{
	//echo "Successfully connected to database";
}
?>