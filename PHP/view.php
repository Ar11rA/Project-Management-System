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

</style>
<div class="bml">
<h1> TEAM DETAILS </h1>
<?php
	$servername = "localhost";
    $usernam = "root";
    $passwor = "";

// Create connection
$conn = mysqli_connect($servername, $usernam, $passwor, 'se_project');

$a=$_POST['project'];//employee id of PM


$q=mysqli_query($conn, "SELECT * FROM pm_emp WHERE Pm_id = '$a'");


echo "<table border='1'>

<tr>

<th>   PMID</th>
<th>   EID</th>
<th>   Ename</th>
</tr>";



echo "<tr>";


$eid="";
$ename="";
while($row = mysqli_fetch_assoc($q))
{
echo "<td>" .$a. "</td>";	
	
	$eid=$row['Emp_id'];
$qu=mysqli_query($conn, "SELECT Emp_Name FROM employee WHERE Emp_id = '$eid'");
	$r = mysqli_fetch_assoc($qu);
	$ename=$r['Emp_Name'];
	
	


echo "<td>" . $eid . "</td>";
echo "<td>" . $ename . "</td>";
echo "</tr>";
}
echo"</table>";

?>
</div>