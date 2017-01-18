<?
	$html->cargar("tCont", "ataque/caza.htm");
	
	$html->asignar("vZona", getText($us->m[tierra], "terreno"));
	
	$silvestre = tierraSilvestre($us->m[tierra]);
	if ($silvestre) {
		
		$monstruos = "";
		$sql = $db->query("SELECT * FROM mobs WHERE zonas='".$us->m[tierra]."'");
		while($r = mysql_fetch_array($sql)) {
			$monstruos .= $r[nombre]." ".$r[apellido].BR;
		}
		$html->asignar("vMonstruos", $monstruos);
		
		if ($us->c[pv] > 0) {
			$html->asignar("vLinkAtaque", "<a onClick='javascript:refresh();' href='ataque/caza.php' target=_BLANK>".I_sword."¡Atacar!".I_sword."</a>");
		} else {
			$html->asignar("vLinkAtaque", "<font color=red>No puedes atacar estando KO.</font>");
		}
	} else {
		$html->asignar("vMonstruos", "<font color=red>¡Esta zona no es silvestre! No puedes Cazar aquí.");
	}
	
	$html->expandir("CONTENIDO", "tCont");
?>