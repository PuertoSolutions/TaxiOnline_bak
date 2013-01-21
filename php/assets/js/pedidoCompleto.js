jQuery(function($){

	$('#dp1').datepicker();

	$('#tp1').timepicker({
        minuteStep: 10,
        showInputs: false,
        disableFocus: true,
        showMeridian: false
    });

    $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard').find('.bar').css({width:$percent+'%'});
	}});
    
})(jQuery);