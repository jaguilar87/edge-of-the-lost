<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Los Creadores de Star Wars - Edges of The lost Warriors</title>
<?php include 'juego/header/style/genstyle.php'; ?>
</head>
<body text="#FFFFFF" bgcolor="#000000" background="juego/images/bg1.gif" link="#FFFFAE" vlink="#FFEFAE">
<center>
<table summary="" bgcolor="#000000">

			 <tr>
			 		 <td width=500>
					 	 								 		 La siguiente es una lista de reconocimiento a todos aquellos que han contribuido con la creaci�n de este juego.<br />
																 <br /><center><table summary=""><tr><td>
																 <?php 
																 include('juego/db.php');
													 			 $sqla=mysql_query("SELECT * FROM sw_staff")or die(mysql_error());
																  while ($r=mysql_fetch_array($sqla)){
																 				echo "<i>$r[cargo]:</i> <br> &nbsp; &nbsp; <b><a href='$r[web]' target='_blank'>$r[nombre]</a></b> (<a href='mailto:$r[mail]' target='_blank'><img src='juego/images/msg.gif' width='11' height='7' border=0></a>";
																				if ($r[mes]==1){ echo "<img src='juego/images/msn.gif' border=0>"; }
																				echo ")<br><br>";
																 }
																 ?></td></tr></table></center>
																 <br>Y por supuesto un especial gracias a todos los jugadores y Betatesters.				 
					 
					 
					 </td>
			 </tr>
			 
</table>


</center>
</body>
</html>
