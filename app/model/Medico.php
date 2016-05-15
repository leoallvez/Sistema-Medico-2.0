<?php
	include "Pessoa.php";
	include "UnidadeDeAtendimento.php";
	class Medico extends Pessoa{
		private $crm;
		private $especialidade;
		private $senha;
		private $email;

		public function __construct($crm, $espe, $senha, $email, $nome, $cpf, $nasc, $sexo, Endereco $ende){
			$this->crm = $crm;
			$this->especialidade = $espe;
			$this->senha = $senha;
			$this->email = $email;
			parent::__construct($nome, $cpf, $nasc, $sexo, $ende);
		}

		public function get_crm(){
			return $this->crm;
		}

		public function get_especialidade(){
			return $this->especialidade;
		}

		public function get_nome(){
			if($this->get_sexo() == "M"){
				return "Dr. ".$this->nome;
			}else{
				return "Dra. ".$this->nome;
			}
		} 

		public function get_senha(){
			return $this->senha;
		}

		public function get_email(){
			return $this->email;
		}
	}

?>