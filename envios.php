<?php include_once 'header.php';
//envios
echo "A continuación una lista de los módulos enviados por los jugadores/admins. Están en formato txt para poder ser leidos.<br>Si quieres enviar un módulo en respuesta a una petición, puedes usar <address>http://www.pastebin.com</address> y pegar el link en el foro, también puedes enviarlo a <address>JAGcompany@hotmail.com</address>";
include "db.php";
$sqla = mysql_query("SELECT * FROM dc_envios ORDER BY id DESC")or die(mysql_error()); 
while ($r=mysql_fetch_array($sqla)){
			echo "<hr><a href='envios/$r[arc]'><b>$r[tit]<b></a> - $r[id]<br>$r[desc]<br><i>by: $arc[adm] </i>";
}


include_once 'footer.php'; ?>
