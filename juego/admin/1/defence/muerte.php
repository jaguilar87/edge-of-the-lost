

<table width="100%">
<tr>
       <td><b>Id</b></td>
       <td><b>Nombre</b></td>
       <td><b>Mail</b></td>
	   <td><b>Password</b></td>
	   <td><b>Dia</b></td>
</tr>

<?php
    include '../../db.php';

    if ($_GET[dia]=="") {
        $res=mysql_query("SELECT * FROM sw_control_muerte ORDER BY id DESC")or die(mysql_error());
    } else {
        $res=mysql_query("SELECT * FROM sw_control_muerte WHERE dia='$_GET[dia]' ORDER BY id DESC")or die(mysql_error());
    }

   while ($s=mysql_fetch_array($res)) {
       echo "<tr><td>$s[id]<td>$s[nombre]</td><td>$s[mail]</td><td>OCULTO</td></td><td>$s[dia]</td></tr>";
   }
?>
</table>

<br><br><form method="get" action="muerte.php">
Mirar los Logs del dia: <input name="dia" type="text" value=""> <input type="submit" value="Ver">

</form>


<br><br><a href="../../index.php">Volver al Indice del control</a>
