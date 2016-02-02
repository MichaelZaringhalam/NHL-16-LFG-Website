<?php

session_start();	//starting session variable
$logon = FALSE;
if (isset($_SESSION['username']))
{
	$username		= $_SESSION['username'];
	$logon			= TRUE;
}

echo "<!DOCTYPE html>

<style>

/******************************
          Base styles
******************************/

body
{
	margin: 0;
	padding: 0;
	color: #333;
	background-color: #eee;
	font: 1em/1.2 'Helvetica Neue', Helvetica, Arial, Geneva, sans-serif;
}

h1,h2,h3,h4,h5,h6
{
	margin: 0 0 .5em;
	font-weight: 500;
	line-height: 1.1;
}

h1 { font-size: 2.25em; } /* 36px */
h2 { font-size: 1.75em; } /* 28px */
h3 { font-size: 1.375em; } /* 22px */
h4 { font-size: 1.125em; } /* 18px */
h5 { font-size: 1em; } /* 16px */
h6 { font-size: .875em; } /* 14px */

p
{
	margin: 0 0 1.5em;
	line-height: 1.5;
}

blockquote
{
	padding: 1em 2em;
	margin: 0 0 2em;
	border-left: 5px solid #eee;
}

hr
{
	height: 0;
	margin-top: 1em;
	margin-bottom: 2em;
	border: 0;
	border-top: 1px solid #ddd;
}

table
{
	background-color: transparent;
	border-spacing: 0;
	border-collapse: collapse;
}

th, td
{
	width: 1px;
	white-space: nowrap;
	padding: .5em 1em;
	vertical-align: top;
	text-align: left;
}

.inactiveLink {
   pointer-events: none;
   cursor: default;
}

	dt {
	padding: 4px;
	}

.bar {
margin-bottom: 10px;
color: #fff;
padding: 4px;
text-align: center;
background: -webkit-gradient(linear, left top, left bottom, from(#ff7617), to(#ba550f));
background-color: #ff7617;
-webkit-box-reflect: below 0 -webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0)), to(rgba(0,0,0,0.25)));
-webkit-border-radius: 2px;

border-radius: 2px;
-webkit-animation-name:bar;
-webkit-animation-duration:0.5s;
-webkit-animation-iteration-count:1;
-webkit-animation-timing-function:ease-out;
}

a:link { color: royalblue; }
a:visited { color: purple; }
a:focus { color: black; }
a:hover { color: green; }
a:active { color: red; }

/* -----------------------
Layout styles
------------------------*/

.container
{
	max-width: 50em;
	margin: 0 auto;
	background-color: #fff;
}

.header
{
	color: #fff;
	background: #555;
	padding: 1em 1.25em;
}

.header-heading { margin: 0; }

.nav-bar
{
	background: #000;
	padding: 0;
}



.content { padding: 1em 1.25em; }

.footer
{
	color: #fff;
	background: #000;
	padding: 1em 1.25em;
}

/*************************
           Nav
*************************/



#wrap	{
	width: 100%; /* Spans the width of the page */
	height: 50px; 
	margin: 0; /* Ensures there is no space between sides of the screen and the menu */
	z-index: 99; /* Makes sure that your menu remains on top of other page elements */
	position: relative; 
	background-color: #000000;
	}
	
	
	.navbar	{
	height: 50px;
        padding: 0;
	margin: 0;
	position: absolute; /* Ensures that the menu doesn’t affect other elements */
	border-right: 1px solid #000000; 
	}
	
	
	
	.navbar	{
	height: 50px;
        padding: 0;
	margin: 0;
	position: absolute; /* Ensures that the menu doesn’t affect other elements */
	border-right: 1px solid #000000; 
	}
	
	
	
	.navbar li 	{
			height: auto;
			width: 133.17px;  /* Each menu item is 150px wide */
			float: left;  /* This lines up the menu items horizontally */
			text-align: center;  /* All text is placed in the center of the box */
			list-style: none;  /* Removes the default styling (bullets) for the list */
			font: normal bold 12px/1.2em Arial, Verdana, Helvetica;  
			padding: 0;
			margin: 0;
			background-color: #111111;
                        }
	
	
	.navbar a	{							
		padding: 18px 0;  /* Adds a padding on the top and bottom so the text appears centered vertically */
		border-left: 1px solid #111111; /* Creates a border in a slightly lighter shade of blue than the background.  Combined with the right border, this creates a nice effect. */
		border-right: 1px solid #111111;
		border-bottom: 1px solid #111111;
		text-decoration: none;  
		color: #ffffff;		/*text color of original navbar*/
		display: block;
		background-color: black;	/*button colors of original navbar*/
		}
	
	
	
	.navbar li ul 	{
		display: none;  /* Hides the drop-down menu */
		height: auto;									
		margin: 0; /* Aligns drop-down box underneath the menu item */
		padding: 0; /* Aligns drop-down box underneath the menu item */	
		border: 1px solid #111111;		
		}				

