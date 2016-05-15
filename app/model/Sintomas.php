<?php 

class Sintomas{
	private $febre;
	private $dor_cabeca;
	private $dor_olhos;
	private $perda_apetite;
	private $mancha;
	private $vomito;
	private $tontura;
	private $cansaco;
	private $moleza;
	private $dor_ossos;

	public function __construct($fe = 0, $ca = 0, $ol = 0, $pe = 0, $ma = 0, $vo = 0, $to = 0, $can = 0, $mo = 0, $os = 0){
		$this->febre = $fe;
		$this->dor_cabeca = $ca;
		$this->dor_olhos = $ol;
		$this->perda_apetite = $pe;
		$this->mancha = $ma;
		$this->vomito = $vo;
		$this->tontura = $to;
		$this->cansaco = $can;
		$this->moleza = $mo;
		$this->dor_ossos = $os;
	}

	public function get_febre(){
		return $this->febre;
	}

	public function set_febre($febre = 0){
		$this->febre = $febre;
	}

	public function get_dor_cabeca(){
		return $this->dor_cabeca;
	}

	public function set_dor_cabeca($dor_cabeca = 0){
		$this->dor_cabeca = $dor_cabeca;
	}

	public function get_dor_olhos(){
		return $this->dor_olhos;
	}

	public function set_dor_olhos($dor_olhos = 0){
		$this->dor_olhos = $dor_olhos;
	}

	public function get_perda_apetite(){
		return $this->perda_apetite;
	}

	public function set_perda_apetite($perda_apetite = 0){
		$this->perda_apetite = $perda_apetite;
	}

	public function get_mancha(){
		return $this->mancha;
	}

	public function set_mancha($mancha = 0){
		$this->mancha = $mancha;
	}

	public function get_vomito(){
		return $this->vomito;
	}

	public function set_vomito($vomito = 0){
		$this->vomito = $vomito;
	}

	public function get_tontura(){
		return $this->tontura;
	}

	public function set_tontura($tontura = 0){
		$this->tontura = $tontura;
	}

	public function get_cansaco(){
		return $this->cansaco;
	}

	public function set_cansaco($cansaco = 0){
		$this->cansaco = $cansaco;
	}

	public function get_moleza($moleza = 0){
		return $this->moleza;
	}

	public function get_dor_ossos(){
		return $this->dor_ossos;
	}

	public function set_dor_ossos(){
		$this->dor_ossos;
	}
}

?>