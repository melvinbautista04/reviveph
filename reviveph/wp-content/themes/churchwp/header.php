<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php esc_html(bloginfo( 'charset' )); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="shortcut icon" href="<?php echo esc_attr(churchwp_redux('mt_favicon', 'url')); ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


    <?php
    // PAGE PRELOADER
    if(is_single() || is_page()){
        $mt_page_preloader = get_post_meta( get_the_ID(), 'mt_page_preloader', true );
        $mt_page_preloader_bg_color = get_post_meta( get_the_ID(), 'mt_page_preloader_bg_color', true );
        if (isset($mt_page_preloader) && $mt_page_preloader == 'enabled' && isset($mt_page_preloader_bg_color)) {
            echo wp_kses_post('<div class="churchwp_preloader_holder '.churchwp_redux('mt_preloader_animation').'">'.churchwp_loader_animation().'</div>');
        }
    }else{
        if (churchwp_redux('mt_preloader_status')) {
            echo wp_kses_post('<div class="churchwp_preloader_holder '.churchwp_redux('mt_preloader_animation').'">'.churchwp_loader_animation().'</div>');
        } 
    }
    ?>

    <?php 
    $normal_headers = array('header1', 'header2', 'header5');
    $custom_header_options_status = get_post_meta( get_the_ID(), 'tslr_custom_header_options_status', true );
    $header_custom_variant = get_post_meta( get_the_ID(), 'tslr_header_custom_variant', true );
    $header_layout = churchwp_redux('mt_header_layout');
    if (isset($custom_header_options_status) && $custom_header_options_status == 'yes') {
        $header_layout = $header_custom_variant;
    }
    ?>


    <?php if(churchwp_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
        <!-- Fixed Sidebar Overlay -->
        <div class="fixed-sidebar-menu-overlay"></div>
        <!-- Fixed Sidebar Menu -->
        <div class="relative fixed-sidebar-menu-holder header7">
            <div class="fixed-sidebar-menu">
                <!-- Close Sidebar Menu + Close Overlay -->
                <img class="icon-close" src="<?php echo get_template_directory_uri();?>/images/svg/burger-x-close-dark.svg" alt="" />
                <!-- Sidebar Menu Holder -->
                <div class="header7">
                    <!-- RIGHT SIDE -->
                    <div class="left-side">
                        <h1 class="logo"><?php echo esc_attr(get_bloginfo()); ?></h1>
                        <?php dynamic_sidebar( churchwp_redux('mt_header_fixed_sidebar_menu_select_sidebar') ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- PAGE #page -->
    <div id="page" class="hfeed site">
        <?php
            $page_slider = get_post_meta( get_the_ID(), 'select_revslider_shortcode', true );
            if (in_array($header_layout, $normal_headers)){
                // Header template variant
                echo churchwp_current_header_template();
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.$page_slider.']');
                    echo '</div>';
                }
            }else{
                echo churchwp_current_header_template();
            }
        ?>