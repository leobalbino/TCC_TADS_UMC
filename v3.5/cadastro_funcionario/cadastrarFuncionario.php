<!--PAGINA PRINCIPLA DE CADASTRAR FUNCIONÁRIO, 
	nessa pagina cria-se o Login e Senha-->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulário de Cadastro</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
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
        header('Location: ../login/login.php');
	  }
      include 'conexao.php';

      $sql = "SELECT `Cargo` FROM `funcionarios` WHERE `Login` = '$Login' ";
      $buscar = mysqli_query($conexao, $sql);
      $array = mysqli_fetch_array($buscar);
      $Cargo = $array['Cargo'];

    ?>

  	
	<div class="container" id="tamanhoContainer">
	<?php
           if ($Cargo == 3) {
    ?>
		<a href="listar_funcionario.php" ><i class="fas fa-angle-double-left"></i></a>
		<h4>Formulário de Cadastro de Funcionário</h4>

		<form action="inserir_funcionario.php" method="post" style="margin-top: 20px">
	 		
  			<div class="form-group">
	    		<label>Nome</label>
	    		<input type="text" class="form-control" name="Nome"  placeholder="Inisira o nome" required>
  			</div>

		  	<div class="form-group">
			    <label>RA</label>
			    <input type="number" class="form-control" name="RA" placeholder="Insira o RA ou RGM" min="1" step="1" required>
			    <small id="Turmaobs" class="form-text text-muted">Somente números.</small>
		  	</div>

		  	<div class="form-group">
			    <label>Turma</label>
			    <input type="text" class="form-control" name="Turma" placeholder="Insira a Turma" >
			    <small id="Turmaobs" class="form-text text-muted">Só preencha se for MONITOR</small>
		  	</div>

		  	<div class="row">
		  		<label>Cargo</label>
				<select class="form-control" name="Cargo">
				      <option value="1">Monitor</option>
				      <option value="2">Professor</option>
				      <option value="3">Coordenador</option>
				</select>
		  	 </div>

		  	<div class="form-group">
			    <label>RA do Coordenador Responsável</label>
			    <input type="number" class="form-control" name="RACoordenadorResponsavel" placeholder="Insira o RA do Coordenador Responsável" min="1" step="1" required>
			    <small id="Turmaobs" class="form-text text-muted">Somente números.</small>
		  	</div>

		  	<div class="form-group" id="LoginForm" >
		  		<h4>Crie um Login de Acesso:</h4>
			    <label>Login</label>
			    <input type="text" class="form-control" name="Login" placeholder="Crie um Login" required>  
		  	</div>

		  	<div class="form-group" >
			    <label for="pass">Senha</label>
			    <input type="password" class="form-control" id="txtSenha" name="Senha" placeholder="Crie uma Senha" required oninput="validaSenha(this)">  
		  	</div>

		  	<div class="form-group" >
			    <label for="pass">Confirmação de senha</label>
			    <input type="password" class="form-control" name="Senha2" placeholder="Digite a senha novamente" required>  
		  	</div>
		  	
			<div id="botao">
				<button type="submit" class="btn btn-success " >Salvar</button>
			</div>

		</form>	
	<?php } else {

		header('Location: ../erro403.php');
	}?> 
	</div><!--Fecha container-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script>
		function validaSenha (input) {

			if (input.value != document.getElementById('txtSenha').value){
				input.setCustomValidity('Repita a senha corretamente');
			} else {
				input.setCustomValidity('');
			}
		}
	</script>

</body>
</html>

