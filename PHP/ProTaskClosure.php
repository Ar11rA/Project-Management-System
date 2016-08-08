<!doctype html>
<html>
<head>
<style>
<style>
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:30px;
padding-top:20px;
padding-bottom:130px;
height:700px;
}
a{
	text-decoration:none;
	color:black;
	
}
input,select{
border:1px solid black;
border-radius:5px;
width:30%;
padding:0;
margin:0;
height:40px;
}
textarea
{
border:1px solid black;
border-radius:5px;
width:30%;
padding:0;
margin:0;
height:130px;
}
input[type=submit],button
{
margin:10px;
width:15%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}

</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<center><h1>PROJECT CLOSURE</h1></center>
<center>
<div class="bml">
<form name="pro_closure" METHOD="post" action="proclo.php">
<br/>
<center><h3>PROJECT</h3></center><br/>

<?php
//start session
session_start();
//connection parameters
include 'connect.php';
global $con;
//Get project for pm
$query = mysqli_query($con,"select * from project p,project_pm pm where p.Proj_Id = pm.Proj_Id and pm.Emp_Id='".$_SESSION['EID']."'"); 
//Select project in dropdown
echo '<select name="tid">'; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['Proj_Id']."\">".$row['Proj_Id']."->".$row['Proj_Name']."</option>";
}
echo"</select>";
?>
<br>

<center><h3>STATUS UPDATE</h3></center>
<select name="status">
<option value="complete" name="status">complete
<option value="pending" name="status">pending
</select>
<br>
<br>
<textarea name="lessons" rows="5" columns="10" placeholder="Lessons learnt" required>
</textarea>
<br>
<br>
<input type="submit" value="UPDATE">
<!--select project status and submit-->
<br/>
</form>
</center>
</div>
<div class="bml">

</div>
</body>
</html>