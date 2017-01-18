<?php include 'header.php';
if ($_GET[id]==""){
	 echo '<script language="JavaScript" type="text/javascript"> location.href="fequipo.php"</script>';
}else{
	 $pi=sel("sw_inventario", "id", $_GET[id]);
	 if ($pi[jugador]==$us[nombre] && $pi[tipo]=="pieza"){
	 			 switch($pi[objeto]){
	 			 		  case "Cadáver nerf":
									 $rec=1000;
							break;
	 			 		  case "Cadáver bantha":
									 $rec=2500;
							break;
	 			 		  case "Cadáver orray":
									 $rec=4000;
							break;
	 			 		  case "Cadáver dewback":
									 $rec=5500;
							break;
	 			 		  case "Cadáver reek":
									 $rec=7000;
							break;
	 			 		  case "Cadáver nexu":
									 $rec=9000;
							break;
	 			 		  case "Cadáver gundark":
									 $rec=11000;
							break;
	 			 		  case "Cadáver wampa":
									 $rec=15000;
							break;
	 			 		  case "Cadáver aklay":
									 $rec=20000;
							break;
	 			 		  case "Cadáver rancor":
									 $rec=50000;
							break;
					 }
					 
					 echo "Has vendido tu $pi[objeto] por <b>$rec Créditos</b>";
					 $us[creditos]+=$rec;
					 mysql_query("UPDATE sw_users SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'")or die(mysql_error());
					 mysql_query("DELETE FROM sw_inventario WHERE id='$_POST[id]'")or die(mysql_error());																																																														
	 }else{
	 		Echo "No puedes vender este objeto como pieza: o no es una pieza o no es tuya!.";
	 }
}
include 'footer.php'; ?>
