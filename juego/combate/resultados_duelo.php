<?php

    //incluir diccionario
    include 'combate/lang.php';

    //Ejecutar la array
    foreach ($log as $line) {
        $logcom .= $line.'.';
    }

    #<!--GANADOR / VENCEDOR / GANANCIAS-->

    if ($ob[hp]<=0) {
        $ganador=$us[nombre];
    } else {
        $ganador=$ob[nombre];
    }

    $ganancias= "En un duelo no se gana ni se pierde nada";

    $sql = "INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$us[dia]', '$us[nombre]', '$ob[nombre]', 'Se ha prescindido del combate por motivos de Tama&ntilde;o.', '$ganador', '$ganancias')";
    $result = mysql_query($sql);

    $sql = "SELECT id FROM `sw_att` ORDER BY id DESC limit 0,1";
    $result = mysql_query($sql);
    $ider = mysql_fetch_array($result);

    $c = "UPDATE `sw_users` SET hp='$realus' WHERE nombre='$us[nombre]'";
    $result = mysql_query($c);

    $c = "UPDATE `sw_users` SET hp='$realob' WHERE nombre='$ob[nombre]'";
    $result = mysql_query($c);

    $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$ob[nombre]', '$us[nombre] te ha retado en duelo!.', '$us[dia]', '5', '$ider[id]')";
    $result = mysql_query($sql);




    eval('echo '.$logcom.'end'.';');
    echo "<center><big><big><font color=\"#f1f95b\">Ganador: $ganador</font></big></big></center><br><br><b>Ganancias:</b><br>";
    echo $ganancias;
