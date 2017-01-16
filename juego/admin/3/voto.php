<?php
switch ($_GET[ac]){
case "mod":
	 echo "<form action='admin.php'><input name='nv' type='hidden' value='$_GET[nv]'><input name='tip' type='hidden' value='voto.php'><input name='ac' type='hidden' value='modok'>Tipos:";
	 $sql=mysql_query("SELECT * FROM sw_evoto WHERE ref='$_GET[ref]' ORDER BY tipo ASC")or die(mysql_error());
	 while ($r=mysql_fetch_array($sql)){
	 	   echo "<br><b>$r[tipo]:</b> <input name='$r[tipo]' type='text' value='$r[mess]' style='width:600px'>";
	 }
	 echo '<br><input type="submit" value="Modificar"></form>';
break;

case "modok":
	 $a=-1;
	 $b=0;
	 $sql=mysql_query("SELECT * FROM sw_evoto WHERE ref='$_GET[ref]' ORDER BY tipo ASC")or die(mysql_error());
	 while ($r=mysql_fetch_array($sql)){$a++;}

	 while ($b<=$a){
	 	   
		   mysql_query("UPDATE sw_evoto SET mess='$_GET[$b]' WHERE tipo='$b'")or die(mysql_error());
		   $b++;

	 }
break;

case "new":

	 echo "<form action='admin.php'><input name='nv' type='hidden' value='$_GET[nv]'><input name='tip' type='hidden' value='voto.php'><input name='ac' type='hidden' value='newok'>A�adir:";
	 
	 echo '<br><b>Pregunta XX:</b> <input name="0" type="text" style="width:600px" value="">'; 
	 echo '<br><b>Repsuesta 1:</b> <input name="1" type="text" style="width:600px" value="">'; 
	 echo '<br><b>Repsuesta 2:</b> <input name="2" type="text" style="width:600px" value="">'; 
	 echo '<br><b>Repsuesta 3:</b> <input name="3" type="text" style="width:600px" value="">'; 
	 echo '<br><b>Repsuesta 4:</b> <input name="4" type="text" style="width:600px" value="">'; 
	 echo '<br><b>Repsuesta 5:</b> <input name="5" type="text" style="width:600px" value="">'; 
	 echo '<br><b>Repsuesta 6:</b> <input name="6" type="text" style="width:600px" value="">';
	 echo '<br>Si necesita mas numero de respuestas contacte con el administrador Zeros Mettallium. Recuerda que al a�adir una nueva votacion la votacion en la anterior desaparecer�.';
	 echo '<br><input type="submit" value="Crear Nueva Votaci�n"></form>';  
break;

case "newok":

	 $sql=mysql_query("SELECT * FROM sw_evoto ORDER BY ref DESC limit 0,1 ")or die(mysql_error());
	 $maxref=mysql_fetch_array($sql);

	 $nref=$maxref[ref]+1;
	 $b=0;

	 $c=0;

	 while ($c<=6){
	 	 if ($_GET[$c]!=""){$max=$c;}
	 	 $c++;
	 }
	 
	 while ($b<=$max){
	 	   mysql_query("INSERT INTO sw_evoto (ref, tipo, mess) VALUES ('$nref', '$b', '$_GET[$b]')")or die(mysql_error());
		   $b++;
	 }
	 
	 mysql_query("UPDATE sw_users SET evoto=NULL");
	 
break;



}	 
	 echo "<table width='100%'><tr><td><b>REF</b></td><td><b>Tipo</b></td><td><b>Texto</b></td><td><b>Votos</b></td></tr>";
	 $sql=mysql_query("SELECT * FROM sw_evoto ORDER BY ref DESC")or die(mysql_error());
	 while ($r=mysql_fetch_array($sql)){
	 	   echo "<tr><td>$r[ref]</td><td>$r[tipo]</td><td>$r[mess]</td><td>$r[num]</td></tr>";
	 }

	 echo "</table><hr><br>";

	 echo "<a href='admin.php?nv=$_GET[nv]&tip=voto.php&ac=new'>Cambiar la Pregunta (Nueva)</a>";
	 echo "<form action='admin.php'><input name='nv' type='hidden' value='$_GET[nv]'><input name='tip' type='hidden' value='voto.php'><input name='ac' type='hidden' value='mod'>Modificar Votaci�n: REF = <input name='ref' style='width:50px' type='text'> <input type='submit' value='Mod.'></form>";
	 echo '<font color="#808080"><b><br><br><em>Aclaraci�n:<br>Ref se refiere al numero de la votacion, todas las entradas con el mismo ref pertenecen a la misma votacion; siendo tipo=0 la pregunta y el resto las posibles respuestas.</em></b></font>';

?>
