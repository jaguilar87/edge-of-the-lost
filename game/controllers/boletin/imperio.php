<?
	$html->cargar("tPag", "boletin/imperio.htm");
	
	$html->definirBloque ("tCont", "tPag");
	$html->definirBloque ("tFila", "tPag");
	
	$mostrar = true;
	
	switch ($us->m[imperio]){
		case "1":
			$color = "khaki";
			$fcolor = "black";
			$faccion = "C<br>r<br>e<br>d<br>o<br> <br>d<br>e<br> <br>S<br>o<br>l<br>a<br>r<br>i<br>s";
		break;
		default:
			$mostrar = false;
		break;
	}
	if ($mostrar){
		$sql = $db->query("SELECT * FROM noticias WHERE tipo='".$us->m[imperio]."' ORDER BY data DESC LIMIT 5");
		while ($r = mysql_fetch_array ($sql) ){
			$html->asignar("COLOR", $color);
			$html->asignar("FACCION", $faccion);
			$html->asignar("TITLE", $r[titulo]);
			$html->asignar("NEW", $r[noticia]);
			$html->asignar("AUTHOR", $r[autor]);
			$html->asignar("DATE", $r[data]);
			$html->expandir("FILAS", "+tFila");
			$color = ($color) ? false : true;
		}
	}
	
	$html->expandir("CONTENIDO", "tCont");
?>