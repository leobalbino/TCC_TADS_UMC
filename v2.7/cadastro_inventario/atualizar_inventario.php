<?php

	$id = $_POST['id'];
	//$IdProduto = $_POST['IdProduto'];
	$Descricao = $_POST['Descricao'];
	$Medida = $_POST['Medida'];
	$Qntd = $_POST['Qntd'];
	$QntdMinima = $_POST['QntdMinima'];
	$Categoria = $_POST['Categoria'];
	$Disciplina = $_POST['Disciplina'];


	echo $sql = "UPDATE `inventario` SET `Descricao`= '$Descricao' ,`Qntd`= $Qntd,`Medida`='$Medida',`QntdMinima`=$QntdMinima,`Categoria`='$Categoria',`Disciplina`= '$Disciplina' WHERE IdProduto = $id";

?>