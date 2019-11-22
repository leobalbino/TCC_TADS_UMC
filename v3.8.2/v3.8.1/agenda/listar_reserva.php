<!--TELA DE CONSULTA DE RESERVAS-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reservas</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"><!--FILTROS-->
	
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
      $Cargo = $array['Cargo'];

    ?>


	<div class="container" id="listaContainer">
		 <!--VOLTAR-->
		<h5><a id="novo" href="../login/menu.php" ><i class="fas fa-angle-double-left"></i></a></h5>
		
		<h3 id="content">Dias Reservados</h3><br>

		<?php
    	if (($Cargo == 3) || ($Cargo == 2))   {
   		?>
		<!--NOVO-->
		<a class="font-weight-bold" href="cadastrarReserva.php" id="novo" ><i class="fas fa-plus"> Novo</i></a>
		<?php 
		}
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		
		<div class="table-responsive">	
		<table class="table table-sm" id="minhaTabela" >
		  <thead>
		    <tr>
		      <th scope="col">Nome Evento</th>
			  <th scope="col">Responsável</th>
		      <th scope="col">Data/Hora</th>
		      <th scope="col">Visitante</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		    
		    	<?php

		    		
		    		$sql = "SELECT * FROM `agenda` order by `start` ";
		    		$buscar = mysqli_query($conexao, $sql);

		    		while ($array = mysqli_fetch_array($buscar)){

		    			$IdAgenda = $array['IdAgenda'];
						$NomeEvento = $array['NomeEvento'];
						$IdFunc = $array['IdFunc'];
		    			$start = $array['start'];
		    			$IdVisit  = $array['IdVisit'];
		    			$IdTurma = $array['IdTurma'];
		    			$IdDisciplina = $array['IdDisciplina'];
		    	?>
		    <tr>	
		      <td><?php echo $NomeEvento ?></td>
			  <td><?php 

					$sql2 = "SELECT `Nome` FROM `funcionarios` WHERE `IdFunc` = $IdFunc ";
					$buscar2 = mysqli_query($conexao, $sql2);
					$array2 = mysqli_fetch_array($buscar2);
      				$Nome = $array2['Nome'];

				  	echo $Nome 	
				  ?>
			  </td>
		      <td><?php echo $start ?></td>
			  <td><?php 

					$sql3 = "SELECT `InstituicaoVisitante` FROM `visitante` WHERE `IdVisit` = $IdVisit ";
					$buscar3 = mysqli_query($conexao, $sql3);
					$array3 = mysqli_fetch_array($buscar3);
					$InstituicaoVisitante = $array3['InstituicaoVisitante'];
					  
				    echo $InstituicaoVisitante 
				  ?>
			  </td>
			  <td>

			  	<a class="btn btn-info btn-sm" style="color: #fff" href="visualizar_reserva.php?id=<?php echo $IdAgenda ?>" role="button"><i class="far fa-eye"></i>&nbsp;Ver</a>
			  	
			  	<?php
    			if (($Cargo == 3) || ($Cargo == 2))  {
   				?>
			  	<a class="btn btn-warning btn-sm"  style="color: #fff" href="editar_reserva.php?id=<?php echo $IdAgenda ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a> <!--&nbsp:  espaço/ tag php ai dentro: passa id pelo link-->

			  	<a class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir ?')" style="color: #fff" href="deletar_reserva.php?id=<?php echo $IdAgenda ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
			  	<?php } ?> <!--fim permissão -->
			  </td>
			 </tr>

		  <?php } ?> <!--fim while-->
					
		</table>
		</div> <!--fim tabela responsiva-->

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  	<!--SCRIPT DE FILTROS-->
  	<script>
  $(document).ready(function(){
      $('#minhaTabela').DataTable({
          "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
  });
  </script>

</body>
</html>