<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <link href='css/core/main.min.css' rel='stylesheet' />
        <link href='css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/personalizado.css">

        <script src='js/core/main.min.js'></script>
        <script src='js/interaction/main.min.js'></script>
        <script src='js/daygrid/main.min.js'></script>
        <script src='js/core/locales/pt-br.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/personalizado.js"></script>
    </head>
    <body>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div id='calendar'></div>

        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhes da Reserva</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        <span id="msg-cad"></span>
                        <dl class="row">
                            <dt class="col-sm-3">Nome do Evento</dt>
                            <dd class="col-sm-9" id="NomeEvento"></dd>

                            <dt class="col-sm-3">Instituição</dt>
                            <dd class="col-sm-9" id="Instituicao"></dd>

                            <dt class="col-sm-3">Início do evento</dt>
                            <dd class="col-sm-9" id="InicioReserva"></dd>

                            <dt class="col-sm-3">Fim do evento</dt>
                            <dd class="col-sm-9" id="FimReserva"></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div> <!--FIM div modal fade-->

        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <span id="msg-cad"></span>

                        <!--FORMULARIO-->
                        <form id="addevent" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NomeEvento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="NomeEvento" class="form-control" id="NomeEvento" placeholder="Nome do evento">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Instituição</label>
                                <div class="col-sm-10">
                                    <input type="text" name="Instituicao" class="form-control" id="Instituicao" placeholder="Instituição">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cor</label>
                                <div class="col-sm-10"> 
                                    <select name="CorReserva" class="form-control" id="CorReserva">
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
                                <label class="col-sm-2 col-form-label">Início do evento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="InicioReserva" class="form-control" id="InicioReserva" onkeypress="DataHora(event, this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Final do evento</label>
                                <div class="col-sm-10">
                                    <input type="text" name="FimReserva" class="form-control" id="FimReserva"  onkeypress="DataHora(event, this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button> 
                                </div>
                            </div>

                        </form>
                    </div> <!--FIM div--class="modal-body"> -->
                </div> <!--fim modal content-->
            </div> <!--fim role document-->
        </div> <!--fim div cadastrar-->
    </body>
</html>
