<?php include 'header.php';

?> 
<center><big><b>Inventario</b></big></center><hr>

<table width="100%" border=1>
<tr>
       <td bgcolor="#737373" width=200><center><b>Arma</b></center></td>
       <td bgcolor="#737373" width=300><center><b>Equipo</b></center></td>
</tr>
<tr>	   
       <td  VALIGN="TOP">
	   <?php 
	   if($camb){

	   		$us[color_sable]=$_GET[color];
				 if ($us[nv_sable]>=3){
				    if ($us[estilo_sable]=="+"){$us[vigor]-=10;}
   					if ($us[estilo_sable]=="2"){$us[constitucion]-=10;}
   					if ($us[estilo_sable]=="11"){$us[destreza]-=10;}
   					if ($_GET[estilo]=="+"){$us[vigor]+=10;}
   					if ($_GET[estilo]=="2"){$us[constitucion]+=10;}
   					if ($_GET[estilo]=="11"){$us[destreza]+=10;}
				 }

			$us[estilo_sable]=$_GET[estilo];



			$c="UPDATE `sw_users` SET color_sable='$_GET[color]', estilo_sable='$_GET[estilo]', vigor='$us[vigor]', constitucion='$us[constitucion]', destreza='$us[destreza]' WHERE nombre='$us[nombre]'";	
			$result=mysql_query($c)or die(mysql_error());
	   }

	   if ($us[nv_sable]==0){
	   	  echo '<center>Nombre: <b>Sable de Entrenamiento</b><br><img width=125 height=125 src="images/espada.jpg"><br> Mientras seas usuario no puedes usar sables láser...';
	   }elseif($us[nv_sable]==1 || $us[nv_sable]==2){
	   	  echo '<center>Nombre: <b>Sable Láser</b><br><img width=125 height=125 src="images/sables/1'.$us[color_sable].'.jpg"> <br>';
		  echo '<form action="fequipo.php">
		  	   		  <input name="estilo" type="hidden" value="+">
		  		<center><table width="100%">
				<tr>
				       <td><div align="right"><b>Color:</b></div></td>
					   <td>
					   <select name="color" style="width:125px">
					    <option value="azul">Azul
					    <option value="rojo">Rojo
					    <option value="amarillo">Amarillo
					    <option value="naranja">Naranja
					    <option value="verde">Verde
					    <option value="morado">Morado
					   </select>
					   </td>
				</tr>
				</table>
				<input type="submit" name="camb" Value="Cambiar">
				</form>';

	   }elseif($us[nv_sable]>=3){
	   	  echo '<center>Nombre: <b>Sable Láser</b><br><img border=1 width=125 height=125 src="images/sables/'.$us[estilo_sable].$us[color_sable].'.jpg"> <br>
		  <form action="fequipo.php">
		  		<center><table width="100%">
				<tr>
				       <td><div align="right"><b>Color:</b></div></td>
					   <td>
					   <select name="color" style="width:125px">
					    <option value="azul">Azul
					    <option value="rojo">Rojo
					    <option value="amarillo">Amarillo
					    <option value="naranja">Naranja
					    <option value="verde">Verde
					    <option value="morado">Morado
					   </select>
					   </td>
				</tr>
				<tr>
				       <td><div align="right"><b>Tipo:</b></div></td>
       				   <td>
					  <select name="estilo" style="width:125px">
					   <option value="+">Largo (+Vigor)
					   <option value="2">Doble (+Constitución) 
					   <option value="11">Dos Sables (+Destreza)
					  </select>
					  </td>
				</tr>
				</table></center>
		  		

				<input type="submit" name="camb" Value="Cambiar">
		  </form>';

}?>
       </td>


       <td VALIGN="TOP">
	   
		</td>
</tr>
</table>

<table width="100%" border=1>
<tr>
       <td bgcolor="#737373"><center><b>Inventario</b></center></td>
</tr>
<tr>
		 	 <td VALIGN="TOP">			 
			 <table summary="" Width="100%">
			 				<tr>
									<td><b>No Equipado</b></td><td><b>Capturas</b></td>
							</tr>
							<tr>
									<td></td>
									<td>   
		 <?php
	   					$sqla=mysql_query("SELECT * FROM sw_inventario WHERE tipo='pieza' AND jugador='$us[nombre]'")or die(mysql_error());
	   					While ($p=mysql_fetch_array($sqla)){
	   								echo "- $p[objeto] <a onMouseover=\" ddrivetip('Vender la Pieza por Créditos al Mercado.', '#808080');\" onMouseout=\"hideddrivetip()\" href='iacazav.php?id=$p[id]'><img src='images/arr.gif' border=0 alt='Vender pieza al Mercado'></a><br>";
							}
	   ?>				 		</td>
	   
	   
	   
	   

		 	        </tr>
		 </table> 
		 </td>
</tr>
</table>

<br><br><a href="fenviar_objeto.php"><img border=0 src="images/new.gif" alt="Envio"> Enviar objeto a otro jugador.</a>	   
	   
<?php include 'footer.php'; ?>