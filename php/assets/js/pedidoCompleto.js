jQuery(function($){

	$('#dp1').datepicker();

	$('#tp1').timepicker({
        minuteStep: 10,
        showInputs: false,
        disableFocus: true,
        showMeridian: false
    });
})(jQuery);