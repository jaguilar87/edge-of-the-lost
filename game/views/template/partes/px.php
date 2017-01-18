<? if (isset($ch)): ?>
<table border="0" cellpadding="0" cellspacing="0" summary="" width="100%">
  <tr>
   <td>
      Energía: <var><?=$ch->datos[turnos]?></var><small>(+<var><?=Server::info("energy")?></var>)</small>
   </td>  
   <td align=right>
   
      <table border="0" cellpadding="1" cellspacing="1" summary="" bgcolor="white">
        <tr bgcolor=black>
         <td>Nv: <var>
            <?=$ch->datos[nivel]?> 
            <?if (LVL_UP) echo I_arra; ?>
         </var>&nbsp;</td>
         <td width=200><img src="../images/bars/8.gif" height=11 width=<?=$ch->datos[px]/$ch->datos[pxnext]*200?>></td>
         <td width=100 align=right>&nbsp;<var><?=$ch->datos[px]?></var>/<var><?=$ch->datos[pxnext]?></var> px</td>
        </tr>
      </table>
         
   </td>

  </tr>
  <tr>
   <td>
      Creditos: <var><?=numero($ch->datos[creditos])?></var><small>C</small>
   </td>
   <td align=right>
   
      <table border="0" cellpadding="1" cellspacing="1" summary="" bgcolor="white">
        <tr bgcolor=black>
         <td width=200><img src="../images/bars/5.gif" height=11 width=<?=$ch->datos['pv']/$ch->datos['pvmax']*200?>></td>
         <td width=100 align=right>&nbsp;<var><?=$ch->datos[pv]?></var>/<var><?=$ch->datos[pvmax]?></var> pv</td>
        </tr>
      </table>
         
   </td>
     
  </tr>
</table>
<?endif;?>