<html>
<body>

<?php 

session_start();
include 'connect.php';
global $con;
$old = $_POST["old"];
$new = $_POST["new"];
$new1 = $_POST["new1"];
if($new==$new1)
{
	$sql = "UPDATE admin SET Password = MD5('$new') WHERE AMID='".$_SESSION['EID']."'";
	if(mysqli_query($con, $sql)){
		echo "Record updated successfully";
		}
	else{
		echo "Error updating record: " . mysqli_error($link);
	}
}else{
		echo "password does not match";
	}
?>
</body>
</html>