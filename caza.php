<?php include 'header.php';
mt_srand ((double) microtime() * 1000000);

if ($us[hp]<=0){echo 'No puedes cazar a 0 de vida';}else{

if ($_POST[tr]) {
$us[turnos]-=10;
if ($us[turnos] < 0) {echo'Energía insuficiente...';}else{


$luk = mt_rand(-50,50)+$us[inteligencia];

	if($_POST[tr]=="nerf"){$dife=1; $gan=1000;}
	elseif($_POST[tr]=="bantha"){$dife=2; $gan=2500;}
	elseif($_POST[tr]=="orray"){$dife=3; $gan=4000;}
	elseif($_POST[tr]=="dewback"){$dife=4; $gan=5500;}
	elseif($_POST[tr]=="reek"){$dife=5; $gan=7000;}
	elseif($_POST[tr]=="nexu"){$dife=6; $gan=9000;}
	elseif($_POST[tr]=="gundark"){$dife=7; $gan=11000;}
	elseif($_POST[tr]=="wampa"){$dife=8; $gan=15000;}
	elseif($_POST[tr]=="aklay"){$dife=9; $gan=20000;}
	elseif($_POST[tr]=="rancor"){$dife=10; $gan=50000;}

$luk -= $dife*12;

if ($luk>0){$us[creditos]+=$gan; $us[puntos]+=$dife; echo "Has cazado un <b>$_POST[tr]</b>! Su caza te ha reportado<b> $gan Créditos</b>";}else{echo "El $_POST[tr] salvaje se te resistió y escapó";}
$dam=mt_rand($dife, $dife*100)-$us[constitucion];
if ($dam<0){$dam=0;}
echo "<br>El $_POST[tr] te dañó <b>$dam Puntos de Vida</b>";

$us[hp]-=$dam;


$c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', puntos='$us[puntos]', hp='$us[hp]' WHERE nombre='$_SESSION[nombre]'";
$result = mysql_query($c);


}}else{;?>
<form method="post" action="caza.php">
<table width="100%" cellspacing="7"><caption ALIGN="TOP"><center><b>Caza</center></caption>
<tr bgcolor="#3f3f3f"><td width=*><b>Animal</b></td><td><b>Dificultad / Recompensa</b></td></tr>
<tr><td><input name="tr" type="radio" value="nerf"> Nerf</td><td>Dif 1 / 1000 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="bantha"> Bantha</td><td>Dif 2 / 2500 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="orray"> Orray</td><td>Dif 3 / 4000 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="dewback"> Dewback</td><td>Dif 4 / 5500 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="reek"> Reek</td><td>Dif 5 / 7000 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="nexu"> Nexu</td><td>Dif 6 / 9000 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="gundark"> Gundark</td><td>Dif 7 / 11000 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="wampa"> Wampa</td><td>Dif 8 / 15000 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="aklay"> Aklay</td><td>Dif 9 / 20000 Créditos</td></tr>
<tr><td><input name="tr" type="radio" value="rancor"> Rancor</td><td>Dif 10 / 50000 Créditos</td></tr>
</table>
<input name="ok" type="submit" value="Ok">

</form>




<? } }
include 'footer.php';?>
