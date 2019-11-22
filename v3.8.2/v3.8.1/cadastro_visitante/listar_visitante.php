<!--TELA DE CONSULTA DE VISTANTE-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Listagem de Vistantes</title>
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
        header('Location: login.php');
      }

      include 'conexao.php';

      $sql = "SELECT `Cargo` FROM `funcionarios` WHERE `Login` = '$Login' ";
      $buscar = mysqli_query($conexao, $sql);
      $array = mysqli_fetch_array($buscar);
      $CargoAcesso  = $array['Cargo'];

    ?>

	<div class="container" id="listaContainer">
		
		<a id="novo" href="../login/menu.php" ><i class="fas fa-angle-double-left"></i></a>


		<h3 id="content">Lista de Vistantes</h3><br>
		<?php
           if ($CargoAcesso  == 3)  {
        ?>
		<a id="add" class="font-weight-bold" href="cadastrarVisitante.php"><i class="fas fa-plus"> Novo</i></a>
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
		      <!-- <th scope="col"></th>-->
		      <th scope="col">Id</th>
		      <th scope="col">CPF</th>
		      <th scope="col">Nome</th>
		      <th scope="col">Endereço</th>
		      <th scope="col">Instituição</th>
		      <th scope="col">Telefone</th>
		      <th scope="col">Qtd Alunos</th>
		      <th scope="col">Ação</th>
		    </tr>
		  </thead>
		    
		    	<?php

		    		include 'conexao.php';
		    		$sql = "SELECT * FROM `visitante`  ";
		    		$buscar = mysqli_query($conexao, $sql);

		    		while ($array = mysqli_fetch_array($buscar)) {

		    			$IdVisit = $array['IdVisit'];
		    			$CPFVisitante = $array['CPFVisitante'];
		    			$NomeVisitante = $array['NomeVisitante'];
		    			$EnderecoVisitante = $array['EnderecoVisitante'];
		    			$InstituicaoVisitante = $array['InstituicaoVisitante'];
		    			$TelefoneVisitante = $array['TelefoneVisitante'];
		    			$QntAlunosVisita = $array['QntAlunosVisita'];
		    	?>
		    <tr>	
		      <td><?php echo $IdVisit ?></td>
		      <td><?php echo $CPFVisitante ?></td>
		      <td><?php echo $NomeVisitante ?></td>
		      <td><?php echo $EnderecoVisitante ?></td>
		      <td><?php echo $InstituicaoVisitante ?></td>
		      <td><?php echo $TelefoneVisitante ?></td>
			  <td><?php echo $QntAlunosVisita ?></td>
			  <td>
			  	<?php
           		if ($CargoAcesso  == 3)  {
        		?>
			  	<a class="btn btn-warning btn-sm"  style="color: #fff" href="editar_visitante.php?id=<?php echo $IdVisit ?>" role="button"><i class="fas fa-edit"></i>&nbsp;Editar</a> <!--&nbsp:  espaço/ tag php ai dentro: passa cpf pelo link-->

			  	<a class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir ?')" style="color: #fff" href="deletar_visitante.php?id=<?php echo $IdVisit ?>" role="button"><i class="far fa-trash-alt"></i>&nbsp;Excluir</a>
			  </td>
			  <?php } ?> <!--fim permissão-->
			 </tr>

		  <?php } ?> <!--fim while-->
		  
		</table>
		</div>

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