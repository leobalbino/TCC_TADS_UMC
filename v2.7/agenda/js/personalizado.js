$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev, next, today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'			
				},
				locale : 'pt-br',
			//defaultDate: '2017-10-12', //Não settar data
			navLinks: true, // Links de navegação Hoje, Semana, Mês
			editable: true,
			eventLimit: true, // Limitação de visualização de  eventos por dia, mais que isso usa-se o "+"
			events: 'lista_reservas.php',
			//Se tivermos problema com o caching segue codigo:
			extraParams: function (){
				return {
					cachebuster: new Date ().valueOf()

				}
			},
			  eventClick: function(info) { //Abrir as info na Janela Modal de detalhe do evento
			  	 info.jsEvent.preventDefault(); //Não deixa o browser navegar

    			$('#visualizar #RAProfessorReserva'). text (info.event.RAProfessorReserva);
    			$('#visualizar #RGMMonitorReserva'). text (info.event.RGMMonitorReserva);
    			$('#visualizar #NomeEvento'). text (info.event.NomeEvento);
    			$('#visualizar #InicioReserva'). text (info.event.InicioReserva.toLocaleString());
    			$('#visualizar #FimReserva'). text (info.event.FimReserva.toLocaleString());

    			$('#visualizar').modal('show');

  			},
  			//Clicar em cada dia do mês
  			  selectable: true,
  			  
  			  //Clicar no dia e ele trazer a data daquele dia
  			  select: function(info) {
      			//alert('Inicio da Reserva: ' + info.startStr.toLocaleString());
      			$('#reservar #InicioReserva').val(info.start.toLocaleString());
      			$('#reservar #FimReserva').val(info.end.toLocaleString());
      			$('#reservar').modal ('show');
   				}

			});
		calendar.render();
	});
//Mascara para o campo data e hora

function DataHora (evento, objeto){

	var keypress = (window.event) ? event.keyCode : evento.which;
	campo = eval (objeto);
	if (campo.value == '00/00/0000 00:00:00'){
		campo.value = "";
	}

	caracteres = '0123456789';
	separacao1 = '/';
	separacao2 = ' ' ;
	separacao3 = ':';
	conjunto1 = 2;
	conjunto2 = 5;
	conjunto3 = 10;
	conjunto4 = 13;
	conjunto5 = 16;
	if ((caracteres.search(String.fromCharCode (keypress)) != -1) && campo.value.lenght < (19)) {
		if (campo.value.lenght == conjunto1)
			campo.value = campo.value + separacao1;
		else if (campo.value.lenght == conjunto2)
			campo.value = campo.value + separacao1;
		else if (campo.value.lenght == conjunto3)
			campo.value = campo.value + separacao2;
		else if (campo.value.lenght == conjunto4)
			campo.value = campo.value + separacao3;
		else if (campo.value.lenght == conjunto5)
			campo.value = campo.value + separacao3;
	} else {
		event.returnValue = false;
	}

}

$(document).ready(function () {

	$("#addevent").on("submit", function (event) {

		event.preventDefault(); //Não mexar a janela modal até autorizar
		$.ajax ({
			method: "POST",
			url: "agenda/CadReserva.php",
			data: new FormData(this),
			contentType: false,
			processData: false, //recebendo do arquivo cad
			sucess: function(retorna) { 
				if(retorna['sit']){
					//$("#msg-cad").html(retorna['msg']);
					location.reload();
				} else {
					$("#msg-cad").html(retorna['msg']);
				}
			}
		});
		});

});


	