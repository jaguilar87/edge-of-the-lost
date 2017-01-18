<?PHP
function nivel($nombre){

		 $l=0;
		 $val="";
		 while ($l<=10){
		 	 echo"<a href='admin.php?nv=10&tip=modadmin.php&pj=$nombre&ad=$l'>$l</a> ";
			 $l++;
	 
	     }
}

if ($_GET[pj]){

mysql_query("UPDATE sw_users SET admin='$_GET[ad]' WHERE nombre='$_GET[pj]'");
echo "El nivel de administrador de <var>$_GET[pj]</var> es ahora <var>$_GET[ad]</var> ...<a href='admin.php?nv=10&tip=modadmin.php'>VOLVER</a>"; 


}else{

	  $i=0;
	  echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Nivel</b></td><td><b>Cambiar</b></td></tr>';
	  $sql=mysql_query("SELECT * FROM sw_users WHERE admin>0 ORDER BY admin DESC")or die(mysql_error());
	  while ($row=mysql_fetch_array($sql)){
	  	  echo "<tr><td>$row[nombre]</td><td>$row[admin]</td><td>";
	  	  nivel($row[nombre]);
	  	  echo "</td></tr>";
	  }

	  echo '</table>';

	  echo "
	  <form action='admin.php'>
	  Nuevo admin: <input name='pj' type='text'> 
	  <input name='ad' type='hidden' value='1'>
	  <input name='nv' type='hidden' value='$_GET[nv]'>
	  <input name='tip' type='hidden' value='modadmin.php'>
	  <input type='submit' Value='Crear'>
	  </form>";
	  
}










?>