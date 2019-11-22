<!--PAGINA PRINCIPAL AGENDA-->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--Meta tags -->
    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="iso-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	  <title>Agenda</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- Folha de estilo -->
	  <link rel="stylesheet" type="text/css" href="css/estilo.css">

    <!--Icones free-->
	  <script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> 

    <!--Fontes-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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

      $sql = "SELECT `IdFunc`, `Cargo`, `Nome`  FROM `funcionarios` WHERE `Login` = '$Login' ";
      $buscar = mysqli_query($conexao, $sql);
      $array = mysqli_fetch_array($buscar);
      $IdFunc = $array['IdFunc'];
      $CargoAcesso = $array['Cargo'];
      $Nome = $array['Nome'];
    ?>


	<div class="container" id="tamanhoContainer">
	
		<a href="listar_reserva.php" id="novo"><i class="fas fa-angle-double-left"></i></a>
		<h4>Reserve o Laboratório de práticas pedagógicas</h4>
		
		<form action="inserir_reserva.php" method="post" style="margin-top: 20px">
	 		
        <div class="row">

          <div class="col-sm-6">
            <label>Id Agenda</label>
            <input type="number" class="form-control" name="IdAgenda" placeholder="Campo automático" disabled>
          </div>  

          <div class="col-sm-6">
            <label>Professor</label>
            <input type="text" class="form-control" placeholder="<?php echo $Nome?>" disabled >  

            <input type="number" class="form-control" name="IdFunc" value="<?php echo $IdFunc?>" style="display:  none" >  

          </div>

        </div>

  			<div class="form-group" style="margin-top: 20px">
	    		<label>Título Atividade</label>
	    		<input type="text" class="form-control" name="NomeEvento"  placeholder="Insira o titulo" required>
  			</div>

        <div class="form-group">
          <label>Data e Hora</label>
            <div class="input-group date data_formato"  data-date-format="dd/mm/yyyy HH:ii">
              <input class="form-control" type="text" name="start" placeholder="Data da Reserva" autocomplete="off">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </span>
            </div>
        </div> 
    
        <div class="form-group">
          <label>Cor</label>
          <input type="color" class="form-control" name="CorReserva" >
        </div>

          <div class="row">
            <div class="col-sm-6">
              <label>Visitante</label>
              <select class="form-control" name="IdVisit" id="IdVisit">
              <option>Escolha o Visitante</option>
              
              <?php
               

                $sql = "SELECT * FROM `visitante` order by `InstituicaoVisitante` ";
                $busca = mysqli_query($conexao, $sql);

                while($vetor=mysqli_fetch_assoc($busca)){

                  echo '<option value="'.$vetor['IdVisit'].'">'.$vetor['InstituicaoVisitante'].'</option>';
                }

              ?>
              </select>
              <br/><br/>
            </div>

            <div class="col-sm-6">
              <label>Turma</label>
              <select class="form-control" name="IdTurma" id="IdTurma">
              <option>Escolha a Turma</option>
              
              <?php
             

                $sql = "SELECT * FROM `turma` order by `DescricaoTurma` ";
                $busca = mysqli_query($conexao, $sql);

                while($vetor=mysqli_fetch_assoc($busca)){

                  echo '<option value="'.$vetor['IdTurma'].'">'.$vetor['DescricaoTurma'].'</option>';
                }

              ?>
              </select>
              <br/><br/>
            </div>
          </div>

         <div class="form-group">
            <label>Disciplina</label>
            <span class="carregando"> Aguarde, carregando...</span>
            <select class="form-control" name="IdDisciplina" id="IdDisciplina" required>
              <option value="">Escolha a Turma Primeiro</option>
             </select><br><br> 
          </div>

           <div class="form-group">
            <div>
              <img src="img/controle.png" alt="Materiais" width=30 height=30>
              <label id="label">Materiais que irá utilizar:</label><br/>
              <small id="Turmaobs" class="form-text text-muted">Selecione os materiais que irá utilizar na sua aula.</small>
            </div>
            <br/>
               <div class="table-responsive">
                <table class="table table-sm" >
                  <thead>
                    <tr>
                      <th scope="col">Descrição</th>
                      <th scope="col">Medida</th>
                      <th scope="col">Qntd</th>
                      <th scope="col">Categoria</th>
                    </tr>
                  </thead>

                  <?php

                  include 'conexao.php';
                  $sql2 = "SELECT * FROM `inventario` ";
                  $buscar3 = mysqli_query($conexao, $sql2);

                  while ($arrayItens = mysqli_fetch_array($buscar3)) {

                    $IdProduto = $arrayItens['IdProduto'];
                    $Descricao = $arrayItens['Descricao'];
                    $Medida = $arrayItens['Medida'];
                    $QntdItem = $arrayItens['Qntd'];
                    $Categoria = $arrayItens['Categoria'];
                ?>
                    <tr>       
                      <td><?php echo $Descricao ?></td>
                      <td><?php echo $Medida ?></td>
                      <td>
                        <select class="form-control" name="QntdItens[<?php echo $IdProduto?>]">
                          <?php 

                            for($i = 0; $i <= $QntdItem; $i++){
                            echo "<option value=".$i."> ".$i." </option><br/>"; 
                          }
                          ?>  
                        </select>            
                      </td>
                      <td><?php echo $Categoria ?></td>
                    </tr>  
                  <?php } ?> <!--fim while array listar-->
                </table>
              </div> <!--fim div tabel responsive-->
            </div><!--fim div form-group-->



			     <div id="botao">
				      <button type="submit" class="btn btn-success">Reservar</button>
			     </div>

		  </form>	


	</div><!--Fecha container-->


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>

  <!-- Calendario-->
  <script type="text/javascript">
    $('.data_formato').datetimepicker({
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
      showMeridian: 1,
      language: "pt-BR",
      startDate: '+0d',
      });
  </script>

  <!-- Turma e Disciplinas -->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
      google.load("jquery", "1.4.2");
  </script>
    
    <script type="text/javascript">
    $(function(){
      $('#IdTurma').change(function(){
        if( $(this).val() ) {
          $('#IdDisciplina').hide();
          $('.carregando').show();
          $.getJSON('sub_disciplinas.php?search=',{IdTurma: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value="">Escolha Disciplina</option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].IdTurma + '">' + j[i].DescricaoDisciplina + '</option>';
            } 
            $('#IdDisciplina').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#IdDisciplina').html('<option value="">– Escolha Disciplina –</option>');
        }
      });
    });
    </script>

</body>
</html>

