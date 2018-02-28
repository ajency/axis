<?php

function highend_child_theme_enqueue_styles() {

  $parent_style = 'highend-parent-style';

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

  // wp_enqueue_style( 'highend-child-style',
  //     get_stylesheet_directory_uri() . '/style.css',
  //     array( $parent_style )
  // );
}
add_action( 'wp_enqueue_scripts', 'highend_child_theme_enqueue_styles' );


function axis_adding_scripts() {
  wp_register_script('axis_custom_script', get_stylesheet_directory_uri() . '/scripts/custom.js', array('jquery'),'1.0', true);
  wp_enqueue_script('axis_custom_script');
}
add_action( 'wp_enqueue_scripts', 'axis_adding_scripts', 11, 1 );


function cta_banner_shortcode($atts){
   extract(shortcode_atts(array(

      'demo_title' => 'Want to know which combination of products can boost your revenue?',
      'button_text' => 'Schedule a Demo Now',
      'form_id' => '8',
      'form_title' => 'Schedule Demo',
      'modal_window_title' => 'Schedule A Demo'

   ), $atts));
   $modalshortcode =  do_shortcode('[modal_window title="'.$modal_window_title.'" invoke_title="'.$button_text.'" id="demoModal" show_on_load="no"] [formidable id='.$form_id.']  [/modal_window]');
   $html = '<div class="demo-banner"> ';
   $html .='<h5>'.$demo_title.'</h5>';
   $html .= $modalshortcode;
   $html .='</div>';
   return $html;

}
add_shortcode('cta_banner','cta_banner_shortcode');


