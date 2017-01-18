<?
	class Notify{
		
		//Energía
		function insuficienteEnergia($need) {
			return "<span style='color: ".C_ROJO."'>No tienes suficiente energia. Para hacer esta acción necesitas <strong>$need</strong> turnos.</span>";
		}
		
		
		//Vida
		function noPv() {
			return "<span style='color: ".C_ROJO."'>¿Sábes que no eres inmortal verdad?. Cúrate antes de intentarlo.</span>";
		}
		function noBacta() {
			return "<span style='color: ".C_ROJO."'>No hay suficiente Bacta en el hospital.</span>";
		}
		function bajaPv($pv) {
			return "<span style='color: ".C_WHITE."'>Pierdes <var>".$pv."</var><small>PV</small>";
		}
		function subePv($pv) {
			return "<span style='color: ".C_VERDE."'>Te curas <var>".$pv."</var><small>PV</small>";
		}		
		
		
		//Crimen
		function bajaCrimen() {
			return "<span style='color: ".C_VERDE."'>El crimen se reduce en la ciudad.</span>";
		}
		function subeCrimen() {
			return "<span style='color: ".C_ROJO."'>El crimen aumenta en la ciudad.</span>";
		}
		function policia() {
			return "<span style='color: ".C_NARANJA.";'>¡Las fuerzas del orden intentan atraparte!</span>";
		}
		function policiaMulta($cr) {
			return "<span style='color: ".C_ROJO."'>Te obligan a pagar una multa de <var>".cr."</var><small>Cr</small></span>";
		}
		function policiaEscape() {
			return "<span style='color: ".C_VERDE."'>Pero consigues escapar de ellos.</span>";
		}
		
		
		//Align
		function subeAlign() {
			return "<span style='color: ".C_AZUL."'>Recibes puntos del lado luminoso.</span>";
		}
		function bajaAlign() {
			return "<span style='color: ".C_ROJO."'>Recibes puntos del lado oscuro.</span>";
		}
		function noAlign(){
			return "<span style='color: ".C_GRIS."'>Primero debes elegir tu camino.</span>";
		}
		
		
		//Exp
		function subePx($xp) {
			return "<span style='color: ".C_PURPURA."'>Recibes <var>".$xp."</var> puntos de experiencia.</span>";
		}
		function andLvlUp(){
			return "<span style='color: ".C_PURPURA."'> ¡Y sube de nivel!</span>";
		}
		
		
		//Creditos
		function subeCreditos($cr) {
			return "<span style='color: ".C_ORO."'>Recibes <var>".$cr."</var><small>Cr</small>.</span>";
		}
		function bajaCreditos($cr) {
			return "<span style='color: ".C_ORO."'>Gastas <var>".$cr."</var><small>Cr</small>.</span>";
		}
		function noCreditos($cr){
			return "<span style='color: ".C_ROJO."'>No tienes suficientes Créditos. Necesitas <var>".$cr."</var><small>Cr</small>.</span>";
		}
		function noRecompensa() {
			return "<span style='color: ".C_GRIS."'>No recibes ninguna recompensa.</span>";
		}
		
		
		//Exito
		function fallo() {
			return "<span style='color: #ff4040'>HAS FALLADO</span>";
		}
		function victoria() {
			return "<span style='color: #40ff40'>VICTORIA</span>";
		}	
		function exito() {
			return "<span style='color: #40ff40'>&Eacute;XITO</span>";
		}
		

		//Atributos
		function subeAtributo($atr, $cant){
			return "<span style='color: ".C_VERDE."'>".ucfirst($atr)." ha aumentado en <strong>".$cant."</strong> punto(s).</span>";
		}
		function maximoAtributo($atr){
			return "<span style='color: ".C_ROJO."'>".ucfirst($atr)." no se puede aumentar tanto.</span>";
		}
		
		
		//Clase
		function noEntrenamientos(){
			return "<span style='color: ".C_ROJO."'>No tienes suficientes entrenamientos.</span>";
		}
		function bajaEntrenamientos($e){
			return "<span style='color: ".C_NARANJA."'>Gastas <b>$e</b> entrenamiento.</span>";
		}
		function subeClase($nom){
			return "<span style='color: ".C_VERDE."'>Tu nivel de <b>$nom</b> ha aumentado.</span>";	
		}
		function maximoClase($atr){
			return "<span style='color: ".C_ROJO."'>Tu nivel como <b>".$atr."</b> no puede aumentar más.</span>";
		}
		
		
		//Inventario
		function recibir($nom){
			return "<span style='color: ".C_VERDE."'>Has recibido <b>$nom</b>.</span>";	
		}
		function blandir($nom){
			return "<span style='color: ".C_PURPURA."'>Blandes <b>$nom</b>.</span>";	
		}
		function desblandir($nom){
			return "<span style='color: ".C_PURPURA."'>Sueltas <b>$nom</b>.</span>";	
		}
		function noEsTuyo(){
			return "<span style='color: ".C_ROJO."'>Eso no es tuyo.</span>";	
		}
		
		
		//Rango
		function subeRango($rnk){
			return "<span style='color: ".C_AMARILLO."'>Has ascendido a <b>$rnk</b>.</span>";	
		}
	}	