.navbar li:hover ul 	{
                        display: block; /* Displays the drop-down box when the menu item is hovered over */
                        }
						
		

.navbar li ul li a 	{

background-color: #ffffff;
color: #000000;
			height: auto;

			list-style: none;  
			font: normal bold 12px/1.2em Arial, Verdana, Helvetica; 			
			
		border-left: 1px solid #444444; 
		border-right: 1px solid #444444; 
		border-top: 1px solid #ffffff; 
		border-bottom: 1px solid #ffaaffff; 
		}
				
.navbar li a:hover {
	background-color: #FF0000;	/*changes color of original navbar when hovering*/
}
				
.navbar li ul li a {
	background-color: grey;	/*sub navbar background and text color*/
	color: white;
}
				
.navbar li ul li a:hover
{
background-color: #111111;
color: #000000;
			height: auto;

			list-style: none;  
			font: normal bold 12px/1.2em Arial, Verdana, Helvetica; 


			background-color: #FF0000;	/*color when hovering over sub navbar*/
}


/* -----------------------
Single styles
------------------------*/

.img-responsive { max-width: 100%; }

.btn
{
	color: #fff !important;
	background-color: royalblue;
	border-color: #222;
	display: inline-block;
	padding: .5em 1em;
	margin-bottom: 0;
	font-weight: 400;
	line-height: 1.2;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	cursor: pointer;
	border: 1px solid transparent;
	border-radius: .2em;
	text-decoration: none;
}

.btn:hover
{
	color: #fff !important;
	background-color: green;
}

.btn:focus
{
	color: #fff !important;
	background-color: black;
}

.btn:active
{
	color: #fff !important;
	background-color: red;
}

.table
{
	width: 100%;
	max-width: 100%;
	margin-bottom: 20px;
}

.list-unstyled
{
	padding-left: 0;
	list-style: none;
}

.list-inline
{
	padding-left: 0;
	margin-left: -5px;
	list-style: none;
}

.list-inline > li
{
	display: inline-block;
	padding-right: 5px;
	padding-left: 5px;
}

/* -----------------------
Wide styles
------------------------*/

@media (min-width: 42em)
{
	.header { padding: 1.5em 3em; }
	.nav-bar { padding: 1em 3em; }
	.content { padding: 2em 3em; }
	.footer { padding: 2em 3em; }
	



}

div.pic {
	background-image: url('footer_lodyas.png');
}
</style>

<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<title>NHL16LFG.com</title>

	</head>
	<div class='pic'>
		<div class='container' style='border-left: solid; border-right: solid;'>
			<div class='header'>
				<div width='75%'>
				<img src='nhllogo.jpg' alt='Smiley face' width='25%'>
				<h1 class='header-heading'>NHL16 LFG</h1>
				</div>";
				
				if($logon)
				{
				echo"<div align='right' width='25% '>
				<h3>Welcome $username</h3>
				</div>
			";
}
else
{
echo"<div align='right' width='25%'>
				<h3>Welcome Guest</h3>
				</div>";
}

echo"</div>";


?>