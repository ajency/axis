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




function cta_banner_shortcode($atts){
   extract(shortcode_atts(array(

      'demo_title' => 'Want to know which combination of products can boost your revenue?',
      'button_text' => 'Schedule a Demo Now',
      'form_id' => '464',
      'form_title' => 'Schedule Demo',
      'modal_window_title' => 'Schedule A Demo'

   ), $atts));
   $modalshortcode =  do_shortcode('[modal_window title="'.$modal_window_title.'" invoke_title="'.$button_text.'" id="" show_on_load="no"]  [contact-form-7 id="'.$form_id.'" title="'.$form_title.'"] [/modal_window]');
   $html = '<div class="demo-banner"> ';
   $html .='<h5>'.$demo_title.'</h5>';
   $html .= $modalshortcode;
   $html .='</div>';
   return $html;

}
add_shortcode('cta_banner','cta_banner_shortcode');




function testimonials_gal_shortcode($atts)
 {
  extract(shortcode_atts(array(

      'title' => 'Title',
      'ids'   => ''

   ), $atts));
    global $post;
      if ($ids == '')
      {
        $array_id='';
      }

   else{
    $array_id=split(",",$ids);
   }


     $html = "";

    $query = new WP_Query(array(
    'post_type' => 'hb_testimonials',
    'post_status' => 'publish',
    'posts_per_page' => '5',
    'post__in' => $array_id

  ));
   $html .='<div class= "vc_row element-row row "> ';
   $html .='<div class="wpb_column vc_column_container vc_col-sm-12">';
   $html .='<div class="wpb_wrapper">';
   $html .='<div class="wpb_raw_code wpb_content_element wpb_raw_html">';
   $html .='<div class="wpb_wrapper">';
   $html .='<div class="axis_testimonials">';

  $count=0;
  while ($query->have_posts()){
    $query->the_post();
    $post_id = get_the_ID();
    $post = get_post($post_id);
    $logo = get_post_meta($post->ID, "wpcf-logo", true);;
    $content = apply_filters('the_content', $post->post_content);
    // $trim_content = mb_strimwidth($content, 0, 127, '...');

    $key_1_values = get_post_meta($post_id);


     foreach($key_1_values as $key=>$val)
     {
        if ($key=='testimonial_type_settings')
        {
          $temp= $val[0];
          $s='"';
          $array_temp=split($s,$temp);
        }

    }

    $post_title= the_title_attribute( 'echo=0' );
    $count=$count+1;


    if($count == 3)
      {
        $html .='</div>';
        $html .='<div class="column2">';
        $html .='<div class="single_testimonial">';
        $html .='<h5>  Why people believe in us </h5>';
        $html .='<div class="single_testimonial_content">';
        $html .='Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $html .='</div>';
        $html .='</div>';
      }
    else if($count == 1)
      {
        $html .='<div class="column1">';
      }
    else if($count == 4)
      {
        $html .='</div>';
        $html .='<div class="column3">';
      }

    if($count == 2 || $count == 5)
      {
        $html .='<div class="single_testimonial">';
      }
    else if($count==3)
      {
        $html .='<div class="single_testimonial bg2">';
      }
    else
      {
        $html .='<div class="single_testimonial bg1">';
      }
       $html .='<div class="single_testimonial_logo"> ';
       $html .='<img src="'.$logo.'">';
       $html .='</div>';
       $html .='<div class="single_testimonial_content">';
       $html .=$array_temp[7];
       $html .='</div>';
       $html .='<div class="single_testimonial_author">';
       $html .='-'.$array_temp[3];
       $html .='</div>';
       $html .='</div>';
     if ($count ==5)
     {
      $html .='</div>';
     }

  }
  wp_reset_query();

 $html .='</div>';
 $html .='</div>';
 $html .='</div>';
 $html .='</div>';
 $html .='</div>';
 $html .='</div>';

  return $html;
}
add_shortcode('testimonials_gal','testimonials_gal_shortcode');




// Special Header style setting for product page
function save_wpse44966_meta_box_cb( $post_id){
 if(isset($_REQUEST['post_type'])){
   if($_REQUEST['post_type']=='products' || 'single-product'){

     $misc_settings=array( 'hb_boxed_stretched_page' => "default" ,
       'hb_page_extra_class' => "dark-footer",
       'hb_special_header_style' => 0 , // 1 for on, 0 for off
       'hb_page_alternative_logo' => "");

       update_post_meta( $post_id, 'misc_settings', $misc_settings);
   }
 }
}
add_action('save_post', 'save_wpse44966_meta_box_cb');



remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

?>
