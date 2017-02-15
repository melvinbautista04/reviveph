<?php

/**

||-> Shortcode: Icon List Item

*/
function themeslr_icon_list_item($params, $content) {
  extract( shortcode_atts( 
      array(
          'list_icon'      => '',
          'list_icon_size'      => '',
          'list_icon_margin'      => '',
          'list_icon_color'    => '',
          'list_icon_title'     => '',
          'list_icon_url'     => '',
          'list_icon_title_size'     => '',
          'list_icon_title_color'     => ''
      ), $params ) );


  $html = '';

  $html .= '<div class="mt-icon-list-item">';

              if (!empty($list_icon_url)) {
                $html .= '<a href="'.$list_icon_url.'">';
              }

      $html .= '<div class="mt-icon-list-icon-holder">
                  <div class="mt-icon-list-icon-holder-inner clearfix"><i style="margin-right:'.esc_attr($list_icon_margin).'px; color:'.esc_attr($list_icon_color).';font-size:'.esc_attr($list_icon_size).'px" class="'.esc_attr($list_icon).'"></i></div>
                </div>
                <p class="mt-icon-list-text" style="font-size: '.esc_attr($list_icon_title_size).'px; color: '.esc_attr($list_icon_title_color).'">'.esc_attr($list_icon_title).'</p>';
              
              if (!empty($list_icon_url)) {
                $html .= '</a>';
              }

            $html .= '</div>';

  return $html;
}
add_shortcode('mt_icon_list_item', 'themeslr_icon_list_item');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  vc_map( array(
     "name" => esc_attr__("ThemeSLR - Icon List Item", 'themeslr'),
     "base" => "mt_icon_list_item",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
        array(
          "group" => "Icon Setup",
          "type" => "dropdown",
          "heading" => esc_attr__("Icon", 'themeslr'),
          "param_name" => "list_icon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $fa_list
        ),
        array(
          "group" => "Icon Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Size (px)", 'themeslr'),
          "param_name" => "list_icon_size",
          "value" => "",
          "description" => "Default: 18(px)"
        ),
        array(
          "group" => "Icon Setup",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Margin right (px)", 'themeslr'),
          "param_name" => "list_icon_margin",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Icon Setup",
          "type" => "colorpicker",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Icon Color", 'themeslr'),
          "param_name" => "list_icon_color",
          "value" => "",
          "description" => ""
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/Title", 'themeslr'),
          "param_name" => "list_icon_title",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Eg: This is a label"
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Label/Icon URL", 'themeslr'),
          "param_name" => "list_icon_url",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Eg: http://modeltheme.com"
        ),
        array(
          "group" => "Label Setup",
          "type" => "textfield",
          "heading" => esc_attr__("Title Font Size", 'themeslr'),
          "param_name" => "list_icon_title_size",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Default: 18(px)"
        ),
        array(
          "group" => "Label Setup",
          "type" => "colorpicker",
          "heading" => esc_attr__("Title Color", 'themeslr'),
          "param_name" => "list_icon_title_color",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => ""
        )
     )
  ));
}