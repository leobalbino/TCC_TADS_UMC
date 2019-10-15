<!--Inserir no Banco o formulário de CADASTRAR VISTANTE-->


<?php

include 'conexao.php';

//variavel = numero contribuicao e o que esta dentro de name
//$variavel = $_POST['name'];
$CPFVisitante = $_POST['CPFVisitante'];
$RACoordenadorUMC = $_POST['RACoordenadorUMC'];
$NomeVisitante = $_POST['NomeVisitante'];
$EnderecoVisitante = $_POST['EnderecoVisitante'];
$InstituicaoVisitante = $_POST['InstituicaoVisitante'];
$TelefoneVisitante = $_POST['TelefoneVisitante'];
$QntAlunosVisita = $_POST['QntAlunosVisita'];

$sql = "INSERT INTO `visitante`(`CPFVisitante`, `RACoordenadorUMC`, `NomeVisitante`, `EnderecoVisitante`, `InstituicaoVisitante`, `TelefoneVisitante`, `QntAlunosVisita`) VALUES ($CPFVisitante, $RACoordenadorUMC, '$NomeVisitante', '$EnderecoVisitante', '$InstituicaoVisitante', $TelefoneVisitante, $QntAlunosVisita)";

$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class='container' style="width: 500 px; margin-top: 20px">
	<h4>Funcionário cadastrado com sucesso!</h4>
	<div style="padding-top: 20px">
		<center>
			<a href="cadastrarVisitante.php" role="button" class="btn btn-sm btn-primary">Cadastrar outro visitante</a>
		</center>
	</div>
</div>