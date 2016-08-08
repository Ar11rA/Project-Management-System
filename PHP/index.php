<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
    <style>
body
{
	margin-left:0px;
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
.menu,
.menu ul,
.menu li,
.menu a
{
	margin:0;
	padding:0;
	outline:none;
	border:none;
}
.menu
{
	height:45px;
	width:100%;
	background:#666;
	border-radius:5px;
}
.menu li
{
	list-style:none;
	position:relative;
	float:left;
	display:block;
	height:40px;
}
.menu li a
{
	display:block;
	text-decoration:none;
	padding:0 35px;
	margin:6px 0;
	line-height:28px;
	 border-left: 1px solid #000;
	   color: #f3f3f3;
    border-right: 1px solid #000;
	 font-family: Helvetica, Arial, sans-serif;
    font-weight: bold;
    font-size: 13px;
	 text-shadow: 1px 1px 1px rgba(51,51,153,1);
	  -webkit-transition: color .5s ease-in-out;
    -moz-transition: color .2s ease-in-out;
    -o-transition: color .2s ease-in-out;
    -ms-transition: color .2s ease-in-out;
    transition: color .5s ease-in-out;
    }
	.menu li:first-child a { border-left: none; }
.menu li:last-child a{ border-right: 1px solid #000; }
.menu li:hover > a { color:#09F; }
.menu ul
{
	position:absolute;
	top:40px;
	left:0;
	 opacity: 0;
   background:#06F;
    -webkit-border-radius: 0 0 5px 5px;
    -moz-border-radius: 0 0 5px 5px;
    border-radius: 0 0 5px 5px;
 
    -webkit-transition: opacity .25s ease .1s;
    -moz-transition: opacity .25s ease .1s;
    -o-transition: opacity .25s ease .1s;
    -ms-transition: opacity .25s ease .1s;
    transition: opacity .25s ease .1s;
}
.menu li:hover > ul { opacity: 1; }
.menu ul li {
    height: 0;
    overflow: hidden;
    padding: 0;
 
    -webkit-transition: height .25s ease .1s;
    -moz-transition: height .25s ease .1s;
    -o-transition: height .25s ease .1s;
    -ms-transition: height .25s ease .1s;
    transition: height .25s ease .1s;
}
#slider
{
	height:400px;
	width:100%;
	background-color:#006;
}
#footer
{
	color:#FFF;
	background-color:#003;
	height:23px;
	width:100%;
	position:relative;
	top:40px;
	
}

</style>

</head>
<body style="background-color:#006;margin:-5px">
<div id="header">
<img src="logo.png" id="image_header">
<div id="inner_header">
SCOPE
</div>
</div>
<ul class="menu">
 
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
    <li><a href="AdminLogin.php">ACCOUNT MANAGER LOGIN</a></li>
    <li><a href="ProjectManagerLogin.php">PROJECT MANAGER LOGIN</a></li>
    <li><a href="TeamMemberLogin.php">TEAM MEMBER LOGIN</a></li>
 
</ul>
<div id="slider">
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
		<li><img src="data1/images/5.jpg" alt="5" title="5" id="wows1_0"/></li>
		<li><img src="data1/images/7.jpg" alt="7" title="7" id="wows1_1"/></li>
		<li><<img src="data1/images/9.jpg" alt="9" id="wows1_2"/></li>
		<li><img src="data1/images/lab.jpg" alt="lab" title="lab" id="wows1_3"/></li>
	</ul></div>

	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	</div>
    <div id="footer">
    <center>&copy;VIT UNIVERSITY</center>
    </div>
</body>
</html>
