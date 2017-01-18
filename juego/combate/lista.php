<?php
    include_once 'header.php';
    include 'combate/lang.php';

    $result=mysql_query("UPDATE `sw_users` SET attmess='N' WHERE nombre='$_SESSION[nombre]'")or die(mysql_error());

    if ($_GET[at]=="") {
        echo "Mostrando los &uacute;ltimos 20 Ataques:<br>";

        $c="SELECT * FROM `sw_att` WHERE atacante='$_SESSION[nombre]' OR defensor='$_SESSION[nombre]' ORDER BY id DESC limit 0,20";
        $result=mysql_query($c)or die(mysql_error());

        while ($a = mysql_fetch_array($result)) {
            echo "<b>$a[id]-</b> <a href=\"combate/lista.php?at=$a[id]\">$a[atacante] Vs $a[defensor] ocurrido el dia $a[dia]</a><br>";
        }

        if ($us[clan]!="") {
            echo "<a name=\"clan\"></a><br><hr><br>Mostrando los &uacute;ltimos 20 Ataques a ciudades de tu clan:<br>";
            $c="SELECT * FROM `sw_att` WHERE atacante='$cl[nombre]' OR defensor='$cl[nombre]' ORDER BY id DESC limit 0,20";
            $result=mysql_query($c)or die(mysql_error());

            while ($a = mysql_fetch_array($result)) {
                echo "<b>$a[id]-</b> <a href=\"combate/lista.php?at=$a[id]\">Ataque contra $a[defensor] ocurrido el dia $a[dia]</a><br>";
            }
        }
    } else {
        $c="SELECT * FROM `sw_att` WHERE id='$_GET[at]'";
        $result=mysql_query($c)or die(mysql_error());
        $a = mysql_fetch_array($result);

        if ($a[atacante]==$us[nombre] || $a[defensor]==$us[nombre] || $a[atacante]==$cl[nombre] || $a[defensor]==$cl[nombre]) {
            $ata = textcolor($a[atacante]);
            $def = textcolor($a[defensor]);

            echo "<center><table cellpadding=0 cellspacing=0><tr valign='top' ><td width=150 align='right' ><img height=150 src='$ata[avatar_path]'></td><td width=150><img src='images/vs.jpg'></td><td  width=150><img height=150 src='$def[avatar_path]'></td></tr></center>";
            echo "<tr><td align=right><b>$ata[nom]</b></td><big><td align=center></td><td><b>$def[nom]</b></td></tr></table></center>";
            echo "<p style='font-size: 10pt;'>";
            eval('echo '.$a[combate].'end'.';');
            echo "<center><big><big><font color=\"#f1f95b\">Ganador: $a[ganador]</font></big></big></center><br><br><b>Ganancias:</b><br>";
            echo $a[ganancias];
        } else {
            echo 'Este combate no te concierne...';
        }
    }





echo "<br><br><var>RECUERDA: La descripci&oacute;nes de los combates con m&aacute;s de 7 dias ser&aacute;n borradas.</var>";


include_once 'footer.php';
?>

