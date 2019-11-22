<?php

include 'conexao.php';

	$id = $_POST['id'];
	$Login = $_POST['Login'];
	$Senha = $_POST['Senha'];
	$RA = $_POST['RA'];
	$Nome = $_POST['Nome'];
	$Turma = $_POST['Turma'];
	$Cargo = $_POST['Cargo'];
	$RACoordenadorResponsavel = $_POST['RACoordenadorResponsavel'];


		$sql = "UPDATE `funcionarios` SET `Login`= '$Login' ,`Senha`= '$Senha',`RA`= $RA,`Nome`= '$Nome',`Turma`='$Turma',`Cargo`= '$Cargo', `RACoordenadorResponsavel` =  $RACoordenadorResponsavel WHERE IdFunc = $id";
		$atualizar = mysqli_query($conexao, $sql);
		

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
		if(mysqli_insert_id($conexao)){
			$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Atualizado com sucesso! </div>';
			header("Location: listar_funcionario.php");
		}else{
			$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao Atualizar </div>';
			header("Location: listar_funcionario.php");
		}


?>
