<?php 
include "app/model/Medico.php";
include "app/model/Sintomas.php";


$lo = "Rua Jose Campos Barretos, 176";
$ce = "02952-230";
$ba = "Vila Renato";
$es = "SP";
$ci = "Sao Paulo";

$ende = new Endereco($lo,$ce,$ba,$es,$ci);

/**echo "Rua: ".$ende->get_logradouro()."<br>";
echo "Cep: ".$ende->get_cep()."<br>";
echo "Bairro: ".$ende->get_bairro()."<br>";
echo "Estado: ".$ende->get_estado()."<br>";
echo "Cidade: ".$ende->get_cidade()."<br>";*/

$nome = "Maria de Ludes";
$cpf = "37090548856";
$nascimento = "05/09/1983";
$sexo = "F";


#$people = new Pessoa($nome, $cpf, $nascimento, $sexo, $ende);
/**$
echo "Nome: ".$people->get_nome()."<br>";
echo "CPF: ".$people->get_cpf()."<br>";
echo "Nascimento: ".$people->get_nascimento()."<br>";
echo "Sexo: ".$people->get_sexo()."<br>";


echo "Rua: ".$people->get_logradouro()."<br>";
echo "Cep: ".$people->get_cep()."<br>";
echo "Bairro: ".$people->get_bairro()."<br>";
echo "Estado: ".$people->get_estado()."<br>";
echo "Cidade: ".$people->get_cidade()."<br>";*/

#$oS = new Sintomas(0,1,0,1,0,1,0,1,0,1);

/*echo "Febre: ".$oS->get_febre()."<br>";
echo "Dor de cabeca: ".$oS->get_dor_cabeca()."<br>";
echo "Dor nos olhos: ".$oS->get_dor_olhos()."<br>";
echo "Perda de apetite: ".$oS->get_perda_apetite()."<br>";
echo "Mancha no corpo: ".$oS->get_mancha()."<br>";
echo "Vomito: ".$oS->get_vomito()."<br>";
echo "Tontura: ".$oS->get_tontura()."<br>";
echo "Cansaco: ".$oS->get_cansaco()."<br>";
echo "Moleza: ".$oS->get_moleza()."<br>";
echo "Dor nos ossos: ".$oS->get_dor_ossos()."<br>";*/
$crm = "1234567";
$esp = "Clinico Geral";
$sen = "1234";
$ema = "leoallvez@hotmail.com";

$medico = new Medico($crm,$esp, $sen, $ema,$nome,$cpf,$nascimento,$sexo,$ende);

echo "CRM: ".$medico->get_crm()."<br>";
echo "Especializacao: ".$medico->get_especialidade()."<br>";
echo "Senha: ".$medico->get_senha()."<br>";
echo "E-mail: ".$medico->get_email()."<br>";

echo "Nome: ".$medico->get_nome()."<br>";
echo "CPF: ".$medico->get_cpf()."<br>";
echo "Nascimento: ".$medico->get_nascimento()."<br>";
echo "Sexo: ".$medico->get_sexo()."<br>";
echo "Rua: ".$medico->get_logradouro()."<br>";
echo "Cep: ".$medico->get_cep()."<br>";
echo "Bairro: ".$medico->get_bairro()."<br>";
echo "Estado: ".$medico->get_estado()."<br>";
echo "Cidade: ".$medico->get_cidade()."<br>";










?>