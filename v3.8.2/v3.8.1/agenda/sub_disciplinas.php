<?php include_once("conexao.php");

	$IdTurma = $_REQUEST['IdTurma'];
	
	$result_sub_cat = "SELECT * FROM disciplinas WHERE idTurma=$IdTurma ORDER BY DescricaoDisciplina";
	$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_disciplinas_post[] = array(
			'IdTurma'	=> $row_sub_cat['IdTurma'],
			'DescricaoDisciplina' => utf8_encode($row_sub_cat['DescricaoDisciplina']),
		);
	}
	
	echo(json_encode($sub_disciplinas_post));
