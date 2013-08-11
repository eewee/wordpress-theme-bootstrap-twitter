<?php 
//namespace FrEeweeThemeEeweeBtShortcodeController;
//if( !class_exists(ShortcodeController)){
	class ShortcodeController{
		
		public function __construct(){
			$this->initAction();
		}
		
		/**
		 * init des shortcodes
		 */
		public function initAction(){
                    add_shortcode('eewee-alert',    array($this, 'eewee_shortcode_alert'));
                    add_shortcode('eewee-btn',      array($this, 'eewee_shortcode_btn'));
                    add_shortcode('eewee-img',      array($this, 'eewee_shortcode_img'));
                    add_shortcode('eewee-color',    array($this, 'eewee_shortcode_color'));
                    add_shortcode('eewee-bq',       array($this, 'eewee_shortcode_blockquote'));
                    add_shortcode('eewee-dl',       array($this, 'eewee_shortcode_description_dl'));
                    add_shortcode('eewee-dt',       array($this, 'eewee_shortcode_description_dt'));
                    add_shortcode('eewee-dd',       array($this, 'eewee_shortcode_description_dd'));
                    add_shortcode('eewee-col',      array($this, 'eewee_shortcode_col'));
                    add_shortcode('eewee-post',     array($this, 'eewee_shortcode_post')); 
                    add_shortcode('eewee-carousel', array($this, 'eewee_shortcode_carousel'));
		}
		
                /**
		 * Button
		 * @param x $atts
		 */
		public function eewee_shortcode_alert( $atts='', $content=null ){
                    extract(shortcode_atts(array(
                    'type' => 'block',  // block, error, success, info
                    'title'=> '',       // title H4
                    'mess' => ''        // message
                    ), $atts));


                    $a = '
                    <div class="alert alert-'.esc_attr($type).'">
                        <button type="button" class="close" data-dismiss="alert">x</button>';
                    
                        if( !empty($title) ){ $a .= '<h4>'.esc_attr($title).'</h4>'; }
                        if( !empty($mess) ){ $a .= esc_attr($mess); }
                        if( !empty($content) ){ $a .= esc_attr($content); }

                    $a .= '
                    </div>';

                    return $a;
                }
                
                /**
		 * Button
		 * @param x $atts
		 */
		public function eewee_shortcode_btn( $atts='', $content=null ){
                    extract(shortcode_atts(array(
                    'type' => '',           // nothing, primary, info, success, warning, danger, inverse, link
                    'size'=> 'small',       // large, small, mini
                    'block' => 'n',         // y : yes, n : no
                    'mess' => 'button'      // message
                    ), $atts));

                    if( !empty($type) ){ $typeCustom = "btn-".esc_attr($type); }
                    if( !empty($size) ){ $sizeCustom = "btn-".esc_attr($size); }
                    if( !empty($block) ){ $blockCustom = "btn-".esc_attr($block); }

                    $a = '
                    <button class="btn '.$typeCustom.' '.$sizeCustom.' '.$blockCustom.'" type="button">';
                    
                        if( !empty($mess) ){ $a .= esc_attr($mess); }
                        if( !empty($content) ){ $a .= esc_attr($content); }

                    $a .= '
                    </button>';

                    return $a;
                }
                
                /**
		 * Image
		 * @param x $atts
		 */
		public function eewee_shortcode_img( $atts='', $content=null ){
                    extract(shortcode_atts(array(
                    'type' => 'rounded',    // rounded, circle, polaroid
                    'url' => ''             // url of your image
                    ), $atts));

                    
                    $a = '<img src="'.esc_attr($url).'" class="img-'.esc_attr($type).'">';
                    
                    return $a;
                }
                
                /**
		 * Text color
		 * @param x $atts
		 */
		public function eewee_shortcode_color( $atts='', $content=null ){
                    extract(shortcode_atts(array(
                    'type' => 'muted',    // muted, warning, error, info, success
                    'mess' => ''          // message
                    ), $atts));

                    if( $type != "muted" && !empty($type) ){ $typeCustom = "text-".esc_attr($type); }
                    else{ $typeCustom = $type; }
                    
                    $a = '<p class="'.esc_attr($typeCustom).'">'.esc_attr($mess).'</p>';
                    
                    return $a;
                }
                
                /**
		 * Blockquote
		 * @param x $atts
		 */
		public function eewee_shortcode_blockquote( $atts='', $content=null ){
                    extract(shortcode_atts(array(
                    'mess'      => '',          // message big
                    'mess2'     => '',          // message small
                    'cite'      => '',          // citation
                    'position'  => ''           // left, right
                    ), $atts));

                    
                    if( !empty($mess2) ){ 
                        if( !empty($cite) ){ $cite = '<cite title="'.esc_attr($cite).'">'.esc_attr($cite).'</cite>'; }
                        $mess2 = "<small>".esc_attr($mess2)." ".$cite."</small>";
                    }
                    if( !empty($position) ){ 
                        $position = "pull-".esc_attr($position);
                    }

                    
                    $a = '
                    <blockquote class="'.$position.'">
                        <p>'.esc_attr($mess).'</p>
                        '.$mess2.'
                    </blockquote>';
                    
                    return $a;
                }
                
                /**
		 * Description list
		 * @param x $atts
		 */
		public function eewee_shortcode_description_dl( $atts='', $content=null ){
                    extract(shortcode_atts(array(
                    'position'  => ''           // horizontal
                    ), $atts));
                    
                    if( empty($position) ){
                        $position = "";
                    }else{
                        $position = "dl-horizontal";
                    }
                    
                    $a = '<dl class="'.$position.'">'.do_shortcode($content).'</dl>';
                    return $a;
                }
                public function eewee_shortcode_description_dt( $atts='', $content=null ){
                    if( !empty($atts['mess']) ){ $c = $atts['mess']; }
                    else{ $c = $content; }
                    $a = '<dt>'.$c."</dt>";
                    return $a;
                }
                public function eewee_shortcode_description_dd( $atts='', $content=null ){
                    if( !empty($atts['mess']) ){ $c = $atts['mess']; }
                    else{ $c = $content; }
                    $a = '<dd>'.$c."</dd>";
                    return $a;
                }
                
                
                
                
                
                
                
                
                
                
                /**
		 * Colonne
		 * @param x $atts
		 */
		public function eewee_shortcode_col( $atts='', $content=null ){
                    extract(shortcode_atts(array(
                    'f'   => 'fluid',
                    'numcol'  => '',
                    'pos' => '' // start, end, last
                    ), $atts));
                    
                    $a = $div = "";
                    
                    if( $f == "fluid" ){ $f = '-fluid'; }
                    if( !empty($numcol) ){ $div = '<div class="span'.$numcol.'">'; }

                    if( $pos == "start" ){ $a = '<div class="row'.$f.'">'; }
                        $a .= $div;
                            $a .= $content;
                        $a .= "</div>";
                    if( $pos == "last" ){ $a .= '</div>'; }
                    
                    return $a;
                }
                
                
                
                
                
                
                
                
		/**
		 * Choose : tab or accordion
		 * @param x $atts
		 */
		public function eewee_shortcode_post( $atts='' ){
			extract(shortcode_atts(array(
                'type' => '',
                'categ' => '',
                'qty' => '3',
                'w' => '',
                'open' => 'y'
	        ), $atts));
			
			switch( $type ){
				case "tab" :
					$args = array(
						"type"	=> $type,
						"categ"	=> $categ,
						"qty"	=> $qty,
						"w"		=> $w
					);
					
					echo $this->eewee_shortcode_post_tab($args);
					break;
					
				case "accordion" :
					$args = array(
						"type"	=> $type,
						"categ"	=> $categ,
						"qty"	=> $qty,
						"w"		=> $w,
						"open"	=> $open
					);
						
					echo $this->eewee_shortcode_post_accordion($args);
					break;
			}
		}
		
		/**
		 * Tab system
		 * @param x $atts
		 */
		public function eewee_shortcode_post_tab( $tbl ){
			extract($tbl);
	
			$tools = new ToolsController();
			
			// init categ
			$args = array();
			if( !empty($categ) ){
				$args['include'] = $categ;
			}
			
			// recup les categ d'article pour la home
			$t_post = new TPost();
			$liste_categs	= $t_post->getCategList( $args );
			
			// tab
			$d = '
			<ul class="nav nav-tabs" id="myTab">';
			
				foreach( $liste_categs as $liste_categ ){
					$d .= '<li><a href="#'.$liste_categ->slug.'">'.$liste_categ->name.'</a></li>';
				}

			$d .= '
			</ul>';
			
			// content
			$d .= '			
			<div class="tab-content">';
			
				// init post
				$args = array();
				if( !empty($qty) ){
					$args['numberposts'] = $qty;
				}
			
				foreach( $liste_categs as $liste_categ ){
					$d .= '<div class="tab-pane" id="'.$liste_categ->slug.'">';
					
					$args['category'] = $liste_categ->cat_ID;
					$actus = $t_post->getPosts( $args );
					
					foreach( $actus as $actu ){
						$d .= " 
						<div class='row-fluid'>
							<div class='span2'>";
						
                                                                $thumbnail = get_the_post_thumbnail( 
									$actu->ID,
									array(200,150),
									array(
										'class'=>'img-rounded pull-left post-tab-marge-img',
										'alt'	=> trim(strip_tags( $actu->post_excerpt )),
										'title'	=> trim(strip_tags( $actu->post_title ))
									)
								);
								if( empty( $thumbnail ) ){
									$d .= "";
								}else{
									$d .= "<a href='".get_permalink($actu->ID)."'>".$thumbnail."</a>";
								}
                                                                
							$d .= " 
							</div>
							<div class='span10'>";
									
								$d .= "
								<div class='addthis_toolbox addthis_default_style pull-left' style='width:200px;>
								<a class='addthis_button_preferred_1'></a>
								<a class='addthis_button_preferred_2'></a>
								<a class='addthis_button_preferred_3'></a>
								<a class='addthis_button_preferred_4'></a>
								<a class='addthis_button_compact'></a>
								<a class='addthis_counter addthis_bubble_style'></a>
								</div>
								<script type='text/javascript' src='http://s7.addthis.com/js/300/addthis_widget.js'></script>
								<br />";
								
								$d .= "
								<h3>".$actu->post_title."</h3>
								".$tools->getContentLimit($actu->post_content, 300)."
								<br />
								<a href='".get_permalink($actu->ID)."' class='btn btn-mini btn-info'>".__("Read more", "eewee-bt")."...</a><br />
								<br />";
								
							$d .= " 
							</div>
						</div>";
					}
					
					$d .= '</div>';
				}
			
			$d .= '
			</div>';
			
			$d .= '
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(document).ready(function() {
						$("#myTab a").click(function (e) {
						  e.preventDefault();
						  $(this).tab("show");
						});
						
						$("#myTab a:first").tab("show");
					});
				 });
			</script>';
			
			// BASE STRUCTURE
			/*$d = '
			<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#home">Home</a></li>
			<li><a href="#profile">Profile</a></li>
			<li><a href="#messages">Messages</a></li>
			<li><a href="#settings">Settings</a></li>
			</ul>
			
			<div class="tab-content">
			<div class="tab-pane active" id="home">xxx</div>
			<div class="tab-pane" id="profile">aaa</div>
			<div class="tab-pane" id="messages">bbb</div>
			<div class="tab-pane" id="settings">ccc</div>
			</div>
			
			<script type="text/javascript">
			jQuery(document).ready(function($) {
			$(document).ready(function() {
			$("#myTab a").click(function (e) {
			e.preventDefault();
			$(this).tab("show");
			});
			
			$("#myTab a:first").tab("show");
			});
			});
			</script>';*/
			
                        return $d;
		}
		
		
		/**
		* Accordion system
		* @param x $atts
		*/
		public function eewee_shortcode_post_accordion( $tbl ){
			extract($tbl);
			$d = "";
			$tools = new ToolsController();
				
			// init categ
			$args = array();
			if( !empty($categ) ){
				$args['include'] = $categ;
			}
				
			// recup les categ d'article pour la home
			$t_post = new TPost();
			$liste_categs	= $t_post->getCategList( $args );
				
			$d .= '
			<div class="accordion" id="accordion2">';
				
			// init post
			$args = array();
			if( !empty($qty) ){
				$args['numberposts'] = $qty;
			}
			$i=0;
			foreach( $liste_categs as $liste_categ ){
				$openYN = "";
				if( $i == 0 && $open == "y" ){
					$openYN = "in";
					$i++;
				}
				
				if( $w <= 0 || $w > 100 ){
					$width = "style='width:100%'";
				}elseif( !empty( $w ) ){
					$width = "style='width:".$w."%'";
				}
				
				$d .= '
				<div class="accordion-group" '.$width.'>';
				
					$d .= '
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent= "#accordion2"  href= "#'.$liste_categ->cat_ID.'" >
							'.$liste_categ->name.'
						</a>
					</div>';
					
					$args['category'] = $liste_categ->cat_ID;
					$actus = $t_post->getPosts( $args );
						
					$d .= '
					<div id="'.$liste_categ->cat_ID.'" class="accordion-body collapse '.$openYN.'">
						<div class="accordion-inner">';
					
							foreach( $actus as $actu ){
		
                                                            $d .= " 
                                                            <div class='row-fluid'>
                                                                    <div class='span2'>";
                                                            
										$thumbnail = get_the_post_thumbnail(
											$actu->ID,
											array(200,150),
											array(
												'class'=>'img-rounded pull-left post-tab-marge-img',
												'alt'	=> trim(strip_tags( $actu->post_excerpt )),
												'title'	=> trim(strip_tags( $actu->post_title ))
											)
										);
										if( empty( $thumbnail ) ){
											$d .= "";
										}else{
											$d .= "<a href='".get_permalink($actu->ID)."'>".$thumbnail."</a>";
										}
                                                                    $d .= " 
                                                                    </div>
                                                                    <div class='span10'>";
                                                                    
										$d .= "
										<div class='addthis_toolbox addthis_default_style pull-left' style='width:200px;>
										<a class='addthis_button_preferred_1'></a>
										<a class='addthis_button_preferred_2'></a>
										<a class='addthis_button_preferred_3'></a>
										<a class='addthis_button_preferred_4'></a>
										<a class='addthis_button_compact'></a>
										<a class='addthis_counter addthis_bubble_style'></a>
										</div>
										<script type='text/javascript' src='http://s7.addthis.com/js/300/addthis_widget.js'></script>
										<br />";
										
										$d .= "
										<h3>".$actu->post_title."</h3>
										".$tools->getContentLimit($actu->post_content, 300)."
										<br />
										<a href='".get_permalink($actu->ID)."' class='btn btn-mini btn-info'>".__("Read more", "eewee-bt")."...</a><br />
										<br />
                                                                                <div class='clearfix'></div>";
                                                                    
                                                                    $d .= " 
                                                                    </div>
                                                            </div>";                
								
							}//foreach
											
						$d .= '
						</div>
					</div>';
					
					
				$d .= '
				</div>';
			
			}//foreach		
			
			// Base structure
			/*
			$d = '
			<div class="accordion" id="accordion2">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent= "#accordion2"  href= "#collapseOne" >
							Collapsible Group Item #1 
						</a>
					</div>
					<div id="collapseOne" class="accordion-body collapse in">
						<div class="accordion-inner">
							Anim pariatur cliche...
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent= "#accordion2"  href= "#collapseTwo" >
							Collapsible Group Item #1 
						</a>
					</div>
					<div id="collapseTwo" class="accordion-body collapse">
						<div class="accordion-inner">
							Anim pariatur cliche...
						</div>
					</div>
				</div>
			</div>
			';
			*/
			
			return $d;
		}
                
                
                
                /**
		 * Colonne
		 * @param x $atts
		 */
		public function eewee_shortcode_carousel( $atts='' ){
                    extract(shortcode_atts(array(
                    'a'   => '',
                    ), $atts));
                    
                    $options = get_option('eewee_options');
                    //echo "enabled : ".$options['eewee_carousel_enabled']."<hr />";
                    if( $options['eewee_carousel_enabled'] == "true" ){
                        if( $options['eewee_carousel_qty'] > 0 ){
                            $qty = $options['eewee_carousel_qty'];
                        }else{
                            $qty = 10;
                        }
                        ?>

                        <script type="text/javascript">
                            jQuery(document).ready(function() {
                                jQuery('.carousel').carousel({
                                    interval: 4000,
                                    pause: 'hover'
                                })
                            });
                        </script>
                        
                        <?php
                        $a = '
                        <div id="myCarousel" class="carousel slide">';
                            /*
                            <ol class="carousel-indicators">';
                        
                                for( $i=1 ; $i<=$qty ; $i++ ){
                                    if( $i==1 ){
                                        $active = 'active';
                                    }else{
                                        $active = '';
                                    }
                                    $a .= '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.$active.'"></li>';
                                }
                            $a .= '</ol>';
                            */
                        
                            $a .= '
                            <!-- Carousel items -->
                            <div class="carousel-inner">';

                                for( $i=1 ; $i<=$qty ; $i++ ){

                                    if( $i==1 ){
                                        $active = 'active';
                                    }else{
                                        $active = '';
                                    }

                                    $a .= '
                                    <div class="'.$active.' item">
                                        <img src="'.$options['eewee_carousel_img_'.$i].'" />';

                                        if( 
                                            !empty($options['eewee_carousel_title_'.$i]) ||
                                            !empty($options['eewee_carousel_desc_'.$i])
                                        ){
                                            $a .= '
                                            <div class="carousel-caption">
                                                <h1>'.$options['eewee_carousel_title_'.$i].'</h1>
                                                <p>'.$options['eewee_carousel_desc_'.$i].'</p>';
                                            
                                                if( !empty($options['eewee_carousel_url_'.$i]) ){
                                                    $a .= '
                                                    <p>
                                                        <a href="'.$options['eewee_carousel_url_'.$i].'" class="btn btn-primary">
                                                            '.__("Read more", "eewee-bt").'...
                                                        </a>
                                                    </p>';
                                                }
                                            
                                            $a .= '
                                            </div>';
                                        }
                                        
                                    $a .= '
                                    </div>';
                                }// for 

    //                            $a .= '
    //                            <div class="item"><img src="http://lorempixel.com/1000/300/sports/1" /></div>
    //                            <div class="item"><img src="http://lorempixel.com/1000/300/sports/2" /></div>
    //                            <div class="item"><img src="http://lorempixel.com/1000/300/sports/3" /></div>';

                            $a .= '
                            </div>

                            <!-- Carousel nav -->
                            <a class="carousel-control left" href= "#myCarousel"  data-slide="prev">&lsaquo;</a>
                            <a class="carousel-control right" href= "#myCarousel"  data-slide="next">&rsaquo;</a>
                        </div>';
                        return $a;
                    }else{
                        return "";
                    }
               }
	
	}//fin class
//}//fin if