<?php
	
	//incluir diccionario
	include 'combate/lang.php';
	
	//Ejecutar la array
	foreach ($log as $line){
		$logcom .= $line.'.';
	}
	
	//Rertar energia
	$us[turnos] -= 5;
	
	//Ganador
	if ($at[hp]>0){
		$ganador=$us[nombre]; 
		$robado= mt_rand($ob[creditos]/100,$ob[creditos]/2);
		if ($robado<0)$robado=0;
		$ob[creditos]-=$robado;
		$us[creditos]+=$robado;
		$us[merito]+=15;
		$ob[merito]-=5;
		$us[pk]+=1;
		$ob[lpk]+=1;
		$puntos=($ob[puntos]-$us[puntos])/2;
		if ($puntos>0) {
			$us[puntos] += $puntos; 
			$ob[puntos]-=5;
		}else{
			$puntos=0;
		}
		$ob[hp]=0;
		$us[hp]=$at[hp];
	}else{
		$ganador=$ob[nombre]; 
		$robado= mt_rand($us[creditos]/100,$us[creditos]/2);
		if ($robado<0)$robado=0;
		$us[creditos]-=$robado;
		$ob[creditos]+=$robado;
		$ob[merito]+=15;
		$us[merito]-=5;
		$ob[pk]+=1;
		$us[lpk]+=1;
		$puntos=($us[puntos]-$ob[puntos])/2;
		if ($puntos>0) {
			$ob[puntos] += $puntos; 
			$us[puntos]-=5;
		}else{
			$puntos=0;
		}
		$ob[hp] = $ob[maxhp];
		$us[hp] = 0;
	}
	
	$ganancias= "$ganador roba $robado Cr�dito(s).<br>$ganador obteniene $puntos PX(s).";
	$ganancias.="<br>$ganador obteniene 15 Punto(s) de Merito.";
	
	
	//SQL
	$sql = "INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$fe[val]', '$us[nombre]', '$ob[nombre]', \"$logcom\", '$ganador', '$ganancias')";
	$result = mysql_query($sql)or die (mysql_error());  
	 
	//Conseguir la ID del ataque
	$sql = "SELECT id FROM `sw_att` ORDER BY id DESC limit 0,1";
	$result = mysql_query($sql)or die (mysql_error());
	$ider = mysql_fetch_array($result);
	
	//Updatear los users
	$c = "UPDATE `sw_users` SET hp='$us[hp]', creditos='$us[creditos]', merito='$us[merito]', pk='$us[pk]', lpk='$us[lpk]', puntos='$us[puntos]', turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
	$result = mysql_query($c)or die (mysql_error());

	$c = "UPDATE `sw_users` SET hp='$ob[hp]', creditos='$ob[creditos]', merito='$ob[merito]', pk='$ob[pk]', lpk='$ob[lpk]', attmess='S', puntos='$ob[puntos]' WHERE nombre='$ob[nombre]'";
	$result = mysql_query($c)or die (mysql_error());

	//A�adir entrada al log
	$sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$ob[nombre]', '$us[nombre] te ha ATACADO!.', '$fe[val]', '5', '$ider[id]')";
	$result = mysql_query($sql);
	
	//OUTPUT
	eval ('echo '.$logcom.'end'.';');
	echo "<center><big><big><font color=\"#f1f95b\">Ganador: $ganador</font></big></big></center><br><br><b>Ganancias:</b><br>";
	echo $ganancias;
	
?>
