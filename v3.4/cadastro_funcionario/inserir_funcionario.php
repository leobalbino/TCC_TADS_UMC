<!--Inserir no Banco o formulário de CADASTRAR FUNCIONARIO-->


<?php

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


$sql = "INSERT INTO `funcionarios`( `Login`, `Senha`, `RA`, `Nome`, `Turma`, `Cargo`, `RACoordenadorResponsavel`) VALUES ('$Login', sha1('$Senha'), $RA, '$Nome', '$Turma', $Cargo, $RACoordenadorResponsavel)";

$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->


<div id="tamanhoContainer" class="container" >
	<div id="novo" class="container">
		<a href="listar_funcionario.php" ><i class="fas fa-angle-double-left"></i></a>
	</div>
	<h4><i class="far fa-check-circle"></i>  Funcionário cadastrado com sucesso!</h4>
	<div style="padding-top: 20px; padding-bottom: 30px;">
		<center>
			<a href="cadastrarFuncionario.php" role="button" class="btn btn-sm btn-primary">Cadastrar outro</a>
		</center>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>