<?php 
	class UnidadeDAO extends DAO{

		public function __construct(){
			parent::__construct();
		}

		public function buscarUnidade($id){
			$sql = "SELECT * FROM unidade_de_saude WHERE id = '{$id}'";
			$result = $this->mysqli->query($sql);
			$objeto = $result->fetch_object();
			return $objeto;
		}
	}
?>