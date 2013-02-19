<?php 
//namespace FrEeweeThemeEeweeBtHomeController;
//if( !class_exists(HomeController)){
	class HomeController{
		
		public function __construct(){}
		
		/**
		 * 
		 * systeme d'actualite par onglet
		 * @param array $d contient les donnees pour les differentes actu
		 */
		public function getOngletActu( $d ){
			
			// recup les categ d'article pour la home
			$t_post = new TPost();
			$liste_categs	= $t_post->getCategOngletHome();
			$actus			= $t_post->getNewsOngletHome( $liste_categs );
			
			$onglet = '
			<ul class="nav nav-tabs" id="myTab">';
			
				foreach( $liste_categs as $liste_categ ){
					$onglet .= '<li><a href="#'.$liste_categ->slug.'">'.$liste_categ->name.'</a></li>';
				}
				/*
			  <li class="active"><a href="#home">Actu NM</a></li>
			  <li><a href="#profile">Profile</a></li>
			  <li><a href="#messages">Messages</a></li>
			  <li><a href="#settings">Settings</a></li>
			  */
			
			$onglet .= '
			</ul>
			 
			<div class="tab-content">';
			
				//ToolsController::prepre($actus);
			
				foreach( $liste_categs as $liste_categ ){
					
					$onglet .= '<div class="tab-pane" id="'.$liste_categ->slug.'">';
					
						foreach( $actus[$liste_categ->slug] as $actu ){
							$onglet .= " 
							<div class='row-fluid'>
								<div class='span3'>";
									$thumbnail = get_the_post_thumbnail( $actu->ID, array(180,135) );
							
									if( empty( $thumbnail ) ){
										$onglet .= "<img src='".get_bloginfo('template_url')."/images/logos/logo-actu-defaut.png' />";
									}else{
										$onglet .= get_the_post_thumbnail( $actu->ID, array(180,135) );
									}
							
									$onglet .= $img; //get_the_post_thumbnail( $actu->ID, array(180,135) );
							
								$onglet .= " 
								</div>
								<div class='span9'>";
									
									$onglet .= "
									<h3>".$actu->post_title."</h3>
									".ToolsController::getContentLimit($actu->post_content, NEWS_NB_CARACTERE)."<br />
									<br />
									<a href='".get_permalink($actu->ID)."'>Lire la suite ...</a><br />
									<br />
									";
								
								$onglet .= " 
								</div>
							</div>";
							
							
						}
					
					$onglet .= '</div>';
					
				}
				
				/*
				  <div class="tab-pane active" id="home">a...</div>
				  <div class="tab-pane" id="profile">.b..</div>
				  <div class="tab-pane" id="messages">.c..</div>
				  <div class="tab-pane" id="settings">..d.</div>
				  */
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
			
			return $onglet;
		}
		
		
	}//fin class
//}//fin if