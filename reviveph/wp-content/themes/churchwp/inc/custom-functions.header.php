<?php
/**
CUSTOM HEADER FUNCTIONS
*/



/**
||-> FUNCTION: GET HEADER-MIDDLE CONTACT DETAILS
*/
function churchwp_get_contact_details(){


    $html = '';
    $html .= '<a href="'.churchwp_redux('mt_header_top_small_left_1_url').'">
    			 '.esc_attr__('', 'churchwp').'<label>'.churchwp_redux('mt_header_top_small_left_1_text').'</label>
    		  </a>';

    $html .= '<a href="'.churchwp_redux('mt_header_top_small_left_2_url').'">
    			 '.esc_attr__(' ', 'churchwp').'<label>'.churchwp_redux('mt_header_top_small_left_2_text').'</label>
    		  </a>';

    return $html;
}


/**
||-> FUNCTION: GET HEADER-TOP LEFT PART
*/
function churchwp_get_top_left(){


    $html = '';
    $html .= '<a href="'.churchwp_redux('mt_header_top_small_left_1_url').'">
    			 '.esc_attr__('', 'churchwp').'<label>'.churchwp_redux('mt_header_top_small_left_1_text').'</label>
    		  </a>';

    $html .= '<a href="'.churchwp_redux('mt_header_top_small_left_2_url').'">
    			 '.esc_attr__('' , 'churchwp').'<label>'.churchwp_redux('mt_header_top_small_left_2_text').'</label>
    		  </a>';

    return $html;
}



/**
||-> FUNCTION: GET HEADER-TOP RIGHT PART
*/
function churchwp_get_top_right(){

    // CONTENT
    $html = '';
    $html .= '<ul class="social-links">';
                if ( churchwp_redux('mt_social_fb') && churchwp_redux('mt_social_fb') != '' ) {
                    $html .= '<li class="facebook"><a href="'.esc_attr( churchwp_redux('mt_social_fb') ).'"><i class="fa fa-facebook"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_tw') && churchwp_redux('mt_social_tw') != '' ) {
                    $html .= '<li class="twitter"><a href="https://twitter.com/'.esc_attr( churchwp_redux('mt_social_tw') ).'"><i class="fa fa-twitter"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_gplus') && churchwp_redux('mt_social_gplus') != '' ) {
                    $html .= '<li class="googleplus"><a href="'.esc_attr( churchwp_redux('mt_social_gplus') ).'"><i class="fa fa-google-plus"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_youtube') && churchwp_redux('mt_social_youtube') != '' ) {
                    $html .= '<li class="youtube"><a href="'.esc_attr( churchwp_redux('mt_social_youtube') ).'"><i class="fa fa-youtube"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_pinterest') && churchwp_redux('mt_social_pinterest') != '' ) {
                    $html .= '<li class="pinterest"><a href="'.esc_attr( churchwp_redux('mt_social_pinterest') ).'"><i class="fa fa-pinterest"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_linkedin') && churchwp_redux('mt_social_linkedin') != '' ) {
                    $html .= '<li class="linkedin"><a href="'.esc_attr( churchwp_redux('mt_social_linkedin') ).'"><i class="fa fa-linkedin"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_skype') && churchwp_redux('mt_social_skype') != '' ) {
                    $html .= '<li class="skype"><a href="'.esc_attr( churchwp_redux('mt_social_skype') ).'"><i class="fa fa-skype"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_instagram') && churchwp_redux('mt_social_instagram') != '' ) {
                    $html .= '<li class="instagram"><a href="'.esc_attr( churchwp_redux('mt_social_instagram') ).'"><i class="fa fa-instagram"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_dribbble') && churchwp_redux('mt_social_dribbble') != '' ) {
                    $html .= '<li class="dribbble"><a href="'.esc_attr( churchwp_redux('mt_social_dribbble') ).'"><i class="fa fa-dribbble"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_deviantart') && churchwp_redux('mt_social_deviantart') != '' ) {
                    $html .= '<li class="deviantart"><a href="'.esc_attr( churchwp_redux('mt_social_deviantart') ).'"><i class="fa fa-deviantart"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_digg') && churchwp_redux('mt_social_digg') != '' ) {
                    $html .= '<li class="digg"><a href="'.esc_attr( churchwp_redux('mt_social_digg') ).'"><i class="fa fa-digg"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_flickr') && churchwp_redux('mt_social_flickr') != '' ) {
                    $html .= '<li class="flickr"><a href="'.esc_attr( churchwp_redux('mt_social_flickr') ).'"><i class="fa fa-flickr"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_stumbleupon') && churchwp_redux('mt_social_stumbleupon') != '' ) {
                    $html .= '<li class="stumbleupon"><a href="'.esc_attr( churchwp_redux('mt_social_stumbleupon') ).'"><i class="fa fa-stumbleupon"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_tumblr') && churchwp_redux('mt_social_tumblr') != '' ) {
                    $html .= '<li class="tumblr"><a href="'.esc_attr( churchwp_redux('mt_social_tumblr') ).'"><i class="fa fa-tumblr"></i></a></li>';
                }
                if ( churchwp_redux('mt_social_vimeo') && churchwp_redux('mt_social_vimeo') != '' ) {
                    $html .= '<li class="vimeo"><a href="'.esc_attr( churchwp_redux('mt_social_vimeo') ).'"><i class="fa fa-vimeo-square"></i></a></li>';
                }
    $html .= '</ul>';

    return $html;
}



