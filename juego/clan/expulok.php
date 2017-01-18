<?php include_once 'header.php';
     if ($cl[lider]==$us[nombre]) {
         mysql_query("UPDATE `sw_users` SET clan=NULL WHERE nombre='$_GET[us]'")or die(mysql_error());
         echo "$_GET[us] ha sido expulsado con &eacute;xito.";
         mysql_query("UPDATE sw_city set rey='(NADIE)', Clan='DESOCUPADA' WHERE rey='$_GET[us]'")or die(mysql_error());
         echo "<script> location.href=\"cgest.php\" </script>";
     } else {
         echo "No eres el lider del Clan.";
     }
     include_once 'footer.php';
