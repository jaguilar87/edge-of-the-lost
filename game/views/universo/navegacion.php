<?
  $veralianzas = Security::out('veralianzas');
    
?>

<script>
	function coordenadas(texto){
		var layer = document.getElementById("coor");
		layer.innerHTML = texto;
	}
</script>

<center>
  <table summary="" border=0 style="border: 1px solid silver;" cellspacing=0 cellpadding=0 background="../images/mapa/mapbg.jpg">
   
   <caption>
     <div id="coor" align=left style="border: 0px solid silver; height: 40px;"></div>
   </caption>

   <? for ($j = Server::Info('maxy'); $j >= Server::Info('miny'); $j--): ?>

  	<tr>
  	
   	<? for ($i = Server::Info('minx'); $i <= Server::Info('maxx'); $i++): ?>
<?       
			$mapy = new Planeta("x='".$i."' AND y='".$j."'");
		                     				
			//definir posición actual
			if ($j == $pl->datos[y] && $i == $pl->datos[x]){
				$inner = "../images/mapa/actual.gif";
		  		$redir = "?a=ciudad/ayuntamiento";
			}else{
				$inner = "../images/mapa/blank.gif";
		  		$redir = "?a=universo/navegar&posx=$i&posy=$j";
			}
		
			//asignar nokvariables del mapa				
			if ($mapy->datos[tipo]){
					$back = $mapy->metadatos[tipo]->datos[img];
					$desc = "<b><big><strong>($i,$j)</strong> ".$mapy->metadatos[tipo]->datos[nombre]." <strong>".$mapy->datos[nombre]."</strong></b></big><br>Propiedad de: <strong>"."<!-- Owner -->"."</strong>";
			}else{
					$back = "../images/mapa/blank.gif";
					$desc = "<big><b><strong>($i,$j)</strong> Territorio vacío</b></big><br>Espacio de: <strong><!--owner--></strong>";
			}
					
			//Cursor
			$cur = "crosshair";
?>
      	<td 
            width=20 
            height=20 
            onclick="location.href='<?=$redir?>'" 
            onmouseover="coordenadas('<?=$desc?>');" 
            align=center 
            valign=middle 
            background="<?=$back?>" 
            style="
               font-size: 8pt; 
               background-repeat: no-repeat;
               background-position: center;
               cursor:<?=$cur?>;
            " 
            <?=$bColor?>
         >
            <img src="<?=$inner?>" alt="" border=0 width=20 height=20>
         </td>
      
      <? endfor; ?>
      		
  	</tr>

  	<? endfor; ?>
   
  </table>

	Coordenadas espaciales: <strong>(<?=$pl->datos[x]?>,<?=$pl->datos[y]?>)</strong>
</center>
