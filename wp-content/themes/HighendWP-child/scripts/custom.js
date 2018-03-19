
// Pricing page add class to section
jQuery('.pricing-bottom-row').parent().addClass('pricing-bottom-row-parent')

jQuery('body').on('click', '.apply-btn', function(e){
	e.preventDefault();
	jQuery('html, body').animate({
		scrollTop: jQuery(".apply-section").offset().top - 80
	}, 500);
});


// Trigger Schedule a Demo Modal
jQuery('body').on('click', '.schedule-demo-trigger a, .schedule-demo-trigger button', function(e) {
	e.preventDefault();
	var $modal_id = "demoModal";

	jQuery('#'+$modal_id).parent().addClass('hb-visible-modal');

	setTimeout(function () {
		jQuery('#'+$modal_id).addClass('rendered animate-modal');
	}, 220);
	$body.addClass('no-scroll');
});

// Trigger Enquiry Modal
jQuery('body').on('click', '.menu-item-81 a, .menu-item-258 a', function(e) {
	e.preventDefault();
	var $modal_id = "enquireModal";

	jQuery('#'+$modal_id).parent().addClass('hb-visible-modal');

	setTimeout(function () {
		jQuery('#'+$modal_id).addClass('rendered animate-modal');
	}, 220);
	$body.addClass('no-scroll');
});

// Trigger Feedback Modal
jQuery('body').on('click', '.feedback-modal-trigger', function(e) {
	e.preventDefault();
	var $modal_id = "feedbackModal";

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
	} else if (jQuery(this).closest('.pricing-block').hasClass('hotel-exchange-block')){
		jQuery('.vc_tta-tab a[href="#hotel-exchange-tab"]').trigger('click')
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
	} else if (jQuery(this).attr('href')=='#hotel-exchange-tab'){
		jQuery('.hotel-exchange-heading').siblings('.pricing-tabs-heading').addClass('hidden');
		jQuery('.hotel-exchange-heading').removeClass('hidden');
	} else if (jQuery(this).attr('href')=='#rate-shopper-tab'){
		jQuery('.rate-shopper-heading').siblings('.pricing-tabs-heading').addClass('hidden');
		jQuery('.rate-shopper-heading').removeClass('hidden');
	}
});

// Auto check product on pricing page
jQuery('body').on('click', '.purchase-block a', function(){
	if (jQuery(this).closest('.vc_tta-panel').is('#channel-manager-tab')){
		jQuery('input[value="Channel Manager"]').attr('checked', true);
		jQuery('input[value!="Channel Manager"]').attr('checked', false);
	} else if (jQuery(this).closest('.vc_tta-panel').is('#booking-engine-tab')){
		jQuery('input[value="Hotel Booking Engine"]').attr('checked', true);
		jQuery('input[value!="Hotel Booking Engine"]').attr('checked', false);
	} else if (jQuery(this).closest('.vc_tta-panel').is('#crs-tab')){
		jQuery('input[value="Central Reservation System"]').attr('checked', true);
		jQuery('input[value!="Central Reservation System"]').attr('checked', false);
	} else if (jQuery(this).closest('.vc_tta-panel').is('#rms-tab')){
		jQuery('input[value="Revenue Management System"]').attr('checked', true);
		jQuery('input[value!="Revenue Management System"]').attr('checked', false);
	} else if (jQuery(this).closest('.vc_tta-panel').is('#hotel-exchange-tab')){
		jQuery('input[value="Hotel Exchange"]').attr('checked', true);
		jQuery('input[value!="Hotel Exchange"]').attr('checked', false);
	} else if (jQuery(this).closest('.vc_tta-panel').is('#rate-shopper-tab')){
		jQuery('input[value="Rate Shopper"]').attr('checked', true);
		jQuery('input[value!="Rate Shopper"]').attr('checked', false);
	}
});

// Remove validation messages from contactform7
jQuery('body').on('keydown', 'input', function(){
    if(jQuery(this).hasClass('wpcf7-not-valid')){
        jQuery(this).removeClass('wpcf7-not-valid');
        jQuery(this).closest('.wpcf7-form-control-wrap').find('.wpcf7-not-valid-tip').remove();
        jQuery(this).parent().removeClass('.mdc-textfield--invalid');
    }
});

// Remove validation messages from formidable form
jQuery('body').on('keydown', 'input, textarea', function(){
    if(jQuery(this).parent().hasClass('frm_blank_field')){
        jQuery(this).parent().removeClass('frm_blank_field');
        jQuery(this).closest('.frm_form_field').find('.frm_error').remove();
    }
});


// $description = jQuery(".country-name");

//   jQuery('.enabled').hover(function() {

//     jQuery(this).attr("class", "enabled heyo");
//     $description.addClass('active');
//     $description.html(jQuery(this).data('name'));
//   }, function() {
//     $description.removeClass('active');
//   });

// jQuery(document).on('mousemove', function(e){

//   $description.css({
//     left:  e.clientX - 30,
//     top:   e.clientY - 400
//   });

// });



var timeout;
jQuery(".enabled").hover(
  function() {
    clearTimeout(timeout);
    jQuery('.country-name').css({
      'display':'block',
      'position':'fixed',
      'top':jQuery(this).offset().top - jQuery(window).scrollTop() - 40,
      'left':jQuery(this).offset().left - 35
    });
    jQuery('.country-name').html(jQuery(this).data('name'));
  },
  function(){
  	timeout = setTimeout(function(){
    	jQuery('.country-name').css('display','none');
      },1000);
  });


if (jQuery(window).width() < 768) {
	if (jQuery('.product-form').length > 0) {
		jQuery(".product-form").detach().appendTo(".product-form-clone-wrapper .wpb_wrapper");
	}
}

/* Testimonial Slider */
if ( jQuery('.init-testimonial-slider').length ){
	jQuery('.init-testimonial-slider').each(function(){
		var $that = jQuery(this);
		var $speed = jQuery(this).attr('data-slideshow-speed');

		if ($speed < 1000){
			$speed = 1000;
		}

		$that.flexslider({
			selector: ".testimonial-slider > li",
			slideshow: true,
			animation: "fade",
			smoothHeight: true,
			slideshowSpeed: $speed,
			animationSpeed: 350,
			directionNavArrowsLeft : '<i class="icon-chevron-left"></i>',
			directionNavArrowsRight : '<i class="icon-chevron-right"></i>',
			pauseOnHover: false,
			controlNav: true,
			directionNav:false,
			prevText: "",
			nextText: ""
		});
	});
}

// Feedback popup trigger
// jQuery("body").on("click", ".close-feedback", function(){
//     jQuery(".feedback-holder").hide();
//     jQuery(".feedback-trigger").show();
// });
// jQuery("body").on("click", ".feedback-trigger", function(){
//     jQuery(".feedback-holder").show();
//     jQuery(this).hide();
// });

scroll_top = jQuery('.feedback-trigger.feedback-modal-trigger'),
view_trigger = function() {

	var st = jQuery(window).scrollTop();
 	if(st < 350) {
		scroll_top.removeClass('trigger-visible');
	}

	else if(!scroll_top.is('.trigger-visible')) {
		scroll_top.addClass('trigger-visible');
	}
};
view_trigger();