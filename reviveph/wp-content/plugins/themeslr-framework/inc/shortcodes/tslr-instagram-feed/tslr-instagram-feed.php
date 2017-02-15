<?php

/**

||-> Shortcode: Instagram Feed

*/
function themeslr_instagram_feed($params, $content) {
    extract( shortcode_atts( 
        array(
            'columns' =>'',
            'number' =>'',
            'tagname' =>'',
        ), $params ) );
    

    // get number
    if (isset($number)) {
      $instagram_nr = $number;
    }else{
      $instagram_nr = '9';
    }

    // get tagname
    if (isset($tagname)) {
      $instagram_tagname = $tagname;
    }else{
      $instagram_tagname = 'themeslrpolitica';
    }

    // get columns
    if (isset($columns)) {
      $instagram_columns = $columns;
    }else{
      $instagram_columns = 'col-md-12';
    }


    // target unique id
    $instagram_target_id = 'tslr_instagram_'.uniqid();


    // build html
    $html = '';
    $html .= '<script type="text/javascript">
                jQuery( document ).ready(function() {
                  var feed = new Instafeed({
                    target: "'.esc_attr($instagram_target_id).'",
                    get: "tagged",
                    limit: '.esc_attr($instagram_nr).',
                    tagName: "'.esc_attr($tagname).'",
                    resolution: "standard_resolution",
                    clientId: "c22209d943e5461a88e2cec4841ea190",
                    accessToken: "4100678025.ba4c844.6ff835aeb6fd4050b944adf5f3e6c88e",
                    template: "<div class=\"item '.esc_attr($instagram_columns).'\"><div class=\"instagram_group\"><a href=\"{{link}}\" target=\"_blank\"><div class=\"instagram_overlay\"><i class=\"icon-link icons\"></i></div><img src=\"{{image}}\" alt=\"{{caption}}\"/></a></div></div>",

                  });
                  feed.run();
                });
              </script>';

    $html .= '<div class="tslr_instagram_feed row" id="'.esc_attr($instagram_target_id).'"></div>';
      
    return $html;
}
add_shortcode('tslr_instagram_feed', 'themeslr_instagram_feed');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

vc_map( array(
     "name" => esc_attr__("ThemeSLR - Instagram Feed", 'themeslr'),
     "base" => "tslr_instagram_feed",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number of Instagram Pictures to show", 'themeslr' ),
            "param_name" => "number",
            "value" => ""
         ),
         array(
            "group" => "Options",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Instagram tagname", 'themeslr' ),
            "param_name" => "tagname",
            "value" => ""
         ),
         array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Columns", 'themeslr'),
          "param_name" => "columns",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => array(
            '1 Column'   => 'col-md-12',
            '2 Column'   => 'col-md-6',
            '3 Column'   => 'col-md-4',
            '4 Column'   => 'col-md-3'
            )
        )
     )
  ));

}
?>