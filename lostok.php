<body bgcolor="#000000" text="#FFFFFF" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFF99">
<?php include 'var.php';
	  $c = "SELECT * FROM `sw_users` WHERE mail='$_POST[mail]'";
	$result=mysql_query($c)or die(mysql_error());
	$r = mysql_fetch_array($result);
mail ($r[mail], "Password Perdido", "El password de tu personaje $r[nombre] es: $r[password], \n El código de confirmación es: ( http://jagcompany.civitis.com/sw-eotlw/alta.php?code=mecagoenswcombine&c=$r[id]&pl=$r[nombre] ) Recomendamos Copiar y pegar  \n No lo pierdas again :)");
echo 'Mail enviado...';
?>