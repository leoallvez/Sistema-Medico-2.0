<?php 
	class UnidadeDeAntendimento{

		private $nome;
		private $tipo;
		private $endereco;

		public function __construct($nome, $tipo, Endereco $endereco){
			$this->nome = $nome;
			$this->tipo = $tipo;
			$this->endereco = $endereco;
		}

		public function get_nome(){
			$this->nome = $nome;
		}

		public function get_tipo(){
			return $this->tipo;
		}
	}

?>