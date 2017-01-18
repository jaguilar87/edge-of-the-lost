<div class="consola" style="height: 300px;">
  
  <center><strong>#<?=$msg->datos[id]?> - <i><?=$msg->datos[asunto]?></i></strong></center>
  <b>Emisor:</b> 
    <a href="?a=mensajeria/enviar&to=<?=$msg->metadatos[emisor]->datos[nombre]?>">
     <img border=0 src="../images/icon/msg.gif">
    </a> 
    <a href="?a=ficha/ficha&char=<?=$msg->metadatos[emisor]->datos[nombre]?>">
      <?=$msg->metadatos[emisor]->nombre()?>
    </a>
  <br>
  
  <b>Receptor:</b> 
    <a href="?a=mensajeria/enviar&to=<?=$msg->metadatos[receptor]->datos[nombre]?>">
     <img border=0 src="../images/icon/msg.gif">
    </a> 
    <a href="?a=ficha/ficha&char=<?=$msg->metadatos[receptor]->datos[nombre]?>">
      <?=$msg->metadatos[receptor]->nombre()?>
    </a>
  <br>
  
  <b>Día:</b> <?=$msg->datos[fecha]?><br>
  
  <b>Mensaje:</b><hr> <i><?=$msg->datos[mensaje]?></i>

</div>
<br><a href="?a=mensajeria/enviar&to=<?=$msg->metadatos[emisor]->datos[nombre]?>&as=RE:<?=$msg->datos[asunto]?>"><img border=0 src="../images/icon/msg.gif"><small> Responder mensaje</small></a>
<br><a href="?a=mensajeria/enviar"><img border=0 src="../images/icon/msg.gif"><small> Enviar Mensaje a otro personaje</small></a>