<?php include_once("conexao.php");

	$IdOp = $_REQUEST['IdOp'];
	
	$result_sub_qntd = "SELECT Qntd FROM `inventario` WHERE IdProduto=$IdProduto";
	$resultado_sub_qntd = mysqli_query($conexao, $result_sub_qntd);
	
	while ($row_sub_qntd = mysqli_fetch_assoc($resultado_sub_qntd) ) {
		$sub_qntd_post[] = array(
			'IdOp'	=> $row_sub_qntd['IdOp'],
			'Qntd' => utf8_encode($row_sub_qntd['Qntd']),
		);
	}
	
	echo(json_encode($sub_qntd_post));
