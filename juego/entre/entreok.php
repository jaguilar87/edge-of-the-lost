<?php include_once 'header.php';
if ($us[hp]<=0){echo 'No puedes entrenar mientras est�s KO...';}else{

$c=$_GET["c"];
$m=$_GET["m"];

if ($m<=0){
  $m = 1; 
}

$precio=0;

if ($_GET[c]!="vig" && $_GET[c]!="des" && $_GET[c]!="con" && $_GET[c]!="inte" && $_GET[c]!="pod") {echo '<script> location.href="entre/entre.php" </script>';}

$j=0;
while ($j<$m){
			$precio += $us[$c] * 100;
			$us[$c]++;
			$j++;
}

$ener = $m;

$us[creditos] -= $precio;
$us[turnos] -= $ener;

$porce=$precio*(30/100);
$cli=sel ("sw_clan", "", $ci[clan]);

$cli[fondos]+=$porce;
mysql_query("UPDATE sw_clan SET fondos='$cli[fondos]' WHERE nombre='$cli[nombre]'")or die(mysql_error());

$max=0;

switch ($us[nv_sable]){
case "0":
	 $max = 25;	 
break;
case "1":
	 $max = 50;	 
break;
case "2":
	 $max = 75;	 
break;
case "3":
	 $max = 100;	 
break;
case "4":
	 $max = 150;	 
break;
}

if($us[creditos]<0 || $us[turnos]<0){
	      echo 'Creditos y/o energ�a insuficientes...';
}else{

	  	  
		  if ($us[$c] > $max){
		  	 echo "No puedes entrenar m�s $_GET[c] en este nivel.";
		  }else{
		  	  mysql_query("UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', {$_GET[c]}='{$us[$_GET['c']]}' WHERE nombre='$_SESSION[nombre]'");
			  echo "Entrenado (Para entrenar $m puntos de $c haz click <a href=\"entre/entreok.php?c=$c&m=$m\">aqu�.</a>)<br>Gastados $precio Cr�ditos <small>($porce fueron para $ci[clan])</small>"; 

		  }		
	  	  
}



}



include_once 'footer.php'; ?>
