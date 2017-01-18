<?
	/*RagnaJAG Model*/
	
	class Sede extends BaseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = strtolower("Sedes");
			parent::__construct($where);
			
			$this->hasOne("clan", "Clan");
		}
		
		function bacta($bacta){
			if ($bacta < 0){
				if ($this->datos[bacta] < abs($bacta)){
					Views::addToMessage( Notify::noBacta());
					return false;
				}else{
					$this->datos[bacta] += $bacta;
					return true;
				}
			}
		}
		
	}
	

?>