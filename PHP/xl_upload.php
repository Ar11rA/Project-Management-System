<style>
.bml{
text-align:center;
margin-left:200px;
margin-right:200px;
margin-top:30px;
padding-top:20px;
padding-bottom:130px;
height:700px;
}
a{
	text-decoration:none;
	color:black;
	
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
<div class="bml">
<h1>Excel Upload</h1><br><br>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "se_project";
 
 
$conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
mysql_select_db("$database", $conn);


if(isset($_POST["submit"]))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	$sql = "abc";
	while(($filesop = fgetcsv($handle, 10000, ",")) !== false)
	{
		$reg_no = $filesop[0];
		$name = $filesop[1];
		$eid = $filesop[2];
		$password = $filesop[3];
		$email = $filesop[4];
		$designation = $filesop[5];
		$sql = mysql_query("INSERT INTO employee VALUES ('$reg_no','$name','$email','$eid',MD5('$password'),'$designation')");
	}
	
		if($sql){
			echo "You database has imported successfully";
		}else{
			echo "Sorry! There is some problem.";
		}
}

echo '<form name="import" method="post" enctype="multipart/form-data">';
    	echo '<input type="file" name="file" />';
		echo '<br />';
		echo '<br />';
        echo '<input type="submit" name="submit" value="Submit" />';
echo '</form>';
?>
</div>