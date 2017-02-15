<?php 


/**

||-> Shortcode: Events Calendar Shortcode

*/

/*---------------------------------------------*/
/*--- 41. Events ---*/
/*---------------------------------------------*/
function tslr_events_calendar_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'=>'',
            'alleventsurl' => ''
        ), $params ) ); 
        $args_events = array(
                'post_type' => 'tribe_events',
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_status'      => 'publish' 
                );
        $events = get_posts($args_events);
        $content  = "";
        $content .= '<div class="tslr-event-list-shortcode col-md-12">';
          foreach ($events as $event) {

            $meta = get_post_meta($event->ID);
            $datemeta = $meta['_EventStartDate'][0];
            $date = new DateTime($datemeta);
            $startdate_day = $date->format('d');
            $startdate_month = $date->format('M');
            // $starthour = $date->format('H:i');

            $currency = $meta['_EventCurrencySymbol'][0];
            $cost = $meta['_EventCost'][0];
            $symbol = $meta['_EventCurrencySymbol'][0];
            $symbolpos = $meta['_EventCurrencyPosition'][0];


            $content_post   = get_post($event->ID);
            $content_post_final        = $content_post->post_content;
            $content_post_final        = apply_filters('the_content', $content_post_final);
            $content_post_final        = str_replace(']]>', ']]&gt;', $content_post_final);



            // START HTML
            $content .= '<div class="tslr-event row">';
              
              // DATE
              $content .= '<div class="col-md-1 tslr-event-date">';
                $content .= '<div class="tslr-event-day">'.$startdate_day.'</div>';
                $content .= '<div class="tslr-event-month">'.$startdate_month.'</div>';
              $content .= '</div>';

              // TITLE
              $content .= '<div class="col-md-9 tslr-event-title-subtitle">
                              <h2 class="tslr-event-title">
                                <a href="'.get_permalink($event->ID).'">'.$event->post_title.'</a>
                              </h2>
                              <div class="tslr-event-subtitle">'.themeslr_excerpt_limit($content_post_final, 12).'</div>
                            </div>';

              // VALUE
              $content .= '<div class="col-md-2 tslr-event-value">';
                if($cost){
                    if($symbolpos=='prefix'){
                        $content .= '<span>'.$symbol.''.$cost.'</span>';
                    }elseif($symbolpos=='suffix'){
                        $content .= '<span>'.$cost.''.$symbol.'</span>';
                    }
                }else{
                    $content .= '<span>'.__('Join Free','themeslr').'</span>';
                }
              $content .= '</div>';
            $content .= '</div>';
          }
          $content .= '<div class="text-center"><a class="tslr-events-page" href="'.$alleventsurl.'">'.__('Check Upcoming Events','themeslr').'</a></div>';        
        $content .= '</div>';
        // END HTML

  return $content;
}

add_shortcode('tslr_events_calendar', 'tslr_events_calendar_shortcode');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("ThemeSLR - Events Calendar (Upcoming Events)", 'themeslr'),
     "base" => "tslr_events_calendar",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of posts", 'themeslr' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'themeslr' )
        ),
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "All Events Page Url", 'themeslr' ),
          "param_name" => "alleventsurl",
          "value" => "",
          "description" => esc_attr__( "Enter number of blog post to show.", 'themeslr' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'themeslr'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
}

?>