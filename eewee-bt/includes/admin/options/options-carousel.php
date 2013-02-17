<?php
	
	function eewee_get_carousel_sections() {
		$eewee_sections = array();
		
		$eewee_sections[] = array("id" => "eewee_carousel_layout",
					"name" => __('Layout Settings', 'eewee'));
					
		return $eewee_sections;
	}
	
	function eewee_get_carousel_settings() {

		$eewee_settings = array();
	
		### GENERAL SETTINGS
		#######################################################################################
		$options = get_option('eewee_options');
                if( is_numeric($options['eewee_carousel_qty']) ){
                    $qty = $options['eewee_carousel_qty'];
                }else{
                    $qty = 10;
                }
                
                $eewee_settings[] = array("name" => __('Enabled', 'eewee'),
						"desc" => "Active/Desactive carousel",
						"id" => "eewee_carousel_enabled",
						"std" => '',
						"type" => "checkbox",
						"section" => "eewee_carousel_layout"
						);
                
                
                $eewee_settings[] = array("name" => __("Quantity images", "eewee"),
                                                    "desc" => "Leave blank to use the default value (Default:10)",
                                                    "id" => "eewee_carousel_qty",
                                                    "std" => '10',
                                                    "type" => "text",
                                                    "section" => "eewee_carousel_layout"
                                                    );
                
                
                
                for( $i=1 ; $i<=$qty ; $i++ ){
                    $eewee_settings[] = array("name" => __("Image", "eewee")." ".$i,
                                                    "desc" => __('Paste the full Image URL.', 'eewee'),
                                                    "id" => "eewee_carousel_img_".$i,
                                                    "std" => "",
                                                    "type" => "image",
                                                    "section" => "eewee_carousel_layout");	

                    $eewee_settings[] = array("name" => __("Title", "eewee")." ".$i,
                                                    "desc" => "",
                                                    "id" => "eewee_carousel_title_".$i,
                                                    "std" => '',
                                                    "type" => "text",
                                                    "section" => "eewee_carousel_layout"
                                                    );

                    $eewee_settings[] = array("name" => __("Text", "eewee")." ".$i,
                                                    "desc" => __('Description of your image.', 'eewee'),
                                                    "id" => "eewee_carousel_desc_".$i,
                                                    "std" => "",
                                                    "type" => "textarea",
                                                    "section" => "eewee_carousel_layout");
                }
                return $eewee_settings;
	}

?>