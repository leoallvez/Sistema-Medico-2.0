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
		/**Rertona um objeto com um atributo chamado "quantidade" do tipo int 
		com o total de pacientes cadastrados no banco de dados*/
		public function get_total_pacientes(){
			$sql = "SELECT count(id) as quantidade FROM paciente";
			#traz a uma linha com o resultado.
			$result = $this->mysqli->query($sql);
			#converte o resultado em um objeto.
			return $result->fetch_object();
		}
		/**Busca pacintes pelo primeiro nome ou cpf, tanto em maiuscula como 
		em minuscula senão encontra nada rertona uma array vazio*/
		public function buscar_pacientes($valor){
			$sql = "SELECT * FROM paciente where cpf = '{$valor}' OR nome like '{$valor}%'";	
			$result = $this->mysqli->query($sql);
			$pacientes = array();
			while($p = $result->fetch_object()){
				$pacientes[] = $p;
			}
			return $pacientes;
		}
		/**Busca todos os pacientes pelo estado passado como parametro tanto 
		em maiuscula como em minuscula senão encontra nada rertona uma array vazio*/
		public function listarPacientesPorEstado($sigla){
			$sql = "SELECT id,cpf, nome, situacao, cidade FROM paciente WHERE estado = '{$sigla}' ORDER BY nome";
			$result = $this->mysqli->query($sql);
			$pacientes = array();
			while($p = $result->fetch_object()){
				$pacientes[] = $p;
			}
			return $pacientes;
		}

		public function listarQuantPacientesPorEstado(){
			$sql = "SELECT estado, COUNT(id) as quantidade FROM paciente GROUP BY estado";
			$result = $this->mysqli->query($sql);
			$estados = array();
			while($e = $result->fetch_object()){
				$estados[] = $e;
			}
			return $estados;
		}

		public function listar(){}

		public function gravaPaciente(Paciente $p){}
	}

	$banco = new ServicosDB();

	$array = $banco->buscar_pacientes("40394779100");

	#echo "Quantidade total de pacientes: ".$n->quantidade;

	#$sigla = "SP";

	#$array = $banco->listarQuantPacientesPorEstado();

	foreach ($array as $x) {
		echo "CPF: $x->cpf Nome: $x->nome <br>";
	}
?>