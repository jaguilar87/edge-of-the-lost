<?
	/*RagnaJAG Model*/
	
	class Ciudad extends baseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = "ciudades";
			parent::__construct($where);
			
			$this->hasOne("planeta", "Planeta");
		}
		
		function crimen($crimen) {
			$crimenMod = mt_rand(0, 1000);
			
			
			if ($crimenMod < $this->datos[crimen]) {
				$this->datos[crimen] += $crimen;
				$this->datos[crimen] = min (750, $this->datos[crimen]);
				
				if ($crimen > 0) {
					Views::addToMessage(Notify::subeCrimen().BR);
				} else {
					Views::addToMessage(Notify::bajaCrimen().BR);
				}
				
				return true;
			} else {
				return false;
			}
		}
		
		function beneficios($cr){
			loadModel ("Sede");
		    $lessCrime = $cr - ($cr * ($this->datos[crimen] / 1000));
						
			$total = $this->datos[influencia];
						
		    $sql = DB::query("SELECT id FROM sedes WHERE ciudad='".$this->datos[id]."'");
  			while($r = DB::fetch($sql)){
  				$sede[$r{id}] = new Sede(array("id" => $r[id]));
  				$total += $sede[$r{id}]->datos[influencia];
  			}
  			
  			if(count($sede) > 0){
	  			foreach ($sede as $k => $v){
	  				$v->metadatos[clan]->datos[incoming] += $lessCrime * ($this->datos[influencia] / $total);
	  				$v->metadatos[clan]->update();
	  			}
  			}
		}
		
		function heal ($precio, $idHospital){
			global $ch;
			
			loadModel ("Sede");
			$sede = new Sede(array("id" => $idHospital));
			
			$hpLost = $ch->datos[pvmax] - $ch->datos[pv];
			
			if ($idHospital == 0){
				if ($ch->creditos(-($precio * $hpLost))){
						$ch->pv(+$hpLost);
						$this->beneficios($precio * $hpLost);
						
						$ch->update();
					}
			}else{
				if ($sede->bacta(-$hpLost)){	
					if ($ch->creditos(-($precio * $hpLost))){
						$ch->pv(+$hpLost);
						$this->beneficios($precio * $hpLost);
						
						$ch->update();
						$sede->update();
					}
				}
			}
			
		}
	}
?>