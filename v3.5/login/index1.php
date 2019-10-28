<?php

include 'conexao.php';
include '../cadastro_funcionario/script/password.php';

$Login = $_POST['Login'];
$SenhaDigitada = $_POST['Senha'];

$sql = "SELECT `IdFunc`, `Senha` FROM `funcionarios` WHERE `Login` = '$Login' ";
$buscar = mysqli_query($conexao, $sql);

$total = mysqli_num_rows($buscar); //Irá analisar a quantidade de linhas que tem no CPF, se ele não tiver associado a nenhum Login então não irá vir linha nenhuma.

while ($array = mysqli_fetch_array($buscar)) {
	
	$Senha = $array['Senha'];

	$senhadecodificada = sha1($SenhaDigitada);

	if ($total > 0) {
		
		if($senhadecodificada == $Senha){

			session_start();
			$_SESSION['Login'] = $Login;
			
			header('Location: menu.php'); //Pagina de perfil/menu

		} else{

			header('Location: erro402.php'); //erro 402 login invalido

		}

	} else {

		header('Location: erro404.php'); // erro 404 nao cadastrado
	}

} //fim while

?>