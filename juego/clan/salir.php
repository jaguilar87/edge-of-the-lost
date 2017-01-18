<?php include_once 'header.php';
	 if ($us[clan]==""){ 
	       echo "No estás en ningun clan";
	 }else{
	       echo "¿Estás seguro que deseas abandonar el clan $us[clan]? <br><br><a href=\"clan/?id=abok\">Abandonar Clan</a>";
	 }
include_once 'footer.php'; ?>