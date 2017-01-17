<?php include_once 'header.php';

if ($us[nv_sable]>=2) {
    $c= "SELECT * FROM `sw_evoto` ORDER BY ref DESC limit 0,1";
    $result = mysql_query($c)or die(mysql_error());
    $acpoll = mysql_fetch_array($result);


    echo "<small>Pregunta Actual:</small><br><br><center><big><b>$acpoll[mess]</b></big></center>";

    if ($us[evoto]==null) {
        $j=1;
        $c= "SELECT * FROM `sw_evoto` WHERE ref='$acpoll[ref]' AND tipo!='0'";
        $result = mysql_query($c)or die(mysql_error());
        while ($poll = mysql_fetch_array($result)) {
            echo "<center><br>$j. <a href='voto/votar.php?tipo=$poll[tipo]'>$poll[mess]</a></center>";
            $j++;
        }
    } else {
        $c= "SELECT * FROM `sw_evoto` WHERE tipo='$us[evoto]' ORDER BY ref DESC limit 0,1";
        $result = mysql_query($c)or die(mysql_error());
        $acpoll = mysql_fetch_array($result);

        echo "<br>Tu Voto:<br><center><b>$acpoll[mess]</b></center>";
    }

    echo "<br><br>
<table border=1 width='100%'>
<tr>
    <td><b>RESULTADOS</b></td><td width=80></td>
</tr>";

    $i=0;
    $c= "SELECT * FROM `sw_users` WHERE evoto!=''";
    $result = mysql_query($c)or die(mysql_error());
    while ($voters = mysql_fetch_array($result)) {
        $i++;
    }

    if ($i==0) {
        echo "<tr><td>Nadie ha Votado todav&iacute;a</td><td></td></tr>";
    } else {
        $c= "SELECT * FROM `sw_evoto` WHERE ref='$acpoll[ref]' AND tipo!='0'";
        $result = mysql_query($c)or die(mysql_error());
        while ($poll = mysql_fetch_array($result)) {
            $porce=($poll[num]/$i)*80;
            echo "<tr><td>$poll[mess] ($poll[num]) </td><td><img src=\"images/b$poll[tipo].gif\" width=\"$porce\" height=11></td></tr>";
        }
    }


    echo "</table>";
} else {
    echo "No tienes suficiente nivel para votar, debes ser como m&oacute;mimo CABALLERO/GUERRERO";
}
include_once 'footer.php';
