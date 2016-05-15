<?php 
	class ServicosDB{
		private $servidor;
		private $usuario;
		private $senha;
		private $banco;
		private $mysqli;

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
		/**Rertona um objeto com um atributo chamado "quanto " do tipo int 
		com o total de pacientes cadastrados no banco de dados*/
		public function get_total_pacientes(){
			$sql = "SELECT count(id) as quant FROM pacientes";
			#traz a uma linha com o resultado.
			$resultado = $this->mysqli->query($sql);
			#converte o resultado em um objeto.
			return $resultado->fetch_object();
		}

		public function all_names(){
			$sql = "SELECT id, nome FROM pacientes ORDER BY nome";
			#atribui a variavel resultado os as buscas sql.
			$resultado = $this->mysqli->query($sql);
			return $resultado;
		}
	}

	$banco = new ServicosDB();

	#$n = $banco->get_total_pacientes();

	#echo "Quantidade total de pacientes: ".$n->quant;

	$pessoas = $banco->all_names();

	while ($p = $pessoas->fetch_object()) {
		echo "paciente $p->id : ".$p->nome."<br>";
	}
?>