<?php   include 'header.php'; 
if ($enviar) {
   // process form

   $sql = "UPDATE `sw_users` SET avatar_path='$_POST[av]' WHERE nombre='$us[nombre]'";
   $result = mysql_query($sql);
   echo "Avatar modificado... <a href=\"ficha.php\">Volver a la Ficha</a>";

}else{
?> 
Cambia de Avatar de forma facil, escribe aquí la URL de una imagen y se guardará como tu avatar, ten en cuenta que la imagen se vera a 75x75 asi que vigila la imagen que elijas.<br>  
   <br><?=$us[avatar_path]?>
   <form method="post" action="avatar.php">
   URL del Avatar:<input type="Text" name="av" Value="http://" style="width:350px"><br>
   <input type="Submit" name="enviar" value="Ok">
   </form> 
  
<?php 
} //end if 

include 'footer.php';
?> 

