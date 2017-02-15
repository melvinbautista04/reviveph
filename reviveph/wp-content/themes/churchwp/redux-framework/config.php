<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_attr__( 'Theme Panel', 'churchwp' ),
        'page_title'           => esc_attr__( 'Theme Panel', 'churchwp' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'churchwp_redux',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => esc_url('https://themeforest.net/user/themeslr/portfolio'),
        'title' => esc_attr__( 'Theme Support', 'churchwp' ),
    );
    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => esc_url('http://themeforest.net/downloads'),
        'title' => esc_attr__( 'Rate this theme', 'churchwp' ),
    );

  

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_attr__( '', 'churchwp' ), $v );
    } else {
        $args['intro_text'] = esc_attr__( '', 'churchwp' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_attr__( '', 'churchwp' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*
        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
     */
    include_once('config.arrays.php');
    /**
    ||-> SECTION: General Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'General Settings', 'churchwp' ),
        'id'    => 'mt_general',
        'icon'  => 'el el-icon-wrench'
    ));
    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'General Settings', 'churchwp' ),
        'id'         => 'mt_general_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_breadcrumbs',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Breadcrumbs</h3>' )
            ),
            array(
                'id'       => 'mt_enable_breadcrumbs',
                'type'     => 'switch', 
                'title'    => esc_attr__('Breadcrumbs', 'churchwp'),
                'subtitle' => esc_attr__('Enable or disable breadcrumbs', 'churchwp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_breadcrumbs_delimitator',
                'type'     => 'text',
                'title'    => esc_attr__('Breadcrumbs delimitator', 'churchwp'),
                'subtitle' => esc_attr__('This is a little space under the Field Title in the Options table, additional info is good in here.', 'churchwp'),
                'desc'     => esc_attr__('This is the description field, again good for additional info.', 'churchwp'),
                'default'  => '/'
            ),
            array(
                'id'   => 'mt_divider_site_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Site Layout</h3>' )
            ),
            array(
                'id'        => 'tslr_site_layout',
                'type'      => 'select',
                'title'     => esc_attr__('Choose the layout of the site(Fullwidth or Boxed)', 'churchwp'),
                'subtitle'  => esc_attr__('Default: Fullwidth', 'churchwp'),
                'desc'      => esc_attr__('This option will be applied all over the site. If you want this option only on certain pages, edit each page and set the Page Layout to Fullwidth or Boxed.', 'churchwp'),
                'options'   => array(
                        'layout_fullwidth'   => 'Fullwidth Layout',
                        'layout_boxed'   => 'Boxed Layout'
                    ),
                'default'   => 'layout_fullwidth',
            ),
            array(         
                'id'       => 'tslr_site_layout_boxed_bg',
                'type'     => 'background',
                'title'    => esc_attr__('Boxed Layout - Body Background', 'churchwp'),
                'subtitle' => esc_attr__('Set the Body background when Boxed Layout is activated.', 'churchwp'),
                'output'      => array('body.layout_boxed'),
                'default'  => array(
                    'background-color' => '#E7E7E7',
                    'background-image' => get_template_directory_uri().'/images/boxed_pattern.png',
                ),
            ),
            array(
                'id'   => 'mt_divider_custom_css',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Custom CSS Code</h3>' )
            ),
            array(
                'id' => 'mt_custom_css',
                'type' => 'ace_editor',
                'title' => esc_attr__('CSS Code', 'churchwp'),
                'subtitle' => esc_attr__('Paste your CSS code here.', 'churchwp'),
                'mode' => 'css',
                'theme' => 'monokai',
                'default' => "#header{\nmargin: 0 auto;\n}"
            )
        ),
    ));


    // Back to Top
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Back to Top Button', 'churchwp' ),
        'id'         => 'mt_general_back_to_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_backtotop_status',
                'type'     => 'switch', 
                'title'    => esc_attr__('Back to Top Button Status', 'churchwp'),
                'subtitle' => esc_attr__('Enable or disable "Back to Top Button"', 'churchwp'),
                'default'  => true,
            ),
            array(         
                'id'       => 'mt_backtotop_bg_color',
                'type'     => 'background',
                'title'    => esc_attr__('Back to Top Button Status Backgrond', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => array(
                    'background-color' => '#6f9a37',
                    'background-repeat' => 'no-repeat',
                    'background-position' => 'center center',
                    'background-image' => get_template_directory_uri().'/images/svg/back-to-top-arrow.svg',
                )
            ),
            array(
                'id'            => 'mt_backtotop_height_width',
                'type'          => 'slider',
                'title'         => esc_attr__( 'Button Height/Width', 'churchwp' ),
                'subtitle'      => esc_attr__( 'Set the Height/Width of the "Back to Top button"', 'churchwp' ),
                'desc'          => esc_attr__( 'Default: 40px (Height/Width)', 'churchwp' ),
                'default'       => 40,
                'min'           => 10,
                'step'          => 1,
                'max'           => 300,
                'display_value' => 'label'
            ),
            array(
                'id'       => 'mt_backtotop_border_status',
                'type'     => 'switch', 
                'title'    => esc_attr__('Inner Border Status.', 'churchwp'),
                'subtitle' => esc_attr__('Show or Hide the inner border.', 'churchwp'),
                'default'  => true,
            ),
        ),
    ));


    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Page Preloader', 'churchwp' ),
        'id' => 'mt_general_preloader',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'mt_divider_preloader_status',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Status</h3>' )
            ),
            array(
                'id'       => 'mt_preloader_status',
                'type'     => 'switch', 
                'title'    => esc_attr__('Enable Page Preloader', 'churchwp'),
                'subtitle' => esc_attr__('Enable or disable page preloader', 'churchwp'),
                'default'  => true,
            ),
            array(
                'id'   => 'mt_divider_preloader_styling',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Styling</h3>' )
            ),
            array(         
                'id'       => 'mt_preloader_bg_color',
                'type'     => 'background',
                'title'    => esc_attr__('Page Preloader Backgrond', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => array(
                    'background-color' => '#6f9a37',
                ),
                'output' => array(
                    '.churchwp_preloader_holder'
                )
            ),
            array(
                'id'       => 'mt_preloader_color',
                'type'     => 'color',
                'title'    => esc_attr__('Preloader color:', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #ffffff', 'churchwp'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'   => 'mt_divider_preloader_animation',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Variant</h3>' )
            ),
            array(
                'id'       => 'mt_preloader_animation',
                'type'     => 'radio',
                'title'    => esc_attr__('Preloader Animation', 'churchwp'), 
                'subtitle' => esc_attr__('Select Preloader Animation', 'churchwp'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'v1_ball_triangle' => '<div class="churchwp_preloader v1_ball_triangle">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-triangle-path">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>', 

                    'v2_ball_pulse' => '<div class="churchwp_preloader v2_ball_pulse">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-pulse">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v3_ball_grid_pulse' => '<div class="churchwp_preloader v3_ball_grid_pulse">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-grid-pulse">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v4_ball_clip_rotate' => '<div class="churchwp_preloader v4_ball_clip_rotate">
                                                    <div class="loaders">
                                                        <div class="loader">
                                                            <div class="loader-inner ball-clip-rotate">
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>',

                    'v5_ball_clip_rotate_pulse' => '<div class="churchwp_preloader v5_ball_clip_rotate_pulse">
                                                        <div class="loaders">
                                                            <div class="loader">
                                                                <div class="loader-inner ball-clip-rotate-pulse">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>',

                    'v6_square_spin' => '<div class="churchwp_preloader v6_square_spin">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner square-spin">
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v7_ball_clip_rotate_multiple' => '<div class="churchwp_preloader v7_ball_clip_rotate_multiple">
                                                            <div class="loaders">
                                                                <div class="loader">
                                                                    <div class="loader-inner ball-clip-rotate-multiple">
                                                                        <div></div>
                                                                        <div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>',

                    'v8_ball_pulse_rise' => '<div class="churchwp_preloader v8_ball_pulse_rise">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-pulse-rise">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v9_ball_rotate' => '<div class="churchwp_preloader v9_ball_rotate">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-rotate">
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v10_cube_transition' => '<div class="churchwp_preloader v10_cube_transition">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner cube-transition">
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v11_ball_zig_zag' => '<div class="churchwp_preloader v11_ball_zig_zag">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-zig-zag">
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v12_ball_zig_zag_deflect' => '<div class="churchwp_preloader v12_ball_zig_zag_deflect">
                                                        <div class="loaders">
                                                            <div class="loader">
                                                                <div class="loader-inner ball-zig-zag-deflect">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>',

                    'v13_ball_scale' => '<div class="churchwp_preloader v13_ball_scale">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-scale">
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v14_line_scale' => '<div class="churchwp_preloader v14_line_scale">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner line-scale">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v15_line_scale_party' => '<div class="churchwp_preloader v15_line_scale_party">
                                                    <div class="loaders">
                                                        <div class="loader">
                                                            <div class="loader-inner line-scale-party">
                                                                <div></div>
                                                                <div></div>
                                                                <div></div>
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>',

                    'v16_ball_scale_multiple' => '<div class="churchwp_preloader v16_ball_scale_multiple">
                                                    <div class="loaders">
                                                        <div class="loader">
                                                            <div class="loader-inner ball-scale-multiple">
                                                                <div></div>
                                                                <div></div>
                                                                <div></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>',

                    'v17_ball_pulse_sync' => '<div class="churchwp_preloader v17_ball_pulse_sync">
                                                <div class="loaders">
                                                    <div class="loader">
                                                        <div class="loader-inner ball-pulse-sync">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>',

                    'v18_ball_beat' => '<div class="churchwp_preloader v18_ball_beat">
                                            <div class="loaders">
                                                <div class="loader">
                                                    <div class="loader-inner ball-beat">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>',

                    'v19_line_scale_pulse_out' => '<div class="churchwp_preloader v19_line_scale_pulse_out">
                                                        <div class="loaders">
                                                            <div class="loader">
                                                                <div class="loader-inner line-scale-pulse-out">
                                                                    <div></div>
                                                                    <div></div>
                                                                    <div></div>
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>',

                    'v20_line_scale_pulse_out_rapid' => '<div class="churchwp_preloader v20_line_scale_pulse_out_rapid">
                                                            <div class="loaders">
                                                                <div class="loader">
                                                                    <div class="loader-inner line-scale-pulse-out-rapid">
                                                                        <div></div>
                                                                        <div></div>
                                                                        <div></div>
                                                                        <div></div>
                                                                        <div></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>'


                ),
                'default' => 'v17_ball_pulse_sync'
            )
        ),
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Sidebars', 'churchwp' ),
        'id'         => 'mt_general_sidebars',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_sidebars',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Generate Infinite Number of Sidebars</h3>' )
            ),
            array(
                'id'       => 'mt_dynamic_sidebars',
                'type'     => 'multi_text',
                'title'    => esc_attr__( 'Sidebars', 'churchwp' ),
                'subtitle' => esc_attr__( 'Use the "Add More" button to create unlimited sidebars.', 'churchwp' ),
                'add_text' => esc_attr__( 'Add one more Sidebar', 'churchwp' ),
                'default'  => array(esc_attr__('Single Article Sidebar', 'churchwp'), esc_attr__('Burger Sidebar', 'churchwp')),
            )
        ),
    ));

    /**
    ||-> SECTION: Styling Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Styling Settings', 'churchwp' ),
        'id'    => 'mt_styling',
        'icon'  => 'el el-icon-magic'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Global Fonts', 'churchwp' ),
        'id'         => 'mt_styling_global_fonts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_googlefonts',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Import Infinite Google Fonts</h3>' )
            ),
            array(
                'id'       => 'mt_google_fonts_select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => esc_attr__('Import Google Font Globally', 'churchwp'), 
                'subtitle' => esc_attr__('Select one or multiple fonts', 'churchwp'),
                'desc'     => esc_attr__('Importing fonts made easy', 'churchwp'),
                'options'  => $google_fonts_list,
                'default'  => array(
                    'Alegreya:regular,italic,700,700italic,900,900italic,latin-ext,latin',
                    'Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic,vietnamese,greek,latin-ext,greek-ext,cyrillic-ext,latin,cyrillic',
                    'Roboto+Condensed:300,300italic,regular,italic,700,700italic,vietnamese,greek,latin-ext,greek-ext,cyrillic-ext,latin,cyrillic'
                ),
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Skin color', 'churchwp' ),
        'id'         => 'mt_styling_skin_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Links Colors(Regular, Hover, Active/Visited)</h3>' )
            ),
            array(
                'id'       => 'mt_global_link_styling',
                'type'     => 'link_color',
                'title'    => esc_attr__('Links Color Option', 'churchwp'),
                'subtitle' => esc_attr__('Only color validation can be done on this field type(Default Regular: #6f9a37; Default Hover: #597c2c; Default Active: #597c2c;)', 'churchwp'),
                'default'  => array(
                    'regular'  => '#6f9a37', // blue
                    'hover'    => '#597c2c', // blue-x3
                    'active'   => '#597c2c',  // blue-x3
                    'visited'  => '#597c2c',  // blue-x3
                )
            ),
            array(
                'id'   => 'mt_divider_main_colors',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Main Colors & Backgrounds</h3>' )
            ),
            array(
                'id'       => 'mt_style_main_texts_color',
                'type'     => 'color',
                'title'    => esc_attr__('Main texts color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color',
                'type'     => 'color',
                'title'    => esc_attr__('Main backgrounds color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color_hover',
                'type'     => 'color',
                'title'    => esc_attr__('Main backgrounds color (hover)', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #597c2c', 'churchwp'),
                'default'  => '#597c2c',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_semi_opacity_backgrounds',
                'type'     => 'color_rgba',
                'title'    => esc_attr__( 'Semitransparent blocks background', 'churchwp' ),
                'default'  => array(
                    'color' => '#1a1b22',
                    'alpha' => '.95'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu',
                ),
                'mode'     => 'background'
            ),
            array(
                'id'   => 'mt_divider_text_selection',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Text Selection Color & Background</h3>' )
            ),
            array(
                'id'       => 'mt_text_selection_color',
                'type'     => 'color',
                'title'    => esc_attr__('Text selection color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #ffffff', 'churchwp'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_text_selection_background_color',
                'type'     => 'color',
                'title'    => esc_attr__('Text selection background color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'validate' => 'color',
            )
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Nav Menu', 'churchwp' ),
        'id'         => 'mt_styling_nav_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_nav_menu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Menus Styling</h3>' )
            ),
            array(
                'id'       => 'mt_nav_menu_color',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Menu Text Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #ffffff', 'churchwp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar .menu-item > a,
                                .navbar-nav .search_products a,
                                .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus,
                                .navbar-default .navbar-nav > li > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_color_hover',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Menu Text Color - Hover', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #ffffff', 'churchwp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar > .menu-item.current_page_ancestor > a, 
                                #navbar > .menu-item.current_page_item > a, 
                                #navbar .menu-item:hover > a'
                )
            ),
            array(
                'id'       => 'mt_nav_menu_item_bg',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Menu Items Background', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6F9A37', 'churchwp'),
                'default'  => '#6F9A37',
                'validate' => 'color',
                'output' => array(
                    'background' => '.navbar-nav .search_products a,
                                .navbar-default .navbar-nav > li > a',
                )
            ),
            array(
                'id'       => 'mt_nav_menu_item_bg_hover',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Menu Items Background - Hover', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #537429', 'churchwp'),
                'default'  => '#537429',
                'validate' => 'color',
                'output' => array(
                    'background' => '#navbar > .menu-item.current_page_ancestor > a, 
                                #navbar > .menu-item.current_page_item > a, 
                                #navbar .menu-item:hover > a',
                )
            ),


            array(
                'id'   => 'mt_divider_nav_submenu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Submenus Styling</h3>' )
            ),
            array(
                'id'       => 'mt_nav_submenu_background',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Submenu Holder Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #fff', 'churchwp'),
                'default'  => '#fff',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar .sub-menu, .navbar ul li ul.sub-menu',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_color',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Submenu Text Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #1A1B22', 'churchwp'),
                'default'  => '#1A1B22',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_background_color',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Submenu Hover Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #ffffff', 'churchwp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_text_color',
                'type'     => 'color',
                'title'    => esc_attr__('Nav Submenu Hover Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Typography', 'churchwp' ),
        'id'         => 'mt_styling_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_4',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Body Font family</h3>' )
            ),
            array(
                'id'          => 'mt_body_typography',
                'type'        => 'typography', 
                'title'       => esc_attr__('Body Font family', 'churchwp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'line-height'  => false,
                'font-weight'  => false,
                'font-size'   => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('body'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Roboto', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_5',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Headings</h3>' )
            ),
            array(
                'id'          => 'mt_heading_h1',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading H1 Font family', 'churchwp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h1', 'h1 span'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Alegreya', 
                    'font-size' => '36px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h2',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading H2 Font family', 'churchwp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h2'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Alegreya', 
                    'font-size' => '30px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h3',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading H3 Font family', 'churchwp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h3'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Alegreya', 
                    'font-size' => '24px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h4',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading H4 Font family', 'churchwp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h4'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Roboto Condensed', 
                    'font-size' => '18px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h5',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading H5 Font family', 'churchwp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h5'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Roboto Condensed', 
                    'font-size' => '14px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h6',
                'type'        => 'typography', 
                'title'       => esc_attr__('Heading H6 Font family', 'churchwp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h6'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Roboto Condensed', 
                    'font-size' => '12px', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_6',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Inputs & Textareas Font family</h3>' )
            ),
            array(
                'id'                => 'mt_inputs_typography',
                'type'              => 'typography', 
                'title'             => esc_attr__('Inputs Font family', 'churchwp'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array('input', 'textarea'),
                'units'             =>'px',
                'subtitle'          => esc_attr__('Font family for inputs and textareas', 'churchwp'),
                'default'           => array(
                    'font-family'       => 'Roboto', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_7',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Buttons Font family</h3>' )
            ),
            array(
                'id'                => 'mt_buttons_typography',
                'type'              => 'typography', 
                'title'             => esc_attr__('Buttons Font family', 'churchwp'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array(
                    'input[type="submit"]'
                ),
                'units'             =>'px',
                'subtitle'          => esc_attr__('Font family for buttons', 'churchwp'),
                'default'           => array(
                    'font-family'       => 'Roboto', 
                    'google'            => true
                ),
            ),

        ),
    ));


    /**
    ||-> SECTION: Header Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Header Settings', 'churchwp' ),
        'id'    => 'mt_header',
        'icon'  => 'el el-icon-arrow-up'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Header - General', 'churchwp' ),
        'id'         => 'mt_header_general',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_generalheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Global Header Options</h3>' )
            ),
            array(
                'id'       => 'mt_header_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_attr__( 'Select Header layout', 'churchwp' ),
                'options'  => array(
                    'header1' => array(
                        'alt' => esc_attr__('Header #1', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/header1.jpg'
                    ),
                    'header2' => array(
                        'alt' => esc_attr__('Header #2', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/header2.jpg'
                    ),
                    'header5' => array(
                        'alt' => esc_attr__('Header #5', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/header5.jpg'
                    )
                ),
                'default'  => 'header1'
            ),
            array(
                'id'       => 'mt_is_nav_sticky',
                'type'     => 'switch', 
                'title'    => esc_attr__('Sticky Navigation Menu?', 'churchwp'),
                'subtitle' => esc_attr__('Enable or disable "sticky positioned navigation menu".', 'churchwp'),
                'default'  => false,
                'on'       => esc_attr__( 'Enabled', 'churchwp' ),
                'off'      => esc_attr__( 'Disabled', 'churchwp' )
            ),
            array(
                'id'   => 'mt_divider_header_stat',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Search Icon Settings(from header)</h3>' )
            ),
            array(
                'id'       => 'mt_header_is_search',
                'type'     => 'switch', 
                'title'    => esc_attr__('Search Icon Status', 'churchwp'),
                'subtitle' => esc_attr__('Enable or Disable Search Icon".', 'churchwp'),
                'default'  => true,
                'on'       => esc_attr__( 'Enabled', 'churchwp' ),
                'off'      => esc_attr__( 'Disabled', 'churchwp' )
            ),
            array(
                'id'       => 'mt_header_is_search_mobile',
                'type'     => 'switch', 
                'title'    => esc_attr__('Search Icon Status - Mobile devices', 'churchwp'),
                'subtitle' => esc_attr__('Enable or Disable Search Icon for tablets and smartphones".', 'churchwp'),
                'default'  => false,
                'on'       => esc_attr__( 'Enabled', 'churchwp' ),
                'off'      => esc_attr__( 'Disabled', 'churchwp' )
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Logo &amp; Favicon', 'churchwp' ),
        'id'         => 'mt_header_logo',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_logo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Logo Settings</h3>' )
            ),
            array(
                'id' => 'mt_logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Logo image', 'churchwp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/theme_logo_dark.png'),
            ),
            array(
                'id'        => 'mt_logo_max_width',
                'type'      => 'slider',
                'title'     => esc_attr__('Logo Max Width', 'churchwp'),
                'subtitle'  => esc_attr__('Use the slider to increase/decrease max size of the logo.', 'churchwp'),
                'desc'      => esc_attr__('Min: 1px, max: 500px, step: 1px, default value: 200px', 'churchwp'),
                "default"   => 200,
                "min"       => 1,
                "step"      => 1,
                "max"       => 500,
                'display_value' => 'label'
            ),
            array(
                'id'   => 'mt_divider_favicon',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Favicon Settings</h3>' )
            ),
            array(
                'id' => 'mt_favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Favicon url', 'churchwp'),
                'compiler' => 'true',
                'subtitle' => esc_attr__('Use the upload button to import media.', 'churchwp'),
                'default' => array('url' => get_template_directory_uri().'/images/theme_favicon.png'),
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Header - Top Small Bar', 'churchwp' ),
        'id'         => 'mt_header_top_small',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_small_header',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Top Small Header Options</h3>' )
            ),
            array(
                'id'       => 'mt_header_top_status',
                'type'     => 'switch', 
                'title'    => esc_attr__('Header Top Small Bar Status', 'churchwp'),
                'subtitle' => esc_attr__('Enable or disable "Header Top Small Bar Status".', 'churchwp'),
                'default'  => true,
                'on'       => esc_attr__( 'Enabled', 'churchwp' ),
                'off'      => esc_attr__( 'Disabled', 'churchwp' )
            ),
            array(         
                'id'       => 'mt_header_top_small_background',
                'type'     => 'background',
                'title'    => esc_attr__('Header (top-header) - background', 'churchwp'),
                'subtitle' => esc_attr__('Default color: #656984', 'churchwp'),
                'output'      => array('header .top-header'),
                'default'  => array(
                    'background-color' => '#656984',
                )
            ),
            array(
                'id'       => 'mt_header_top_small_text_color',
                'type'     => 'color',
                'title'    => esc_attr__('Header (top-header) - texts color', 'churchwp'), 
                'subtitle' => esc_attr__('Default color: #fff', 'churchwp'),
                'default'  => '#fff',
                'validate' => 'color',
                'output'    => array(
                    'color' => 'header .top-header',
                ),
            ),
            array(
                'id'       => 'mt_header_top_small_text_color',
                'type'     => 'color',
                'title'    => esc_attr__('Header (top-header) - links color', 'churchwp'), 
                'subtitle' => esc_attr__('Default color: #fff', 'churchwp'),
                'default'  => '#fff',
                'validate' => 'color',
                'output'    => array(
                    'color' => 'header .top-header .left-side a',
                ),
            ),
            array(
                'id' => 'mt_header_top_small_left_1_text',
                'type' => 'text',
                'title' => esc_attr__('Business Phone Number', 'churchwp'),
                'default' => '+34-2345-3456'
            ),
            array(
                'id' => 'mt_header_top_small_left_1_url',
                'type' => 'text',
                'title' => esc_attr__('Business Phone Number Link Url', 'churchwp'),
                'default' => '#'
            ),
            array(
                'id' => 'mt_header_top_small_left_2_text',
                'type' => 'text',
                'title' => esc_attr__('Business Address', 'churchwp'),
                'default' => '93L, Str. J. Martin, Rome'
            ),
            array(
                'id' => 'mt_header_top_small_left_2_url',
                'type' => 'text',
                'title' => esc_attr__('Business Address Link Url', 'churchwp'),
                'default' => '#'
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Header - Main Big', 'churchwp' ),
        'id'         => 'mt_header_bottom_main',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_mainheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Main Header Options</h3>' )
            ),
            array(         
                'id'       => 'mt_header_main_background',
                'type'     => 'background',
                'title'    => esc_attr__('Header (main-header) - background', 'churchwp'),
                'subtitle' => esc_attr__('Default color: #6f9a37', 'churchwp'),
                'output'      => array('.navbar-default'),
                'default'  => array(
                    'background-color' => '#6f9a37',
                )
            ),
            array(
                'id'       => 'mt_header_main_text_color',
                'type'     => 'color',
                'title'    => esc_attr__('Main Header texts color', 'churchwp'), 
                'subtitle' => esc_attr__('Default color: #ffffff', 'churchwp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output'    => array(
                    'color' => 'header',
                ),
            )
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Fixed Sidebar Menu', 'churchwp' ),
        'id'         => 'mt_header_fixed_sidebar_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_fixed_headerstatus',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Status</h3>' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_status',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Burger Sidebar Menu Status', 'churchwp' ),
                'subtitle' => esc_attr__( 'Enable/Disable Burger Sidebar Menu Status', 'churchwp' ),
                'desc'     => esc_attr__( 'This Option Will Enable/Disable The Navigation Burger + Sidebar Menu triggered by the burger menu', 'churchwp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),

            array(
                'id'   => 'mt_divider_fixed_header',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Other Options</h3>' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_bgs',
                'type'     => 'color_rgba',
                'title'    => esc_attr__( 'Sidebar Menu Background', 'churchwp' ),
                'subtitle' => esc_attr__( 'Default: #ffffff - Opacity: 1', 'churchwp' ),
                'default'   => array(
                    'color'     => '#fff',
                    'alpha'     => '1'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu'
                ),
                // These options display a fully functional color palette.  Omit this argument
                // for the minimal color picker, and change as desired.
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_text_color',
                'type'     => 'color',
                'title'    => esc_attr__('Texts Color', 'churchwp'), 
                'default'  => '#000000',
                'validate' => 'color',
                'output'    => array(
                	'color' => '.fixed-sidebar-menu .logo, .fixed-sidebar-menu .widget-title, .fixed-sidebar-menu .widget-title'
                ),
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_site_title_status',
                'type'     => 'button_set',
                'title'    => esc_attr__( 'Show Title or Logo', 'churchwp' ),
                'subtitle' => esc_attr__( 'Choose what to show on fixed sidebar', 'churchwp' ),
                'desc'     => esc_attr__( 'Choose Between Site Title or Site Logo', 'churchwp' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'site_title' => 'Title',
                    'site_logo' => 'Logo',
                    'site_nothing' => 'Disable This Feature'
                ),
                'default'  => 'site_title'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_select_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_attr__( 'Select Sidebar', 'churchwp' ),
                'subtitle' => esc_attr__( 'Select Sidebar to be shown on Sidebar Navigation Menu.', 'churchwp' ),
                'default'   => 'burgersidebar',
            ),
        ),
    ) );

    /**

    ||-> SECTION: Footer Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Footer Settings', 'churchwp' ),
        'id'    => 'mt_footer',
        'icon'  => 'el el-icon-arrow-down'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Footer Top Rows', 'churchwp' ),
        'id'         => 'mt_footer_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_footer_top',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Top Rows</h3>' )
            ),
            array(         
                'id'       => 'mt_footer_top_background',
                'type'     => 'background',
                'title'    => esc_attr__('Footer (top) - background', 'churchwp'),
                'subtitle' => esc_attr__('Footer background with image or color.', 'churchwp'),
                'output'      => array('footer .footer-top'),
                'default'  => array(
                    'background-color' => '#021426',
                )
            ),
            array(
                'id'        => 'mt_footer_top_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_attr__( 'Footer Top Text Color', 'churchwp' ),
                'subtitle'  => esc_attr__( 'Set color and alpha channel', 'churchwp' ),
                'desc'      => esc_attr__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'churchwp' ),
                'output'    => array('color' => 'footer .footer-top h1.widget-title, footer .footer-top h3.widget-title, footer .footer-top .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'   => 'mt_divider_footer_row1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #1</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_1',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Footer Row #1 - Status', 'churchwp' ),
                'subtitle' => esc_attr__( 'Enable/Disable Footer ROW 1', 'churchwp' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_1_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_attr__( 'Footer Row #1 - Layout', 'churchwp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('Footer 1 Column', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_attr__('Footer 2 Columns', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_attr__('Footer 3 Columns', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_attr__('Footer 4 Columns', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_attr__('Footer 5 Columns', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_attr__('Footer 6 Columns', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_attr__('Footer 6 + 3 + 3', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_attr__('Footer 3 + 3 + 6', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_attr__('Footer 2 + 2 + 2 + 2 + 4', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_attr__('Footer 4 + 2 + 2 + 2 + 2', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_attr__('Footer 2 + 2 + 2 + 6', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_attr__('Footer 6 + 2 + 2 + 2', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                    'column_four_two_two_four' => array(
                        'alt' => esc_attr__('Footer 4 + 2 + 2 + 4', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4_2_2_4.png'
                    ),
                ),
                'default'  => '1',
                'required' => array( 'mt_footer_row_1', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_1_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_attr__('Footer Row #1 - Padding', 'churchwp'),
                'subtitle'       => esc_attr__('Choose the spacing for the first row from footer.', 'churchwp'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '60px', 
                    'padding-bottom'  => '60px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_1margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_attr__('Footer Row #1 - Margin', 'churchwp'),
                'subtitle'       => esc_attr__('Choose the margin for the first row from footer.', 'churchwp'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    'margin-bottom'  => '0px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_1border',
                'type'     => 'border',
                'title'    => esc_attr__('Footer Row #1 - Borders', 'churchwp'),
                'subtitle' => esc_attr__('Only color validation can be done on this field', 'churchwp'),
                'output'   => array('.footer-row-1'),
                'all'      => false,
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '0', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #2</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_2',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Footer Row #2 - Status', 'churchwp' ),
                'subtitle' => esc_attr__( 'Enable/Disable Footer ROW 2', 'churchwp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_2_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_attr__( 'Footer Row #1 - Layout', 'churchwp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('Footer 1 Column', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_attr__('Footer 2 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_attr__('Footer 3 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_attr__('Footer 4 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_attr__('Footer 5 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_attr__('Footer 6 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_attr__('Footer 6 + 3 + 3', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_attr__('Footer 3 + 3 + 6', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_attr__('Footer 2 + 2 + 2 + 2 + 4', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_attr__('Footer 4 + 2 + 2 + 2 + 2', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_attr__('Footer 2 + 2 + 2 + 6', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_attr__('Footer 6 + 2 + 2 + 2', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                    'column_four_two_two_four' => array(
                        'alt' => esc_attr__('Footer 4 + 2 + 2 + 4', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4_2_2_4.png'
                    ),
                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_2', '=', '1' ),
            ),
            array(
                'id'             => 'footer_row_2_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_attr__('Footer Row #2 - Padding', 'churchwp'),
                'subtitle'       => esc_attr__('Choose the spacing for the second row from footer.', 'churchwp'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    // 'padding-right'   => '0px', 
                    'padding-bottom'  => '40px', 
                    // 'padding-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_2margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_attr__('Footer Row #2 - Margin', 'churchwp'),
                'subtitle'       => esc_attr__('Choose the margin for the first row from footer.', 'churchwp'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    // 'margin-right'   => '0px', 
                    'margin-bottom'  => '40px', 
                    // 'margin-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_2border',
                'type'     => 'border',
                'title'    => esc_attr__('Footer Row #2 - Borders', 'churchwp'),
                'subtitle' => esc_attr__('Only color validation can be done on this field', 'churchwp'),
                'output'   => array('.footer-row-2'),
                'all'      => false,
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #3</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_3',
                'type'     => 'switch',
                'title'    => esc_attr__( 'Footer Row #3 - Status', 'churchwp' ),
                'subtitle' => esc_attr__( 'Enable/Disable Footer ROW 3', 'churchwp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_3_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_attr__( 'Footer Row #3 - Layout', 'churchwp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_attr__('Footer 1 Column', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_attr__('Footer 2 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_attr__('Footer 3 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_attr__('Footer 4 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_attr__('Footer 5 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_attr__('Footer 6 Columns', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_attr__('Footer 6 + 3 + 3', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_attr__('Footer 3 + 3 + 6', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_attr__('Footer 2 + 2 + 2 + 2 + 4', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_attr__('Footer 4 + 2 + 2 + 2 + 2', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_attr__('Footer 2 + 2 + 2 + 6', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_attr__('Footer 6 + 2 + 2 + 2', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                    'column_four_two_two_four' => array(
                        'alt' => esc_attr__('Footer 4 + 2 + 2 + 4', 'churchwp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4_2_2_4.png'
                    ),
                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_3', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_3_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_attr__('Footer Row #3 - Padding', 'churchwp'),
                'subtitle'       => esc_attr__('Choose the spacing for the third row from footer.', 'churchwp'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    // 'padding-right'   => '0px', 
                    'padding-bottom'  => '40px', 
                    // 'padding-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_3margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_attr__('Footer Row #3 - Margin', 'churchwp'),
                'subtitle'       => esc_attr__('Choose the margin for the first row from footer.', 'churchwp'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    // 'margin-right'   => '0px', 
                    'margin-bottom'  => '20px', 
                    // 'margin-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_3border',
                'type'     => 'border',
                'title'    => esc_attr__('Footer Row #3 - Borders', 'churchwp'),
                'subtitle' => esc_attr__('Only color validation can be done on this field', 'churchwp'),
                'output'   => array('.footer-row-3'),
                'all'      => false,
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            )
        ),
    ));



    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Footer Bottom Bar', 'churchwp' ),
        'id'         => 'mt_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_footer_text',
                'type' => 'editor',
                'title' => esc_attr__('Footer Text', 'churchwp'),
                'default' => 'Handcrafted with Love by ThemeSLR. All Rights Reserved.',
            ),
            array(         
                'id'       => 'mt_footer_bottom_background',
                'type'     => 'background',
                'title'    => esc_attr__('Footer (bottom) - background', 'churchwp'),
                'subtitle' => esc_attr__('Footer background with image or color.', 'churchwp'),
                'output'      => array('footer .footer'),
                'default'  => array(
                    'background-color' => '#1a1b22',
                )
            ),
            array(
                'id'        => 'mt_footer_bottom_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_attr__( 'Footer Bottom Text Color', 'churchwp' ),
                'subtitle'  => esc_attr__( 'Set color and alpha channel', 'churchwp' ),
                'desc'      => esc_attr__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'churchwp' ),
                'output'    => array('color' => 'footer .footer h1.widget-title, footer .footer h3.widget-title, footer .footer .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
        ),
    ));



    /**

    ||-> SECTION: Contact Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Contact Settings', 'churchwp' ),
        'id'    => 'mt_contact',
        'icon'  => 'el el-icon-map-marker-alt'
    ));
    // GENERAL
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Contact', 'churchwp' ),
        'id'         => 'mt_contact_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_contact_phone',
                'type' => 'text',
                'title' => esc_attr__('Phone Number', 'churchwp'),
                'subtitle' => esc_attr__('Contact phone number displayed on the contact us page.', 'churchwp'),
                'default' => ' +1 777 3321 2312'
            ),
            array(
                'id' => 'mt_contact_email',
                'type' => 'text',
                'title' => esc_attr__('Email', 'churchwp'),
                'subtitle' => esc_attr__('Contact email displayed on the contact us page., additional info is good in here.', 'churchwp'),
                'validate' => 'email',
                'msg' => 'custom error message',
                'default' => 'hello@churchwp.tld'
            ),
            array(
                'id' => 'mt_contact_address',
                'type' => 'text',
                'title' => esc_attr__('Address', 'churchwp'),
                'subtitle' => esc_attr__('Enter your contact address', 'churchwp'),
                'default' => '321 Education Street, New York, NY, USA'
            )
        ),
    ));
 



    /**

    ||-> SECTION: Donations Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Donations Settings', 'churchwp' ),
        'id'    => 'mt_donation',
        'icon'  => 'el el-icon-comment'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Donations Settings', 'churchwp' ),
        'id'         => 'mt_donation_page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_donations_header_settings',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Donate Button Settings(From Header)</h3>' )
            ),
            array(
                'id'       => 'mt_header_is_donate_active',
                'type'     => 'switch', 
                'title'    => esc_attr__('Donate Button Status', 'churchwp'),
                'subtitle' => esc_attr__('Enable or Disable Donate Button".', 'churchwp'),
                'default'  => true,
                'on'       => esc_attr__( 'Enabled', 'churchwp' ),
                'off'      => esc_attr__( 'Disabled', 'churchwp' )
            ),
            array(
                'id'       => 'mt_header_is_donate_text_normal',
                'type'     => 'color',
                'title'    => esc_attr__('Donate Button - Text Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'validate' => 'color',
                'output' => array(
                    'color' => '.header-nav-actions .donate-now',
                )
            ),
            array(
                'id'       => 'mt_header_is_donate_text_hover',
                'type'     => 'color',
                'title'    => esc_attr__('Donate Button - Text Color Hover', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #ffffff', 'churchwp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '.header-nav-actions .donate-now:hover',
                )
            ),
            array(
                'id'       => 'mt_header_is_donate_bg_normal',
                'type'     => 'color',
                'title'    => esc_attr__('Donate Button - Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: transparent', 'churchwp'),
                'default'  => 'transparent',
                'validate' => 'color',
                'output' => array(
                    'background' => '.header-nav-actions .donate-now',
                )
            ),
            array(
                'id'       => 'mt_header_is_donate_bg_hover',
                'type'     => 'color',
                'title'    => esc_attr__('Donate Button - Background Color Hover', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'validate' => 'color',
                'output' => array(
                    'background' => '.header-nav-actions .donate-now:hover',
                )
            ),
            array(
                'id'       => 'mt_header_is_donate_border_color',
                'type'     => 'color',
                'title'    => esc_attr__('Donate Button - Border Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'validate' => 'color',
                'output' => array(
                    'border-color' => '.header-nav-actions .donate-now',
                )
            ),
            array(
                'id'       => 'mt_header_is_donate_border_color_hover',
                'type'     => 'color',
                'title'    => esc_attr__('Donate Button - Border Color Hover', 'churchwp'), 
                'subtitle' => esc_attr__('Default: transparent', 'churchwp'),
                'default'  => 'transparent',
                'validate' => 'color',
                'output' => array(
                    'border-color' => '.header-nav-actions .donate-now:hover',
                )
            ),
            array(
                'id'   => 'mt_donations_page_title',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Select Donations Page</h3>' )
            ),
            array(
                'id'       => 'mt_donations_page',
                'type'     => 'select',
                'title'    => esc_attr__('Select Donations Page', 'churchwp'), 
                'data'     => 'posts',
                'args' => array('post_type' => 'give_forms')
            ),

        )
    ));




    /**

    ||-> SECTION: Blog Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Blog Settings', 'churchwp' ),
        'id'    => 'mt_blog',
        'icon'  => 'el el-icon-comment'
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Blog Archive', 'churchwp' ),
        'id'         => 'mt_blog_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog List Layout</h3>' )
            ),
            array(
                'id'       => 'mt_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_attr__( 'Blog List Layout', 'churchwp' ),
                'subtitle' => esc_attr__( 'Select Blog List layout.', 'churchwp' ),
                'options'  => array(
                    'mt_blog_left_sidebar' => array(
                        'alt' => esc_attr__('2 Columns - Left sidebar', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_blog_fullwidth' => array(
                        'alt' => esc_attr__('1 Column - Full width', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_blog_right_sidebar' => array(
                        'alt' => esc_attr__('2 Columns - Right sidebar', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_blog_right_sidebar'
            ),
            array(
                'id'       => 'mt_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_attr__( 'Blog List Sidebar', 'churchwp' ),
                'subtitle' => esc_attr__( 'Select Blog List Sidebar.', 'churchwp' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_blog_layout', '!=', 'mt_blog_fullwidth'),
            ),
            array(
                'id'        => 'mt_blog_display_type',
                'type'      => 'select',
                'title'     => esc_attr__('How to display posts', 'churchwp'),
                'subtitle'  => esc_attr__('Select how you want to display post on blog list.', 'churchwp'),
                'options'   => array(
                        'list'   => 'List',
                        'grid'   => 'Grid'
                    ),
                'default'   => 'list',
            ),

            array(
                'id'        => 'mt_blog_grid_columns',
                'type'      => 'select',
                'title'     => esc_attr__('Grid columns', 'churchwp'),
                'subtitle'  => esc_attr__('Select how many columns you want.', 'churchwp'),
                'options'   => array(
                        '1'   => '1',
                        '2'   => '2',
                        '3'   => '3',
                        '4'   => '4'
                    ),
                'default'   => '1',
                'required' => array('mt_blog_display_type', 'equals', 'grid'),
            ),
            array(
                'id'   => 'mt_divider_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog List Elements</h3>' )
            ),
            array(
                'id' => 'mt_blog_post_title',
                'type' => 'text',
                'title' => esc_attr__('Blog Post Title', 'churchwp'),
                'subtitle' => esc_attr__('Enter the text you want to display as blog post title.', 'churchwp'),
                'default' => 'All Blog Posts'
            )
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Author Archive', 'churchwp' ),
        'id'         => 'mt_blog_author_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_author_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Author Posts Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_author_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Author Posts Archive Header Image', 'churchwp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/placeholder_archive.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Categories Archive', 'churchwp' ),
        'id'         => 'mt_blog_categories_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_categories_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog Categories Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_categories_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Blog Categories Archive Header Image', 'churchwp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/placeholder_archive.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Tags Archive', 'churchwp' ),
        'id'         => 'mt_blog_tags_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_tags_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog Tags Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_tags_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Blog Tags Archive Header Image', 'churchwp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/placeholder_archive.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Search Archive', 'churchwp' ),
        'id'         => 'mt_blog_search_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_search_posts_header_img',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Search Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_search_posts_header_img',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Search Archive Header Image', 'churchwp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/placeholder_archive.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Single Post', 'churchwp' ),
        'id'         => 'mt_blog_single_pos',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_single_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Single Blog List Layout</h3>' )
            ),
            array(
                'id'       => 'mt_single_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_attr__( 'Single Blog List Layout', 'churchwp' ),
                'subtitle' => esc_attr__( 'Select Blog List layout.', 'churchwp' ),
                'options'  => array(
                    'mt_single_blog_left_sidebar' => array(
                        'alt' => esc_attr__('2 Columns - Left sidebar', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_single_blog_fullwidth' => array(
                        'alt' => esc_attr__('1 Column - Full width', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_single_blog_right_sidebar' => array(
                        'alt' => esc_attr__('2 Columns - Right sidebar', 'churchwp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_single_blog_left_sidebar'
            ),
            array(
                'id'       => 'mt_single_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_attr__( 'Single Blog List Sidebar', 'churchwp' ),
                'subtitle' => esc_attr__( 'Select Blog List Sidebar.', 'churchwp' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_single_blog_layout', '!=', 'mt_single_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_single_blog_typo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Single Blog Post Font family</h3>' )
            ),
            array(
                'id'          => 'mt_single_post_typography',
                'type'        => 'typography', 
                'title'       => esc_attr__('Blog Post Font family', 'churchwp'),
                'subtitle'    => esc_attr__( 'Default color: #454646; Font-size: 18px; Line-height: 29px;', 'churchwp' ),
                'google'      => true, 
                'font-size'   => true,
                'line-height' => true,
                'color'       => true,
                'font-backup' => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'font-weight'  => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('.single article .article-content p'),
                'units'       =>'px',
                'default'     => array(
                    'color' => '#454646', 
                    'font-size' => '16px', 
                    'line-height' => '26px', 
                    'font-family' => 'Roboto', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_single_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Other Single Post Elements</h3>' )
            ),
            array(
                'id'       => 'mt_post_featured_image',
                'type'     => 'switch', 
                'title'    => esc_attr__('Single post featured image.', 'churchwp'),
                'subtitle' => esc_attr__('Show or Hide the featured image from blog post page.".', 'churchwp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_related_posts',
                'type'     => 'switch', 
                'title'    => esc_attr__('Related Posts', 'churchwp'),
                'subtitle' => esc_attr__('Enable or disable related posts', 'churchwp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_authorbio',
                'type'     => 'switch', 
                'title'    => esc_attr__('About Author', 'churchwp'),
                'subtitle' => esc_attr__('Enable or disable "About author" section on single post', 'churchwp'),
                'default'  => true,
            ),
            // Author Bio Default Placeholder
            array(
                'id' => 'mt_author_default_placeholder',
                'type' => 'media',
                'url' => true,
                'title' => esc_attr__('Author Default Placeholder Thumbnail', 'churchwp'),
                'compiler' => 'true',
                'subtitle' => esc_attr__('Use the upload button to import media.', 'churchwp'),
                'default' => array('url' => 'http://placehold.it/128x128'),
            ),
            array( 
                'id'       => 'mt_opt_raw',
                'type'     => 'raw',
                'title'    => esc_attr__('Post Formats Icons', 'churchwp'),
            ),
        ),
    ));


    /**
    ||-> SECTION: Error 404 Page Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( '404 Page Settings', 'churchwp' ),
        'id'    => 'mt_error404',
        'icon'  => 'el el-icon-error'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( '404 Page', 'churchwp' ),
        'id'         => 'error404-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_404_page',
                'type'     => 'select',
                'title'    => esc_attr__('Select page', 'churchwp'), 
                'data'     => 'page'
            )
        ),
    ));


    /**
    ||-> SECTION: Elements
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Elements', 'churchwp' ),
        'id'    => 'mt_elements',
        'icon'  => 'el el-puzzle'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Tabs', 'churchwp' ),
        'id'         => 'mt_elements_tabs',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_tabs_normal',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Tabs - Normal State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_tabs_normal_color',
                'type'     => 'color',
                'title'    => esc_attr__('Tabs Text Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #666666', 'churchwp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_tabs_background',
                'type'     => 'color',
                'title'    => esc_attr__('Tabs Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #f8f8f8', 'churchwp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_tabs_border',
                'type'     => 'color',
                'title'    => esc_attr__('Tabs Border Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #f0f0f0', 'churchwp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels, 
                                        .vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels::after, 
                                        .vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels::before,
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a'
                ),
                'default'  => '#f0f0f0',
            ),
            array(
                'id'   => 'mt_divider_elements_tabs_hover',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Tabs - Hover State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_hover_tabs_normal_color',
                'type'     => 'color',
                'title'    => esc_attr__('Active and Hover Tabs Text Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #666666', 'churchwp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a' ),
                'default'  => '#666666',
            ),
            array(         
                'id'       => 'mt_elements_hover_tabs_background',
                'type'     => 'color',
                'title'    => esc_attr__('Active and Hover Tabs Background', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #ebebeb', 'churchwp'),
                'default'  => '#ebebeb',
                'output' => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a'
                )
            ),
            array(         
                'id'       => 'mt_elements_hover_tabs_border',
                'type'     => 'color',
                'title'    => esc_attr__('Active and Hover Tabs Border Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #e3e3e3', 'churchwp'),
                'default'  => '#e3e3e3',
                'output' => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a'
                )
            )
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Blockquotes', 'churchwp' ),
        'id'         => 'mt_elements_blockquotes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_blockquotes',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blockquotes Styling</h3>' )
            ),
            array(
                'id'       => 'mt_elements_blockquotes_background',
                'type'     => 'color',
                'title'    => esc_attr__('Blockquotes Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #F9F9F9', 'churchwp'),
                'output'    => array(
                    'background-color' => 'blockquote',
                ),
                'default'  => '#F9F9F9',
            ),
            array(         
                'id'       => 'mt_elements_blockquotes_border',
                'type'     => 'color',
                'title'    => esc_attr__('Blockquotes Border Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #6f9a37', 'churchwp'),
                'default'  => '#6f9a37',
                'output' => array(
                    'border-color' => 'blockquote'
                )
            )
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Accordions', 'churchwp' ),
        'id'         => 'mt_elements_accordions',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_accordions_normal',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Accordions - Normal State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_accordions_normal_color',
                'type'     => 'color',
                'title'    => esc_attr__('Accordions Text Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #666666', 'churchwp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_accordions_background',
                'type'     => 'color',
                'title'    => esc_attr__('Accordions Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #f8f8f8', 'churchwp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_accordions_border',
                'type'     => 'color',
                'title'    => esc_attr__('Accordions Border Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #f0f0f0', 'churchwp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading'
                ),
                'default'  => '#f0f0f0',
            ),
            array(
                'id'   => 'mt_divider_elements_accordions_hover',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Accordions - Active&Hover State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_color',
                'type'     => 'color',
                'title'    => esc_attr__('Active and Hover Tabs Text Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #666666', 'churchwp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_background',
                'type'     => 'color',
                'title'    => esc_attr__('Active and Hover Tabs Background Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #f8f8f8', 'churchwp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus, 
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_border',
                'type'     => 'color',
                'title'    => esc_attr__('Active and Hover Tabs Border Color', 'churchwp'), 
                'subtitle' => esc_attr__('Default: #f0f0f0', 'churchwp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body, 
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body::after, 
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body::before'
                ),
                'default'  => '#f0f0f0',
            ),
        ),
    ));


    /**
    ||-> SECTION: Social Media Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_attr__( 'Social Media Settings', 'churchwp' ),
        'id'    => 'mt_social_media',
        'icon'  => 'el el-icon-myspace'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_attr__( 'Social Media', 'churchwp' ),
        'id'         => 'mt_social_media_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Global Social Links</h3>' )
            ),
            array(
                'id' => 'mt_social_fb',
                'type' => 'text',
                'title' => esc_attr__('Facebook URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Facebook url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://facebook.com'
            ),
            array(
                'id' => 'mt_social_tw',
                'type' => 'text',
                'title' => esc_attr__('Twitter username', 'churchwp'),
                'subtitle' => esc_attr__('Type your Twitter username.', 'churchwp'),
                'default' => 'envato'
            ),
            array(
                'id' => 'mt_social_pinterest',
                'type' => 'text',
                'title' => esc_attr__('Pinterest URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Pinterest url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://pinterest.com'
            ),
            array(
                'id' => 'mt_social_skype',
                'type' => 'text',
                'title' => esc_attr__('Skype Name', 'churchwp'),
                'subtitle' => esc_attr__('Type your Skype username.', 'churchwp'),
                'default' => 'churchwp'
            ),
            array(
                'id' => 'mt_social_instagram',
                'type' => 'text',
                'title' => esc_attr__('Instagram URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Instagram url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://instagram.com'
            ),
            array(
                'id' => 'mt_social_youtube',
                'type' => 'text',
                'title' => esc_attr__('YouTube URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your YouTube url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://youtube.com'
            ),
            array(
                'id' => 'mt_social_dribbble',
                'type' => 'text',
                'title' => esc_attr__('Dribbble URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Dribbble url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://dribbble.com'
            ),
            array(
                'id' => 'mt_social_gplus',
                'type' => 'text',
                'title' => esc_attr__('Google+ URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Google+ url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://plus.google.com'
            ),
            array(
                'id' => 'mt_social_linkedin',
                'type' => 'text',
                'title' => esc_attr__('LinkedIn URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your LinkedIn url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://linkedin.com'
            ),
            array(
                'id' => 'mt_social_deviantart',
                'type' => 'text',
                'title' => esc_attr__('Deviant Art URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Deviant Art url.', 'churchwp'),
                'validate' => 'url',
                'default' => 'http://deviantart.com'
            ),
            array(
                'id' => 'mt_social_digg',
                'type' => 'text',
                'title' => esc_attr__('Digg URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Digg url.', 'churchwp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_flickr',
                'type' => 'text',
                'title' => esc_attr__('Flickr URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Flickr url.', 'churchwp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_stumbleupon',
                'type' => 'text',
                'title' => esc_attr__('Stumbleupon URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Stumbleupon url.', 'churchwp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_tumblr',
                'type' => 'text',
                'title' => esc_attr__('Tumblr URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Tumblr url.', 'churchwp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_vimeo',
                'type' => 'text',
                'title' => esc_attr__('Vimeo URL', 'churchwp'),
                'subtitle' => esc_attr__('Type your Vimeo url.', 'churchwp'),
                'validate' => 'url',
                'default' => ''
            )
            
        ),
    ));
    /*
     * <--- END SECTIONS
     */

