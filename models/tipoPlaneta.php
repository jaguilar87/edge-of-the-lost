<?
	/*RagnaJAG Model*/
	
	class TipoPlaneta extends BaseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = strtolower("Tipo_planeta");
			parent::__construct($where);
		}
		
	}
?>