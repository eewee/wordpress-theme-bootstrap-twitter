<?php
	
	function eewee_get_general_sections() {
		$eewee_sections = array();
		
		$eewee_sections[] = array("id" => "eewee_general_layout",
					"name" => __('Layout Settings', 'eewee-bt'));
					
		return $eewee_sections;
	}
	
	function eewee_get_general_settings() {

		$eewee_settings = array();
	
		### GENERAL SETTINGS
		#######################################################################################
		$eewee_settings[] = array("name" => "Logo",
						"desc" => __('Paste the full Image URL of your logo.', 'eewee-bt'),
						"id" => "eewee_general_logo",
						"std" => "",
						"type" => "image",
						"section" => "eewee_general_layout");	
		
                $eewee_settings[] = array("name" => __('Layout Options', 'eewee-bt'),
						"desc" => "",
						"id" => "eewee_general_sizepage",
						"std" => 'fixe1',
						"type" => "radio",
						'choices' => array(
									'fixe1' => __('Fixed page size (standard)', 'eewee-bt'),
									'fixe2' => __('Fixed page size (large)', 'eewee-bt'),
									'fixe3' => __('Fixed page size (medium)', 'eewee-bt'),
									'fixe4' => __('Fixed page size (small)', 'eewee-bt'),
									'full' => __('Full screen', 'eewee-bt')),
						"section" => "eewee_general_layout"
						);
                
		/*				
		$eewee_settings[] = array("name" => __('Footer Content', 'eewee_lang'),
						"desc" => __('Enter here the content which is displayed in the footer.', 'eewee-bt'),
						"id" => "eewee_general_footer",
						"std" => "Place your Footer Content here",
						"type" => "html",
						"section" => "eewee_general_layout");
						
		$eewee_settings[] = array("name" => __('Custom CSS', 'eewee_lang'),
						"desc" => __('Place your Custom CSS code here.', 'eewee-bt'),
						"id" => "eewee_general_css",
						"std" => "",
						"type" => "textarea",
						"section" => "eewee_general_layout");
		*/				
		return $eewee_settings;
	}

?>