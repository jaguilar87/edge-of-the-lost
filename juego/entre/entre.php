<?php
            include_once 'header.php';
            echo "Bienvenido $us[titulo] $us[prefix] $us[nombre] a la Academia, eres un $us[nivel], por ello te podemos ofrecer entrenar lo siguiente:<br>";
?>

<table border="0" cellpadding="0" cellspacing="0" summary="" width="100%">
		<tr>
				<td valign="top"><?php include 'entre/atrb.php';?></td>
				<td valign="top"><?php include 'entre/dotes.php';?></td>
		</tr>
</table>


<?php include_once 'footer.php'; ?>
