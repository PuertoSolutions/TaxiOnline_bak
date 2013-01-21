jQuery(function($){
	$(".clickeable").click(function(){
		$('#modalPedido').modal('toggle');
		if($(this).children('td.tomado').text()){
			$(".alerta").show();
			$(".confirma").hide();
		}else{
			$(".alerta").hide();
			$(".confirma").show();
		}
		var id = $(this).attr("id");
		$("#CancelarPedido").attr("data-id", id);
		$("#CancelarPedido").attr("data-tipo", $(this).children('td.tipo').text());
	});

	$("#CancelarPedido").click(function(){
		$.post("/Reserva/Cancela", {id: $(this).attr("data-id"), tipo: $(this).attr("data-tipo")}, 
			function(data){
				var tmp = $.parseJSON(data);
				alert(tmp.Mensaje);
				window.location.reload();
			}
		);
	});
})(jQuery);