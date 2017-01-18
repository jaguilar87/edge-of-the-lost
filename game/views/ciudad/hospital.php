<? require_once RAG_SECTION.'/views/ciudad/header.php';?>

<table border="0" cellpadding="2" cellspacing="0" summary="" width="100%">
  <tr>
   <td><b>Dueño</b></td>
   <td align="right"><b>Bacta</b></td>
   <td align="right"><b>Coste Unidad</b></td>
   <td align="right"><b>Precio</b></td>
  </tr>

<? $toHeal = $ch->datos[pvmax] - $ch->datos[pv]; ?>
<? if ($ci->datos[hospital]): ?>  
  <tr>
   <td>Público</td>
   <td align="right">-</td>
   <td align="right"><?=Server::info('precioHospital')?><small>Cr</small></td>
   <?
      $precio = Server::info('precioHospital') * $toHeal;
      if ($precio > $ch->datos[creditos]){
         $color = C_ROJO;
      }else{
         $color = C_VERDE;
      }
   ?>
   <td align="right"><a href="?a=ciudad/hospital&heal=-1" style="color: <?=$color?>"><?=$precio?><small>Cr</small></a></td>
  </tr>    
<? endif; ?>

<? 
  loadModel("Sede");
  $sql = DB::query("SELECT id FROM sedes WHERE ciudad = '".$ci->datos[id]."' AND hospital > '0'");
  While ($r = DB::fetch($sql)):
   $sede = new Sede ($r);
?>
  <tr>
   <?
     if ($sede->datos[clan] == $ch->datos[clan]){
        $color = C_VERDE;
     }else{
        $color = C_WHITE;
     }
   ?>  
   <td style="color:<?=$color?>;">
      <?=$sede->metadatos[clan]->datos[nombre]?>
   </td>
      <?
         if ($sede->datos[bacta] < $toHeal){
            $color = C_ROJO;
         }else{
            $color = C_WHITE;
         }
      ?>   
   <td align="right" style="color:<?=$color?>;">
      <?=$sede->datos[bacta] ?>
   </td>
   <?
      if ($sede->datos[clan] == $ch->datos[clan]) $sede->datos[precioBacta] /= 2;
   ?>
   <td align="right">
      <?=$sede->datos[precioBacta]?><small>Cr</small>
   </td>
   <?
      $precio = $sede->datos[precioBacta] * $toHeal;
      if ($precio > $ch->datos[creditos]){
         $color = C_ROJO;
      }else{
         $color = C_WHITE;
      }
   ?>
   <td align="right">
      <a href="?a=ciudad/hospital&heal=<?=$sede->datos[clan]?>" style="color: <?=$color?>">
         <?=$precio?><small>Cr</small>
      </a>
   </td>
  </tr>  
<? endwhile; ?>

</table>
<br />
<br />
<center><?=Views::printMessage()?></center>

<? require_once RAG_SECTION.'/views/ciudad/footer.php';?>