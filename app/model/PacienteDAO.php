<?php 
	include "Paciente.php";
	include "DAO.php";
	class PacienteDAO extends DAO{

		public function __construct(){
			parent::__construct();
		}
	
		/**Rertona um objeto com um atributo chamado "quantidade" do tipo int 
		com o total de pacientes cadastrados no banco de dados*/
		public function getTotalPacientes(){
			$sql = "SELECT count(id) as quantidade FROM paciente";
			#traz a uma linha com o resultado.
			$result = $this->mysqli->query($sql);
			#converte o resultado em um objeto.
			return $result->fetch_object();
		}
		/**Busca pacintes pelo primeiro nome ou cpf, tanto em maiuscula como 
		em minuscula senão encontra nada retorna uma array vazio*/
		public function buscarPacientes($valor){
			$sql = "SELECT * FROM paciente where cpf = '{$valor}' OR nome like '{$valor}%'";	
			$result = $this->mysqli->query($sql);
			$pacientes = array();
			while($p = $result->fetch_object()){
				$pacientes[] = $p;
			}
			return $pacientes;
		}

		/**Retorna um a quantidade total de pacientes em cada estado se se for 
		passado parametro com o tipo de unidade de saude avalia por tipo de unidade de saúde tambem
		não tiver nenhum estado cadastrado no banco de dados retorna um array vazio*/
		public function listarQuantPacientesPorEstado($tipoUnidade = null){
			if(isset($tipoUnidade)){
				$sql = "SELECT estado, COUNT(id) as quantidade FROM paciente WHERE id_unidade = (SELECT id FROM unidade_de_saude WHERE tipo = '{$tipoUnidade}') GROUP BY estado";	
			}else{
				$sql = "SELECT estado, COUNT(id) as quantidade FROM paciente GROUP BY estado";	
			}
			$result = $this->mysqli->query($sql);
			$estados = array();
			while($e = $result->fetch_object()){
				$estados[] = $e;
			}
			return $estados;
		}

		/**Busca todos os pacientes pelo estado passado como parametro  ou por estado e tipo de unidade de saúde
		em maiuscula como em minuscula senão encontra nada retorna uma array vazio*/
		public function listarPacientes($sigla, $tipoUnidade = null){
			if(isset($situacao)){
				$sql = "SELECT id,cpf, nome, situacao, cidade FROM paciente WHERE estado = '{$sigla}' AND id_unidade = (SELECT id FROM unidade_de_saude WHERE tipo = '{$tipoUnidade}') ORDER BY nome";	
			}else{
				$sql = "SELECT id,cpf, nome, situacao, cidade FROM paciente WHERE estado = '{$sigla}' ORDER BY nome";	
			}
			$result = $this->mysqli->query($sql);
			$pacientes = array();
			while($p = $result->fetch_object()){
				$pacientes[] = $p;
			}
			return $pacientes;
		}

		public function gravarPaciente(Paciente $p, $id_medico = 1){
			if(isset($p)){
				$v = array();
				$v[] = "default";
				$v[] = $id_medico;
				$v[] = $p->get_data_atendimento();
				$v[] = $p->get_situacao();
				$v[] = $p->get_cpf();
				$v[] = $p->get_nome();
				$v[] = $p->get_nascimento();
				$v[] = $p->get_sexo();
				$v[] = $p->get_logradouro();
				$v[] = $p->get_cep();
				$v[] = $p->get_bairro();
				$v[] = $p->get_cidade();
				$v[] = $p->get_estado();
				#Buscanco a chave estrangeira do hospital que o paciente esta.
				$sql = "SELECT id_unidade FROM medico WHERE CRM = '{$p->get_crm()}'";
				$result = $this->mysqli->query($sql);
				$u = $result->fetch_object(); 
				$v[] = $u->id_unidade;
				#sintomas
				$v[] = $p->get_febre();
				$v[] = $p->get_dor_cabeca();
				$v[] = $p->get_dor_olhos();
				$v[] = $p->get_perda_apetite();
				$v[] = $p->get_mancha();
				$v[] = $p->get_vomito();
				$v[] = $p->get_tontura();
				$v[] = $p->get_cansaco();
				$v[] = $p->get_moleza();
				$v[] = $p->get_dor_ossos();
				$v[] = $p->get_parecer_medico();

				#montado a string de insert 
				$sql = "INSERT INTO paciente VALUES (";
				$length = count($v);
				for($i = 0; $i < $length; $i++){
					$sql .= "'".$v[$i]."'";
					if(($i + 1) != $length){
						$sql .= ",";		
					}else{
						$sql .= ")";	
					}
				}
				$this->mysqli->query($sql);
				return $this->mysqli->affected_rows > 0;
				#echo $sql;
			}
			return false;
		}
	}

	/**$banco = new ServicosDB();

	$array = $banco->listarQuantPacientesPorEstado("Unidade Mista");

	echo "Quantidade total de pacientes: ".$n->quantidade;

	$sigla = "SP";

	$array = $banco->listarQuantPacientesPorEstado();

	foreach ($array as $x) {
		echo "Estado: $x->estado Quantidade: $x->quantidade <br>";
	}

	#Situacao.
	$sit = "Internado";
	#CRM médico
	$crm = "12345";

	$sint = new Sintomas(1,1,1,1,1,1,0,1,1,1);

	#Atributos pessoa.
	$nome = "Leonardo Pereira Alves";
	$cpf = "37090548856";
	$nasc = "05/09/1982";
	$sexo = "M";

	#Atributos endereco
	$lo = "Rua Jose Campos Barretos, 176";
	$ce = "02952-236";
	$ba = "Vila Renato";
	$ci = "Sao Paulo";
	$es = "SP";
	$pa = "Essa pessoa esta muito doente!";

	$ende = new Endereco($lo,$ce,$ba,$ci,$es);

	#$p = new Paciente($sit, $crm, $nome, $cpf,$nasc,$sexo,$ende,$sint);

	$banco->gravarPaciente( new Paciente($sit, $crm, $nome, $cpf,$nasc,$sexo,$ende,$sint,$pa),1);*/
?>