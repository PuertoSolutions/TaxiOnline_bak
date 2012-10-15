$(document).ready(function(){
	try{
		$.get("/Querys/Calles", {}, function(data){
			var ObjCalles = $.parseJSON(data);
			var calles = new Array();
			for(x in ObjCalles){
				calles.push(ObjCalles[x].Calle);
			}
			$('#origen').typeahead({source: calles})
			$('#destino').typeahead({source: calles})
		});
	}catch(e){
		alert(e.toString());
	}
});