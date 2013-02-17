<?php

    // Add post Shortcode
    add_shortcode('eewee_post', 'themeeewee_shortcode_post_function');
    function themeeewee_shortcode_post_function($atts, $content = null) {

        extract(shortcode_atts(array(
                'type' => '',
                'categ' => '',
                'qty' => '3',
                'w' => ''
        ), $atts));

        switch( $type ){
            case "tab" :
				$tools = new ToolsController();
            	
            	// categ
				$args = array();
				if( !empty($categ) ){
					$args['include'] = $categ;
				}
					
				$defaults = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => true );
				$tbl = array_merge($defaults, $args);
				$liste_categs = get_categories( $tbl );

				foreach( $liste_categs as $liste_categ ){
					$defaults = array(
				    'numberposts'     => $qty,
				    'offset'          => 0,
				    'category'        => $liste_categ->term_id,
				    'orderby'         => 'post_date',
				    'order'           => 'DESC',
				    'include'         => '',
				    'exclude'         => '',
				    'meta_key'        => '',
				    'meta_value'      => '',
				    'post_type'       => 'post',
				    'post_mime_type'  => '',
				    'post_parent'     => '',
				    'post_status'     => 'publish' );
					$posts_array[ $liste_categ->slug ] = get_posts( $defaults );
				}//fin foreach
				$actus = $posts_array;
				
				$onglet = '
				<ul class="nav nav-tabs" id="myTab">';
				
					foreach( $liste_categs as $liste_categ ){
						$onglet .= '<li><a href="#'.$liste_categ->slug.'">'.$liste_categ->name.'</a></li>';
					}
				
				$onglet .= '
				</ul>
				 
				<div class="tab-content">';
				
					foreach( $liste_categs as $liste_categ ){
						
						$onglet .= '<div class="tab-pane" id="'.$liste_categ->slug.'">';
						
							foreach( $actus[$liste_categ->slug] as $actu ){
								//$onglet .= " 
								//<div class='row-fluid'>
								//	<div class='span3'>";
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
											$onglet .= "";
										}else{
											$onglet .= $thumbnail;
										}
								//	$onglet .= " 
								//	</div>
								//	<div class='span9'>";
										
										$onglet .= "
										<h3>".$actu->post_title."</h3>
										".$tools->getContentLimit($actu->post_content, 300)."<br />
										<br />";
										
										$onglet .= "
										<div class='row-fluid'>
											<div class='span2'>";
										
												$onglet .= "										
												<a href='".get_permalink($actu->ID)."'>".__("Read more", "eewee")."...</a><br />
												<br />
												";

											$onglet .= "
											</div>
											<div class='span2'>";
												
												$onglet .= "
												<div class='addthis_toolbox addthis_default_style '>
												<a class='addthis_button_preferred_1'></a>
												<a class='addthis_button_preferred_2'></a>
												<a class='addthis_button_preferred_3'></a>
												<a class='addthis_button_preferred_4'></a>
												<a class='addthis_button_compact'></a>
												<a class='addthis_counter addthis_bubble_style'></a>
												</div>
												<script type='text/javascript' src='http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5076ec8624ddff17'></script>
												<br />";
												
											$onglet .= "
											</div>
										</div>";
									
								//	$onglet .= " 
								//	</div>
								//</div>";
								
							}
						
						$onglet .= '</div>';
						
					}
					
				$onglet .= '
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
				</script>';
				$d = $onglet;
				
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
				
                break;
                
            case "accordion" :
                $d = 'accordion here';
                break;
        }
        return $d;
    }

    // Include tineMCE plugin
    locate_template('/includes/shortcodes/post/tinyMCE/tinyMCE.php', true);

?>