<!doctype html>
<html>
<head>
<title>File Review</title>
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
}
th {
	background-color:#003;
	color:white;
	
}

</style>
</head>
<body>
<h1 style="text-align:center;margin-top:10px">File Review</h1>
<div class="bml">

<?php
$c=0;
//set up connection parameters
$link = mysqli_connect('localhost', 'root', '','se_project');
//select all available files
$query = mysqli_query($link,'select * from file'); 
$num_rows=mysqli_num_rows($query);
if($num_rows==0){echo "No files created, nothing to display!";}
?>

         <table>
            <tr>
                <th>FILE ID</th>
                <th>FILE NAME</th>
                <th>EMPLOYEE ID</th>
                <th>NO OF HOURS</th>
                </tr>

            <?php
			//display all files in a tabular format
               while ($row = mysqli_fetch_array($query)) {
?>
                  <tr>
                <td><?php echo $row['fileid']; ?></td>
                <td><?php echo $row['filename']; ?></td>
                <td><?php echo $row['empid']; ?></td>
                <td><?php echo $row['hours']; ?></td>
               
                </tr>
    <?php
               }
$c=$c+1;
            ?>
        </table>
		<br>
		<br>
<form name="f1" method="post" action="filefinrev.php">
<?php
//set up connection
$link = mysqli_connect('localhost', 'root', '','se_project');
//select all files
$query = mysqli_query($link,'select * from file'); 
//display all files in a dropdown
echo "<select name=\"File\">"; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['fileid']."\">".$row['filename']."</option>";
	}
echo "</select>";
?>
<br><br>
<input type="radio" name="stat" value="Approved" checked>Approved &nbsp;&nbsp;<input type="radio" name="stat" value="Rejected">Rejected 
<br><br><input type="submit" value="Submit">
</form>
<button name="goback">Go Back</button>
<br>
<br>
</div>
</body>

</html>
