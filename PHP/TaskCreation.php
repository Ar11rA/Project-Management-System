<!doctype html>
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
width:40%;
padding:0;
margin:0;
height:40px;
}
textarea
{
border:1px solid black;
border-radius:5px;
width:40%;
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
</head>
<body>
<center>
<h1 style="text-align:center;margin-top:30px">Task Creation</h1>
<h3 style="text-align:center;">Logged in as <?php session_start(); echo $_SESSION['valid_user1']; ?></h3>
<div class="bml">
<form action="tskc.php" method="post">
<b>Task Name:</b><br><br>
<input type="text" name="tskname" placeholder="Enter Task Name" required >
<br>
<br>
<b>Task Description:</b></br><br>
<textarea name="tskdesc" placeholder="Enter Task Description" rows="10" cols="60" required>
</textarea>	
<br>
<br>

<b>Start Date:</b></br>
<input type="date" name="taskstart" placeholder="Enter start date" required >
<br>
<br>
<b>End Date:</b></br>
<input type="date" name="taskend" placeholder="Enter end date" required >
<br><br>
<b>Number Of Hours:</b></br>
<input type="number" min="1" name="noofhours" placeholder="Enter number of hours" required >
<br><br>
<b>Number Of Members:</b></br>
<input type="number" min="1" max="10" name="noofmem" placeholder="Enter number of members" required >
<br><br>
<input type="submit" onSubmit="CreatedSuccessfully.html"><button name="goback"><a href="ProjectManagerHome.html">Go Back</a></button>
<br>
<br>

</form>
</div>
</center>
</body>
</html>
