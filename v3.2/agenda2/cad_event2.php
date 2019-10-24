<?php
session_start();

include_once 'conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data_start = str_replace('/', '-', $dados['InicioReserva']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $dados['FimReserva']);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$query_event = "INSERT INTO `reserva`(`NomeEvento`, `InicioReserva`, `FimReserva`, `CorReserva`, `Instituicao`) VALUES (:NomeEvento, :InicioReserva, :FimReserva, :CorReserva, :Instituicao)";

$insert_event = $conexao->prepare($query_event);
$insert_event->bindParam(':NomeEvento', $dados['NomeEvento']);
$insert_event->bindParam(':InicioReserva', $data_start_conv);
$insert_event->bindParam(':FimReserva', $data_end_conv);
$insert_event->bindParam(':CorReserva', $dados['CorReserva']);
$insert_event->bindParam(':Instituicao', $dados['Instituicao']);

if ($insert_event->execute()) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento cadastrado com sucesso!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento cadastrado com sucesso!</div>';
} else {
    $retorna = ['sit', 'msg' => '<div class="alert alert-danger" role="alert">Erro: Evento não foi cadastrado com sucesso!</div>'];
}


header('Content-Type: application/json');
echo json_encode($retorna);
