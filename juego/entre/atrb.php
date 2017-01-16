<?php 
   

   echo '<br><i><b>Atributos:</b></i>';
   	  echo "<br><table width='100%'><tr bgcolor=\"#737373\"><td><b>Atributo</b></td><td><b>Total</b></td><td><center>+1</center></td><td><center>+5</center></td><td><center>+25</center></td></tr>";
   	  echo "
       <tr>
			 		 <td>
			 		 		 <a href=\"ayuda.php#vig\" onMouseover=\" ddrivetip('El Vigor Mide la fuerza de tus ataques f�sicos. Como m�s vig, m�s da�inos ser�n tus ataques de arma.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Vigor</b>
						</td>
						<td>
								<center>$us[vig]</center>
						</td>
						<td>
								<a href=\"entre/entreok.php?c=vig&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=vig&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a>
						</td>
						<td>
								<a href=\"entre/entreok.php?c=vig&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a>
						</td>
			 </tr>
		   <tr><td><a href=\"ayuda.php#con\" onMouseover=\" ddrivetip('La Constituci�n representa la forma f�sica del jugador, mide la resistencia a los golpes f�sicos; Como m�s constituci�n menos da�os recibir�s en combate.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Constituci�n</b></td><td><center>$us[con]</center></td><td><a href=\"entre/entreok.php?c=con&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=con&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=con&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
		   <tr><td><a href=\"ayuda.php#des\" onMouseover=\" ddrivetip('La Destreza mide tu habilidad manual. Como m�s des, m�s r�pidos y precisos ser�n tus golpes.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Destreza</b></td><td><center>$us[des]</center></td><td><a href=\"entre/entreok.php?c=des&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=des&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=des&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
		   <tr><td><a href=\"ayuda.php#int\" onMouseover=\" ddrivetip('La Inteligencia mide tu capacidad de Raciocinio. Como m�s int, m�s frecuentemente usar�s los poderes de la fuerza y m�s facil te resultar� la Caza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Inteligencia</b></td><td><center>$us[inte]</center></td><td><a href=\"entre/entreok.php?c=inte&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=inte&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=inte&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
		   <tr><td><a href=\"ayuda.php#pod\" onMouseover=\" ddrivetip('El Poder de la Fuerza indica la capacidad del usuario de controlar la Fuerza. Como m�s pod de la Fuerza, m�s da�o causar�s en combate con ataques de fuerza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Poder de la Fuerza</small></b></td><td><center>$us[pod]</center></td><td><a href=\"entre/entreok.php?c=pod&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=pod&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entre/entreok.php?c=pod&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
	  </table>
		";
 ?> 
