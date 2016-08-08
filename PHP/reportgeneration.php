<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
width:40%;
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
width:19%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}

b
{text-align:center;
font-size:20px;
}
</style>
</head>

<title>Report Generation</title>
</head>

<body>
<center><h1>REPORT GENERATION</h1></center>
<center>
<div class="bml">

<form action="reportgeneration1.php" method="post">
<br>
<br>
<?php
//start session
session_start();
//connection parameters
$link = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('se_project', $link); 
//run query to get projects
$query = mysql_query('select * from project'); 
//put dropdown for projects
echo '<select name="project">'; 
while ($row = mysql_fetch_array($query)) {
	echo "<option value=\"".$row['Proj_Id']."\">".$row['Proj_Id']."->".$row['Proj_Name']."</option>";
	
}
echo "</select>";


?>

<br>
<br>
<input type="submit" value="GENERATE REPORT">
<br>
<br>
</form>
</div>
</center>
</body></html>