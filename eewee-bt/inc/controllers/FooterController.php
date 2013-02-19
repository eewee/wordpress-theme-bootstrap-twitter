<?php 
//namespace FrEeweeThemeEeweeBtFooterController;
//if( !class_exists(FooterController)){
	class FooterController{
		
		public function __construct(){
                        add_action( 'wp_footer', array($this, 'eewee_footer_actu_rs') );
        		add_action( 'wp_footer', array($this, 'poweredby') );
		}
		

                // HOOK FOOTER 
                function eewee_footer_actu_rs(){ ?>

                    <div id="page" class="hfeed <?php echo ToolsController::getPageSize(); ?>">
                        
                        <div class="row-fluid"><?php
                            ?><div class="span4"><?php

                                // get posts
                                $args = array(
                                    'numberposts'     => 10,
                                    'offset'          => 0,
                                    'category'        => '',
                                    'orderby'         => 'post_date',
                                    'order'           => 'DESC',
                                    'include'         => '',
                                    'exclude'         => '',
                                    'meta_key'        => '',
                                    'meta_value'      => '',
                                    'post_type'       => 'post',
                                    'post_mime_type'  => '',
                                    'post_parent'     => '',
                                    'post_status'     => 'publish',
                                    'suppress_filters' => true );
                                $posts = get_posts( $args );
                                //echo "<pre>"; var_dump($posts); echo "</pre>";
                                ?>
                                <dl class="dl-horizontal"><?php
                                    foreach( $posts as $post ){
                                        ?>
                                        <dt><?php echo ToolsController::getFormatDate($post->post_modified); ?></dt>
                                        <dd><a href='<?php echo get_permalink($post->ID); ?>'><?php echo $post->post_title; ?></a></dd>
                                        <?php
                                    }//foreach
                                ?>
                                </dl>
                            </div><!-- span -->

                            <?php $rs = new ReseauxSociauxController(); ?>

                            <?php // twitter ?>
                            <div class="span4">

                                <?php echo $rs->twWidgetProfil(); ?>

                            </div><!-- span -->

                            <?php // facebook ?>
                            <div class="span4">

                                <?php $rs->fbSdkJs(); echo $rs->fbLikeBox(); ?>

                            </div><!-- span -->
                        </div><!-- row-fluid -->




                        <div class="row-fluid">
                            <div class="span8">
                                <?php
                                wp_nav_menu( 
                                    array(
                                        'theme_location'  => 'footer_menu',
                                        'menu'            => '', 
                                        'container'       => 'div', 
                                        'container_class' => 'menu-footer-container',
                                        'container_id'    => '',
                                        'menu_class'      => 'menu', 
                                        'menu_id'         => '',
                                        'echo'            => true,
                                        'fallback_cb'     => 'wp_page_menu',
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'           => 2,
                                        'walker'          => ''
                                    )
                                );
                                ?>
                            </div>
                            <div class="span4 about-company">
                                <h3><?php _e("A propos", "eewee-bt"); ?></h3>
                                <?php $options = get_option('eewee_options'); ?>
                                <span itemprop="description" itemscope itemtype="http://data-vocabulary.org/Thing">
                                    <div class='pull-left'><img src='<?php echo esc_attr($options['eewee_general_logo']); ?>' width='100px' /></div>
                                    <?php echo esc_attr($options['eewee_address_about']); ?>
                                </span>
                            </div>
                        </div>

                        <?php echo $this->getAddress(); ?>
                        
                    </div>
                <?php
                }//function

                
                
                
                public function getAddress(){
                    $options = get_option('eewee_options'); ?>
                    <br />
                    <div class="row-fluid">
                        <div class="span12">
                            <div itemscope itemtype="http://data-vocabulary.org/Organization"> 
                                <span itemprop="name"><a href="<?php echo home_url(); ?>" itemprop="url"><strong><?php echo esc_attr($options['eewee_address_company']); ?></strong></a></span>

                                <i class="icon-map-marker"></i>
                                <span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                    <?php if( !empty($options['eewee_address_address1']) ){ ?>
                                        <span itemprop="street-address"><?php echo esc_attr($options['eewee_address_address1']); ?></span>, 
                                    <?php } ?>
                                    <?php if( !empty($options['eewee_address_address2']) ){ ?>
                                        <span itemprop="street-address"><?php echo esc_attr($options['eewee_address_address2']); ?></span>, 
                                    <?php } ?>
                                    <?php if( !empty($options['eewee_address_zip']) ){ ?>
                                        <span itemprop="postalCode"><?php echo esc_attr($options['eewee_address_zip']); ?></span>
                                    <?php } ?>
                                    <?php if( !empty($options['eewee_address_city']) ){ ?>
                                        <span itemprop="addressLocality"><?php echo esc_attr($options['eewee_address_city']); ?></span>
                                    <?php } ?>
                                </span>

                                <i class=" icon-headphones"></i>
                                <?php if( !empty($options['eewee_address_phone1']) ){ ?>
                                    <abbr title="Phone"><?php _e("Ph.", "eewee-bt"); ?></abbr> <span itemprop="telephone"><?php echo esc_attr($options['eewee_address_phone1']); ?></span>
                                <?php } ?>
                                <?php if( !empty($options['eewee_address_phone2']) ){ ?>
                                    <abbr title="Phone"><?php _e("Ph.", "eewee-bt"); ?></abbr> <span itemprop="telephone"><?php echo esc_attr($options['eewee_address_phone2']); ?></span>
                                <?php } ?>
                                <?php if( !empty($options['eewee_address_phone3']) ){ ?>
                                    <abbr title="Phone"><?php _e("Ph.", "eewee-bt"); ?></abbr> <span itemprop="telephone"><?php echo esc_attr($options['eewee_address_phone3']); ?></span>
                                <?php } ?>
                                <?php if( !empty($options['eewee_address_mobile']) ){ ?>
                                    <abbr title="Mobile"><?php _e("Ph.", "eewee-bt"); ?></abbr> <span itemprop="telephone"><?php echo esc_attr($options['eewee_address_mobile']); ?></span>
                                <?php } ?>
                                <?php if( !empty($options['eewee_address_zip']) ){ ?>    
                                    <abbr title="Fax"><?php _e("Fax", "eewee-bt"); ?></abbr> <span itemprop="faxNumber"><?php echo esc_attr($options['eewee_address_fax']); ?></span>
                                <?php } ?>
                                <?php if( !empty($options['eewee_address_zip']) ){ ?>    

                                <?php } ?>
                                <?php if( !empty($options['eewee_address_zip']) ){ ?>    


                                <?php } ?>
                                <br />

                                <i class="icon-envelope"></i> 
                                <span itemprop="email"><a href="mailto:<?php echo esc_attr($options['eewee_address_email']); ?>"><?php echo esc_attr($options['eewee_address_email']); ?></a></span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                
                
                
                
		/**
		 * Powered by
		 */
		public function poweredby(){
			$p = "
			<div class='generator poweredby pull-right'>
				Powered by <a href='http://www.eewee.fr' title='Developpement themes/plugins CMS Wordpress' rel='tooltip'>eewee.fr</a>
			</div>
			
			<script type='text/javascript'>
				jQuery(document).ready(function($) {
					$(document).ready(function() {
						$('[rel=tooltip]').tooltip()
					});
				 });
			</script>";
			echo $p;
		}
		
	}//fin class
//}//fin if