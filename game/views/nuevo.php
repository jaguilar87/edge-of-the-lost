<center><big><big><b>Un nuevo destino...</b></big></big></center><br><br>

Bienvenido a <strong>Star Wars - Edges of the Lost Warriors</strong> <?=$us->datos[nombre]?>.<br>
Nuestros datos nos indican que:<br> 
O bien tu personaje principal ha muerto o es la primera vez que entras.<br><br>
En cualquiera de los dos casos deberás crear un nuevo personaje para empezar una
nueva historia.
<br><br><br>
<center><b><strong>Crear un nuevo personaje (Datos Públicos)</strong></b></center><br>

<form action="?a=" method="post">

  <center>
  <table border="0" cellpadding="5" cellspacing="0" summary="">
   <tr>
      <td>
         <b>Nombre del Personaje:</b>
      </td>
      <td>
         <input type="text" name="nombre" size=30/>
      </td>      
   </tr>
   <tr>
      <td>
         <b>Sexo:</b>
      </td>
      <td>
        <optgroup>
         <input type="radio" name="sexo" value="M" checked="checked"/> Macho | Hembra <input type="radio" name="sexo" value="H"/>  
        </optgroup>
      </td>      
   </tr>   
   <tr>
      <td>
         <b>Raza:</b>
      </td>
      <td>
         <select name="Raza">
            <option value="1">Humano</option>
            <option value="2">Twilek</option>
            <option value="3">Kel Dor</option>
            <option value="4">Zabrak</option>
            <option value="5">Cathar</option>
            <option value="6">Bothan</option>                                                                         
         </select>
         <a onclick="window.open('../ayuda/razas.htm', 'razas')" style="cursor: help;">
            <img src="../images/icon/help.gif"> Info Razas
         </a>
      </td>    
   </tr>      
  </table><br>
  <big><font color=red>RECUERDA: <br>¡Ni títulos (sir, lord...) ni números en el nombre/apellido!</big><br><br>
  <input type="submit" value="Crear" name="nuevo"/>
  </center>
</form>