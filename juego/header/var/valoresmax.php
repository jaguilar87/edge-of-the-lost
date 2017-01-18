<?php
# RECALCULAR ENERGIA MAXIMA
switch ($us[nv_sable]){
case "0":
	 $to=200;
break;

case "1":
	 $to=300;
break;

case "2":
	 $to=400;
break;

case "3":
	 $to=500;
break;

case "4":
	 $to=600;
break;
}

$to += $us[extrae];


#RECALCULAR LOS ATRIBUTOS

$us[vigor]=$us[vig]+$us[vigb];
$us[destreza]=$us[des]+$us[desb];
$us[constitucion]=$us[con]+$us[conb];
$us[inteligencia]=$us['inte']+$us[intb];
$us[poder]=$us[pod]+$us[podb];

mysql_query("UPDATE sw_users SET vigor='$us[vigor]', constitucion='$us[constitucion]', destreza='$us[destreza]', poder='$us[poder]', inteligencia='$us[inteligencia]' WHERE nombre='$us[nombre]'")or die(mysql_error());


#Recalcular Valores erroneos
if ($us[hp]>$us[maxhp]){$us[hp]=$us[maxhp];}
if ($us[hp]<0){$us[hp]=0;}
if ($us[creditos]<0){$us[creditos]=0;}
if ($us[merito]<0){$us[merito]=0;}
if ($us[lado]>200){$us[lado]=200;}
if ($us[lado]<-200){$us[lado]=-200;}
if ($us[turnos]>$to){$us[turnos]=$to;}





?>