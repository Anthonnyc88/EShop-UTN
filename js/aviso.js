function confirmar(){
    var confirm= alertify.confirm('Probando confirm','You really want to eliminate this driver?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'}); 
    //callbak al pulsar botón positivo
    confirm.set('onok', function(){
        alertify.success('confirmed');
    });
    //callbak al pulsar botón negativo
    confirm.set('oncancel', function(){ 
        alertify.error('cancelled');
    })	
}
$(document).ready(function(){
$("#btnDl").click(function () {
	confirmar();
	});
});
$(document).ready(function(){
	var estado = false;
	$('#btn-toggle').on('click',function(){
		$('.seccionToggle').slideToggle();
		
		if (estado == true) {
			$(this).text("Remove Driver");
			$('body').css({
				"overflow": "auto"
			});
			estado = false;
		} else {
			$(this).text("Cerrar");
			$('body').css({
				"overflow": "hidden"
			});
			estado = true;
		}
	});
});


