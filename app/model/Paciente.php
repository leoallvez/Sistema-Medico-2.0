<?php 
include "Sintomas.php";
include "Medico.php";

class Paciente extends Pessoa{
	private $data_atendimento;
	private $situacao;
	#objeto.
	private $sintomas;

	private $parecer_medico;

	public function __construct($situ = "", $crm, $nome, $cpf, $nasc, $sexo, Endereco $ende, Sintomas $sint, $pare){
		$this->data_atendimento = date("Y-m-d");
		$this->situacao = $situ;
		$this->crm_medico = $crm;
		parent::__construct($nome, $cpf, $nasc, $sexo, $ende);
		$this->sintomas = $sint;
		$this->parecer_medico = $pare;
	}

	public function get_data_atendimento(){

		return $this->data_atendimento;
	}

	public function get_situacao(){
		return $this->situacao;
	}

	public function get_crm(){
		return $this->crm_medico;
	}

	public function get_febre(){
		return $this->sintomas->get_febre();
	}

	public function get_dor_cabeca(){
		return $this->sintomas->get_dor_cabeca();
	}

	public function get_dor_olhos(){
		return $this->sintomas->get_dor_olhos();
	}

	public function get_perda_apetite(){
		return $this->sintomas->get_perda_apetite();
	}

	public function get_mancha(){
		return $this->sintomas->get_mancha();
	}

	public function get_vomito(){
		return $this->sintomas->get_vomito();
	}

	public function get_tontura(){
		return $this->sintomas->get_tontura();
	}

	public function get_cansaco(){
		return $this->sintomas->get_cansaco();
	}

	public function get_moleza(){
		return $this->sintomas->get_moleza();
	}

	public function get_dor_ossos(){
		return $this->sintomas->get_dor_ossos();
	}

	public function get_parecer_medico(){
		return $this->parecer_medico;
	}
}

?>