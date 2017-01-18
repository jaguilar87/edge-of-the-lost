
            </div>
          </td>
          <td width="150" bgcolor="black" valign="top">
<center>
  <big><strong>Menu</strong></big><br>
<?
   if ($ch->datos[newmsg] == 1){
			echo "<a href='?a=mensajeria/mensaje'>".I_msg."</a>";
		}  
  
  
  
?>
  <br>
</center>  

<table border="0" cellpadding="2" cellspacing="1" summary="" width="100%" class="menu" bgcolor="#000000">

  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=')">
      Notícias
   </td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=ficha/config')">
      Configurar
   </td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=logout')">
      Logout
   </td>
  </tr>
  
  <tr style="cursor: default;"> <td height=5></td></tr>
  <tr style="cursor: default;">
   <td background="../images/template/bg2.gif">Personaje</td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=ficha/ficha')">
      Ficha
   </td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=ficha/entrenar')">
     Entrenar
   </td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=ficha/academia')">
     Academia
   </td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=inventario/inventario')">
     Inventario
   </td>
  </tr>

  <tr style="cursor: default;"> <td height=5></td></tr>
  <tr style="cursor: default;">
   <td background="../images/template/bg2.gif">Universo</td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=universo/navegacion')">
      Planetas
   </td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=ciudad/ayuntamiento')">
      Ciudad
   </td>   
  </tr>  
  
  <tr style="cursor: default;"> <td height=5></td></tr>
  <tr style="cursor: default;">
   <td background="../images/template/bg2.gif">Estadísticas</td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=lista/chars')">
      Personajes
   </td>
  </tr>    

  
  <tr style="cursor: default;"> <td height=5></td></tr>
  <tr style="cursor: default;">
   <td background="../images/template/bg2.gif">Comunidad</td>
  </tr>
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUp('?a=mensajeria/mensaje')">
      Mensajería
   </td>
  </tr>  
  <tr>
   <td onMouseover="LmOver(this)" onMouseout="LmOut(this)" onMouseDown="LmDown(this)" 
      onMouseUp="LmUpB('{generalForo}')">
     Foro
   </td>
  </tr>  
</table>
</td>
      </tr>
    </table>
    <br><br>
    <small style="color: lightgray"><small>Star Wars es una marca registrada de LucasArts<br/><?=POWERED_BY?></small></small>
  </center>
  <DIV id="TipLayer" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>
</body>
</html>

