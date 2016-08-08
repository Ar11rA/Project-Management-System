<html>
<body>

<?php 

$link = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('se_project', $link); 
$query = mysql_query('select * from system_master'); 

$sn =$_POST["sysname"];
$sd =$_POST["sysdesc"];

$q2="select * from system";
$q1=mysql_query($q2);
$n1=mysql_num_rows($q1);
if ($n1 > 0)
{
while ($row = mysql_fetch_array($q1))
	$a = $row['SM_SystemID'];

//echo $las."<br>";
$a1=str_split($a);
$cnt=$a1[count($a1)-1];
//echo $cnt."<br>";
$cn=0;
$cn=(int)$cnt+1;
//echo $cn."<br>";
$a1[count($a1)-1]=(string)$cn;
$arr2=implode("",$a1);
print_r($arr2);	
$sql = "INSERT INTO `se_project`.`system` (`SM_SystemID`, `SM_SysName`, `SM_SysDesc`) VALUES ('$arr2', '$sn', '$sd');";
    mysql_select_db('se_project');
   $runq = mysql_query( $sql, $link );
   if($runq)
	 echo 'successful';
 else
echo 'unsuccessful    '. mysql_error();
}
else
{
	
	$sql = "INSERT INTO `se_project`.`system` (`SM_SystemID`, `SM_SysName`, `SM_SysDesc`) VALUES ('S1', '$sn', '$sd');";
    mysql_select_db('se_project');
   $runq = mysql_query( $sql, $link );
   if($runq)
	 echo 'successful';
 else
echo 'unsuccessful    '. mysql_error();

}
?>

</body>
</html>