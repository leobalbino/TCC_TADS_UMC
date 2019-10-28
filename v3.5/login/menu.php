<!--MENU/PERFIL-->


<!DOCTYPE html>
<html lang="pt-br" >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Perfil</title>
    <link rel="stylesheet" href="css/style.css">
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

  <nav id="colorNav">
      <ul>
              <!--AGENDA-->
          <li class="green" style="margin-top: 80px; width:120px;height:110px;font-size:20px; text-align:center" >
            <a href="../agenda/listar_reserva.php" class="fa fa-calendar" style="font-size:63px !important;"></a>
              <ul>
                  <li><a href="../agenda/listar_reserva.php">Agenda</a></li>
              </ul>
          </li>

  	         <!--RELATORIO-->

          <?php
           if ($Cargo == 3)  {
          ?>
 
  	      <li class="red" style="width:120px;height:110px;font-size:20px" >
            <a href="#" class="fa fa-bar-chart-o" style="font-size:63px; !important;"></a>
              <ul>
                  <li><a href="#">Relatório</a></li>
              </ul>
          </li> 
          <?php } ?>

              <!--INVENTARIO-->
          <li class="blue" style="width:120px;height:110px;font-size:20px" >
  			     <a href="../cadastro_inventario/listar_inventario.php" class="fa fa-gamepad" style="font-size:63px !important;"></a>
              <ul>
                  <li><a href="../cadastro_inventario/listar_inventario.php">Inventário</a></li>
              </ul>
          </li>

              <!--CADASTROS-->
          <li class="purple" style="width:120px;height:110px;font-size:20px;  text-align:center" >
            <a href= "#" class="fa fa-pencil" style="font-size:63px !important;"></a>
           
  		      <ul>
              <li><a href="../cadastro_funcionario/listar_funcionario.php">Cadastrar Funcionário</a></li>
              <li><a href="../cadastro_visitante/listar_visitante.php">Cadastrar Visitante</a></li>
              <li><a href="../cadastro_turmaDisciplina/listar_turma.php">Cadastrar Turma</a></li>
            </ul>
          </li>

             <!--SAIR/ SING OUT-->
          <li class="yellow" style="width:120px;height:110px;font-size:20px;  text-align:center" >
            <a href= "sair.php" class="fa fa-sign-out" style="font-size:63px !important;"></a>
            <ul>
                <li><a href="sair.php">Sair</a></li>
            </ul>
          </li>
      </ul>
  </nav>

    
  </body>
</html>