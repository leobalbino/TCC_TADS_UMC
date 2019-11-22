<!--PAGINA DE INSERIR TURMA E DISCIPLINAS,
 -->

<?php
	session_start();
	include 'conexao.php';
	//$IdDisciplina = $_POST['IdDisciplina'];
	$DescricaoTurma = $_POST['DescricaoTurma'];
	$DescricaoDisciplina = $_POST['DescricaoDisciplina'];

	$sql = "INSERT INTO `disciplina` (`DescricaoTurma`, `DescricaoDisciplina`) VALUES ('$DescricaoTurma', '$DescricaoDisciplina')";
	$inserir = mysqli_query($conexao, $sql);

//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
if(mysqli_insert_id($conexao)){
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Cadastrado com sucesso </div>';
	header("Location: listar_turma.php");
}else{
	$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar </div>';
	header("Location: listar_turma.php");
}

?>

