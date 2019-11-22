<!--Inserir no Banco o formulário de CADASTRAR VISTANTE

Associar chave RAcoord ao formulario-->


<?php
session_start();
include 'conexao.php';

	//variavel = numero contribuicao e o que esta dentro de name
	//$variavel = $_POST['name'];
	//$IdVisit = $_POST['IdVisit'];
	$CPFVisitante = $_POST['CPFVisitante'];
	$NomeVisitante = $_POST['NomeVisitante'];
	$EnderecoVisitante = $_POST['EnderecoVisitante'];
	$InstituicaoVisitante = $_POST['InstituicaoVisitante'];
	$TelefoneVisitante = $_POST['TelefoneVisitante'];
	$QntAlunosVisita = $_POST['QntAlunosVisita'];



////////////////VALIDAÇÕES ///////////////////////////////

$erro = false;

//****CPF existente	

$busca = "SELECT `IdVisit` FROM `visitante` WHERE `CPFVisitante`= $CPFVisitante ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse CPF! </div>';
	header("Location: cadastrarVisitante.php");
} //fim if validações (CPF existente)


//****Nome existente	

$busca = "SELECT `IdVisit` FROM `visitante` WHERE `NomeVisitante`= $NomeVisitante ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse Nome! </div>';
	header("Location: cadastrarVisitante.php");
} //fim if validações (Nome existente)


//****Endereço existente	

$busca = "SELECT `IdVisit` FROM `visitante` WHERE `EnderecoVisitante`= $EnderecoVisitante ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse Endereço! </div>';
	header("Location: cadastrarVisitante.php");
} //fim if validações (Endereço existente)



//****Instituicao existente	

$busca = "SELECT `IdVisit` FROM `visitante` WHERE `InstituicaoVisitante`= $InstituicaoVisitante ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com dessa Instituição! </div>';
	header("Location: cadastrarVisitante.php");
} //fim if validações (Instituicao existente)

//****TelefoneVisitante existente	

$busca = "SELECT `IdVisit` FROM `visitante` WHERE `TelefoneVisitante`= $TelefoneVisitante ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse Telefone! </div>';
	header("Location: cadastrarVisitante.php");
} //fim if validações (TelefoneVisitante existente)

////////////////VALIDAÇÕES ///////////////////////////////


if(!$erro){

	$sql = "INSERT INTO `visitante`(`CPFVisitante`, `NomeVisitante`, `EnderecoVisitante`, `InstituicaoVisitante`, `TelefoneVisitante`, `QntAlunosVisita`) VALUES ($CPFVisitante, '$NomeVisitante', '$EnderecoVisitante', '$InstituicaoVisitante', $TelefoneVisitante, $QntAlunosVisita)";

	$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conexao)){
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Cadastrado com sucesso </div>';
		header("Location: listar_visitante.php");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar </div>';
		header("Location: listar_visitante.php");
	}
}//fim if de cadastro
?>

