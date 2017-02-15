<?php
/**

||-> Shortcode: Bubble Box

*/
function themeslr_bubble_box_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'bubble_title'       => '',
            'bubble_subtitle'       => '',
            'bubble_description'   => '',
            'bubble_footer_text'        => '',
            'bubble_footer_text2'        => '',
            // 'bubble_caret_position'     => '',
            'bubble_background'     => '',
            'bubble_title_color'     => '',
            'bubble_subtitle_color'     => '',
            'bubble_description_color'     => '',
            'bubble_footer_text_color'     => ''
        ), $params ) ); 
    $content = '';
    $content .= '<div class="mt_bubble_box">
                    <h4 class="bubble_title">'.$bubble_title.'</h4>
                    <h6 class="bubble_subtitle">'.$bubble_subtitle.'</h6>
                    <p class="bubble_description">'.$bubble_description.'</p>
                    <h5 class="bubble_footer_text">'.$bubble_footer_text.'<span>'.$bubble_footer_text2.'</span></h5>
                    <div class="bubble_pointer" style="border-color: transparent #F6F6F6; left: -20px; top: 95px; border-width: 20px 20px 20px 0px;"></div>
                 </div>';
    return $content;
}
add_shortcode('mt_bubble_box', 'themeslr_bubble_box_shortcode');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
        "name" => esc_attr__("ThemeSLR - Bubble Box", 'themeslr'),
        "base" => "mt_bubble_box",
        "category" => esc_attr__('ThemeSLR', 'themeslr'),
        "icon" => "themeslr_shortcode",
        "params" => array(
            array(
                'group' => 'Options',
                'type' => 'dropdown',
                'heading' => __( 'Icon library', 'themeslr' ),
                'value' => array(
                    __( 'Font Awesome', 'themeslr' ) => 'fontawesome',
                    __( 'Open Iconic', 'themeslr' ) => 'openiconic',
                    __( 'Typicons', 'themeslr' ) => 'typicons',
                    __( 'Entypo', 'themeslr' ) => 'entypo',
                    __( 'Linecons', 'themeslr' ) => 'linecons'
                ),
                'param_name' => 'icon_type',
                'description' => __( 'Select icon library.', 'themeslr' ),
            ),
            array(
                'group' => 'Options',
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'themeslr' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-info-circle',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'fontawesome',
                ),
                'description' => __( 'Select icon from library.', 'themeslr' ),
            ),
            array(
                'group' => 'Options',
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'themeslr' ),
                'param_name' => 'icon_openiconic',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'openiconic',
                ),
                'description' => __( 'Select icon from library.', 'themeslr' ),
            ),
            array(
                'group' => 'Options',
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'themeslr' ),
                'param_name' => 'icon_typicons',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'typicons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'typicons',
                ),
                'description' => __( 'Select icon from library.', 'themeslr' ),
            ),
            array(
                'group' => 'Options',
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'themeslr' ),
                'param_name' => 'icon_entypo',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'entypo',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'entypo',
                ),
            ),
            array(
                'group' => 'Options',
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'themeslr' ),
                'param_name' => 'icon_linecons',
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'linecons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'linecons',
                ),
                'description' => __( 'Select icon from library.', 'themeslr' ),
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Bubble Title", 'themeslr' ),
                "param_name" => "bubble_title",
                "value" => esc_attr__( "REGISTRATION & BREAKFAST", 'themeslr' ),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Bubble Subtitle", 'themeslr' ),
                "param_name" => "bubble_subtitle",
                "value" => esc_attr__( "8:00AM - 9:00AM", 'themeslr' ),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Bubble Description", 'themeslr' ),
                "param_name" => "bubble_description",
                "value" => esc_attr__( "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim e ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in sed at av reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.", 'themeslr' ),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Bubble Footer Text 1", 'themeslr' ),
                "param_name" => "bubble_footer_text",
                "value" => esc_attr__( "MARK DOE -", 'themeslr' ),
                "description" => ""
            ),
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Bubble Footer Text 2 (right side of \"Bubble Footer Text 1\")", 'themeslr' ),
                "param_name" => "bubble_footer_text2",
                "value" => esc_attr__( "CTO CONNECTION", 'themeslr' ),
                "description" => ""
            ),
            // array(
            //     'group' => 'Design',
            //     'type' => 'dropdown',
            //     'heading' => __( 'Bubble Caret Position', 'themeslr' ),
            //     'value' => array(
            //         __( 'Right Caret', 'themeslr' ) => 'right-caret',
            //         __( 'Bottom Caret', 'themeslr' ) => 'bottom-caret',
            //         __( 'Left Caret', 'themeslr' ) => 'left-caret',
            //         __( 'Top Caret', 'themeslr' ) => 'top-caret'
            //     ),
            //     'param_name' => 'bubble_caret_position'
            // ),
            array(
                "group" => "Design",
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Bubble Background Color", 'themeslr'),
                "param_name" => "bubble_background",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Design",
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Bubble Title Color", 'themeslr'),
                "param_name" => "bubble_title_color",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Design",
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Bubble Subtitle Color", 'themeslr'),
                "param_name" => "bubble_subtitle_color",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Design",
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Bubble Description Color", 'themeslr'),
                "param_name" => "bubble_description_color",
                "value" => "",
                "description" => ""
            ),
            array(
                "group" => "Design",
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__("Bubble Footer Text Color", 'themeslr'),
                "param_name" => "bubble_footer_text_color",
                "value" => "",
                "description" => ""
            )
        )
    ));
}