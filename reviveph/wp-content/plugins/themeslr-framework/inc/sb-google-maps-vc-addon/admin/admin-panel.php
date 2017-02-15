<?php
	// add_action('admin_init','sbvcgmap_check_compatibility');
	// function sbvcgmap_check_compatibility() {
	// 	$required_vc 	= '3.9.9';
	// 	if (defined('WPB_VC_VERSION')) {
	// 		if (version_compare($required_vc, WPB_VC_VERSION, '>')) {
	// 			add_action('admin_notices', 'sbvcgmap_version_notice');
	// 		}
	// 	} else {
	// 		add_action('admin_notices', 'sbvcgmap_activation_notice');
	// 	}
	// }
	// function sbvcgmap_version_notice() {
	// 	echo '<div class="updated"><p>The <strong>'.SBVCGMAP_PLUGIN_NAME.'</strong> add-on requires <strong>Visual Composer</strong> version 4.0.0 or greater.</p></div>';	
	// }
	// function sbvcgmap_activation_notice() {
	// 	echo '<div class="updated"><p>The <strong>'.SBVCGMAP_PLUGIN_NAME.'</strong> add-on requires the <strong>Visual Composer</strong> Plugin installed and activated.</p></div>';
	// }
	
	//Including admin scripts
	add_action( 'admin_enqueue_scripts', 'sbvcgmap_admin_enqueue_scripts');
	function sbvcgmap_admin_enqueue_scripts() {
		
		wp_enqueue_style('sbvcgmap-admin-style', SBVCGMAP_PLUGIN_DIR.'/assets/css/admin.css');
		
		wp_enqueue_script('jquery');
		
		wp_register_script('sbvcgmap-googlemapapi', (is_ssl() ? 'https://' :'http://').'maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places,weather,panoramio', array(), '', true);
		wp_enqueue_script('sbvcgmap-googlemapapi');
		
		wp_register_script('sbvcgmap-admin', SBVCGMAP_PLUGIN_DIR.'/assets/js/admin.js', array(), SBVCGMAP_PLUGIN_VERSION, true);
		wp_enqueue_script('sbvcgmap-admin');
	}
	
	
	if(!class_exists('sbvcgmap_google_map')) {
		class sbvcgmap_google_map {
			function __construct() {
				add_action('admin_init',array($this,'sbvcgmap_init'));
				//add_shortcode('sbvcgmap','sbvcgmap_shortcode');
			}
			
			function sbvcgmap_init(){
		
				if(function_exists('vc_map')){
	
					vc_map( array(		
						"name" 						=> __(SBVCGMAP_PLUGIN_NAME,'themeslr'),		
						"base" 						=> 'sbvcgmap',		
     					"icon" => "themeslr_shortcode",
						"category" 					=> __('ThemeSLR','themeslr'),
						"content_element"			=> true,
						"show_settings_on_create" 	=> true,
						"as_parent" 				=> array ('only' => 'sbvcgmap_marker'),
						"description" 				=> __( 'Add Google Map','themeslr' ),
						"js_view" 					=> 'VcColumnView',
						"params" 					=> array (
							array (
								'type'			=> 'textfield',
								'heading' 		=> __( 'Title', 'themeslr' ),
								'param_name' 	=> 'sbvcgmap_title',
								'holder'		=> 'div',
								'description' 	=> __( 'Enter map title. This is optional field.', 'themeslr' )
							),
							array (
								'type'			=> 'textfield',
								'heading' 		=> __( 'API Key', 'themeslr' ),
								'param_name' 	=> 'sbvcgmap_apikey',
								'description' 	=> __( '<a target="_blank" href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">Click here</a> to generate API key. For more details <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">click here</a>.', 'themeslr' )
							),
							array(
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Width', 'themeslr' ),
								'param_name' 	=> 'map_width',
								'value' 		=> 100,
								'min' 			=> 0,
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Set map width.', 'themeslr' )
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Width Type', 'themeslr' ),
								'param_name' 	=> 'width_type',
								'description' 	=> __( 'Select map width type.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_size_types(),
								'std' 			=> '%'
							),
							array(
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Height', 'themeslr' ),
								'param_name' 	=> 'map_height',
								'value' 		=> 400,
								'min' 			=> 0,
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Set map height.', 'themeslr' )
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Height Type', 'themeslr' ),
								'param_name' 	=> 'height_type',
								'description' 	=> __( 'Select map height type.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_size_types()
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Map Styles', 'themeslr' ),
								'param_name' 	=> 'mapstyles',
								'description' 	=> __( 'Select map style. <a href="http://plugins.sbthemes.com/responsive-google-maps-vc-addon/map-styles/all-styles/" target="_blank">Click Here</a> to view all styles.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_map_styles()
							),
							array (
								'type' 			=> 'sbvcgmap_autocomplete',
								'heading' 		=> __( 'Center of Map', 'themeslr' ),
								'param_name' 	=> 'centerpoint',
								'description' 	=> __( 'Optional! Address or (latitude, longitude). Leave blank to auto center.', 'themeslr' ),
								'group' 		=> __('Zoom', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Zoom Level', 'themeslr' ),
								'param_name' 	=> 'zoom',
								'description' 	=> __( 'Set zoom level. You can set any numerical value from <strong>1 to 21</strong>.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_zoom_levels(),
								'std'			=>	14,
								'group' 		=> __('Zoom', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Enable Zoom Control', 'themeslr' ),
								'param_name' 	=> 'zoomcontrol',
								'description' 	=> __( 'Displays a slider (for large maps) or small "+/-" buttons', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'group' 		=> __('Zoom', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Zoom Control Position', 'themeslr' ),
								'param_name' 	=> 'zoomcontrol_position',
								'description' 	=> __( 'Select zoom control position.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_positions(),
								'std'			=>	'TOP_LEFT',
								'group' 		=> __('Zoom', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Zoom Style', 'themeslr' ),
								'param_name' 	=> 'zoomcontrolstyle',
								'description' 	=> __( 'Select zoom control style.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_zoom_styles(),
								'std'			=>	'DEFAULT',
								'group' 		=> __('Zoom', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Draggable', 'themeslr' ),
								'param_name' 	=> 'draggable',
								'description' 	=> __( 'If yes, map will be draggable by mouse.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'yes',
								'group' 		=> __('Zoom', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Scroll Wheel', 'themeslr' ),
								'param_name' 	=> 'scrollwheel',
								'description' 	=> __( 'If yes, zoom level will be changed by mouse scroll wheel.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'yes',
								'group' 		=> __('Zoom', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Pan Control', 'themeslr' ),
								'param_name' 	=> 'pancontrol',
								'description' 	=> __( 'Displays buttons for panning the map.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'yes',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Pan Control Position', 'themeslr' ),
								'param_name' 	=> 'pancontrol_position',
								'description' 	=> __( 'Pan control buttons position.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_positions(),
								'std'			=>	'TOP_LEFT',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Scale Control', 'themeslr' ),
								'param_name' 	=> 'scalecontrol',
								'description' 	=> __( 'Displays a map scale element.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'yes',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Street View Control', 'themeslr' ),
								'param_name' 	=> 'streetviewcontrol',
								'description' 	=> __( 'Displays a Pegman icon to enable street view.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'yes',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Street View Control Position', 'themeslr' ),
								'param_name' 	=> 'streetviewcontrol_position',
								'description' 	=> __( 'Pegman icon (street view control) position.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_positions(),
								'std'			=>	'TOP_LEFT',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Map Type Control', 'themeslr' ),
								'param_name' 	=> 'maptypecontrol',
								'description' 	=> __( 'Displays a map type control.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'yes',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Map Type Control Position', 'themeslr' ),
								'param_name' 	=> 'maptypecontrol_position',
								'description' 	=> __( 'Map type control position.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_positions(),
								'std'			=>	'TOP_RIGHT',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Map Type', 'themeslr' ),
								'param_name' 	=> 'maptype',
								'description' 	=> __( 'Toggle between map types. For <strong>STREETVIEW</strong>, you must have to set <strong>Center of Map</strong> field in Zoom Settings Tab.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_map_types(),
								'std'			=>	'ROADMAP',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Enable Street View Toggle Button', 'themeslr' ),
								'param_name' 	=> 'panoramatogglebutton',
								'description' 	=> __( 'Select yes to enable street view toggle button. To enable this feature, you must have to set <strong>Center of Map</strong> field in Zoom Settings Tab.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Map Type Control Style', 'themeslr' ),
								'param_name' 	=> 'maptypecontrolstyle',
								'description' 	=> __( 'Choose map type control style.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_map_type_styles(),
								'std'			=>	'DEFAULT',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Overview Map Control Visible', 'themeslr' ),
								'param_name' 	=> 'overviewmapcontrolvisible',
								'description' 	=> __( 'Displays a thumbnail overview map reflecting the current map viewport.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Overview Map Control', 'themeslr' ),
								'param_name' 	=> 'overviewmapcontrol',
								'description' 	=> __( 'Displays a toggle button to show / hide overview map control (bottom right).', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'yes',
								'group' 		=> __('Controls', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Search Type', 'themeslr' ),
								'param_name' 	=> 'searchtype',
								'description' 	=> __( 'Nearest search query. Select Disabled to turn off this feature. <a target="_blank" href="https://developers.google.com/places/supported_types">Click Here</a> to see supported search query.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_search_types(),
								'std'			=>	'disabled',
								'group' 		=> __('Nearest Places', 'themeslr')
							),
							array(
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Search Radius', 'themeslr' ),
								'param_name' 	=> 'searchradius',
								'value' 		=> 500,
								'min' 			=> 0,
								'max' 			=> 50000,
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Search area radius in meters. Radius calculates from center of map. Maximum allowed radius is 50000.', 'themeslr' ),
								'group' 		=> __('Nearest Places', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Icon Animation', 'themeslr' ),
								'param_name' 	=> 'searchiconanimation',
								'description' 	=> __( 'Seach result icon animation.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_marker_animations(),
								'std'			=>	'NONE',
								'group' 		=> __('Nearest Places', 'themeslr')
							),
							array (
								'type'			=> 'textfield',
								'heading' 		=> __( 'Text for Direction Link', 'themeslr' ),
								'param_name' 	=> 'searchdirectiontext',
								'description' 	=> __( 'Direction link text for search result marker. Leave blank to hide link.', 'themeslr' ),
								'value' 		=> '',
								'group' 		=> __('Nearest Places', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Weather', 'themeslr' ),
								'param_name' 	=> 'weather',
								'description' 	=> __( 'Weather layer add weather forecasts to map.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Map Layers', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Traffic', 'themeslr' ),
								'param_name' 	=> 'traffic',
								'description' 	=> __( 'Traffic layer add real-time traffic information to map.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Map Layers', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Transit', 'themeslr' ),
								'param_name' 	=> 'transit',
								'description' 	=> __( 'Transit layer add public transit network of a city to map.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Map Layers', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Bicycle', 'themeslr' ),
								'param_name' 	=> 'bicycle',
								'description' 	=> __( 'Bicycle layer add bicycle information (bike routes) to map.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Map Layers', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Panoramio', 'themeslr' ),
								'param_name' 	=> 'panoramio',
								'description' 	=> __( 'Panoramio layer add community contributed photos to map.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Map Layers', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Reload on resize', 'themeslr' ),
								'param_name' 	=> 'reloadonresize',
								'description' 	=> __( 'If yes, map will be reload on screen resize.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Miscellaneous', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Language', 'themeslr' ),
								'param_name' 	=> 'language',
								'description' 	=> __( 'Localize your map.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_map_languages(),
								'std'			=>	'en',
								'group' 		=> __('Miscellaneous', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Clustering', 'themeslr' ),
								'param_name' 	=> 'clustering',
								'description' 	=> __( 'Enable this if you have 100ths of markers. It will improve speed for too many markers.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'group' 		=> __('Miscellaneous', 'themeslr')
							),
							array(
								'type' 			=> 'checkbox',
								'value'			=> array(__( 'Enable Full Screen Button', 'themeslr' ) => 'yes'),
								'heading' 		=> __( '', 'themeslr' ),
								'param_name' 	=> 'fullscreenbutton',
								'description' 	=> __( 'Check this box to enable full screen toggle button in your map.', 'themeslr' ),
								'group' 		=> __('Miscellaneous', 'themeslr')
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __( 'Expand Button Text', 'themeslr' ),
								'param_name' 	=> 'expandmaptext',
								'value'			=> 'Expand Map',
								'description' 	=> __( 'Add text for expand button.', 'themeslr' ),
								'dependency'	=> array('element' => 'fullscreenbutton', 'value' => 'yes'),
								'group' 		=> __('Miscellaneous', 'themeslr')
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __( 'Collapse Button Text', 'themeslr' ),
								'param_name' 	=> 'collapsemaptext',
								'value'			=> 'Collapse Map',
								'description' 	=> __( 'Add text for collapse button.', 'themeslr' ),
								'dependency'	=> array('element' => 'fullscreenbutton', 'value' => 'yes'),
								'group' 		=> __('Miscellaneous', 'themeslr')
							)
							
						)
					) );
					
					vc_map( array(		
						"name" 			=> __('Map Marker','themeslr'),		
						"base" 			=> 'sbvcgmap_marker',		
						"icon" 			=> SBVCGMAP_PLUGIN_DIR.'/assets/img/marker-icon.png',
						"category" 		=> __('Google Map','themeslr'),
						"as_child" 		=> array('only' => 'sbvcgmap'),
						"description" 	=> __( 'Add New Marker','themeslr' ),
						"params" 		=> array(
							array(
								'type' 			=> 'sbvcgmap_autocomplete',
								'heading' 		=> __( 'Address or (Latitude, Longitude)', 'themeslr' ),
								'param_name' 	=> 'address',
								'holder'		=> 'div',
								'description' 	=> __( 'Add location address or (Latitude, Longitude). For Latitude and Longitude use comma for separator.', 'themeslr' )
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __( 'Text for Directions Link', 'themeslr' ),
								'param_name' 	=> 'textfordirectionslink',
								'value'			=> '',
								'description' 	=> __( 'Text for Directions Link. Leave blank to remove direction link from info window.', 'themeslr' )
							),
							array(
								'type' 			=> 'attach_image',
								'heading' 		=> __( 'Marker Icon', 'themeslr' ),
								'param_name' 	=> 'icon',
								'description' 	=> __( 'Upload marker pin icon. You can find stunning icons here: <a target="_blank" href="http://medialoot.com/item/free-vector-map-location-pins">Download Icons</a>', 'themeslr' )
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Icon Animation', 'themeslr' ),
								'param_name' 	=> 'animation',
								'description' 	=> __( 'Select marker animation.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_marker_animations(),
								'std'			=>	'NONE'
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Default Open Info Window', 'themeslr' ),
								'param_name' 	=> 'infowindow',
								'description' 	=> __( 'If yes, marker info window will be opened by default..', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no'
							),
							array(
								'type' 			=> 'textarea_html',
								'heading' 		=> __( 'Marker Content', 'themeslr' ),
								'param_name' 	=> 'content',
								'description' 	=> __( 'Use any Text or HTML for marker content. You can also use shortcodes. Some JS based shortcodes should not work.', 'themeslr' )
							),
							array(
								'type' 			=> 'checkbox',
								'value'			=> array(__( 'Enable custom styles', 'themeslr' ) => 'yes'),
								'heading' 		=> __( '', 'themeslr' ),
								'param_name' 	=> 'customstyles',
								'description' 	=> __( 'Check this box to enable custom styles.', 'themeslr' ),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array(
								'type' 			=> 'colorpicker',
								'heading' 		=> __( 'Select Background Color', 'themeslr' ),
								'param_name' 	=> 'csbgcolor',
								'description' 	=> __( 'Background color for info window.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array(
								'type' 			=> 'attach_image',
								'heading' 		=> __( 'Select Background Image', 'themeslr' ),
								'param_name' 	=> 'csbgimage',
								'description' 	=> __( 'Background image for info window.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Background Image Repeat', 'themeslr' ),
								'param_name' 	=> 'csbgrepeat',
								'description' 	=> __( 'Set yes to repeat info window background image.', 'themeslr' ),
								'value' 		=> sbvcgmap_toggle_button(),
								'std'			=>	'no',
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array (
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Width', 'themeslr' ),
								'param_name' 	=> 'cswidth',
								'value' 		=> 300,
								'min' 			=> 0,
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Info window width in pixels.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array (
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Padding', 'themeslr' ),
								'param_name' 	=> 'cspadding',
								'value' 		=> 20,
								'min' 			=> 0,
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Info window padding in pixels.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array (
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Border Radius', 'themeslr' ),
								'param_name' 	=> 'csborderradius',
								'value' 		=> 0,
								'min' 			=> 0,
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Info window border radius in pixels.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array (
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Border Width', 'themeslr' ),
								'param_name' 	=> 'csborderwidth',
								'value' 		=> 0,
								'min' 			=> 0,
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Info window border width in pixels.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array (
								'type' 			=> 'dropdown',
								'heading' 		=> __( 'Border Style', 'themeslr' ),
								'param_name' 	=> 'csborderstyle',
								'description' 	=> __( 'Select border style.', 'themeslr' ),
								'value' 		=> sbvcgmap_get_border_types(),
								'std' 			=> 'solid',
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array(
								'type' 			=> 'colorpicker',
								'heading' 		=> __( 'Select Border Color', 'themeslr' ),
								'param_name' 	=> 'csbordercolor',
								'description' 	=> __( 'Info window border color.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> __( 'Box Shadow', 'themeslr' ),
								'param_name' 	=> 'csboxshadow',
								'value'			=> '',
								'description' 	=> __( 'Use valid css box shadow property value here. <strong>Eg. 0 0 1px #000</strong>', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array(
								'type' 			=> 'attach_image',
								'heading' 		=> __( 'Select Close Image Icon', 'themeslr' ),
								'param_name' 	=> 'cscloseimage',
								'description' 	=> __( 'Custom close image icon for info window.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array(
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Info Window Horizontal(X) Position (Advance Option)', 'themeslr' ),
								'param_name' 	=> 'csxposition',
								'value' 		=> '',
								'min' 			=> '',
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Leave empty for default. Info window horizontal(X) position in pixels. Use any positive or negative integer value.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							),
							array(
								'type' 			=> 'sbvcgmap_num',
								'heading' 		=> __( 'Info Window Vertical(Y) Position (Advance Option)', 'themeslr' ),
								'param_name' 	=> 'csyposition',
								'value' 		=> '',
								'min' 			=> '',
								'max' 			=> '',
								'suffix' 		=> '',
								'step' 			=> 1,
								'description' 	=> __( 'Leave empty for default. Info window vertical(Y) position in pixels. Use any positive or negative integer value.', 'themeslr' ),
								'dependency'	=> array('element' => 'customstyles', 'value' => 'yes'),
								'group' 		=> __('Custom Styles', 'themeslr')
							)
						)
					));
				}
			}
			
		}
		
		
		//instantiate the class
		$sbvcgmap_google_map = new sbvcgmap_google_map;
	}
	
	add_action('admin_init','sbvcgmap_extends');
	function sbvcgmap_extends(){
		if (class_exists('WPBakeryShortCodesContainer')) {
			class WPBakeryShortCode_Sbvcgmap extends WPBakeryShortCodesContainer {
			}
		}
	}