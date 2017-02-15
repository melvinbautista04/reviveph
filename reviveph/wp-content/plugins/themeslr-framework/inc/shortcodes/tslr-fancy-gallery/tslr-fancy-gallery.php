<?php 


/**

||-> Shortcode: Fancy Gallery

*/
function themeslr_shortcode_fancy_gallery($params, $content) {
    extract( 
      shortcode_atts( 
        array(
            'animation'           =>'',
            'number'              =>'',
        ), $params 
      ) 
    );


    $args_posts = array(
      'posts_per_page'   => -1,
      'orderby'          => 'post_date',
      'order'            => 'DESC',
      'post_type'        => 'tslr-gallery',
      'post_status'      => 'publish' 
    ); 
    $posts = get_posts($args_posts);


    $html = '';


    // $fancy_gallery_id = 'tslr_photostack_gallery' . uniqid();

    // SCRIPTS
    function themeslr_shortcode_fancy_gallery_script() {
        if( wp_script_is( 'jquery', 'done' ) ) {
        ?>
        <script type="text/javascript">
        (function ($) {
          'use strict';
          jQuery( document ).ready(function() {
            new Photostack( document.getElementById( 'photostack-1' ), {
              callback : function( item ) {
                //console.log(item)
              }
            });
          });
        } (jQuery) )
        </script>
        <?php
        }
    }
    add_action( 'wp_footer', 'themeslr_shortcode_fancy_gallery_script', 100 );


    $html.='<section id="photostack-1" class="photostack photostack-start">';
      $html.='<div>';

      foreach ($posts as $post) {
        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'tslr_fancy_gallery' );
        
        $content_post   = get_post($post->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);

        if ($thumbnail_src) {
            $post_img = '<img class="blog_post_image" src="'. $thumbnail_src[0] . '" alt="'.$post->post_title.'" />';
        }


          $html.='<figure>
                    <a href="#" class="photostack-img">'.$post_img.'</a>
                    <figcaption>
                      <h2 class="photostack-title">'. $post->post_title .'</h2>
                      <div class="photostack-back">
                        <p>'.themeslr_excerpt_limit($content, 43).'</p>
                      </div>
                    </figcaption>
                  </figure>';

      }

      $html.='</div>';
    $html.='</section>';


    return $html;
}
add_shortcode('tslr_fancy_gallery', 'themeslr_shortcode_fancy_gallery');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("ThemeSLR - Fancy Gallery", 'themeslr'),
     "base" => "tslr_fancy_gallery",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'themeslr' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'themeslr' )
        ),
      )
  ));
}

?>