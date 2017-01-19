<?php
if ($ci[cura]=="N") {
    echo 'Tu ciudad no dispone de bar...';
} else {
    if ($_GET[ok]) {
        $curing = $us[estres];

        $costes = $ci[copas]*$curing;

        $us[creditos] -= $costes;

        if ($us[creditos]<0) {
            echo 'Cr&eacute;dito insuficiente...';
        } else {
            if ($us[hp]<=0) {
                echo 'No puedes ir al bar estando KO...';
            } else {
                $us[estres]=0;


                $c= "SELECT * FROM `sw_clan` WHERE nombre='$ci[clan]'";
                $result = mysql_query($c)or die(mysql_error());
                $clr = mysql_fetch_array($result);

                $clr[fondos] += $costes;

                $c = "UPDATE `sw_users` SET estres='$us[estres]', creditos='$us[creditos]' WHERE nombre='$_SESSION[nombre]'";
                $result = mysql_query($c);

                $c = "UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'";
                $result = mysql_query($c);

                echo "<br>Bebes y te relajas por valor de <b>$costes Cr&eacute;dito(s)</b> y tu Estr&aacute;s desaparece...<br><small>(Tu dinero fue a parar al clan $ci[clan])</small>";
            }
        }
    } else {
        $curing = $us[estres];

        $costes = $ci[copas]*$curing;

        echo "<center>La curaci&oacute;n de Estr&eacute;s te costar&aacute; <b>$costes Cr&eacute;ditos</b><br><br><a href='ciudad/?id=cbar&ok=true'>CURAR ESTRES</a></center>";
    }
}
