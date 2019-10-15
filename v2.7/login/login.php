<!--LOGIN LEO + DANI (FRONT+BACK)-->
<?php

session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Login</title>

		 <link href="vendor/css/all.min.css" rel="stylesheet" type="text/css">
 		 <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 		 <link href="css/sb-admin-2.min.css" rel="stylesheet">

	</head>

	<body>
 	 <div class="container">
  	<div class="row justify-content-center">
   	  <div class="col-xl-10 col-lg-12 col-md-10">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
              <div class="row">
                  <img src="img/login.jpg" width="456px" height="510px">
                  <div class="col-lg-6">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Bem vindo!</h1>
                      </div>

        							<?php
        								if (isset($_SESSSION['msgErroLogin'])){
        									echo $_SESSSION['msgErroLogin'];//mostra msg de sucesso ou erro
        									unset($_SESSSION['msgErroLogin']);//destruir msg 
        								}
        								
        								if (isset($_SESSSION['msgCad'])){ //msgCad criado para o CADASTRARUSUARIO
        									echo $_SESSSION['msgCad'];//mostra msg de sucesso ou erro no CADASTRARUSUARIO
        									unset($_SESSSION['msgCad']);//destruir msg CADASTRARUSUARIO
        								}
        								
        							?>
					           <form class="user" method="post" action="validalogin.php">
								        <div class="form-group">
                          <input type="text" name="Login" class="form-control form-control-user" id="Login" placeholder="Digite o seu usuário">
                        </div>

                        <div class="form-group">
                          <input type="password" name="Senha"  class="form-control form-control-user" id="Senha" placeholder="Digite sua senha">
                        </div>
								
								        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Lembre-me</label>
                          </div>
                        </div>

                        <hr>
                          <a href="perfil.php" name="btnLogin" id="btnLogin" class="btn btn-primary btn-user btn-block">Entrar</a>
                        <hr>
                     </form>
								
							       <div class="text-center">
                        <a class="small" href="0">Esqueci minha senha</a>
                     </div>

							<!--LINK PARA CADASTRAR USUARIO, RETIRAR DAQ DEPOIS E POR NO PERFIL CORD
								<h4>Cadastre-se</h4>
								<a href="cadastrarFuncionario.php"></a>-->				
 						    </div>
              </div>
          	</div>
        	 </div>
    	   </div>
	     </div>
      </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>