<?php 
$servername = "localhost";
    $usernam = "root";
    $passwor = "";
$conn = mysqli_connect($servername, $usernam, $passwor, 'se_project');
//if($conn)
	//echo "connected";
	
session_start();
$usr=$_SESSION['EID'];
?>

<html>
	<head>
		<Title> PM view status </title>
	</head>
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
<div class="bml">
<h1 > TASK STATUS </h1> 		
		<br>
			<br>
			<br>
 <table border="1" style="width:80%; text-align:center;" >
     <tr>
        <th>Project ID  </th>
        <th>Task ID</th>
		<th>Task Name  </th>
		<th>Task Description  </th>
		<th>Task Start Date </th>
		<th>Task End Date </th>
		<th>Number of Hours</th>
		<th>Members </th>
		<th>Status </th>
		
     </tr>
	 
	 <?php
       $query1 = mysqli_query($conn,"select Proj_Id from project_pm where Emp_Id = '".$_SESSION['EID']."'");
	$row1 = mysqli_fetch_row($query1);
	$projid = $_SESSION['projid'];
$res= mysqli_query($conn,"select * from proj_task where ProId = '".$projid."'"); 

	   //$res = mysqli_query($conn, "SELECT * FROM proj_task");
	   while($row = mysqli_fetch_assoc($res)){
		
	 ?>
	 
	 
     <tr>
         <td><?php echo $row['ProId'];?></td>
         <td><?php echo $row['TaskId'];?> </td>
		 <td><?php echo $row['TaskName'];?> </td>
		 <td><?php echo $row['TaskDesc'];?> </td>
		 <td><?php echo $row['TaskStartDate'];?> </td>
		 <td><?php echo $row['TaskEndDate'];?> </td>
		 <td><?php echo $row['Hours'];?> </td>
		 <td><?php echo $row['Members']; ?></td>
		 <td><?php echo $row['Status']; ?></td>
     
	 </tr>
	   <?php } ?>
 </table> 
 </div>
</html>