<?php include_once'header.php';
if ($cl[lider]!=$us[nombre]){
	 	echo 'Fundar un clan cuesta 10.000 Cr�ditos. Si ya tienes un clan ser�s expulsado del anterior. <br>
		<form action="fundar.php?ac=clan" method="POST">
			  Nombre del Nuevo Clan: <input name="nom" type="text" value=""> 
			  <br>Hermandad: <input name="her" type="radio" value="Jedi">Jedi <input name="her" type="radio" value="Sith">Sith 
			  <br><input type="submit" name="fundar" value="Fundar">
		</form>';
	 }else{
	 	echo 'Si eres el lider del clan, no puedes fundar otro';
	 }




include_once'footer.php';?>
