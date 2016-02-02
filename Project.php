<?php

$pgm = "Project.php"; //name of project
$width = 700;
$title = "NHL16 LFG";
$offenseCategories = array("Sniper", "Power Forward", "Playmaker", "Grinder", "Enforcer", "2 Way Forward");
$defenseCategories = array("2 way Defenseman", "Offensive Defenseman", "Defensive Defenseman");
$goalieCategories = array("Butterfly", "Stand-up Goalie", "Hybrid Goalie");

echo "<html>
<style type='text/css'>
/* Derived from http://www.devinrolsen.com/pure-css-horizontal-menu/ */

#pagebody { position: inherit !important; width: 100%; } /* DO NOT EDIT */
#pagebody-inner { position: inherit !important; width: 100%; } /* DO NOT EDIT */

#alpha, #beta, #gamma, #delta {
    display: inline; /* DO NOT EDIT */
    position: inherit !important; /* DO NOT EDIT */
    float: left; /* DO NOT EDIT */
    min-height: 1px; /* DO NOT EDIT */
}

#centernav {
  width: 90%; /* if you want your nav centered, set this to the width of your container, if you don't want it centered, change this number to 100% */
  margin-left: auto ;
  margin-right: auto ;
}

#dropnav 
{height:25px; background:#555;} /* Changes the height and bg color of the main menu */

#dropnav ul
{margin:0px; padding:0px;}

#dropnav ul li
{display:inline; float:left; list-style:none; margin-left:15px; position:relative; height: 35px; width: 125px;} /* only edit the last 2 items - sets the width of the main menu */

#dropnav li a
{color:#FFF; text-decoration:none;} /* Changes the link color of items on the main menu */

#dropnav li a:hover
{color:#900; text-decoration:none;}/* Changes the hover color of items on the main menu */

#dropnav li ul
{margin:0px; padding:0px; display:none; position:absolute; left:0px; z-index: 99; top:25px; background-color:#CCC;} /* Only edit the last 2 items - set the top margin and background color of the submenus */

#dropnav li:hover ul
{display:block; width:150px;} /* sets the width of the submenus */

#dropnav li li
{list-style:none; display:list-item;} /* DO NOT EDIT */

#dropnav li li a
{color:#000; text-decoration:none;} /* Changes the link color of items in the submenu */

#dropnav li li a:hover
{color:#900; text-decoration:none;} /* Changes the hover color of items in the submenu */

li#main  {padding-top: 2px;} /* Sets the padding of items in the main menu */

</style>

<head>
<div id='centernav'>
	<div id='dropnav'>
    <ul>
    	<li id='main'><a href='/'>NHL16 LFG</a></li>
        <li id='main'><a href='/'>Player Types</a>
			<ul id='subnav'>
			<li><a href='/'>NHL16 LFG</a></li>
			<li><a href='/'>NHL16 LFG</a></li>
			<li><a href='/'>NHL16 LFG</a></li>
			<li><a href='/'>NHL16 LFG</a></li>
			<li><a href='/'>NHL16 LFG</a></li>
			<li><a href='/'>NHL16 LFG</a></li>
			<li><a href='/'>NHL16 LFG</a></li>
			<li><a href='/'>NHL16 LFG</a></li>
			<li id='main'><a href='/'>NHL16 LFG</a>
				<ul id='subnav'>
					<li><a href='/'>NHL16 LFG</a></li>
					<li><a href='/'>NHL16 LFG</a></li>
				</ul>
			</li>
			</ul>
		</li>
  		<li id='main'><a href='/'>Help</a></li>
 		<li id='main'><a href='/'>About</a></li>
		<li id='main'><a href='/'>Register</a></li>
        <li id='main'><a href='/'>Log In</a></li>

	</ul>
	</div>
</div>

<title>NHL16 LFG</title>

</head>

<body>
<h2>NHL16 Looking For Group</h2>
</body>
</html>
";




?>