<?php
/**
 * @package WordPress
 * @subpackage Highend
 */
/*
	Template Name: Single Event
*/
?>

<?php get_header(); ?>

<?php
	$speaker_name = get_post_meta($post->ID, "wpcf-speaker-name", true);
	$speaker_photo = get_post_meta($post->ID, "wpcf-speaker-photo", true);
?>

<div class="event-header">
	<h1>Webinars</h1>
</div>

<!-- BEGIN #main-content -->
<div id="main-content">
	<div class="container">

		<?php
			$sidebar_layout = vp_metabox('layout_settings.hb_page_layout_sidebar');
			$sidebar_name = vp_metabox('layout_settings.hb_choose_sidebar');

			if ( $sidebar_layout == "default" || $sidebar_layout == "" ) {
				$sidebar_layout = hb_options('hb_page_layout_sidebar');
				$sidebar_name = hb_options('hb_choose_sidebar');
			}

			$pagination_style = vp_metabox('page_settings.hb_pagination_settings.0.hb_pagination_style');
			$blog_grid_column_class = vp_metabox('page_settings.hb_blog_grid_settings.0.hb_grid_columns');
		?>

	<div class="row <?php echo $sidebar_layout; ?> main-row">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<!-- BEGIN .hb-main-content -->
		<div class="col-8 ">
			<!-- BEGIN #single-blog-wrapper -->
			<div class="single-blog-wrapper clearfix">
				<!-- BEGIN .hentry -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( get_post_format() . '-post-format single' ); ?> itemscope itemType="http://schema.org/BlogPosting">
					<?php
					if ( hb_options('hb_blog_enable_featured_image') && vp_metabox('general_settings.hb_hide_featured_image') == 0 )
						get_template_part('includes/single' , 'featured-format' ) ;
					?>

					<!-- BEGIN .single-post-content -->
					<div class="single-post-content">

						<?php if ( !has_post_format('quote') && !has_post_format('link') && !has_post_format('status') ) {?>
						<!-- BEGIN .entry-content -->
						<div class="entry-content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							<div class="page-links"><?php wp_link_pages(array('next_or_number'=>'next', 'previouspagelink' => ' <i class="icon-angle-left"></i> ', 'nextpagelink'=>' <i class="icon-angle-right"></i>')); ?></div>
						</div>
						<!-- END .entry-content -->
						<?php } ?>

						<?php
							if ( hb_options('hb_blog_enable_tags' ) )
								the_tags('<div class="single-post-tags"><span>Tags: </span>','','</div>');
						?>

					</div>
					<!-- END .single-post-content -->
				</article>

				<?php if ( hb_options('hb_blog_author_info') && is_singular('post')) {
					get_template_part('includes/post','author-info');
				}

				if ( hb_options('hb_blog_enable_related_posts') ) {
					get_template_part('includes/post','related-articles');
				} ?>

			</div>
			<!-- END #single-blog-wrapper -->
			<?php if (! is_attachment() ) {
				if ( comments_open() ) comments_template();
			} ?>

		</div>
		<!-- END .hb-main-content -->

		<div class="col-4">
			<?php if (isset($speaker_name)  && ($speaker_name == true) ) { ?>
				<div class="speaker-details">
					<h5>Speaker Details</h5>
					<div class="speaker-img"><img src="<?php echo $speaker_photo; ?>"></div>
					<h6><?php echo $speaker_name; ?></h6>
				</div>
			<?php } ?>
			<div class="gray-bg">
				<div class="vertical-banner">
					<?php echo do_shortcode('[cta_banner]') ?>
				</div>
			</div>
		</div>

		<?php endwhile; endif; ?>

	</div>

	</div>
</div>
<!-- END #main-content -->

<script type="text/javascript">
	jQuery('body').addClass('dark-footer');
</script>

<?php get_footer(); ?>