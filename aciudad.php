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


$c="SELECT * FROM sw_users WHERE clan='$cl[nombre]' AND ciudad='$ci[nombre]'";
$result3=mysql_query($c)or die(mysql_error());
while ($at=mysql_fetch_array($result3)){
$atk[a]+=$at[vigor];
$atk[d]+=$at[constitucion];
}

$s2="SELECT * FROM sw_vehiculos WHERE prop='$cl[nombre]' AND tipo='Crucero De Batalla'";
$q2=mysql_query($s2)or die(mysql_error());
while ($l2=mysql_fetch_array($q2)){
$atk[a]+=50;

}

    $cz="SELECT * FROM `sw_diplomacia` WHERE destino='$cl[nombre]' AND estado='Aliado'";
   	$resultz=mysql_query($cz)or die(mysql_error());
   	while ($za = mysql_fetch_array($resultz)){
		  
		  $c="SELECT * FROM sw_users WHERE clan='$za[nombre]' AND ciudad='$ci[nombre]'";
		  $result3=mysql_query($c)or die(mysql_error());
		  while ($at=mysql_fetch_array($result3)){
		  $atk[a]+=$at[vigor];
		  $atk[d]+=$at[constitucion];
		  }
	}
	
$c="SELECT * FROM sw_users WHERE clan='$ci[clan]' AND ciudad='$ci[nombre]'";
$result=mysql_query($c)or die(mysql_error());
while ($de=mysql_fetch_array($result)){
$def[a]+=$de[vigor];
$def[d]+=$de[constitucion];
}


    $cz="SELECT * FROM `sw_diplomacia` WHERE destino='$ci[clan]' AND estado='Aliado'";
   	$resultz=mysql_query($cz)or die(mysql_error());
   	while ($za = mysql_fetch_array($resultz)){
		  
		  $c="SELECT * FROM sw_users WHERE clan='$za[clan]' AND ciudad='$ci[nombre]'";
		  $result=mysql_query($c)or die(mysql_error());
		  while ($de=mysql_fetch_array($result)){
		  $def[a]+=$de[vigor];
		  $def[d]+=$de[constitucion];
		  }
	}


$log = "<center><big><big><font color=\"#fd5329\">El <b>Clan $cl[nombre]</b> ataca la ciudad de <b>$ci[nombre]!</font></b></big></big></center><br><br>";


$mod1=mt_rand(-100,100);
$mod2=mt_rand(-100,100);
$mod3=mt_rand(-100,100);
$mod4=mt_rand(-100,100);

$atk[a]+=$mod1;
$atk[d]+=$mod2;
$def[a]+=$mod3;
$def[d]+=$mod4;

$def[d]+=$cic[torres]*50;


$log.= "<br>Las tropas del <b>Clan $cl[nombre]</b> lanzan un ataque sobre la ciudad de <b>$atk[a] Puntos!</b>";
$log.= "<br>La <b>Ciudad $ci[nombre]</b> opone una resistencia de <b>$def[d] Puntos!</b>";

