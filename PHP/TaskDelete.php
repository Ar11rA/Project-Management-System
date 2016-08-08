<html>
<head><title>Delete Task</title>
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
select,input[type="text"]{width:15%;
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
</head>
<body>
<div class="main">
<center>
<h1>DELETE TASK</h1>

<?php
	include 'connect.php';//connection parameters
	global $con;
	session_start();//start session for logged in user
	
	$query1 = mysqli_query($con,"select Proj_Id from project_pm where Emp_Id = '".$_SESSION['EID']."'");//get logged in person's projects
	$row1 = mysqli_fetch_row($query1);//run query
	$projid = $_SESSION['projid'];//get project id from session variable
	
$c=0;
$query = mysqli_query($con,"select * from proj_task where ProId = '".$projid."'"); //get corresponding project tasks 
?>

        
         <table>
            <tr>
                <th>TASK ID</th>
                <th>TASK NAME</th>
                <th>TASK DESC</th>
                <th>NO OF HOURS</th>
                
            </tr>

            <?php
			//display tables in tabular format
               while ($row = mysqli_fetch_array($query)) {
?>
                  <tr>
                <td><?php echo $row['TaskId']; ?></td>
                <td><?php echo $row['TaskName']; ?></td>
                <td><?php echo $row['TaskDesc']; ?></td>
                <td><?php echo $row['Hours']; ?></td>
               
                </tr>
    <?php
               }
$c=$c+1;
            ?>
        </table>
				<br /><br />
<form name="f1" method="post" action="taskdelfin.php">
<?php
//display which one to delete in a dropdown
$query = mysqli_query($con,"select * from proj_task where ProId = '".$projid."'"); //select task id and name

//echo html element select
echo "<select name=\"Task\">"; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['TaskId']."\">".$row['TaskName']."</option>";
	}
echo "</select>";
?>
<br>
<input type="submit" value="Delete">
</form>


</center>
</div>
</body>
<script>
function func(o) {
     var p=o.parentNode.parentNode;
         p.parentNode.removeChild(p);
    }
	</script>

</html>
