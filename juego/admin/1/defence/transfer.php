

<table width="100%">
<tr>
       <td><b>Id</b></td>
       <td><b>Dia(Hora)</b></td>
       <td><b>Origen</b></td>
       <td><b>Destino</b></td>
       <td><b>Cantidad</b></td>	   
</tr>

<?php include 'db.php';

if ($_GET[dia]==""){
   $res=mysql_query("SELECT * FROM sw_control_transferencias ORDER BY id DESC")or die(mysql_error());
}else{
   $res=mysql_query("SELECT * FROM sw_control_transferencias WHERE dia='$_GET[dia]' ORDER BY id DESC")or die(mysql_error());
}
   
   while ($s=mysql_fetch_array($res)){
   		 echo "<tr><td>$s[id]</td><td>$s[dia]</td><td>$s[origen]</td><td>$s[destino]</td><td>$s[cantidad]</td></tr>";
   }
?>
</table>

<br><br><form method="get" action="transfer.php">
Mirar los Logs del dia: <input name="dia" type="text" value=""> <input type="submit" value="Ver">

</form>


<br><br><a href="index.php">Volver al Indice del control</a>