<?php

include 'conexao.php';

	$id = $_GET['id'];
	//$IdProduto = $_POST['IdProduto'];
	$NomeEvento = $_POST['NomeEvento'];
	$start = $_POST['start'];
	//$end = $_POST['end'];
	$CorReserva = $_POST['CorReserva'];
	$Instituicao = $_POST['Instituicao'];

$sql = "UPDATE `agenda` SET `NomeEvento`= '$NomeEvento' ,`start`= '$start', `CorReserva`= '$CorReserva',`Instituicao`='$Instituicao' WHERE IdAgenda= $id";
$atualizar = mysqli_query($conexao, $sql);


//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
if(mysqli_insert_id($conexao)){
	$_SESSION['msg'] = '<div class="alert alert-success"  role="alert"> Atualizado com sucesso! </div>';
	header("Location: listar_reserva.php");
}else{
	$_SESSION['msg'] = '<div class="alert alert-danger"  role="alert"> Erro ao atualizar </div>';
	header("Location: listar_reserva.php");
}

?>
