<?php
/**
* Plugin Name: ThemeSLR Framework
* Plugin URI: http://themeslr.com/
* Description: ThemeSLR Framework;
* Version: 1.1
* Author: ThemeSLR
* Author http://themeslr.com/
* Text Domain: themeslr
*/


$plugin_dir = plugin_dir_path( __FILE__ );





/**

||-> Function: Dynamic Featured Image for 'portfolio' CPT only

*/
function themeslr_allowed_post_types() {
    return array('portfolio'); //show DFI only in post
}
add_filter('dfi_post_types', 'themeslr_allowed_post_types');



add_filter('widget_text','do_shortcode');




/**
||-> Function: require_once() plugin necessary parts
*/
require_once('inc/post-types/post-types.php'); // POST TYPES
require_once('inc/shortcodes/shortcodes.php'); // SHORTCODES
require_once('inc/widgets/widgets.php'); // WIDGETS
require_once('inc/metaboxes/metaboxes.php'); // METABOXES
require_once('inc/demo-importer/redux.php'); // DEMO IMPORTER
require_once('inc/dynamic-featured-image/dynamic-featured-image.php'); // DYNAMIC FEATURED IMAGE
require_once('inc/mega-menu/mega-menu.php'); // MEGA MENU
require_once('inc/sb-google-maps-vc-addon/sb-google-maps-vc-addon.php'); // GMAPS




/**

||-> Function: LOAD PLUGIN TEXTDOMAIN

*/
function siteorigin_panels_init_lang(){
    load_plugin_textdomain('themeslr', false, dirname( plugin_basename( __FILE__ ) ). '/languages/');
}
add_action('plugins_loaded', 'siteorigin_panels_init_lang');




/**

||-> Function: themeslr_enqueue_scripts()

*/
function themeslr_enqueue_scripts() {
    // CSS
    wp_register_style( 'style-shortcodes-inc',  plugin_dir_url( __FILE__ ) . 'inc/shortcodes/shortcodes.css' );
    wp_enqueue_style( 'style-shortcodes-inc' );
    wp_register_style( 'style-tslr-mega-menu',  plugin_dir_url( __FILE__ ) . 'css/tslr-mega-menu.css' );
    wp_enqueue_style( 'style-tslr-mega-menu' );
    
    // SCRIPTS
    wp_enqueue_script( 'lazyload', plugin_dir_url( __FILE__ ) . 'js/jquery.lazyload.min.js', array(), '1.9.3', true );
    wp_enqueue_script( 'modernizr', plugin_dir_url( __FILE__ ) . 'js/tslr-fancy-gallery/modernizr.min.js', array(), '2.7.1', true );
    wp_enqueue_script( 'photostack', plugin_dir_url( __FILE__ ) . 'js/tslr-fancy-gallery/photostack.js', array(), '1.0.0', true );
    wp_enqueue_script( 'instafeed', plugin_dir_url( __FILE__ ) . 'js/instafeed.min.js', array(), '1.9.3', true );
    wp_enqueue_script( 'percircle', plugin_dir_url( __FILE__ ) . 'js/mt-skills-circle/percircle.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-tslr-custom', plugin_dir_url( __FILE__ ) . 'js/tslr-custom.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'themeslr_enqueue_scripts' );




/**

||-> Function: themeslr_enqueue_admin_scripts()

*/
function themeslr_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( 'js-tslr-admin-custom', plugin_dir_url( __FILE__ ) . 'js/tslr-custom-admin.js', array(), '1.0.0', true );
    // CSS
    wp_register_style( 'css-tslr-custom',  plugin_dir_url( __FILE__ ) . 'css/tslr-custom.css' );
    wp_enqueue_style( 'css-tslr-custom' );
    wp_register_style( 'css-fontawesome-icons',  plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css' );
    wp_enqueue_style( 'css-fontawesome-icons' );
    wp_register_style( 'css-simple-line-icons',  plugin_dir_url( __FILE__ ) . 'css/simple-line-icons.css' );
    wp_enqueue_style( 'css-simple-line-icons' );

}
add_action('admin_enqueue_scripts', 'themeslr_enqueue_admin_scripts');




    
    

add_image_size( 'mt_1250x700', 1250, 700, true );
add_image_size( 'mt_320x480', 320, 480, true );
add_image_size( 'mt_900x550', 900, 550, true );




/**

||-> Function: themeslr_cmb_initialize_cmb_meta_boxes

*/
function themeslr_cmb_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once ('init.php');
}
add_action( 'init', 'themeslr_cmb_initialize_cmb_meta_boxes', 9999 );



/**

||-> Function: themeslr_cmb_initialize_cmb_meta_boxes

*/
function themeslr_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}



/**

||-> ... Custom functions here ...

*/









?>