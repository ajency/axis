
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

// var tooltip = document.querySelector('.country-name');
// var myicon = document.querySelector('.enabled');
// var iconPos = myicon.getBoundingClientRect();
// var colors = ["#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd", "#8c564b", "#e377c2", "#7f7f7f", "#bcbd22", "#17becf"];
// var contents = {};
// for (var i = 1; i <= 10; i++) {
// contents['tooltip' + i] = 'tooltip <b style="color:' + colors[i] + '">' + i + '</b>';
// }

// // iterate throw all `path` tags
// [].forEach.call(document.querySelectorAll('g.enabled'), function(item) {
// 	// attach click event, you can read the URL from a attribute for example.
//   item.addEventListener('click', function(){
//     window.open('http://google.co.il')
//   });

//   // attach mouseenter event
//   item.addEventListener('mouseenter', function() {
//     tooltip.innerHTML = contents[item.getAttribute('data-name')];
//     tooltip.style.display = 'block';
//   });

//   item.addEventListener('mousemove', function(e) {
//   	tooltip.style.top = (window.scrollY + iconPos.top - 60) + "px";
//     tooltip.style.left = e.clientX + 'px';
//   });

//   // when mouse leave hide the tooltip
//   item.addEventListener('mouseleave', function(){
//   	tooltip.style.display = 'none';
//   });
// });