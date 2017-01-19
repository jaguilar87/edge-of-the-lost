<?php

if ($ci[cura]=="N") {
    echo 'Tu ciudad no dispone de hospitales...';
} else {
    if ($_GET['ok']) {
        $curing = $us[maxhp] - $us[hp];

        $costes = $ci[costec]*$curing;

        $us[creditos] -= $costes;

        if ($us[creditos] < 0) {
            echo 'Cr&eacute;dito insuficiente...';
        } else {
            $difhp = $us[maxhp]-$us[hp];
            $us[hp] = $us[maxhp];

            $clr = sel("sw_clan", "", $ci[clan]);

            $clr[fondos] += $costes;

            mysql_query("UPDATE `sw_users` SET hp='$us[hp]', creditos='$us[creditos]' WHERE nombre='$_SESSION[nombre]'")or die(mysql_error());
            mysql_query("UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'")or die(mysql_error());

            echo "<br>Curaci&oacute;n completada por <b>$costes cr&eacute;dito(s)</b><br><small>(Tu dinero fue a parar al clan $ci[clan])</small>";
        }
    } else {
        $curing=$us[maxhp]-$us[hp];

        $costes=$ci[costec]*$curing;

        echo "<center>La estada en el Hospital te costar&aacute; <b>$costes Cr&eacute;ditos</b> <br><br><a href='ciudad/?id=rhospital&ok=true'>CURAR</a></center>";
    }
}
