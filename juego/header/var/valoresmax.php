<?php
# Calcular valores maximos segun nivel
switch ($us[nv_sable]) {
case "0":
    $to=200;
    $us[lado] = max(min($us[lado], 10), -10);
break;

case "1":
     $to=300;
     $us[lado] = max(min($us[lado], 100), -100);
break;

case "2":
     $to=400;
     $us[lado] = max(min($us[lado], 200), -200);
break;

case "3":
     $to=500;
     $us[lado] = max(min($us[lado], 350), -350);
break;

case "4":
     $to=600;
     $us[lado] = max(min($us[lado], 500), -500);
break;
}

$to += $us[extrae];

#RECALCULAR LOS ATRIBUTOS
$us[vigor]=$us[vig];
$us[destreza]=$us[des];
$us[constitucion]=$us[con];
$us[inteligencia]=$us['inte'];
$us[poder]=$us[pod];

#Recalcular Valores erroneos
if ($us[hp]>$us[maxhp]) {
    $us[hp]=$us[maxhp];
}
if ($us[hp]<0) {
    $us[hp]=0;
}
if ($us[creditos]<0) {
    $us[creditos]=0;
}
if ($us[merito]<0) {
    $us[merito]=0;
}
if ($us[turnos]>$to) {
    $us[turnos]=$to;
}
