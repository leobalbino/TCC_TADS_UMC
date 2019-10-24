<?php

include 'conexao.php';

$query_events = "SELECT `IdReserva`, `NomeEvento`, `InicioReserva`, `FimReserva`, `CorReserva`, `Instituicao` FROM `reserva`";

$resultado_events = $conexao->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $IdReserva = $row_events['IdReserva'];
    $NomeEvento = $row_events['NomeEvento'];
    $InicioReserva = $row_events['InicioReserva'];
    $FimReserva = $row_events['FimReserva'];
    $CorReserva = $row_events['CorReserva'];
    $Instituicao = $row_events['Instituicao'];
    
    $eventos[] = [
        'IdReserva' => $IdReserva, 
        'NomeEvento' => $NomeEvento, 
        'InicioReserva' => $InicioReserva, 
        'FimReserva' => $FimReserva, 
        'CorReserva' => $CorReserva, 
        'Instituicao' => $Instituicao, 
        ];
}

echo json_encode($eventos);