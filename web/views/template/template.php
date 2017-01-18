<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
  <title>. : Star Wars - Edges of the Lost Warriors : .</title>

  <link href="views/template/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="../images/icon/yoda.ico">
  
</head>
<body>
  
  <table border="0" cellpadding="0" cellspacing="0" summary="">
   <tr>
      <td><small>SWedges <?=Server::info("version")?> es una creación de JAGteam</small></td>
      <td></td>
   </tr>
  </table>

  <center>
   <table border="0" cellpadding="0" cellspacing="0" summary="" width=661>
      <tr>
        <th colspan=3><img src="../images/template/cabecera<?=round(mt_rand(0,9))?>.gif" alt=""></th>
      </tr>
      <tr>
         <td background="../images/template/borde1.jpg" width=72><img src="../images/template/borde1.jpg" alt=""></td>
         <td bgcolor="black" width=518>
            <div class="contenido" align=justify>
               {__CONTENT__}
               <br><br><a href="?a=start">&lt;&lt; Inicio</a>
            </div>
         </td>
         <td background="../images/template/borde2.jpg" width=71><img src="../images/template/borde2.jpg" alt=""></td>
      </tr>
      <tr>
        <th colspan=3><img src="../images/template/bajo.jpg" alt=""></th>
      </tr>      
   </table>
   <br/><br/>
   <small style="color: lightgray"><small>Star Wars es una marca registrada de LucasArts<br/><?=POWERED_BY?></small></small>
  </center>
</body>
</html>
