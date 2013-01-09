$(document).ready(function(){
	$(".clickeable").click(function(){
		if(confirm("Asegúrate de ver si tienes móviles disponibles \n ¿ Aceptas el pedido ?")){
			try{
				var id = $(this).attr("id");
				$.post("/Reserva/CambiaEstado", {"id": id}, function(data){
					var pedido = $.parseJSON(data);
					if(pedido.Mensaje){
						alert(pedido.Mensaje);
						document.location.reload(true);
					}else{
						$("#origen").val(pedido.Origen);
						$("#destino").val(pedido.Destino);
						$("#telefono").val(pedido.Telefono);
					}
				}).success(function(){
					$("#"+id).remove();
					$('#myModal').modal('toggle');
				});
			}catch(e){
				alert(e.toString());
			}
		}
	});
});