$total=$atk[a]-$def[d];
if ($ci[clan]==NULL){ $total=1000;}
if ($total<=0){$log.='<br><br><b><font color="#18ff11">¡La ciudad resiste!</font></b>';

$c="SELECT * FROM sw_users WHERE clan='$cl[nombre]' AND ciudad='$ci[nombre]'";
$result3=mysql_query($c)or die(mysql_error());
while ($at=mysql_fetch_array($result3)){

$at[merito]-=10;

$c = "UPDATE `sw_users` SET merito='$at[merito]' WHERE nombre='$at[nombre]'";
$r = mysql_query($c);
}

$c="SELECT * FROM sw_users WHERE clan='$ci[clan]' AND ciudad='$ci[nombre]'";
$result=mysql_query($c)or die(mysql_error());
while ($de=mysql_fetch_array($result)){

$de[merito]+=20;

$c = "UPDATE `sw_users` SET merito='$de[merito]' WHERE nombre='$de[nombre]'";
$r = mysql_query($c);
}

$gan=($cl[fondos]*$porlu)/100;

$cl[fondos]-=$gan;
$cld[fondos]+=$gan;

$c = "UPDATE `sw_clan` SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'";
$result = mysql_query($c);
$c = "UPDATE `sw_clan` SET fondos='$cld[fondos]' WHERE nombre='$cld[nombre]'";
$result = mysql_query($c);


$ganancias= "El clan $ci[clan] obtiene $gan Créditos del clan $us[clan]<br>Todos los miembros del clan que defendieron la ciudad Ganan 10 Puntos de Mérito.<br>Todos los atacantes Perdieron 5 Puntos de Mérito";
$ganador="$cld[nombre]";




}else{



$log.= '<br><br><b><font color="#fe3a1e">¡Las defensas de la ciudad caen!</font></b>';
$c="SELECT * FROM sw_users WHERE clan='$cl[nombre]' AND ciudad='$ci[nombre]'";
$result3=mysql_query($c)or die(mysql_error());
while ($at=mysql_fetch_array($result3)){

$at[merito]+=10;

$c = "UPDATE `sw_users` SET merito='$at[merito]' WHERE nombre='$at[nombre]'";
$r = mysql_query($c);
}

$c="SELECT * FROM sw_users WHERE clan='$ci[clan]' AND ciudad='$ci[nombre]'";
$result=mysql_query($c)or die(mysql_error());
while ($de=mysql_fetch_array($result)){

$de[merito]-=5;

$c = "UPDATE `sw_users` SET merito='$de[merito]' WHERE nombre='$de[nombre]'";
$r = mysql_query($c);
}



$gan=($cld[fondos]*$porlu)/100;

$cl[fondos]+=$gan;
$cld[fondos]-=$gan;

$c = "UPDATE `sw_clan` SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'";
$result = mysql_query($c);
$c = "UPDATE `sw_clan` SET fondos='$cld[fondos]' WHERE nombre='$cld[nombre]'";
$result = mysql_query($c);


$ganancias= "El clan $us[clan] obtiene $gan Créditos del clan $ci[clan]<br>Todos los miembros del clan que defendieron la ciudad Pierden 5 Puntos de Mérito.<br>Todos los atacantes Ganaron 10 Puntos de Mérito";
$ganador="$cl[nombre]";



$log.="<br>El clan $cl[nombre] intenta la conquista de la ciudad y...";

$conquista=mt_rand(1,1000);
if ($ci[clan]==NULL){ $conquista=1000;}
if ($conquista>=900){$log.="<big><big><font color=\"#ffff00\"><br><center>Y la Conquista se lleva a cabo!!</center></font></big></big><br>A partir de hoy, en <b>$ci[nombre]</b> hondeará la bandera de <b>$cl[nombre]</b>";

$c = "UPDATE `sw_city` SET clan='$cl[nombre]', rey='$cl[lider]' WHERE nombre='$ci[nombre]'";
$result = mysql_query($c);



}else{$log.="la conquista no se ejecutó...";}




}

$sql = "INSERT INTO `sw_clanboard` (clan, poster, dia, mess) VALUES ('$cl[nombre]', 'ATAQUE!', '$fe[dia]', 'El clan $cl[nombre] a atacado la ciudad de $ci[nombre]! <a href=\"ataques.php\">Ver ataque</a>')";
$result = mysql_query($sql);

$sql = "INSERT INTO `sw_clanboard` (clan, poster, dia, mess) VALUES ('$cld[nombre]', 'ATAQUE!', '$fe[dia]', 'El clan $cl[nombre] a atacado la ciudad de $ci[nombre]! <a href=\"ataques.php\">Ver ataque</a>')";
$result = mysql_query($sql);

$sql = "INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$fe[dia]', '$cl[nombre]', '$ci[clan]', '$log', '$ganador', '$ganancias')";
$result = mysql_query($sql);

$c = "UPDATE `sw_city` SET atacada='S' WHERE nombre='$ci[nombre]'";
$result = mysql_query($c);


   $sql = "UPDATE `sw_users` SET cmess='S' WHERE clan='$cl[nombre]'";
   $result = mysql_query($sql);
      $sql = "UPDATE `sw_users` SET cmess='S' WHERE clan='$cld[nombre]'";
   $result = mysql_query($sql);

echo '<script> location.href="ataques.php" </script>';



}else{echo 'No puedes hacer ese ataque';}





include 'footer.php';?>
