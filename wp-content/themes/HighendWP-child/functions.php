<?php

function highend_child_theme_enqueue_styles() {

    $parent_style = 'highend-parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'highend-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'highend_child_theme_enqueue_styles' );

function cta_banner_shortcode($atts) {
   extract(shortcode_atts(array(
      'width' => 400,
      'height' => 200,
   ), $atts));
return '<img src="https://lorempixel.com/'. $width . '/'. $height . '" />';
}
add_shortcode('cta_banner', 'cta_banner_shortcode');

?>