/**
Function name: 				churchwp_get_nav_menu()			
Function description:		Get page NAV MENU
*/
function churchwp_get_nav_menu(){

    // PAGE METAS
	$page_custom_menu = get_post_meta( get_the_ID(), 'tslr_page_custom_menu', true );

	$html = '';
    if ( has_nav_menu( 'primary' ) ) {
		$defaults = array(
			'menu'            => '',
			'container'       => false,
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => false,
			'before'          => '<ul class="menu nav navbar-nav nav-effect nav-menu pull-right">',
			'after'           => '</ul>',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'          => ''
		);

		$defaults['theme_location'] = 'primary';
		if (isset($page_custom_menu)) {
			$html .= wp_nav_menu( array('menu' => $page_custom_menu ));
		}else{
			$html .= wp_nav_menu( $defaults );
		}
	}else{
		$html .= '<p class="no-menu text-right">'.esc_attr__('Primary navigation menu is missing. Add one from "Appearance" -> "Menus"','churchwp').'<p>';
	}

    return $html;
}



/**
Function name: 				churchwp_current_header_template()			
Function description:		Gets the current header variant from theme options. If page has custom options, theme options will be overwritten.
*/
function churchwp_current_header_template(){

	global  $churchwp_redux;

	// the_post_thumbnail( $size, $attr );

    // PAGE METAS
    $custom_header_activated = get_post_meta( get_the_ID(), 'tslr_custom_header_options_status', true );
    $header_v = get_post_meta( get_the_ID(), 'tslr_header_custom_variant', true );
	$sidebar_headers = array('header6', 'header7', 'header14', 'header15');


	$html = '';

    if (is_page() && $header_v) {
        if ($custom_header_activated && $custom_header_activated == 'yes') {
			if (!in_array($header_v, $sidebar_headers)){
            	$html .= get_template_part( 'templates/template-'.$header_v ); ?>

        	<?php }else{ ?>

        	<?php }
        }?>
    <?php }else{
    	if (isset($churchwp_redux['mt_header_layout'])) {
			if (!in_array($header_v, $sidebar_headers)){
            	// $html .= get_template_part( 'templates/template-'.$header_v );
    			$html .= get_template_part( 'templates/template-'.$churchwp_redux['mt_header_layout'] );
        	}
    	}else{
    		$html .= get_template_part( 'templates/template-header1' );
    	}
    }
    return $html;
}


/**
||-> FUNCTION: GET GOOGLE FONTS FROM THEME OPTIONS PANEL
*/
function churchwp_get_site_fonts() {
    global  $churchwp_redux;

    if (isset($churchwp_redux['mt_google_fonts_select'])) {
        foreach(array_keys($churchwp_redux['mt_google_fonts_select']) as $key){
            $font_url = str_replace(' ', '+', $churchwp_redux['mt_google_fonts_select'][$key]);
			wp_enqueue_style( 'churchwp-google-font-'.esc_attr($key), "http://fonts.googleapis.com/css?family=".esc_attr($font_url), false ); 
        }
    }
}
add_action( 'wp_enqueue_scripts', 'churchwp_get_site_fonts' );






