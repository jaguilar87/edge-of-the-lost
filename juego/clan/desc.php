<?php include_once 'header.php';
  if ($cl[lider]==$us[nombre]) {
      mysql_query("UPDATE `sw_clan` SET dtxt='$_POST[dtxt]' WHERE nombre='$us[clan]'")or die(mysql_error());
      echo 'Descripci&oacute;n modificada';
  } else {
      echo "No eres el lider del Clan.";
  }




include_once 'footer.php';
