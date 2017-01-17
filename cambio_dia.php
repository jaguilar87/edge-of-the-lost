<?php 

if ($_GET[pass]=="swcombinesucks") {
    $log="";
    include 'juego/db.php';
    $log.='Load... ok ';

    mysql_query("UPDATE sw_users SET crecived='0'")or die(mysql_error());
    $log.='<br>Poner el maximo de Cr�ditos recibibles a 0';


#<!--Calculo de D�a-->
$c="select * FROM `sw_info` WHERE id='dia'";
    $result=mysql_query($c)or die(mysql_error());
    $fe=mysql_fetch_array($result);

    $fe[val]++;

    $c="UPDATE `sw_info` SET val='$fe[val]' WHERE id='dia'";
    $result=mysql_query($c)or die(mysql_error());
    $log.= ' <br> Calculo... ok';

#<!--Borrar Ataques Antiguos-->
$lim=$fe[val]-7;
    mysql_query("UPDATE sw_att SET combate=NULL WHERE dia < '$lim'")or die(mysql_error());
    mysql_query("OPTIMIZE TABLE `sw_att`")or die(mysql_error());
    $log.= ' <br> Borrar Ataques antiguos... ok';
 
#<!-- CALCULO DE IMPUESTOS -->
   $c="select * from sw_city";
    $result3=mysql_query($c)or die(mysql_error());
    while ($cy=mysql_fetch_array($result3)) {
        $d="select * from sw_users WHERE ciudad='$cy[nombre]'";
        $result4=mysql_query($d)or die(mysql_error());
        $cn=mysql_fetch_array($result4);
            
        $impu=($cn[creditos]*$cy[impuesto])/100;
            
        $cn[creditos]-=$impu;
            
        $z="select * from sw_clan WHERE nombre='$cy[clan]'";
        $result5=mysql_query($z)or die(mysql_error());
        $ccl=mysql_fetch_array($result5);
            
        $ccl[fondos]+=$impu;
            
        $s="UPDATE sw_users SET creditos='$cn[creditos]' WHERE nombre='$cn[nombre]'";
        $q=mysql_query($s)or die(mysql_error());

        $s="UPDATE sw_clan SET fondos='$ccl[fondos]' WHERE nombre='$cy[clan]'";
        $q=mysql_query($s)or die(mysql_error());
    }


    $log.= '  <br> impuesto... ok';
 
#<!-- RECALCULOS DE MANTENIMIENTO DEL CLAN -->
   
   $c="select * from sw_city";
    $result3=mysql_query($c)or die(mysql_error());
    while ($cy=mysql_fetch_array($result3)) {
        $man=2000;
   
   
        $d="select * from sw_clan WHERE nombre='$cy[clan]'";
        $result4=mysql_query($d)or die(mysql_error());
        $cn=mysql_fetch_array($result4);
   
   
        if ($cy[cura]=='S') {
            $man+=1000;
        }
        if ($cy[armeria]=='S') {
            $man+=5000;
        }
        if ($cy[ayuda]=='S') {
            $man+=500;
        }
        if ($cy[mina]=='S') {
            $man+=20000;
        }
        if ($cy[fabrica]=='S') {
            $man+=5000;
        }
        if ($cy[ley]=='S') {
            $man+=$cy[leypre]*500;
        }
        if ($cy[burdel]=='S') {
            $man+=10000;
        }
   
        $man += $cy[central]*10000;
   
        $cn[fondos]-=$man;
        $log.=" <br> $cn[nombre] paga $man Creditos de mantenimiento";
        if ($cn[fondos]<0) {
            $log.= " $cn[nombre] ha sido eliminado por insolvencia";

            $sql = "INSERT INTO `sw_mess` (emisor, receptor, fecha, mess) VALUES ('INFORMACION', '$cn[lider]', '$fe[dia]', 'EL CLAN HA SIDO SUSPENDIDO POR INSOLVENCIA')";
            $result = mysql_query($sql);
      
            $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$cn[Lider]', 'Tu clan ha sido eliminado por Insolvencia.', '$fe[dia]', '1', '')";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_diplomacia WHERE origen='$cn[nombre]' OR destino='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_vehiculos WHERE clan='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_board_clan WHERE clan='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_viaje WHERE tprop='Clan' AND prop='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_clan WHERE nombre='$cn[nombre]'";
            $result = mysql_query($sql);
      
            mysql_query("UPDATE sw_users SET clan=NULL where clan='$cn[nombre]'");
      
            mysql_query("UPDATE sw_city SET clan=NULL, rey=NULL where clan='$cn[nombre]'");
        } else {
            mysql_query("UPDATE sw_clan SET fondos='$cn[fondos]' where nombre='$cy[clan]'");
        }
    }

   
   
  
  
   
   
   
    $log.= ' <br> mantenimiento... ok';

   
# <!-- CLANES -->

  
   $d="select * from sw_clan";
    $result4=mysql_query($d)or die(mysql_error());
    while ($cn=mysql_fetch_array($result4)) {
        $r=0;
        $sueldos = 0;
        $a="select * from sw_users WHERE clan='$cn[nombre]'";
        $b=mysql_query($a)or die(mysql_error());
        while ($c=mysql_fetch_array($b)) {
            $r++;
            $sueldos += $c[merito];
        }
        $log.= "<br>- $cn[nombre] $r miembros y $sueldos C de sueldo";
        $cn[fondos] -= $sueldos;
        mysql_query("UPDATE sw_clan SET fondos='$cn[fondos]'");
        if ($r==0) { #                                      <!--Eliminar Clan->
      
                                    $sql = "DELETE FROM sw_diplomacia WHERE origen='$cn[nombre]' OR destino='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_vehiculos WHERE clan='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_board_clan WHERE clan='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_viaje WHERE tprop='Clan' AND prop='$cn[nombre]'";
            $result = mysql_query($sql);
      
            $sql = "DELETE FROM sw_clan WHERE nombre='$cn[nombre]'";
            $result = mysql_query($sql);

            mysql_query("UPDATE sw_city SET clan=NULL, rey=NULL where clan='$cn[nombre]'");
                                      
                                      
                                      
                                      
            $log.=" <br>Clan $cn[nombre] borrado";
        }
                               
#                                      <!--recalcular potencias->
                  
                  
                mysql_query("INSERT INTO `sw_board_clan` (clan, poster, dia, mess) VALUES ('$us[clan]', 'INFORMACION', '$us[dia]', 'Se han perdido <b>$cn[potencia] W</b> por desuso.')");
        $cn[potencia]=0;
                   
        $res=mysql_query("select * from sw_city WHERE clan='$cn[nombre]'")or die(mysql_error());
        while ($cic=mysql_fetch_array($res)) {
            switch ($cic[central]) {
                               case "1": $cen=100; break;
                               case "2": $cen=210; break;
                               case "3": $cen=600; break;
                               case "4": $cen=800; break;
                               case "5": $cen=1000; break;
                        }
                        
            $cn[potencia]+=$cen;
        }
        mysql_query("UPDATE sw_clan SET potencia='$cn[potencia]', cambiado='0' WHERE nombre='$cn[nombre]'")or die(mysql_error());
        $log.=" <br>$cn[nombre] tiene $cn[potencia] W";
    }
                                  
    $log.= "<br>Gesti�n clanes...ok";
    
    #  <!--BORRAR REG-->
    
    mysql_query("DELETE FROM sw_users WHERE reg='N'")or die(mysql_error());
    
    $log.= " <br> Borrar no registrados...ok";
            
   
#  <!--fin-->
              $a="select * from sw_users WHERE clan='$cn[nombre]'";
    $b=mysql_query($a)or die(mysql_error());
    $fe=mysql_fetch_array($b);
            
    $loge=mysql_query("INSERT INTO sw_control (fecha, log) VALUES ('$fe[val]', '$log')")or die(mysql_error());
  
  
  
  
  
    echo $log;
} else {
    echo '<script> location.href="http://jagcompany.civitis.com/" </script>';
}
