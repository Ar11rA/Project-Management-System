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
	$query = "select Emp_Name from employee where Emp_id = '".$_SESSION['EID']."' and Password = '".MD5($old)."'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	if($row['Emp_Name'] == $_SESSION['valid_user1']){
		$eid = $_SESSION['EID'];
		$sql = "UPDATE employee SET Password = MD5('$new') where Emp_id = '$eid'";
		if(mysqli_query($con, $sql)){
				echo "Record updated successfully";}
		else {
				echo "Error updating record: " . mysqli_error($con);
			}
		
		}
}else{
	echo "password does not match";
}

?>
</body>
</html>