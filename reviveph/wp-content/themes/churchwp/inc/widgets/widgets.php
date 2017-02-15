<?php 
/**
* 
* [Widgets]
* 
*/


/**
Widget: Contact + Social links
*/
class churchwp_address_social_icons extends WP_Widget {

    function __construct() {
        parent::__construct('churchwp_address_social_icons', esc_attr__('ThemeSLR - Contact + Social links', 'churchwp'),array( 'description' => esc_attr__( 'ThemeSLR - Contact information + Social icons', 'churchwp' ), ) );
    }

    public function widget( $args, $instance ) {

        $widget_title = $instance[ 'widget_title' ];
        $widget_contact_details = $instance[ 'widget_contact_details' ];
        $widget_social_icons = $instance[ 'widget_social_icons' ];

        echo wp_kses_post($args['before_widget']); ?>

        <div class="sidebar-social-networks address-social-links">

            <?php if($widget_title) { ?>
               <h1 class="widget-title"><?php echo esc_attr($widget_title); ?></h1>
            <?php } ?>

            <?php if('on' == $instance['widget_contact_details']) { ?>
                <div class="contact-details">
                    <p><i class="icon-home"></i> <?php echo esc_attr(churchwp_redux('mt_contact_address')); ?></p>
                    <p><i class="icon-screen-smartphone"></i> <?php echo esc_attr(churchwp_redux('mt_contact_phone')); ?></p>
                    <p><i class="icon-envelope-letter"></i> <?php echo esc_attr(churchwp_redux('mt_contact_email')); ?></p>
                </div>
            <?php } ?>

            <?php if('on' == $instance['widget_social_icons']) { ?>
                <ul class="social-links">
                <?php if ( churchwp_redux('mt_social_fb') && churchwp_redux('mt_social_fb') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_fb') ) ?>"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_tw') && churchwp_redux('mt_social_tw') != '' ) { ?>
                    <li><a href="https://twitter.com/<?php echo esc_attr( churchwp_redux('mt_social_tw') ) ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_gplus') && churchwp_redux('mt_social_gplus') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_gplus') ) ?>"><i class="fa fa-google-plus"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_youtube') && churchwp_redux('mt_social_youtube') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_youtube') ) ?>"><i class="fa fa-youtube"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_pinterest') && churchwp_redux('mt_social_pinterest') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_pinterest') ) ?>"><i class="fa fa-pinterest"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_linkedin') && churchwp_redux('mt_social_linkedin') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_linkedin') ) ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_skype') && churchwp_redux('mt_social_skype') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_skype') ) ?>"><i class="fa fa-skype"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_instagram') && churchwp_redux('mt_social_instagram') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_instagram') ) ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_dribbble') && churchwp_redux('mt_social_dribbble') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_dribbble') ) ?>"><i class="fa fa-dribbble"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_deviantart') && churchwp_redux('mt_social_deviantart') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_deviantart') ) ?>"><i class="fa fa-deviantart"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_digg') && churchwp_redux('mt_social_digg') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_digg') ) ?>"><i class="fa fa-digg"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_flickr') && churchwp_redux('mt_social_flickr') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_flickr') ) ?>"><i class="fa fa-flickr"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_stumbleupon') && churchwp_redux('mt_social_stumbleupon') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_stumbleupon') ) ?>"><i class="fa fa-stumbleupon"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_tumblr') && churchwp_redux('mt_social_tumblr') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_tumblr') ) ?>"><i class="fa fa-tumblr"></i></a></li>
                <?php } ?>
                <?php if ( churchwp_redux('mt_social_vimeo') && churchwp_redux('mt_social_vimeo') != '' ) { ?>
                    <li><a href="<?php echo esc_attr( churchwp_redux('mt_social_vimeo') ) ?>"><i class="fa fa-vimeo-square"></i></a></li>
                <?php } ?>
                </ul>
            <?php } ?>
            
        </div>
        <?php echo wp_kses_post($args['after_widget']);
    }

    public function form( $instance ) {

        # Widget Title
        if ( isset( $instance[ 'widget_title' ] ) ) {
            $widget_title = $instance[ 'widget_title' ];
        }?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>"><?php esc_attr_e( 'Widget Title:','churchwp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widget_title' )); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>">
        </p>
        <p>
            <input type="checkbox" <?php checked($instance['widget_contact_details'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('widget_contact_details')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_contact_details')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('widget_contact_details')); ?>"><?php esc_attr_e( 'Show contact informations box','churchwp' ); ?></label>
        </p>
        <p>
            <input type="checkbox" <?php checked($instance['widget_social_icons'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('widget_social_icons')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_social_icons')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('widget_social_icons')); ?>"><?php esc_attr_e( 'Show social icons','churchwp' ); ?></label>
        </p>


        <p><?php esc_attr_e( '* Social Network account must be set from ThemeSLR - Theme Panel.','churchwp' ); ?></p>
        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ?  $new_instance['widget_title']  : '';
        $instance['widget_contact_details'] = ( ! empty( $new_instance['widget_contact_details'] ) ) ?  $new_instance['widget_contact_details']  : '';
        $instance['widget_social_icons'] = ( ! empty( $new_instance['widget_social_icons'] ) ) ?  $new_instance['widget_social_icons']  : '';

        return $instance;
    }
}


/**
Widget: Recent Posts with thumbnails
*/
class churchwp_recent_entries_with_thumbnail extends WP_Widget {

    function __construct() {
        parent::__construct('churchwp_recent_entries_with_thumbnail', esc_attr__('ThemeSLR - Recent Posts with thumbnails', 'churchwp'),array( 'description' => esc_attr__( 'ThemeSLR - Recent Posts with thumbnails', 'churchwp' ), ) );
    }

    public function widget( $args, $instance ) {
        $recent_posts_title = $instance[ 'recent_posts_title' ];
        $recent_posts_number = $instance[ 'recent_posts_number' ];

        echo wp_kses_post($args['before_widget']);

        $args_recenposts = array(
                'posts_per_page'   => $recent_posts_number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish' 
                );

        $recentposts = get_posts($args_recenposts);
        $myContent  = "";
        $myContent .= '<h1 class="widget-title">'.$recent_posts_title.'</h1>';
        $myContent .= '<ul>';

        foreach ($recentposts as $post) {
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'churchwp_post_widget_pic70x70' );

            $myContent .= '<li class="row">';
                $myContent .= '<div class="col-md-3 post-thumbnail relative">';
                    $myContent .= '<a href="'. get_permalink($post->ID) .'">';
                        if($thumbnail_src) { $myContent .= '<img src="'. $thumbnail_src[0] . '" alt="'. $post->post_title .'" />';
                        }else{ $myContent .= '<img src="http://placehold.it/70x70" alt="'. $post->post_title .'" />'; }
                        $myContent .= '<div class="thumbnail-overlay absolute">';
                            $myContent .= '<i class="icon-magnifier icons absolute"></i>';
                        $myContent .= '</div>';
                    $myContent .= '</a>';
                $myContent .= '</div>';
                $myContent .= '<div class="col-md-9 post-details">';
                    $myContent .= '<a href="'. get_permalink($post->ID) .'">'. $post->post_title.'</a>';
                    $myContent .= '<span class="post-date">'.get_the_date(get_option( 'date_format') ).'</span>';
                $myContent .= '</div>';
            $myContent .= '</li>';
        }
        $myContent .= '</ul>';

        echo wp_kses_post($myContent);
        echo wp_kses_post($args['after_widget']);
    }

    public function form( $instance ) {
        
        # Widget Title
        if ( isset( $instance[ 'recent_posts_title' ] ) ) {
            $recent_posts_title = $instance[ 'recent_posts_title' ];
        } else {
            $recent_posts_title = esc_attr__( 'Recent posts', 'churchwp' );
        }

        # Number of posts
        if ( isset( $instance[ 'recent_posts_number' ] ) ) {
            $recent_posts_number = $instance[ 'recent_posts_number' ];
        } else {
            $recent_posts_number = '5';
        }
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>"><?php esc_attr_e( 'Widget Title:','churchwp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_title' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>"><?php esc_attr_e( 'Number of posts:','churchwp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_number' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_number ); ?>">
        </p>
        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['recent_posts_title'] = ( ! empty( $new_instance['recent_posts_title'] ) ) ?  $new_instance['recent_posts_title']  : '';
        $instance['recent_posts_number'] = ( ! empty( $new_instance['recent_posts_number'] ) ) ? strip_tags( $new_instance['recent_posts_number'] ) : '';
        return $instance;
    }

} 


/**
Widget: Post thumbnails slider
*/
class churchwp_post_thumbnails_slider extends WP_Widget {

    function __construct() {
        parent::__construct('churchwp_post_thumbnails_slider', esc_attr__('ThemeSLR - Post thumbnails slider', 'churchwp'),array( 'description' => esc_attr__( 'ThemeSLR - Post thumbnails slider', 'churchwp' ), ) );
    }

    public function widget( $args, $instance ) {
        $recent_posts_title = $instance[ 'recent_posts_title' ];
        $recent_posts_number = $instance[ 'recent_posts_number' ];

        echo wp_kses_post($args['before_widget']);

        $args_recenposts = array(
                'posts_per_page'   => $recent_posts_number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish' 
                );

        $recentposts = get_posts($args_recenposts);
        $myContent  = "";
        $myContent .= '<h1 class="widget-title">'.$recent_posts_title.'</h1>';
        $myContent .= '<div class="slider_holder relative">';
            $myContent .= '<div class="slider_navigation absolute">';
                $myContent .= '<a class="btn prev pull-left"><i class="fa fa-angle-left"></i></a>';
                $myContent .= '<a class="btn next pull-right"><i class="fa fa-angle-right"></i></a>';
            $myContent .= '</div>';
            $myContent .= '<div class="post_thumbnails_slider owl-carousel owl-theme">';

            foreach ($recentposts as $post) {
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'churchwp_post_pic700x450' );
                $myContent .= '<div class="item">';
                    $myContent .= '<a href="'. get_permalink($post->ID) .'">';
                        if($thumbnail_src) { $myContent .= '<img src="'. $thumbnail_src[0] . '" alt="'. $post->post_title .'" />';
                        }else{ $myContent .= '<img src="http://placehold.it/700x450" alt="'. $post->post_title .'" />'; }
                    $myContent .= '</a>';
                $myContent .= '</div>';
            }
            $myContent .= '</div>';
        $myContent .= '</div>';

        echo wp_kses_post($myContent);
        echo wp_kses_post($args['after_widget']);
    }

    public function form( $instance ) {
        
        # Widget Title
        if ( isset( $instance[ 'recent_posts_title' ] ) ) {
            $recent_posts_title = $instance[ 'recent_posts_title' ];
        } else {
            $recent_posts_title = esc_attr__( 'Post thumbnails slider', 'churchwp' );
        }

        # Number of posts
        if ( isset( $instance[ 'recent_posts_number' ] ) ) {
            $recent_posts_number = $instance[ 'recent_posts_number' ];
        } else {
            $recent_posts_number = '5';
        }
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>"><?php esc_attr_e( 'Widget Title:','churchwp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_title' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>"><?php esc_attr_e( 'Number of posts:','churchwp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'recent_posts_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'recent_posts_number' )); ?>" type="text" value="<?php echo esc_attr( $recent_posts_number ); ?>">
        </p>
        <?php 
    }


    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['recent_posts_title'] = ( ! empty( $new_instance['recent_posts_title'] ) ) ?  $new_instance['recent_posts_title']  : '';
        $instance['recent_posts_number'] = ( ! empty( $new_instance['recent_posts_number'] ) ) ? strip_tags( $new_instance['recent_posts_number'] ) : '';
        return $instance;
    }

} 



