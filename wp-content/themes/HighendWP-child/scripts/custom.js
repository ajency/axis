
// Pricing page add class to section
jQuery('.pricing-bottom-row').parent().addClass('pricing-bottom-row-parent')

jQuery('body').on('click', '.apply-btn', function(e){
	e.preventDefault();
	jQuery('html, body').animate({
		scrollTop: jQuery(".apply-section").offset().top - 80
	}, 500);
});


// Trigger Schedule a Demo Modal
jQuery('.menu-item-81 a, .menu-item-258 a, .schedule-demo-trigger a, .schedule-demo-trigger button').on('click', function(e) {
	e.preventDefault();
	var $modal_id = "demoModal";

	jQuery('#'+$modal_id).parent().addClass('hb-visible-modal');

	setTimeout(function () {
		jQuery('#'+$modal_id).addClass('rendered animate-modal');
	}, 220);
	$body.addClass('no-scroll');
});

// Close modal on backdrop click
jQuery('body').on('click touchstart', '.crop-here.hb-visible-modal', function (e) {
	if (e.target == this){
		e.preventDefault();
		jQuery('.hb-modal-window').removeClass('animate-modal');
		$body.removeClass('no-scroll');
		jQuery('.crop-here').removeClass('hb-visible-modal');
	}
});
jQuery(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        jQuery('.hb-modal-window').removeClass('animate-modal');
		$body.removeClass('no-scroll');
		jQuery('.crop-here').removeClass('hb-visible-modal');
    }
});


// Switch tab in modal on pricing page
jQuery('body').on('click', '.pricing-block a', function(){
	if (jQuery(this).closest('.pricing-block').hasClass('channel-manager-block')){
		jQuery('.vc_tta-tab a[href="#channel-manager-tab"]').trigger('click')
	} else if (jQuery(this).closest('.pricing-block').hasClass('booking-engine-block')){
		jQuery('.vc_tta-tab a[href="#booking-engine-tab"]').trigger('click')
	} else if (jQuery(this).closest('.pricing-block').hasClass('crs-block')){
		jQuery('.vc_tta-tab a[href="#crs-tab"]').trigger('click')
	} else if (jQuery(this).closest('.pricing-block').hasClass('rms-block')){
		jQuery('.vc_tta-tab a[href="#rms-tab"]').trigger('click')
	} else if (jQuery(this).closest('.pricing-block').hasClass('rate-shopper-block')){
		jQuery('.vc_tta-tab a[href="#rate-shopper-tab"]').trigger('click')
	}
});


// Change modal header on pricing tab switch
jQuery('body').on('click', '.pricing-tabs a', function(){
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