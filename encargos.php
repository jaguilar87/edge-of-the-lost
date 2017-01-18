<?php include_once 'header.php';
echo "La siguiente es una lista de las peticiones que realizarán los admins, en las cuales se especificarán las variables usadas y el efecto que se requiere para el módulo.";
include "db.php";
$sqla = mysql_query("SELECT * FROM dc_peticiones ORDER BY id DESC")or die(mysql_error()); 
while ($r=mysql_fetch_array($sqla)){
			echo "<hr><b>$r[tit]<b> - $r[id]<br>$r[desc]<br><i>by: $arc[adm] </i>";
}





include_once 'footer.php'; ?>