function menu_enquire_shortcode($atts){
   extract(shortcode_atts(array(

      'demo_title' => 'Want to know which combination of products can boost your revenue?',
      'button_text' => 'Send Enquiry',
      'form_id' => '13',
      'modal_window_title' => 'Contact Us'

   ), $atts));
   $modalshortcode =  do_shortcode('[modal_window title="'.$modal_window_title.'" invoke_title="'.$button_text.'" id="enquireModal" show_on_load="no"] [formidable id='.$form_id.']  [/modal_window]');
}
add_shortcode('menu_modal','menu_enquire_shortcode');



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
    $array_id=explode(",",$ids);
   }


     $html = "";

    $query = new WP_Query(array(
    'post_type' => 'hb_testimonials',
    'post_status' => 'publish',
    'posts_per_page' => '5',
    'orderby' => 'post__in',
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
    $logo = get_post_meta($post->ID, "wpcf-company-logo", true);
    $excerpt = get_post_meta($post->ID, "wpcf-excerpt", true);
    $content = apply_filters('the_content', $post->post_content);
    // $trim_content = mb_strimwidth($content, 0, 127, '...');

    $key_1_values = get_post_meta($post_id);


     foreach($key_1_values as $key=>$val)
     {
        if ($key=='testimonial_type_settings')
        {
          $temp= $val[0];
          $s='"';
          $array_temp=explode($s,$temp);
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
        $html .='We Understand Hotels, Like No One Does';
        $html .='</div>';
        $html .='<div class="mobile_scroll_indicator">';
        $html .='Swipe for more';
        $html .='<div class="slide-left">';
        $html .='</div>';
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
       $html .= do_shortcode($excerpt);
       $html .='</div>';
       $html .='<div class="single_testimonial_author">';
       $html .= $array_temp[3];
       $html .='<br>';
       $html .='<small>';
       $html .= $array_temp[7];
       $html .='</small>';
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


function hb_team_member_box( $post_id , $style = "", $excerpt_length_custom = 40 ){
  $testimonial_post = get_post($post_id);
  if ( $testimonial_post ) {
    setup_postdata($testimonial_post);
    $thumb = get_post_thumbnail_id();

  if ( $style != "" ) $style = " tmb-2";
  ?>

  <!-- BEGIN .team-member-box -->
  <div class="team-member-box<?php echo $style; ?>">

    <div class="">
      <?php if ( $thumb ) {
        $image = hb_resize ( $thumb, '', 350, 350, true);
        if ( $image ) { ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>"/>
      <?php } ?>

      <?php
      }
      ?>

    </div>
    <div class="spacer" style="height:15px;"></div>

    <!-- START .team-member-description -->
    <div class="team-member-description">

      <!-- START .team-header-info -->
      <div class="team-header-info clearfix">

        <!-- START .team-header-name -->
        <div class="team-name">
          <h4 class="">
            <?php the_title(); ?>
          </h4>
          <?php if ( vp_metabox('team_member_settings.hb_employee_position') ) { ?>
          <p class="team-position"><?php echo vp_metabox('team_member_settings.hb_employee_position'); ?></p>
          <?php } ?>
        </div>
        <!-- END .team-name -->


      </div>
      <!-- END .team-header-info -->

      <!-- START .team-member-content -->
      <div class="team-member-content">
        <?php
        if ( has_excerpt() ) {
          echo '<p class="nbm">' . get_the_excerpt() . '</p>';
        ?> <div class="spacer" style="height:15px;"></div> <?php }
        else {
        ?>
        <div class="spacer" style="height:5px;"></div>
        <p class="nbm"><?php echo wp_trim_words( strip_shortcodes( get_the_content() ) , $excerpt_length_custom , NULL); ?></p>
        <?php } ?>
      </div>


      <!-- END .team-member-content -->
      <!-- <a class="simple-read-more" href="<?php the_permalink(); ?>" target="_self"><?php _e('View Profile','hbthemes'); ?></a> -->

      <div class="spacer" style="height:15px;"></div>
      <ul class="social-icons dark">
      <?php
        $social_links = array("envelop" => "Mail", "dribbble" => "Dribbble" , "facebook" => "Facebook", "flickr" => "Flickr", "forrst"=>"Forrst", "google-plus" => "Google Plus", "html5"=> "HTML 5", "cloud" => "iCloud", "lastfm"=> "LastFM", "linkedin"=> "LinkedIn", "paypal"=> "PayPal", "pinterest"=> "Pinterest", "reddit"=>"Reddit", "feed-2"=>"RSS", "skype"=>"Skype", "stumbleupon"=> "StumbleUpon", "tumblr"=>"Tumblr", "twitter"=>"Twitter", "vimeo"=>"Vimeo", "wordpress"=>"WordPress", "yahoo"=>"Yahoo", "youtube"=>"YouTube", "github"=>"Github", "yelp"=>"Yelp", "mail"=>"Mail", "instagram"=>"Instagram", "foursquare"=>"Foursquare", "xing"=>"Xing", "vk"=>"VKontakte", "behance"=>"Behance", "sn500px" =>"500px","weibo" => "Weibo", "tripadvisor" => "Trip Advisor");
        foreach ($social_links as $soc_id => $soc_name) {
          if ( vp_metabox('team_member_settings.hb_employee_social_' . $soc_id) ) {
            if ($soc_id != 'behance' && $soc_id != 'vk' && $soc_id != 'envelop' && $soc_id != 'sn500px' && $soc_id != "weibo" && $soc_id != "tripadvisor") { ?>
              <li class="<?php echo $soc_id; ?>"><a href="<?php echo vp_metabox('team_member_settings.hb_employee_social_' . $soc_id); ?>" target="_blank"><i class="hb-moon-<?php echo $soc_id; ?>"></i><i class="hb-moon-<?php echo $soc_id; ?>"></i></a></li>
            <?php } else if ($soc_id == 'envelop') { ?>
              <li class="<?php echo $soc_id; ?>"><a href="mailto:<?php echo vp_metabox('team_member_settings.hb_employee_social_' . $soc_id); ?>" target="_blank"><i class="hb-moon-<?php echo $soc_id; ?>"></i><i class="hb-moon-<?php echo $soc_id; ?>"></i></a></li>
            <?php } else { ?>
              <li class="<?php echo $soc_id; ?>"><a href="<?php echo vp_metabox('team_member_settings.hb_employee_social_' . $soc_id); ?>" target="_blank"><i class="icon-<?php echo $soc_id; ?>"></i><i class="icon-<?php echo $soc_id; ?>"></i></a></li>
            <?php }
          }
        }
      ?>
      </ul>

    </div>
    <!-- END .team-member-description -->

  </div>
  <!-- END .team-member-box -->

  <?php
  wp_reset_postdata();
  }
}
add_action('custom_team_member_box', 'hb_team_member_box');



// remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Create a shortcode to insert content of a page of specified ID
 *
 * @param    array        attributes of shortcode
 * @return     string        $output        Content of page specified, if no page id specified output = null
 */
function pa_insertPage($atts, $content = null) {
 // Default output if no pageid given
 $output = NULL;

 // extract atts and assign to array
 extract(shortcode_atts(array(
 "page" => '' // default value could be placed here
 ), $atts));

 // if a page id is specified, then run query
 if (!empty($page)) {
 $pageContent = new WP_query();
 $pageContent->query(array('page_id' => $page));
 while ($pageContent->have_posts()) : $pageContent->the_post();
 // assign the content to $output
 $output = do_shortcode(get_the_content());
 endwhile;
 }

 return $output;
}
add_shortcode('pa_insert', 'pa_insertPage');


// Redirect for pricing page
// add_action('template_redirect', 'geoip_redirect', 5);
function geoip_redirect(){
  if (is_admin())
    return;

  $current_user = wp_get_current_user();
  if (user_can( $current_user, 'administrator' ))
    return;

  if (!is_page('pricing'))
    return;

  if (!function_exists('geoip_detect2_get_info_from_current_ip'))
    return;

  $userInfo = geoip_detect2_get_info_from_current_ip();
  $countryCode = $userInfo->country->isoCode;
  if($countryCode == 'IN'){
    $url = '/pricing-india';
    wp_redirect(get_site_url(null, $url));
    exit;
  }
}

// Shortcode for SVG Map
function svg_map_shortcode($atts) {

   ob_start();

   include(STYLESHEETPATH.'/map.svg');

   $content = ob_get_clean();
   return $content;
}
add_shortcode('svg_map', 'svg_map_shortcode');


// Shortcode for Home banner
function home_banner_shortcode($atts) {

   ob_start();

   include(STYLESHEETPATH.'/home-banner.svg');

   $content = ob_get_clean();
   return $content;
}
add_shortcode('home_banner', 'home_banner_shortcode');


// Webinar registration notification
function so174837_registration_email_alert( $user_id ) {
    $user    = get_userdata( $user_id );
    $email   = $user->user_email;
    $message = $email . ' has registered for a webinar';
    wp_mail( 'fiona@ajency.in', 'New User registration', $message );
}
add_action('user_register', 'so174837_registration_email_alert');

?>
