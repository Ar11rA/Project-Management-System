<br>
<br>
<center><h1>Status Upload
</h1></center>
<br>
<br>
<br>
<br>
<center>
<form name="f1" method="post" action="tm_status_upload.php">

<?php
//set session
session_start();
//connection parameters
$link = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('se_project', $link); 
//get employee id from session variable
$tm = $_SESSION['id'];
$query = mysql_query("select * from task_employee where Emp_Id= '$tm'"); 

//display all tasks in a dropdown
echo '<select name="Task">'; 
while ($row = mysql_fetch_array($query)) {
	echo "<option value=\"".$row['Task_ID']."\">".$row['Task_ID']."</option>";
}
echo "</select>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";

echo '<input type="number" name="status" min="0" max="100">';
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";

?>
<input type="submit" value="Update">

</form>
</center>
