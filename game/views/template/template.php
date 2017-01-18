<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
  <title>. : Star Wars - Edges of the Lost Warriors : .</title>

  <link href="views/template/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="../images/icon/yoda.ico">
  
  <script language="JavaScript" type="text/javascript" src="views/template/js/navmenu.js"></script>
  <script language="JavaScript" type="text/javascript" src="views/template/js/tooltip.js"></script>
  <script language="JavaScript" type="text/javascript" src="views/template/js/style.js"></script>

</head>
<body>
    
  <table border="0" cellpadding="0" cellspacing="0" summary="">
   <tr>
      <td><small><strong>SWedges <?=Server::info("version");?></strong> es una creación de <strong>JAGteam</strong></small></td>
      <td></td>
   </tr>
  </table>
  <br><br>
  <center>
   <img src="../images/template/logo2.gif" alt="logo">
   <table border="0" cellpadding="0" cellspacing="1" summary="" width="700" bgcolor="white">
      <tr height="400">
          <td bgcolor="black" width="550" valign="top">
            <div style="padding:6px; border-bottom: 1px solid white;">
               {!partes/px.php}
            </div>
            <div class="contenido" align=justify>
               {__CONTENT__}
            </div>
          </td>
          <td width="150" bgcolor="black" valign="top">{!partes/menu.php}</td>
      </tr>
    </table>
    <br><br>
    <small style="color: lightgray"><small>Star Wars es una marca registrada de LucasArts<br/><?=POWERED_BY?></small></small>
  </center>
  <DIV id="TipLayer" style="visibility:hidden;position:absolute;z-index:1000;top:-100"></DIV>
</body>
</html>
