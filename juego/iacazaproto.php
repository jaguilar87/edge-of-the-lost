<?php include 'header.php';
mt_srand ((double) microtime() * 1000000);

if ($us[hp]<=0){echo 'No puedes cazar a 0 de vida';}else{



  if ($_GET[presa]==""){
	   $us[turnos]-=1;
   
   if ($us[turnos] < 0) {echo'Energía insuficiente...';}else{
   	  
	  $encuentro= mt_rand(1,15);
	  
	  switch ($encuentro){
	  	case 1: $presa="Nerf Hembra"; $gan=1200; break;
		case 2: $presa="Nerf Macho"; $gan=1500; break;
		case 3: $presa="Nerf en celo"; $gan=1750; break;
		case 4: $presa="Bantha Macho"; $gan=2000; break;
	  	case 5: $presa="Bantha Hembra"; $gan=2500; break;
		case 6: $presa="Bantha Enorme"; $gan=3000; break;
	  	case 7: $presa="Orray"; $gan=4000; break;
		case 8: $presa="Orray Enorme"; $gan=4500; break;
		case 9: $presa="Dewback"; $gan=6000; break;
		case 10: $presa="Reek"; $gan=8000; break;
		case 11: $presa="Nexu"; $gan=10000; break;
		case 12: $presa="Gundark"; $gan=12000; break;
		case 13: $presa="Wampa"; $gan=16000; break;
		case 14: $presa="Aklay"; $gan=22000; break;
		case 15: $presa="Rancor"; $gan=52000; break;
	  }
	  
	  
	  echo "Has encontrado un $presa! su caza te reportaria $gan Créditos.<br><a href=\"iacaza.php?presa=$presa&gan=$gan&en=$encuentro\">Cazar el $presa</a> o <a href=\"iacaza.php\">Volver a buscar</a>";
	  
	  $c = "UPDATE `sw_users` SET creditos='$us[creditos]',turnos='$us[turnos]', puntos='$us[puntos]', estres='$us[estres]', hp='$us[hp]' WHERE nombre='$_SESSION[nombre]'";
	  $result = mysql_query($c);

	  }
     }else{
	  	  $us[turnos]-=5;
   
   	 if ($us[turnos] < 0) {echo'Energía insuficiente...';}else{
	  $luk = mt_rand(-50,70)+$us[inteligencia];
	  $luk -= $_GET[en]*7;

	  if ($luk>0){$us[creditos]+=$_GET[gan]; $us[puntos]+=$_GET[en]; echo "Has cazado un <b>$_GET[presa]</b>! Su caza te ha reportado<b> $_GET[gan] Créditos</b>";}else{echo "Has encontrado un $presa salvaje! pero se te resistió y escapó"; $us[estres]+=3;}
	  $dam=mt_rand($_GET[en], $_GET[en]*100)-($us[constitucion]*10);
	  if ($dam<0){$dam=0;}
	  echo "<br>El $_GET[presa] te dañó <b>$dam Puntos de Vida</b>";
	  echo "<br><br><a href=\"iacaza.php?presa=$_GET[presa]&gan=$_GET[gan]&en=$_GET[en]\">Buscar otro $_GET[presa]</a>";

	  $us[hp]-=$dam;
  	  $c = "UPDATE `sw_users` SET creditos='$us[creditos]', turnos='$us[turnos]', puntos='$us[puntos]', estres='$us[estres]', hp='$us[hp]' WHERE nombre='$_SESSION[nombre]'";
	  $result = mysql_query($c);

	 }
	 
	 }
    
}
include 'footer.php';?>
