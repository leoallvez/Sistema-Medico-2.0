<?php 

include "Endereco.php";

Class Pessoa{
	protected $nome;
	protected $cpf;
	protected $nascimento;
	protected $sexo;
	protected $endereco;

	public function __construct($nome = "", $cpf = "", $nascimento, $sexo = "", Endereco $endereco){
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->setNascimento($nascimento);
		$this->sexo = $sexo;
		$this->endereco = $endereco;
	} 

	public function get_nome(){
		return $this->nome;
	}

	public function get_cpf(){
		return $this->cpf;
	}

	
	public function get_sexo(){
		return $this->sexo;
	}

	public function get_logradouro(){
		return $this->endereco->get_logradouro();
	}

	public function get_cep(){
		return $this->endereco->get_cep();
	}
	
	public function get_bairro(){
		return $this->endereco->get_bairro();
	}

	public function get_estado(){
		return $this->endereco->get_estado();
	}

	public function get_cidade(){
		return $this->endereco->get_cidade();
	}

	public function setNascimento($data = ""){
		#Esse metodo converte a data de nascimento para o banco de dados
		if($data == ""){
			$this->nascimento = "0000-00-00";
		}else{
			#Separa uma string em um array apos encontrar certos elementos.
			$dados = explode("/",$data); 
			if(count($dados) != 3){
				$this->nascimento = $data;
			}else{
				$this->nascimento = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
			}
		}
	}

	public function get_nascimento(){
		if($this->nascimento == "" || $this->nascimento == "0000-00-00"){
			return "";
		}
		$dados = explode("-",$this->nascimento);
		if(count($dados) != 3){
			return $data;
		}
		$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
		return $data_exibir;
	}
}

?>