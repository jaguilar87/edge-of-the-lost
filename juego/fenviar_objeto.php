<?php 
include 'header.php';
$r=sel("sw_inventario", "id", $_GET[id]);
$u=sel("sw_users", "", $_GET[pl]);

if($ok){
						if ($_GET[id]=="" || $_GET[pl]==""){
							 echo "<script> location.href='fequipo.php' </script>";
						}	
						
						if ($r[jugador]!=$us[nombre] || $r[id]=="" || $u[nombre]==""){
							 echo "No puedes enviar ese objeto! O no es tuyo, o no existe el objeto, o no existe el jugador destino";
						}else{	
							 $us[creditos]-=1000;
							 if($us[creditos]<0){
							 			echo "Creditos insuficientes";
							 }else{
							 			mysql_query("UPDATE sw_inventario SET jugador='$_GET[pl]' WHERE id='$_GET[id]'")or die(mysql_error());
						   			mysql_query("UPDATE sw_users SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'")or die(mysql_error());
										echo "<b>$p[objeto]</b> enviado a <b>$_GET[pl]</b>";
										
							 }
						}
}else{

			echo "Elige que deseas enviar y a quien. Recuerda que enviar un objeto cuesta 1000 Créditos";
			
			echo '
			<form action="fenviar_objeto.php" method="GET">
			<br><br>Enviar a: <input type="text" name="pl"> (Escribe el nombre, respetando mayusculas).
			<br>Objeto: <select name="id">
			';
			$sqla=mysql_query("SELECT * FROM sw_inventario WHERE jugador='$us[nombre]'")or die(mysql_error());
			while ($r=mysql_fetch_array($sqla)){
						echo "<option value='$r[id]'>$r[objeto]</option>";
			}
			echo '</select><br> <input type="submit" VALUE="Enviar" name="ok"></form>';



						
}

include 'footer.php'; ?>
