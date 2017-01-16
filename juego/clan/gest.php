<?php 
	include_once 'header.php';
	if ($cl[lider]==$us[nombre]){
		
		//Expulsar miembros
		echo "<form method='GET' action='clan/'><b>Expulsar miembro:</b> <select name='us'>";
		$sql = mysql_query("SELECT * FROM sw_users WHERE clan='$cl[nombre]' ORDER BY merito DESC")or die (mysql_error());
		while ($r=mysql_fetch_array($sql)){
			echo "<option value='$r[nombre]'>$r[nombre] (Merito: $r[merito])</option>";
		}
		echo "</select> <input type='image' name='id' value='expul' src='images/x.gif'></form><br>";

		//Cambiar bandera
		echo "<form method='post' action='clan/?id=bandera'><b>Bandera:</b> <input name='bandera' style='width:400px' value='$cl[bandera]'><input type=\"submit\" value=\"Modificar\"></form>";

		//Expropiar ciudad
		echo "<form method='GET' action='clan/'><b>Expropiar ciudad:</b> <select name='ci'>";
		$sql = mysql_query("SELECT * FROM sw_city WHERE clan='$cl[nombre]'")or die (mysql_error());
		while ($r=mysql_fetch_array($sql)){
			echo "<option value='$r[nombre]'>$r[nombre]</option>";
		}
		echo "</select> <input type='image' name='id' value='expro' src='images/flag.gif'></form><br>";		
		
		//Sueldo
		echo "<form action=\"clan/\" method=\"GET\"><b>Pago en generador:</b> <input name=\"pago\" align='right' type=\"text\" value=\"$cli[pago]\">Cr�ditos. <input name=\"id\" type=\"hidden\" value=\"mina\"><input type=\"submit\" value=\"Modificar\"></form>";
				
		//Pasar liderazgo
		echo "<form method='GET' action='clan/'><b>Pasar liderazgo del clan:</b> <select name='us'>";
		$sql = mysql_query("SELECT * FROM sw_users WHERE clan='$cl[nombre]' ORDER BY merito DESC")or die (mysql_error());
		while ($r=mysql_fetch_array($sql)){
			echo "<option value='$r[nombre]'>$r[nombre] (Merito: $r[merito])</option>";
		}
		echo "</select> <input type='image' name='id' value='lider' src='images/corona.gif'></form><br>";

		//Disolver clan
		echo "<a href=\"clan/?id=salir\"><img border=0 src=\"images/x.gif\"> Disolver Clan</a>";
		
		//A�adir proyecto
		echo '<br><a href="ciudad/?id=pastilleros"><img border=0 src=images/e.jpg> A�adir un proyecto</a>';
		
		//Rutas
		echo '<br><a href="clan/?id=viajes"><img border=0 src=images/arr.gif> Gestionar Rutas de Viaje</a>';
		
		//Descripci�n
		echo "<center>Descripci�n del clan:<form method='post' action='clan/?id=desc'><textarea style='width:500px' name='dtxt'>$cl[dtxt]</textarea><br><input type=\"submit\" value=\"Modificar\"></form>"; 
	}else{
		echo'No eres el lider del clan';
	}
	include_once 'footer.php';
?>
