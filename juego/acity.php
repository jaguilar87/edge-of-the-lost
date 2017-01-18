<?php include 'header.php';
mt_srand ((double) microtime() * 1000000);
$porlu=mt_rand(1,10);
if ($_GET[ciudad]==""){$_GET[ciudad]=$ci[nombre];}

$c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
$result2=mysql_query($c)or die(mysql_error());
$cic=mysql_fetch_array($result2);

if ($cic[nombre]==$ci[nombre] && $cl[lider]==$us[nombre] && $cic[clan]!=$us[clan] && $cic[atacada]=="N"){

$c="SELECT * FROM sw_clan WHERE nombre='$ci[clan]'";
$result2=mysql_query($c)or die(mysql_error());
$cld=mysql_fetch_array($result2);


$c="SELECT * FROM sw_users WHERE clan='$cl[nombre]' AND ciudad='$ci[nombre]' AND hp>'0'";
$result3=mysql_query($c)or die(mysql_error());
while ($at=mysql_fetch_array($result3)){
$atk[i]+=$at[inteligencia];
}

$cz="SELECT * FROM `sw_diplomacia` WHERE destino='$cl[nombre]' AND estado='Aliado'";
   	$resultz=mysql_query($cz)or die(mysql_error());
   	while ($za = mysql_fetch_array($resultz)){
		  
		  $c="SELECT * FROM sw_users WHERE clan='$za[origen]' AND ciudad='$ci[nombre]'  AND hp>'0'";
		  $result3=mysql_query($c)or die(mysql_error());
		  while ($at=mysql_fetch_array($result3)){
		  $atk[i]+=$at[inteligencia];

		  }
	}
	

$c="SELECT * FROM sw_users WHERE clan='$ci[clan]' AND ciudad='$ci[nombre]'  AND hp>'0'";
$result=mysql_query($c)or die(mysql_error());
while ($de=mysql_fetch_array($result)){
$def[i]+=$de[inteligencia];
}


    $cz="SELECT * FROM `sw_diplomacia` WHERE destino='$ci[clan]' AND estado='Aliado'";
   	$resultz=mysql_query($cz)or die(mysql_error());
   	while ($za = mysql_fetch_array($resultz)){
		  
		  $c="SELECT * FROM sw_users WHERE clan='$za[origen]' AND ciudad='$ci[nombre]' AND hp>'0'";
		  $result=mysql_query($c)or die(mysql_error());
		  while ($de=mysql_fetch_array($result)){
		  $def[i]+=$de[inteligencia];
		  }
	}

$mod1=mt_rand(-100,100);
$mod2=mt_rand(-100,100);
$mod3=mt_rand(-100,100);

$atk[i]+=$mod1;
$def[i]+=$mod2;

$total = $atk[i]-$def[i];

if ($total>0){
   if ($total<200){ $log = "<center><big><big><font color=\"#fd5329\">El <b>Clan $cl[nombre]</b> ha cometido un acto terrorista en <b>$ci[nombre]!</font></b></big></big></center><br><br>"; $ganador=$cl[nombre]; $atacante="$cl[nombre]";}else{$log = "<center><big><big><font color=\"#fd5329\">Se ha cometido un Acto Terrorista en la ciudad <b>$ci[nombre]!<br>Se desconoce al autor de los hechos!</font></b></big></big></center><br><br>"; $ganador="??????????"; $atacante="??????????";}
   $defensor=$ci[clan];
   $ci[torres]-=1;
   if ($ci[torres]<0){$ci[torres]=0;}
   $log.= "<br><br>El clan atacante ha obtenido $atk[i] puntos frente a $def[i] del clan defensor!<br>";
   $ganancias="Una de las torretas de $ci[nombre] ha sido derribada!";


}else{
   if ($total<-200){ $log = "<center><big><big><font color=\"#fd5329\">El <b>Clan $cl[nombre]</b> ha cometido un acto terrorista en <b>$ci[nombre]!</font></b></big></big></center><br><br>";$atacante="$cl[nombre]";}else{$log = "<center><big><big><font color=\"#fd5329\">Se ha cometido un Acto Terrorista en la ciudad <b>$ci[nombre]!<br>Se desconoce al autor de los hechos!</font></b></big></big></center><br><br>"; $atacante="????????????";}
   $defensor=$ci[clan];
   $ganador=$ci[clan];
   $log.= "<br><br>El clan atacante ha obtenido $atk[i] puntos frente a $def[i] del clan defensor!<br>";
   $ganancias="El ataque ha sido frustrado! Los atacantes fueron neutralizados.";
   
   
   		 mysql_query("UPDATE sw_users SET hp='0' WHERE clan='$cl[nombre]' AND ciudad='$ci[nombre]'")or die(mysql_error());
		 		 

}


$sql = "INSERT INTO `sw_board_clan` (clan, poster, dia, mess) VALUES ('$cl[nombre]', 'ATAQUE!', '$fe[dia]', 'Acto terrorista cometido en $ci[nombre]! <a href=\"alista.php#clan\">Ver informe</a>')";
$result = mysql_query($sql);

$sql = "INSERT INTO `sw_board_clan` (clan, poster, dia, mess) VALUES ('$cld[nombre]', 'ATAQUE!', '$fe[dia]', 'Acto terrorista cometido en $ci[nombre]! <a href=\"alista.php#clan\">Ver informe</a>')";
$result = mysql_query($sql);

$sql = "INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$fe[dia]', '$cl[nombre]', '$ci[clan]', '$log', '$ganador', '$ganancias')";
$result = mysql_query($sql);

$c = "UPDATE `sw_city` SET atacada='S', torres='$ci[torres]' WHERE nombre='$ci[nombre]'";
$result = mysql_query($c);


   $sql = "UPDATE `sw_users` SET cmess='S' WHERE clan='$cl[nombre]'";
   $result = mysql_query($sql);
      $sql = "UPDATE `sw_users` SET cmess='S' WHERE clan='$cld[nombre]'";
   $result = mysql_query($sql);

   echo 'Ataque completado! Redireccionando... <META HTTP-EQUIV="Refresh" CONTENT="2;URL=alista.php#clan"> <a href="alista.php#clan">No quiero esperar...</a>';



}else{echo 'No puedes hacer ese ataque';}

include 'footer.php';?>
