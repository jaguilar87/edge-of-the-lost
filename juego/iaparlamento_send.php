<?php
   // process form
   $sql = "INSERT INTO `sw_board_parlamento` (ciudad, poster, dia, post) VALUES ('$us[ciudad]', '$us[nombre]', '$us[dia]', '$_POST[me]')";
   $result = mysql_query($sql);

   echo "mensaje enviado...";
   echo "<script>location.href=\"idistritos.php?def=iaparlamento.php\"</script>";

?>