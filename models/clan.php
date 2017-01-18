<?
	/*RagnaJAG Model*/
	
	class Clan extends BaseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = strtolower("Clanes");
			parent::__construct($where);
		}
		
	}
?>