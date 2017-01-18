<? 
  $cia = (Security::out("ciudad")) ? Security::out("ciudad") : $ci; 
  if (Security::out('a') != "ciudad/ayuntamiento" AND $ci->datos[id] != $cia->datos[id]){
    Views::message("No estás en esa ciudad");
  }
?>

<table border="0" cellpadding="3" cellspacing="0" summary="" width="100%">
  <tr>
   <td width=150 valign="top" align=center>
    
    <big><strong>Distritos</strong></big><br><br>
    <table border="0" cellpadding="2" cellspacing="1" summary="" width="150" class="menu" bgcolor="#000000">   
     
      <tr style="cursor: default;"> <td height=5></td></tr>
      <tr style="cursor: default;">
       <td background="../images/template/bg2.gif">Gubernamental</td>
      </tr>
      <tr>
       <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
          onMouseUp="LmUp('?a=ciudad/ayuntamiento')">
          Ayuntamiento
       </td>
      </tr>
      <tr>
       <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
          onMouseUp="LmUp('?a=ciudad/sedeclan')">
          Sede del Clan
       </td>
      </tr>        

      
      <tr style="cursor: default;"> <td height=5></td></tr>
      <tr style="cursor: default;">
       <td background="../images/template/bg2.gif">Residencial</td>
      </tr>
      <tr>
       <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
          onMouseUp="LmUp('?a=ciudad/hospital')">
          Hospitales
       </td>
      </tr>      
      
      
      <tr style="cursor: default;"> <td height=5></td></tr>
      <tr style="cursor: default;">
       <td background="../images/template/bg2.gif">Comercial</td>
      </tr>
      <tr>
       <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
          onMouseUp="LmUp('?a=ciudad/trabajo')">
          Trabajo y Crimen
       </td>
      </tr>

      
           
      <tr style="cursor: default;"> <td height=5></td></tr>
      <tr style="cursor: default;">
       <td background="../images/template/bg2.gif">Defensa</td>
      </tr>
      <tr>
       <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
          onMouseUp="LmUp('?a=ciudad/seguridad')">
          Seguridad
       </td>
      </tr>
      
     </table>   
     
   </td>
   <td valign="top" width="400">
   
      <center>
         <b><big><big><strong><?=$cia->datos[nombre]?></strong> en <var><?=$cia->metadatos[planeta]->datos[nombre]?></var></big></big></b><br>
         <? if ($ci->datos[id] != $cia->datos[id]) echo "<a href='?a=ciudad/viajar&ciudad=".$cia->datos[id]."'>Viajar a la ciudad</a>";?>
      </center>
      <br>
      