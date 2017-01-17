<?php include_once 'header.php';
     if ($us[clan]=="") {
         echo "No est&aacute;s en ningun clan";
     } else {
         echo "&iquest;Est&aacute;s seguro que deseas abandonar el clan $us[clan]? <br><br><a href=\"clan/?id=abok\">Abandonar Clan</a>";
     }
include_once 'footer.php';
