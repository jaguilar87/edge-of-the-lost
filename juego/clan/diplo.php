<?php include_once 'header.php';
echo "<center><big><b>Diplomacia</b></big></center>";

if ($_GET[ac]=="borrar") {
    if ($us[nombre]==$cl[lider]) {
        $sql = "DELETE FROM sw_diplomacia WHERE id='$_GET[did]'";
        $result = mysql_query($sql);
        echo "Estado diplomatico borrado.<br>";
    } else {
        echo 'No eres el lider del clan...';
    }
} elseif ($_GET[cland]!="") {
    if ($us[nombre]==$cl[lider]) {
        $sql = "SELECT * FROM sw_diplomacia WHERE origen='$us[clan]' AND destino='$_GET[cland]'";
        $result = mysql_query($sql);
        $m=mysql_fetch_array($result);

        if ($m[hermandad] != $cl[hermandad] && $_GET[estado]=="Aliado") {
            echo "No puedes considerar un clan $m[hermandad] como aliado!<br>";
        } else {
            if ($m[origen]) {
                $res=mysql_query("UPDATE sw_diplomacia SET estado='$_GET[estado]' WHERE origen='$us[clan]' AND destino='$_GET[cland]'");
            } else {
                $sql = "INSERT INTO `sw_diplomacia` (origen, destino, estado) VALUES ('$us[clan]', '$_GET[cland]', '$_GET[estado]')";
                $result = mysql_query($sql);
            }
            echo "Estado diplom&aacute;tico a&ntilde;adido.<br>";
        }
    } else {
        echo 'No eres el lider del clan...';
    }
}
?>
	<table width="100%">
		<tr valign='top'>
			<td>
				<b>Teneis como aliados:</b><br>
<?php
                    $sql = mysql_query("SELECT * FROM sw_diplomacia WHERE origen='$cl[nombre]' AND estado='Aliado'")or die(mysql_error());
                    while ($r=mysql_fetch_array($sql)) {
                        if ($cl[lider]==$us[nombre]) {
                            echo "<a href='clan/?id=diplo&ac=borrar&did=$r[id]'><img src=images/x.gif border=0></a>";
                        }
                        echo "<a href='clan/?id=info&clan=$r[destino]'>$r[destino]</a><br>";
                    }
?>
			</td>
			<td>
				<b>Os tienen como aliados:</b><br>
<?php
                    $sql = mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cl[nombre]' AND estado='Aliado'")or die(mysql_error());
                    while ($r=mysql_fetch_array($sql)) {
                        echo "<a href='clan/?id=info&clan=$r[origen]'>$r[origen]</a><br>";
                    }
?>
			</td>
		</tr>
		<tr valign='top'>
			<td>
				<b>Teneis como Enemigos:</b><br>
<?php
                    $sql = mysql_query("SELECT * FROM sw_diplomacia WHERE origen='$cl[nombre]' AND estado='Enemigo'")or die(mysql_error());
                    while ($r=mysql_fetch_array($sql)) {
                        if ($cl[lider]==$us[nombre]) {
                            echo "<a href='clan/?id=diplo&ac=borrar&did=$r[id]'><img src=images/x.gif border=0></a>";
                        }
                        echo "<a href='clan/?id=info&clan=$r[destino]'>$r[destino]</a><br>";
                    }
?>
			</td>
			<td>
				<b>Os tienen como Enemigos:</b><br>
<?php
                    $sql = mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cl[nombre]' AND estado='Enemigo'")or die(mysql_error());
                    while ($r=mysql_fetch_array($sql)) {
                        echo "<a href='clan/?id=info&clan=$r[origen]'>$r[origen]</a><br>";
                    }
?>
			</td>
		</tr>
	</table>
<?php
if ($us[nombre]==$cl[lider]) {
    echo '<br><hr><br><form action="clan/diplo.php" METHOD="GET">a&ntilde;adir <select name="clan">';

    $sql = "SELECT * FROM sw_clan";
    $result = mysql_query($sql);
    while ($r = mysql_fetch_array($result)) {
        echo "<option value=\"$r[nombre]\"> $r[nombre] - $r[hermandad]</option>";
    }


    echo '</select>como<select name="estado"> <option value="Aliado">Aliado<option value="Enemigo">Enemigo</select>';
    echo ' <input type="submit" Value="Ok"> </form>';
}

include_once 'footer.php';?>
