<!doctype html>
<html>
<head>
<style>
*{
  margin: 0;
  padding: 0;
  border: 0;
}

html, body{
  width: 80%;
  height: 100%;
  font-family: 'Open Sans', sans-serif;
  font-weight: 200;
  margin-left:auto;
  margin-right:auto;
  position:relative;
}
header{
	margin-top: 5%;
	margin-bottom:2%;
	padding: 5px;
}
nav {
	border: 1px solid #332500;
	background-color:#006;
	color:white;
	padding: 20px;
	font-size: 20px;
}

#logout{
	float:right;
}
a {
	color:#ffffff;
}
legend{
	display:block;
	text-align:center;
	position:relative;
	width: 96%;
	border: 2px solid #332500;
	background: #003;
	padding: 15px;
	color: #fff;
	font-size: 25px;
}
#content{
	border: 2px solid black;
	height: 40%;
	padding: 8% 6%;
	margin-top: 5px;
}

.button{
	background-color: #4CAF50;
	border: black;
	border-radius: 8px;
	color:white;
	padding: 15px 32px;
	display: inline-block;
	margin-left: 25px;
	margin-top: 12%;
}

.label{
	float: left;
	width: 40%;
	margin-right: 2%;
	text-align: right;
}
label{
	float:right;
	display: block;
	padding: 10px 5px 10px 5px;
	margin: 3px;
	margin-bottom:5px;
	width: 70%;
}

.input{
	float: right;
	width: 55%;
	display: block;
}

#input1{
	display: block;
	padding: 10px 5px 10px 5px;
	margin-top: 6px;
	margin-bottom: 3px;
    border: 1px solid #EDEDED;
	border-radius: 4px;
	width: 70%;
	height: 15px;
	
}
select{width:40%;}
#back{
	float:left;
}
</style>
<meta charset="utf-8">
<title>Create Project</title>
</head>

<body>
<form name="pro_create" action="proc.php" method="post">
<fieldset>
<legend>CREATION OF PROJECT</legend>
<div id="content">
<div class="label">
<label>SYSTEM</label><br>
<label>PROJECT NAME</label><br>
<label>PROJECT MANAGER</label><br>
<label>START DATE</label><br>
<label>END DATE</label><br>
<label>PROJECT DESCRIPTION</label><br>
 <label>NUMBER OF HOURS ALLOTED</label><br>
 <label>NUMBER OF MEMBERS ALLOTED</label><br>
 </div>

<div class="input">

<?php
//connection parameters
$link = mysqli_connect('localhost', 'root', '','se_project');
//select all systems
$query = mysqli_query($link,'select * from system'); 
//put dropdown for systems
echo '<select name="system">'; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['SM_SystemID']."\">".$row['SM_SysName']."</option>";
	
}
echo "</select>";
echo "</br>";
?>
<br>
<input type="text" name="pro_name" placeholder="PROJECT NAME"  id="input1">
<br>
<?php
//connection parameters
$link = mysqli_connect('localhost', 'root', '','se_project');
//select only available and elligible project managers
$query = mysqli_query($link,'select * from employee where Emp_id not in (select Emp_Id from project_pm) AND Emp_id not in(select Emp_id from pm_emp)'); 
//dropdown for project manager
echo '<select name="pro_man">'; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['Emp_id']."\">".$row['Emp_Name']."</option>";
	
}
echo "</select>";
echo "</br>";
echo "</br>";

?>
<input type="date" name="start_date"  id="input1" required>
<input type="date" name="end_date"  id="input1" required>
<textarea name="text_area"  id="input1"placeholder="Enter the description" required></textarea>
<br>

<input type="number" min="1" name="pro_hours"  id="input1" required>
<br>

<input type="number" min="1" name="pro_members"  id="input1" required>
<br>

</div>
<input type="submit" name="submit" value="submit" class="button">
</div>
</fieldset>
</form>
		</body>
</html>