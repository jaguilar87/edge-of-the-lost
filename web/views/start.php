<center>
<br>
Bienvenido a <strong>Star Wars - Edges of the Lost Warriors</strong>.<br><br>
La guerra ha vuelto a comenzar... <br>¿Con que nombre quieres ser recordado?<br><br>

<table border="0" cellpadding="15" cellspacing="0" summary="" width=400>
  <tr>
   <td valign="top" align=center>
      <var><?=DB::count("chars");?></var> Jugadores.<br>
      <var><?=DB::count("ciudades");?></var> Ciudades.<br>
      <var><?=DB::count("clanes");?></var> Clanes.<br>      
   </td>
   <td valign="top" align=right>

   <form action="?a=login" method="post">                     
      <table border="0" cellpadding="0" cellspacing="0" width=225>
        <tr>
          <td width="50%">
            Nombre:
          </td>
          <td width="50%">
            <input name="name" type="text" size="19">
          </td>
        </tr>
        <tr>
          <td width="50%">
            Password:
          </td>
          <td width="50%">
            <input name="pass" type="password" size="19">
          </td>
        </tr>
      </table>
      <br>
      <input name="login" type="image" src="../images/template/login.jpg" value="submit" border="0">
      <br><br>        
    </form>
    <a href="?a=pass">¿Has perdido la contraseña?</a>/<a href="?a=reg">Regístrate</a>
   </td>
  </tr>
</table>
<hr>
<br>
</center>