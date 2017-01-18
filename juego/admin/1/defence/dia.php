

<table width="100%" border=1>
<tr>
       <td><b>Id</b></td>
       <td><b>Dia</b></td>
       <td><b>Log Control</b></td>
</tr>

<?php include 'db.php';

if ($_GET[dia]=="") {
    $res=mysql_query("SELECT * FROM sw_control ORDER BY id DESC")or die(mysql_error());
} else {
    $res=mysql_query("SELECT * FROM sw_control WHERE fecha='$_GET[dia]' ORDER BY id DESC")or die(mysql_error());
}
   
   while ($s=mysql_fetch_array($res)) {
       echo "<tr><td>$s[id]</td><td>$s[fecha]</td><td>$s[log]</td></tr>";
   }
?>
</table>

<br><br><form method="get" action="dia.php">
Mirar los Logs del dia: <input name="dia" type="text" value=""> <input type="submit" value="Ver">

</form>


<br><br><a href="index.php">Volver al Indice del control</a>
