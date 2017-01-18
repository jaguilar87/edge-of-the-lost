<?php include 'header.php';
if($_POST[id]){
		
		$c=sel("sw_compa", "id", $_POST[id]);
		echo "<table summary='' width='100%'><tr><td>
				 <table border=1><tr><td><img src='c_$c[tipo].jpg' alt='$c[tipo]'></td></tr></table>
		</td><td>
				 <b>Nombre:</b> $c[nombre]"; 
				 if($c[dueno]==$us[nombre]){ 
				 			echo "<a href='compaset.php?ac=nom&id=$c[id]'><img src='images/arr.gif' alt='Rebautizar'></a>";
				 }
				 echo "
				 <br><b>Tipo:</b> $c[tipo]
				 <br><b>Dueño:</b> $c[dueno]
		</td></tr></table>
		<br><br>
		<table>
		   <tr><td><div align='right'><b>Vigor</b></div></td><td><img src='images/b1.gif' height=10 width=$c[vigor] alt='$c[vigor]'><b>$c[vigor]</b></td></tr>
			 <tr><td><div align='right'><b>Destreza</b></div></td><td><img src='images/b2.gif' height=10 width=$c[destreza] alt='$c[destreza]'><b>$c[destreza]</b></td></tr>
			 <tr><td><div align='right'><b>Constitución</b></div></td><td><img src='images/b4.gif' height=10 width=$c[constitucion] alt='$c[constitucion]'><b>$c[constitucion]</b></td></tr>
			 <tr><td><div align='right'><b>Inteligencia</b></div></td><td><img src='images/b3.gif' height=10 width=$c[inteligencia] alt='$c[inteligencia]'><b>$c[inteligencia]</b></td></tr>
		</table>


		";
}else{
			echo "<b><big>Tus Compañeros</big></b>";
echo'	<table width="100%">
			<tr>
					<td><b>Animales</b></td>
					<td><b>Droides</b></td>
			</tr>
			<tr><td>
			';

			$sqla=mysql_query("SELECT * FROM sw_compa WHERE dueno='$us[nombre]'")or die(mysql_error());
			while($p=mysql_fetch_array($sqla)){
					echo "$p[id] <a href='compa.php?id=$p[id]'> $p[nombre] el $p[tipo]</a>";
			}

			echo "</td></tr></table>";
}
include 'footer.php'; ?>