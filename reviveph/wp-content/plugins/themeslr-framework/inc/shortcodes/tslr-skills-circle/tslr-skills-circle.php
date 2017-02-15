<?php

/**

||-> Shortcode: Skills

*/
function themeslr_skills_circle($params, $content) {
    extract( shortcode_atts( 
        array(
            'skill_circle_size'   => '', 
            'skill_circle_color'  => '',
            'skill_value'         => '',
            'skill_name'          => '',
            'skill_theme'          => '',
            'animation'           => ''
        ), $params ) );

    $skill = '';

    $datatext = '';
    if (isset($skill_name)) {
      $datatext = 'data-text="'.$skill_name.'"';
    }

    $skill .= '<div data-percent="'.$skill_value.'" '.$datatext.' class="'.$skill_circle_color.' '.$skill_circle_size.' '.$skill_theme.' mt_circle"></div>';
            
    return $skill;
}
add_shortcode('mt_skills_circle', 'themeslr_skills_circle');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  #SHORTCODE: Skill counter shortcode
  vc_map( array(
     "name" => esc_attr__("ThemeSLR - Skills Circle", 'themeslr'),
     "base" => "mt_skills_circle",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Circle Size", 'themeslr'),
          "param_name" => "skill_circle_size",
          "std" => '',
          "description" => "",
          "value" => array(
              esc_attr__('Medium', 'themeslr')     => 'medium',
              esc_attr__('Big', 'themeslr')     => 'big',
              esc_attr__('Small', 'themeslr')    => 'small'
          )
        ),
        array(
          "group" => "Styling",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Theme", 'themeslr'),
          "param_name" => "skill_theme",
          "std" => '',
          "description" => "",
          "value" => array(
              esc_attr__('Light', 'themeslr')     => 'light',
              esc_attr__('Dark', 'themeslr')     => 'dark'
          )
        ),
        array(
          "group" => "Styling",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Circle Color", 'themeslr'),
          "param_name" => "skill_circle_color",
          "std" => '',
          "description" => "",
          "value" => array(
              esc_attr__('Blue', 'themeslr')     => 'blue',
              esc_attr__('Red', 'themeslr')     => 'red',
              esc_attr__('Green', 'themeslr')    => 'green',
              esc_attr__('Orange', 'themeslr')    => 'orange',
              esc_attr__('Pink', 'themeslr')    => 'pink',
              esc_attr__('Purple', 'themeslr')    => 'purple',
              esc_attr__('Yellow', 'themeslr')    => 'yellow'
          )
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("What's inside the circle", 'themeslr'),
          "param_name" => "skill_circle_type",
          "std" => '',
          "description" => "",
          "value" => array(
              esc_attr__('Skill Value', 'themeslr')     => 'value',
              esc_attr__('Skill Name', 'themeslr')     => 'name'
          )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Skill Name", 'themeslr'),
          "param_name" => "skill_name",
          "value" => "",
          "description" => "Type a text value",
          'dependency' => array(
            'element' => 'skill_circle_type',
            'value' => 'name',
          ),  
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__("Skill Value", 'themeslr'),
          "param_name" => "skill_value",
          "value" => "",
          "description" => "Type a value from 0 to 100"
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