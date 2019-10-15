<!--TELA DE CONSULTA DE ITENS NO INVENTARIO,

	INSERIR EM :
			- na agenda na hora de cadastrar ou;
			- consulta de inventario. 
-->

<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Itens no Inventário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	
</head>
<body>

	<div class="container">

		<h3>Lista de Itens</h3><br>

		<table class="table table-sm">
		  <thead>
		    <tr>
		      <th scope="col">IdProduto</th>
		      <th scope="col">Descricao</th>
		      <th scope="col">Medida</th>
		      <th scope="col">Qntd.</th>
		      <th scope="col">Qntd.Mín.</th>
		      <th scope="col">Categoria</th>
		      <th scope="col">Disciplina</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		    
		    	<?php

		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `inventario` ";
		    		$buscar = mysqli_query($conexao, $sql);

		    		while ($array = mysqli_fetch_array($buscar)) {

		    			$IdProduto = $array['IdProduto'];
		    			$Descricao = $array['Descricao'];
		    			$Medida = $array['Medida'];
		    			$Qntd = $array['Qntd'];
		    			$QntdMinima = $array['QntdMinima'];
		    			$Categoria = $array['Categoria'];
		    			$Disciplina = $array['Disciplina'];
		    	?>
		    <tr>	
		      <td><?php echo $IdProduto ?></td>
		      <td><?php echo $Descricao ?></td>
		      <td><?php echo $Medida ?></td>
		      <td><?php echo $Qntd ?></td>
		      <td><?php echo $QntdMinima ?></td>
			  <td><?php echo $Categoria ?></td>
			  <td><?php echo $Disciplina ?></td>
			  <td><a class="btn btn-warning btn-sm"  style="color: #fff" href="editar_inventario.php?id= <?php echo $IdProduto ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a></td> <!--&nbsp:  espaço/ tag php ai dentro: passa id pelo link-->
			 </tr>

		  <?php } ?>
		  
		</table>


	</div>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>