<?php include 'header.php';
if ($us[hp]<=0){echo 'No puedes entrenar mientras estés KO...';}else{
$ini=$us[creditos];
$us[turnos]-=5;
$c=$_GET['c'];
function clan(){
global $ini, $us, $gastos, $ci, $porce, $clr;

$c= "SELECT * FROM `sw_clan` WHERE nombre='$ci[clan]'";
$result = mysql_query($c)or die(mysql_error());
$clr = mysql_fetch_array($result);

$gastos= $ini - $us[creditos];
$clr[fondos] += $gastos;

$c = "UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$clr[nombre]'";
$result = mysql_query($c);

echo "<br>Gastaste $gastos Créditos<br><small>Fueron para el clan $clr[nombre]</small>";
}
if ($_GET[c]=="") {echo '<script> location.href="entre.php" </script>';
}elseif($_GET[c]=="maxhp"){ $us[maxhp] += 5; $us[creditos] -= $us[maxhp]*10;
}elseif($_GET[c]=="extrae"){ $us[extrae] += 5; $us[creditos] -= $us[extrae]*100;
}else{ $us[$c] += 1; $us[creditos] -= $us[$c]*100;}

if($us[creditos]<0 || $us[turnos]<0){echo 'Creditos y/o energía insuficientes...';

}else{
	  if ($us[nivel]=="Usuario de la Fuerza"){
	  	  if ($_GET[c]=="maxhp" || $_GET[c]=="extrae"){if  ($us[$_GET[c]] >150){echo "No puedes entrenar más $_GET[c] en este nivel.";}else{$c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', maxhp='$us[maxhp]', extrae=$us[extrae] WHERE nombre='$_SESSION[nombre]'"; $result = mysql_query($c);   	  		  echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();}}else{
		  if  ($us[$_GET[c]] >30) {echo "No puedes entrenar más $_GET[c] en este nivel.";}else{
		  	  $c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', {$_GET[c]}='{$us[$_GET['c']]}' WHERE nombre='$_SESSION[nombre]'";
	  	      $result = mysql_query($c);
echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();
		  }		
	  	  }
	  }elseif($us[nv_sable]==1){
	  	  if ($_GET[c]=="maxhp" || $_GET[c]=="extrae"){if  ($us[$_GET[c]] >350){echo "No puedes entrenar más $_GET[c] en este nivel.";}else{$c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', maxhp='$us[maxhp]', extrae=$us[extrae] WHERE nombre='$_SESSION[nombre]'"; $result = mysql_query($c); echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();}}else{
		  if  ($us[$_GET[c]] >50) {echo "No puedes entrenar más $_GET[c] en este nivel.";}else{
		  	  $c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', {$_GET[c]}='{$us[$_GET['c']]}' WHERE nombre='$_SESSION[nombre]'";
	  	      $result = mysql_query($c);
echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();
		  }		
	  	  }
	  }elseif($us[nv_sable]==2){
	  	  if ($_GET[c]=="maxhp" || $_GET[c]=="extrae"){if  ($us[$_GET[c]] >1000){echo "No puedes entrenar más $_GET[c] en este nivel.";}else{$c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', maxhp='$us[maxhp]', extrae=$us[extrae] WHERE nombre='$_SESSION[nombre]'"; $result = mysql_query($c); echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();}}else{
		  if  ($us[$_GET[c]] >75) {echo "No puedes entrenar más $_GET[c] en este nivel.";}else{
		  	  $c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', {$_GET[c]}='{$us[$_GET['c']]}' WHERE nombre='$_SESSION[nombre]'";
	  	      $result = mysql_query($c);
echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();
		  }		
	  	  }
	  }elseif($us[nv_sable]==3){
	  	  if ($_GET[c]=="maxhp" || $_GET[c]=="extrae"){if  ($us[$_GET[c]] >2000){echo "No puedes entrenar más $_GET[c] en este nivel.";}else{$c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', maxhp='$us[maxhp]', extrae=$us[extrae] WHERE nombre='$_SESSION[nombre]'"; $result = mysql_query($c); echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();}}else{
		  if  ($us[$_GET[c]] >100) {echo "No puedes entrenar más $_GET[c] en este nivel.";}else{
		  	  $c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', {$_GET[c]}='{$us[$_GET['c']]}' WHERE nombre='$_SESSION[nombre]'";
	  	      $result = mysql_query($c);
echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)"; clan();
		  }		
	  	  }
		  	  }elseif($us[nv_sable]==4){
	  	  if ($_GET[c]=="maxhp" || $_GET[c]=="extrae"){if  ($us[$_GET[c]] >2500){echo "No puedes entrenar más $_GET[c] en este nivel.";}else{$c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', maxhp='$us[maxhp]', extrae=$us[extrae] WHERE nombre='$_SESSION[nombre]'"; $result = mysql_query($c); echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)";clan();}}else{
		  if  ($us[$_GET[c]] >200) {echo "No puedes entrenar más $_GET[c] en este nivel.";}else{
		  	  $c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', {$_GET[c]}='{$us[$_GET['c']]}' WHERE nombre='$_SESSION[nombre]'";
	  	      $result = mysql_query($c);
			  echo "Entrenado (Para entrenar más $_GET[c] haz click <a href=\"entok.php?c=$_GET[c]\">aquí.</a>)"; clan();
		  }		
	  	  }
		  


}






}}



include 'footer.php'; ?>