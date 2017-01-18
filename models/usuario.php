<?
	/*RagnaJAG Model*/
	
	class Usuario extends baseModel{
		function __construct($where) {
			//Constructor autogenerado
			$this->tableName = "usuarios";
			parent::__construct($where);
			if ($this->datos['mainchar'] != 0){
				$this->hasOne("mainchar", "Char");
			}
		}
		
		function logout() {
			session_destroy();
			header("location: ../");
		}
		
	}
?>