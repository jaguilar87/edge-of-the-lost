<?php include 'header.php';
mt_srand ((double) microtime() * 1000000);
if ($_GET[clan]==""){echo '<script>href.location="diplomacia.php"</script>';}
if ($us[nombre]==$cl[lider]){

$c="SELECT * FROM sw_clan WHERE nombre='$_GET[clan]'";
$result2=mysql_query($c)or die(mysql_error());
$cle=mysql_fetch_array($result2);

if ($cle[atacado]=="S"){echo 'El clan ya ha sido atacado en las ultimas 6 horas';}else{

$a=0;
$d=0;

$c="SELECT * FROM sw_users WHERE clan='$us[clan]'";
$result2=mysql_query($c)or die(mysql_error());
while ($usc=mysql_fetch_array($result2)){
$a+=$usc[poder];

}

$c="SELECT * FROM sw_users WHERE clan='$_GET[clan]'";
$result2=mysql_query($c)or die(mysql_error());
while ($use=mysql_fetch_array($result2)){
$d+=$use[poder];

}
$x=0;
$y=0;

	$s = "SELECT * FROM sw_vehiculos WHERE tprop='Clan' AND prop='$us[clan]' AND tipo='Crucero De Batalla'";
	$q = mysql_query($s);
	while ($l = mysql_fetch_array($q)){$x++;}

	$s = "SELECT * FROM sw_vehiculos WHERE tprop='Clan' AND prop='$_GET[clan]' AND tipo='Crucero De Batalla'";
	$q = mysql_query($s);
	while ($l = mysql_fetch_array($q)){$y++;}
	
$a+=$x*100;
$b+=$y*100;

$mod1=mt_rand(0,$cl[puntos]);
$mod2=mt_rand(0,$cle[puntos]);

$a+=$mod1;
$b+=$mod2;

$final=$a-$b;

$log ='<big><big><font color="#ff0000"><center>RESULTADO DEL ATAQUE</font></center></big></big><br>';
$log.="<br>El clan <b>$us[clan]</b> golpea con todo su poder contra el clan <b>$cle[nombre]</b>";
$log.="<br>El clan <b>$us[clan]</b> dirigía <b>$x</b> Cruceros de Batalla contra <b>$y</b> del clan <b>$cle[nombre]</b>"; 
$log.="<br><br>El resultado fue....";


if ($final>=0){
$ganador= $cl[nombre];



}else{

$ganador=$cle[nombre];

}

$log.="<center><font color=\"#ffff80\"><big><big><big><b>¡ $ganador !</b></big></big></big> </font></center>";

echo $log;


echo '<br><br>Por el momento esta victoria es simbolica y no repercute en las puntuaciones...';
}}else{echo 'No eres el lider del clan...';}
include 'footer.php';?>
