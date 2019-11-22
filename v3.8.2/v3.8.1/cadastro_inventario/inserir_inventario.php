<!--Inserir no Banco o formulário de CADASTRAR INVENTARIO-->


<?php
session_start();
include 'conexao.php';

	//variavel = numero contribuicao e o que esta dentro de name
	//$variavel = $_POST['name'];

	$Descricao = $_POST['Descricao'];
	$Qntd = $_POST['Qntd'];
	$Medida = $_POST['Medida'];
	$QntdMinima = $_POST['QntdMinima'];
	$Categoria = $_POST['Categoria'];

////////////////VALIDAÇÕES ///////////////////////////////

$erro = false;

//****Descricao existente

$busca = "SELECT `	IdProduto` FROM `inventario` WHERE `Descricao`= $Descricao ";
$resultado = mysqli_query($conexao, $busca);
if(($resultado) AND ($resultado->num_rows != 0 )) {

	$erro = true;
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Já existe cadastro com esse Produto! </div>';
	header("Location: cadastrarInventario.php");
} //fim if validações (Descricao existente)

////////////////VALIDAÇÕES ///////////////////////////////


if(!$erro){

	$sql = "INSERT INTO `inventario`(`Descricao`, `Qntd`, `Medida`, `QntdMinima`, `Categoria`) VALUES ('$Descricao', $Qntd, '$Medida', $QntdMinima, '$Categoria')";

	$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conexao)){
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Cadastrado com sucesso! </div>';
		header("Location: listar_inventario.php");
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar </div>';
		header("Location: listar_inventario.php");
	}
}//fim if de cadastro

?>

