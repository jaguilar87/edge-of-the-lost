<?php include_once 'header.php';
$c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
   $result=mysql_query($c)or die(mysql_error());
   $cic=sel("sw_city", "nombre", $_GET[ciudad]);
   
   if ($cic[rey]==$us[nombre]) {
       mysql_query("UPDATE sw_city set rey='$_POST[nombre]' WHERE nombre='$_GET[ciudad]'")or die(mysql_error());
       mysql_query("INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$_POST[nombre]', '$us[nombre] te ha dado el control de la ciudad $cic[nombre].', '$fe[val]', '4', '$cic[nombre]')")or die(mysql_error());
      
       echo 'Ciudad Transferida';
   } else {
       echo "No eres el Rey de la ciudad.";
   }




include_once 'footer.php';
