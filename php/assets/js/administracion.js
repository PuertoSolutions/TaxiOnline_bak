jQuery(function($){
	$("#permisos").submit(function(){
		var ids = new Array();
		for (var i=0; i < $('#permisos :input[name="permiso"].active').length; i++) {
			ids.push($($('#permisos :input[name="permiso"].active')[i]).attr("id"));
		}
		$("#aValidar").val(JSON.stringify(ids));
	});
})(jQuery);
