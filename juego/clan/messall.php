<?php include_once 'header.php';
if ($cl[lider]==$us[nombre]) {
    mysql_query("DELETE FROM sw_board_clan WHERE clan='$us[clan]'")or die(mysql_error());
    echo 'Borrados todos los mensajes del clan. Redireccionando... <META HTTP-EQUIV="Refresh" CONTENT="1;URL=./?id=gest#clan"><br><a href="fficha.php">Volver a la Ficha</a> </script>';
} else {
    echo "No eres el lider del clan.";
}

include_once 'footer.php';
