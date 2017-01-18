<?php include 'header.php';
mt_srand ((double) microtime() * 1000000);

if ($us[hp]<=0){echo 'No puedes cazar a 0 de vida';}else{

if ($_POST[tr]) {
$us[turnos]-=7;
if ($us[turnos] < 0) {echo'Energía insuficiente...';}else{


$luk = mt_rand(-50,50)+$us[inteligencia]/3;
$lok+=$us[cl_trainer]*5;

	if($_POST[tr]=="nerf"){$dife=1;}
	elseif($_POST[tr]=="bantha"){$dife=2;}
	elseif($_POST[tr]=="orray"){$dife=3;}
	elseif($_POST[tr]=="dewback"){$dife=4;}
	elseif($_POST[tr]=="reek"){$dife=5;}
	elseif($_POST[tr]=="nexu"){$dife=6;}
	elseif($_POST[tr]=="gundark"){$dife=7;}
	elseif($_POST[tr]=="wampa"){$dife=8;}
	elseif($_POST[tr]=="aklay"){$dife=9;}
	elseif($_POST[tr]=="rancor"){$dife=10;}

$luk -= $dife*20;
$cap=mt_rand(0,10)*$dife;


echo "Tras estar un rato camuflado encuentras un $_POST[tr] y te abalanzas sobre él!<br>";

if ($luk>0){
	 if ($us[cl_trainer]>=2){
			if ($us[cl_trainer]==2){
				 $pos=1;
			}else{
				 $pos=($us[cl_trainer]-1)*6;
			}
	 }
			if($cap<$pos){
				$us[puntos]+=$dife*2;
				echo "<b>Tras un largo forcejeo consigues capturar vivo al $_POST[tr]!</b>";
				mysql_query("INSERT INTO sw_compa (nombre, tipo, vigor, destreza, constitucion, inteligencia, dueno, cuidado) VALUES ('$_POST[tr]', '$_POST[tr]', '$dife*10', '$dife*10', '$dife*10', '$dife*10', '$us[nombre]','500')")or die(mysql_error());
		  }else{
	 			$us[puntos]+=$dife; 
	 			echo "Tras un duro combate consegues cazar el $_POST[tr]";
 			  mysql_query("INSERT INTO sw_inventario (jugador, objeto, equipable, tipo) VALUES ('$us[nombre]', 'Cadáver $_POST[tr]', 'N', 'pieza')")or die(mysql_error());
			}
	 
}else{
	 echo "Pero el $_POST[tr] salvaje se te resistió y escapó"; 
	 $us[estres]+=10;
}

$dam=mt_rand($dife, $dife*100)-$us[constitucion];
if ($dam<0){$dam=0;}
echo "<br>El $_POST[tr] te dañó <b>$dam Puntos de Vida</b>";
echo "<br><div align=\"right\"><img src=\"images/c_$_POST[tr].jpg\"</div>";

$us[hp]-=$dam;

mysql_query("UPDATE `sw_users` SET turnos='$us[turnos]', puntos='$us[puntos]', estres='$us[estres]', hp='$us[hp]' WHERE nombre='$_SESSION[nombre]'")or die(mysql_error());


}}else{;?>
<form method="post" action="iacaza.php">
<table width="100%" cellspacing="7"><caption ALIGN="TOP"><center><b>Caza</center></caption>
<tr bgcolor="#3f3f3f"><td width=*><b>Animal</b></td><td><b>Dificultad</b></td></tr>
<tr><td><input name="tr" type="radio" value="nerf"> Nerf</td><td>Dif 1</td></tr>
<tr><td><input name="tr" type="radio" value="bantha"> Bantha</td><td>Dif 2</td></tr>
<tr><td><input name="tr" type="radio" value="orray"> Orray</td><td>Dif 3</td></tr>
<tr><td><input name="tr" type="radio" value="dewback"> Dewback</td><td>Dif 4</td></tr>
<tr><td><input name="tr" type="radio" value="reek"> Reek</td><td>Dif 5</td></tr>
<tr><td><input name="tr" type="radio" value="nexu"> Nexu</td><td>Dif 6</td></tr>
<tr><td><input name="tr" type="radio" value="gundark"> Gundark</td><td>Dif 7</td></tr>
<tr><td><input name="tr" type="radio" value="wampa"> Wampa</td><td>Dif 8</td></tr>
<tr><td><input name="tr" type="radio" value="aklay"> Aklay</td><td>Dif 9</td></tr>
<tr><td><input name="tr" type="radio" value="rancor"> Rancor</td><td>Dif 10</td></tr>
</table>
<input name="ok" type="submit" value="Ok">

</form>




<? } }
include 'footer.php';?>
