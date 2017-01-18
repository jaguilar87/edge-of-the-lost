<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>

	<title>Star Wars - Edges of The Lost Warriors</title>

<style>
BODY {
scrollbar-face-color: #000000;
scrollbar-highlight-color: #666666;
scrollbar-3dlight-color: #000000;
scrollbar-darkshadow-color: #000000;
scrollbar-shadow-color: #000000;
scrollbar-arrow-color: #666666;
scrollbar-track-color: #000000;
}
</STYLE>

<style type="text/css">
<!--

.Navlink {COLOR: #000000; TEXT-DECORATION: none; font-family: times; font-size: 10pt; }
a:link.Navlink  {color : #000000;}
a:visited.Navlink  {color : #000000;}
a:active.Navlink  {text-decoration: none;}
a:hover.Navlink  {text-decoration: none;}

-->
</style>

<style type="text/css">

#dhtmltooltip{
position: absolute;
width: 250px;
border: 2px solid black;
padding: 2px;
background-color: lightyellow;
visibility: hidden;
z-index: 100;

}
</style>

	<style>
A {
	color: #FFFFCC;
	text-decoration: none;
}
A:hover {
	color: #ffffff;
	text-decoration: underline;
</style>

</head>

<body background="images/bg1.gif" text="#FFFFFF" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFF99">


<div id="dhtmltooltip"></div>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.x+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.y+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>


<script language = "javascript">
<!--

function LmOver(elem, clr)
{elem.style.backgroundColor = clr;
elem.children.tags('A')[0].style.color = "#000000";
elem.style.cursor = 'hand'}

function LmOut(elem, clr)
{elem.style.backgroundColor = clr;
elem.children.tags('A')[0].style.color = "#000000";}

function LmDown(elem, clr)
{elem.style.backgroundColor = clr;
elem.children.tags('A')[0].style.color = "#000000";}

function LmUp(path)
{location.href = path;}

//-->
</script>


<? include 'var.php';
$ach=date(H);
$acm=date(i);
$date = ($fe[dia]*24)+$ach;
$datex = ($us[dia]*24)+$us[hora];

if ($datex < $date){include_once 'changeday.php';}
?>
	


<small>SW-eotlw es una creación de <a href="http://jagcompany.civitis.com">JAGCompany</a></small><br><br>
<center>
<table border="1" width=600 bgcolor="#000000" bordercolorlight="#ffffff" bordercolordark="#e1e1e1">
	   <caption align="top">
	   			<center><img src="images/logo.gif"></center>
	   </caption>
	   <tr>
	   	   <td VALIGN="top" width=600 height=24>
		   	   <?php include 'topm.php'; ?>
		   </td>
	   </tr>
	   <tr>
	   	   <td>
		   	   <table whidth=600>
			   		  <tr>
					  	  <td width=500 VALIGN="TOP">
