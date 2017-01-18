<?php include 'header.php';
if ($_GET[clase]){
	 if ($us[pc]<1){
	 		echo "No tienes suficientes Puntos de Clase para aumentar esa clase de nivel";
	 }else{
	 			 $clase=$_GET[clase];
	 			 $us[$clase]++;
				 $us[pc]--;
	 		mysql_query("UPDATE sw_users SET $_GET[clase]='$us[$clase]', pc='$us[pc]' WHERE nombre='$us[nombre]'")or die(mysql_error());
			echo 'Clase aumentada 1 punto <a href="entre.php">Volver</a>.';
	 }
}else{
	echo '<script language="JavaScript" type="text/javascript"> location.href="entre.php" </script>';
}
include 'footer.php'; ?>
