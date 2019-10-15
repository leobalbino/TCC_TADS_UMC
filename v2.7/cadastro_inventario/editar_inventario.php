<?php

include 'conexao.php';

$id= $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Inventário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	
</head>
<body>
	<div class="container" id="tamanhoContainer">
		<h4>Editar Ítem de Inventário</h4>

		<form action="atualizar_inventario.php" method="post" style="margin-top: 20px">
			<?php

			$sql = "SELECT * FROM `inventario` WHERE IdProduto = $id";
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

			<div class="form-group">
	    		<label>Id do Produto</label>
	    		<input type="number" class="form-control" name="IdProduto" value="<?php echo $IdProduto ?>"   disabled="">	
	    		<input type="number" class="form-control" name="id" value="<?php echo $id ?>" >	
  			</div>

	 		<div class="form-group">
	    		<label>Descrição</label>
	    		<input type="text" class="form-control" name="Descricao" value="<?php echo $Descricao ?>">	
  			</div>

				<div class="row">
					<div class="col-sm-6">
	    				<label>Quantidade</label>
	    				<input type="number" class="form-control" name="Qntd" value="<?php echo $Qntd ?>" >	
	    			</div>

	    			<div class="col-sm-6">
	    				<label>Quantidade Mínima</label>
	    				<input type="number" class="form-control" name="QntdMinima"  value="<?php echo $QntdMinima ?>">
	    				<small id="Turmaobs" class="form-text text-muted">Quando atingir esse valor, o sistema o avisará de abastecer o estoque.</small>
  					</div>
  				</div>

		  		<div class="row">
					<div class="col-sm-6">
		  				<label>Unidade de Medida</label>
							<select class="form-control" name="Medida" >
				      			<option>UN</option>
				      			<option>CX</option>
							</select>
		  	 		</div>

		  	 		<div class="col-sm-6">
		  	 			<label>Categoria</label>
							<select class="form-control" name="Categoria"  >
						      <option>Português</option>
						      <option>Matemática</option>
						      <option>História</option>
						      <option>Geografia</option>
						      <option>Ciências</option>
						      <option>Artes</option>
						      <option>Consumíveis</option>
						      <option>Móveis</option>
							</select>
		  			</div>
		  		</div>	

			<div class="form-group">
	    		<label>Disciplina</label>
	    		<input type="text" class="form-control" name="Disciplina"  value="<?php echo $Disciplina ?>">	
  			</div>
		  	
			<div id="botao">
				<button class="btn btn-danger" >Voltar</button>
				<button type="submit" class="btn btn-success " >Atualizar</button>
			</div>
		<?php } ?> <!--fim while-->
		</form>	
	</div><!--Fecha container-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

