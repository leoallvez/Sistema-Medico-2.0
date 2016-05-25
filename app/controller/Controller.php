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
				$sint = new Sintomas(1,1,1,1,1,1,0,1,1,1);

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

	}



?>