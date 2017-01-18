<?php include 'header.php';
if ($_GET[ciudad]==""){$_GET[ciudad]=$ci[nombre];}
if ($_GET[id]==""){$_GET[id]="agobierno";}


$cic=sel("sw_city", "", $_GET[ciudad]);
$plc=sel("sw_plan", "", $cic[planeta]);

$result2=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$us[clan]' AND origen='$cic[clan]'")or die(mysql_error());
$za=mysql_fetch_array($result2);

if ($cic[nombre]==Null){
	 echo 'La ciudad ha sido arrasada...<br><a href="ciudad/?id=huir">Caminar hasta otra ciudad</a>';
}else{

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
	   	   <td w?idth="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
	 <? echo "<center><a href=\"ciudad/?id=agobierno&ciudad=$cic[nombre]\" Class=\"navlink\">Ayuntamiento</a></center>
		   </td>
	   </tr>";
   if ($ci[nombre]==$cic[nombre]){
	   echo "
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=acenso\" Class=\"navlink\">Censo</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=aparlamento\" Class=\"navlink\">Parlamento</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=aley\" Class=\"navlink\">Leyes</a></center>
		   </td>
	   </tr>	   
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Distrito Residencial</b></center>
		   </td>
	   </tr>";
		 
	   if ($cic[cura]=="S"){ echo"
		 <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=rhospital\" Class=\"navlink\">Hospital</a></center>
		   </td>
	   </tr>";}
	   
		 if ($cic[burdel]=="S"){ echo"		 
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=rburdel\" Class=\"navlink\">Burdel</a></center>
		   </td>
	   </tr>";}
		 
	   echo"		 
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"entre/\" Class=\"navlink\">Academia</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Distrito Comercial</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=crimen\" Class=\"navlink\">Crimen</a></center>
		   </td>
	   </tr>";
		 
	   if ($cic[ayuda]=="S"){ echo"		 
   	 <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=trabajo\" Class=\"navlink\">Trabajo</a></center>
		   </td>
	   </tr>";}
		 
	   if ($cic[bar]=="S"){ echo"		 
   	 <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=cbar\" Class=\"navlink\">Bar</a></center>
		   </td>
	   </tr>";}
		 echo "
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Distrito Industrial</b></center>
		   </td>
	   </tr>";
	   
		 if ($cic[mina]=="S"){ echo"				 
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=imina\" Class=\"navlink\">Mina</a></center>
		   </td>
	   </tr>";}
		 
	   echo"				 
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=igenerador\" Class=\"navlink\">Generador</a></center>
		   </td>
	   </tr>";
		 
 	   if ($cic[armeria]=="S"){ echo"		
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=iarmeria\" Class=\"navlink\">Armeria</a></center>
		   </td>
	   </tr>";}
		 
	   echo"				       
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Puerto Estelar</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"viaje/\" Class=\"navlink\">Viajar</a></center>
		   </td>
	   </tr>	   
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"lista/hangar.php\" Class=\"navlink\">Hangares</a></center>
		   </td>
	   </tr>";

	   if ($cic[fabrica]=="S"){ echo"				  
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=pastilleros\" Class=\"navlink\">Astilleros</a></center>
		   </td>
	   </tr>";}
		 echo "
	   <tr>
	   	   <td background=\"images/bg2.gif\">
		   	   <center>Afueras</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td w?idth=\"100%\" onMouseover=\"LmOver(this, '#c0c0c0')\" onMouseout=\"LmOut(this, '#FFFFFF')\" onMouseDown=\"LmDown(this, '#c0c0c0')\" bgcolor=\"#FFFFFF\">
		   	   <center><a href=\"ciudad/?id=acaza\" Class=\"navlink\">Cazar</a></center>
		   </td>
	   </tr>		   	   
		 "; } ?>
	</table>



	</td><td w?idth="100%" VALIGN="TOP">
	<?

	include $_GET[id].'.php';


	echo '</td></tr></table>';

	if ($cic[nombre]!=$ci[nombre]){echo "<br><a href=\"viaje/?id=ok&ci=$cic[nombre]&pl=$plc[nombre]\">Viajar a la ciudad</a>";}
	if ($cic[nombre]==$ci[nombre] && $cl[lider]==$us[nombre] && $cic[clan]!=$us[clan] && $cic[atacada]=="N" && $za[estado]!="Aliado"){echo "<br><a href=\"ataque/ciudad.php?ci=$cic[nombre]\"><img border=0 src=\"images/atk.gif\">Planear Ataque contra la ciudad!</a>";}
	if ($cic[atacada]=="S"){echo '<br><font color="#29fd49">La ciudad Dispone de protección.</font>';}




}
include 'footer.php';?>
