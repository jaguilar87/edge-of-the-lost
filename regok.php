<body bgcolor="#000000" text="#FFFFFF" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFF99">
<?php include 'var.php';
mt_srand ((double) microtime() * 1000000);
if(trim($_POST["n"]) != "" && trim($_POST["p"]) != "" && trim($_POST["r"]) != "" && trim($_POST["s"]) != ""&& trim($_POST["m"]) != ""){
 
	  $org="Coruscant";
if ($_POST["r"]=="Humano") { $vi=15; $de=25; $in=25; $co=25;}
elseif ($_POST["r"]=="Twilek"){ $vi=20; $de=30; $in=20; $co=20;}
elseif ($_POST["r"]=="Caamasi"){ $vi=15; $de=30; $in=35; $co=10;}
elseif ($_POST["r"]=="Bothan"){ $vi=20; $de=20; $in=40; $co=10;}
elseif ($_POST["r"]=="Duro"){ $vi=25; $de=20; $in=25; $co=20;}
elseif ($_POST["r"]=="Arkaniano"){ $vi=10; $de=20; $in=50; $co=10;}
elseif ($_POST["r"]=="Falleen"){ $vi=30; $de=10; $in=30; $co=20;}
elseif ($_POST["r"]=="Zabrak"){ $vi=20; $de=40; $in=20; $co=10;}
elseif ($_POST["r"]=="Cathar"){ $vi=40; $de=25; $in=5; $co=20;}
elseif ($_POST["r"]=="Keldor"){ $vi=10; $de=30; $in=30; $co=20;}

$c="SELECT * FROM sw_users WHERE nombre='$_POST[n]' OR mail='$_POST[m]'";
$result=mysql_query($c)or die(mysql_error());
$r=mysql_fetch_array($result);

$i=1;

$c="SELECT * FROM sw_city WHERE entrenar='S'";
$result=mysql_query($c)or die(mysql_error());
while ($cil=mysql_fetch_array($result)){
$ciudad[$i]=$cil[nombre];
$i++;
}

$luk=mt_rand(1,count($ciudad));

$c="SELECT * FROM sw_city WHERE nombre='$ciudad[$luk]'";
$result=mysql_query($c)or die(mysql_error());
$cip=mysql_fetch_array($result);

if ($r[nombre]==$_POST[n] || $r[mail]==$_POST[m]) {echo 'Lo sentimos, ese personaje o ese mail ya existen.';}else{
$q="INSERT INTO `sw_users` (nombre, mail, password, sexo, raza, origen, vigor, destreza, inteligencia, constitucion, dia, ciudad, play, plax) VALUES ('$_POST[n]', '$_POST[m]', '$_POST[p]', '$_POST[s]', '$_POST[r]', '$cip[nombre]', '$vi', '$de', '$in', '$co', '$fe[dia]', '$cip[nombre]', '$cip[esy]', '$cip[esx]')";
$result = mysql_query($q);


$sql = "SELECT id FROM sw_users ORDER BY id DESC limit 0,1";
$result = mysql_query($sql);
$ider = mysql_fetch_array($result);


	  mail($_POST[m], "Registro sw-eotlw", "Hola $_POST[n], has sido registrado con éxito en Star Wars - Edges of The Lost Warriors (http://sw-eotlw.esp.st), cuando puedas ya puedes registrarte con la siguiente información:<br><br>Nombre: $_POST[n]<br>Password:$_POST[p]<br><br>Pero antes debes confirmar tu cuenta en esta dirección.<br> ( http://jagcompany.civitis.com/sw-eotlw/alta.php?code=mecagoenswcombine&c=$ider[id]&pl=$_POST[n] ) Recomendamos Copiar y pegar  <br>No pierdas este Email!<br><br>Gracias por registrarte...<br><br>Juego creado por http://jagcompany.civitis.com");
	  echo 'Resgistro correcto! Pulsa <a HREF="index.php">Aquí</a> para loguearte';
	  }
}else{
	  echo 'Debe rellenar todos los campos. <a href="reg.php">Volver</a>';
}