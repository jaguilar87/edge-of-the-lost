<?php include 'header.php';
if ($ci[rey]==$us[nombre]){
$us[turnos]-=20;
mt_srand ((double) microtime() * 1000000);

$luk=mt_rand(0,100)+$us[poder];

if ($luk>=100){echo 'Han sido expulsados todos los habitantes de la ciudad que no sean de tu clan...';


$i=1;

$c="SELECT * FROM sw_city where nombre!='$ci[nombre]'";
$result=mysql_query($c)or die(mysql_error());
while ($cil=mysql_fetch_array($result)){
$ciudad[$i]=$cil[nombre];
$i++;
}

$luk=mt_rand(1,count($ciudad));

$c="SELECT * FROM sw_city WHERE nombre='$ciudad[$luk]'";
$result=mysql_query($c)or die(mysql_error());
$cip=mysql_fetch_array($result);

$c="UPDATE `sw_users` SET ciudad='$cip[nombre]', play='$cip[esy]', plax='$cip[esx]' WHERE ciudad='$ci[nombre]' AND clan!='$cl[nombre]'";
$result=mysql_query($c)or die(mysql_error());

$c="UPDATE `sw_users` SET turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
$result=mysql_query($c)or die(mysql_error());

}else{echo 'Has intentado controlar la fuerza pero has fallado...';}




}else{Echo 'No eres el rey de la ciudad';}
include 'footer.php';?>
