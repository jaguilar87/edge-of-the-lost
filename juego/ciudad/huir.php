<?php
if ($ci[nombre]=="") {
    $s="SELECT * FROM sw_city WHERE planeta='$us[planeta]' ORDER BY id ASC LIMIT 0,1";
    $q=mysql_query($s)or die(mysql_error());
    $l=mysql_fetch_array($q);

    if ($l[nombre]=="") {
        $s="SELECT * FROM sw_city ORDER BY id ASC LIMIT 0,1";
        $q=mysql_query($s)or die(mysql_error());
        $l=mysql_fetch_array($q);
        $us[planeta]=$l[planeta];
        echo "Te cuelas de poliz&oacute;n en un carguero con rumbo a $l[nombre]($l[planeta])...";
    } else {
        $us[planeta]=$l[planeta];
        echo "Caminas por todo $l[planeta] hasta caer en $l[nombre]";
    }

    $us[estres]+=100;



    $q=mysql_query("UPDATE sw_users SET ciudad='$l[nombre]', estres='$us[estres]', planeta='$us[planeta]' WHERE nombre='$us[nombre]'")or die(mysql_error());
} else {
    echo "No tienes ganas de patear tantos kilometros estando ya en una ciudad";
}
