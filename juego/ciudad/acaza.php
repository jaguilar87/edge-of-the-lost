<?php
mt_srand((double) microtime() * 1000000);

if ($us[hp]<=0) {
    echo 'No puedes cazar a 0 de vida';
} else {
    if ($_POST[tr]) {
        $us[turnos]-=7;
        if ($us[turnos] < 0) {
            echo'Energ&iacute;a insuficiente...';
        } else {
            $luk = mt_rand(0, 60) + ($us[inteligencia]);


            switch ($_POST[tr]) {
                case "nerf": $dife=1; break;
                case "bantha":$dife=2; break;
                case "orray":$dife=3; break;
                case "dewback":$dife=4; break;
                case "reek":$dife=5; break;
                case "nexu":$dife=6; break;
                case "gundark":$dife=7; break;
                case "wampa":$dife=8; break;
                case "aklay":$dife=9; break;
                case "rancor":$dife=10; break;
            }

            $luk -= $dife*20;



            echo "Tras estar un rato camuflado encuentras un $_POST[tr] y te abalanzas sobre &eacute;l!<br>";



            if ($luk>0) {
                $us[puntos]+=$dife;
                echo "Tras un duro combate consegues cazar el $_POST[tr]";
                mysql_query("INSERT INTO sw_inventario (jugador, objeto, equipable, tipo) VALUES ('$us[nombre]', 'Cad&aacute;ver $_POST[tr]', 'N', 'pieza')")or die(mysql_error());
            } else {
                echo "Pero el $_POST[tr] salvaje se te resisti&oacute; y escap&oacute;";
                $us[estres]+=10;
            }

            $dam=mt_rand($dife, $dife*100)-$us[constitucion];
            if ($dam<0) {
                $dam=0;
            }
            echo "<br>El $_POST[tr] te da&ntilde;&oacute; <b>$dam Puntos de Vida</b>";
            echo "<div align=\"left\"><img src=\"images/c_$_POST[tr].jpg\"</div>";

            $us[hp]-=$dam;

            mysql_query("UPDATE `sw_users` SET turnos='$us[turnos]', puntos='$us[puntos]', estres='$us[estres]', hp='$us[hp]' WHERE nombre='$_SESSION[nombre]'")or die(mysql_error());
        }
    } else {
        ?>
<form method="post" action="ciudad/?id=acaza">

<table width="100%" cellspacing="7"><caption ALIGN="TOP"><center><b>Caza</center></caption>
<tr bgcolor="#3f3f3f"><td width=*><b>Animal</b></td><td><b>Dificultad</b></td></tr>
<tr><td><input name="tr" type="radio" value="nerf"> Nerf</td><td>Dif 1</td></tr>
<tr><td><input name="tr" type="radio" value="bantha"> Bantha</td><td>Dif 2</td></tr>
<tr><td><input name="tr" type="radio" value="orray"> Orray</td><td>Dif 3</td></tr>
<tr><td><input name="tr" type="radio" value="dewback"> Dewback</td><td>Dif 4</td></tr>
<tr><td><input name="tr" type="radio" value="reek"> Reek</td><td>Dif 5</td></tr>
<tr><td><input name="tr" type="radio" value="nexu"> Nexu</td><td>Dif 6</td></tr>
<tr><td><input name="tr" type="radio" value="gundark"> Gundark</td><td>Dif 7</td></tr>
<tr><td><input name="tr" type="radio" value="wampa"> Wampa</td><td>Dif 8</td></tr>
<tr><td><input name="tr" type="radio" value="aklay"> Aklay</td><td>Dif 9</td></tr>
<tr><td><input name="tr" type="radio" value="rancor"> Rancor</td><td>Dif 10</td></tr>
</table>
<input name="ok" type="submit" value="Ok">

</form>




<?php 
    }
}?>
