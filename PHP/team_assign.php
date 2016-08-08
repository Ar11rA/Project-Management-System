<style>
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:20px;
padding-top:20px;
padding-bottom:130px;
height:600px;
}
table
{
width:75%;
margin-left:100px;
}
table td,th
{
padding:10px;
text-align:left;
}
table,table th,table td
{
border:1px solid black;
border-collapse:collapse;
}
table th{
background-color:#003;
	color:white;
}
select,input[type="text"]{width:35%;
height:25px;
}
button,input[type="submit"]	
{
margin:10px;
width:15%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}
#formwala{margin-left:30px;
width:65%;
height:35px;
border:1px solid black;
border-radius:3px;
background-color:hsla(135,85%,75%,0.4);
cursor:pointer;
}</style>

<?php
session_start();
$pm_id=$_SESSION['EID']="13BCE0122";
include 'confige.php';

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());

}
// Retrieve the Tasks Under the Project Manager
$sql="SELECT Proj_Id from project_pm WHERE Emp_Id='$pm_id'";
$result=mysqli_query($conn, $sql);
$project_id="";
if (mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    $project_id=$row['Proj_Id'];
}


?>
<!DOCTYPE html>
<html>
<head>

<style>
.icon-check
{
    font-size:20px;
    margin-right:5px;
    color: green;
    cursor:pointer;
}
</style>

<script src="team_assign.js"></script>

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<title>
    PM TASK ASSIGN
</title>

</head>

<body>
<div>
<div style="position:relative;margin:40px;display:inline-block;">
<span style="font-size:120%;">Select Task</span>

<?php

// Retrieve Task Details of a Project
$sql_task = "SELECT `TaskId`, `TaskName`, `TaskDesc`, `TaskStartDate`, `TaskEndDate`, `Hours`,`Members`,`Status` FROM `proj_task` WHERE ProId='$project_id'" ;
$result_task = mysqli_query($conn, $sql_task);
$complete=100;

echo '<select onchange="SelectTask(this.value,\''.$pm_id.'\');">
<option value="0">Select Task</option>';

// Select Only the Tasks which haven't been completed
if (mysqli_num_rows($result_task) > 0)
{
  while($row_task = mysqli_fetch_assoc($result_task))
  {
    if($row_task['Status']!=$complete)
    {
       echo '<option value="'.$row_task['TaskId'].'">'.$row_task['TaskName'].'</option>';
    }
  }
}
else
{
  echo '<option value="0">No Task Available</option>';
}
echo '</select>';

?>

</div>
</div>

<br>
<br>
<br>
<div style="margin:10px;">
<span style="font-size:130%;">Task</span>

<table id="task_table" border="1" style="width:80%; text-align:center;" >
     <tr>
        <th>Task Name</th>
        <th>Task Description</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Task Hours</th>
        <th>Total Members</th>
    </tr>
</table>
</div>
<div style="margin:40px 10px">
<span style="font-size:130%;">Members</span><br>
<span id="remaining" style="visibility:hidden"></span>
<!--  Members Table  -->
<table id="member_table" border="0" style="width:5%;text-align:center;" >
</table>
</div>
<button type="button" onclick="SubmitMembers()">Submit</button>
<div id="demo"></div>
</body>
</html>
