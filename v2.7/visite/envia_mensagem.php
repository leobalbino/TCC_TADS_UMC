<!--PAGINA DE ENVIO DE EMAIL PARA A VISITA
	MENU PRINCIPAL: ***VISISTE***-->

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone']; 
            $instituicao = $_POST['instituicao'];
            $mensagem = $_POST['mensagem']; 

            require 'vendor/autoload.php';

            $from = new SendGrid\Email(null, "carvalhodaniela89@gmail.com");
            $subject = "Solicitação de Visita ao Laboratório UMC";
            $to = new SendGrid\Email(null, "carvalhodaniela89@gmail.com");
            $content = new SendGrid\Content("text/html", "Olá Professora, <br><br>Você tem uma nova solicitação de visita ao Laboratório de práticas pedagógicas UMC!!<br><br>Nome: $nome<br>Email: $email<br>Telefone: $telefone<br>Instituição: $instituicao<br>Mensagem: $mensagem<br>");
            $mail = new SendGrid\Mail($from, $subject, $to, $content);
            
            //Hospedagem : suporte ao PHP 5.6 OU 7
            $apiKey = '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'; //chave gerada pela API do SendGrid
            $sg = new \SendGrid($apiKey);

            $response = $sg->client->mail()->send()->post($mail);
            // print_r();
            if($response->statusCode() == 202){
                $_SESSION["validaEnvio"] = true;
                header('Location: formVisita.php');

            }else{
                $_SESSION["validaEnvio"] = false;
                header('Location: formVisita.php');
            }
            
            
        ?>
    </body>
</html>