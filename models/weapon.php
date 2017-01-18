<?
	/*RagnaJAG Model*/
	
	class Weapon extends BaseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = strtolower("Weapons");
			parent::__construct($where);
		}
		
		function nombre ($color = true) {
			$nombre = $this->datos[nombre];
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
	}
?>