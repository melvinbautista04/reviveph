<?php 


/**

||-> Shortcode: BlogPos01

*/
function themeslr_shortcode_blogpost01($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           =>'',
            'number'              =>'',
            'blog_post_day_color' =>''
        ), $params ) );


    $html = '';
    $html .= '<div class="blog-posts tslr-blog-posts-shortcode wow row '.$animation.'">';
    $args_blogposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish' 
            ); 
    $blogposts = get_posts($args_blogposts);

    foreach ($blogposts as $blogpost) {


        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $blogpost->ID ),'justicelaw_about_600x600' );
        
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

        $html.='<div class="odd-post col-md-4">
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

                        <div class="post-category-comment-date row">
                            <span class="post-date">
                                <a href="'.get_the_permalink().'">'.get_the_date('d M').'</a>
                            </span>

                            <span class="post-author">
                              '.esc_attr__('by ', 'themeslr').'
                              <a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author().'</a>
                            </span>
                            <span class="post-tags">'.esc_attr__('in ', 'themeslr') . get_the_term_list( $blogpost->ID, 'category', '', ' / ' ).'</span>
                        </div>

                        <h3 class="post-name row">
                          <a href="'.get_permalink($blogpost->ID).'" title="'. $blogpost->post_title .'">'. $blogpost->post_title .'</a>
                        </h3>

                        <div class="post-excerpt row">
                            '.themeslr_excerpt_limit($content, 18).'
                            <div class="text-element content-element">
                                <a class="more-link" href="'.get_permalink($blogpost->ID).'">'.esc_attr__('Read More','themeslr').' <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                  </article>
                </div>';
      }





    $html .= '</div>';
    return $html;
}
add_shortcode('blogpost01', 'themeslr_shortcode_blogpost01');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("ThemeSLR - Blog Posts", 'themeslr'),
     "base" => "blogpost01",
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
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Choose blog post day color", 'themeslr' ),
          "param_name" => "blog_post_day_color",
          "value" => '', //Default color
          "description" => esc_attr__( "Choose blog post day color", 'themeslr' )
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

?>