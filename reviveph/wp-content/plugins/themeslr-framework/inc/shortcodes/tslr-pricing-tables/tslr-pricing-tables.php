<?php


/**

||-> Shortcode: Pricing Tables

*/
function themeslr_pricing_table_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'package_differential_color_style1'           => '',
            'package_differential_color_style3'           => '',
            'package_background_style3'                   => '',
            'package_background_hover_style3'             => '',
            'package_differential_hover_color_style1'     => '',
            'package_button_color_style3'                 => '',
            'package_button_hover_color_style3'           => '',
            'package_currency'                            => '',
            'package_price'                               => '',
            'package_name'                                => '',
            'package_recommended'                         => '',
            'package_period'                              => '',
            'package_subtitle'                            => '',
            'package_feature1'                            => '',
            'package_feature2'                            => '',
            'package_feature3'                            => '',
            'package_feature4'                            => '',
            'package_feature5'                            => '',
            'animation'                                   => '',
            'button_url'                                  => '',
            'button_text'                                 => ''
        ), $params ) );


    $pricing_table = '';
      $pricing_table .= '<div class="pricing-section wow '.esc_attr($animation).'">';
          
          $pricing_table .= '<div class="pricing pricing--pema">';
            $pricing_table .= '<div class="pricing__item '.esc_attr($package_recommended).'">';
              $pricing_table .= '<h3 class="pricing__title">'.esc_attr($package_name).'</h3>';
                $pricing_table .= '<p class="pricing__sentence">'.esc_attr($package_subtitle).'</p>';
              
                  $pricing_table .= '<div class="pricing__price">';
                      $pricing_table .= '<span class="pricing__currency">'.esc_attr($package_currency).'</span>'.esc_attr($package_price).'';
                      $pricing_table .= '<span class="pricing__period">'.esc_attr($package_period).'</span>';
                  $pricing_table .= '</div>';
           
              
              $pricing_table .= '<ul class="pricing__feature-list">';
                  

                    if (!empty($package_feature1)){
                      $pricing_table .= '<li class="pricing__feature">'.esc_attr($package_feature1).'</li>';
                    }
                    if (!empty($package_feature2)){
                      $pricing_table .= '<li class="pricing__feature">'.esc_attr($package_feature2).'</li>';
                    }
                    if (!empty($package_feature3)){
                      $pricing_table .= '<li class="pricing__feature">'.esc_attr($package_feature3).'</li>';
                    }
                    if (!empty($package_feature4)){
                      $pricing_table .= '<li class="pricing__feature">'.esc_attr($package_feature4).'</li>';
                    }
                    if (!empty($package_feature5)){
                      $pricing_table .= '<li class="pricing__feature">'.esc_attr($package_feature5).'</li>';
                    }
                  
              $pricing_table .= '</ul>';
              $pricing_table .= '<a class="pricing__action" href="'.esc_attr($button_url).'">'.esc_attr($button_text).'</a>';
            $pricing_table .= '</div>';
          $pricing_table .= '</div>';
      $pricing_table .= '</div>
    
    <style type="text/css" media="screen">

          .pricing--pema .pricing__sentence {
              color: '.esc_attr($package_differential_color_style3).';
          }
          .pricing--pema .pricing__price {
              color: '.esc_attr($package_differential_color_style3).';
          }
          .pricing--pema .pricing__action {
              background-color: '.esc_attr($package_button_color_style3).';
          }
          .pricing--pema .pricing__action:hover,
          .pricing--pema .pricing__action:focus {
              background-color: '.esc_attr($package_button_hover_color_style3).';
          }
          .pricing--pema .pricing__item {
              background: '.esc_attr($package_background_style3).' none repeat scroll 0 0;
              transition: all 300ms ease-in-out 0ms;
              -ms-transformtransition: all 300ms ease-in-out 0ms;
              -webkit-transformtransition: all 300ms ease-in-out 0ms;
          }
          .pricing--pema .pricing__item:hover {
              background: '.esc_attr($package_background_hover_style3).' none repeat scroll 0 0;
              transition: all 300ms ease-in-out 0ms;
              -ms-transformtransition: all 300ms ease-in-out 0ms;
              -webkit-transformtransition: all 300ms ease-in-out 0ms;
          }
      </style>';
    return $pricing_table;
}
add_shortcode('pricing-table', 'themeslr_pricing_table_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  vc_map( array(
     "name" => esc_attr__("ThemeSLR - Pricing table", 'themeslr'),
     "base" => "pricing-table",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package period", 'themeslr'),
           "param_name" => "package_period",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package Recommended"),
           "param_name" => "package_recommended",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            'Basic'           => 'pricing__item--nofeatured',
            'Recommended'     => 'pricing__item--featured'
           )
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package name", 'themeslr'),
           "param_name" => "package_name",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package subtitle", 'themeslr'),
           "param_name" => "package_subtitle",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package price", 'themeslr'),
           "param_name" => "package_price",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package currency", 'themeslr'),
           "param_name" => "package_currency",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 1st feature", 'themeslr'),
           "param_name" => "package_feature1",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 2nd feature", 'themeslr'),
           "param_name" => "package_feature2",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 3rd feature", 'themeslr'),
           "param_name" => "package_feature3",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 4th feature", 'themeslr'),
           "param_name" => "package_feature4",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package's 5th feature", 'themeslr'),
           "param_name" => "package_feature5",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package button url", 'themeslr'),
           "param_name" => "button_url",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Package button text", 'themeslr'),
           "param_name" => "button_text",
           "value" => esc_attr__("", 'themeslr'),
           "description" => ""
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Differential package color", 'themeslr' ),
          "param_name" => "package_differential_color_style1",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose differential package color", 'themeslr' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Price package color", 'themeslr' ),
          "param_name" => "package_differential_color_style3",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose the price color", 'themeslr' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Package background color", 'themeslr' ),
          "param_name" => "package_background_style3",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose package background color", 'themeslr' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Package hover background color", 'themeslr' ),
          "param_name" => "package_background_hover_style3",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose package hover background color", 'themeslr' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Differential package color", 'themeslr' ),
          "param_name" => "package_differential_hover_color_style1",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose differential package hover color", 'themeslr' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Package button color", 'themeslr' ),
          "param_name" => "package_button_color_style3",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose package button color", 'themeslr' )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Package button hover color", 'themeslr' ),
          "param_name" => "package_button_hover_color_style3",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose package button hover color", 'themeslr' )
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