// Add specific CSS class by filter
add_filter( 'body_class', 'churchwp_body_classes' );
function churchwp_body_classes( $classes ) {

	global  $churchwp_redux;

    // CHECK IF FEATURED IMAGE IS FALSE(Disabled)
    $post_featured_image = '';
    if (is_singular('post')) {
        if ($churchwp_redux['mt_post_featured_image'] == false) {
            $post_featured_image = 'hide_post_featured_image';
        }else{
            $post_featured_image = '';
        }
    }

    // CHECK IF THE NAV IS STICKY
    $is_nav_sticky = '';
    if ($churchwp_redux['mt_is_nav_sticky'] == true) {
        // If is sticky
        $is_nav_sticky = 'is_nav_sticky';
    }else{
        // If is not sticky
        $is_nav_sticky = '';
    }


    // SITE LAYOUT - THEME OPTION
    $tslr_site_layout = '';
    if (churchwp_redux('tslr_site_layout') == true && churchwp_redux('tslr_site_layout') == 'layout_boxed') {
        $tslr_site_layout = 'layout_boxed';
    }
    // SITE LAYOUT - METABOX
    $tslr_site_layout_meta = '';
    $tslr_site_layout_meta = get_post_meta( get_the_ID(), 'tslr_site_layout_meta', true );
    if ($tslr_site_layout_meta == true) {
        $tslr_site_layout_meta = 'layout_boxed';
    }


    // CHECK IF HEADER IS SEMITRANSPARENT
    $semitransparent_header_meta = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
    $semitransparent_header = '';
    if ($semitransparent_header_meta == 'enabled') {
        // If is semitransparent
        $semitransparent_header = 'is_header_semitransparent';
    }

    // DIFFERENT HEADER LAYOUT TEMPLATES
    $header_status = get_post_meta( get_the_ID(), 'tslr_custom_header_options_status', true );
    $header_v = get_post_meta( get_the_ID(), 'tslr_header_custom_variant', true );

    $header_version = 'header1';
    if ($header_status && $header_status == 'no') {
	    $header_version = 'header1';
	    if ($churchwp_redux['mt_header_layout']) {
	        // Header Layout #1
	        $header_version = $churchwp_redux['mt_header_layout'];
	    }
    }else{
    	$header_version = $header_v;
    }

    // add 'class-name' to the $classes array
    $classes[] = $tslr_site_layout_meta . ' ' . $tslr_site_layout . ' ' . $post_featured_image . ' ' . $is_nav_sticky . ' ' . $header_version . ' ' . $semitransparent_header . ' ';
    // return the $classes array
    return $classes;

}

