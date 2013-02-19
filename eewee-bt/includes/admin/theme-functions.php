<?php

	// Define Theme URL
	define('EEWEE_THEME_URL', 'http://www.eewee.fr/wordpress/themes');
	define('EEWEE_PLUGIN_URL', 'http://www.eewee.fr/wordpress/plugins');
	
	// Define all Settings Pages Tabs
	function eewee_get_settings_page_tabs() {
		$tabs = array(
			'welcome' => __('Welcome', 'eewee-bt'),
			'general' => __('General', 'eewee-bt'),
			'carousel' => __('Carousel', 'eewee-bt'),
		//	'colors' => __('Colors', 'eewee-bt'),
		//	'fonts' => __('Fonts', 'eewee-bt'),
		//	'about' => __('About Me', 'eewee-bt'),
		//	'slider' => __('Post Slider', 'eewee-bt'),
			'social' => __('Networks', 'eewee-bt'),
                        'address' => __('Address', 'eewee-bt'),
                        'manual' => __('Manual', 'eewee-bt')
		);
		return $tabs;
	}
	
	function eewee_get_sections($tab) {
			
		// Get Section
		switch ( $tab ){
			case 'general' :
                            locate_template('/includes/admin/options/options-general.php', true);
                            $eewee_sections = eewee_get_general_sections();
                            break;
                        case 'carousel' :
                            locate_template('/includes/admin/options/options-carousel.php', true);
                            $eewee_sections = eewee_get_carousel_sections();
                            break;
			case 'colors' :
                            locate_template('/includes/admin/options/options-colors.php', true);
                            $eewee_sections = eewee_get_colors_sections();
                            break;
			case 'fonts' :
                            locate_template('/includes/admin/options/options-fonts.php', true);
                            $eewee_sections = eewee_get_fonts_sections();
                            break;
			case 'about' :
                            locate_template('/includes/admin/options/options-about.php', true);
                            $eewee_sections = eewee_get_about_sections();
                            break;
			case 'slider' :
                            locate_template('/includes/admin/options/options-slider.php', true);
                            $eewee_sections = eewee_get_slider_sections();
                            break;
			case 'social' :
                            locate_template('/includes/admin/options/options-social.php', true);
                            $eewee_sections = eewee_get_social_sections();
                            break;
                      	case 'address' :
                            locate_template('/includes/admin/options/options-address.php', true);
                            $eewee_sections = eewee_get_address_sections();
                            break;
			default :
                            locate_template('/includes/admin/options/options-general.php', true);
                            $eewee_sections = eewee_get_general_sections();
                }// switch
		
		return $eewee_sections;
	}
	
	function eewee_get_settings($tab = 'general') {
	
		// Get Section
		switch ( $tab ){
			case 'general' :
                            locate_template('/includes/admin/options/options-general.php', true);
                            $eewee_settings = eewee_get_general_settings();
                            break;
			case 'carousel' :
                            locate_template('/includes/admin/options/options-carousel.php', true);
                            $eewee_settings = eewee_get_carousel_settings();
                            break;
			case 'colors' :
                            locate_template('/includes/admin/options/options-colors.php', true);
                            $eewee_settings = eewee_get_colors_settings();
                            break;
			case 'fonts' :
                            locate_template('/includes/admin/options/options-fonts.php', true);
                            $eewee_settings = eewee_get_fonts_settings();
                            break;
			case 'about' :
                            locate_template('/includes/admin/options/options-about.php', true);
                            $eewee_settings = eewee_get_about_settings();
                            break;
			case 'slider' :
                            locate_template('/includes/admin/options/options-slider.php', true);
                            $eewee_settings = eewee_get_slider_settings();
                            break;
			case 'social' :
                            locate_template('/includes/admin/options/options-social.php', true);
                            $eewee_settings = eewee_get_social_settings();
                            break;
                        case 'address' :
                            locate_template('/includes/admin/options/options-address.php', true);
                            $eewee_settings = eewee_get_address_settings();
                            break;
			default :
                            locate_template('/includes/admin/options/options-general.php', true);
                            $eewee_settings = eewee_get_general_settings();
                }// switch
		
		return $eewee_settings;
	}
	

	// Add Scripts and CSS for themeeewee Options Panel	
	add_action('admin_enqueue_scripts', 'eewee_admin_head');
	function eewee_admin_head() { 
            if ( isset($_GET['page']) and $_GET['page'] == 'themeeewee' ){
                wp_register_style('eewee_admin_css', get_template_directory_uri() .'/includes/admin/admin-style.css');
                wp_enqueue_style( 'eewee_admin_css');

                wp_register_style('eewee_colorpicker_css', get_template_directory_uri().'/includes/admin/colorpicker/colorpicker.css');
                wp_enqueue_style( 'eewee_colorpicker_css');

                wp_register_script('eewee_colorpicker_js', get_template_directory_uri() .'/includes/admin/colorpicker/colorpicker.js', false);
                wp_enqueue_script('eewee_colorpicker_js');

                wp_register_script('eewee_eye', get_template_directory_uri() .'/includes/admin/colorpicker/eye.js', array('eewee_colorpicker_js'));
                wp_enqueue_script('eewee_eye');

                wp_register_script('eewee_utils', get_template_directory_uri() .'/includes/admin/colorpicker/utils.js', array('eewee_eye'));
                wp_enqueue_script('eewee_utils');

                wp_register_script('eewee_mycolorpicker', get_template_directory_uri() .'/includes/admin/colorpicker/mycolorpicker.js', array('eewee_utils'));
                wp_enqueue_script('eewee_mycolorpicker');

                wp_enqueue_script('media-upload');
                wp_enqueue_script('thickbox');

                wp_register_script('eewee_image_upload', get_template_directory_uri() .'/includes/admin/jquery-image-upload.js', array('jquery','media-upload','thickbox'));
                wp_localize_script('eewee_image_upload', 'eewee_localizing_upload_js', array(
                        'use_this_image' => __('Use this Image', 'eewee-bt')
                ));

                wp_enqueue_script('eewee_image_upload');
                wp_enqueue_style('thickbox');
            }//if
	}
	
?>