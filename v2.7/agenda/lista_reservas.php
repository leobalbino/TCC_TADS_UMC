<?php

include 'conexao.php';

$query_reserva = "SELECT `IdReserva`, `NomeEvento`, `InicioReserva`, `FimReserva`, `CorReserva`, `StatusProdutoUsado`, `IdprodutoUsado`, `Instituicao` FROM `reserva` ";

$resultado_reserva = $conexao -> prepare ($query_reserva);
$resultado_reserva -> execute();

$reserva = []; //começo array

while ($linha_reserva = $resultado_reserva -> fetch (PDO::FETCH_ASSOC)) {

	$idReserva = $linha_reserva ['idReserva'];
	$RAProfessorReserva = $linha_reserva ['RAProfessorReserva'];
	$RGMMonitorReserva = $linha_reserva ['RGMMonitorReserva'];
	$NomeEvento = $linha_reserva ['NomeEvento'];
	$InicioReserva = $linha_reserva ['InicioReserva'];
	$FimReserva = $linha_reserva ['FimReserva'];
	$CorReserva = $linha_reserva ['CorReserva'];
	$idprodutoUsado = $idprodutoUsado ['idprodutoUsado'];


$reserva [] = [
	'idReserva' => $idReserva,
	'RAProfessorReserva' => $RAProfessorReserva,
	'RGMMonitorReserva' => $RGMMonitorReserva,
	'NomeEvento' => $NomeEvento,
	'InicioReserva'=> $InicioReserva,
	'FimReserva' => $FimReserva,
	'CorReserva' => $CorReserva,
	'idprodutoUsado' => $idprodutoUsado,
];
}

echo json_encode ($reserva);
?>