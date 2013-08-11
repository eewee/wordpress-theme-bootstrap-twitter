<?php

add_action('admin_menu', 'eewee_admin_add_page');
function eewee_admin_add_page() {
	add_theme_page(__('Theme Options', 'eewee-bt'), __('Theme Options', 'eewee-bt'), 'edit_theme_options', 'themeeewee', 'eewee_options_page');
}

// Display content admin options page
function eewee_options_page() { 
    $options = get_option('eewee_options');
    $theme_data = wp_get_theme(); ?>
			
    <div class="wrap zee_admin_wrap">  			

        <div id="zee_admin_head">
                <div id="zee_options_logo">
                        <a href="http://themeeewee.com/" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/includes/admin/images/eewee-logo.png" alt="Logo" />
                        </a>
                </div>
        </div>
        <div class="clear"></div>

        <div id="zee_admin_heading">
        <div class="icon32" id="icon-themes"></div>
        <h2><?php echo $theme_data->Name; ?> <?php _e('Theme Options', 'eewee-bt'); ?></h2>
        </div>
        <?php if ( isset( $_GET['settings-updated'] ) ) : ?>
                <div class="updated"><p><?php _e('Theme settings updated successfully.', 'eewee-bt'); ?></p></div>
        <?php endif; ?>
        <div class="clear"></div>

        <?php 
        // tabs (menu)
        eewee_options_page_tabs();

        // default tab
        if ( isset ( $_GET['tab'] ) ) : $tab = $_GET['tab']; else: $tab = 'welcome'; endif;

        // tab welcome
        if ( $tab == 'welcome' ) :
            eewee_options_welcome_screen();
        elseif( $tab == 'manual' ) :
            eewee_options_manual_screen();
        // other tab
        else: ?>
            <form class="zee_form" action="options.php" method="post">

                <div class="zee_settings">
                    <?php settings_fields('eewee_options'); ?>
                    <?php do_settings_sections('themeeewee'); ?>
                </div>

                <input name="eewee_options[validation-submit]" type="hidden" value="<?php echo $tab ?>" />

                <p><input name="Submit" class="button-primary" type="submit" value="<?php esc_attr_e('Save Changes', 'eewee-bt'); ?>" /></p>
            </form>
        <?php endif; ?>

        <?php 
        // right bar, welcome tab
        eewee_options_sidebar(); ?>	
    </div>

<?php
}

