<?php
$ganador="";
$gana="";

if ($cle[nombre]!=""){
   if($ae>0){
				$ganador="$cl[nombre]";
				$robado= mt_rand($cle[fondos]/100,$cle[fondos]/20);
			  if ($robado<0){$robado=0;}
			  $cle[fondos]-=$robado;
			  $cl[fondos]+=$robado;
				foreach($atk as $val){
					$u=sel("sw_users", "", $val);
					$u[merito]+=15;
					mysql_query("UPDATE sw_users SET merito='$u[merito]' WHERE nombre='$val'")or die(mysql_error());
				}
				foreach($def as $val){
					$u=sel("sw_users", "", $val);
					$u[merito]-=5;
					mysql_query("UPDATE sw_users SET merito='$u[merito]' WHERE nombre='$val'")or die(mysql_error());
				}

   }else{
  			$ganador="$cle[nombre]";
			  $robado= mt_rand($cl[fondos]/100,$cl[fondos]/20);
			  if ($robado<0){$robado=0;}
			  $cle[fondos]+=$robado;
			  $cl[fondos]-=$robado;
				foreach($def as $val){
					$u=sel("sw_users", "", $val);
					$u[merito]-=5;
					mysql_query("UPDATE sw_users SET merito='$u[merito]' WHERE nombre='$val'")or die(mysql_error());
				}
				foreach($atk as $val){
					$u=sel("sw_users", "", $val);
					$u[merito]+=15;
					mysql_query("UPDATE sw_users SET merito='$u[merito]' WHERE nombre='$val'")or die(mysql_error());
				}

	 }

	 $cl[mineral]+=$chA;
	 $cle[mineral]+=$chB;
	 mysql_query("UPDATE sw_clan SET fondos='$cl[fondos]', mineral='$cl[mineral]' WHERE nombre='$cl[nombre]'")or die(mysql_error());
	 mysql_query("UPDATE sw_clan SET fondos='$cle[fondos]', mineral='$cle[mineral]' WHERE nombre='$cle[nombre]'")or die(mysql_error());

	 $gana.="<br>Todos los miembros del clan vencedor reciben <b>15 Puntos de Mérito</b>.<br>Todos los miembros del clan perdedor pierden <b>5 puntos de Mérito</b>.<br>El Clan ganador ha robado al Clan perdedor <b>$robado Crédito(s)</b>.<br><br>El clan <b>$cl[nombre]</b> ha recogido <b>$chA mineral(es)</b> en forma de chatarra.<br>El clan <b>$cle[nombre]</b> ha recogido <b>$chB mineral(es)</b> en forma de chatarra.";

	 $conk=mt_rand(0,1000);
	 if ($conk>=850 && $ae>0){
	 		$gana.="<br><br><central><font color=\"#00ffff\"><big><big><b>¡LA CIUDAD HA SIDO CONQUISTADA!</b></big></big></font><br>A partir de hoy en <b>$cic[nombre] ondeará la bandera de <big>$cl[nombre]</big></b></central>";
	 		mysql_query("UPDATE sw_city SET clan='$cl[nombre]', rey='$us[nombre]' WHERE nombre='$cic[nombre]'")or die(mysql_error());
	 }

}else{
	 $gana.="No se ha ganado ni perdido nada. <br><small>Esto se debe a que la ciudad estaba abandonada o nadie la defendía</small><br><br>";
	 $gana.="<br><br><central><font color=\"#00ffff\"><big><big><b>¡LA CIUDAD HA SIDO CONQUISTADA!</b></big></big></font><br>A partir de hoy en <b>$cic[nombre] ondeará la bandera de <big>$cl[nombre]</big></b></central>";
	 mysql_query("UPDATE sw_city SET clan='$cl[nombre]', rey='$us[nombre]' WHERE nombre='$cic[nombre]'")or die(mysql_error());
	 $ganador="$cl[nombre]";
}


   echo "$cl[nombre] Vs $cle[nombre]<br>$log<br>$ganador<br>$gana";


	 mysql_query("UPDATE `sw_city` SET atacada='S' WHERE nombre='$cic[nombre]'")or die(mysql_error());
	 mysql_query("INSERT INTO `sw_board_clan` (poster, mess, clan, dia) VALUES ('INFORMACION','La ciudad <b>$cic[nombre]</b> ha sido atacada por el clan <b>$cl[nombre]</b> <a href=\"ataque/lista.php#clan\">Ver Combate</a>', '$cl[nombre]','$us[dia]')")or die(mysql_error());
	 mysql_query("INSERT INTO `sw_board_clan` (poster, mess, clan, dia) VALUES ('INFORMACION','La ciudad <b>$cic[nombre]</b> ha sido atacada por el clan <b>$cl[nombre]</b> <a href=\"ataque/lista.php#clan\">Ver Combate</a>', '$cle[nombre]','$us[dia]')")or die(mysql_error());


	 mysql_query("INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$us[dia]', '$cl[nombre]', '$cle[nombre]', '$log', '$ganador', '$gana')")or die(mysql_error());
