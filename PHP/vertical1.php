
<!DOCTYPE html>
<html>
<head>
<style>
body
{
	margin-left:0px;
	background-color:#666;
}
#header
{

	height:120px;
	width:100%;
	background-color:#003;
}
#inner_header
{
	position:absolute;
	height:40px;
	width:20%;
	top:20px;
	left:50%;
	padding-left:400px;
	padding-top:30px;
	font-size:44px;
	color:#FFF;
	
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color:#666;
}

li a {
    display: block;
    color: white;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color:#000040;
    color: white;
}

li a:hover:not(.active) {
    background-color: #000040;
    color: white;
}
</style>
</head>
<body>
<title>AM HOME</title>
<ul>
  <li><a class="active">PROJECT MANAGER</li>
  <li><a href="TaskCreation.php" target="content">CREATE TASK</a></li>
  <li><a href="TaskDelete.php" target="content">DELETE TASK</a></li>
  <li><a href="task_mod1.php" target="content">MODIFY TASK</a></li>
  <li><a href="Status.php" target="content">VIEW STATUS</a></li>
  <li><a href="team_assign.php" target="content">TASK ASSIGNMENT</a></li>
  <li><a href="delete_task_employee.php" target="content">TASK ASSIGNMENT DELETION</a></li>
  <li><a href="cost.php" target="content">COST ESTIMATION</a></li>
  <li><a href="ProTaskClosure.php" target="content">PROJECT CLOSURE</a></li>
  <li><a href="reportgeneration.php" target="content">REPORT GENERATION</a></li>
  <li><a href="filerev.php" target="content">FILE REVIEW</a></li>
  <li><a href="changepass_pm.php" target="content">CHANGE PASSWORD</a></li>
  <li><a href="logout.php" target="_parent">LOGOUT</a></li>

 
</ul>
</body>
</html>
