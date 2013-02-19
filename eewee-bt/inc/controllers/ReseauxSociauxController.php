<?php 
//namespace FrEeweeThemeEeweeBtReseauxSociauxController;
//if( !class_exists(ReseauxSociauxController)){
	class ReseauxSociauxController{
		/*
		public $tbl_reseauxSociaux = array(
			"facebook"	=> array(
				"img_small"		=> "facebook_s.png",
				"img_medium"	=> "facebook_m.png",
				"img_big"		=> "facebook_b.png",
				"url"			=> RS_URL_FACEBOOK
			),
			"twitter"	=> array(
				"img_small"		=> "twitter_s.png",
				"img_medium"	=> "twitter_m.png",
				"img_big"		=> "twitter_b.png",
				"url"			=> RS_URL_TWITTER
			),
			"flickr"	=> array(
				"img_small"		=> "flickr_s.png",
				"img_medium"	=> "flickr_m.png",
				"img_big"		=> "flickr_b.png",
				"url"			=> RS_URL_FLICKR
			)
		);
		*/
            
		/**
		 * 
		 * init
		 * @param string $typeRs fb, tw
		 */
		public function __construct($typeRs=""){
			if( $typeRs == "fb" ){
				add_action( 'wp_footer', array($this, 'fbSdkJs') );
			}
		}
		
		/**
		 * 
		 * twitter : widget profil
		 * SOURCE : http://www.presse-citron.net/10-facons-dintegrer-twitter-dans-un-site-ou-un-blog
		 * SOURCE : http://twitter.com/about/resources/widgets
		 * SOURCE : http://twitter.com/about/resources/widgets/widget_profile
                 * @param string $user (ex:http://twitter.com/michaeldumontet)
                 * @param int $qty
                 * @param string $w
                 * @param string $h
                 * @param string $themeBg
                 * @param string $themeCo
                 * @param string $tweetsBg
                 * @param string $tweetsCo
                 * @param string $tweetsLi
		 */
		public function twWidgetProfil($user='', $qty='10', $w='auto', $h='320', $themeBg='01488e', $themeCo='ffffff', $tweetsBg='ffffff', $tweetsCo='000000', $tweetsLi='08C'){
                        $options = get_option('eewee_options');
                        $user = str_replace( "http://", "", $options['eewee_social_twitter'] );
                        $user = str_replace( "www.", "", $user );
                        $user = str_replace( "twitter.com", "", $user );
                        $user = str_replace( "/", "", $user );
                        $user = str_replace( "!", "", $user );
                        $user = str_replace( "#", "", $user );

                        if( !empty($user) ){
                            return "
                            <script charset='utf-8' src='http://widgets.twimg.com/j/2/widget.js'></script>
                            <script>
                            new TWTR.Widget({
                              version: 2,
                              type: 'profile',
                              rpp: '".$qty."',
                              interval: 30000,
                              width: '".$w."',
                              height: '".$h."',
                              theme: {
                                shell: {
                                  background: '#".$themeBg."',
                                  color: '#".$themeCo."'
                                },
                                tweets: {
                                  background: '#".$tweetsBg."',
                                  color: '#".$tweetsCo."',
                                  links: '#".$tweetsLi."'
                                }
                              },
                              features: {
                                scrollbar: true,
                                loop: false,
                                live: true,
                                behavior: 'all'
                              }
                            }).render().setUser('".$user."').start();
                            </script>";
                        }
		}
		
	   /**
		*  Source : www.twitter.com/widgets
		*/
		public function getTwitter($name='michaeldumontet', $id='252776483901276161'){
			return '
			<a class="twitter-timeline" href="https://twitter.com/'.$name.'" data-widget-id="'.$id.'">Tweets de @'.$name.'</a>
		    	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		}
		
		/**
		 * 
		 * addthis : inclusion de btn facebook & twitter
		 */
		public function addthis($style=''){
			switch( $style ){
				case 1 :
					$a = '
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_pinterest_pinit"></a>
					<a class="addthis_counter addthis_pill_style"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502e537211945a40"></script>
					<!-- AddThis Button END -->
					';
					break;
					
				case 2 :
					$a = '
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					<a class="addthis_counter addthis_bubble_style"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502e54a22284fbfd"></script>
					<!-- AddThis Button END -->
					';
					break;	
					
				case 3 :
					$a = '
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					<a class="addthis_counter addthis_bubble_style"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502e54be6f687682"></script>
					<!-- AddThis Button END -->
					';
					break;

				case 4 :
					$a = '
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_floating_style addthis_counter_style" style="left:50px;top:50px;">
					<a class="addthis_button_facebook_like" fb:like:layout="box_count"></a>
					<a class="addthis_button_tweet" tw:count="vertical"></a>
					<a class="addthis_button_google_plusone" g:plusone:size="tall"></a>
					<a class="addthis_counter"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502e54e73e497699"></script>
					<!-- AddThis Button END -->
					';
					break;	

				case 5 :
					$a = '
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_floating_style addthis_32x32_style" style="left:50px;top:50px;">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502e550b3542b598"></script>
					<!-- AddThis Button END -->
					';
					break;	

				case 6 :
					$a = '
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_floating_style addthis_16x16_style" style="left:50px;top:50px;">
					<a class="addthis_button_preferred_1"></a>
					<a class="addthis_button_preferred_2"></a>
					<a class="addthis_button_preferred_3"></a>
					<a class="addthis_button_preferred_4"></a>
					<a class="addthis_button_compact"></a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502e552155e213ba"></script>
					<!-- AddThis Button END -->
					';
					break;

				default :
					$a = '
					<!-- AddThis Button BEGIN -->
					<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-502e553a6b623739"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502e553a6b623739"></script>
					<!-- AddThis Button END -->
					';
					
			}
			return $a;
		}
		
		/**
		 * fb : inclusion de la lib facebook
		 */
		public function fbSdkJs(){
			?>
			<!-- BEGIN - FACEBOOK -->
			<div id='fb-root'></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = '//connect.facebook.net/fr_FR/all.js#xfbml=1';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<!-- END - FACEBOOK -->
			<?php
		}
		
		/**
		 * fb : comments
		 */
		public function fbComments(){
			return '<div class="fb-comments" data-href="http://www.eewee.fr" data-num-posts="2" data-width="600"></div>';
		}
		
                /**
		 * fb : Like Box
                 * @param string $namePage (ex: http://www.facebook.com/eeweefr)
                 * @param int $w
                 * @param int $h
                 * @param bool $showfaces
                 * @param bool $stream
                 * @param bool $header
                 * @return string 
                 */
		public function fbLikeBox($namePage='', $w='auto', $h='410', $showfaces='true', $stream='true', $header='false'){
                    $options = get_option('eewee_options');
                    $namePage = $options['eewee_social_facebook'];
                    
                    if( !empty($namePage) ){
			return '<div class="fb-like-box" data-href="'.$namePage.'" data-width="'.$w.'" data-height="'.$h.'" data-show-faces="'.$showfaces.'" data-stream="'.$stream.'" data-header="'.$header.'"></div>';
                    }
		}
		
	}//fin class
//}//fin if