<?php
	#include 'DAO.php';
	class MedicoDAO extends DAO{

		public function __construct(){
			parent::__construct();
		}

		public function login($CRM, $senha){
			$sql = "SELECT * FROM medico WHERE CRM = '{$CRM}' AND senha = '{$senha}'";
			$result = $this->mysqli->query($sql);
			return $result->fetch_object();
		}

		public function findPk($CRM){
			$sql = "SELECT id FROM medico WHERE CRM = '{$CRM}'";
			$result = $this->mysqli->query($sql);
			$objeto = $result->fetch_object();
			return $objeto->id;
		}

		public function buscarUnidade($id){
			$sql = "SELECT * FROM unidade_de_saude WHERE id = '{$id}' ";
			$result = $this->mysqli->query($sql);
			$objeto = $result->fetch_object();
			return $objeto;
		}
	}
?>