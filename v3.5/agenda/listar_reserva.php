<!--TELA DE CONSULTA DE RESERVAS-->

<!DOCTYPE html>
<html>
<head>
	<title>Reservas</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
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


	<div class="container" id="listaContainer">
		 <!--VOLTAR-->
		<a id="novo" href="../login/menu.php" ><i class="fas fa-angle-double-left"></i></a>

		<h3 id="content">Dias Reservados</h3><br>

		<?php
    	if (($Cargo == 3) || ($Cargo == 2))   {
   		?>
		<!--NOVO-->
		<a class="font-weight-bold" href="cadastrarReserva.php"><i class="fas fa-plus"> Novo</i></a>
		<?php } ?>

		<table class="table table-sm" >
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Nome Evento</th>
		      <th scope="col">Início</th>
		      <th scope="col">Fim</th>
		      <th scope="col">Instituição</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		    
		    	<?php

		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `reserva` ";
		    		$buscar = mysqli_query($conexao, $sql);

		    		while ($array = mysqli_fetch_array($buscar)){

		    			$IdReserva = $array['IdReserva'];
		    			$NomeEvento = $array['NomeEvento'];
		    			$start = $array['start'];
		    			$end = $array['end'];
		    			$Instituicao  = $array['Instituicao'];
		    	?>
		    <tr>	
		      <td><?php echo $IdReserva ?></td>
		      <td><?php echo $NomeEvento ?></td>
		      <td><?php echo $start ?></td>
		      <td><?php echo $end ?></td>
		      <td><?php echo $Instituicao ?></td>
			  <td>
			  	<?php
    			if (($Cargo == 3) || ($Cargo == 2))  {
   				?>
			  	<a class="btn btn-warning btn-sm"  style="color: #fff" href="editar_reserva.php?id=<?php echo $IdReserva ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a> <!--&nbsp:  espaço/ tag php ai dentro: passa id pelo link-->

			  	<a class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir ?')" style="color: #fff" href="deletar_reserva.php?id=<?php echo $IdReserva ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
			  	<?php } ?> <!--fim permissão -->
			  </td>
			 </tr>

		  <?php } ?> <!--fim while-->
		  
		</table>


	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>