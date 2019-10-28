<!--PAGINA PRINCIPLA DE CADASTRAR VISITANTE EXTERNO, 
	-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Formulário de Cadastro de Visitante Externo</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
		<a href="listar_visitante.php" ><i class="fas fa-angle-double-left"></i></a>
		<h4>Cadastro de Visitante</h4>

		<form action="inserir_visitante.php" method="post" style="margin-top: 20px; ">
	 		<div class="form-group">
	    		<label>CPF</label>  		
	    		<input type="number" class="form-control" name="CPFVisitante" placeholder="Insira CPF" maxlength="11" size="11" min="1" step="1" required>	
	    		<small id="Turmaobs" class="form-text text-muted">Somente números.</small>
  			</div>	

  			<div class="form-group">
	    		<label>Nome Visitante</label>
	    		<input type="text" class="form-control" name="NomeVisitante"  placeholder="Inisira o nome" required>
  			</div>

		  	<div class="form-group">
			    <label>Endereço</label>
			    <input type="text" class="form-control" name="EnderecoVisitante" placeholder="Endereço da Escola " required>
			    <small id="Turmaobs" class="form-text text-muted">R. xxxx, numero - Bairro</small>
		  	</div>

		  	<div class="form-group">
			    <label>Nome Instituição</label>
			    <input type="text" class="form-control" name="InstituicaoVisitante" placeholder="Nome da Instituição" required>
		  	</div>

		  	<div class="row">
				<div class="col-sm-6">
			    	<label>Telefone</label>
			    	<input type="number" class="form-control" name="TelefoneVisitante" placeholder="Sem DD. Somente números" maxlength="9" size="9" min="1" step="1" required>
				</div>
		  	
		  		<div class="col-sm-6">
			    	<label>Quantidade de Alunos</label>
			    	<input type="number" class="form-control" name="QntAlunosVisita" placeholder="Digite a quantidade de alunos que irá visitar" min="1" step="1" required>
		  		</div>
		  	</div>	

			<div id="botao">
				<button type="submit" class="btn btn-success " >Salvar</button>
			</div>

		</form>	
		<?php } else {

			header('Location: ../erro403.php');

		}?> <!--fim permissão --> 
	</div><!--Fecha container-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

