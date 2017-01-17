<body bgcolor="#000000" text="#FFFFFF" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFF99">


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

<body text="#FFFFFF" bgcolor="#000000" background="juego/images/bg1.gif" link="#FFFFAE" vlink="#FFEFAE">

<small><table width="100%"><tr><td> <font face="Verdana" style="font-size: 8pt">SW-eotlw es una creaci�n de <a href="http://jagcompany.civitis.com">JAGCompany</a></small><br><br></td><td><div align="right">
 <font face="Verdana" style="font-size: 8pt"></div></td></tr></table>
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
      <img border="0" src="juego/images/edge456.gif" width="661" height="235"><table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="100%" id="AutoNumber6" height="178" bgcolor="#000000">
        <tr>
          <td width="71" style="border-style: none; border-width: medium" background="juego/images/borde1.jpg" height="176">
          &nbsp;</td>
          <td style="border-style: none; border-width: medium" height="176">&nbsp;<div align="center">
            <center>
            <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-width: 0" width="90%" id="AutoNumber7">
              <tr>
                <td width="90%" align="center" style="border-style: none; border-width: medium">
<?php

switch ($_GET[ac]) {
case "": echo "<script> location.href='index.php' </script>"; break;

case "reg":
?>
<!--                                            REG                                         -->
<center><big><b><font face="verdana">Reg�stro de una nueva cuenta.</font></b></big><br>
<table>
<tr><form method="post" action="gestion.php?ac=regok"></tr>
<tr><td><div align="right"><font face="verdana">Nombre:</div></td> <td><input name="n" type="text" value=""></td></tr>
<tr><td><div align="right"><font face="verdana">E-Mail:</div></td> <td><input name="m" type="text" value=""> <small><var><font color="#ff0000">(Mail Aut�ntico)</font></var></small></td></tr>
<tr><td><div align="right"><font face="verdana">Password:</div></td> <td><input name="p" type="password" value=""></td></tr>
<tr><td><div align="right"><font face="verdana">Sexo:</div></td> <td><font face="verdana"><input name="s" type="radio" value="h">Hombre <input name="s" type="radio" value="M">Mujer</td></tr>
<tr><td><div align="right"><font face="verdana"><a target=_blank href="ayuda.php#raza">?</a> Raza:</div></td> 
<td><select name="r">
    <option value="Humano"><font face="verdana">Humano
    <option value="Twilek"><font face="verdana">Twi'lek
	<option value="Caamasi"><font face="verdana">Caamasi
	<option value="Keldor"><font face="verdana">Keldor
	<option value="Arkaniano"><font face="verdana">Arkaniano
	<option value="Bothan"><font face="verdana">Bothan
	<option value="Duro"><font face="verdana">Duro	
	<option value="Falleen"><font face="verdana">Faallen
	<option value="Zabrak"><font face="verdana">Zabrak		
	<option value="Cathar"><font face="verdana">Cathar	
</select></td>
</div></tr></table></center>
<font face="verdana"><br><br><center><big><big><font color="#ff0000"><b>�ATENCI�N!</b></font></big></big></center>
<small><br>El nombre de la ficha <font color="#ffff80">debe cumplir las siguientes normas o ser� borrado</font>:
<br>1- Es importante empezar por may�scula.
<br>2- Deberia tener un apellido pero no es obligatorio.
<br>3- S�lo puede estar compuesto por letras, nada de n�meros ni car�cteres (1234.&%/�-�_) pero puede tener espacios.
<br>4- El nombre NO debe tener t�tulos como Lord, Duque, Sir ni nada por el estilo.
<br>5- No pueden ser nombres de personas de las peliculas o del mundo de SW, nada de Darth Vader ni Luke Skywalker. Por contra si se pueden poner nombres como Juan Skywalker o Sara Leia.
<br>Las fichas que incumplan alguna de las normas anteriores ser�n borradas y no se atender�n a quejas.</small>
<br><br><br><font color="#ffff80">Queda prohibido toda clase de multiplaying</font><br>
<br><br>El juego est� pensado para funcionar bajo <a href="http://mozilla.org">Mozilla Firefox</a> si quieres utilizar internet Explorer para jugar deber�s asegurarte que tu explorador soporta Sessions y Cookies.  
<br>
<br>
<center><input type="submit" value="Registro"></center>
<br><br>
</form>
</center>

<?php
break;

case "regok":

#<!--                                            REG OK                                      -->
include 'juego/db.php';
include 'juego/header/explicit.php';
mt_srand((double) microtime() * 1000000);
if (trim($_POST["n"]) != "" && trim($_POST["p"]) != "" && trim($_POST["r"]) != "" && trim($_POST["s"]) != ""&& trim($_POST["m"]) != "") {
    $_POST[n]=valNombre($_POST[n]);
    $_POST[p]=valNombre($_POST[p]);
    $_POST[r]=valNombre($_POST[r]);
    $_POST[m]=valNombre($_POST[m]);
    $_POST[s]=valNombre($_POST[s]);
 
    if ($_POST["r"]=="Humano") {
        $vi=22;
        $de=23;
        $in=22;
        $co=23;
    } elseif ($_POST["r"]=="Twilek") {
        $vi=20;
        $de=30;
        $in=20;
        $co=20;
    } elseif ($_POST["r"]=="Caamasi") {
        $vi=20;
        $de=25;
        $in=25;
        $co=20;
    } elseif ($_POST["r"]=="Bothan") {
        $vi=25;
        $de=20;
        $in=25;
        $co=20;
    } elseif ($_POST["r"]=="Duro") {
        $vi=20;
        $de=20;
        $in=25;
        $co=25;
    } elseif ($_POST["r"]=="Arkaniano") {
        $vi=20;
        $de=20;
        $in=30;
        $co=20;
    } elseif ($_POST["r"]=="Falleen") {
        $vi=30;
        $de=20;
        $in=20;
        $co=20;
    } elseif ($_POST["r"]=="Zabrak") {
        $vi=20;
        $de=25;
        $in=20;
        $co=25;
    } elseif ($_POST["r"]=="Cathar") {
        $vi=25;
        $de=25;
        $in=20;
        $co=20;
    } elseif ($_POST["r"]=="Keldor") {
        $vi=25;
        $de=20;
        $in=20;
        $co=25;
    }

    $comf=mt_rand(0, 8000);

    $c="SELECT * FROM sw_users WHERE nombre='$_POST[n]' OR mail='$_POST[m]'";
    $result=mysql_query($c)or die(mysql_error());
    $r=mysql_fetch_array($result);

    $i=1;

    $c="SELECT * FROM sw_city WHERE habitable='1'";
    $result=mysql_query($c)or die(mysql_error());
    while ($cil=mysql_fetch_array($result)) {
        $ciudad[$i]=$cil[nombre];
        $i++;
    }

    $luk=mt_rand(1, count($ciudad));

    $c="SELECT * FROM sw_city WHERE nombre='$ciudad[$luk]'";
    $result=mysql_query($c)or die(mysql_error());
    $cip=mysql_fetch_array($result);

    $c="SELECT * FROM sw_info WHERE id='dia'";
    $result=mysql_query($c)or die(mysql_error());
    $fe=mysql_fetch_array($result);

    if ($r[nombre]==$_POST[n] || $r[mail]==$_POST[m]) {
        echo 'Lo sentimos, ese personaje o ese mail ya existen.';
    } else {
        $q="INSERT INTO `sw_users` (nombre, mail, password, sexo, raza, origen, vig, des, inte, con, dia, ciudad, planeta, comf, fecha) VALUES ('$_POST[n]', '$_POST[m]', '$_POST[p]', '$_POST[s]', '$_POST[r]', '$cip[nombre]', '$vi', '$de', '$in', '$co', '$fe[dia]', '$cip[nombre]', '$cip[planeta]', '$comf', '$fe[val]')";
        $result = mysql_query($q)or die(mysql_error());


        $sql = "SELECT id, comf FROM sw_users ORDER BY id DESC limit 0,1";
        $result = mysql_query($sql)or die(mysql_error());
        $ider = mysql_fetch_array($result);

                
        $mess= "Hola $_POST[n], has sido registrado con �xito en Star Wars - Edges of The Lost Warriors (http://sw.jag-team.com), cuando puedas ya puedes registrarte con la siguiente informaci�n: \n Nombre: $_POST[n] \n Password:$_POST[p] \n \n Pero antes debes confirmar tu cuenta en esta direcci�n.<br> \n ( http://jagcompany.civitis.com/sw-eotlw/alta.php?code=mecagoenswcombine&c=$ider[id]&o=$ider[comf] ) Recomendamos Copiar y pegar  <br>No pierdas este Email!<br><br>Gracias por registrarte...<br><br>Juego creado por http://jag-team.com";
        mail($_POST[m], "Registro SWedges", $mess, "From: swedges@jag-team.com", "-fswedges@jag-team.com");
        echo '<font color="#ffffa8">Resgistro correcto</font>! <br>Ahora solo debes ir al link que ha sido enviado a tu correo. <br><br>(Recuerda que si tu nombre tiene un espacio debes copiar el codigo y pegarlo en vez de clickar simplemente)<br><br><font color="#ff0000">Atenci�n:</font> Si usas Hotmail u otros correos con filtro comprueba que el mail no haya sido detectado como correo no deseado antes de reportar quejas.';
    }
} else {
    echo 'Debe rellenar todos los campos. <a href="gestion.php?ac=reg">Volver</a>';
}
break;

case "pass":

#<!--                                       PASS LOST                                       ->
?>
<font face="verdana"><b><big>Recordar Password:</big></b><br>
<small>Has perdido tu password y no recuerdas como era?<br> 
No hay problema, escribe el mail de tu personaje y re enviaremos al e-mail la contrase�a. Si eres usuario de Hotmail u otros tipos de cuentas con autopurga, seguramente el email mandado vaya a parar a la carpeta de correo no deseado, comprueba esto antes de reportar quejas.
<form method="GET" action="gestion.php"></small><br><b>Mail:</b> <input name="mail" type="text" value=""><input name="ac" type="hidden" value="passok"><input type="submit" value="ok"></form>
</font>
<?php
break;

case "passok":
#<!--                                       PASS OK                                       ->

include 'juego/db.php';
include 'juego/header/explicit.php';

    $c = "SELECT * FROM `sw_users` WHERE mail='$_POST[mail]'";
    $result=mysql_query($c)or die(mysql_error());
    $ider = mysql_fetch_array($result);
    
if ($r[nombre]!="") {
    mail($r[mail], "Password Perdido", "El password de tu personaje $r[nombre] es: $r[password], \n El c�digo de confirmaci�n es: \n( http://jagcompany.civitis.com/sw-eotlw/alta.php?code=mecagoenswcombine&c=$ider[id]&o=$ider[comf] ) Recomendamos Copiar y pegar  \n No lo pierdas again :)", "From: swedges@jag-team.com", "-fswedges@jag-team.com");

    echo 'Mail con password de $r[nombre] enviado a $r[mail]... <a href="index.php">Volver</a>';
} else {
    echo "No existe ninguna cuenta con ese mail";
}
break;


}
?>
<br><a href="http://sw.jag-team.com">Volver al inicio</a>
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
