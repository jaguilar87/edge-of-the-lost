Cambia de Avatar de forma facil, escribe aquí la URL de una imagen y se 
guardará como tu avatar.<br>  
 
<table width="100%">
 <tr>
  <td>
   <center><br><b>Avatar Actual:</b>
	 <br><img src='<?=$ch->datos[avatar]?>'><br>
  </td>

	<td> 
	 <center>
	 <form method="post" action="?a=ficha/avatar">
   URL del Avatar:
	 <br><input type="Text" name="av" value="<?=$ch->datos[avatar]?>" style="width:250px"><br>
   Grito de Guerra:
	 <br><input type="Text" name="sl" value="<?=$ch->datos[slogan]?>" style="width:250px"><br>
   <input type="submit" name="enviar" value="Cambiar">
   </form>
  </td>
 </tr>
</table>   
