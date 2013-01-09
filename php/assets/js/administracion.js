jQuery(function($){
	
	$('#toggle-button').toggleButtons({
		onChange: function ($el, status, e) {
			// $el = $('#toggle-button');
			// status = [true, false], the value of the checkbox
			// e = the event
			console.log($el, status, e);
			if(status){
				$("#estado_empresa").val("Activo")
			}else{
				$("#estado_empresa").val("Espera")
			}
		},
		width: 160, height: 25, font: {'font-size': '20px',  'font-style': 'italic'}, animated: true, transitionspeed: 0.5,
		label: {enabled: "Activo", disabled: "Espera"},
		style: {
			enabled: "primary", disabled: "danger",
			custom: {
				enabled: {background:"#FF00FF", gradient: "#D300D3", color: "#FFFFFF"},
				disabled: {background: "#FFAA00", gradient: "#DD9900", color: "#333333"}
			}
		}
	});
	
	$(".tr_click").click(function(){
		var id = $(this).attr("id")
		$.get("/Admin/Query/Empresa/"+id, function(data){
			try{
				var empresa = $.parseJSON(data)[0];
				$("#NombreEmpresa").html(empresa["Nombre"] );
				$("#nombre_contacto").val(empresa.Contacto.Nombre);
				$("#mail_contacto").val(empresa.Contacto.Mail);
				$("#telefono_contacto").val(empresa.Contacto.Telefono);
				$("#nombre_sistema").val(empresa.NombreSistema);
				$("#id_empresa").val(id);
				if(empresa.Estado == "Espera"){
					$('#toggle-button').toggleButtons('toggleState');
				}
			}catch(e){
				alert(e.toString());
			}
		});
	});
})(jQuery);
