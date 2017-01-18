<?php include_once 'header.php';
   // process form
   $sql = "INSERT INTO `sw_board_clan` (clan, poster, dia, mess) VALUES ('$us[clan]', '$us[nombre]', '$us[dia]', '$_POST[me]')";
   $result = mysql_query($sql);
   $sql = "UPDATE `sw_users` SET cmess='S' WHERE clan='$us[clan]'";
   $result = mysql_query($sql);
   echo "mensaje enviado...";
   echo "<script>location.href=\"clan/?id=board\"</script>";

include_once 'footer.php';?>