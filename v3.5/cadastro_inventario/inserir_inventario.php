<!--Inserir no Banco o formulário de CADASTRAR INVENTARIO-->


<?php

include 'conexao.php';

//variavel = numero contribuicao e o que esta dentro de name
//$variavel = $_POST['name'];

$Descricao = $_POST['Descricao'];
$Qntd = $_POST['Qntd'];
$Medida = $_POST['Medida'];
$QntdMinima = $_POST['QntdMinima'];
$Categoria = $_POST['Categoria'];
$Disciplina = $_POST['Disciplina'];

$sql = "INSERT INTO `inventario`(`Descricao`, `Qntd`, `Medida`, `QntdMinima`, `Categoria`, `Disciplina`) VALUES ('$Descricao', $Qntd, '$Medida', $QntdMinima, '$Categoria', '$Disciplina')";

$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->


<div id="tamanhoContainer" class="container" >
	<div id="novo" class="container">
		<a href="listar_inventario.php" ><i class="fas fa-angle-double-left"></i></a>
	</div>
	<h4><i class="far fa-check-circle"></i>  Ítem cadastrado com sucesso!</h4>
	<div style="padding-top: 20px; padding-bottom: 30px;">
		<center>
			<a href="cadastrarInventario.php" role="button" class="btn btn-sm btn-primary">Cadastrar outro ítem</a>
		</center>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>