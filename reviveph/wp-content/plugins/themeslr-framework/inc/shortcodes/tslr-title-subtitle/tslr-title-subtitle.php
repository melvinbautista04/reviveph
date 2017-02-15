<?php

/**

||-> Shortcode: Title and Subtitle

*/
function themeslr_heading_title_subtitle_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'title'               => '',
            'subtitle'            => '',
            'title_color'         => '',
            'subtitle_color'      => '',
            'border_color'        => ''
        ), $params ) ); 
    $content = '<div class="title-subtile-holder">';
    $content .= '<h1 class="section-title '.$title_color.'">'.$title.'</h1>';
    $content .= '<div class="section-border '.$border_color.'"></div>';
    $content .= '<div class="section-subtitle '.$subtitle_color.'">'.$subtitle.'</div>';
    $content .= '</div>';
    return $content;
}
add_shortcode('heading_title_subtitle', 'themeslr_heading_title_subtitle_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
            "name" => esc_attr__("ThemeSLR - Heading with Title and Subtitle", 'themeslr'),
            "base" => "heading_title_subtitle",
            "category" => esc_attr__('ThemeSLR', 'themeslr'),
            "icon" => "themeslr_shortcode",
            "params" => array(
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Section title", 'themeslr' ),
                    "param_name" => "title",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Section subtitle", 'themeslr'),
                    "param_name" => "subtitle",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Title Color", 'themeslr'),
                    "param_name" => "title_color",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Select an option', 'themeslr')     => 'dark_title',
                        esc_attr__('Light color title for dark section', 'themeslr')     => 'light_title',
                        esc_attr__('Dark color title for light section', 'themeslr')     => 'dark_title'
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Border Section Color", 'themeslr'),
                    "param_name" => "border_color",
                    "std" => '',
                    "description" => "",
                    "value" => array(
                        esc_attr__('Select an option', 'themeslr')     => 'dark_title',
                        esc_attr__('Light border for dark section', 'themeslr')     => 'light_border',
                        esc_attr__('Dark border for light section', 'themeslr')     => 'dark_border'
                    )
                ),
                array(
                    "group" => "Styling",
                    "type" => "dropdown",
                    "holder" => "div",
                    "std" => '',
                    "class" => "",
                    "heading" => esc_attr__("Subtitle Color", 'themeslr'),
                    "param_name" => "subtitle_color",
                    "description" => "",
                    "value" => array(
                        esc_attr__('Select an option', 'themeslr')     => 'dark_title',
                        esc_attr__('Light color subtitle for dark section', 'themeslr')     => 'light_subtitle',
                        esc_attr__('Dark color subtitle for light section', 'themeslr')     => 'dark_subtitle'
                    )
                )
                
            )
        )
    );
}