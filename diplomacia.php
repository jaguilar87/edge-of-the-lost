<?php include 'header.php';
if ($_GET[ac]=="borrar"){
   if ($us[nombre]==$cl[lider]){

   	  $sql = "DELETE FROM sw_diplomacia WHERE id='$_GET[id]'"; 
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

echo "<center><big><b>Dimplomacia del clan $us[clan]</b></big></center>";
echo '<br><hr><br><b>Aliados del clan:</b><br>';

   $sql = "SELECT * FROM sw_diplomacia WHERE estado='Aliado' AND origen='$us[clan]' OR estado='Aliado' AND destino='$us[clan]' ORDER BY origen ASC";
   $result = mysql_query($sql);
   while ($r = mysql_fetch_array($result)){
   echo "<br>- El clan <a href=\"clan.php?clan=$r[origen]\">$r[origen]</a> considera <a href=\"clan.php?clan=$r[origen]\">$r[destino]</a> su $r[estado].";
   if ($us[nombre]==$cl[lider] && $r[origen]==$us[clan]){echo "<a href=\"diplomacia.php?ac=borrar&id=$r[id]\"><span title=\"borrar\"><img border=0 src=\"images/x.gif\"></a>";} 
 
   }

echo '<br><hr><br><b>Enemigos del clan:</b><br>';

   $sql = "SELECT * FROM sw_diplomacia WHERE estado='Enemigo' AND origen='$us[clan]' OR estado='Enemigo' AND destino='$us[clan]' ORDER BY origen ASC";
   $result = mysql_query($sql);
   while ($r = mysql_fetch_array($result)){
   echo "<br>- El clan <a href=\"clan.php?clan=$r[origen]\">$r[origen]</a> considera <a href=\"clan.php?clan=$r[origen]\">$r[destino]</a> su $r[estado]. "; 
   if ($us[nombre]==$cl[lider] && $r[origen]==$us[clan]){echo "<a href=\"diplomacia.php?ac=borrar&id=$r[id]\"><span title=\"borrar\"><img border=0 src=\"images/x.gif\"></a>";} 
   }


if ($us[nombre]==$cl[lider]){
echo '<br><hr><br><form action="diplomacia.php" METHOD="GET">Añadir <select name="clan">'; 

   $sql = "SELECT * FROM sw_clan";
   $result = mysql_query($sql);
   while ($r = mysql_fetch_array($result)){
   echo "<option value=\"$r[nombre]\"> $r[nombre] - $r[hermandad]</option>";
   }
   
   
echo '</select>como<select name="estado"> <option value="Aliado">Aliado<option value="Enemigo">Enemigo</select>';
echo ' <input type="submit" Value="Ok"> </form>';

echo '<br><hr><br><form action="ataquecl.php" METHOD="GET">Atacar <select name="clan">';

	$s = "SELECT * FROM sw_diplomacia WHERE origen='$us[clan]' AND estado='Enemigo'";
	$q = mysql_query($s);
	while ($l = mysql_fetch_array($q)){
	     echo "<option value=\"$l[destino]\">Clan $l[destino]</option>";
    } 			

	$x=0;
	
	$s = "SELECT * FROM sw_vehiculos WHERE tprop='Clan' AND prop='$us[clan]' AND tipo='Crucero De Batalla'";
	$q = mysql_query($s);
	while ($l = mysql_fetch_array($q)){$x++;}
	
	
echo "</select> con <b>$x Cruceros de Batalla</b> ";
echo '<input type="submit" Value="Ok"> </form>';

}
include 'footer.php';?>
