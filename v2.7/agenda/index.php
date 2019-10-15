<?php
session_start ();//inicializa sessão

?>
<!DOCTYPE html>
<html lang ="pt-br">
<head>
  <meta charset='utf-8' />
  <link href='css/fullcalendar.min.css' rel='stylesheet'/>
  <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/personalizado.css"/>
  <link rel="stylesheet" href="css/main.min.css"/>

  

</head>

<body>
  <?php
   if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);//destroi msg
   }
  ?>
	<div id='calendar'></div>

	<!-- Janela Modal no clique  -->

  <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="janelaModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="janelaModal">Detalhe da Reserva</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
          <dl class="row">
            <dt class="col-sm-3">Nome do Evento</dt>
      			<dd class="col-sm-9" id="NomeEvento"></dd>

      			<dt class="col-sm-3">RA do Professor</dt>
      			<dd class="col-sm-9" id="RAProfessorReserva"></dd>

      			<dt class="col-sm-3">RGM do Monitor</dt>
      			<dd class="col-sm-9" id="RGMMonitorReserva"></dd>

      			<dt class="col-sm-3">Inicio da Reserva</dt>
      			<dd class="col-sm-9" id="InicioReserva"></dd>

      			<dt class="col-sm-3">Fim da Reserva</dt>
      			<dd class="col-sm-9" id="FimReserva"></dd>

            	<dt class="col-sm-3">Produto Usado</dt>
            	<dd class="col-sm-9" id="idprodutoUsado"></dd>
  		  </dl>
        </div>
      </div>
    </div>
  </div>

<!--Janela Modal para abrir popup e reservar brinquedoteca-->
<div class="modal fade" id="reservar" tabindex="-1" role="dialog" aria-labelledby="janelaModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="janelaModal">Reservar Laboratório</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
          <span id="msg-cad"></span>
        <form id="addevent" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nome do Evento: </label>
            <div class="col-sm-10">
              <input type="text" name="NomeEvento"class="form-control" id="NomeEvento" placeholder="Nome do Evento">
            </div>
          </div>  
            <!--TAG: name="mesmo nome do BD"-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Cor do Evento: </label> 
              <div class="col-sm-10"> 
                  <select name="CorReserva" class="form-control" id="color">
                    <option value="">Selecione</option>
                    <option style="color:#F27781;" value="#F27781">Rosa</option>
                    <option style="color:#18298C;" value="#18298C">Azul</option>
                    <option style="color:#04BF8A;" value="#04BF8A">Verde</option>
                    <option style="color:#F2CF1D;" value="#F2CF1D">Amarelo</option>
                    <option style="color:#F29F05;" value="#F29F05">Laranja</option>
                  </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Inicio da Reserva: </label>
              <div class="col-sm-10">
                <input type="text" name="InicioReserva"class="form-control" id="InicioReserva" onkeypress="DataHora(event, this)">
              </div>
            </div>  

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fim da Reserva: </label>
              <div class="col-sm-10">
                <input type="text" name="FimReserva"class="form-control" id="FimReserva"  onkeypress="DataHora(event, this)">
              </div>
            </div>
          <!--Botão de sucesso "Reservar"-->
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" name="CadReserva" id="CadReserva" value="CadReserva" class="btn btn-sucess"> Cadastrar </button>
            </div>
          </div>
        <!--Finaliza Formulário-->
        </form>
      </div>
    </div>
  </div>
</div>

  <script src='js/jquery.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.min.js'></script>
  <script src='locale/pt-br.js'></script>
  <script src="js/personalizado.js"></script>
  <script src="js/main.min.js"></script>

  

</body>
</html>
