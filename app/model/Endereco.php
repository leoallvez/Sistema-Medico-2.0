<?php 
	class Endereco{

		private $logradouro;
		private $cep;
		private $bairro;
		private $cidade;
		private $estado;
		

		public function __construct($lo = "", $ce = "", $ba = "", $ci = "", $es = ""){
			$this->logradouro = $lo;
			$this->cep = $ce;
			$this->bairro = $ba;
			$this->cidade = $ci;
			$this->estado = $es;
		} 

		public function get_logradouro(){
			return $this->logradouro;
		}

		public function get_cep(){
			return $this->cep;
		}

		public function get_bairro(){
			return $this->bairro;
		}

		public function get_cidade(){
			return $this->cidade;
		}

		public function get_estado(){
			return $this->estado;
		}
	}	
?>