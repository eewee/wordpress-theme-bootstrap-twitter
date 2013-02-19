<?php
	
	function eewee_get_social_sections() {
		$eewee_sections = array();

		$eewee_sections[] = array("id" => "eewee_buttons",
					"name" => __('Social Media Buttons', 'eewee-bt'));
					
		return $eewee_sections;
	}
	
	function eewee_get_social_settings() {
		
		$eewee_settings = array();
		
		### SOCIALMEDIA BUTTONS SETTINGS
		#######################################################################################
						
		$eewee_settings[] = array("name" => "Twitter",
						"desc" => __('Enter the URL to your Twitter Profile here.', 'eewee-bt'),
						"id" => "eewee_social_twitter",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Facebook",
						"desc" => __('Enter the URL to your Facebook Profile here.', 'eewee-bt'),
						"id" => "eewee_social_facebook",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Google+",
						"desc" => __('Enter the URL to your Google+ profile.', 'eewee-bt'),
						"id" => "eewee_social_googleplus",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Pinterest",
						"desc" => __('Enter the URL to your Pinterest profile.', 'eewee-bt'),
						"id" => "eewee_social_pinterest",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "LinkedIn",
						"desc" => __('Enter the URL to your LinkedIn Profile here.', 'eewee-bt'),
						"id" => "eewee_social_linkedin",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");	
						
		$eewee_settings[] = array("name" => "Xing",
						"desc" => __('Enter the URL to your Xing Profile here.', 'eewee-bt'),
						"id" => "eewee_social_xing",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "MySpace",
						"desc" => __('Enter the URL to your MySpace Profile here.', 'eewee-bt'),
						"id" => "eewee_social_myspace",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");	
						
		$eewee_settings[] = array("name" => "Blogger",
						"desc" => __('Enter the URL to your Blogger Profile here.', 'eewee-bt'),
						"id" => "eewee_social_blogger",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");	
						
		$eewee_settings[] = array("name" => "Tumblr",
						"desc" => __('Enter the URL to your Tumblr Blog here.', 'eewee-bt'),
						"id" => "eewee_social_tumblr",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Typepad",
						"desc" => __('Enter the URL to your Typepad Blog here.', 'eewee-bt'),
						"id" => "eewee_social_typepad",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Wordpress",
						"desc" => __('Enter the URL to your Wordpress.com Blog here.', 'eewee-bt'),
						"id" => "eewee_social_wordpress",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Gowalla",
						"desc" => __('Enter the URL to your Gowalla Profile here.', 'eewee-bt'),
						"id" => "eewee_social_gowalla",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Flickr",
						"desc" => __('Enter the URL to your Flickr Profile here.', 'eewee-bt'),
						"id" => "eewee_social_flickr",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
					
		$eewee_settings[] = array("name" => "Soundcloud",
						"desc" => __('Enter the URL to your Soundcloud Profile here.', 'eewee-bt'),
						"id" => "eewee_social_soundcloud",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Spotify",
						"desc" => __('Enter the URL to your Spotify Profile here.', 'eewee-bt'),
						"id" => "eewee_social_spotify",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Last.fm",
						"desc" => __('Enter the URL to your Last.fm Profile here.', 'eewee-bt'),
						"id" => "eewee_social_lastfm",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Youtube",
						"desc" => __('Enter the URL to your Youtube Profile here.', 'eewee-bt'),
						"id" => "eewee_social_youtube",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Vimeo",
						"desc" => __('Enter the URL to your Vimeo Profile here.', 'eewee-bt'),
						"id" => "eewee_social_vimeo",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "DeviantART",
						"desc" => __('Enter the URL to your DeviantART Profile here.', 'eewee-bt'),
						"id" => "eewee_social_deviantart",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Dribbble",
						"desc" => __('Enter the URL to your Dribbble Profile here.', 'eewee-bt'),
						"id" => "eewee_social_dribbble",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
		
		$eewee_settings[] = array("name" => "Delicious",
						"desc" => __('Enter the URL to your Delicious Profile here.', 'eewee-bt'),
						"id" => "eewee_social_delicious",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Digg",
						"desc" => __('Enter the URL to your Digg Profile here.', 'eewee-bt'),
						"id" => "eewee_social_digg",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Reddit",
						"desc" => __('Enter the URL to your Reddit Profile here.', 'eewee-bt'),
						"id" => "eewee_social_reddit",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "StumpleUpon",
						"desc" => __('Enter the URL to your StumpleUpon Profile here.', 'eewee-bt'),
						"id" => "eewee_social_stumbleupon",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "RSS URL",
						"desc" => __('Enter your RSS URL (e.g. Feedburner Feed) here.', 'eewee-bt'),
						"id" => "eewee_social_rss",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Email",
						"desc" => __('Enter your Email URL (e.g. Feedburner Email Subscription) here.', 'eewee-bt'),
						"id" => "eewee_social_email",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Friendfeed",
						"desc" => __('Enter the URL to your Friendfeed Profile here.', 'eewee-bt'),
						"id" => "eewee_social_friendfeed",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		$eewee_settings[] = array("name" => "Skype",
						"desc" => __('Enter your Skype Contact here.', 'eewee-bt'),
						"id" => "eewee_social_skype",
						"std" => "",
						"type" => "text",
						"section" => "eewee_buttons");
						
		return $eewee_settings;
	}

?>