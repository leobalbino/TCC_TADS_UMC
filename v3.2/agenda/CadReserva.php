<?php 

session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Converter a data para formato do BD
//inicio reserva
$data_start = str_replace('/', '-', $dados['InicioReserva']);
$data_start_conv = date("Y-m-d H:i:s", strontime($data_start)); //conversao
//fim reserva
$data_end = str_replace('/', '-', $dados['FimReserva']);
$data_end_conv = date("Y-m-d H:i:s", strontime($data_end));

$query_event= "INSERT INTO `reserva`(`NomeEvento`, `InicioReserva`, `FimReserva`, `CorReserva`, `StatusProdutoUsado`, `IdprodutoUsado`, `Instituicao`) VALUES (:NomeEvento, :InicioReserva, :FimReserva, :CorReserva, :StatusProdutoUsado, :IdprodutoUsado)";


$insert_event = $conexao ->prepare ($query_event);
$insert_event -> bindParam(':NomeEvento' , $dados['NomeEvento']);
$insert_event -> bindParam(':InicioReserva' , $data_start_conv);
$insert_event -> bindParam(':FimReserva' , $data_end_conv);
$insert_event -> bindParam(':CorReserva' , $dados['CorReserva']);
$insert_event -> bindParam(':StatusProdutoUsado' , $dados['StatusProdutoUsado']);
$insert_event -> bindParam('IdprodutoUsado' , $dados['IdprodutoUsado']);


if($insert_event->execute()) {
	$retorna = ['sit' => true, 'msg' =>  '<div class="alert alert-success" role="alert">Reserva cadastrada com sucesso! </div>'];
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Reserva cadastrada com sucesso!</div>';
}else {
	$retorna = ['sit' => true, 'msg' =>  '<div class="alert alert-danger" role="alert">Erro: Reserva não foi cadastrada. </div>'];
}

header('Content-Type: application/json');
echo json_encode($retorna);
