<?
	/*RagnaJAG Model*/
	
	class Habilidad extends BaseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = strtolower("Habilidades");
			parent::__construct($where);
			

//			$this->hasOne("hab", "Ref_habilidad");
		}
		
	}
?>