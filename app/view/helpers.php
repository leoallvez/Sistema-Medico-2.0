<?php

	function traduzDataParaBanco($data){
		if($data == ""){
			return "";
		}
		#Separa uma string em um array apos encontrar certos elementos.
		$dados = explode("/",$data); 
		if(count($dados) != 3){
			return $data;
		}
		$data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
		return $data_mysql;
	
	}

	function traduzDataParaExibir($data){
		if($data == "" || $data == "0000-00-00"){
			return "";
		}
		$dados = explode("-",$data);
		if(count($dados) != 3){
			return $data;
		}
		$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
		return $data_exibir;
	}

	function temPost(){
		if(count($_POST) > 0){
			return true;
		}
		return false;
	}

	function validarData($data){
		#Expressão regular
		$padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
		#preg_match(): Busca uma string ou "expressão regular" em outra outra string;
		$resultado = preg_match($padrao, $data);

		if(!$resultado){
			return false;
		}

		$dados = explode('/',$data);

		$dia = $dados[0];
		$mes = $dados[1];
		$ano = $dados[2];
		#a função check date valida a data.
		$resultado = checkdate($mes,$dia,$ano);

		return $resultado;
	}

	function traduzEstado($sigla){
		switch ($sigla){
			case "AC": return "Acre"; break;
    		case "AL": return "Alagoas"; break;
    		case "AP": return "Amapá"; break;
    		case "AM": return "Amazonas"; break;
            case "BA": return "Bahia"; break;
		    case "CE": return "Ceará"; break;
		    case "DF": return "Distrito Federal"; break;
		    case "ES": return "Espírito Santo"; break;
		    case "GO": return "Goiás"; break;
		    case "MA": return "Maranhão"; break;
		    case "MT": return "Mato Grosso"; break;
		    case "MS": return "Mato Grosso do Sul"; break;
		    case "MG": return "Minas Gerais"; break;
		    case "PA": return "Pará"; break;
		    case "PB": return "Paraíba"; break;
		    case "PR": return "Paraná"; break;
		    case "PE": return "Pernambuco"; break;
		    case "PI": return "Piauí"; break;
		    case "RJ": return "Rio de Janeiro"; break;
		    case "RN": return "Rio Grande do Norte"; break;
		    case "RS": return "Rio Grande do Sul"; break;
		    case "RO": return "Rondônia"; break;
		    case "RR": return "Roraima"; break;
		    case "SC": return "Santa Catarina"; break;
		    case "SP": return "São Paulo"; break;
		    case "SE": return "Sergipe"; break;
		    case "TO": return "Tocantins"; break;
    	}
	}

?>