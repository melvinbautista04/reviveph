<?php
/**

||-> Shortcode: Social Media

*/
function themeslr_social_icons_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'icons_color_normal'      => '',
            'icons_color_hover'      => '',
            'icons_bg_normal'      => '',
            'icons_bg_hover'      => '',
            'icons_border_normal'      => '',
            'icons_border_hover'      => '',
            'icons_padding'      => '',
            'icons_margin'      => '',
            'icons_align'      => '',
            'facebook'      => '',
            'twitter'       => '',
            'pinterest'     => '',
            'skype'         => '',
            'instagram'     => '',
            'youtube'       => '',
            'dribbble'      => '',
            'googleplus'    => '',
            'linkedin'      => '',
            'deviantart'    => '',
            'digg'          => '',
            'flickr'        => '',
            'stumbleupon'   => '',
            'tumblr'        => '',
            'vimeo'         => '',
            'animation'     => ''
        ), $params ) ); 
    

        if ($icons_border_normal) {
            $icons_border_normal = "border: 1px solid " . $icons_border_normal . ";";
        }else{
            $icons_border_normal = "";
        }

        if ($icons_border_hover) {
            $icons_border_hover = "border: 1px solid " . $icons_border_hover . ";";
        }else{
            $icons_border_hover = "";
        }


        $content = '';
        $content .= '<style>
                        .widget_social_icons li a{
                            padding:'.$icons_padding.'; 
                            margin:'.$icons_margin.'; 
                            color:'.$icons_color_normal.'; 
                            background:'.$icons_bg_normal.'; 
                            '.$icons_border_normal.'
                        }
                        .widget_social_icons li a:hover{
                            padding:'.$icons_padding.'; 
                            margin:'.$icons_margin.'; 
                            color:'.$icons_color_hover.'; 
                            background:'.$icons_bg_hover.'; 
                            '.$icons_border_hover.'
                        }
                    </style>';
        $content .= '<div class="sidebar-social-networks vc_social-networks widget_social_icons vc_row" data-animate="'.$animation.'">';
            $content .= '<ul class="vc_col-md-12" style="text-align: '.$icons_align.';">';
            if ( isset($facebook) && $facebook != '' ) {
                $content .= '<li><a href="'.esc_attr( $facebook ).'"><i class="fa fa-facebook"></i></a></li>';
            }
            if ( isset($twitter) && $twitter != '' ) {
                $content .= '<li><a href="'.esc_attr( $twitter ).'"><i class="fa fa-twitter"></i></a></li>';
            }
            if ( isset($pinterest) && $pinterest != '' ) {
                $content .= '<li><a href="'.esc_attr( $pinterest ).'"><i class="fa fa-pinterest"></i></a></li>';
            }
            if ( isset($youtube) && $youtube != '' ) {
                $content .= '<li><a href="'.esc_attr( $youtube ).'"><i class="fa fa-youtube"></i></a></li>';
            }
            if ( isset($instagram) && $instagram != '' ) {
                $content .= '<li><a href="'.esc_attr( $instagram ).'"><i class="fa fa-instagram"></i></a></li>';
            }
            if ( isset($linkedin) && $linkedin != '' ) {
                $content .= '<li><a href="'.esc_attr( $linkedin ).'"><i class="fa fa-linkedin"></i></a></li>';
            }
            if ( isset($skype) && $skype != '' ) {
                $content .= '<li><a href="skype:'.esc_attr( $skype ).'?call"><i class="fa fa-skype"></i></a></li>';
            }
            if ( isset($googleplus) && $googleplus != '' ) {
                $content .= '<li><a href="'.esc_attr( $googleplus ).'"><i class="fa fa-google-plus"></i></a></li>';
            }
            if ( isset($dribbble) && $dribbble != '' ) {
                $content .= '<li><a href="'.esc_attr( $dribbble ).'"><i class="fa fa-dribbble"></i></a></li>';
            }
            if ( isset($deviantart) && $deviantart != '' ) {
                $content .= '<li><a href="'.esc_attr( $deviantart ).'"><i class="fa fa-deviantart"></i></a></li>';
            }
            if ( isset($digg) && $digg != '' ) {
                $content .= '<li><a href="'.esc_attr( $digg ).'"><i class="fa fa-digg"></i></a></li>';
            }
            if ( isset($flickr) && $flickr != '' ) {
                $content .= '<li><a href="'.esc_attr( $flickr ).'"><i class="fa fa-flickr"></i></a></li>';
            }
            if ( isset($stumbleupon) && $stumbleupon != '' ) {
                $content .= '<li><a href="'.esc_attr( $stumbleupon ).'"><i class="fa fa-stumbleupon"></i></a></li>';
            }
            if ( isset($tumblr) && $tumblr != '' ) {
                $content .= '<li><a href="'.esc_attr( $tumblr ).'"><i class="fa fa-tumblr"></i></a></li>';
            }
            if ( isset($vimeo) && $vimeo != '' ) {
                $content .= '<li><a href="'.esc_attr( $vimeo ).'"><i class="fa fa-vimeo-square"></i></a></li>';
            }
            $content .= '</ul>';
        $content .= '</div>';
        return $content;
}
add_shortcode('social_icons', 'themeslr_social_icons_shortcode');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  #SHORTCODE: Social icons
  vc_map( array(
     "name" => esc_attr__("ThemeSLR - Social Icons", 'themeslr'),
     "base" => "social_icons",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Color:", 'themeslr' ),
            "param_name" => "icons_color_normal",
            "value" => "",
            "group" => "Icons Style"
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Color - Hover:", 'themeslr' ),
            "param_name" => "icons_color_hover",
            "value" => "",
            "group" => "Icons Style"
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Background:", 'themeslr' ),
            "param_name" => "icons_bg_normal",
            "value" => "",
            "group" => "Icons Style"
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Background - Hover:", 'themeslr' ),
            "param_name" => "icons_bg_hover",
            "value" => "",
            "group" => "Icons Style"
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Border:", 'themeslr' ),
            "param_name" => "icons_border_normal",
            "value" => "",
            "group" => "Icons Style"
         ),
         array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Border - Hover:", 'themeslr' ),
            "param_name" => "icons_border_hover",
            "value" => "",
            "group" => "Icons Style"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Padding:", 'themeslr' ),
            "param_name" => "icons_padding",
            "value" => "",
            "group" => "Icons Style"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Icons Margin:", 'themeslr' ),
            "param_name" => "icons_margin",
            "value" => "",
            "group" => "Icons Style"
         ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Icons Alignment:", 'themeslr'),
           "param_name" => "icons_align",
           "std" => '',
           "value" => array(
            esc_attr__('Left', 'themeslr')    => 'left',
            esc_attr__('Center', 'themeslr')  => 'center',
            esc_attr__('Right', 'themeslr')   => 'right'
           ),
            "group" => "Icons Style"
        ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Facebook URL", 'themeslr' ),
            "param_name" => "facebook",
            "value" => "",
            "description" => esc_attr__( "Enter your facebook link.", 'themeslr' ),
            "group" => "Icons Links"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Twitter URL", 'themeslr' ),
            "param_name" => "twitter",
            "value" => "",
            "description" => esc_attr__( "Enter your twitter link.", 'themeslr' ),
            "group" => "Icons Links"
         ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Pinterest URL", 'themeslr' ),
            "param_name" => "pinterest",
            "value" => "",
            "description" => esc_attr__( "Enter your pinterest link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Google Plus URL", 'themeslr' ),
            "param_name" => "googleplus",
            "value" => "",
            "description" => esc_attr__( "Enter your Google+ link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Skype Username", 'themeslr' ),
            "param_name" => "skype",
            "value" => "",
            "description" => esc_attr__( "Enter your Skype Username.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Instagram URL", 'themeslr' ),
            "param_name" => "instagram",
            "value" => "",
            "description" => esc_attr__( "Enter your instagram link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "YouTube URL", 'themeslr' ),
            "param_name" => "youtube",
            "value" => "",
            "description" => esc_attr__( "Enter your YouTube link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "LinkedIn URL", 'themeslr' ),
            "param_name" => "linkedin",
            "value" => "",
            "description" => esc_attr__( "Enter your linkedin link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Dribbble URL", 'themeslr' ),
            "param_name" => "dribbble",
            "value" => "",
            "description" => esc_attr__( "Enter your dribbble link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Deviantart URL", 'themeslr' ),
            "param_name" => "deviantart",
            "value" => "",
            "description" => esc_attr__( "Enter your deviantart link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Digg URL", 'themeslr' ),
            "param_name" => "digg",
            "value" => "",
            "description" => esc_attr__( "Enter your digg link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Flickr URL", 'themeslr' ),
            "param_name" => "flickr",
            "value" => "",
            "description" => esc_attr__( "Enter your flickr link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Stumbleupon URL", 'themeslr' ),
            "param_name" => "stumbleupon",
            "value" => "",
            "description" => esc_attr__( "Enter your stumbleupon link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Tumblr URL", 'themeslr' ),
            "param_name" => "tumblr",
            "value" => "",
            "description" => esc_attr__( "Enter your tumblr link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Vimeo URL", 'themeslr' ),
            "param_name" => "vimeo",
            "value" => "",
            "description" => esc_attr__( "Enter your vimeo link.", 'themeslr' ),
            "group" => "Icons Links"
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__("Animation", 'themeslr'),
            "param_name" => "animation",
            "std" => '',
            "holder" => "div",
            "class" => "",
            "description" => "",
            "value" => $animations_list,
            "group" => "Icons Animation"
        )
     )
  ));
}

?>