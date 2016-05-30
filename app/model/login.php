<?php

	session_start(); 

	if(!isset($_SESSION['acesso'])){ #se sessao não instaciada
		if(count($_POST) == 2 && isset($_POST['login'])){
			$medDAO = new MedicoDAO();
			if($medDAO->login($_POST['login'],$_POST['senha'])){
				$_SESSION['acesso'] = $medDAO->login($_POST['login'],$_POST['senha']);
				#$medDAO->fechaBanco();
				unset($_POST);
				header("Location: index.php");
			}else{
				echo "<script> alert('Senha ou login invalidos!'); </script>";
				unset($_POST);
			}	
		}
		include 'app/view/view-login.php';
		die();
	}
?>