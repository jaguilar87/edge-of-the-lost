<?php include 'header.php';
if ($cl[lider]==$us[nombre]){

   $sql = "INSERT INTO `sw_board_holonews` (poster, titulo, mess, dia, clan, tipo) VALUES ('$us[nombre]', '$_POST[ti]', '$_POST[me]', '$us[dia]', '$us[clan]', 'Diplomacia')";
   $result = mysql_query($sql)or die(mysql_error());

   $sql = "UPDATE `sw_users` SET holomess='S'";
   $result = mysql_query($sql);
   
   echo "HoloNoticia enviada...";
   echo "<script>location.href=\"holonoticias.php\"</script>";






}else{
	  echo "No puedes publicar si no eres el lider de un clan!";
}

include 'footer.php';?>
