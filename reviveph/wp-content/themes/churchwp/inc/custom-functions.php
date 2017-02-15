<?php

// CHECK IF PLUGIN ACTIVE OR NOT
function churchwp_is_plugin_active( $plugin ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( $plugin ) ) {
        return true;
    }

    return false;
}


// GET SITE BREADCRUMBS
function churchwp_header_title_breadcrumbs(){

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    $html = '';
    $html .= '<div class="header-title-breadcrumb relative">';

        // SINGLE POST
        
    $html .= '<div class="header-title-breadcrumb-overlay text-left">
                    <div class="container">
                        <div class="header-group row">
                            <div class="col-md-6">';
                                $class = "";
                                if (is_single()) {
                                    $class = "hidden";
                                    $html .= '<ol class="breadcrumb text-left">'.churchwp_breadcrumb().'</ol>';
                                }elseif (is_search()) {
                                    $html .= '<h1>'.esc_attr__( 'Search Results for: ', 'churchwp' ) . get_search_query().'</h1>';
                                }elseif (is_category()) {
                                    $html .= '<h1>'.esc_attr__( 'Category: ', 'churchwp' ).' <span>'.single_cat_title( '', false ).'</span></h1>';
                                }elseif (is_category()) {
                                    $html .= '<h1>'.esc_attr__( 'Tag Archives: ', 'churchwp' ) . single_tag_title( '', false ).'</h1>';
                                }elseif (is_author() || is_archive() || is_home()) {
                                    $html .= '<h1>'.get_the_archive_title() . get_the_archive_description().'</h1>';
                                }elseif (is_page()) {
                                    $html .= '<h1>'.get_the_title().'</h1>';
                                }else{
                                    $html .= '<h1>'.get_the_title().'</h1>';
                                }
                  $html .= '</div>
                            <div class="col-md-6 right-side '.esc_attr($class).'">
                                <ol class="breadcrumb text-right">'.churchwp_breadcrumb().'</ol>                    
                            </div>
                        </div>
                    </div>
                </div>';

    $html .= '</div>';
    $html .= '<div class="clearfix"></div>';

    return $html;
}


function churchwp_sharer($tooltip_placement){

	$html = '';
	$html .= '<div class="article-social">
                <ul class="social-sharer">
                    <li class="facebook">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on Facebook','churchwp').'" data-placement="'.$tooltip_placement.'" href="http://www.facebook.com/share.php?u='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="twitter">
                        <a data-toggle="tooltip" title="'.esc_attr__('Tweet on Twitter','churchwp').'" data-placement="'.$tooltip_placement.'" href="http://twitter.com/home?status='.get_the_title().'+'.get_permalink().'"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="google-plus">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on G+','churchwp').'" data-placement="'.$tooltip_placement.'" href="https://plus.google.com/share?url='.get_permalink().'"><i class="icon-social-gplus"></i></a>
                    </li>
                    <li class="pinterest">
                        <a data-toggle="tooltip" title="'.esc_attr__('Pin on Pinterest','churchwp').'" data-placement="'.$tooltip_placement.'" href="http://pinterest.com/pin/create/bookmarklet/?media='.get_permalink().'&url='.get_permalink().'&is_video=false&description='.get_permalink().'"><i class="icon-social-pinterest"></i></a>
                    </li>
                    <li class="linkedin">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on LinkedIn','churchwp').'" data-placement="'.$tooltip_placement.'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_permalink().'"><i class="icon-social-linkedin"></i></a>
                    </li>
                    <li class="reddit">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on Reddit','churchwp').'" data-placement="'.$tooltip_placement.'" href="http://www.reddit.com/submit?url='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-reddit"></i></a>
                    </li>
                    <li class="tumblr">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on Tumblr','churchwp').'" data-placement="'.$tooltip_placement.'" href="http://www.tumblr.com/share?v=3&amp;u='.get_permalink().'&amp;t='.get_the_title().'"><i class="icon-social-tumblr"></i></a>
                    </li>
                </ul>
            </div>';

	return $html;
}


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'themeslr-framework/themeslr-framework.php' ) ) {

    function churchwp_dfi_ids($postID){
        global  $dynamic_featured_image;
        $featured_images = $dynamic_featured_image->get_featured_images( $postID );

        //Loop through the image to display your image
        if( !is_null($featured_images) ){

            $medias = array();

            foreach($featured_images as $images){
                $attachment_id = $images['attachment_id'];
                $medias[] = $attachment_id;
            }

            $ids = '';
            $len = count($medias);
            $i = 0;
            foreach($medias as $media){

                if ($i == $len - 1) {
                    $ids .= $media;
                }else{
                    $ids .= $media . ',';
                }

                $i++;

            }
        } 

        return $ids;
    }
}



?>