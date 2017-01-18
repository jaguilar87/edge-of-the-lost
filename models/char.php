<?
	/*RagnaJAG Model*/
	
	class Char extends baseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = "chars";
			parent::__construct($where);
			
			$this->hasOne("raza", "Raza");
			$this->hasOne("rango", "Rango");
			if ($this->datos[ciudad] != 0) {
				$this->hasOne("ciudad", "Ciudad");
				$this->metadatos[planeta] = $this->metadatos[ciudad]->metadatos[planeta];
			} else {
				$this->hasOne("planeta", "Planeta");
			}
			
			if ($this->datos[weapon] != 0){
				loadModel("Weapon");
				$this->hasOne("weapon", "Weapon");

				$this->datos[color] = $this->metadatos[weapon]->datos[color];
			}
		}
		
		function nombre ($color = true) {
			if ($this->datos[rango] > 1) {
				if ($this->datos[alineamiento] > 0) {
					$nombre = $this->metadatos[rango]->datos[rango_jedi]." ".$this->datos[nombre];
				} else {
					$nombre = $this->metadatos[rango]->datos[rango_sith]." ".$this->datos[nombre];
				}
			} else {
				$nombre = $this->datos[nombre];
			}
			
			if ($color) {
				switch($this->datos[color]) {
					case 0:
						$nombre = "<span style='color: ".C_BLANCO."'>".$nombre.'</span>';
					break;
					case 1:
						$nombre = "<span style='color: ".C_SITH."'>".$nombre.'</span>';
					break;
					case 2:
						$nombre = "<span style='color: ".C_AMARILLO."'>".$nombre.'</span>';
					break;
					case 3:
						$nombre = "<span style='color: ".C_AZUL." '>".$nombre.'</span>';
					break;
					case 4:
						$nombre = "<span style='color: ".C_PURPURA."'>".$nombre.'</span>';
					break;
					case 5:
						$nombre = "<span style='color: ".C_VERDE."'>".$nombre.'</span>';
					break;
					case 6:
						$nombre = "<span style='color: ".C_NARANJA."'>".$nombre.'</span>';
					break;				
				}
			}
			
			return $nombre;
		}
		
		
		//Pv
		function absorcion() {
			//Regla de tres
			// 200 --> 75%
			// cons -> X%
			
			//maximo
			$x = $this->datos[constitucion] * 75;
			$x /= 200;
			
			//minimo
			$x2 = $this->datos[constitucion] * 20;
			$x2 /= 200;
			
			//se devuelbe en porunaje
			return round( mt_rand($x2, $x) / 100 );
		}
		
		function pv($dano) {
			if ($dano < 0) {
				$dmg = abs($dano) + (1 - $this->absorcion());
				$this->datos[pv] = max(0, $this->datos[pv] - $dmg);
				
				Views::addToMessage( Notify::bajaPv($dmg) );
				if ($this->datos[pv] > 0) {
					Views::addToMessage( ".".BR );
				} else {
					Views::addToMessage( " y caes inconsciente.".BR );
				}
				
				return $dmg;
			}else{
				$this->datos[pv] = min($dano + $this->datos[pv], $this->datos[pvmax]);
				Views::addToMessage( Notify::subePv(abs($dano)) );
			}
		}
		
		function vivo($notify = true) {
			if ($this->datos[pv] > 0) {
				return true;
			} else {
				if ($notify) Views::addToMessage( Notify::noPv().BR, true );
				return false;
			}
		}
		
		
		//Energia
		function energia($ener) {
			if ($ener < 0) {
				if ($this->datos[turnos] >= abs($ener)) {
					$this->datos[turnos] += $ener;			
					return true;
				} else {
					Views::addToMessage( Notify::insuficienteEnergia(abs($ener)).BR, true );
					return false;
				}
			}
		}
		
		
		//Exp
		function px($xp) {
			if ($xp > 0) {
				$this->datos[px] += $xp;
				Views::addToMessage( Notify::subePx($xp) );
				if ($this->datos[px] >= $this->datos[pxnext]) {
					Views::addToMessage ( Notify::andLvlUp() );
				}
				Views::addToMessage( BR );
			}
		}
		function subeNivel() {
			if ($this->datos[px] >= $this->datos[pxnext]) {
				$this->datos[px] = 0;
				$this->datos[nivel]++;
				$this->datos[pxnext] = $this->datos[nivel] * 150;
				$this->datos[entrenamientos]++;
				
				$this->datos[pvmax] += round($this->datos[pvmax]*0.1 + round($this->datos[constitucion]/10));
				
				$this->update();
				
				return true;
			} else {
				return false;
			}
		}
		
		
		//Align
		function align($align) {
			$this->datos[alineamiento] += $align;
			
			if ($align < 0) {
				Views::addToMessage( Notify::bajaAlign($align).BR );
			} else {
				Views::addToMessage( Notify::subeAlign($align).BR );
			}
		}
		function lado(){
			$l = $this->datos[alineamiento];
			if ($l==0){
				return 0;
			}elseif ($l > 0){
				return 1;
			}else{
				return -1;
			}
		}
		
		
		//Creditos
		function creditos($cr) {
			if ($cr > 0) {
				$this->datos[creditos] += $cr;
				Views::addToMessage( Notify::subeCreditos($cr).BR );
			}else{
				if ($this->datos[creditos] >= abs($cr)){
					$this->datos[creditos] += $cr;
					Views::addToMessage( Notify::bajaCreditos(abs($cr)).BR );
					return true;
				}else{
					Views::addToMessage( Notify::noCreditos(abs($cr)).BR, true);
					return false;
				}
			}
		}
		function multa($cr) {
			$cr = abs($cr);
			$this->datos[creditos] -= $cr;
			Views::addToMessage( Notify::policiaMulta($cr).BR );
		}
		
		//Atributos
		function atributoMax($atr = false){
			if ($atr == false){
				return max($this->atributoMax("vigor"), $this->atributoMax("constitucion"), $this->atributoMax("destreza"), $this->atributoMax("agilidad"), $this->atributoMax("inteligencia"));
			}else{
				return 25 + 25 * $this->datos[rango] + $this->metadatos[raza]->datos[$atr] * ($this->datos[rango] + 3);
			}
		}
		function atributoSubir($atr, $cantidad){
			if ($this->datos[$atr] + $cantidad <= $this->atributoMax($atr)){
				$this->datos[$atr] += $cantidad;
				
				Views::addToMessage(Notify::subeAtributo($atr, $cantidad).BR);
				return true;
			}else{
				Views::addToMessage(Notify::maximoAtributo($atr).BR, true);
				return false;
			}
		}
		
		//Clases
		function entrenamiento($ent){
			if ($ent < 0){
				if ($this->datos[entrenamientos] >= abs($ent)){
					$this->datos[entrenamientos] += $ent;
					Views::addToMessage(Notify::bajaEntrenamientos(abs($ent)).BR, true);
					return true;
				}else{
					Views::addToMessage(Notify::noEntrenamientos().BR, true);
					return false;
				}
			}
		}
		function subeClase($nom){
			$line = explode(",", $this->datos[clases]);

			switch($nom){
				case "Picaro":
					$line[0]++;
					break;
				case "Soldado":
					$line[1]++;
					break;
				case "Artesano":
					$line[2]++;
					break;
				case "Piloto":
					$line[3]++;
					break;
				default:
					return false;
					break;
			}
			
			foreach($line as $v){
				if ($v > 10){
					Views::addToMessage(Notify::maximoClase($nom).BR, true);
					return false;
				}
			}
			
			$this->datos[clases] = implode(",", $line);
			
			Views::addToMessage(Notify::subeClase($nom).BR);
			
			return true;
		}
		
		
		//Inventario
		function recibirArma($id){
			loadModel("Ref_weapon");
			loadModel("weapon");
			
			$objeto = new Ref_weapon(array("id" => $id));
			$objeto->datos[owner] = $this->datos[id];
			$objeto->insertInto("weapons");
			
			Views::addToMessage(Notify::recibir($objeto->datos[nombre]).BR);
		}
		function blandir($id){
			loadModel("Weapon");
			
			if ($id==0){
				$this->datos[weapon] = $id;
				Views::addToMessage(Notify::desblandir($this->metadatos[weapon]->datos[nombre]).BR);
				
				return true;
			}else{
				$objeto = new Weapon(array("id" => $id));
				if ($objeto->datos[owner] == $this->datos[id]){
					$this->datos[weapon] = $id;
					$this->hasOne("weapon", "Weapon");
					
					Views::addToMessage(Notify::blandir($objeto->datos[nombre]).BR);
					return true;
				}else{
					Views::addToMessage(Notify::noEsTuyo().BR, true);
					return false;
				}
			}
				
		}
		function blandirUltima(){
			$sql = DB::query("SELECT id FROM weapons WHERE owner='".$this->datos[id]."' ORDER BY id DESC LIMIT 0,1");
			$r = DB::fetch($sql);
			
			$this->blandir($r[id]);
		}
		
		
		//Rango
		function subeRango(){
			if ($this->datos[rango] < 7){
				$this->datos[rango]++;
	
				$r = new Rango(array("id" => $this->datos[rango]));
				
				if ($this->datos[alineamiento] > 0){
					Views::addToMessage(Notify::subeRango($r->datos[nombre_jedi]).BR);
				}else{
					Views::addToMessage(Notify::subeRango($r->datos[nombre_sith]).BR);
				}
			}
		}
		function listoParaRango2(){
			
		}
	}
?>