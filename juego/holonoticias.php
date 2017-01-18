<?php include 'header.php';

$c="UPDATE `sw_users` SET holomess='N' WHERE nombre='$_SESSION[nombre]'";
$result=mysql_query($c)or die(mysql_error());

echo '<u><b><big><big><center>. : HoloNoticias : .</center></big></big></b></u>';

echo "<small><br><br><i><b>Normas de las HoloNoticias</b></i>: Las HoloNoticias están destinadas a que los Lideres de los clanes se comuniquen entre ellos y con el resto de jugadores para llegar a acuerdos y otros tipos de discusiones. Cualquier tipo de anuncio o información banal será borrada y se planteará la expulsión del publicador del juego. Usen las Holonoticias como es debido.</small><br><br>";
$c="SELECT * FROM `sw_board_holonews` ORDER BY id DESC";
$result=mysql_query($c)or die(mysql_error());
echo '<table width="100%" border=1 cellpading="3" cellspacing="3"\><tr><td><center><b>*</b></center></td><td><b>Título</b></td><td><center><b>Autor</b></center></td><td><center>Día</center></td></tr>';
while ($p = mysql_fetch_array($result)){echo "<tr><td><center>$p[id]</center></td><td><a href=\"holoread.php?ti=$p[titulo]#$p[id]\">$p[titulo]</a></td><td><center><b>$p[poster]</b><br>$p[clan]</center></td><td><center>$p[dia]</center></td></tr>";} 
echo '</table>';

if ($cl[lider]==$us[nombre]){
   echo '<a name="send"></a>';
   echo "<br><br>Escribe una HoloNoticia<form method=\"post\" action=\"holosend.php\">
   <b>Título:</b><input name=\"ti\" type=\"text\" value=\"$_GET[tit]\" style=\"width:450px\">
   <b>Mensaje:</b><br><textarea style=\"width:450px\" name=\"me\"></textarea>
   <input type=\"Submit\" name=\"enviar\" value=\"Publicar\">
   </form>";
}





include 'footer.php';?>
