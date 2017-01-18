<? include 'db.php';
$i=0;
$j=0;
$k=0;

$c= "SELECT * FROM `sw_users`";
$result = mysql_query($c)or die(mysql_error());
while ($user= mysql_fetch_array($result)){ $i++;}

$c= "SELECT * FROM `sw_att`";
$result = mysql_query($c)or die(mysql_error());
 while ($user= mysql_fetch_array($result)){ $j++;}
 
 $c= "SELECT * FROM `sw_city`";
$result = mysql_query($c)or die(mysql_error());
 while ($user= mysql_fetch_array($result)){ $k++;}


$c= "SELECT * FROM `sw_noticias` WHERE id='2'";
$result = mysql_query($c)or die(mysql_error());
$visit= mysql_fetch_array($result);

$visit[noticia]++;

    $c="UPDATE `sw_noticias` SET noticia='$visit[noticia]' WHERE id='2'";
	$result=mysql_query($c)or die(mysql_error());
	
?>
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

	<style>
A {
	color: #FFFFCC;
}
A:hover {
	color: #ffffff;

</style>


<meta http-equiv="Page-Enter" content="revealTrans(Duration=1.0,Transition=23)">
</head>

<body text="#FFFFFF" bgcolor="#000000" background="images/bg1.gif" link="#FFFFAE" vlink="#FFEFAE">

<small><table width="100%"><tr><td> <font face="Verdana" style="font-size: 8pt">SW-eotlw es una creación de <a href="http://jagcompany.civitis.com">JAGCompany</a></small><br><br></td><td><div align="right">
 <font face="Verdana" style="font-size: 8pt"><? echo "Visita Nº <font color=\"#ffff00\">$visit[noticia]</font>";?></div></td></tr></table>
<br>
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
      <img border="0" src="images/edge456.gif" width="661" height="235"><table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="100%" id="AutoNumber6" height="178" bgcolor="#000000">
        <tr>
          <td width="71" style="border-style: none; border-width: medium" background="images/borde1.jpg" height="176">
          &nbsp;</td>
          <td style="border-style: none; border-width: medium" height="176">&nbsp;<div align="center">
            <center>
            <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="90%" id="AutoNumber7">
              <tr>
                <td width="90%" align="center" style="border-style: none; border-width: medium">
                <p style="margin-top: 0; margin-bottom: 0">
                <font face="Verdana" style="font-size: 8pt">Bienvenido a <strong>
                <font color="#ffffae">Star Wars - Edge of the Lost Warriors.</font></strong>
                </font></p>
                <p style="margin-top: 0; margin-bottom: 0">
                <font face="Verdana" style="font-size: 8pt">¿Con qué nombre 
                quieres que te recuerde la historia? </font></p>
                <table width="473">
                  <tr>
                    <td width="198">
                    <p align="center">

							<font face="Verdana" style="font-size: 8pt">
							<? echo "<font color=\"#ffff00\">$i</font> Jugadores.<br><font color=\"#ffff00\">$j</font> Ataques.<br><font color=\"#ffff00\">$k</font> Ciudades.";?>
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
                        <input name="login" type="image" src="images/login.jpg" value="submit" border="0" style="float: right"><font face="Verdana"><span style="font-size: 8pt">
                        
                        <br>
                        &nbsp;</span></font></p>
                      </form>
                      <p><br>
                      <font face="Verdana">
                      <a href="http://jagcompany.civitis.com/sw-eotlw/reg.php">
                      <span style="font-size: 8pt">Regístrate</span></a><span style="font-size: 8pt">/</span><a href="http://jagcompany.civitis.com/sw-eotlw/passlost.php"><span style="font-size: 8pt">¿Password 
                      Perdido?</span></a></font></div>
                    </td>
                  </tr>
                </table>
                <hr size="2" width="100%">
                <table width="473">
                  <tr>
                    <td width="231">
                     <? include 'rank.php'; ?>
                    </td>
                    <td width="232">
                    <div align="right">
                      <font face="Verdana" style="font-size: 8pt">
                      <a href="http://jagcompany.civitis.com/sw-eotlw/historia.php">
                      HISTORIA DEL JUEGO</a><br>
                      <a href="http://jagcompany.civitis.com/sw-eotlw/ayuda.php">
                      AYUDA Y FAQ</a><br>
                      <a target="_BLANK" href="http://sw-eotlw.foro.st">FOROS</a><br>
                      <br>
                      <i>Creadores:</i><br>
                      <a href="http://jagcompany.civitis.com">Zeros</a> 
                      (Programador)[<a href="mailto:JAGCompany@hotmail.com"><img src="images/msg.gif" border="0" width="11" height="7"></a><img src="images/msn.gif" border="0" width="15" height="17">]<br>
                      Aklay (Historiador, colaborador)[<a href="mailto:aklay_bcn@hotmail.com"><img src="images/msg.gif" border="0" width="11" height="7"></a><img src="images/msn.gif" border="0" width="15" height="17">]<br>
                      KSK (Grafista, Colaborador)[<a href="mailto:ksk_themaster@hotmail.com"><img src="images/msg.gif" border="0" width="11" height="7"></a><img src="images/msn.gif" border="0" width="15" height="17">]<br>
                      <a href="http://paginaweb.de/alejandro86">Jaccer</a> 
                      (Colaborador)[<a href="mailto:alejandro_rsc@hotmail.com"><img src="images/msg.gif" border="0" width="11" height="7"></a><img src="images/msn.gif" border="0" width="15" height="17">]<br>
                      <a href="http://civitis.com">Civitis</a> (Hosting)<br>
                      A ellos y algunos más... gracias...</font></div>
                    </td>
                  </tr>
                </table>
                <p>&nbsp;</td>
              </tr>
            </table>
            </center>
          </div>
          </td>
          <td width="71" style="border-style: none; border-width: medium" background="images/borde2.jpg" height="176">
          <img border="0" src="images/borde2.jpg" width="71" height="44"></td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
  </center>
</div>

      <p style="margin-top: 0; margin-bottom: 0">
      <img border="0" src="images/bajo.jpg" width="661" height="69"></td>
    </tr>
  </table>
  </center>
</div>

<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>

</body>

</html>