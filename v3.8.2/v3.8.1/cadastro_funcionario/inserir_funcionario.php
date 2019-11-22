<!--Inserir no Banco o formulário de CADASTRAR FUNCIONARIO-->


<?php
session_start();
include 'conexao.php';
include 'script/password.php';


	//variavel = numero contribuicao e o que esta dentro de name
	//$variavel = $_POST['name'];

	$Login = $_POST['Login'];
	$Senha = $_POST['Senha'];
	$RA = $_POST['RA'];
	$Nome = $_POST['Nome'];
	$Turma = $_POST['Turma'];
	$Cargo = $_POST['Cargo'];
	$RACoordenadorResponsavel = $_POST['RACoordenadorResponsavel'];



////////////////VALIDAÇÕES ///////////////////////////////

$erro = false;

//****login existente

$busca = "SELECT `IdFunc` FROM `funcionarios` WHERE `Login`= $Login ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse Login! </div>';
	header("Location: cadastrarFuncionario.php");
} //fim if validações (login existente)


//*****RA existente

$busca = "SELECT `IdFunc` FROM `funcionarios` WHERE `RA`= $RA ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse RA!! </div>';
	header("Location: cadastrarFuncionario.php");
} //fim if validações (RA existente)

//*****Nome existente

$busca = "SELECT `IdFunc` FROM `funcionarios` WHERE `Nome`= $Nome ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse Nome! </div>';
	header("Location: cadastrarFuncionario.php");
} //fim if validações (Nome existente)

////////////////VALIDAÇÕES ///////////////////////////////

if(!$erro){



	$sql = "INSERT INTO `funcionarios`( `Login`, `Senha`, `RA`, `Nome`, `Turma`, `Cargo`, `RACoordenadorResponsavel`) VALUES ('$Login', sha1('$Senha'), $RA, '$Nome', '$Turma', '$Cargo', $RACoordenadorResponsavel)";

		$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida
	

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conexao)){
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Cadastrado com sucesso! </div>';
		header("Location: listar_funcionario.php");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar </div>';
		header("Location: listar_funcionario.php");
	}

} //fim if de cadastro
?>