/**
Widget: Social Share Icons
*/
class churchwp_social_share extends WP_Widget {

    function __construct() {
        parent::__construct('churchwp_social_share', esc_attr__('ThemeSLR - Social Share Icons', 'churchwp'),array( 'description' => esc_attr__( 'ThemeSLR - Social Share Icons', 'churchwp' ), ) );
    }

    public function widget( $args, $instance ) {

        $widget_title = $instance[ 'widget_title' ];
        $facebook = $instance['share-facebook'] ? 'true' : 'false';
        $twitter = $instance['share-twitter'] ? 'true' : 'false';
        $linkedin = $instance['share-linkedin'] ? 'true' : 'false';
        $googleplus = $instance['share-googleplus'] ? 'true' : 'false';
        $digg = $instance['share-digg'] ? 'true' : 'false';
        $pinterest = $instance['share-pinterest'] ? 'true' : 'false';
        $reddit = $instance['share-reddit'] ? 'true' : 'false';
        $stumbleupon = $instance['share-stumbleupon'] ? 'true' : 'false';

        echo wp_kses_post($args['before_widget']);

        $siteurl = get_permalink();
        $sitetitle = get_bloginfo('title');
        $sitedescription = get_bloginfo('description');

         ?>

        <div class="sidebar-share-social-links">
            <?php if($widget_title) { ?>
               <h1 class="widget-title"><?php echo esc_attr($widget_title); ?></h1>
            <?php } ?>
            <ul class="share-social-links">
                <?php if('on' == $instance['share-facebook'] ) { ?>
                <li class="facebook">
                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
                <?php } if('on' == $instance['share-twitter'] ) {?>
                <li class="twitter">
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                </li>
                <?php } if('on' == $instance['share-linkedin'] ) {?>
                <li class="linkedin">
                    <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                </li>
                <?php } if('on' == $instance['share-googleplus'] ) {?>
                <li class="googleplus">
                    <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
                </li>
                <?php } if('on' == $instance['share-digg'] ) {?>
                <li class="digg">
                    <a href="#" target="_blank"><i class="fa fa-digg"></i></a>
                </li>
                <?php } if('on' == $instance['share-pinterest'] ) {?>
                <li class="pinterest">
                    <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                </li>
                <?php } if('on' == $instance['share-reddit'] ) {?>
                <li class="reddit">
                    <a href="#" target="_blank"><i class="fa fa-reddit"></i></a>
                </li>
                <?php } if('on' == $instance['share-stumbleupon'] ) {?>
                <li class="stumbleupon">
                    <a href="#" target="_blank"><i class="fa fa-stumbleupon"></i></a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php 
        echo wp_kses_post($args['after_widget']);
    }

    public function form( $instance ) {

        # Widget Title
        if ( isset( $instance[ 'widget_title' ] ) ) {
            $widget_title = $instance[ 'widget_title' ];
        } else {
            $widget_title = esc_attr__( 'Social icons', 'churchwp' );
        }
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>"><?php esc_attr_e( 'Widget Title:','churchwp' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'widget_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'widget_title' )); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>">
        </p>
        <p><?php esc_attr_e( 'Check what Social SHARE Buttons do you want to display','churchwp' ); ?></p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-facebook'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('share-facebook')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-facebook')); ?>"><?php esc_attr_e( 'Facebook','churchwp' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-twitter'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('share-twitter')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-twitter')); ?>"><?php esc_attr_e( 'Twitter','churchwp' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-linkedin'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('share-linkedin')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-linkedin')); ?>"><?php esc_attr_e( 'Linkedin','churchwp' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-googleplus'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('share-googleplus')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-googleplus')); ?>"><?php esc_attr_e( 'Google Plus','churchwp' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-digg'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-digg')); ?>" name="<?php echo esc_attr($this->get_field_name('share-digg')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-digg')); ?>"><?php esc_attr_e( 'Digg','churchwp' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-pinterest'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('share-pinterest')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-pinterest')); ?>"><?php esc_attr_e( 'Pinterest','churchwp' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-reddit'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-reddit')); ?>" name="<?php echo esc_attr($this->get_field_name('share-reddit')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-reddit')); ?>"><?php esc_attr_e( 'Reddit','churchwp' ); ?></label>
        </p>
        <p>
            <input class="checkboxsocial" type="checkbox" <?php checked($instance['share-stumbleupon'], 'on'); ?> id="<?php echo esc_attr($this->get_field_name('share-stumbleupon')); ?>" name="<?php echo esc_attr($this->get_field_name('share-stumbleupon')); ?>" /> 
            <label for="<?php echo esc_attr($this->get_field_name('share-stumbleupon')); ?>"><?php esc_attr_e( 'Stumbleupon','churchwp' ); ?></label>
        </p>
        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title'] = ( ! empty( $new_instance['widget_title'] ) ) ?  $new_instance['widget_title']  : '';
        $instance['share-facebook'] = ( ! empty( $new_instance['share-facebook'] ) ) ?  $new_instance['share-facebook']  : '';
        $instance['share-twitter'] = ( ! empty( $new_instance['share-twitter'] ) ) ?  $new_instance['share-twitter']  : '';
        $instance['share-linkedin'] = ( ! empty( $new_instance['share-linkedin'] ) ) ?  $new_instance['share-linkedin']  : '';
        $instance['share-googleplus'] = ( ! empty( $new_instance['share-googleplus'] ) ) ?  $new_instance['share-googleplus']  : '';
        $instance['share-digg'] = ( ! empty( $new_instance['share-digg'] ) ) ?  $new_instance['share-digg']  : '';
        $instance['share-pinterest'] = ( ! empty( $new_instance['share-pinterest'] ) ) ?  $new_instance['share-pinterest']  : '';
        $instance['share-reddit'] = ( ! empty( $new_instance['share-reddit'] ) ) ?  $new_instance['share-reddit']  : '';
        $instance['share-stumbleupon'] = ( ! empty( $new_instance['share-stumbleupon'] ) ) ?  $new_instance['share-stumbleupon']  : '';

        return $instance;
    }
}


/**
Register Widgets
*/
function churchwp_register_widgets() {
    register_widget( 'churchwp_address_social_icons' );
    register_widget( 'churchwp_social_share' );
    register_widget( 'churchwp_recent_entries_with_thumbnail' );
    register_widget( 'churchwp_post_thumbnails_slider' );

}
add_action( 'widgets_init', 'churchwp_register_widgets' );
?>
