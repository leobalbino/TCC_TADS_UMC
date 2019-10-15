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

<center>
<div class='container' style="width: 500 px; margin-top: 20px">
	<h4>Ítem cadastrado com sucesso!</h4>
	<div style="padding-top: 20px">
		<center>
			<a href="cadastrarInventario.php" role="button" class="btn btn-sm btn-primary">Cadastrar outro ítem</a>
		</center>
	</div>
</div>
</center>