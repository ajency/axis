<?php
/**
 * @package WordPress
 * @subpackage Highend
 */
?>
<?php get_header(); ?>

	<?php

		if ( hb_module_enabled('hb_module_not_found_page') ) {
			$title = hb_options('hb_404_title');
			$subtitle = hb_options('hb_404_subtitle');
			$button_caption = hb_options('hb_404_button_caption');
			$icon = hb_options('hb_404_icon');
		} else {
			$title = __("Something isn't right","hbthemes");
			$subtitle = __("Sorry, but we couldn't find the content you were looking for.", "hbthemes");
			$button_caption = __("Back to our Home", "hbthemes");
			$icon = "hb-moon-direction";
		}
	?>


	<!-- BEGIN #main-content -->
	<div id="main-content">
	<div class="container">

		<div class="not-found-box aligncenter">

			<div class="not-found-box-inner axis-green-btn">
				<h2 class="">You seem to have lost your way.</h2>
				<h4 class="additional-desc">Don't worry. Click the button below to continue browsing our site.</h4>
				<div class="hb-separator-s-1"></div>
				<a href="<?php echo home_url(); ?>" class="n">Take me home!</a>
			</div>

			<i class="hb-moon-direction"></i>
		</div>

	</div>
	<!-- END .container -->

	</div>
	<!-- END #main-content -->

	<script type="text/javascript">
		jQuery('body').addClass('dark-footer');
	</script>

<?php get_footer(); ?>