
<!DOCTYPE html>
<html>
<head>
<style>
body
{
	margin-left:0px;
	background-color:#666;
}
#header
{

	height:120px;
	width:100%;
	background-color:#003;
}
#inner_header
{
	position:absolute;
	height:40px;
	width:20%;
	top:20px;
	left:50%;
	padding-left:400px;
	padding-top:30px;
	font-size:44px;
	color:#FFF;
	
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color:#666;
}

li a {
    display: block;
    color: white;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color:#000040;
    color: white;
}

li a:hover:not(.active) {
    background-color: #000040;
    color: white;
}
</style>
</head>
<body>

<!--<div id="header">
//<img src="New folder/logo.png" id="image_header">
//<div id="inner_header">
//SCOPE
//</div>
//</div>-->
<title>AM HOME</title>

<ul>
  <li><a class="active" href="#home">ACCOUNT MANAGER</a></li>
<li><a href="xl_upload.php" target="content">UPLOAD EMPLOYEE DATABASE</a></li>
      <li><a href="syscr.html" target="content">SYSTEM CREATION</a></li>
  <li><a href="ProjectCreate.php" target="content">CREATE PROJECT</a></li>
   <li><a href="proj_mod.php" target="content">MODIFY PROJECT</a></li>
   <li><a href="ProjectDeletion.php" target="content">DELETE PROJECT</a></li>
    <li><a href="fm_viewstatus.php" target="content">VIEW STATUS</a></li>
  <li><a href="project_team_assign.php" target="content">TEAM ASSIGNMENT</a></li>
  <li><a href="pm_empdel.php" target="content">DELETE TEAM ASSIGNMENT</a></li>
  <li><a href="ViewTeams.php" target="content">VIEW ALL TEAM</a></li>
  <li><a href="changepass_am.php" target="content">CHANGE PASSWORD</a></li>
    <li><a href="login_am.php" target="_parent">LOGOUT</a></li>
 
</ul>
</body>
</html>
