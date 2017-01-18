<?php   include 'header.php'; 
if ($enviar) {
   // process form

   $sql = "UPDATE `sw_users` SET avatar_path='$_GET[av]' WHERE nombre='$us[nombre]'";
   $result = mysql_query($sql);
   echo "<img src='$_GET[av]'><br>Avatar modificado... <a href=\"ficha/\">Volver a la Ficha</a>";

}else{
?> 
Cambia de Avatar de forma facil, escribe aquí la URL de una imagen y se guardará como tu avatar, ten en cuenta que la imagen se vera a 75x75 asi que vigila la imagen que elijas.<br>  
   <center><br><b>Avatar Actual:</b><br><img src='<?php echo $us[avatar_path];?>'><br><?=$us[avatar_path]?></center>
   <form method="get" action="ficha/avatar.php">
   URL del Avatar:<input type="Text" name="av" Value="<?=$_GET[def]?>" style="width:350px"><br>
   <input type="Submit" name="enviar" value="Ok">
   </form> 
   
   <br><br><b>A continuación una lista de posibles avatares:</b><br>
   <br><table width="100%">
<tr>
       <td width="33%"><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_arkaniano.jpg"><img border=0 src="images/avatar/e_arkaniano.jpg"></a></center></td>
       <td width="33%"><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_bothan.jpg"><img border=0 src="images/avatar/e_bothan.jpg"></a></center></td>
       <td width="33%"><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_caamasi.jpg"><img border=0 src="images/avatar/e_caamasi.jpg"></a></center></td>
</tr>
<tr>
       <td><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_cathar.jpg"><img border=0 src="images/avatar/e_cathar.jpg"></a></center></td>
       <td><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_duro.jpg"><img border=0 src="images/avatar/e_duro.jpg"></a></center></td>
       <td><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_faallen.jpg"><img border=0 src="images/avatar/e_faallen.jpg"></a></center></td>
</tr>
<tr>
       <td><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_humano.jpg"><img border=0 src="images/avatar/e_humano.jpg"></a></center></td>
       <td><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_keldor.jpg"><img border=0 src="images/avatar/e_keldor.jpg"></a></center></td>
       <td><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_twilek.jpg"><img border=0 src="images/avatar/e_twilek.jpg"></a></center></td>
</tr>
<tr>
       <td><center><a href="ficha/avatar.php?def=http://jagcompany.civitis.com/sw-eotlw/juego/images/avatar/e_zabrak.jpg"><img border=0 src="images/avatar/e_zabrak.jpg"></a></center></td>
       <td></td>
       <td></td>
</tr>	   
</table>
  
<?php 
} //end if 

include 'footer.php';
?> 

