<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>

	<title>Star Wars - Edges of The Lost Warriors</title>
<?php #Incluir los Datos del HEADER 
include 'header/genstyle.php';
include 'header/topm.php';

?> 



	
</head>

<body background="images/bg1.gif" text="#FFFFFF" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFF99" marginwidth="0" marginheight="0" style="margin: 0" onLoad="writeMenus()" onResize="if (isNS4) nsResizeHandler()">



<?php
include 'header/toolt.php'; 
include 'var.php';
$ach=date(H);
$acm=date(i);
$dReal = ($fe[val]*24)+$ach;
$dFicha = ($us[dia]*24)+$us[hora];

if ($_SESSION[nombre]==""){echo "<script> location.href='http://swedges.tk' </script>";}


$i=0;
$sql=mysql_query("SELECT * FROM sw_board_proyectos")or die(mysql_error());
while ($row=mysql_fetch_array($sql)){$i++;}
?>
	
<table width="100%">
<tr>
       <td>
			 		<small>SW-eotlw 0.3 es una creación de <a href="http://jagcompany.civitis.com">JAGCompany</a></small>
       </td>
			 <td>
			 <?php
			 if ($us[puntos]>$us[next]){include 'lvlup.php';}
			 if ($dFicha < $dReal){include_once 'changeday.php';}
			 ?>
			 </td>
       <td>
	   	   <div align="right">
		   		<?php if($us[admin]>0){?> <a target="_BLANK" href="admin" onMouseover=" ddrivetip('Entrar en sección de Administración', '#808080');" onMouseout="hideddrivetip()"><img height=10 width=10 src="http://jagcompany.civitis.com/sw-eotlw/juego/images/admin.gif" border=0></a> <? }?>
				<a target="_BLANK" href="http://jagcompany.civitis.com/sw-eotlw/proyectos" onMouseover=" ddrivetip('Abrir documentacion de Proyectos.<br>Comentarios: <?=$i?>', '#808080');" onMouseout="hideddrivetip()"><img height=10 src="http://jagcompany.civitis.com/sw-eotlw/juego/images/pro.gif" border=0></a>
		   </div>
	   </td>
</tr>
</table>



<br>
<center>
<table border="1" width=700 bgcolor="#000000" bordercolorlight="#ffffff" bordercolordark="#e1e1e1">
	   <caption align="top">
	   			<center><img src="images/logo.gif" height="75"></center>
	   </caption>
	   <tr>
	   	   <td VALIGN="top" width="100%" height=24>

		   </td>
	   </tr>
	   <tr>
	   	   <td>
		   	   <table whidth="100%">
			   		  <tr>
					  	  <td width=600 VALIGN="TOP">