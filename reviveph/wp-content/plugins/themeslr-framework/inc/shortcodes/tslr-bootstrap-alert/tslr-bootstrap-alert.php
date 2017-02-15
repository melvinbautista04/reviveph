<?php

/**

||-> Shortcode: Bootstrap Alert

*/
function themeslr_alert_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'alert_style'           => '', 
            'alert_version'         => '', // bordered/non_bordered
            'alert_dismissible'     => '', // yes/no
            'alert_text'            => '',
            'animation'             => ''
        ), $params ) );
    $content = '';
    $content .= '<div role="alert" class="alert alert-'.$alert_style.' '.$alert_version.' animateIn" data-animate="'.$animation.'">';
        if ($alert_dismissible == 'yes') {
            $content .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>';
        }
        $content .= $alert_text;
    $content .= '</div>';
    return $content;
}
add_shortcode('alert', 'themeslr_alert_shortcode');






/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
        "name" => esc_attr__("ThemeSLR - Alert", 'themeslr'),
        "base" => "alert",
        "category" => esc_attr__('ThemeSLR', 'themeslr'),
        "icon" => "themeslr_shortcode",
        "params" => array(
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Alert style", 'themeslr'),
                "param_name" => "alert_style",
                "std" => '',
                "description" => "",
                "value" => array(
                    esc_attr__('Success', 'themeslr')     => 'success',
                    esc_attr__('Info', 'themeslr')        => 'info',
                    esc_attr__('Warning', 'themeslr')     => 'warning',
                    esc_attr__('Danger', 'themeslr')      => 'danger'
                )
            ),
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Choose version", 'themeslr'),
                "param_name" => "alert_version",
                "std" => '',
                "description" => "",
                "value" => array(
                    esc_attr__('Non bordered', 'themeslr') => 'non_bordered',
                    esc_attr__('Bordered', 'themeslr') => 'bordered'
                )
            ),
            array(
                "group" => "Options",
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Is dismissible?", 'themeslr'),
                "param_name" => "alert_dismissible",
                "std" => '',
                "description" => "",
                "value" => array(
                    esc_attr__('Yes', 'themeslr')    => 'yes',
                    esc_attr__('No', 'themeslr')     => 'no'
                )
            ),
            array(
                "group" => "Options",
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Alert text", 'themeslr'),
                "param_name" => "alert_text",
                "value" => __("<strong>Well done!</strong> You successfully read this important alert message", 'themeslr'),
                "description" => ""
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