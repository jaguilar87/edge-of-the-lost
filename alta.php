<?php include 'juego/var.php';

if ($_GET[code]=="mecagoenswcombine"){

$c="select * FROM `sw_users` WHERE id='$_GET[c]'";
$result=mysql_query($c)or die(mysql_error());
$pl=mysql_fetch_array($result);

if ($_GET[c]==$pl[id]){

   $c = "UPDATE sw_users SET  reg='S' WHERE id='$_GET[c]'";
   $result2=mysql_query($c)or die(mysql_error());
   echo 'Has sido dado de alta';


}
}
?>