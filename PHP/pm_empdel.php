<html>
<head><title>Delete Assignment</title>
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
<h1>DELETE PROJECT ASSIGNMENT</h1>

<?php
	include 'connect.php';//connection parameters
	global $con;
	session_start();//start session for logged in user
	
	
$query = mysqli_query($con,"select * from pm_emp"); //get corresponding project tasks 
?>

         
         <table>
            <tr>
                <th>PROJECT MANAGER ID</th>
                <th>EMPLOYEE ID</th>
                
            </tr>

            <?php
			//display tables in tabular format
               while ($row = mysqli_fetch_array($query)) {
?>
                  <tr>
                <td><?php echo $row['Pm_id']; ?></td>
                <td><?php echo $row['Emp_id']; ?></td>
                
                </tr>
    <?php
               }

            ?>
        </table>
				<br /><br />
<form name="f1" method="post" action="pmempdelfin.php">
<?php
//display which one to delete in a dropdown
$query = mysqli_query($con,"select * from pm_emp"); //select task id and name

//echo html element select
echo "<select name=\"Emp\">"; 
while ($row = mysqli_fetch_array($query)) {
	echo "<option value=\"".$row['Emp_id']."\">".$row['Emp_id']."</option>";
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
