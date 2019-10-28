<!--FORMULARIO DE VISITA EXTERNA À BRINQUEDOTECA
	MENU PRINCIPAL: ***VISITE*** 
	
24/09: erro:mensagem de sucesso e de erro 
			limpar campos
			voltar automaticamente
		ok: enviar mensagem por email
-->

 <?php
	session_start();
 ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Peça sua Visita</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/estilo.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/636fb8f61c.js" crossorigin="anonymous"></script> <!--icones free-->
		
		<script type="text/javascript">

			function validar_form_visita(){

				var nome = formvisita.nome.value;
				var email = formvisita.email.value;
				var telefone = formvisita.telefone.value;
				var instituicao = formvisita.instituicao.value;
				var mensagem = formvisita.mensagem.value;
				
				if(nome == ""){
					alert("Campo nome é obrigatorio");
					formvisita.nome.focus();
					return false;
				}if(email == ""){
					alert("Campo email é obrigatorio");
					formvisita.email.focus();
					return false;
				}if(telefone == ""){
					alert("Campo telefone é obrigatorio");
					formvisita.telefone.focus();
					return false;
				}if(instituicao == ""){
					alert("Campo instituicao é obrigatorio");
					formvisita.instituicao.focus();
					return false;
				}if(mensagem == ""){
					alert("Campo mensagem é obrigatorio");
					formvisita.mensagem.focus();
					return false;
				}

			}
		</script>
	<head>
	<body>
		<div class="container" id="tamanhoContainer">
			<div class="page-header" id="titulo">
				<a href="../../index.php" ><i class="fas fa-angle-double-left"></i></a>
				<h1>Visite o Laboratório de Práticas Pedagógicas</h1>
			</div>
			<form class="form-horizontal" name="formcontato" method="POST" action="envia_mensagem.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">
						Nome: 
					</label>
				<div class="col-sm-10">
						<input type="text" class="form-control" name="nome" placeholder="Nome Completo" 
						<?php
							if(!empty($_SESSION['value_nome'])){
								echo "value='".$_SESSION['value_nome']."'";
								unset($_SESSION['value_nome']);
							}
						 ?>	>
						 <?php
							if(!empty($_SESSION['vazio_nome'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_nome']."</p>";
								unset($_SESSION['vazio_nome']);
							}
						 ?>
				</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">
						E-mail: 
					</label>
					<div class="col-sm-10">
						 <input type="email" class="form-control" name="email" placeholder="Seu melhor e-mail" 
						<?php
							if(!empty($_SESSION['value_email'])){
								echo "value='".$_SESSION['value_email']."'";
								unset($_SESSION['value_email']);
							}
						 ?>>
						 <?php
							if(!empty($_SESSION['vazio_email'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_email']."</p>";
								unset($_SESSION['vazio_email']);
							}
						 ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">
						Telefone: 
					</label>
					<div class="col-sm-10">
						 <input type="text" class="form-control" name="telefone" placeholder="Telefone de contato" 
						<?php
							if(!empty($_SESSION['value_telefone'])){
								echo "value='".$_SESSION['value_telefone']."'";
								unset($_SESSION['value_telefone']);
							}
						 ?>>
						 <?php
							if(!empty($_SESSION['vazio_telefone'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_telefone']."</p>";
								unset($_SESSION['vazio_telefone']);
							}
						 ?>
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">
						Sua Instituição: 
					</label>
					<div class="col-sm-10">
						 <input type="text" class="form-control" name="instituicao" placeholder="Nome da Instituição" 
						<?php
							if(!empty($_SESSION['value_instituicao'])){
								echo "value='".$_SESSION['value_instituicao']."'";
								unset($_SESSION['value_instituicao']);
							}
						 ?>>
						 <?php
							if(!empty($_SESSION['vazio_instituicao'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_instituicao']."</p>";
								unset($_SESSION['vazio_instituicao']);
							}
						 ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">
						Mensagem: 
					</label>
					<div class="col-sm-10">
						<?php
							if(!empty($_SESSION['value_mensagem'])){ ?>
								<textarea class="form-control" name="mensagem"><?php echo $_SESSION['value_mensagem']; ?></textarea>
								<?php
								unset($_SESSION['value_mensagem']);
							}else{ ?>
								<textarea class="form-control" name="mensagem"></textarea>
							<?php }
						?>
						 <?php
							if(!empty($_SESSION['vazio_mensagem'])){
								echo "<p style='color: #f00; '>".$_SESSION['vazio_mensagem']."</p>";
								unset($_SESSION['vazio_mensagem']);
							}
						 ?>
					</div>
				</div>

				<div id="botao">
					<input class="btn btn-success" type="submit" value="Enviar" onclick="return validar_form_visita()">
				</div>
				
			</form>
		</div>
<!--Janela Modal de Mensagem enviada com sucesso-->
<div id="msgVisiteSucesso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" .bg-success >
				<h5 class="modal-title" id="visulUsuarioModalLabel">Sua Mensagem de visita foi enviada!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				Sua mensagem foi enviada ao Coordenador de Pedagogia da UMC com sucesso!
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			if (

				) {}
			$_SESSION["validaEnvio"] = true;
		</script>
	
	</body>
</html>

 