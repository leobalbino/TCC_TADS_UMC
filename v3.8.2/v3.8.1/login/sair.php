<?php
//PAGINA DE REDICIONAMENTO DO LOGOUT	

session_start();
//destruir variaveis:
unset($_SESSION['IdFunc'], $_SESSION['Login'], $_SESSION['Senha'], $_SESSION['RA'], $_SESSION['Nome'] , $_SESSION['Cargo'], $_SESSION['RACoordenadorResponsavel'] );

$_SESSION['msgErroLogin'] = "Deslogado com sucesso";
header ("Location: ../index.php"); // vai pra tela de Inicio da brinquedoteca