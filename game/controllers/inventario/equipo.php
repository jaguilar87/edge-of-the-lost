<?
	loadClass("Arma");
	loadClass("Armadura");	
	
	$aequipar = $seg->out('aequipar');
	$wequipar = $seg->out('wequipar');
	
	function arma($id, $nombre, $eq){
		$ret = "<a href='?a=inventario/ver&wid=$id'>".I_look."</a>";
		if ($eq){
			$ret .= " <a href='?a=inventario/equipo&wequipar=$id'>".I_sword."</a> ";
		}else{
			$ret .= " <a href='?a=inventario/equipo&wequipar=$id'>".I_nosword."</a> ";
		}
		$ret .= $nombre.BR;
		
		return $ret;
	}

	function armadura($id, $nombre, $eq){
		$ret = "<a href='?a=inventario/ver&aid=$id'>".I_look."</a>";
		if ($eq){
			$ret .= " <a href='?a=inventario/equipo&aequipar=$id'>".I_sword."</a> ";
		}else{
			$ret .= " <a href='?a=inventario/equipo&aequipar=$id'>".I_nosword."</a> ";
		}
		$ret .= $nombre.BR;
		
		return $ret;
	}	
	
	$html->cargar("tCont", "inventario/equipo.htm");
	
	if ($aequipar){
		$a = $db->qsel ("objarmaduras", "id", $aequipar);
		if ($a[owner] == $us->c[id]){
			$oa = new Armadura($a);
			if ($a[vestida]){
				$db->query("UPDATE objarmaduras SET vestida='0' WHERE owner='".$us->c[id]."'");
				$db->query("UPDATE chars SET armadura='0' WHERE id='".$us->c[id]."'");
				$html->asignar("MSG", "Te has desequipado un/a ".$oa->nombre());
			}else{
				$db->query("UPDATE objarmaduras SET vestida='0' WHERE owner='".$us->c[id]."'");
				$db->query("UPDATE objarmaduras SET vestida='1' WHERE id='".$aequipar."'");
				$db->query("UPDATE chars SET armadura='".$aequipar."' WHERE id='".$us->c[id]."'");
				$html->asignar("MSG", "Te has equipado con un/a ".$oa->nombre());
			}
		}else{
			$html->asignar("MSG", "No puedes vestir/desvestir una armadura que no es tuya");
		}
	}
	
	if ($wequipar){
		$a = $db->qsel ("objarmas", "id", $wequipar);
		if ($a[owner] == $us->c[id]){
			$oa = new Arma($a);
			if ($a[vestida]){
				$db->query("UPDATE objarmas SET vestida='0' WHERE owner='".$us->c[id]."'");
				$db->query("UPDATE chars SET arma1='0' WHERE id='".$us->c[id]."'");
				$html->asignar("MSG", "Te has desequipado un/a ".$oa->nombre());
			}else{
				$db->query("UPDATE objarmas SET vestida='0' WHERE owner='".$us->c[id]."'");
				$db->query("UPDATE objarmas SET vestida='1' WHERE id='".$wequipar."'");
				$db->query("UPDATE chars SET arma1='".$wequipar."' WHERE id='".$us->c[id]."'");
				$html->asignar("MSG", "Te has equipado con un/a ".$oa->nombre());
			}
		}else{
			$html->asignar("MSG", "No puedes vestir/desvestir una arma que no es tuya");
		}
	}	
	
	$armas = "";
	$sql = $db->query("SELECT * FROM objarmas WHERE owner='".$us->c[id]."'");
	while ($r = mysql_fetch_array($sql)){
		$w = new Arma($r);
		$armas .= arma ($r[id], $w->nombre(), $r[vestida]);
	}
	
	$html->asignar("vArmas", $armas);
	
	$armaduras = "";
	$sql = $db->query("SELECT * FROM objarmaduras WHERE owner='".$us->c[id]."'");
	while ($r = mysql_fetch_array($sql)){
		$w = new Armadura($r);
		$armaduras .= armadura ($r[id], $w->nombre(), $r[vestida]);
	}
	
	$html->asignar("vArmaduras", $armaduras);
	
	$html->expandir("CONTENIDO", "tCont");
?>