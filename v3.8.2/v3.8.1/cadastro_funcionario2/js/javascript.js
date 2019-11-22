$(document).ready(function(){

	$('#Cargo').on('change', function(){
		var selectValor = '#'+$(this).val();
		
		$('#pai').children('div').hide();
		$('#pai').children(selectValor).show();
	});
});
