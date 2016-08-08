<!doctype html>
<html>
<head>
<title>Project Deletion</title>
<style>
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
input,select{
border:1px solid black;
border-radius:5px;
width:40%;
padding:0;
margin:0;
height:40px;
}
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:50px;
padding-top:20px;
padding-bottom:130px;
height:620px;
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
}
select{width:35%;}
button	
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
}

</style>
</head>
<body>
<h1 style="text-align:center;margin-top:10px">Project Deletion</h1>
<div class="bml">

<?php
$c=0;
//connection parameters
$link = mysqli_connect('localhost', 'root', '','se_project');
$query = mysqli_query($link,'select * from project'); //select all projects
$num_rows=mysqli_num_rows($query);//run query
if($num_rows==0){echo "No projects created, nothing to display!";}
?>

         <table>
            <tr>
                <th>PROJECT ID</th>
                <th>PROJECT NAME</th>
                <th>PROJECT DESC</th>
                <th>NO OF HOURS</th>
                
            </tr>

            <?php
			//display tables in tabular format
               while ($row = mysqli_fetch_array($query)) {
?>
                  <tr>
                <td><?php echo $row['Proj_Id']; ?></td>
                <td><?php echo $row['Proj_Name']; ?></td>
                <td><?php echo $row['Proj_Desc']; ?></td>
                <td><?php echo $row['NoOfHrs']; ?></td>
               
                </tr>
    <?php
               }
$c=$c+1;
            ?>
        </table>
		<br>
		<br>
		<br>
<form name="f1" method="post" action="prodelfin.php">
<?php
//connection parameters
$link = mysqli_connect('localhost', 'root', '','se_project');
$query = mysqli_query($link,'select * from project'); //get all projects

//display in a dropdown so that the one to delete can be selected
echo "<select name=\"Project\">"; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['Proj_Id']."\">".$row['Proj_Name']."</option>";
}
echo "</select>";
?>
<br><br>
<input type="submit" value="Delete">
</form>
<br>
<br>
</div>
</body>
</html>
