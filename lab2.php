<?php
include "app/model/Paciente.php";

#Situacao.
$sit = "Internado";
#CRM médico
$crm = "1234567";

$sint = new Sintomas(0,1,0,1,0,1,0,1,0,1);

#Atributos pessoa.
$nome = "Maria de Ludes";
$cpf = "37090548856";
$nasc = "05/09/1983";
$sexo = "F";

#Atributos endereco
$lo = "Rua Jose Campos Barretos, 176";
$ce = "02952-230";
$ba = "Vila Renato";
$ci = "Sao Paulo";
$es = "SP";


$ende = new Endereco($lo,$ce,$ba,$ci,$es);

$p = new Paciente($sit, $crm, $nome, $cpf,$nasc,$sexo,$ende,$sint);

echo "Data da ultima atualizacao: ".$p->get_data_atendimento()."<br>";
echo "Situacao: ".$p->get_situacao()."<br>";
echo "CRM: ".$p->get_crm()."<br>";
echo "Nome: ".$p->get_nome()."<br>";
echo "CPF: ".$p->get_cpf()."<br>";
echo "Nascimento: ".$p->get_nascimento()."<br>";
echo "Sexo: ".$p->get_sexo()."<br>";
echo "Logradouro: ".$p->get_logradouro()."<br>";
echo "Cep: ".$p->get_cep()."<br>";
echo "Bairro: ".$p->get_bairro()."<br>";
echo "Cidade: ".$p->get_cidade()."<br>";
echo "Estado: ".$p->get_estado()."<br>";
echo "Febre: ".$p->get_febre()."<br>";
echo "Dor de cabeca: ".$p->get_dor_cabeca()."<br>";
echo "Dor nos olhos: ".$p->get_dor_olhos()."<br>";
echo "Perda de apetite: ".$p->get_perda_apetite()."<br>";
echo "Mancha no corpo: ".$p->get_mancha()."<br>";
echo "Vomito: ".$p->get_vomito()."<br>";
echo "Tontura: ".$p->get_tontura()."<br>";
echo "Cansaco: ".$p->get_cansaco()."<br>";
echo "Moleza: ".$p->get_moleza()."<br>";
echo "Dor nos ossos: ".$p->get_dor_ossos()."<br>";






	


?>