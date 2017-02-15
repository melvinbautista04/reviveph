<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'churchwp_register_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function churchwp_register_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // LOCAL Plugins - PREMIUM
        array(
            'name'                  => esc_attr__('WPBakery Visual Composer', 'churchwp'), // The plugin name
            'slug'                  => 'js_composer', // The plugin slug (typically the folder name)
            'source'                => esc_url('http://themeslr.com/plugins/js_composer.zip'), // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '5.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_attr__('Revolution Slider', 'churchwp'), // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => esc_url('http://themeslr.com/plugins/revslider.zip'), // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '5.3.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_attr__('ThemeSLR Framework', 'churchwp'), // The plugin name
            'slug'                  => 'themeslr-framework', // The plugin slug (typically the folder name)
            'source'                => esc_url('http://themeslr.com/plugins/themeslr-framework-churchwp.zip'), // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'                  => esc_attr__('Massive Addons for Visual Composer', 'churchwp'), // The plugin name
            'slug'                  => 'mpc-massive', // The plugin slug (typically the folder name)
            'source'                => esc_url('http://themeslr.com/plugins/mpc-massive.zip'), // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '2.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),
        // FROM WordPress Repository
        array(
            'name'                  => esc_attr__('Redux Framework', 'churchwp'), // The plugin name
            'slug'                  => 'redux-framework', // The plugin slug (typically the folder name)
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_attr__('Give - WordPress Donation Plugin', 'churchwp'), // The plugin name
            'slug'                  => 'give', // The plugin slug (typically the folder name)
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_attr__('Contact Form 7', 'churchwp'), // The plugin name
            'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_attr__('WooCommerce', 'churchwp'), // The plugin name
            'slug'                  => 'woocommerce', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_attr__('The Events Calendar', 'churchwp'), // The plugin name
            'slug'                  => 'the-events-calendar', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_attr__('Social Share Buttons - Social Pug', 'churchwp'), // The plugin name
            'slug'                  => 'social-pug', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name'                  => esc_attr__('MailChimp for WordPress', 'churchwp'), // The plugin name
            'slug'                  => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );
}
