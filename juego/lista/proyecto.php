<?php include_once 'header.php';

	 if ($_GET[div]==""){echo "<script> location.href='lista/hangar.php' </script>";}

	 $l=sel ("sw_vehiculos","",$_GET[div]);
	 $cn = sel ("sw_clan","",$l[fabricante]);
	 $via= sel("sw_viaje", "vehiculo", $l[nombre]);
	 
	 if ($via){ $viaje= "de $via[origen] a $via[destino]";}else{$viaje="Ninguna";}
	 
	 echo "<big><center><big><font color=\"#f0f3bb\">Proyecto N� <b>$l[id]</b></big><br><img src='images/".$l[tipo].".jpg'><br>$l[nombre]</font></center></big><br><br></b></b>";
	 echo "<center><table>
<tr>
       <td><div align='right'>Fabricante:</td>
       <td><b>$l[fabricante]</b></td>
</tr>
<tr>
       <td><div align='right'>Propietario:</td>
       <td><b>$l[tprop] $l[prop]</b></td>
</tr>
<tr>
       <td><div align='right'>Tipo:</td>
       <td><b>$l[tipo]</b></td>
</tr>
<tr>
       <td><div align='right'>Posici�n:</td>
       <td><b>Aparcado en la ciudad $l[ciudad]</b></td>
</tr>
<tr>
       <td><div align='right'>Mineral Invertido:</div></td>
       <td><b>$l[mineral]</b></td>
</tr>
<tr>
       <td><div align='right'>Pot�ncia en construcci�n:</td>
       <td><b>$l[potencia] W</b></td>
</tr>
<tr>
       <td><div align='right'>En uso:</td>
       <td><b>$l[uso]</b></td>
</tr>
<tr>
       <td><div align='right'>Ruta Viaje:</td>
       <td><b>$viaje</b></td>
</tr>
<tr>
       <td><div align='right'>Armamento:</td>
       <td><b>$l[arma]</b></td>
</tr>
</table></center>
"; 

if ($n[venta]=="S"){
   echo "<br><a href='ciudad/?id=pcomprar.php&veh=$n[nombre]'>Vehiculo a la venta por $n[precio]</a>";
}



include_once 'footer.php';?>
