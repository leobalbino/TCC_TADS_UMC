<?php

session_start();
include 'conexao.php';



$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if($btnLogin) {
	$Login = filter_input(INPUT_POST, 'Login', FILTER_SANITIZE_STRING);
	$Senha = filter_input(INPUT_POST, 'Senha', FILTER_SANITIZE_STRING);
	//senha ou login ivalidos
	if((!empty($Login)) AND (!empty($Senha))){
		//Gerar senha criptografada
		//echo password_hash($senha, PASSWORD_DEFAULT);

		//Pesquisar Login no BD
		$result_login = "SELECT `CPF`, `Login`, `Senha`, `RA`, `Nome`, `Turma`, `Cargo`, `RACoordenadorResponsavel` FROM `funcionarios`  WHERE `Login`='$Login' LIMIT 1";
		$resultado_login = mysqli_query($conexao, $result_login);
		if($resultado_login){
			//ler resultado e atribuir a variavel
			$row_login = mysqli_fetch_assoc ($resultado_login);
			//comparar as senhas digitado e do bd
			if(password_verify($Senha, $row_login['Senha'])){
				$_SESSION['CPF'] = $row_login['CPF'];
				$_SESSION['Login'] = $row_login['Login'];
				$_SESSION['Senha'] = $row_login['Senha'];
				$_SESSION['RA'] = $row_login['RA'];
				$_SESSION['Nome'] = $row_login['Nome'];
				$_SESSION['Cargo'] = $row_login['Cargo'];
				$_SESSION['RACoordenadorResponsavel'] = $row_login['RACoordenadorResponsavel'];
			
				header("Location: perfil.php"); 
				//Mudar para a pagina de cada entidade *****
			} else { 
				//se a senha nao tiver igual ao do bd redireciona para o login
				$_SESSION['msgErroLogin'] = "Login ou senha invalido!";
				header("Location: login.php");
			}
		}
	} else {
		$_SESSION['msgErroLogin'] = "Login ou senha invalido!"; 
		header("Location: login.php");

	}
	
} else { //SE NAO CLICOU NO BOTAO
	//SESSION VARIAVEL GLOBAL P SALVAR O VALOR DO ERRO
	$_SESSION['msgErroLogin'] = "Você precisa Logar Primeiro"; //tentar entrar na pagina restrita do usuario sem logar
	header("Location: login.php");
} 