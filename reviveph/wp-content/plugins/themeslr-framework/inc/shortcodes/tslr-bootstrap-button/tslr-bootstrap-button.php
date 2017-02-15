<?php


/**

||-> Shortcode: Bootstrap Buttons

*/
function themeslr_btn_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'btn_text'      => '',
            'btn_url'       => '',
            'btn_size'      => '',
            'align'      => '',
            'color'      => '',
            'text_color'      => '',
            'animation'     => ''
        ), $params ) ); 
    $content = '';
    $content .= '<div class="'.$align.' themeslr_button animateIn" data-animate="'.$animation.'">';
        $content .= '<a href="'.$btn_url.'" class="button-winona '.$btn_size.'" style="background-color:'.$color.';color:'.$text_color.'">'.$btn_text.'</a>';
    $content .= '</div>';
    return $content;
}
add_shortcode('mt-bootstrap-button', 'themeslr_btn_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  vc_map( array(
     "name" => esc_attr__("ThemeSLR - Button", 'themeslr'),
     "base" => "mt-bootstrap-button",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Button text", 'themeslr' ),
            "param_name" => "btn_text",
            "value" => esc_attr__( "Hello", 'themeslr' ),
            "description" => ""
         ),
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Button url", 'themeslr' ),
            "param_name" => "btn_url",
            "value" => "#",
            "description" => ""
         ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Button size", 'themeslr'),
          "param_name" => "btn_size",
          "value" => array(
            esc_attr__('Small', 'themeslr')   => 'btn btn-sm',
            esc_attr__('Medium', 'themeslr')   => 'btn btn-medium',
            esc_attr__('Large', 'themeslr')   => 'btn btn-lg',
            esc_attr__('Extra-Large', 'themeslr')   => 'extra-large'
          ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Alignment", 'themeslr'),
          "param_name" => "align",
          "value" => array(
            esc_attr__('Left', 'themeslr')   => 'text-left',
            esc_attr__('Center', 'themeslr')   => 'text-center',
            esc_attr__('Right', 'themeslr')   => 'text-right'
            ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Choose custom background color", 'themeslr' ),
            "param_name" => "color",
            "value" => '#FFBA41', //Default color
            "description" => esc_attr__( "Choose background color", 'themeslr' )
         ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Choose custom border color", 'themeslr' ),
            "param_name" => "border_color",
            "value" => '#C89230', //Default color
            "description" => esc_attr__( "Choose border color", 'themeslr' )
         ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Text color", 'themeslr' ),
            "param_name" => "text_color",
            "value" => '#ffffff', //Default color
            "description" => esc_attr__( "Choose text color", 'themeslr' )
         ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'themeslr'),
          "param_name" => "animation",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
     )
  ));
}