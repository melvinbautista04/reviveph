<?php

/**

||-> Shortcode: Contact Form01

*/
function themeslr_shortcode_contact01($params, $content) {

    extract( shortcode_atts( 
        array(
            'animation'             => '',
            'version_type'          => '',
            'contact_button_color'  => ''
        ), $params ) );
    global $smartowl_redux;
    if (isset($_POST['contact_me'])) {
        $to = $smartowl_redux['mt_contact_email'];
        $form_user_name = $_POST['user_name'];
        $form_user_email = $_POST['user_email'];
        $form_subject = $_POST['user_subject'];
        $form_comment = $_POST['user_message'];
        $message = '';
        $message .= "From: " .  $form_user_name . "\r\n";
        $message .= "Email: " . $form_user_email . "\r\n" . "\r\n";
        $message .= $form_comment . "\r\n";
        $message .= $form_subject . "\r\n";
        $headers = 'From: ' . $form_user_name . '<'. $form_user_email . '>';
        if( mail( $to, $subject, $message, $headers ) ) {
            #echo "<p>Your email has been sent! Thank you</p>";
        }
    }
    
    $html = '';
        $html .= '<form method="POST" class="row wow '.$animation.'" id="contact01_form" novalidate="novalidate">';
	        $html .= '<div class="content '.$version_type.'">';
            #Name
	        	$html .= '<div class="vc_col-md-4 name_input">';
		        	$html .= '<span class="input input--hoshi">';
						$html .= '<input autocomplete="off" class="input__field input__field--hoshi" type="text" id="input-4" name="user_name" />';
						$html .= '<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">';
							$html .= '<span class="input__label-content input__label-content--hoshi">Name</span>';
						$html .= '</label>';
					$html .= '</span>';
				$html .= '</div>';

				#Email Address
	        	$html .= '<div class="vc_col-md-4 email_input">';
		        	$html .= '<span class="input input--hoshi">';
						$html .= '<input  autocomplete="off" required="required" class="input__field input__field--hoshi" type="email" id="input-5" name="user_email" />';
						$html .= '<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-5">';
							$html .= '<span class="input__label-content input__label-content--hoshi">Email Address</span>';
						$html .= '</label>';
					$html .= '</span>';
				$html .= '</div>';

				#Subject
	        	$html .= '<div class="vc_col-md-4 subject_input">';
		        	$html .= '<span class="input input--hoshi">';
						$html .= '<input autocomplete="off" class="input__field input__field--hoshi" type="text" id="input-6" name="user_subject" />';
						$html .= '<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-6">';
							$html .= '<span class="input__label-content input__label-content--hoshi">Subject</span>';
						$html .= '</label>';
					$html .= '</span>';
				$html .= '</div>';

				#Message
	        	$html .= '<div class="vc_col-md-12 message_input">';
		        	$html .= '<span class="input input--hoshi">';
						$html .= '<input autocomplete="off" class="input__field input__field--hoshi" type="text" id="input-7" name="user_message" />';
						$html .= '<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-7">';
							$html .= '<span class="input__label-content input__label-content--hoshi">Message</span>';
						$html .= '</label>';
					$html .= '</span>';
				$html .= '</div>';

	            $html .= '<div class="vc_col-md-3 contact_button text-center">';
	                $html .= '

                  <!-- <button class="submit-contact-button button form-control" name="contact_me">SEND<span class="cf-progress">progress</span></button> -->

                  <button name="contact_me" class="vc_general vc_btn3 vc_btn3-size-lg vc_btn3-shape-square vc_btn3-style-outline-custom" style="border-color: '.$contact_button_color.'; color: '.$contact_button_color.'; background-color: transparent;" onmouseenter="this.style.borderColor=\''.$contact_button_color.'\'; this.style.backgroundColor=\''.$contact_button_color.'\'; this.style.color=\'#ffffff\';" onmouseleave="this.style.borderColor=\''.$contact_button_color.'\'; this.style.backgroundColor=\'transparent\'; this.style.color=\''.$contact_button_color.'\'">Submit Inquiry</button>';
	            $html .= '</div>';
	        $html .= '</div>';


        $html .= '<div class="success_message alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><a href="#" class="alert-link">'.__('Thank you! We\'ll get back to you as soon as possible.','themeslr').'</a></div>';
        $html .= '</form>';
    return $html;
}
add_shortcode('shortcode_contact01', 'themeslr_shortcode_contact01');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("ThemeSLR - Contact", 'themeslr'),
     "base" => "shortcode_contact01",
     "category" => esc_attr__('ThemeSLR', 'themeslr'),
     "icon" => "themeslr_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Version type", 'themeslr'),
          "param_name" => "version_type",
          "value" => array(
            'Choose version'   => 'choose_version',
            'Light version'   => 'light_version',
            'Dark version'    => 'dark_version'
            ),
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "Choose version of contact"
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Contact button color", 'themeslr' ),
          "param_name" => "contact_button_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose contact button color", 'themeslr' )
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

?>