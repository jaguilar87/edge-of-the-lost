<? 
  require_once RAG_SECTION.'/views/ciudad/header.php';
  loadModel("Sede");
?>

<center>
<table border="0" cellpadding="3" cellspacing="0" summary="" width="95%">
  <tr>
   <td><b>Nombre Ciudad:</b></td>
   <td align=right><strong><?=$cia->datos[nombre]?></strong></td>
  </tr>
  <tr>
   <td><b>Nombre Planeta:</b></td>
   <td align=right><var><?=$cia->metadatos[planeta]->datos[nombre]?></var></td>
  </tr>
  <tr>
   <td><b>Coordenadas Planeta:</b></td>
   <td align=right>(<?=$cia->metadatos[planeta]->datos[x]?>, <?=$cia->metadatos[planeta]->datos[y]?>)</td>
  </tr>
  <tr>
   <th colspan=2 height=10></th>
  </tr>   
  <tr>
   <td><b>Impuestos:</b></td>
   <td align=right><var><?=$cia->datos[impuestos]?></var>% <small>(<?=numero(round(($ch->datos[creditos]/100)*$cia->datos[impuestos]))?>c)</small></td>
  </tr>
  <tr>
   <th colspan=2 height=10></th>
  </tr>
  <tr>
   <th colspan=2 height=10>
   
      <table width="100%" cellpading="5">        
        <tr>
         <td align="left">
            <b>Influencia propia:</b>
         </td>
         <?
            $sql = DB::query("SELECT SUM(influencia) as influencia FROM sedes WHERE ciudad='".$cia->datos[id]."'");
      			$total = DB::fetch($sql);
      			$total[influencia] += $cia->datos[influencia];
         ?>
         <td align="right">
            <?=numero($cia->datos[influencia])?>
         </td>
         <td align="right">
            <var><?=round(($ci->datos[influencia]/$total[influencia])*100)?>%</var>
         </td>
        </tr>
         <?
               $sede = new Sede(false);
      			$sql = $sede->tour("ciudad='".$cia->datos[id]."'", "id");
         ?>
      	
         <? while ($r = DB::fetch($sql)): ?>
            <? $se = new Sede(array("id" => $r[id])); ?>
            <tr>
               <td align="left">
                  <?=$se->metadatos[clan]->datos[nombre]?>
               </td>
               <td align="right">
                  <?=numero($se->datos[influencia])?>
               </td>
               <td align="right">
                  <var><?=round(($se->datos[influencia]/$total[influencia])*100)?>%</var>
               </td>               
            </tr>
        <? endwhile; ?>
      </table>
      
   </th>
  </tr>  
   <th colspan=2 height=10></th>
  </tr>  
</table>

<br><br>

<b>Censo:</b>
<? 
  $sql = $ch->tour("ciudad='".$cia->datos[id]."'", "id");
  while ($r = DB::fetch($sql)) 
  {
      $c = new Char( array("id" => $r[id]) ); 
      echo "<a href='?a=ficha/ficha&char=".$c->datos[nombre]."'>".$c->nombre()."</a>, ";
  }
?>

<? require_once RAG_SECTION.'/views/ciudad/footer.php'?>