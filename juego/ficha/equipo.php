<?php include_once 'header.php';

?>
<center><big><b>Inventario</b></big></center><hr>

<table width="100%" border=1>
<tr>
       <td bgcolor="#737373" width=200><center><b>Arma</b></center></td>
       <td bgcolor="#737373" width=300><center><b>Descripci&oacute;n</b></center></td>
</tr>
<tr>
       <td  VALIGN="TOP">
	   <?php
       if ($camb) {
           $us[color_sable]=$_GET[color];
           $us[estilo_sable]=$_GET[estilo];
           $c="UPDATE `sw_users` SET color_sable='$_GET[color]', estilo_sable='$_GET[estilo]' WHERE nombre='$us[nombre]'";
           $result=mysql_query($c)or die(mysql_error());
       }

       if ($us[nv_sable]==0) {
           echo '<center><img width=150 height=150 src="images/espada.jpg">';
       } elseif ($us[nv_sable]==1) {
           echo '<center><img width=150 height=150 src="images/sables/1azul.jpg">';
       } elseif ($us[nv_sable]==2) {
           echo '<center><img width=150 height=150 src="images/sables/1'.$us[color_sable].'.jpg"> <br>';
           echo '<form action="ficha/equipo.php">
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
       } elseif ($us[nv_sable]>2) {
           echo '<center><img border=1 width=150 height=150 src="images/sables/'.$us[estilo_sable].$us[color_sable].'.jpg"> <br>
		  <form action="ficha/equipo.php">
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
					   <option value="+">Largo
					   <option value="2">Doble
					   <option value="11">Dos Sables
					  </select>
					  </td>
				</tr>
				</table></center>


				<input type="submit" name="camb" Value="Cambiar">
		  </form>';
       }?>
       </td>


       <td VALIGN="TOP">
<?php
            if ($us[nv_sable]==0) {
                echo  "<b>Sable:</b> Para empezar a aprender los movimientos y el correcto uso del arma los usuarios practican con un sable normal hasta el momento de entrar en la academia";
            } elseif ($us[nv_sable]==1) {
                echo  "<b>Sable l&aacute;ser de aprendizaje:</b> Uno de los examenes que has de pasar para entrar en la academia es fabricarte tu poprio sable laser con el cual empezar a luchar.";
            } elseif ($us[nv_sable]==2) {
                echo  "<b>Sable l&aacute;ser:</b> A medida que avanzas en tu aprendizaje vas viendo la necesidad de personalizar tu sable a tu gusto, puediendo ahora elegir otro color.";
            } elseif ($us[nv_sable]>2 and $us[estilo_sable]=='+') {
                echo  "<b>Sable l&aacute;ser largo:</b> Con un sable l&aacute;ser largo eres capaz de luchar manteniendo las distancias y de esta manera tener m&aacute;s posibilidades de da&ntilde;ar a tu enemigo y de hacerlo con m&aacute;s fuerza. Los luchadores armados con un sable largo son capaces de lanzar ataques poderosos conocidos como: EXTERMINIOS que pueden llegar a hacer el doble de da&ntilde;o que un ataque normal.";
            } elseif ($us[nv_sable]>2 and $us[estilo_sable]=='11') {
                echo  "<b>Dos sables l&aacute;ser:</b> El dominio y la destreza de los sables se multiplican al empu�ar dos sables, con ellos el luchador es capaz de lanzar dos ataques consecutivos, aunque un poco m&aacute;s d�biles de lo normal.";
            } elseif ($us[nv_sable]>2 and $us[estilo_sable]=='2') {
                echo  "<b>Sable l&aacute;ser doble:</b> Los luchadores armados con un sable l&aacute;ser doble pueden mantener a su enemigo alejado lanzando ataques indiscriminadamente, es por eso que cada vez que da&ntilde;a el poseedor del sable doble puede tener unos momentos de descanso en los que recuperar su vida mediante la vitalizaci&oacute;n.";
            }
?>
		</td>
</tr>
</table>

<table width="100%" border=1>
<tr>
        <td bgcolor="#737373">
			<center><b>Inventario</b></center>
		</td>
</tr>
<tr>
		 	 <td VALIGN="TOP">
			 <table summary="" Width="100%">
			 				<tr>
									<td><b></b></td><td><b>Capturas</b></td>
							</tr>
							<tr>
									<td></td>
									<td>
		 <?php
                        $sqla=mysql_query("SELECT * FROM sw_inventario WHERE tipo='pieza' AND jugador='$us[nombre]'")or die(mysql_error());
                        while ($p=mysql_fetch_array($sqla)) {
                            echo "- $p[objeto] <a onMouseover=\" ddrivetip('Vender la Pieza por Cr&eacute;ditos al Mercado.', '#808080');\" onMouseout=\"hideddrivetip()\" href='ciudad/?id=acazav&oid=$p[id]'><img src='images/arr.gif' border=0 alt='Vender pieza al Mercado'></a><br>";
                        }
       ?>				 		</td>





		 	        </tr>
		 </table>
		 </td>
</tr>
</table>

<br><br><a href="ficha/enviar_objeto.php"><img border=0 src="images/new.gif" alt="Envio"> Enviar objeto a otro jugador.</a>

<?php include_once 'footer.php'; ?>
