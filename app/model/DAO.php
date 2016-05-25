<?php 
	#include "Paciente.php";
	class DAO{
		protected $servidor;
		protected $usuario;
		protected $senha;
		protected $banco;
		protected $mysqli;
		# Pesquisar sobre Factory Pattern em PhP
		# Criar uma classe para cada elemento
		# PacienteDao, MedicoDao, CentroDeSaudeDao
		# Dao = Data Access Object
		public function __construct(){
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->senha = "";
			$this->banco = "hospital";
			$this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);
			#mensagem de erro caso não faça a conexão com o banco.
			if(mysqli_connect_errno()){
				die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
    			exit();
			}
		}
	}
?>