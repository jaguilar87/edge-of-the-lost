<?php include_once 'header.php';
if ($_GET[vehiculo]==""){
	  	 echo "<script> location.href=\"lista/hangar.php\" </script>";
	  }

	  echo "Vender $_GET[vehiculo] por 
		<form action=\"clan/index.php\" method=\"GET\">
		 <input name=\"precio\" type=\"text\" value=\"0\">
		 <input name=\"vehiculo\" type=\"hidden\" value=\"$_GET[vehiculo]\"> 
		 <input name=\"id\" type=\"hidden\" value=\"vendok\">
		 Créditos <input type=\"submit\" value=\"Ok\">
		</form>";





include_once 'footer.php'; ?>