// Display Sidebar
function eewee_options_sidebar() {
    $theme_data = wp_get_theme(); 
    $pro_url = EEWEE_THEME_URL;
    $club_url = 'http://themeeewee.com/join-the-theme-club/';
?>
    <div class="zee_options_sidebar">

        <dl><dt><h4><?php _e('Theme Data', 'eewee-bt'); ?></h4></dt>
            <dd>
                <p><?php _e('Name', 'eewee-bt'); ?>: <?php echo $theme_data->Name; ?><br/>
                <?php _e('Version', 'eewee-bt'); ?>: <b><?php echo $theme_data->Version; ?></b>
                <a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php _e('(Changelog)', 'eewee-bt'); ?></a><br/>
                <?php _e('Author', 'eewee-bt'); ?>: <a href="http://www.eewee.fr/" target="_blank">eewee.fr</a><br/>
                </p>
            </dd>
        </dl>


        <dl><dt><h4><?php _e('About eewee', 'eewee-bt'); ?></h4></dt>
            <dd>
                <p><?php _e('eewee create <b>plugins</b> & <b>theme</b> for <b>CMS Wordpress</b>.', 'eewee-bt'); ?></p>
                <p><?php _e('You can download several <b>FREE WordPress Themes</b>.', 'eewee-bt'); ?></p>
                <p>
                    <a href="http://www.eewee.fr/" target="_blank"><?php _e('Visit eewee.fr now', 'eewee-bt'); ?></a> / 
                    <a href="<?php echo EEWEE_THEME_URL; ?>" target="_blank"><?php _e('Themes', 'eewee-bt'); ?></a> / 
                    <a href="<?php echo EEWEE_PLUGIN_URL; ?>" target="_blank"><?php _e('Plugins', 'eewee-bt'); ?></a>
                </p>
            </dd>
        </dl>

        <dl><dt><h4><?php _e('Subscribe Now', 'eewee-bt'); ?></h4></dt>
            <dd>
                <p><?php _e('Subscribe now and get informed about each <b>Theme Release</b> and <b>Plugin Release</b> from eewee.fr.', 'eewee-bt'); ?></p>
                <ul class="subscribe">
                    <li><img src="<?php echo get_template_directory_uri(); ?>/includes/admin/images/rss.png"/><a href="http://www.eewee.fr/feed" target="_blank"><?php _e('RSS Feed', 'eewee-bt'); ?></a></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/includes/admin/images/email.png"/><a href="http://feedburner.google.com/fb/a/mailverify?uri=eeweefr" target="_blank"><?php _e('Email Subscription', 'eewee-bt'); ?></a></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/includes/admin/images/twitter.png"/><a href="http://www.twitter.com/eeweefr" target="_blank"><?php _e('Follow me on Twitter', 'eewee-bt'); ?></a></li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/includes/admin/images/facebook.png"/><a href="http://www.facebook.com/eeweefr" target="_blank"><?php _e('Become a Facebok Fan', 'eewee-bt'); ?></a></li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="clear"></div>
<?php
}
// Display Welcome Screen
function eewee_options_welcome_screen() { 
	$theme_data = wp_get_theme();
?>
	<div id="zee_welcome">
            <h3><?php _e('Thank you for installing this theme!', 'eewee-bt'); ?></h3>
            <div class="container">
                    <h1><?php _e('Welcome to', 'eewee-bt'); ?> <?php echo $theme_data->Name; ?></h1>
                    <div class="zee_intro">
                            <?php _e("First of all, the number of options might alarm you, <b>but don't panic</b>. Everything is organized and documented well enough for you.", 'eewee-bt'); ?>
                    </div>
            </div>
            <div class="welcome_halfed">
                <div class="welcome_left">
                    <h3><?php _e('You would like some plugins free?', 'eewee-bt'); ?></h3>
                    <div class="container">
                        <h2><?php _e('Plugin for your theme ', 'eewee-bt'); ?> <?php echo $theme_data->Name; ?></h2>
                        <p><?php _e('It is possible <b>eewee.fr</b>, Section wordpress / plugins.', 'eewee-bt'); ?></p>
                        <p><h4>Pro Widgets:</h4>
                            <ul>
                                <li>+ <?php _e('Social plugin, addthis, twitter, facebook, ...', 'eewee-bt'); ?></li>
                                <li>+ <?php _e('traffic to your website', 'eewee-bt'); ?></li>
                                <li>+ <?php _e('exchanges with your users', 'eewee-bt'); ?></li>
                                <li>+ <?php _e('functionality specific to your profession', 'eewee-bt'); ?></li>
                            </ul>
                            <a class="welcome_button" href="<?php echo EEWEE_PLUGIN_URL; ?>" target="_blank"><?php _e('Learn more about the eewee plugins', 'eewee-bt'); ?></a>
                        </p>
                    </div>
                </div>
                <div class="welcome_right">
                    <h3><?php _e('You would like some themes free?', 'eewee-bt'); ?></h3>
                    <div class="container">
                        <h2><?php _e('Plugin for your theme ', 'eewee-bt'); ?> <?php echo $theme_data->Name; ?></h2>
                        <p><?php _e('It is possible <b>eewee.fr</b>, Section wordpress / themes.', 'eewee-bt'); ?></p>
                        <p><h4>Pro Widgets:</h4>
                            <ul>
                                <li>+ <?php _e('usability for your users', 'eewee-bt'); ?></li>
                                <li>+ <?php _e('compatibility with tablets and smartphones', 'eewee-bt'); ?></li>
                                <li>+ <?php _e('functionality to the native theme', 'eewee-bt'); ?></li>
                                <li>+ <?php _e('shortcode for layout', 'eewee-bt'); ?></li>
                            </ul>
                            <a class="welcome_button" href="<?php echo EEWEE_THEME_URL; ?>" target="_blank"><?php _e('Learn more about the eewee themes', 'eewee-bt'); ?></a>
                        </p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <h3><?php _e('Not happy with', 'eewee-bt'); ?> <?php echo $theme_data->Name; ?>?</h3>
            <div class="container">
            <p><?php _e('eewee.fr provide several other <b>free WordPress Themes</b>.', 'eewee-bt'); ?>
            <a href="http://www.eewee.fr/wordpress/themes/" target="_blank"><?php _e('Click here to browse through all of my themes.', 'eewee-bt'); ?></a>
            </p>
            </div>
	</div>
<?php
}

