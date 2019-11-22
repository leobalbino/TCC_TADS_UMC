<?php

include 'conexao.php';

$id= $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Reserva</title>
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
           if (($Cargo == 3) || ($Cargo == 2))  {
        ?>
		<a href="listar_reserva.php" ><i class="fas fa-angle-double-left"></i></a>
		<h4>Editar Reserva</h4>

		<form action="atualizar_reserva.php" method="post" style="margin-top: 20px">
			<?php

			$sql = "SELECT * FROM `reserva` WHERE IdAgenda = $id";
			$buscar = mysqli_query($conexao, $sql);

			while ($array = mysqli_fetch_array($buscar)) {
				
				$IdReserva = $array['IdReserva'];
		    	$NomeEvento = $array['NomeEvento'];
		    	$start = $array['start'];
		    	$CorReserva = $array['CorReserva'];
		    	$Instituicao = $array['Instituicao'];
			?>

			<div class="form-group">
	    		<label>Id</label>
	    		<input type="number" class="form-control" name="IdAgenda" value="<?php echo $IdReserva ?>"   disabled="">	
	    		<input type="number" class="form-control" name="id"  style="display = none" value="<?php echo $id ?>" >	
  			</div>

	 		<div class="form-group">
	    		<label>Nome Evento</label>
	    		<input type="text" class="form-control" name="NomeEvento" value="<?php echo $NomeEvento ?>">	
  			</div>

  			<div class="form-group">
	    		<label>Início</label>
	    		<input type="text" class="form-control" name="start" value="<?php echo $start ?>">	
  			</div>

  			<div class="form-group">
	    		<label>Fim</label>
	    		<input type="text" class="form-control" name="end" value="<?php echo $end ?>">	
  			</div>


		  	 <div class="form-group">
                <label>Cor</label>
                <input type="color" class="form-control" name="CorReserva" value="<?php echo $CorReserva ?>" >
            </div>

  			<div class="form-group">
	    		<label>Instituição</label>
	    		<input type="text" class="form-control" name="Instituicao" value="<?php echo $Instituicao ?>" >
  			</div>
		  	
			<div id="botao">
				<button type="submit" class="btn btn-success " >Atualizar</button>
			</div>
			
		<?php } ?> <!--fim while-->
		</form>	
		<?php } else {

			header('Location: ../erro403.php');

		}?> <!--fim permissão-->

	</div><!--Fecha container-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

