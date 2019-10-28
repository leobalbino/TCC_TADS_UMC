<?php

include 'conexao.php';

	$id = $_POST['id'];
	//$IdProduto = $_POST['IdProduto'];
	$Descricao = $_POST['Descricao'];
	$Medida = $_POST['Medida'];
	$Qntd = $_POST['Qntd'];
	$QntdMinima = $_POST['QntdMinima'];
	$Categoria = $_POST['Categoria'];
	$Disciplina = $_POST['Disciplina'];

	//print_r($_POST);


	$sql = "UPDATE `inventario` SET `Descricao`= '$Descricao' ,`Qntd`= $Qntd,`Medida`='$Medida',`QntdMinima`=$QntdMinima,`Categoria`='$Categoria',`Disciplina`= '$Disciplina' WHERE IdProduto = $id ";
	$atualizar = mysqli_query($conexao, $sql);

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->

<div id="tamanhoContainer" class="container" >
	<div id="novo" class="container">
		<a href="listar_inventario.php" ><i class="fas fa-angle-double-left"></i></a>
	</div>

	<center>
		<h4><i class="far fa-check-circle"></i></h4>
	</center>
		<center>
			<h4>Alterado com sucesso!</h4>	
	</center>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>