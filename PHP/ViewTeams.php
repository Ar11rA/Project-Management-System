<html>
<head>
<style>

.bml{
text-align:center;
margin-left:165px;
margin-right:165px;
margin-top:10px;
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
width:15%;
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

b
{text-align:center;
font-size:20px;
}
</style>

<title>View Teams</title>
</head>
<body style="margin-left: 150px;">
<div class="bml">
<?php
session_start();
?>
<P>LOGGED IN AS <?php echo $_SESSION['valid_user']; ?></P>
<form  method="post" action="view.php">
PROJECT:<br><br>
<?php

$link = mysqli_connect('localhost', 'root', '','se_project');
$query = mysqli_query($link,'select * from project_pm'); 


echo "<select name=\"project\">"; 
while ($row = mysqli_fetch_assoc($query)) {
	$val=$row['Emp_Id'];
	
	echo "<option value=\"".$val."\">".$row['Proj_Id']."</option>";
	
}
echo "</select>";
?>
	<br><br>
<input type="submit" value="Submit"/>	
	
  
  </form>

</body>
</html>
