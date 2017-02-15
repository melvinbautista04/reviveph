<?php 


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// SHORTCODES
include_once( 'tslr-members/tslr-members-slider.php' ); # Members 01
include_once( 'tslr-services/tslr_services_slider.php' ); # Services 02
include_once( 'tslr-services/tslr_custom_service.php' ); # Services 03
include_once( 'tslr-contact/tslr-contact01.php' );
include_once( 'tslr-blog-posts/tslr-blogpost01.php' ); # Portfolio
include_once( 'tslr-testimonials/tslr-testimonials01.php' ); # Testimonials 01
include_once( 'tslr-clients/tslr-clients.php' ); # Clients
include_once( 'tslr-title-subtitle/tslr-title-subtitle.php' ); # Title Subtitle
include_once( 'tslr-social-icons/tslr-social-icons.php' ); # Social Icons
include_once( 'tslr-service_activity/tslr-service_activity.php' ); # Service Activity
include_once( 'tslr-skills/tslr-skills.php' ); # Skills
include_once( 'tslr-pricing-tables/tslr-pricing-tables.php' ); # Pricing Tables
include_once( 'tslr-icon-list-item/tslr-icon-list-item.php' ); # Mailchimp Subscribe Form
include_once( 'tslr-typed-text/tslr-typed-text.php' ); # Mailchimp Subscribe Form
include_once( 'tslr-instagram-feed/tslr-instagram-feed.php' ); # Mailchimp Subscribe Form
// BOOTSTRAP ELEMENTS
include_once( 'tslr-bootstrap-alert/tslr-bootstrap-alert.php' ); # Bootstrap Alerts
include_once( 'tslr-bootstrap-panel/tslr-bootstrap-panel.php' ); # Bootstrap Panel
include_once( 'tslr-bootstrap-listgroup/tslr-bootstrap-listgroup.php' ); # Bootstrap List Group
include_once( 'tslr-bootstrap-button/tslr-bootstrap-button.php' ); # Bootstrap Buttons
include_once( 'tslr-bubble-box/tslr-bubble-box.php' ); # Bootstrap Buttons
include_once( 'tslr-fancy-gallery/tslr-fancy-gallery.php' ); # Bootstrap Buttons
include_once( 'tslr-events-calendar-shortcode/tslr-events-calendar-shortcode.php' ); # Bootstrap Buttons
include_once( 'tslr-sermons/tslr-sermons.php' ); # Bootstrap Buttons





/**

||-> JS_COMPOSER Register Shortcodes

*/
// check for plugin using plugin name
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    // REMOVE CV Shortcodes
    // vc_remove_element( "vc_progress_bar" );

} 







?>