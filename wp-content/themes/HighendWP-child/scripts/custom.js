jQuery('.menu-item-81 a, .menu-item-258 a, .schedule-demo-trigger a, .schedule-demo-trigger button').on('click', function(e) {
	e.preventDefault();
	var $modal_id = "demoModal";

	jQuery('#'+$modal_id).parent().addClass('hb-visible-modal');

	setTimeout(function () {
        jQuery('#'+$modal_id).addClass('rendered animate-modal');
    }, 220);
	$body.addClass('no-scroll');
});

jQuery('body').on('click', '.pricing-block a', function(){
	if (jQuery(this).closest('.pricing-block').hasClass('channel-manager-block')){
		jQuery('.vc_tta-tab a[href="#channel-manager-tab"]').trigger('click')
	} else if (jQuery(this).closest('.pricing-block').hasClass('booking-engine-block')){
		jQuery('.vc_tta-tab a[href="#booking-engine-tab"]').trigger('click')
	}
});

jQuery('body').on('click', '.pricing-block a', function(){
	if (jQuery(this).attr('href')=='#channel-manager-tab'){
		jQuery('.channel-manager-heading').siblings('.pricing-tabs-heading').addClass('hidden');
		jQuery('.channel-manager-heading').removeClass('hidden');
	} else if (jQuery(this).attr('href')=='#booking-engine-tab'){
		jQuery('.booking-engine-heading').siblings('.pricing-tabs-heading').addClass('hidden');
		jQuery('.booking-engine-heading').removeClass('hidden');
	} else if (jQuery(this).attr('href')=='#crs-tab'){
		jQuery('.crs-heading').siblings('.pricing-tabs-heading').addClass('hidden');
		jQuery('.crs-heading').removeClass('hidden');
	} else if (jQuery(this).attr('href')=='#rms-tab'){
		jQuery('.rms-heading').siblings('.pricing-tabs-heading').addClass('hidden');
		jQuery('.rms-heading').removeClass('hidden');
	} else if (jQuery(this).attr('href')=='#rate-shopper-tab'){
		jQuery('.rate-shopper-heading').siblings('.pricing-tabs-heading').addClass('hidden');
		jQuery('.rate-shopper-heading').removeClass('hidden');
	}
});