<?php 
	include "app/model/PacienteDAO.php";
	Class Controller{

		public function cadastro(){
			$situacao = "Passou pela Triagem";
			$tipo_unidade = "Posto de saude";

			if(count($_POST) > 0){
				#CRM médico
				$crm = "12345";
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
				#function __construct($situ = "", $crm, $nome, $cpf, $nasc, $sexo, Endereco $ende, Sintomas $sint, $pare)

				$DAO = new PacienteDAO();

				if($DAO->gravarPaciente($p,1)){
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

       		$pacientes =  $DAO->listarQuantPacientesPorEstado($tipo_unidade, $situacao);   

        	include "app/view/view-relatorio.php";
      	}  			
    }
?>