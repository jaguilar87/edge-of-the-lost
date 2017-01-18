<?php include_once 'header.php';
if ($_GET[ac]=="borrar"){
   if ($us[nombre]==$cl[lider]){

   	  $sql = "DELETE FROM sw_diplomacia WHERE id='$_GET[did]'"; 
	  $result = mysql_query($sql);

   }else{echo 'No eres el lider del clan...';}
}elseif($_GET[clan]!=""){
   if ($us[nombre]==$cl[lider]){

      $sql = "SELECT * FROM sw_diplomacia WHERE origen='$us[clan]' AND destino='$_GET[clan]'";
   	  $result = mysql_query($sql);
   	  $m=mysql_fetch_array($result);
	  
	  if ($m[origen]){
	  	    $res=mysql_query("UPDATE sw_diplomacia SET estado='$_GET[estado]' WHERE origen='$us[clan]' AND destino='$_GET[clan]'");
	  }else{
	  		$sql = "INSERT INTO `sw_diplomacia` (origen, destino, estado) VALUES ('$us[clan]', '$_GET[clan]', '$_GET[estado]')";
	  		$result = mysql_query($sql);
	  }
   }else{echo 'No eres el lider del clan...';}
}

echo "<center><big><b>Diplomacia del clan $us[clan]</b></big></center>";
echo '<br><hr><br><b>Aliados del clan:</b><br>';

   $sql = "SELECT * FROM sw_diplomacia WHERE estado='Aliado' AND origen='$us[clan]' OR estado='Aliado' AND destino='$us[clan]' ORDER BY origen ASC";
   $result = mysql_query($sql);
   while ($r = mysql_fetch_array($result)){
   echo "<br>- El clan <a href=\"clan/?clan=$r[origen]\">$r[origen]</a> considera <a href=\"clan/?clan=$r[destino]\">$r[destino]</a> su $r[estado].";
   if ($us[nombre]==$cl[lider] && $r[origen]==$us[clan]){echo "<a href=\"clan/?id=diplo&ac=borrar&did=$r[id]\"><span title=\"borrar\"><img border=0 src=\"images/x.gif\"></a>";} 
 
   }

echo '<br><hr><br><b>Enemigos del clan:</b><br>';

   $sql = "SELECT * FROM sw_diplomacia WHERE estado='Enemigo' AND origen='$us[clan]' OR estado='Enemigo' AND destino='$us[clan]' ORDER BY origen ASC";
   $result = mysql_query($sql);
   while ($r = mysql_fetch_array($result)){
   echo "<br>- El clan <a href=\"clan/?clan=$r[origen]\">$r[origen]</a> considera <a href=\"clan/?clan=$r[destino]\">$r[destino]</a> su $r[estado]. "; 
   if ($us[nombre]==$cl[lider] && $r[origen]==$us[clan]){echo "<a href=\"clan/?id=diplo&ac=borrar&did=$r[id]\"><span title=\"borrar\"><img border=0 src=\"images/x.gif\"></a>";} 
   }


if ($us[nombre]==$cl[lider]){
echo '<br><hr><br><form action="clan/diplo.php" METHOD="GET">Añadir <select name="clan">'; 

   $sql = "SELECT * FROM sw_clan";
   $result = mysql_query($sql);
   while ($r = mysql_fetch_array($result)){
   echo "<option value=\"$r[nombre]\"> $r[nombre] - $r[hermandad]</option>";
   }
   
   
echo '</select>como<select name="estado"> <option value="Aliado">Aliado<option value="Enemigo">Enemigo</select>';
echo ' <input type="submit" Value="Ok"> </form>';



}
include_once 'footer.php';?>
