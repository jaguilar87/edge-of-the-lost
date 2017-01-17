<?php 
            include_once 'header.php';
            echo "Bienvenido $us[titulo] $us[prefix] $us[nombre] a la Academia, eres un $us[nivel], por ello te podemos ofrecer entrenar lo siguiente:<br>";
?>

<table border="0" cellpadding="0" cellspacing="0" summary="" width="100%">
		<tr>
				<td valign="top"><?phpinclude 'entre/atrb.php';?></td>
				<td valign="top"><?phpinclude 'entre/dotes.php';?></td>
		</tr>
</table>


<?phpinclude_once 'footer.php'; ?>
