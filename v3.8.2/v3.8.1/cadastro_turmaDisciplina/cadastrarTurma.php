<!--PAGINA PRINCIPLA DE CADASTRAR TURMA
	-->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Cadastro de Turma e Disciplinas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	<script src="http://"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
</head>
<body>

  <?php

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
      $CargoAcesso  = $array['Cargo'];

    ?>


	<div class="container" id="tamanhoContainer">

		<?php
           if (($CargoAcesso  == 3) || ($CargoAcesso  == 2))  {
        ?>
		<a href="../login/menu.php" ><i class="fas fa-angle-double-left"></i></a><!--VOLTAR-->
		<h4>Cadastro de Turma e Disciplinas</h4>

		<form action="inserir_turma.php" method="post" >

			<div class="row">
				<div class="col-sm-6">
	    			<label>Id</label>
	    			<input type="number" class="form-control" name="IdDisciplina" placeholder="Campo automático" disabled>
	    		</div>

	    		<div class="col-sm-6">
		    		<label>Turma</label>
		    			<input type="text" class="form-control" name="DescricaoTurma" placeholder="Insira a descrição" required>
		    		<small>Exemplo: 1A, 2A, 3A</small>	
  				</div> 
  			</div>
  		
  			<div class="form-group">
		 			<!--Adicionar Disciplina 1ª vez já parece na pagina-->	 
		 			<label>Nome da Disciplina </label>
		 			<a href="javascript:void(0)" id="addInput"><i class="fas fa-plus-circle"></i></a>
		 					
		 		<br/>

		 		<div id="dynamicDiv">
		 			<!--Remover Disciplina-->
		 			
		 			<p>	 			
			 			<input class="form-control" type="text" name="DescricaoDisciplina" id="inputeste" size="60"  />
			 			<small>Insira um nome da Disciplina dessa Turma</small>
			 			<a href="javascript:void(0)" id="remInput"><i class="fas fa-times-circle"></i></a>
		 			</p>
					
		 		</div>

		 		<!--Adcionar e Remover campo dinamicamente em JavaScript-->
		 		<script>
				$(function () {
				    var scntDiv = $('#dynamicDiv');
				    $(document).on('click', '#addInput', function () {
				        $('<p>'+
			        		'<input class="form-control" type="text" name="DescricaoDisciplina" id="inputeste" size="60" /> '+ '<small>Insira o nome da Disciplina dessa Turma </small>' +
			        		' <a href="javascript:void(0)" id="remInput"><i class="fas fa-times-circle"></i></a>'+
						'</p>').appendTo(scntDiv);
				        return false;
				    });
				    $(document).on('click', '#remInput', function () {
			            $(this).parents('p').remove();
				        return false;
				    });
				});
				</script>

			</div>

			<div id="botao">
				<button type="submit" class="btn btn-success " >Salvar</button>
			</div>
		</form>	
		<?php } else {

			header('Location: ../erro403.php');

		} ?> <!--fim permissão -->
	</div>	<!--Fim DIV container-->
		


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

