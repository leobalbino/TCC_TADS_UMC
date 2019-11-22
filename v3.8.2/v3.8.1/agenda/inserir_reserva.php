<!--Inserir no Banco o formulário de RESERVA-->

<?php
session_start();

include 'conexao.php';

/*echo '<pre>';
print_r($_POST);
echo '</pre>';*/
 	

	//variavel = numero contribuicao e o que esta dentro de name
	//$variavel = $_POST['name'];

	$NomeEvento = $_POST['NomeEvento'];
	$IdFunc = $_POST['IdFunc'];
	$start = $_REQUEST['start'];
	//$end = $_REQUEST['end'];
	$CorReserva = $_POST['CorReserva'];
	$IdVisit = $_POST['IdVisit'];
	$IdTurma = $_POST['IdTurma'];
	$IdDisciplina = $_POST['IdDisciplina'];
	$Status = "I";
	$QntdItens = $_POST['QntdItens'];

			
//$vItens_tmp = Array();

//Converter a data e hora inicio do formato brasileiro para o formato do Banco de Dados
$start = explode(" ", $start);
list($date, $hora) = $start;
$datastart_sem_barra = array_reverse(explode("/", $date));
$datastart_sem_barra = implode("-", $datastart_sem_barra);
$datastart_sem_barra = $datastart_sem_barra . " " . $hora;


$sql = "INSERT INTO `agenda`(`NomeEvento`, `start`, `CorReserva`, `IdVisit`, `IdFunc`, `IdTurma`, `IdDisciplina`) VALUES  ('$NomeEvento', '$datastart_sem_barra', '$CorReserva', $IdVisit, $IdFunc, $IdTurma, $IdDisciplina )";

$inserir = mysqli_query($conexao, $sql); //conecta e insere/valida


	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido

	if(mysqli_insert_id($conexao)){

		/***********************ID AGENDA*************************/

		#Pega o ultimo id inserido e colocar na variável:
		$sqlAgenda = "SELECT MAX(`IdAgenda`) FROM `agenda`";
		$buscarAgenda = mysqli_query($conexao, $sqlAgenda);
		$arrayAgendaId = mysqli_fetch_array($buscarAgenda);
		$IdAgenda = $arrayAgendaId[0];

		/***********************Tratar Array*************************/
		//qntd: quantidade de cada item
		//id= idProduto

			foreach( $QntdItens as $idP => $qntd ) {
			if ($qntd>0) {
				//echo $qntd.'<br>'; 
				$sql2 = " INSERT INTO `agenda_itens` (`IdProdutoUsado`,`IdAgenda`, `Status`, `Qntd` ) VALUES ($idP, $IdAgenda, '$Status', $qntd ) ";
				$inserir2 = mysqli_query($conexao, $sql2);

			}
		}

		/************************************************************/

		//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
			if(mysqli_insert_id($conexao)){
				$_SESSION['msg'] = '<div class="alert alert-success" role="alert"> Evento cadastrado com sucesso! </div>';
				header("Location: listar_reserva.php");

			}else{
				$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar itens!</div>';
				header("Location: listar_reserva.php");
			}
	
	}else{
		$_SESSION['msg'] = '<div class="alert alert-danger" role="alert"> Erro ao cadastradar Evento na agenda!</div>';
		header("Location: listar_reserva.php");
	}

?>
