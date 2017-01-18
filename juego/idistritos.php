<?php include 'header.php';
if ($_GET[ciudad]==""){$_GET[ciudad]=$ci[nombre];}
if ($_GET[def]==""){$_GET[def]="iagobierno.php";}

$c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
$result2=mysql_query($c)or die(mysql_error());
$cic=mysql_fetch_array($result2);

$c="SELECT * FROM sw_plan WHERE nombre='$cic[planeta]'";
$result=mysql_query($c)or die(mysql_error());
$plc=mysql_fetch_array($result);

$s="SELECT * FROM sw_diplomacia WHERE destino='$us[clan]' AND origen='$cic[clan]'";
$result2=mysql_query($s)or die(mysql_error());
$za=mysql_fetch_array($result2);

if ($cic[nombre]==Null){echo 'La ciudad ha sido arrasada...<br><a href="ihuir.php">Caminar hasta otra ciudad</a>';}else{

$u=textcolor($cic[rey]);

echo "<center><marquee style=\"width:500px\"> $cic[mess] </marquee></center>";

?>
<table width="100%" ><tr><td VALIGN="TOP">

<table border="0" width="100" cellspacing="1" cellpadding="1" VALIGN="TOP">


	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Gobierno</b></center>
		   </td>
	   </tr>

	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
<? echo		   	   "<center><a href=\"idistritos.php?def=iagobierno.php&ciudad=$cic[nombre]\" Class=\"navlink\">Ayuntamiento</a></center>
		   </td>
	   </tr>";
if ($ci[nombre]==$cic[nombre]){
echo "
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=iacenso.php\" Class=\"navlink\">Censo</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=iaparlamento.php\" Class=\"navlink\">Parlamento</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=ialey.php\" Class=\"navlink\">Leyes</a></center>
		   </td>
	   </tr>	   
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Distrito Residencial</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=irhospital.php\" Class=\"navlink\">Hospital</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=irburdel.php\" Class=\"navlink\">Burdel</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"entre.php\" Class=\"navlink\">Escuela</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Distrito Comercial</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"crimen.php\" Class=\"navlink\">Crimen</a></center>
		   </td>
	   </tr>
   	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"trabajo.php\" Class=\"navlink\">Trabajo</a></center>
		   </td>
	   </tr>
   	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=icbar.php\" Class=\"navlink\">Bar</a></center>
		   </td>
	   </tr>	   
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Distrito Industrial</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=iimina.php\" Class=\"navlink\">Mina</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Puerto Estelar</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ipviaje.php\" Class=\"navlink\">Viajar</a></center>
		   </td>
	   </tr>	   
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"iphangar.php\" Class=\"navlink\">Hangares</a></center>
		   </td>
	   </tr>	   
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"idistritos.php?def=ipastilleros.php\" Class=\"navlink\">Astilleros</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Afueras</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"iacaza.php\" Class=\"navlink\">Cazar</a></center>
		   </td>
	   </tr>		   	   
"; } ?>
</table>



</td><td width="70%" VALIGN="TOP">
<?

include $_GET[def];


echo '</td></tr></table>';

if ($cic[nombre]!=$ci[nombre]){echo "<br><a href=\"ipviajok.php?ci=$cic[nombre]&pl=$plc[nombre]\">Viajar a la ciudad</a>";}
if ($cic[nombre]==$ci[nombre] && $cl[lider]==$us[nombre] && $cic[clan]!=$us[clan] && $cic[atacada]=="N" && $za[estado]!="Aliado"){echo "<br><a href=\"aciudad_sel.php?ci=$cic[nombre]\"><img border=0 src=\"images/atk.gif\"> Planear Ataque contra la ciudad!</a>";}
if ($cic[atacada]=="S"){echo '<br><font color="#29fd49">La ciudad Dispone de protección.</font>';}




}
include 'footer.php';?>
