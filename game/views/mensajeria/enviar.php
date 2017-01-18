Envía un mensaje a otra nave.
<form method="post" action="?a=mensajeria/enviar" class="consola" style="border-color:black; margin:20px;">

  	&nbsp;&nbsp;<b>Nombre Emisor:</b><br> 
    &nbsp;&nbsp;&nbsp;<?=$ch->nombre()?><br><br>
    
    &nbsp;&nbsp;<b>Nombre Receptor:</b><br>
    &nbsp;&nbsp;&nbsp;<input style="width: 350px" type="Text" name="re" value="<?=Security::out('to')?>"><br><br>
    
    &nbsp;&nbsp;<b>Asunto:</b><br>
    &nbsp;&nbsp;&nbsp;<input style="width: 350px" type="Text" name="as" value="<?=Security::out('as')?>"><br><br>


    &nbsp;&nbsp;<b>Mensaje:</b><br>
    &nbsp;&nbsp;&nbsp;    <textarea cols=40 rows=7 name="me" style="background: aliceblue;"></textarea>
    <br><br>
    
    &nbsp;&nbsp;<input type="submit" name="enviar" value="Enviar"><br><br>

</form> 

<br><small><a href="?a=mensajeria/mensaje">Volver al gestor de mensajes.</a></small> 