<?php
if ($ci[mina]=="S" && $us[nombre]==$ci[rey]) {
    if ($_GET[pot]) {
        $cl[potencia]-=$_GET[pot];
        $cl[mineral]+=$_GET[pot];
        $pl[mineral]-=$_GET[pot];

        if ($cl[potencia]<0) {
            echo "El clan no dispone de suficiente Potencia para realizar esa acci&oacute;n";
        } else {
            if ($pl[mineral]<0) {
                echo "El planeta no dispone de suficiente mineral";
            } else {
                mysql_query("UPDATE sw_clan SET mineral='$cl[mineral]', potencia='$cl[potencia]' WHERE nombre='$us[clan]'")or die(mysql_error());
                mysql_query("INSERT INTO `sw_board_clan` (clan, poster, dia, mess) VALUES ('$us[clan]', 'INFORMACION', '$us[dia]', '$us[nombre] a gastado <b>$_GET[pot] W</b> en la mina de la ciudad de <b>$ci[nombre]</b>')");
                mysql_query("UPDATE sw_plan SET mineral='$pl[mineral]' WHERE nombre='$pl[nombre]'")or die(mysql_error());
                echo "Los robots han extraido <b>$_GET[pot] minerales</b> con &eacute;xito.";
            }
        }
    } else {
        echo "<small>Tu clan <b>$us[clan]</b> dispone en estos momentos de <b>$cl[potencia] W</b> de potencia, como rey de <b>$ci[nombre]</b> tienes derecho a gastarlos para mover los robots extractores.</small>";
        echo "<br><br><small>Cada W de potencia que gastes supondr&aacute; una Unidad de Mineral extraido</small>";

        echo '
	 <form action="ciudad/" METHOD="GET">
	 	   Gastar <input name="pot" type="text" value=""> W en la Mina. <input name="id" type="hidden" value="imina">
	 	   <input type="submit" Value="OK">

	 </form>
	 ';
    }
} else {
    echo 'La ciudad no dispone de minas o no eres el rey de la ciudad';
}
