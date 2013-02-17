<?php

    // Add addthis Shortcode
    add_shortcode('eewee_addthis', 'themeeewee_shortcode_addthis_function');
    function themeeewee_shortcode_addthis_function($atts, $content = null) {

        extract(shortcode_atts(array(
                'type' => '',
                'position' => 'here',
        		'pubid' => ''
        ), $atts));

        switch( $type ){
            case "horiz1" :
                $d = '
				<div class="addthis_toolbox addthis_default_style ">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_pinterest_pinit"></a>
				<a class="addthis_counter addthis_pill_style"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid='.idAddthis.'"></script>
                ';
                break;
                
            case "horiz2" :
                $d = '
				<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid='.idAddthis.'"></script>
                ';
                break;
            
            case "horiz3" :
                $d = '
				<div class="addthis_toolbox addthis_default_style ">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid='.idAddthis.'"></script>
                ';
                break;
           
            case "vert1" :
                $d = '
				<div class="addthis_toolbox addthis_floating_style addthis_counter_style" style="left:50px;top:50px;">
				<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
				<a class="addthis_button_tweet" tw:count="vertical"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
				<a class="addthis_counter"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid='.idAddthis.'"></script>
                ';
                break;
            
            case "vert2" :
                $d = '
				<div class="addthis_toolbox addthis_floating_style addthis_32x32_style" style="left:50px;top:50px;">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid='.idAddthis.'"></script>
                ';
                break;
            
            case "vert3" :
                $d = '
				<div class="addthis_toolbox addthis_floating_style addthis_16x16_style" style="left:50px;top:50px;">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid='.idAddthis.'"></script>
                ';
                break;
            
            case "horizf1" :
            	$d = '
				<p>Follow Us</p>
				<div class="addthis_toolbox addthis_32x32_style addthis_default_style">
				<a class="addthis_button_facebook_follow" addthis:userid="YOUR-PROFILE"></a>
				<a class="addthis_button_twitter_follow" addthis:userid="YOUR-USERNAME"></a>
				<a class="addthis_button_linkedin_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_google_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_youtube_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_flickr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_vimeo_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_pinterest_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_instagram_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_foursquare_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_tumblr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_rss_follow" addthis:url="http://xxx"></a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=dumontetmichael"></script>
            	';
            	break;
            	
           	case "horizf2" :
           		$d = '
				<p>Follow Us</p>
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_follow" addthis:userid="YOUR-PROFILE"></a>
				<a class="addthis_button_twitter_follow" addthis:userid="YOUR-USERNAME"></a>
				<a class="addthis_button_linkedin_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_google_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_youtube_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_flickr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_vimeo_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_pinterest_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_instagram_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_foursquare_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_tumblr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_rss_follow" addthis:url="http://xxx"></a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=dumontetmichael"></script>
           		';
           		break;
                
          	case "vertf1" :
          		$d = '
				<p>Follow Us</p>
				<div class="addthis_toolbox addthis_32x32_style addthis_vertical_style">
				<a class="addthis_button_facebook_follow" addthis:userid="YOUR-PROFILE"></a>
				<a class="addthis_button_twitter_follow" addthis:userid="YOUR-USERNAME"></a>
				<a class="addthis_button_linkedin_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_google_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_youtube_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_flickr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_vimeo_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_pinterest_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_instagram_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_foursquare_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_tumblr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_rss_follow" addthis:url="http://xxx"></a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=dumontetmichael"></script>
          		';
          		break;
          		
          	case "vertf2" :
          		$d = '
				<p>Follow Us</p>
				<div class="addthis_toolbox addthis_vertical_style">
				<a class="addthis_button_facebook_follow" addthis:userid="YOUR-PROFILE"></a>
				<a class="addthis_button_twitter_follow" addthis:userid="YOUR-USERNAME"></a>
				<a class="addthis_button_linkedin_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_google_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_youtube_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_flickr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_vimeo_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_pinterest_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_instagram_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_foursquare_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_tumblr_follow" addthis:userid="xxx"></a>
				<a class="addthis_button_rss_follow" addthis:url="http://xxx"></a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=dumontetmichael"></script>
          		';
          		break;
           		
            // all
            default : 
                $d = '
				<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=dumontetmichael"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid='.idAddthis.'"></script>
				';
        }
        
        if( $position == "header" ){
			if( !function_exists(themeeewee_shortcode_addthis_header) ){
	        	function themeeewee_shortcode_addthis_header(){
					return "<div class='shortcode_addthis'>xxx".$d."</div>";
				}
			}
			add_action('wp_head', 'themeeewee_shortcode_addthis_header');
        }elseif( $position == "footer" ){
        	
        }elseif( $position == "top_post" ){
        	
        }elseif( $position == "bottom_post" ){
        	
        }else{
        	return "<div class='shortcode_addthis'>".$d."</div>";
        }
    }

    // Include tineMCE plugin
    locate_template('/includes/shortcodes/addthis/tinyMCE/tinyMCE.php', true);

?>