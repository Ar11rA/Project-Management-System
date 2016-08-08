<!doctype html>
<html>
<head>
<style>
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:20px;
padding-top:10px;
padding-bottom:130px;
height:620px;
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
<h1 style="text-align:center;margin-top:30px">File Upload</h1>
<h3 style="text-align:center;">Logged in as <?php
//start seesion and get employee id
 session_start(); echo $_SESSION['valid_user2'];?> </h3>
<div class="bml">
<form action="tm_file_sub.php" method="post">
<b>File Name:</b><br><br>
<input type="text" name="filename" placeholder="Enter File Name" required >
<br>
<br>
<b>Number of Hours:</b></br><br>
<input type="number" name="NoOfHours" placeholder="Enter Number of Hours" required >
<br>
<br>
<b>Comments:</b></br><br>
<textarea name="comments" rows="10" cols="30">
</textarea>
<br>
<br>
<input type="submit" />
<br>
<br>
<button name="goback"><a href="teamhome.php">Go Back</a></button>
<br>
<br>
</form>
</div>
</body>
</html>