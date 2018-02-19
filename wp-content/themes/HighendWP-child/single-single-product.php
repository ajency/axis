<?php
/**
 * @package WordPress
 * @subpackage Highend
 */

?>

<?php get_header(); ?>


<?php
	$gradient1 = get_post_meta($post->ID, "wpcf-gradient1", true);
	$gradient2 = get_post_meta($post->ID, "wpcf-gradient2", true);
	$image1 = get_post_meta($post->ID, "wpcf-image-1", true);
?>
<style type="text/css">
	.single-single-product .product-form #cf7md-form .mdc-button--primary.mdc-button--raised,
	.single-products .product-form #cf7md-form .mdc-button--primary.mdc-button--raised{
		background-color: <?php echo $gradient1 ?>;
	}
</style>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="product-header" style="background: -webkit-linear-gradient(left, <?php echo $gradient1 ?>, <?php echo $gradient2 ?>);">
		<?php if (! is_attachment() ) { ?>
		<!-- BEGIN .post-header -->
		<div class="container">
			<div class="vc_row row">
				<div class="vc_col-sm-7">
					<div class="product-header_text">
						<!-- <i class="hb-moon-lamp-4"></i> -->
						<div class="post-header">
							<h1 class="title entry-title" itemprop="headline"><?php the_title(); ?></h1>
							<p><?php the_excerpt(); ?></p>
						</div>
					</div>
					<div class="product-header_logos">
						<img src="<?php echo $image1 ?>">
					</div>
				</div>
				<div class="vc_col-sm-5">
					<div class="product-form">
						<h5>See <?php the_title(); ?> in action</h5>
						<p>Tell us how we can reach you for a free demo</p>

						<?php echo do_shortcode( '[formidable id=9]' ); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- END .post-header -->
		<?php } ?>
	</div>
<?php endwhile; endif; ?>

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
		<div class="col-12 hb-main-content">
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

		<?php endwhile; endif; ?>

	</div>

	</div>
</div>
<!-- END #main-content -->
<?php get_footer(); ?>