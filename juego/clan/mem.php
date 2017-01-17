<?php
    include 'header.php';
?>
	<b>Miembros del Clan:</b><br>
	<table width="100%">
		<tr>
			<td><b>Nombre</b></td>
			<td>Ciudad</td>
			<td align="right">M&eacute;rito*</td>
			<td></td>
		</tr>
<?php
    $c="SELECT * FROM `sw_users` WHERE clan='$cli[nombre]' ORDER BY merito DESC";
    $result=mysql_query($c)or die(mysql_error());
    $i=1;
    while ($r = mysql_fetch_array($result)) {
        $u=textcolor($r[nombre]);
        echo "
		<tr>
			<td>
				$i- <a href=\"lista/info.php?us=$r[nombre]\">$u[nom]</a>
			</td>
			<td>
			";
        if ($us[clan]==$cli[nombre]) {
            echo "$u[ciudad] ($u[planeta])";
        } else {
            echo "???????";
        }
        echo "
			</td>
			<td>
				<div align=\"right\">$u[merito]</div>
			</td>
			<td>
		";

        if ($r[nombre]==$cl[lider]) {
            echo '<spam title="Lider del Clan"><img src="images/corona.gif"></spam>';
        } elseif ($us[nombre]==$cl[lider]) {
            echo '<a href="clan/?id=expul&us=$r[nombre]"><img border=0 src="images/x.gif"></a>';
        }
        echo "</td></tr>";
        $i++;
    }
?>
	</table>
	*Merito: El sueldo del Miembro es igual a su m&eacute;rito (cobro a las 00).
<?php
    include 'footer.php';
?>
