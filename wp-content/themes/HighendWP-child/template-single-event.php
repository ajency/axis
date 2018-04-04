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

<div class="event-header">
	<h1>Webinars</h1>
</div>

<!-- BEGIN #main-content -->
<div id="main-content">
	<div class="container">

	<div class="row main-row">

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

<?php get_footer(); ?>