/**
||-> FUNCTION: GET DYNAMIC CSS
*/
add_action('wp_enqueue_scripts', 'churchwp_dynamic_css' );
function churchwp_dynamic_css(){

    $html = '';
    $html .= churchwp_redux('mt_custom_css');

	wp_enqueue_style(
	   'churchwp-custom-style',
	    get_template_directory_uri() . '/css/custom-editor-style.css'
	);

    //PAGE PRELOADER BACKGROUND COLOR
    $mt_page_preloader = get_post_meta( get_the_ID(), 'mt_page_preloader', true );
    $mt_page_preloader_bg_color = get_post_meta( get_the_ID(), 'mt_page_preloader_bg_color', true );
    if (isset($mt_page_preloader) && $mt_page_preloader == 'enabled' && isset($mt_page_preloader_bg_color)) {
        $html .= 'body .churchwp_preloader_holder{
					background-color: '.$mt_page_preloader_bg_color.';
        		}';
    }elseif (churchwp_redux('mt_preloader_status')) {
        $html .= 'body .churchwp_preloader_holder{
					background-color: '.churchwp_redux('mt_preloader_status').';
        		}';
    }

	// HEADER SEMITRANSPARENT - METABOX
	$custom_header_activated = get_post_meta( get_the_ID(), 'tslr_custom_header_options_status', true );
	$mt_header_custom_bg_color = get_post_meta( get_the_ID(), 'mt_header_custom_bg_color', true );
	$mt_header_semitransparent = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
    if (isset($mt_header_semitransparent) == 'enabled') {
		// $hexa = churchwp_redux('mt_header_main_background');
		$mt_header_semitransparentr_rgba_value = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value', true );
		$mt_header_semitransparentr_rgba_value_scroll = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value_scroll', true );
		
		if (isset($mt_header_custom_bg_color)) {
			list($r, $g, $b) = sscanf($mt_header_custom_bg_color, "#%02x%02x%02x");
		}else{
			$hexa = '#04ABE9'; //Theme Options Color
			list($r, $g, $b) = sscanf($hexa, "#%02x%02x%02x");
		}

		$html .= '
			.is_header_semitransparent .navbar-default {
			    background: rgba('.$r.', '.$g.', '.$b.', '.$mt_header_semitransparentr_rgba_value.') none repeat scroll 0 0;
			}
			.is_header_semitransparent .sticky-wrapper.is-sticky .navbar-default {
			    background: rgba('.$r.', '.$g.', '.$b.', '.$mt_header_semitransparentr_rgba_value_scroll.') none repeat scroll 0 0;
			}';
    }

	// FOOTER BACKGROUND - METABOX
	$mt_custom_footer_options_status = get_post_meta( get_the_ID(), 'mt_custom_footer_options_status', true );
	$mt_footer_custom_bg_color = get_post_meta( get_the_ID(), 'mt_footer_custom_bg_color', true );
    if (isset($mt_custom_footer_options_status) == 'enabled' && isset($mt_footer_custom_bg_color)) {
		$html .= '
			footer .footer{
				background-color: '.$mt_footer_custom_bg_color.' !important;
			}';
    }


    // THEME OPTIONS STYLESHEET
    if (churchwp_redux('mt_backtotop_status') == true) {
		 $html .= '.back-to-top {
				background: '.churchwp_redux('mt_backtotop_bg_color','background-color').' url('.get_template_directory_uri().'/images/svg/back-to-top-arrow.svg) '.churchwp_redux('mt_backtotop_bg_color','background-repeat').' '.churchwp_redux('mt_backtotop_bg_color','background-position').';
				height: '.churchwp_redux('mt_backtotop_height_width').'px;
				width: '.churchwp_redux('mt_backtotop_height_width').'px;
			}';
    }

    // THEME OPTIONS STYLESHEET
    $html .= '
    		.breadcrumb a::after {
	        	content: "'.churchwp_redux('mt_breadcrumbs_delimitator').'";
	    	}
		    .logo img,
		    .navbar-header .logo img {
		        max-width: '.churchwp_redux('mt_logo_max_width').'px;
		    }

		    ::selection{
		        color: '.churchwp_redux('mt_text_selection_color').';
		        background: '.churchwp_redux('mt_text_selection_background_color').';
		    }
		    ::-moz-selection { /* Code for Firefox */
		        color: '.churchwp_redux('mt_text_selection_color').';
		        background: '.churchwp_redux('mt_text_selection_background_color').';
		    }

		    a{
		        color: '.churchwp_redux('mt_global_link_styling', 'regular').';
		    }
		    a:focus,
		    a:visited,
		    a:hover{
		        color: '.churchwp_redux('mt_global_link_styling', 'hover').';
		    }

		    /*------------------------------------------------------------------
		        COLOR
		    ------------------------------------------------------------------*/
			.wpcf7-form .wpcf7-form-control::-webkit-input-placeholder {
			   color: '.churchwp_redux("mt_style_main_texts_color").';
			}
			.wpcf7-form .wpcf7-form-control:-moz-placeholder { /* Firefox 18- */
			   color: '.churchwp_redux("mt_style_main_texts_color").';  
			}
			.wpcf7-form .wpcf7-form-control::-moz-placeholder {  /* Firefox 19+ */
			   color: '.churchwp_redux("mt_style_main_texts_color").';  
			}
			.wpcf7-form .wpcf7-form-control:-ms-input-placeholder {  
			   color: '.churchwp_redux("mt_style_main_texts_color").';  
			}
		    a, 
		    a:hover, 
		    a:focus,
		    span.amount,
		    .widget_popular_recent_tabs .nav-tabs li.active a,
		    .widget_product_categories .cat-item:hover,
		    .widget_product_categories .cat-item a:hover,
		    .widget_archive li:hover,
		    .widget_archive li a:hover,
		    .widget_categories .cat-item:hover,
		    .widget_categories li a:hover,
		    .pricing-table.recomended .button.solid-button, 
		    .pricing-table .table-content:hover .button.solid-button,
		    .pricing-table.Recommended .button.solid-button, 
		    .pricing-table.recommended .button.solid-button, 
		    #sync2 .owl-item.synced .post_slider_title,
		    #sync2 .owl-item:hover .post_slider_title,
		    #sync2 .owl-item:active .post_slider_title,
		    .pricing-table.recomended .button.solid-button, 
		    .pricing-table .table-content:hover .button.solid-button,
		    .testimonial-author,
		    .testimonials-container blockquote::before,
		    .testimonials-container blockquote::after,
		    .post-author > a,
		    h2 span,
		    label.error,
		    .author-name,
		    .comment_body .author_name,
		    .prev-next-post a:hover,
		    .prev-text,
		    .wpb_button.btn-filled:hover,
		    .next-text,
		    .social ul li a:hover i,
		    .wpcf7-form span.wpcf7-not-valid-tip,
		    .text-dark .statistics .stats-head *,
		    .wpb_button.btn-filled,
		    footer ul.menu li.menu-item a:hover,
		    .widget_meta a:hover,
		    .widget_pages a:hover,
			footer .widget_nav_menu li::before,
			.sidebar-content .widget_nav_menu li::before,
			.widget_pages li::before,
			.widget_meta li::before,
			.comment-author-link a:hover,
			.widget_archive li::before,
			.widget_categories .cat-item::before,
		    .recentcomments::before, .widget_recent_entries li::before,
		    .list-view .post-details .post-excerpt .more-link,
		    .simple_sermon_content_top h4,
		    .widget_recent_entries_with_thumbnail li:hover a,
		    .widget_recent_entries li a:hover,
		    .churchwp-single-post-meta .churchwp-meta-post-comments a:hover,
		    .wpcf7-form .wpcf7-select, .wpcf7-form input.wpcf7-form-control, .wpcf7-form textarea.wpcf7-form-control,
			.list-view .post-details .post-category-comment-date i,
			.list-view .post-details .post-category-comment-date a,
		    #navbar .mt-icon-list-item:hover,
		    #navbar .menu-item:hover .sub-menu .mt-icon-list-item .mt-icon-list-text
			.list-view .post-details .post-name a,	
			.churchwp-single-post-meta .churchwp-meta-post-author a,	    
			.sidebar-content .widget_nav_menu li a:hover{
		        color: '.churchwp_redux("mt_style_main_texts_color").'; /*Color: Main blue*/
		    }
		    #navbar .menu-item:hover .sub-menu .mt-icon-list-item:hover .mt-icon-list-icon-holder-inner i,
		    #navbar .menu-item:hover .sub-menu .mt-icon-list-item:hover .mt-icon-list-text{
		        color: '.churchwp_redux("mt_style_main_texts_color").' !important; /*Color: Main blue*/
			}


		    /*------------------------------------------------------------------
		        BACKGROUND + BACKGROUND-COLOR
		    ------------------------------------------------------------------*/
		    .tagcloud > a:hover,
		    .theme-icon-search,
		    .wpb_button::after,
		    .rotate45,
		    .latest-posts .post-date-day,
		    .latest-posts h3, 
		    .latest-tweets h3, 
		    .latest-videos h3,
		    .button.solid-button, 
		    button.vc_btn,
		    .pricing-table.recomended .table-content, 
		    .pricing-table .table-content:hover,
		    .pricing-table.Recommended .table-content, 
		    .pricing-table.recommended .table-content, 
		    .pricing-table.recomended .table-content, 
		    .pricing-table .table-content:hover,
		    .block-triangle,
		    .owl-theme .owl-controls .owl-page span,
		    body .vc_btn.vc_btn-blue, 
		    body a.vc_btn.vc_btn-blue, 
		    body button.vc_btn.vc_btn-blue,
		    .pagination .page-numbers.current,
		    .pagination .page-numbers:hover,
		    #subscribe > button[type=\'submit\'],
		    .social-sharer > li:hover,
		    .prev-next-post a:hover .rotate45,
		    .masonry_banner.default-skin,
		    .form-submit input,
		    .member-header::before, 
		    .member-header::after,
		    .member-footer .social::before, 
		    .member-footer .social::after,
		    .subscribe > button[type=\'submit\'],
		    .no-results input[type=\'submit\'],
		    h3#reply-title::after,
		    .newspaper-info,
		    .categories_shortcode .owl-controls .owl-buttons i:hover,
		    .widget-title:after,
		    h2.heading-bottom:after,
		    .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active,
		    #primary .main-content ul li:not(.rotate45)::before,
		    .wpcf7-form .wpcf7-submit,
		    ul.ecs-event-list li span,
		    #contact_form2 .solid-button.button,
		    .details-container > div.details-item .amount, .details-container > div.details-item ins,
		    .theme-search .search-submit,
		    .pricing-table.recommended .table-content .title-pricing,
		    .pricing-table .table-content:hover .title-pricing,
		    .pricing-table.recommended .button.solid-button,
		    #navbar ul.sub-menu li a:hover,
		    .post-category-date a[rel="tag"],
		    .is_sticky,
		    .owl-theme.mt_clients_slider .owl-controls .owl-buttons div,
		    .single .label-info.edit-t:hover,
		    .list-view .post-details .post-excerpt .more-link,
		    footer .footer-top .widget_wysija_cont .wysija-submit,
		    .list-view .post-details .post-excerpt .more-link,
		    .pricing-table .table-content:hover .button.solid-button,
		    footer .footer-top .menu .menu-item a::before,
            .tslr-events-page:hover,
		    .post-password-form input[type=\'submit\'] {
		        background: '.churchwp_redux("mt_style_main_backgrounds_color").';
		    }

		    .theme-search.theme-search-open .theme-icon-search, 
		    .no-js .theme-search .theme-icon-search,
		    .theme-icon-search:hover,
		    .latest-posts .post-date-month,
		    .button.solid-button:hover,
		    body .vc_btn.vc_btn-blue:hover, 
		    body a.vc_btn.vc_btn-blue:hover, 
		    .post-category-date a[rel="tag"]:hover,
		    .single-post-tags > a:hover,
		    body button.vc_btn.vc_btn-blue:hover,
		    #contact_form2 .solid-button.button:hover,
		    .subscribe > button[type=\'submit\']:hover,
		    .no-results input[type=\'submit\']:hover,
		    ul.ecs-event-list li span:hover,
		    .pricing-table.recommended .table-content .price_circle,
		    .pricing-table .table-content:hover .price_circle,
		    #modal-search-form .modal-content input.search-input,
		    .wpcf7-form .wpcf7-submit:hover,
		    .form-submit input:hover,
		    .list-view .post-details .post-excerpt .more-link:hover,
		    .pricing-table.recommended .button.solid-button:hover,
		    .pricing-table .table-content:hover .button.solid-button:hover,
		    footer .footer-top .widget_wysija_cont .wysija-submit:hover,
		    .owl-theme.mt_clients_slider .owl-controls .owl-buttons div:hover,
		    .fixed-search-inside .search-submit:hover,
		    .slider_navigation .btn:hover,
		    .post-password-form input[type=\'submit\']:hover {
		        background: '.churchwp_redux('mt_style_main_backgrounds_color_hover').';
		    }
		    .tagcloud > a:hover{
		        background: '.churchwp_redux('mt_style_main_backgrounds_color_hover').' !important;
		    }

		    .flickr_badge_image a::after,
		    .thumbnail-overlay,
		    .portfolio-hover,
		    .pastor-image-content .details-holder,
		    .item-description .holder-top,
		    .slider_navigation .btn,
		    .read-more-overlay,
		    blockquote::before {
		        background: '.churchwp_redux("mt_style_semi_opacity_backgrounds", "alpha").';
		    }

		    /*------------------------------------------------------------------
		        BORDER-COLOR
		    ------------------------------------------------------------------*/
		    .comment-form input, 
		    .comment-form textarea,
		    .author-bio,
		    blockquote,
		    .widget_popular_recent_tabs .nav-tabs > li.active,
		    body .left-border, 
		    body .right-border,
		    body .member-header,
		    body .member-footer .social,
		    body .button[type=\'submit\'],
		    .navbar ul li ul.sub-menu,
		    .wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
		    #contact-us .form-control:focus,
		    .sale_banner_holder:hover,
		    .testimonial-img,
		    .wpcf7-form input:focus, 
		    input:focus, 
			.widget_price_filter .ui-slider .ui-slider-handle,
		    #navbar .menu-item.current_page_item > a,
			#navbar .menu-item:hover > a,
		    .wpcf7-form textarea:focus,
		    .navbar-default .navbar-toggle:hover, 
		    .header_search_form,
		    .navbar-default .navbar-toggle{
		        border-color: '.churchwp_redux("mt_style_main_texts_color").'; /*Color: Main blue */
		    }';

    wp_add_inline_style( 'churchwp-custom-style', $html );
}
?>