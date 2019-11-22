<!--TELA DE VISUALIZAR RESERVAS-->
<?php
session_start();

include 'conexao.php';

$id= $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Visualizar Reserva</title>
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

     

      $sql = "SELECT `Cargo` FROM `funcionarios` WHERE `Login` = '$Login' ";
      $buscar = mysqli_query($conexao, $sql);
      $array = mysqli_fetch_array($buscar);
      $Cargo = $array['Cargo'];

    ?>

	<div class="container" id="listaContainer">
		<!--VOLTAR-->
		<h5><a id="novo" href="listar_reserva.php" ><i class="fas fa-angle-double-left"></i></a></h5>
		<div class="row>">
		<div class="col-6">

			<!--TABELA DE MATERIAIS-->

			<h3 id="content"><img src="img/controle2.png"> Materiais que serão utilizados:</h3><br>

			<div class="table-responsive">	
			 <table class="table table-sm" id="minhaTabela" >
			  <thead>
			    <tr>
			      <th scope="col">Código</th>
				  <th scope="col">Material</th>
				  <th scope="col">Medida</th>
			      <th scope="col">Qntd</th>
			      <th scope="col">Categoria</th>
			    </tr>
			  </thead>

			 		<?php
			    		
			    		$sql = "SELECT  ai.IdProdutoUsado ,
										i.Descricao,
										i.Medida,
										ai.IdAgenda,
										ai.Qntd,
										i.Categoria

								FROM  agenda_itens ai join inventario i
								on 	  ai.IdProdutoUsado = i.IdProduto JOIN agenda a
								on 	  a.IdAgenda = ai.IdAgenda
								WHERE ai.IdAgenda = $id";

			    		$buscar = mysqli_query($conexao, $sql);

			    		while ($array = mysqli_fetch_array($buscar)){

			    			$IdProdutoUsado = $array['IdProdutoUsado'];
							$Descricao = $array['Descricao'];
							$Medida = $array['Medida'];
							$IdAgenda = $array['IdAgenda'];
			    			$Qntd = $array['Qntd'];
			    			$Categoria  = $array['Categoria'];
			    	?>

			      <tr>	
				      <td><?php echo $IdProdutoUsado ?></td>
				      <td><?php echo $Descricao ?></td>
				      <td><?php echo $Medida ?></td>
				      <td><?php echo $Qntd ?></td>
				      <td><?php echo $Categoria ?></td>
			  	  </tr>

			  		<?php } ?> <!--fim while-->
			  </table>
			</div> <!--fim tabela responsiva-->
		</div> <!--fim div materiais-->	

		<!--TABELA DE OUTROS-->

		<div class="col-6">

			<h4 id="content"><img src="img/info.png" width="48" height="48"> Mais infos.:</h4><br>

			<div class="table-responsive">	
			 <table class="table table-sm" id="minhaTabela" >
			  <thead>
			    <tr>
			      <th scope="col">Nome Visitante</th>
				  <th scope="col">Qntd Alunos</th>
				  <th scope="col">Turma</th>
			      <th scope="col">Disciplina</th>
			    </tr>
			  </thead>

			 		<?php
			    		
			    		$sql2 = "SELECT  v.NomeVisitante ,
										v.QntAlunosVisita,
										t.DescricaoTurma,
										d.DescricaoDisciplina

								FROM  visitante v join agenda a
								on 	  a.IdVisit = v.IdVisit JOIN turma t
								on 	  a.IdTurma = t.IdTurma JOIN disciplinas d
								on 	  a.IdDisciplina = d.IdDisciplina
								WHERE a.IdAgenda = $id";

			    		$buscar2 = mysqli_query($conexao, $sql2);

			    		while ($array2 = mysqli_fetch_array($buscar2)){

			    			$NomeVisitante = $array2['NomeVisitante'];
							$QntAlunosVisita = $array2['QntAlunosVisita'];
							$DescricaoTurma = $array2['DescricaoTurma'];
							$DescricaoDisciplina = $array2['DescricaoDisciplina'];
			    	?>

			      <tr>	
				      <td><?php echo $NomeVisitante ?></td>
				      <td><?php echo $QntAlunosVisita ?></td>
				      <td><?php echo $DescricaoTurma ?></td>
				      <td><?php echo $DescricaoDisciplina ?></td>
			  	  </tr>

			  		<?php } ?> <!--fim while-->
			  </table>
			</div> <!--fim tabela responsiva-->
		</div> <!--fim div outros-->	
</div><!--fim div row-->
		</div>	


	</div> <!-- end div container -->




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