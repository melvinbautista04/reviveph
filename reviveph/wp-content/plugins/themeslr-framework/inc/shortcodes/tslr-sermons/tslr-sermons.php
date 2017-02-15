<?php 


/**

||-> Shortcode: Sermons

*/
function themeslr_shortcode_sermons($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           =>'',
            'category'              => '',
            'number'              =>'',
            'column'              =>'',
        ), $params ) );


    $html = '';
    $html .= '<div class="blog-posts tslr-sermons-shortcode wow row '.$animation.'">';



    $args_blogposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'tslr-sermon',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tslr-sermon-category',
                    'field' => 'slug',
                    'terms' => $category
                )
            ),
            'post_status'      => 'publish' 
            ); 
    $blogposts = get_posts($args_blogposts);

    foreach ($blogposts as $blogpost) {

        // MP3
        $tslr_sermon_mp3 = get_post_meta( $blogpost->ID, 'tslr_sermon_mp3', true );
        //MP4
        $tslr_sermon_mp4 = get_post_meta( $blogpost->ID, 'tslr_sermon_mp4', true );
        #YouTube/Vimeo
        $tslr_sermon_youtube_vimeo = get_post_meta( $blogpost->ID, 'tslr_sermon_youtube_vimeo', true );
        //PDF
        $tslr_sermon_pdf = get_post_meta( $blogpost->ID, 'tslr_sermon_pdf', true );


        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ),'churchwp_post_pic700x450' );
        
        $content_post   = get_post($blogpost->ID);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);

        if ($thumbnail_src) {
            $post_img = '<img class="blog_post_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$blogpost->post_title.'" />';
            $post_col = 'col-md-12';
        }else{
            $post_col = 'col-md-12 no-featured-image';
            $post_img = '';
        }

        if (!isset($column)) {
          $column = 'col-md-4';
        }

        if ($column == 2) {
          $class = 'col-md-6';
        }elseif ($column == 3) {
          $class = 'col-md-4';
        }elseif ($column == 4) {
          $class = 'col-md-3';
        }else{
          $class = 'col-md-4';
        }

        $html.='<div class="article-sermon sermon-'.$blogpost->ID.' '.$class.'">
                  <article class="single-post list-view">
                    <div class="blog_custom">

                      <!-- POST THUMBNAIL -->
                      <div class="col-md-12 post-thumbnail">
                          <a class="relative" href="'.get_permalink($blogpost->ID).'">'.$post_img.'
                            <span class="read-more-overlay">
                                <i class="icon-link"></i>
                            </span>

                          </a>
                      </div>

                      <!-- POST DETAILS -->
                      <div class="post-details '.$post_col.'">
                        <h3 class="post-name row">
                          <a href="'.get_permalink($blogpost->ID).'" title="'. $blogpost->post_title .'">'. $blogpost->post_title .'</a>
                        </h3>
                        <div class="sermon-meta-details">';
                              if (isset($tslr_sermon_mp3) && !empty($tslr_sermon_mp3)) {
                                  $html.='<li class="churchwp-single-meta-shortcode">
                                      <i class="icon-music-tone-alt icons"></i>
                                  </li>';
                              }

                              if (isset($tslr_sermon_mp4) && !empty($tslr_sermon_mp4)) {
                                  $html.='<li class="churchwp-single-meta-shortcode">
                                      <i class="icon-film icons"></i>
                                  </li>';
                              }

                              if (isset($tslr_sermon_youtube_vimeo) && !empty($tslr_sermon_youtube_vimeo)) {
                                  $html.='<li class="churchwp-single-meta-shortcode">
                                      <i class="icon-social-youtube icons"></i>
                                  </li>';
                              }

                              if (isset($tslr_sermon_pdf) && !empty($tslr_sermon_pdf)) {
                                  $html.='<li class="churchwp-single-meta-shortcode">
                                      <i class="icon-book-open icons"></i>
                                  </li>';
                              }
                           $html.='

                        </div>

          
                      </div>
                      
                    </div>
                  </article>
                </div>';
      }





    $html .= '</div>';
    return $html;
}
add_shortcode('tslr_sermons', 'themeslr_shortcode_sermons');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


    add_action( 'init', 'double_ipa_init' );
    function double_ipa_init()  {
      $post_category_tax = get_terms(  array('taxonomy' => 'tslr-sermon-category','hide_empty' => false) );
      // $post_category_tax = get_terms('tslr-sermon-category');
      $post_category = array();
      foreach ( $post_category_tax as $cat ) {
         $post_category[$cat->name] = $cat->slug;
      }

      vc_map( array(
       "name" => esc_attr__("ThemeSLR - Sermons", 'themeslr'),
       "base" => "tslr_sermons",
       "category" => esc_attr__('ThemeSLR', 'themeslr'),
       "icon" => "themeslr_shortcode",
       "params" => array(
          array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number of sermons", 'themeslr' ),
            "param_name" => "number",
            "value" => "",
            "description" => esc_attr__( "Enter number of blog post to show.", 'themeslr' )
          ),
          array(
             "group" => "Options",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Select Sermons Category"),
             "param_name" => "category",
             "description" => esc_attr__("Please select a category"),
             "std" => 'Default value',
             "value" => $post_category
          ),
           array(
            "group" => "Options",
            "type" => "dropdown",
            "heading" => esc_attr__("Sermons per row", 'themeslr'),
            "param_name" => "column",
            "std" => '',
            "holder" => "div",
            "class" => "",
            "description" => "",
            "value" => array(
              '2'   => '2',
              '3'   => '3',
              '4'   => '4'
              )
          ),
          array(
            "group" => "Animation",
            "type" => "dropdown",
            "heading" => esc_attr__("Animation", 'themeslr'),
            "param_name" => "animation",
            "std" => 'fadeInLeft',
            "holder" => "div",
            "class" => "",
            "description" => "",
            "value" => $animations_list
          )
        )
    ));
  }



}

?>