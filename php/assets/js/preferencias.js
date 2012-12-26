/**
 * @author Mario Cares
 */
$(document).ready(function(){
	$("#selectTemas").change(function(){
		$("link[type='text/css']").attr("href", "/assets/css/"+$(this).val()+"_bootstrap.min.css");
	});
});