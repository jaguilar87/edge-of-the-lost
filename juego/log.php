<?php include 'header.php';
if ($_GET[ver]=="ver"){
   if ($_GET[tipo]==1){ echo "<script> location.href=\"fmess.php?id=$_GET[ref]\" </script>";}
   if ($_GET[tipo]==2){ echo "<script> location.href=\"clanact.php?act=solicitud&us=$_GET[ref]\" </script>";}
   if ($_GET[tipo]==3){ echo "<script> location.href=\"info.php?us=$_GET[ref]\" </script>";}
   if ($_GET[tipo]==4){ echo "<script> location.href=\"idistritos.php?ciudad=$_GET[ref]\" </script>";}
   if ($_GET[tipo]==5){ echo "<script> location.href=\"alista.php?at=$_GET[ref]\" </script>";}







}elseif($_GET[ver]=="borrar"){

   $sql = "SELECT * FROM `sw_log` WHERE id='$_GET[id]'";
   $result = mysql_query($sql);
   $r = mysql_fetch_array($result);							
   
   if ($r[user]==$us[nombre]){

      $sql2 = "DELETE FROM `sw_log` WHERE id='$_GET[id]'"; 
	  $result2 = mysql_query($sql2);

   echo 'Entrada del Log Borrada. Redireccionando... <META HTTP-EQUIV="Refresh" CONTENT="1;URL=fficha.php"><br><a href="fficha.php">Volver a la Ficha</a> </script>';

   }else{

	  echo 'Acceso restringido a ese Log';

   }



}elseif($_GET[ver]=="solicitar"){

if ($us[clan]==""){
   $c= "SELECT * FROM `sw_clan` WHERE nombre='$_GET[clan]'";
   $res=mysql_query($c);
   $lid=mysql_fetch_array($res);

   $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$lid[lider]', '$us[nombre] quiere ingresar en el clan $lid[nombre].', '$fe[dia]', '2', '$us[nombre]')";
   $result = mysql_query($sql);
   echo '<script> location.href="fficha.php" </script>';
}else{
   echo "Ya perteneces a un clan.";
}




}elseif($_GET[ver]=="vaciar"){

$sql = "DELETE FROM sw_log WHERE user='$us[nombre]'"; 
$result = mysql_query($sql)or die(mysql_error());

echo '<script> location.href="fficha.php" </script>';

}
include 'footer.php';?>
