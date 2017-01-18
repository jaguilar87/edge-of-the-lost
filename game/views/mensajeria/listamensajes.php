<table width="100%" cellpadding=1 cellspacing=0>
  <tr>
  	  <td>
  				<b>Mensajes Recibidos</b>
  	  </td>
  </tr>
  <tr>
  	  <td valign="top" height=290>
  				
            <table width="100%" border=0 cellspacing=4  class="consola">
  					<tr>
  							<td>
  									<b>id</b>
  							</td>
  							<td>
  									<b>De</b>
  							</td>
  							<td>
  									<b>Fecha</b>
  							</td>                     
  							<td>
  									<b>Asunto</b>
  							</td>
  							<td>
  							</td>													
  					</tr>
               <? $sql = DB::query("SELECT * FROM mensajes WHERE receptor = '".$ch->datos[id]."' ORDER BY fecha DESC"); ?>

               <? while ( $r = mysql_fetch_array($sql) ):?>			            
                  <? $msg = new Mensaje (array("id"=> $r[id]));?>
    					<tr> 	
  							<td>
  									<?=$msg->datos[id]?>
  							</td>
  							<td>
  									<a href="?a=mensajeria/enviar&to=<?=$msg->metadatos[emisor]->datos[nombre]?>&as=RE:<?=$msg->datos[asunto]?>">
                               <img border=0 src="../images/icon/msg.gif">
                            </a> 
                            <a href="?a=ficha/ficha&char=<?=$msg->metadatos[emisor]->datos[nombre]?>">
                               <?=$msg->metadatos[emisor]->nombre()?>
                            </a>
  							</td>
                     <td>
  									<?=$msg->datos[fecha]?>
  							</td>
  							<td>
  									<a href="?a=mensajeria/mensaje&mid=<?=$msg->datos[id]?>"><?=$msg->datos[asunto]?></a>
  							</td>
  							<td>
  									<?if ($msg->datos[nuevo]) echo "<span style='color: red'>N</span>";?>
  							</td>													
  					   </tr>						
  			      <? endwhile; ?>
               
         	</table>											
   	
      </td>
  </tr>

  <tr>
  	  <td>
  				<b>Mensajes Enviados</b>
  	  </td>
  </tr>    
  <tr>
  		<td valign="top">
  		
         <table width="100%" border=0 cellspacing=4  class="consola">
    			<tr>
    					<td>
    							<b>id</b>
    					</td>
    					<td>
    							<b>Para</b>
    					</td>
							<td>
									<b>Fecha</b>
							</td>                  
    					<td>
    							<b>Asunto</b>
    					</td>
                  <td>
                  </td>
    			</tr>
            <? $sql = DB::query("SELECT * FROM mensajes WHERE emisor = '".$ch->datos[id]."' ORDER BY fecha DESC"); ?>

               <? while ( $r = mysql_fetch_array($sql) ):?>			            
                  <? $msg = new Mensaje (array("id"=> $r[id]));?>
    					<tr> 	
  							<td>
  									<?=$msg->datos[id]?>
  							</td>
  							<td>
  									<a href="?a=mensajeria/enviar&to=<?=$msg->metadatos[receptor]->datos[nombre]?>&as=RE:<?=$msg->datos[asunto]?>">
                               <img border=0 src="../images/icon/msg.gif">
                            </a> 
                            <a href="?a=ficha/ficha&char=<?=$msg->metadatos[receptor]->datos[nombre]?>">
                               <?=$msg->metadatos[receptor]->nombre()?>
                            </a>
  							</td>
                     <td>
  									<?=$msg->datos[fecha]?>
  							</td>                     
  							<td>
  									<a href="?a=mensajeria/mensaje&mid=<?=$msg->datos[id]?>"><?=$msg->datos[asunto]?></a>
  							</td>
  							<td>
  									<?if ($msg->datos[nuevo]) echo "<span style='color: red'>N</span>";?>
  							</td>                     							
  					   </tr>						
  			      <? endwhile; ?>	

    		</table>
      															
  	   </td>
  </tr>
</table>					
		
<br>Recuerda que los mensajes con más de 15 días serán borrados.
<br><a href="?a=mensajeria/enviar"><img border=0 src="../images/icon/msg.gif"><small> Enviar Mensaje a otro personaje</small></a>