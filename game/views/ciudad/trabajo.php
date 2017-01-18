<? 
  require_once RAG_SECTION.'/views/ciudad/header.php';
  
  if ($ch->datos[rango] < 4):
?>
  <center>
   <a href="?a=ciudad/trabajo&ac=1">Buscar un trabajo honrado <font color="lightblue">(+)</font></a><br>
		<a href="?a=ciudad/trabajo&ac=2">Buscar un trabajillo no tan honrado <font color="#ffcccc">(-)</font></a><br>

   <br><br>
   
   <?=Views::printMessage();?>
  </center>
<? else: ?>  
	Con el nivel que ya ostentas, sería casi un insulto que malgastaras tu tiempo en estas minucias.
<? endif; ?>

  
<? require_once RAG_SECTION.'/views/ciudad/footer.php'; ?>