<?php
   // process form
   $result = mysql_query("INSERT INTO `sw_board_parlamento` (ciudad, poster, dia, post) VALUES ('$us[ciudad]', '$us[nombre]', '$us[dia]', '$_POST[me]')")or die(mysql_error());

   echo "mensaje enviado...";
   echo "<script>location.href=\"ciudad/?id=aparlamento\"</script>";

?>