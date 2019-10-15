<!--Inserir no Banco o formulário de CADASTRAR FUNCIONARIO-->


<?php

include 'conexao.php';

//variavel = numero contribuicao e o que esta dentro de name
//$variavel = $_POST['name'];
$CPF = $_POST['CPF'];
$Login = $_POST['Login'];
$Senha = $_POST['Senha'];
$RA = $_POST['RA'];
$Nome = $_POST['Nome'];
$Turma = $_POST['Turma'];
$Cargo = $_POST['Cargo'];
$RACoordenadorResponsavel = $_POST['RACoordenadorResponsavel'];


$sql = "INSERT INTO `funcionarios`(`CPF`, `Login`, `Senha`, `RA`, `Nome`, `Turma`, `Cargo`, `RACoordenadorResponsavel`) VALUES ($CPF, '$Login', '$Senha', $RA, '$Nome', '$Turma', '$Cargo', $RACoordenadorResponsavel)";

$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class='container' style="width: 500 px; margin-top: 20px">
	<h4>Funcionário cadastrado com sucesso!</h4>
	<div style="padding-top: 20px">
		<center>
			<a href="cadastrarFuncionario.php" role="button" class="btn btn-sm btn-primary">Cadastrar outro funcionário</a>
		</center>
	</div>
</div>