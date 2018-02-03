jQuery('.menu-item-81 a, .menu-item-258 a').on('click', function(e) {
	e.preventDefault();
	var $modal_id = "demoModal";

	jQuery('#'+$modal_id).parent().addClass('hb-visible-modal');

	setTimeout(function () {
        jQuery('#'+$modal_id).addClass('rendered animate-modal');
    }, 220);
	$body.addClass('no-scroll');
});