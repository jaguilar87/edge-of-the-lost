<?php include_once 'header.php';
if ($cl[lider]==$us[nombre]){ 
	 	mysql_query("SELECT * FROM `sw_board_clan` WHERE id='$_GET[mess]'")or die(mysql_error());
		$ider=sel("sw_board_clan", "id", $_GET[mess]);

		if ($ider[clan]==$cl[nombre]){
		   mysql_query("DELETE FROM sw_board_clan WHERE id='$_GET[mess]'")or die(mysql_error());
   		   echo "Mensaje Borrado";
				    echo 'Borrado mensaje del clan. Redireccionando... <META HTTP-EQUIV="Refresh" CONTENT="1;URL=./?id=gest#clan"><br><a href="fficha.php">Volver a la Ficha</a> </script>';
		}else{
		   echo "Ese mensaje no es de tu clan, no puede ser borrado";
		}

	 }else{
	 	echo "No eres el lider del clan.";
	 }

include_once 'footer.php'; ?>