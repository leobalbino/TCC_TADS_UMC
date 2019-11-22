<!--PAGINA PRINCIPLA AGENDA-->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--meta tags -->
    <meta charset="utf-8">
 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
	<title>Agenda</title>
	
     <!-- Bootstrap CSS -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>


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
      $CargoAcesso = $array['Cargo'];

    ?>


	<div class="container" id="tamanhoContainer">
	<?php
           if ($CargoAcesso == 3) {
    ?>
		<a href="listar_reserva.php" ><i class="fas fa-angle-double-left"></i></a>
		<h4>Reserve o Laboratório de práticas pedagógicas</h4>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<form action="inserir_reserva.php" method="post" style="margin-top: 20px">
	 		
  			<div class="form-group">
	    		<label>Titulo Evento</label>
	    		<input type="text" class="form-control" name="NomeEvento"  placeholder="Inisira o titulo" required>
  			</div>


<!--<div class="input-group date data_formato" data-date-format="dd/mm/yyyy HH:ii:ss">-->

				<div class="form-group">
					<label  class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
							<div class="input-field col s12" >
    							<input type="text" class="datepicker" name="start" id="formatodata" autocomplete="off" >
   								 
							</div>
					</div>
				</div>

            <div class="form-group">
                <label>Cor</label>
                <input type="color" class="form-control" name="CorReserva" >
            </div>

  			<div class="form-group">
	    		<label>Instituição</label>
	    		<input type="text" class="form-control" name="Instituicao" >
  			</div>

		  	
			<div id="botao">
				<button type="submit" class="btn btn-success " >Salvar</button>
			</div>

		</form>	
	<?php } else {

		header('Location: ../erro403.php');
	}?> 
	</div><!--Fecha container-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

	<!--Data e hora-->
	<script>
	 	$(document).ready(function(){

    		$('.datepicker').datepicker({
    			selectMonths: true,
    			selectYears: 15
    			language: "pt-BR",
                startDate: '+0d'

    		});
  		});
	</script>
          

</body>


</html>

