<?php include 'header.php';
			switch ($_POST[ac]){
			 case "":
		 				echo '<script language="JavaScript" type="text/javascript"> location.href="entre.php" </script>';
		   break;
			 case "nom":
			 		$c=sel("sw_compa", "id", $_POST[id]);
					if ($c[dueno]==$us[nombre]){
						    if ($_GET[ok]){
									 mysql_query("UPDATE sw_compa SET nombre='$_GET[ok]' WHERE id='$c[id]'")or die (mysql_error());
									 echo "Has rebautizado tu mascota como $_GET[ok]";
								}else{
								echo "
								<form action='compaset.php'>
								<b>Nombre: </b> <input type='text' value='$c[nombre]' name='ok'> <input type='hidden' name='ac' value='nom'><input type='hidden' name='id' value='$_POST[id]'> <input type='submit' value='Rebautizar'>								
								</form>";
								}
					}else{
								echo "Ese compañero no es tuyo";
					}
			 break;
			}
include 'footer.php'; ?>