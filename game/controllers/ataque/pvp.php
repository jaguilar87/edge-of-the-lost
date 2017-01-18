<?
	$html->cargar("tPag", "ataque/pvp.htm");
	
	$html->definirBloque("tCont", "tPag");
	$html->definirBloque("tFila", "tPag");
	
	$pid = $seg->out('pid');
	
	if ($pid){
		$obj = new User($pid);
		if ($obj->c[x] == $us->c[x] AND $obj->c[y] == $us->c[y]){
			if ($us->c[pv] > 0){
				if ($obj->c[pv] > 0){	
					if ($obj->c[id] != $us->c[id]){	
						$html->asignar("MSG", "<big><a href='ataque/pvp.php?pid=$pid' target=_BLANK>".I_sword."¡Al Ataque!".I_sword."</a></big>");
					}else{
						$html->asignar("MSG", "¿Y como piensas atacarte a tí mismo?");
					}
				}else{
					$html->asignar("MSG", "Ya ha caido, déjalo en paz.");
				}
			}else{
				$html->asignar("MSG", "Sabes que no eres inmortal, ¿verdad? No puedes atacar estando KO.");
			}
		}else{
			$html->asignar("MSG", "El jugador seleccionado no está en la misma área que tú.");
		}
	}else{
		$html->asignar("MSG", "Elige un objetivo.");
	}
	
	$maxnivel = $us->c[nivel] + 5;
	$minnivel = $us->c[nivel] - 5;
	
	$sql = $db->query("SELECT * FROM chars WHERE id!='".$us->c[id]."' AND x='".$us->c[x]."' AND y='".$us->c[y]."' AND nivel<'$maxnivel' AND nivel>'$minnivel' AND pv>'0'");
	while ($r = mysql_fetch_array($sql)){
		$html->asignar("fImperio", "<img width=15 src='../images/logos/".getText($r[nacionalidad],"ImperioDiminutivo").".gif'>");
		$html->asignar("fReligion", "<img width=15 src='../images/flags/".getText($r[religion], "religionFlag").".gif'>");
		$html->asignar("fNombre", $r[nombre]." ".$r[apellido]." <img src='../images/".$r[sexo].".gif'>");
		$html->asignar("fAtt", "<a href='?a=ataque/pvp&pid=".$r[owner]."'>".I_sword."</a>");
		
		$html->expandir ("FILAS", "+tFila");
	}
	
	$html->expandir("CONTENIDO", "tCont");
?>