// Display Manual Screen
function eewee_options_manual_screen() { 
	$theme_data = wp_get_theme();
?>
	<div id="zee_welcome">
            <h3><?php _e('Shortcode : Google', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Google maps', 'eewee-bt'); ?></h1>
                
                <p><strong>[eewee_map address="" city="" zip="" country="" width="" height="" zoom="" /]</strong></p>
                <p>address : <?php _e("your address", "eewee-bt"); ?></p>
                <p>city : <?php _e("your city", "eewee-bt"); ?></p>
                <p>zip : <?php _e("your zip", "eewee-bt"); ?></p>
                <p>country : <?php _e("your country", "eewee-bt"); ?></p>
                <p>width : <?php _e("width map", "eewee-bt"); ?></p>
                <p>height : <?php _e("height map", "eewee-bt"); ?></p>
                <p>zoom : <?php _e("zoom map", "eewee-bt"); ?></p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[map address="55 av. albert einstein" zip="17000" city="la rochelle" country="france" width="800" height="400" zoom="6" /]</p>
                
                <p><?php echo do_shortcode( '[eewee_map address="55 av. albert einstein" zip="17000" city="la rochelle" country="france" width="800" height="400" zoom="6" /]' ); ?></p>
            </div>

            
            
            <h3><?php _e('Shortcode : movie', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Youtube', 'eewee-bt'); ?></h1>
                <p><strong>[eewee_movie type="youtube" code="" width="" height="" /]</strong></p>
                
                <h1><?php _e('Vimeo', 'eewee-bt'); ?></h1>
                <p><strong>[eewee_movie type="vimeo" code="" width="" height="" /]</strong></p>
                
                <h1><?php _e('Dailymotion', 'eewee-bt'); ?></h1>
                <p><strong>[eewee_movie type="dailymotion" code="" width="" height="" /]</strong></p>
                
                <h1><?php _e('Param', 'eewee-bt'); ?></h1>
                <p>type : youtube, vimeo, dailymotion</p>
                <p>code : <?php _e("Code video", "eewee-bt"); ?> (<?php _e('Example', 'eewee-bt'); ?> youtube : zDxLl-qDy1A#!)</p>
                <p>width : <?php _e("width movie", "eewee-bt"); ?></p>
                <p>height : <?php _e("height movie", "eewee-bt"); ?></p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[movie type="youtube" code="zDxLl-qDy1A#!" width="800" height="400" /]</p>
                
                <p><?php echo do_shortcode( '[eewee_movie type="youtube" code="zDxLl-qDy1A#!" width="800" height="400"]' ); ?></p>
            </div>
            
            

            <h3><?php _e('Shortcode : addthis', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('addthis', 'eewee-bt'); ?> <?php echo $theme_data->Name; ?></h1>
                <p><strong>[eewee_addthis type="" code="" width="" height="" /]</strong></p>
                <p>type : all, horiz1, horiz2, horiz3, vert1, vert2, vert3</p>
                <p>position : <?php _e("position in your website", "eewee-bt"); ?> here, top_post, bottom_post, header, footer</p>
                <p>pubid : <?php _e("your pubid addthis for your statistics", "eewee-bt"); ?></p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee_addthis type="all" position="" /]</p>
                <p><?php echo do_shortcode( '[eewee_addthis type="all" position="" /]' ); ?></p>
                
                <p>[eewee_addthis type="horiz1" position="" /]</p>
                <p><?php echo do_shortcode( '[eewee_addthis type="horiz1" position="" /]' ); ?></p>
                
                <p>[eewee_addthis type="horiz2" position="" /]</p>
                <p><?php echo do_shortcode( '[eewee_addthis type="horiz2" position="" /]' ); ?></p>
                
                <p>[eewee_addthis type="horiz3" position="" /]</p>
                <p><?php echo do_shortcode( '[eewee_addthis type="horiz3" position="" /]' ); ?></p>

              	<p>[eewee_addthis type="vert1" position="" /]</p>
                <p><?php //echo do_shortcode( '[eewee_addthis type="vert1" position="" /]' ); ?></p>
                
                <p>[eewee_addthis type="vert2" position="" /]</p>
                <p><?php //echo do_shortcode( '[eewee_addthis type="vert2" position="" /]' ); ?></p>
                
                <p>[eewee_addthis type="vert3" position="" /]</p>
                <p><?php //echo do_shortcode( '[eewee_addthis type="vert3" position="" /]' ); ?></p>
                
                <p>[eewee_addthis type="all" position="header" /]</p>
                <p><?php //echo do_shortcode( '[eewee_addthis type="all" position="header" /]' ); ?></p>
            </div>
            
            

            <h3><?php _e('Shortcode : post', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Tab news', 'eewee-bt'); ?></h1>
                <p><strong>[eewee-post type="tab" categ="" qty="" w="" /]</strong></p>
                <p>type : tab, accordion</p>
                <p>categ : <?php _e("id of your post categ", "eewee-bt"); ?> (<?php _e("Example", "eewee-bt"); ?> : 1,3,7 <?php _e("or empty", "eewee-bt"); ?>) </p>
                <p>qty : <?php _e("amount of product display", "eewee-bt"); ?> (<?php _e("Default", "eewee-bt"); ?> 3)</p>
                <p>w : <?php _e("width of your tab", "eewee-bt"); ?> (<?php _e("Default", "eewee-bt"); ?> 100%)</p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-post type="tab" /]</p>
                <p><?php //echo do_shortcode( '[eewee-post type="tab" /]' ); ?></p>


               
                <h1><?php _e('Accordeon news', 'eewee-bt'); ?></h1>
                <p><strong>[eewee-post type="accordion" categ="" qty="" w="" /]</strong></p>
                <p>type : tab, accordion</p>
                <p>categ : <?php _e("id of your post categ", "eewee-bt"); ?> (<?php _e("Example", "eewee-bt"); ?> : 1,3,7 <?php _e("or empty", "eewee-bt"); ?>) </p>
                <p>qty : <?php _e("amount of product display", "eewee-bt"); ?> (<?php _e("Default", "eewee-bt"); ?> 3)</p>
                <p>w : <?php _e("width of your tab", "eewee-bt"); ?> (<?php _e("Default", "eewee-bt"); ?> 100%)</p>
                <p>open : <?php _e("1st accordion open", "eewee-bt"); ?> (<?php _e("Example", "eewee-bt"); ?> y, n)</p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-post type="accordion" /]</p>
                <p><?php //echo do_shortcode( '[eewee-post type="tab" /]' ); ?></p>
               
            </div>
            
            

            <h3><?php _e('Shortcode : alert', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Alert message', 'eewee-bt'); ?></h1>
                <p><strong>[eewee-alert type='' title='' mess='' /]</strong></p>
                <p>type : block, error, success, info</p>
                <p>title : <?php _e('title of your message', 'eewee-bt'); ?></p>
                <p>mess : <?php _e('content of your message', 'eewee-bt'); ?></p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-alert type="success" title="eBook : wordpress" mess="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tristique, nibh facilisis rhoncus venenatis, velit libero tempor justo, vitae vehicula lectus massa ac ligula. Nam euismod lacinia neque, at fringilla nisl lobortis vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit." /]</p>
            </div>
            
            

            <h3><?php _e('Shortcode : button', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Button', 'eewee-bt'); ?></h1>
                
                <p><strong>[eewee-btn type='' title='' mess='' /]</strong></p>
                <p>type : <?php _e('button type', 'eewee-bt'); ?> (primary, info, success, warning, danger, inverse, link)</p>
                <p>size : <?php _e('button size', 'eewee-bt'); ?> (large, small, mini) </p>
                <p>block : <?php _e('full width of a parent', 'eewee-bt'); ?></p>
                <p>mess : <?php _e('content of your message', 'eewee-bt'); ?></p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-btn size="large" type="success" mess="<?php _e("Product A", "eewee-bt"); ?>" /]</p>
            </div>
            
            

            <h3><?php _e('Shortcode : image', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('shape of the image', 'eewee-bt'); ?></h1>
                
                <p><strong>[eewee-img type='' url='' /]</strong></p>
                <p>type : <?php _e('type of effect', 'eewee-bt'); ?> (rounded, circle, polaroid)</p>
                <p>url : <?php _e('url of the image', 'eewee-bt'); ?></p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-img type="circle" url="http://www.myWebsite.com/img/a.jpg" /]</p>
            </div>
            
            

            <h3><?php _e('Shortcode : color', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Texte color', 'eewee-bt'); ?></h1>
                
                <p><strong>[eewee-color type='' mess='' /]</strong></p>
                <p>type : <?php _e('color of your text', 'eewee-bt'); ?> (muted, warning, error, info, success)</p>
                <p>mess : <?php _e('content of your message', 'eewee-bt'); ?></p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-color type="info" mess="Lorem ipsum dolor sit amet, consectetur adipiscing elit." /]</p>
            </div>
            
            

            <h3><?php _e('Shortcode : blockquote', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Blockquote message', 'eewee-bt'); ?></h1>
                
                <p><strong>[eewee-bg mess='' mess2='' cite='' /]</strong></p>
                <p>mess : <?php _e('content of your message', 'eewee-bt'); ?></p>
                <p>mess2 : <?php _e('content of your small message', 'eewee-bt'); ?></p>
                <p>cite : <?php _e('citation', 'eewee-bt'); ?></p>
                <p>position : <?php _e('position', 'eewee-bt'); ?> (left, right)</p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-bq mess="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante." mess2="Someone famous in" cite="Source Title" /]</p>
            </div>
            
            

            <h3><?php _e('Shortcode : description', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Description message', 'eewee-bt'); ?></h1>
                
                <p><strong>[eewee-dl position=""][eewee-dt mess="" /][eewee-dd mess="" /]...[/eewee-dl]</strong></p>
                <p>mess : <?php _e('content of your message', 'eewee-bt'); ?></p>
                <p>position : <?php _e('content position', 'eewee-bt'); ?> (horizontal)</p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>[eewee-dl][eewee-dt mess="aaa" /][eewee-dd mess="bbb" /][eewee-dt mess="ccc" /][eewee-dd mess="ddd" /][eewee-dt mess="eee" /][eewee-dd mess="fff" /][/eewee-dl]</p>
                <p>[eewee-dl position="horizontal"][eewee-dt mess="aaa" /][eewee-dd mess="bbb" /][eewee-dt mess="ccc" /][eewee-dd mess="ddd" /][eewee-dt mess="eee" /][eewee-dd mess="fff" /][/eewee-dl]</p>
            </div>
            
            

            <h3><?php _e('Shortcode : colonne', 'eewee-bt'); ?></h3>
            <div class="container">
                <h1><?php _e('Create colonne', 'eewee-bt'); ?></h1>
                
                <p><strong>[eewee-col]</strong></p>
                <?php /*<p>f : <?php _e('content of your message', 'eewee-bt'); ?> (<?php _e('fluid or empty', 'eewee-bt'); ?>)</p> */ ?>
                <p>numcol : <?php _e('number of column', 'eewee-bt'); ?> (1-12)</p>
                <p>pos: <?php _e('indispensable for the last column', 'eewee-bt'); ?> (start, last)</p>
                
                <p><strong><?php _e("Example", "eewee-bt"); ?> : </strong></p>
                <p>2 col</p>
                <p>[eewee-col numcol="6" pos="start"]xxx[/eewee-col][eewee-col numcol="6" pos="last"]xxx[/eewee-col]</p>
                <p>3 col</p>
                <p>[eewee-col numcol="4" pos="start"]xxx[/eewee-col][eewee-col numcol="4"]xxx[/eewee-col][eewee-col numcol="4" pos="last"]xxx[/eewee-col]</p>
                <p>4 col</p>
                <p>[eewee-col numcol="3" pos="start"]xxx[/eewee-col][eewee-col numcol="3"]xxx[/eewee-col][eewee-col numcol="3"]xxx[/eewee-col][eewee-col numcol="3" pos="last"]xxx[/eewee-col]</p>
                <p><?php _e("Copy / paste", "eewee-bt"); ?> : </p>
                [eewee-col numcol="3" pos="start"]<br /><strong>TITLE 1<br /></strong>xxx xxx xxx<br />[/eewee-col][eewee-col numcol="3"]<br /><strong>TITLE 2<br /></strong>xxx xxx xxx<br />[/eewee-col][eewee-col numcol="3"]<br /><strong>TITLE 3<br /></strong>xxx xxx xxx<br />[/eewee-col][eewee-col numcol="3" pos="last"]<br /><strong>TITLE 4<br /></strong>xxx xxx xxx<br />[/eewee-col]
                
            </div>


            

	</div>
<?php
}

// Display Settings Page Tabs Navigation Bar
function eewee_options_page_tabs( $current = 'welcome' ) {
	
	// Get the current tab
	if ( isset( $_GET['tab'] ) ) :
            $current = $_GET['tab'];
	else:
            $current = 'welcome';
	endif;
	
	// Fetch all Tabs from theme-settings.php
	$tabs = eewee_get_settings_page_tabs();
	
	// Loop to create Tabs Navigation
	$links = array();
	foreach( $tabs as $tab => $name ) :
            if ( $tab == $current ) :
                $links[] = "<a class=\"nav-tab nav-tab-active\" href=\"?page=themeeewee&tab=$tab\">$name</a>";
            else :
                $links[] = "<a class=\"nav-tab\" href=\"?page=themeeewee&tab=$tab\">$name</a>";
            endif;
	endforeach;
	
	// Display Tab Navigaiton
	echo '<h2 id="zee_tabs_navi" class="nav-tab-wrapper">';
	foreach ( $links as $link ) : echo $link; endforeach;
	echo '</h2>';
}

// Display Setting Fields
function eewee_display_setting( $setting = array() ) {
	$options = get_option('eewee_options');
	
	if ( ! isset( $options[$setting['id']] ) )
            $options[$setting['id']] = $setting['std']; 

	switch ( $setting['type'] ) {
	
            case 'text':
                echo "<input id='".$setting['id']."' name='eewee_options[".$setting['id']."]' type='text' value='". esc_attr($options[$setting['id']]) ."' />";
                echo '<br/><label>'.$setting['desc'].'</label>';
                break;

            case 'url':
                echo "<input id='".$setting['id']."' name='eewee_options[".$setting['id']."]' type='text' value='". esc_url($options[$setting['id']]) ."' />";
                echo '<br/><label>'.$setting['desc'].'</label>';
                break;

            case 'textarea':
                    echo "<textarea id='".$setting['id']."' name='eewee_options[".$setting['id']."]' rows='5'>" . esc_attr($options[$setting['id']]) . "</textarea>";
                    echo '<br/><label>'.$setting['desc'].'</label>';
            break;

            case 'html':
                echo "<textarea id='".$setting['id']."' name='eewee_options[".$setting['id']."]' rows='5'>" . esc_attr($options[$setting['id']]) . "</textarea>";
                echo '<br/><label>'.$setting['desc'].'</label>';
                break;

            case 'checkbox':
                echo "<input id='".$setting['id']."' name='eewee_options[".$setting['id']."]' type='checkbox' value='true'";
                checked( $options[$setting['id']], 'true' );
                echo ' /><label> '.$setting['desc'].'</label>';
                break;

            case 'multicheckbox':
                echo "<input id='".$setting['id']."' name='eewee_options[".$setting['id']."]' type='hidden' value='true' />";
                foreach ( $setting['choices'] as $value => $label ) {
                    $checkbox = $setting['id'] . '_' . $value;	
                    if ( ! isset( $options[$checkbox] ) )
                            $options[$checkbox] = $setting['std']; 

                    echo "<input id='".$checkbox."'";
                    checked( $options[$checkbox], 'true' );
                    echo " type='checkbox' name='eewee_options[".$checkbox."]' value='true'/> " . $label . "<br/>";
                }
                echo '<label>'.$setting['desc'].'</label>';
                break;

            case 'select':
                echo "<select id='".$setting['id']."' name='eewee_options[".$setting['id']."]'>";

                    foreach ( $setting['choices'] as $value => $label ) {
                        echo "<option ".selected( $options[$setting['id']], $value )." value='" . $value . "' >" . $label . "</option>";
                    }

                echo "</select>";
                echo '<br/><label>'.$setting['desc'].'</label>';
                break;

            case 'radio':
                foreach ( $setting['choices'] as $value => $label ) {
                    echo "<input id='".$setting['id']."'";
                    checked( $options[$setting['id']], $value );
                    echo " type='radio' name='eewee_options[".$setting['id']."]' value='" . $value . "'/> " . $label . "<br/>";
                }
                echo '<label>'.$setting['desc'].'</label>';
                break;

            case 'image':
                echo "<p class='zee-image-bg'><img id='".$setting['id']."img' src='" . esc_attr($options[$setting['id']]) . "' /></p>";
                echo '<input class="zee-upload-image-field" id="'.$setting['id'].'" name="eewee_options['.$setting['id'].']" type="text" value="'. esc_attr($options[$setting['id']]) .'" />';
                echo '<input class="zee-upload-image-button button-secondary" type="button" value="'. __("Upload Image", "eewee-bt") .'" />';
                echo '	<label>'.$setting['desc'].'</label>';

                break;

            case 'fontpicker':
                echo "<select id='".$setting['id']."' name='eewee_options[".$setting['id']."]'>";
                    foreach ( $setting['choices'] as $value => $label ) {
                            echo "<option style='font-size: 1.3em; font-family: ".$value.";' ".selected( $options[$setting['id']], $value )." value='" . $value . "' >" . $label . "</option>";
                    }
                echo "</select>";
                echo '<br/><label>'.$setting['desc'].'</label>';
                echo "<div id='zee-font-bg' style='font-family: " . esc_attr($options[$setting['id']]) . ";'>Grumpy wizards make toxic brew for the evil Queen and Jack.</div>";

                break;

            case 'colorpicker':
                echo "#<input id='".$setting['id']."' name='eewee_options[".$setting['id']."]' class='colorpickerfield' type='text' maxlength='6' value='". esc_attr($options[$setting['id']]) ."' />";
                echo '<br/><label>'.$setting['desc'].'</label>';
                break;

            case 'fontsizer':
                echo "<input id='".$setting['id']."' name='eewee_options[".$setting['id']."]' class='fontsizerfield' type='text' maxlength='2' value='". esc_attr($options[$setting['id']]) ."' /> pt";
                echo '<br/><label>'.$setting['desc'].'</label>';
                break;

            default:
                echo "<input id='".$setting['id']."' name='eewee_options[".$setting['id']."]' size='40' type='text' value='". esc_attr($options[$setting['id']]) ."' />";
                echo '<br/><label>'.$setting['desc'].'</label>';
	}
}

// Register Settings
add_action('admin_init', 'eewee_register_settings');
function eewee_register_settings() {

    // Choose Setting Tab
    if ( isset ( $_GET['tab'] ) ) :
        $tab = $_GET['tab'];
    else:
        $tab = 'general';
    endif;

    $eewee_sections = eewee_get_sections($tab);	
    $eewee_settings = eewee_get_settings($tab);

    register_setting( 'eewee_options', 'eewee_options', 'eewee_options_validate' );

    // Create Setting Sections
    foreach ($eewee_sections as $section) {
        add_settings_section($section['id'], $section['name'], 'eewee_section_text', 'themeeewee');
    }

    // Create Setting Fields
    foreach ($eewee_settings as $setting) {
        add_settings_field($setting['id'], $setting['name'], 'eewee_display_setting', 'themeeewee', $setting['section'], $setting);
    }
}

// Validate Settings
function eewee_options_validate($input) {
    $options = get_option('eewee_options');

    if ( isset ( $input['validation-submit'] ) ) :
        $tab = $input['validation-submit'];
    else:
        $tab = 'general';
    endif;
    $validate_settings = eewee_get_settings($tab);

    foreach ($validate_settings as $setting) {

        if ($setting['type'] == 'checkbox' and !isset($input[$setting['id']]) ) 
        {
            $options[$setting['id']] = 'false'; 
        }	
        elseif ($setting['type'] == 'multicheckbox')
        {
            foreach ( $setting['choices'] as $value => $label ) {
                    $checkbox = $setting['id'] . '_' . $value;
                    if ( !isset($input[$checkbox] ) ) :
                            $options[$checkbox] = 'false'; 
                    else :
                            $options[$checkbox] = 'true'; 
                    endif;
            }
        }
        elseif ($setting['type'] == 'radio' and !isset($input[$setting['id']]) ) 
        {
            $options[$setting['id']] = 1; 
        }
        elseif ($setting['type'] == 'textarea')
        {
            $options[$setting['id']] = esc_textarea(trim($input[$setting['id']]));
        }
        elseif ($setting['type'] == 'html')
        {
            $options[$setting['id']] = wp_kses_post(trim($input[$setting['id']]));
        }
        elseif ($setting['type'] == 'url')
        {
            $options[$setting['id']] = esc_url(trim($input[$setting['id']]));
        }
        else 
        {
            $options[$setting['id']] = esc_attr(trim($input[$setting['id']]));
        }
    }
    return $options;
}
function eewee_section_text() {}

// Get Default Options
function eewee_get_default_options() {
	$options = array();
	
	// Fetch all Tabs from theme-settings.php
	$tabs = eewee_get_settings_page_tabs();
	
	foreach( $tabs as $tab => $name ) :
		
		$eewee_settings = eewee_get_settings($tab);
		foreach ($eewee_settings as $setting) :
			
			if ( $setting['type'] != 'multicheckbox' ) :
				$options[$setting['id']] = $setting['std'];
			else :
				foreach ( $setting['choices'] as $value => $label ) {
					$checkbox = $setting['id'] . '_' . $value;	
					$options[$checkbox] = $setting['std']; 
				}
			endif;
		endforeach;
		
	endforeach;
	
	return $options;
}

// Set Default Options
function eewee_set_default_options() {
     $theme_options = get_option( 'eewee_options' );
     if ( false === $theme_options ) {
          $theme_options = eewee_get_default_options();
     }
     update_option( 'eewee_options', $theme_options );
}
// Initialize Theme options
add_action('after_setup_theme','eewee_set_default_options', 9 );

?>
