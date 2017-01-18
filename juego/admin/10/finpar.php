<?php
if ($ok) {
    echo "<b><u>Vaciando Contenido de las tablas:</u></b>";

    mysql_query("DELETE FROM `sw_log`")or die(mysql_error());
    echo "<br>Logs eliminados...ok";
    mysql_query("DELETE FROM `sw_att`")or die(mysql_error());
    echo "<br>Ataques eliminados...ok";
    mysql_query("DELETE FROM `sw_clan`")or die(mysql_error());
    echo "<br>Clanes eliminados...ok";
    mysql_query("DELETE FROM `sw_board_clan`")or die(mysql_error());
    echo "<br>Mensajes Clan eliminados...ok";
    mysql_query("DELETE FROM `sw_mess`")or die(mysql_error());
    echo "<br>Privados eliminados...ok";
    mysql_query("DELETE FROM `sw_board_noticias`")or die(mysql_error());
    echo "<br>Noticias eliminados...ok";
    mysql_query("DELETE FROM `sw_board_parlamento`")or die(mysql_error());
    echo "<br>Parlamento Vaciado...ok";
    mysql_query("DELETE FROM `sw_control`")or die(mysql_error());
    echo "<br>Control de Defensa(Cambio de Dia y ciclo) eliminadas...ok";
    mysql_query("DELETE FROM `sw_control_muerte`")or die(mysql_error());
    echo "<br>Control de Defensa(Muertes) eliminadas...ok";
    mysql_query("DELETE FROM `sw_control_transferencias`")or die(mysql_error());
    echo "<br>Control de Defensa(Transferencias) eliminadas...ok";
    mysql_query("DELETE FROM `sw_diplomacia`")or die(mysql_error());
    echo "<br>Diplomacias eliminadas...ok";
    mysql_query("DELETE FROM `sw_evoto`")or die(mysql_error());
    echo "<br>Votaciones eliminadas...ok";
    mysql_query("DELETE FROM `sw_compa`")or die(mysql_error());
    echo "<br>Mascotas/Droides eliminados...ok";
    mysql_query("DELETE FROM `sw_inventario`")or die(mysql_error());
    echo "<br>Inventario eliminado...ok";
    mysql_query("DELETE FROM `sw_vehiculos`")or die(mysql_error());
    echo "<br>vehiculos eliminados...ok";
    mysql_query("DELETE FROM `sw_viaje`")or die(mysql_error());
    echo "<br>viajes eliminados...ok";

    echo "<br><br><b><u>Optimizando y renovando Contenido de las tablas:</u></b>";
    mysql_query("UPDATE `sw_plan` SET mineral='1000000'")or die(mysql_error());
    echo "<br>Planetas renovados...ok";
    mysql_query("UPDATE `sw_info` SET val='0' WHERE id='vis' OR id='dia'")or die(mysql_error());
    echo "<br>Informacion de la beta borrada";
    mysql_query("UPDATE sw_city SET clan='', rey=''")or die(mysql_error());

    mysql_query("DELETE FROM `sw_users`")or die(mysql_error());
    echo "<br>Jugadores eliminados...ok";
} else {
    ?>
	<font color="#ff0000"><center><big><big><blink>&iquest;ATENCION!</blink></big></big><br />
	&iquest;Si pulsas el siguiente boton todas las tablas de la partida se borrar&aacute;n!<br><br>
	<a href="admin.php?nv='.$_GET[nv].'&tip=finpar.php&ok=true"><img src="fin.gif"></a></center>';
<?php

}
?>
