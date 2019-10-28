<!--Inserir no Banco o formulário de RESERVA-->


<?php
session_start();
include 'conexao.php';

//variavel = numero contribuicao e o que esta dentro de name
//$variavel = $_POST['name'];

$NomeEvento = $_POST['NomeEvento'];
$start = $_REQUEST['start'];
$end = $_REQUEST['end'];
$CorReserva = $_POST['CorReserva'];
$Instituicao = $_POST['Instituicao'];

//Converter a data e hora inicio do formato brasileiro para o formato do Banco de Dados
$start = explode(" ", $start);
list($date, $hora) = $start;
$datastart_sem_barra = array_reverse(explode("/", $date));
$datastart_sem_barra = implode("-", $datastart_sem_barra);
$datastart_sem_barra = $datastart_sem_barra . " " . $hora;

//Converter a data e hora fim do formato brasileiro para o formato do Banco de Dados
$end = explode(" ", $end);
list($date, $hora) = $end;
$dataend_sem_barra = array_reverse(explode("/", $date));
$dataend_sem_barra = implode("-", $dataend_sem_barra);
$dataend_sem_barra = $dataend_sem_barra . " " . $hora;


$sql = "INSERT INTO `reserva`(`NomeEvento`, `start`, `end`, `CorReserva`, `Instituicao`) VALUES  ('$NomeEvento', '$datastart_sem_barra', '$dataend_sem_barra', '$CorReserva', '$Instituicao')";

$inserir = mysqli_query($conexao, $sql);//conecta e insere/valida

//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
if(mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<div class='alert alert-success'> Data cadastrada com sucesso </div>";
	header("Location: agenda.php");
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'> Erro ao cadastradar a data </div>";
	header("Location: agenda.php");
}

?>

