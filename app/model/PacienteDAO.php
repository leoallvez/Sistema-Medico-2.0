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

		/**Busca Paciente apartir de PK*/
		public function buscarPaciente($id){
			$sql = "SELECT * FROM paciente WHERE id = {$id}";
			$result = $this->mysqli->query($sql);
			if($this->mysqli->affected_rows > 0){
				return $result->fetch_object();
			}
			return null;
		}

		/**Busca pacintes pelo primeiro nome ou cpf, tanto em maiuscula como 
		em minuscula senão encontra nada retorna uma array vazio*/
		public function buscarPacientes($valor){
			$sql = "SELECT * FROM paciente WHERE cpf = '{$valor}' OR nome like '{$valor}%' ORDER BY nome";	
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
		public function listarQuantPacientesPorEstado($tipoUnidade = null, $situacao){
			if($tipoUnidade != "Todos"){
				$sql = "SELECT estado, COUNT(id) as quantidade FROM paciente WHERE situacao = '{$situacao}' AND id_unidade = (SELECT id FROM unidade_de_saude WHERE tipo = '{$tipoUnidade}') GROUP BY estado";	
			}else{
				$sql = "SELECT estado, COUNT(id) as quantidade FROM paciente WHERE situacao = '{$situacao}' GROUP BY estado";	
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

		public function atualizarPaciente(Paciente $p, $id_medico = 1, $id_paciente){
			if(isset($p)){
				$v = array();
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
				$sql = "UPDATE paciente
				SET
					id_medico = {$v[0]},
					data_atendimento = '{$v[1]}',
					situacao = '{$v[2]}',
					cpf = '{$v[3]}',
					nome = '{$v[4]}',
					nascimento = '{$v[5]}',
					sexo = '{$v[6]}',
					endereco = '{$v[7]}',
					cep = '{$v[8]}',
					bairro = '{$v[9]}',
					cidade = '{$v[10]}',
					estado = '{$v[11]}',
					#unidade de saúde
					id_unidade = {$v[12]},
					#Sintomas 10!
					febre = {$v[13]},
					dor_cabeca = {$v[14]},
					dor_olhos = {$v[15]},
					perda_apetite = {$v[16]},
					mancha_pele = {$v[17]},
					vomito = {$v[18]},
					tontura = {$v[19]},
					cansaco = {$v[20]},
					moleza = {$v[21]},
					dor_ossos = {$v[22]},
					parecer_medico = '{$v[23]}' 
				WHERE
					id = {$id_paciente}";
				
				$this->mysqli->query($sql);
				return $this->mysqli->affected_rows > 0;
			}
			return false;
		}
	}
?>