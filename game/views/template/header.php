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
               
<? if (isset($ch)): ?>
<table border="0" cellpadding="0" cellspacing="0" summary="" width="100%">
  <tr>
   <td>
      Energía: <var><?=$ch->datos[turnos]?></var><small>(+<var><?=Server::info("energy")?></var>)</small>
   </td>  
   <td align=right>
   
      <table border="0" cellpadding="1" cellspacing="1" summary="" bgcolor="white">
        <tr bgcolor=black>
         <td>Nv: <var>
            <?=$ch->datos[nivel]?> 
            <?if (LVL_UP) echo I_arra; ?>
         </var>&nbsp;</td>
         <td width=200><img src="../images/bars/8.gif" height=11 width=<?=$ch->datos[px]/$ch->datos[pxnext]*200?>></td>
         <td width=100 align=right>&nbsp;<var><?=$ch->datos[px]?></var>/<var><?=$ch->datos[pxnext]?></var> px</td>
        </tr>
      </table>
         
   </td>

  </tr>
  <tr>
   <td>
      Creditos: <var><?=numero($ch->datos[creditos])?></var><small>C</small>
   </td>
   <td align=right>
   
      <table border="0" cellpadding="1" cellspacing="1" summary="" bgcolor="white">
        <tr bgcolor=black>
         <td width=200><img src="../images/bars/5.gif" height=11 width=<?=$ch->datos['pv']/$ch->datos['pvmax']*200?>></td>
         <td width=100 align=right>&nbsp;<var><?=$ch->datos[pv]?></var>/<var><?=$ch->datos[pvmax]?></var> pv</td>
        </tr>
      </table>
         
   </td>
     
  </tr>
</table>
<?endif;?>

            </div>
            <div class="contenido" align=justify>
               