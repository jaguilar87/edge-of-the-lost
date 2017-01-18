<?
	/*RagnaJAG Model*/
	
	class Planeta extends BaseModel{
		function __construct($where = false) {
			//Constructor autogenerado
			$this->tableName = strtolower("Planetas");
			parent::__construct($where);
			
			$this->hasOne("tipo", "TipoPlaneta");
		}
		
	}
?>