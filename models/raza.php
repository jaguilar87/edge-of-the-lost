<?
	/*RagnaJAG Model*/
	
	class Raza extends BaseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = strtolower("Razas");
			parent::__construct($where);
		}
		
	}
?>