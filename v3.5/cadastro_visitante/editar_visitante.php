<?php

include 'conexao.php';

$cpf= $_GET['cpf'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Cadastro de Vistantes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	
</head>
<body>

	 <?php

    session_start();

//SESSION: Pega Login da sessão, sem GET e nem o POST
      $Login = $_SESSION['Login'];
//Se não existir (isset) quando não há login
      if (!isset($_SESSION['Login'])) {
        header('Location: login.php');
      }

      include 'conexao.php';

      $sql = "SELECT `Cargo` FROM `funcionarios` WHERE `Login` = '$Login' ";
      $buscar = mysqli_query($conexao, $sql);
      $array = mysqli_fetch_array($buscar);
      $Cargo = $array['Cargo'];

    ?>
	<div class="container" id="tamanhoContainer">

		<?php
           if ($Cargo == 3)  {
        ?>
		<a id="novo" href="listar_visitante.php" ><i class="fas fa-angle-double-left"></i></a>
		<h4>Editar Vistante</h4>

		<form action="atualizar_visitante.php" method="post" style="margin-top: 20px">
			<?php

			$sql = "SELECT * FROM `visitante` WHERE CPFVisitante = $cpf";
			$buscar = mysqli_query($conexao, $sql);

			while ($array = mysqli_fetch_array($buscar)) {
				
				$CPFVisitante = $array['CPFVisitante'];
		    	$NomeVisitante = $array['NomeVisitante'];
		    	$EnderecoVisitante = $array['EnderecoVisitante'];
		    	$InstituicaoVisitante = $array['InstituicaoVisitante'];
		    	$TelefoneVisitante = $array['TelefoneVisitante'];
		    	$QntAlunosVisita = $array['QntAlunosVisita'];

			?>

			<div class="form-group">
	    		<label>CPF</label>
	    		<input type="number" class="form-control" name="CPFVisitante" value="<?php echo $CPFVisitante ?>"   disabled="">	
	    		<input type="number" class="form-control" name="cpf" value="<?php echo $cpf ?>" >	
  			</div>

	 		<div class="form-group">
	    		<label>Nome </label>
	    		<input type="text" class="form-control" name="Nome Vistante" value="<?php echo $NomeVisitante ?>">	
  			</div>

  			<div class="form-group">
	    		<label>Instituição Visitante</label>
	    		<input type="text" class="form-control" name="InstituicaoVisitante"  value="<?php echo $InstituicaoVisitante ?>">	
  			</div>

  			<div class="form-group">
	    		<label>Endereço do Visitante</label>
	    		<input type="text" class="form-control" name="EnderecoVisitante"  value="<?php echo $EnderecoVisitante ?>">	
  			</div>

			<div class="row">
				<div class="col-sm-6">
	    			<label>Telefone do Visitante</label>
	    			<input type="number" class="form-control" name="TelefoneVisitante" value="<?php echo $TelefoneVisitante ?>" >	
	    		</div>

	    		<div class="col-sm-6">
	    			<label>Qnt de Alunos</label>
	    			<input type="number" class="form-control" name="QntAlunosVisita"  value="<?php echo $QntAlunosVisita ?>">
	    			<small id="Turmaobs" class="form-text text-muted">Quantidade de Alunos que irão visitar.</small>
  				</div>
  			</div>
		  	
			<div id="botao">
				<button type="submit" class="btn btn-success " >Atualizar</button>
			</div>

		<?php } ?> <!--fim while-->

		</form>	
	<?php } else {

		header('Location: ../erro403.php');

	}?> <!--Fim permissão-->
	</div><!--Fecha container-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

