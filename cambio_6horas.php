<?php 

if ($_GET[pass]=="swcombinesux") {
    include 'juego/db.php';
#<!--Calculo Por Ficha (Estr�s) y valores Negativo-->
   $uss="SELECT * from sw_users";
    $usq=mysql_query($uss)or die(mysql_error());
    while ($us=mysql_fetch_array($usq)) {
        if ($us[hp]<=0) {
            $us[estres]+=20;
        } else {
            $us[estres]+=1;
        }
        if ($us[hp]>$us[maxhp]) {
            $us[hp]=$us[maxhp];
        }
        if ($us[hp]<0) {
            $us[hp]=0;
        }
        if ($us[creditos]<0) {
            $us[creditos]=0;
        }
        if ($us[merito]<0) {
            $us[merito]=0;
        }
         
            
        $up="UPDATE `sw_users` SET estres='$us[estres]', merito='$us[merito]', hp='$us[hp]', creditos='$us[creditos]' WHERE nombre='$us[nombre]'";
        $date=mysql_query($up)or die(mysql_error());
            
            
        if ($us[estres]>1000) {
            $log.= "\n -$us[nombre] muerto de estres";
            $kill=mysql_query("DELETE FROM sw_users WHERE nombre='$us[nombre]'")or die(mysql_error());
               
            mysql_query("INSERT INTO sw_control_muerte (dia, nombre, mail, password) VALUES ('$fe[dia]', '$us[nombre]', '$us[mail]', '$us[password]')")or die(mysql_error());
        }
    }
   
    $log.= '\n <br> estres... ok';
    

    $c = "UPDATE sw_city SET atacada='N'";
    $result2=mysql_query($c)or die(mysql_error());
    
    $log.= "ciudades desprotegidas...ok<br>";
    
    $c = "UPDATE sw_clan SET atacado='N'";
    $result2=mysql_query($c)or die(mysql_error());
   
    $log.= "clan desprotegido...ok";

    $ach=date(H);
    $loge=mysql_query("INSERT INTO sw_control (fecha, log) VALUES ('Hora $ach', '$log')")or die(mysql_error());

    echo $log;
}
