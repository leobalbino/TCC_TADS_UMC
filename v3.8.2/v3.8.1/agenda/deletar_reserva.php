<?php

include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM `agenda` WHERE IdAgenda = $id";
$deletar = mysqli_query($conexao, $sql) or die('Não foi possivel acessar Banco   
de Dados');
$result = mysqli_affected_rows();

if($result != 0){
    $_SESSION['msg'] = '<div class="alert alert-success"  role="alert"> Excluído com sucesso! </div>';
	header("Location: listar_reserva.php");
} else {
    $_SESSION['msg'] = '<div class="alert alert-success"  role="alert"> Erro ao excluir, tente novamente! </div>';
	header("Location: listar_reserva.php");
}

mysqli_close($conexao);


?>
