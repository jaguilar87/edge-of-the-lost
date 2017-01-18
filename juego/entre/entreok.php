<?php include_once 'header.php';
if ($us[hp]<=0){echo 'No puedes entrenar mientras estés KO...';}else{

$c=$_GET["c"];
$m=$_GET["m"];

if ($m<=0){
  $m = ($c=="maxhp" || $c=="extrae") ? 5 : 1; 
}

$precio=0;

if ($_GET[c]=="") {echo '<script> location.href="entre/entre.php" </script>';}

$j=0;
while ($j<$m){
			$precio += ($c=="maxhp") ? ( $us[$c] * 10) : ( $us[$c] * 100 );
			$us[$c]++;
			$j++;
}

$ener = ($c=="maxhp" || $c=="extrae") ? ($m/5) : $m;

$us[creditos] -= $precio;
$us[turnos] -= $ener;

$porce=$precio*(30/100);
$cli=sel ("sw_clan", "", $ci[clan]);

$cli[fondos]+=$porce;
mysql_query("UPDATE sw_clan SET fondos='$cli[fondos]' WHERE nombre='$cli[nombre]'")or die(mysql_error());

$max=0;

switch ($us[nv_sable]){
case "0":
	 $max = ($c=="maxhp" || $c=="extrae") ? 150 : 25;	 
break;
case "1":
	 $max = ($c=="maxhp" || $c=="extrae") ? 350 : 50;	 
break;
case "2":
	 $max = ($c=="maxhp" || $c=="extrae") ? 750 : 75;	 
break;
case "3":
	 $max = ($c=="maxhp" || $c=="extrae") ? 1500 : 100;	 
break;
case "4":
	 $max = ($c=="maxhp" || $c=="extrae") ? 2000 : 150;	 
break;
}

if($us[creditos]<0 || $us[turnos]<0){
	      echo 'Creditos y/o energía insuficientes...';
}else{

	  	  
		  if ($us[$c] > $max){
		  	 echo "No puedes entrenar más $_GET[c] en este nivel.";
		  }else{
		  	  mysql_query("UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', {$_GET[c]}='{$us[$_GET['c']]}' WHERE nombre='$_SESSION[nombre]'");
			  echo "Entrenado (Para entrenar $m puntos de $c haz click <a href=\"entre/entreok.php?c=$c&m=$m\">aquí.</a>)<br>Gastados $precio Créditos <small>($porce fueron para $ci[clan])</small>"; 

		  }		
	  	  
}



}



include_once 'footer.php'; ?>