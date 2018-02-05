jQuery('.menu-item-81 a, .menu-item-258 a, .schedule-demo-trigger a, .schedule-demo-trigger button').on('click', function(e) {
	e.preventDefault();
	var $modal_id = "demoModal";

	jQuery('#'+$modal_id).parent().addClass('hb-visible-modal');

	setTimeout(function () {
        jQuery('#'+$modal_id).addClass('rendered animate-modal');
    }, 220);
	$body.addClass('no-scroll');
});

jQuery('body').on('click', '.pricing-tabs a', function(){
	if (jQuery(this).attr('href')=='#booking-engine-tab'){
		jQuery('.booking-engine-heading').siblings('.vc_row element-row').addClass('hidden');
		jQuery('.booking-engine-heading').removeClass('hidden');
	}
});