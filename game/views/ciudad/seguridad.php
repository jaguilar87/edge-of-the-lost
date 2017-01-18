<? require_once RAG_SECTION.'/views/ciudad/header.php'?>
<center>
<table border="0" cellpadding="3" cellspacing="0" summary="" width="95%">
  <tr>
   <td><b>Criminalidad:</b></td>
   <td align=right><strong><?=$ci->datos[crimen]/10?></strong>%</td>
  </tr>
</table>

<br><br>

<? if ($ch->datos[rango]>2): ?>
  
  <center>
   <a href="?a=ciudad/seguridad&ac=1">Combatir el crimen <font color="lightblue">(+)</font></a><br>
		<a href="?a=ciudad/seguridad&ac=2">Extorsionar a los criminales <font color="#ffcccc">(-)</font></a><br>

   <br><br>
   
   <?=Views::printMessage()?>
  </center>
  
<? endif; ?>

<? require_once RAG_SECTION.'/views/ciudad/footer.php'?>  