<?php

include 'juego/db.php';

session_start();

if ($_SESSION[nombre] != "") {
	echo "<script> location.href='juego/' </script>";
}

$i=0;
$j=0;
$k=0;
$equi=0;

$c= "SELECT * FROM `sw_users`";
$result = mysql_query($c) or die(mysql_error());
while ($user = mysql_fetch_array($result)) {
	$i++;
	$equi += $user[lado];
}

$equi = round($equi);
$c = "SELECT * FROM `sw_att`";
$result = mysql_query($c) or die(mysql_error());
while ($user = mysql_fetch_array($result)) {
	$j++;
}

$c = "SELECT * FROM `sw_city`";
$result = mysql_query($c) or die(mysql_error());
while ($user= mysql_fetch_array($result)) {
	$k++;
}

$c = "SELECT * FROM `sw_board_noticias` WHERE tipo='ULTIMA NOTICIA'";
$result = mysql_query($c) or die(mysql_error());
$not = mysql_fetch_array($result);

chdir('juego/');

?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
  <html>
  <head>
    <title>Star Wars - Edge of The Lost Warriors</title>
    <?php include 'header/style.php'; ?>
      <meta http-equiv="Page-Enter" content="revealTrans(Duration=1.0,Transition=23)">
  </head>
  <body text="#FFFFFF" bgcolor="#000000" background="juego/images/bg1.gif" link="#FFFFAE" vlink="#FFEFAE">
    <div align="center">
      <center>
        <p>&nbsp;</p>
        <div align="center">
          <center>
            <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="661" id="AutoNumber4" height="184">
              <tr>
                <td width="33%" height="184" style="border-style: none; border-width: medium">
                  <div align="center">
                    <center>
                      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" bordercolor="#111111" width="661" id="AutoNumber5">
                        <tr>
                          <td width="661" align="center" style="border-style: none; border-width: medium">
                            <img border="0" src="juego/images/edge456.gif" width="661" height="235">
                            <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="100%" id="AutoNumber6" height="178" bgcolor="#000000">
                              <tr>
                                <td width="71" style="border-style: none; border-width: medium" background="juego/images/borde1.jpg" height="176">
                                  &nbsp;</td>
                                <td style="border-style: none; border-width: medium" height="176">&nbsp;
                                  <div align="center">
                                    <center>
                                      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="90%" id="AutoNumber7">
                                        <tr>
                                          <td width="90%" align="center" style="border-style: none; border-width: medium">
                                            <font face="Verdana" style="font-size: 8pt">Bienvenido a <strong>
<font color="#ffffae">Star Wars - Edges of the Lost Warriors</font> <small>New Age</small>.</strong>
                                            </font>
                                            </p>
                                            <p style="margin-top: 0; margin-bottom: 0">
                                              <font face="Verdana" style="font-size: 8pt">&iquest;Con qu&eacute; nombre
quieres que te recuerde la historia? </font></p>
                                            <table width="473">
                                              <tr>
                                                <td width="198">
                                                  <p align="center">
                                                    <font face="Verdana" style="font-size: 8pt">
<?php
echo "<font color=\"#ffff00\">$i</font> Jugadores.<br><font color=\"#ffff00\">$j</font> Ataques.<br><font color=\"#ffff00\">$k</font> Ciudades.<br><br>Equilibrio en la Fuerza:<font color=\""; 
echo ($equi>0) ? "#ccccff" : "#ffcccc" ;
echo "\">$equi</font>";
?>
                                                    <td width="265">
                                                      <div align="right" style="width: 222; height: 140">
                                                        <form action="login.php" method="post">
                                                          <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
                                                          <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="100%" id="AutoNumber8">
                                                            <tr>
                                                              <td width="50%" style="border-style: none; border-width: medium">
                                                                <p style="margin-top: 0; margin-bottom: 0">
                                                                  <font face="Verdana"><span style="font-size: 8pt">
Nombre:
</span></font>
                                                              </td>
                                                              <td width="50%" style="border-style: none; border-width: medium">
                                                                <p style="margin-top: 0; margin-bottom: 0">
                                                                  <font face="Verdana"><span style="font-size: 8pt">
<input name="name" value type="text" size="19"></span></font></td>
                                                            </tr>
                                                            <tr>
                                                              <td width="50%" style="border-style: none; border-width: medium">
                                                                <p style="margin-top: 0; margin-bottom: 0">
                                                                  <font face="Verdana"><span style="font-size: 8pt">
Password:</span></font></td>
                                                              <td width="50%" style="border-style: none; border-width: medium">
                                                                <p style="margin-top: 0; margin-bottom: 0">
                                                                  <font face="Verdana"><span style="font-size: 8pt">
<input name="pass" value type="password" size="19"></span></font></td>
                                                            </tr>
                                                          </table>
                                                          <p style="margin-top: 0; margin-bottom: 0">
                                                            <font face="Verdana"><span style="font-size: 8pt">
&nbsp; <br>
</span></font>
                                                            <input name="login" type="image" src="juego/images/login.jpg" value="submit" border="0" style="float: right"><font face="Verdana"><span style="font-size: 8pt">
<br>
&nbsp;</span></font></p>
                                                        </form>
                                                        <p>
                                                          <br>
                                                          <font face="Verdana">
<a href="gestion.php?ac=reg">
<span style="font-size: 8pt">Reg&iacute;strate</span></a><span style="font-size: 8pt">/</span><a href="gestion.php?ac=pass"><span style="font-size: 8pt">&iquest;Password
Perdido?</span></a></font></div>
                                                    </td>
                                              </tr>
                                            </table>
                                            <hr size="2" width="100%">
                                            <table width="473">
                                              <tr>
                                                <td width="231">
                                                  <?php include 'rank.php';
?>
                                                </td>
                                                <td width="232">
                                                  <div align="right">
                                                    <font face="Verdana" style="font-size: 8pt">
<a href="juego/historia.php">HISTORIA DEL JUEGO</a><br>
<a href="juego/ayuda.php">AYUDA Y FAQ</a><br>
<a href="juego/normas.php">NORMAS</a><br>
<a href="staff.php">STAFF</a><br>
</font></div>
                                                </td>
                                              </tr>
                                            </table>
                                            <center>
                                              <marquee style="width:500px"><small><?php echo "$not[tipo]>> $not[post]";
?></marquee></small></center>
                                            <br>
                                            </td>
                                        </tr>
                                      </table>
                                    </center>
                                  </div>
                                  </td>
                                  <td width="71" style="border-style: none; border-width: medium" background="juego/images/borde2.jpg" height="176">
                                    <img border="0" src="juego/images/borde2.jpg" width="71" height="44"></td>
                              </tr>
                            </table>
                            </td>
                        </tr>
                      </table>
                    </center>
                  </div>
                  <p style="margin-top: 0; margin-bottom: 0">
                    <img border="0" src="juego/images/bajo.jpg" width="661" height="69"></td>
              </tr>
            </table>
          </center>
        </div>
        <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
        <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
        <p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
  </body>
  </html>
