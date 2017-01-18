<?
	/*RagnaJAG Model*/
	
	class Mensaje extends BaseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = strtolower("Mensajes");
			parent::__construct($where);
			
			$this->hasOne("emisor", "Char");
			$this->hasOne("receptor", "Char");
		}
		
	}
?>