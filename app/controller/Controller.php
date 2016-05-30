<?php 
	include "app/model/PacienteDAO.php";
	include "app/model/MedicoDAO.php";
	include "app/model/UnidadeDAO.php";
	Class Controller{

		public function cadastro(){
			$situacao = "Passou pela Triagem";
			$tipo_unidade = "Posto de saude";
			#Atribuir a médico a variavel de sessão com todos os dados do medico logado.
			$medico = $_SESSION['acesso'];
			#buscar de medico medDAO que foi instaciada em login a unidade do medico.
			$uniDAO = new UnidadeDAO();
			$unidade = $uniDAO->buscarUnidade($medico->id_unidade);


			if(count($_POST) > 0){
				#CRM médico
				$crm = $medico->CRM;
				#Situacao.
				$sit = $_POST['situacao'];
				#Pessoa.
				$cpf = $_POST['cpf'];
				$nome = $_POST['nome'];
				$nasc = $_POST['nascimento'];
				$sexo = $_POST['sexo'];
				#Endereco
				$lo = $_POST['endereco'];
				$ce = $_POST['cep'];
				$ba = $_POST['bairro'];
				$ci = $_POST['cidade'];
				$es = $_POST['estado'];
				$ende = new Endereco($lo,$ce,$ba,$ci,$es);
				$pa = $_POST['parecer_medico'];
				#Sintomas
				$fe = (isset($_POST['febre']))? 1 : 0;
				$dc = (isset($_POST['dor_cabeca']))? 1 : 0;
				$d  = (isset($_POST['dor_olhos']))? 1 : 0;
				$pe = (isset($_POST['perda_apetite']))? 1 : 0;
				$mp = (isset($_POST['mancha_pele']))? 1 : 0;
				$vt = (isset($_POST['vomito']))? 1 : 0;
				$to = (isset($_POST['tontura']))? 1 : 0;
				$ca = (isset($_POST['cansaco']))? 1 : 0;
				$mo = (isset($_POST['moleza']))? 1 : 0;
				$do = (isset($_POST['dor_ossos']))? 1 : 0;
				$sint = new Sintomas($fe,$dc,$d,$pe,$mp,$vt,$to,$ca,$mo,$do);

				$p = new Paciente($sit, $crm, $nome, $cpf,$nasc,$sexo,$ende,$sint,$pa);

				$DAO = new PacienteDAO();

				if($DAO->gravarPaciente($p,$medico->id)){
					header("Location: aviso-cadastro.php");
				}else{
					header("Location: aviso-de-nao-cadastro.php");
				}
			}
			include "app/view/view-formulario-paciente.php";
		}

		public function relatorioPaciente(){
			$situacao = "Passou pela Triagem";
			$tipo_unidade = "Posto de saude";
			$mostrarTabela = false;

			if(count($_POST) > 0){
				$situacao = $_POST['situacao'];
				$tipo_unidade = $_POST['tipo_unidade'];
				$mostrarTabela = true;
			}

			$DAO = new PacienteDAO();

       		$pacientes = $DAO->listarQuantPacientesPorEstado($tipo_unidade, $situacao);   

        	include "app/view/view-relatorio.php";
      	} 

      	public function buscarPaciente(){
      		$mostrarTabela = false;
      		$valor = "*";
      		if(count($_POST) > 0){
      			$valor = $_POST['valor'];
      			if($valor == ""){
      				$valor = "*";
      			}
      			$mostrarTabela = true;
      		}

      		$DAO = new PacienteDAO();

      		$pacientes = $DAO->buscarPacientes($valor);

      		include "app/view/view-buscar-paciente.php";
      	} 

      	public function atualizarPaciente(){
			
      		if(count($_GET) > 0){
      			$DAO = new PacienteDao();
      	
      			$id_paciente = base64_decode($_GET['id']);

      			$p = $DAO->buscarPaciente($id_paciente);
      			$DAO->fechaBanco();

				if(isset($p)){
					$uniDAO = new UnidadeDAO();
					$unidade = $uniDAO->buscarUnidade($p->id_unidade);
					$uniDAO->fechaBanco();
					$medDAO = new MedicoDAO();
					$medico = $medDAO->buscarMedico($p->id_medico);
					unset($medDAO);
					if(count($_POST) > 0){
						#Atribuir a médico a variavel de sessão com todos os dados do medico logado.
						$medico = $_SESSION['acesso'];
						$uniDAO = new UnidadeDAO();
						$unidade = $uniDAO->buscarUnidade($medico->id_unidade);
						unset($medDAO);
						#CRM médico
						$crm = $medico->CRM;
						#Situacao.
						$sit = $_POST['situacao'];
						#Pessoa.
						$cpf = $_POST['cpf'];
						$nome = $_POST['nome'];
						$nasc = $_POST['nascimento'];
						$sexo = $_POST['sexo'];
						#Endereco
						$lo = $_POST['endereco'];
						$ce = $_POST['cep'];
						$ba = $_POST['bairro'];
						$ci = $_POST['cidade'];
						$es = $_POST['estado'];
						$ende = new Endereco($lo,$ce,$ba,$ci,$es);
						$pa = $_POST['parecer_medico'];
						#Sintomas
						$fe = (isset($_POST['febre']))? 1 : 0;
						$dc = (isset($_POST['dor_cabeca']))? 1 : 0;
						$d  = (isset($_POST['dor_olhos']))? 1 : 0;
						$pe = (isset($_POST['perda_apetite']))? 1 : 0;
						$mp = (isset($_POST['mancha_pele']))? 1 : 0;
						$vt = (isset($_POST['vomito']))? 1 : 0;
						$to = (isset($_POST['tontura']))? 1 : 0;
						$ca = (isset($_POST['cansaco']))? 1 : 0;
						$mo = (isset($_POST['moleza']))? 1 : 0;
						$do = (isset($_POST['dor_ossos']))? 1 : 0;
						$sint = new Sintomas($fe,$dc,$d,$pe,$mp,$vt,$to,$ca,$mo,$do);

						$p = new Paciente($sit, $crm, $nome, $cpf,$nasc,$sexo,$ende,$sint,$pa);

						$DAO = new PacienteDAO();

						if($DAO->atualizarPaciente($p,$medico->id,$id_paciente)){
							$DAO->fechaBanco();
							header("Location: aviso-atualizacao.php");
						}else{
							$DAO->fechaBanco();
							header("Location: aviso-de-nao-atualizacao.php");	
						}
					}
					include "app/view/view-formulario-paciente-atualizar.php";
				}else{
					header("Location: logoff.php");
				}
      		}
      	}			
    }
?>