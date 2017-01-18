<?php include 'header.php';
   // process form
   $sql = "INSERT INTO `sw_clanboard` (clan, poster, dia, mess) VALUES ('$us[clan]', '$us[nombre]', '$us[dia]', '$_POST[me]')";
   $result = mysql_query($sql);
   $sql = "UPDATE `sw_users` SET cmess='S' WHERE clan='$us[clan]'";
   $result = mysql_query($sql);
   echo "mensaje enviado...";
   echo "<script>location.href=\"clan.php?clan=$us[clan]\"</script>";

include 'footer.php';?>