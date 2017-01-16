<?php include_once 'header.php';
	 if ($us[clan]==""){ 
	       echo "No est�s en ningun clan";
	 }else{
	       echo "�Est�s seguro que deseas abandonar el clan $us[clan]? <br><br><a href=\"clan/?id=abok\">Abandonar Clan</a>";
	 }
include_once 'footer.php'; ?>
