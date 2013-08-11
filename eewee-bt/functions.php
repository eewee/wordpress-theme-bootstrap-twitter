<?php
add_action( 'after_setup_theme', 'eewee_setup' );
if ( ! function_exists( 'eewee_setup' ) ):
/**
 * Eewee setup.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, custom headers
 * 	and backgrounds, and post formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Eewee Bootstrap Twitter 0.1
 */
function eewee_setup() {
    
    if ( ! isset( $content_width ) )
	$content_width = 940;

    // GENERAL
        // Make Eewee Boostrap Twitter available for translation.
	// Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'eewee-bt', get_template_directory() . '/languages' );

        // This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// add css
	require_once( get_template_directory() . '/inc/addCss.php' );
	
	// add js
	require_once( get_template_directory() . '/inc/addJs.php' );
	
    // CONTROLLERS
	require_once( get_template_directory() . '/inc/controllers/ToolsController.php' );
	require_once( get_template_directory() . '/inc/controllers/ShortcodeController.php' );
	require_once( get_template_directory() . '/inc/controllers/GravatarController.php' );
	require_once( get_template_directory() . '/inc/controllers/ReseauxSociauxController.php' );
	require_once( get_template_directory() . '/inc/controllers/HomeController.php' );
	require_once( get_template_directory() . '/inc/controllers/LeftColumnController.php' );
	require_once( get_template_directory() . '/inc/controllers/FooterController.php' );
	//require_once( get_template_directory() . '/inc/controllers/WidgetEeweeAdsController.php' );
	
    // MODELS
	require_once( get_template_directory() . '/inc/models/TTaxonomy.php' );
	require_once( get_template_directory() . '/inc/models/TPage.php' );
	require_once( get_template_directory() . '/inc/models/TPost.php' );
		
    // VIEWS
        //require_once( get_template_directory() . '/inc/views/helpers/EeweeBT_Tools.php' );
        
    // MENU : wp_nav_menus()
	register_nav_menus( 
            array(
                'top_menu' => __( 'Top Menu', 'eewee-bt' ),
                'footer_menu' => __( 'Footer Menu', 'eewee-bt' )
            )
        );
        
    // INIT    
	// shortcode
	$initShortcode = new ShortcodeController();
        // footer
	$initFooter = new FooterController();
        
	
	
        

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

        // Add support for custom backgrounds.
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );        

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

        /*
        // Add support for custom headers.
	$custom_header_support = array(
		// The default header text color.
		'default-text-color' => '000',
		// The height and width of our custom header.
		'width' => apply_filters( 'eewee_header_image_width', $content_width ),
		'height' => apply_filters( 'eewee_header_image_height', 288 ),
		// Support flexible heights.
		'flex-height' => true,
		// Random image rotation by default.
		'random-default' => true,
		// Callback for styling the header.
		'wp-head-callback' => 'eewee_header_style',
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => '', //eewee_admin_header_style',
		// Callback used to display the header preview in the admin.
		'admin-preview-callback' => '', //'eewee_admin_header_image',
	);
	add_theme_support( 'custom-header', $custom_header_support );
        */
        
        // Config image
	set_post_thumbnail_size( 150, 150, true ); // (width, height, true/false)
	add_image_size( 'large-feature', 800, 600, true );
	add_image_size( 'medium-feature', 500, 300 );
	add_image_size( 'small-feature', 200, 200 );
}
endif; // eewee_setup

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since eewee-bt 0.4.6
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function eewee_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'eewee-bt' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'eewee_wp_title', 10, 2 );




/* BEGIN : A AMELIORER */
 if ( is_singular() ) wp_enqueue_script( "comment-reply" );


 
 
if ( ! function_exists( 'eewee_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Eewee Bootstrap Twitter 0.1
 */
function eewee_header_style() {
	$text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( $text_color == HEADER_TEXTCOLOR )
		return;
		
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $text_color ) :
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo $text_color; ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // eewee_header_style
 
 

if ( ! function_exists( 'eewee_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function eewee_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?> nav-single">
                    <ul class="pager">
			<!--<h3 class="assistive-text"><?php //_e( 'Post navigation', 'eewee-bt' ); ?></h3>-->
			<li class="previous">
                            <?php next_posts_link( __( '&larr; Older posts', 'eewee-bt' ) ); ?>
                        </li>
                        <li class="next">
                            <?php previous_posts_link( __( 'Newer posts &rarr;', 'eewee-bt' ) ); ?>
                        </li>
                    </ul>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // eewee_content_nav
 
 
 

if ( ! function_exists( 'eewee_comment' ) ) :
function eewee_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'eewee-bt' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'eewee-bt' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'eewee-bt' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'eewee-bt' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'eewee-bt' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'eewee-bt' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'eewee-bt' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for eewee_comment()

/* END : A AMELIORER */






function eewee_excerpt_length( $length ) { return 100; }
add_filter( 'excerpt_length', 'eewee_excerpt_length' );

function eewee_read_more_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Read more', 'eewee-bt' ) . '</a>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and eewee_read_more_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function eewee_auto_excerpt_more( $more ) {
	return ' &hellip;' . eewee_read_more_link();
}
add_filter( 'excerpt_more', 'eewee_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function eewee_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= eewee_read_more_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'eewee_custom_excerpt_more' );

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
function eewee_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'eewee_page_menu_args' );

// Sidebar
function eewee_widgets_init() {

        // Declare a widget (class)
	//register_widget( 'Eewee_Bootstrap_Twitter_Widget' );

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'eewee-bt' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        
        /*
	register_sidebar( array(
		'name' => __( 'Showcase Sidebar', 'eewee-bt' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', 'eewee-bt' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        */
        
}
add_action( 'widgets_init', 'eewee_widgets_init' );





// POST
function new_excerpt_more($more) {
    global $post;
    return '<p><a href="'. get_permalink($post->ID) . '" class="btn btn-primary">'.__("read more", "eewee-bt").'</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');




// CUSTOM POST TYPE : portfolio
add_action('init', 'eewee_porfolio');
function eewee_porfolio(){
    register_post_type('portfolio', array(
            'label' => __('Portfolio', 'eewee-bt'),
            'public' => true,
            'show_ui' => true,
            'menu_position' => 6,
            'has_archive' => false,
            'rewrite' => array('slug'=>'portfolio'),
            'supports' => array('thumbnail', 'title', 'editor' )
            ) 
    );
        
    // WEBSITE
    register_taxonomy( 	'portfolio_website',            // nom de la taxonomie
                        'portfolio',	 		// post, page ou le type cree (ici "portfolio")
                        array(
                            'hierarchical' => false,	// true : comme les categ (parent/enfant), false : comme les tags
                            'label' => 'Website',       // nom affiche dans l'admin
                            'query_var' => true,	// true : permet d'appeler la taxonomie dans nos templates
                            'rewrite' => array('slug' => 'website')  // true : chaine pr√©sente ds les permaliens. Valeur par defaut, cad le nom de la taxonomie
                        )
    );
}//function




// ADMIN USER
add_filter('user_contactmethods', 'eewee_adminUsers');
function eewee_adminUsers() {
    $contactmethods['user_fluxrss'] = 'Flux RSS'; // Add RSS
    $contactmethods['user_twitter'] = 'Twitter'; // Add Twitter
    $contactmethods['user_facebook'] = 'Facebook'; // Add Facebook
    $contactmethods['user_googleplus'] = 'Google+'; // Add Google+
    $contactmethods['user_linkedin'] = 'Linkedin'; // Add Linkedin
    $contactmethods['user_viadeo'] = 'Viadeo'; // Add Viadeo
//    unset($contactmethods['yim']); // Remove Yahoo IM
//    unset($contactmethods['aim']); // Remove AIM
//    unset($contactmethods['jabber']); // Remove Jabber

    return $contactmethods;
}		






// DEBUT SOURCE : https://github.com/enile8/Bootstrap-for-WordPress */
if( has_nav_menu('top_menu') ){
    /**
     * Bootstrap custom meny settings for downdrop support
     *
     */
    class Bootstrap_Nav_Walker extends Walker_Nav_Menu {
      function check_current($val) {
        return preg_match('/(current-)/', $val);
      }

      function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $slug = sanitize_title($item->title);
        $id = apply_filters('nav_menu_item_id', 'menu-' . $slug, $item, $args);
        $id = strlen($id) ? '' . esc_attr( $id ) . '' : '';

        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes = array_filter($classes, array(&$this, 'check_current'));

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = $class_names ? ' class="' . $id . ' ' . esc_attr($class_names) . '"' : ' class="' . $id . '"';

        $output .= $indent . '<li' . $class_names . '>';

        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
      }
    }

    class Bootstrap_Navbar_Nav_Walker extends Walker_Nav_Menu {
      function check_current($val) {
        return preg_match('/(current-)|active|dropdown/', $val);
      }

      function start_lvl(&$output, $depth) {
        $output .= "\n<ul class=\"dropdown-menu\">\n";
      }

      function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $slug = sanitize_title($item->title);
        $id = apply_filters('nav_menu_item_id', 'menu-' . $slug, $item, $args);
        $id = strlen($id) ? '' . esc_attr( $id ) . '' : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        if ($args->has_children) {
          $classes[]      = 'dropdown';
          $li_attributes .= ' data-dropdown="dropdown"';
        }
        $classes[] = ($item->current) ? 'active' : '';
        $classes = array_filter($classes, array(&$this, 'check_current'));

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = $class_names ? ' class="' . $id . ' ' . esc_attr($class_names) . '"' : ' class="' . $id . '"';

        $output .= $indent . '<li' . $class_names . $li_attributes . '>';

        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"'    : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"'    : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"'    : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"'    : '';
        $attributes .= ($args->has_children)      ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= ($args->has_children) ? ' <b class="caret"></b>' : '';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
      }
      function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        if (!$element) { return; }

        $id_field = $this->db_fields['id'];

        // display this element
        if (is_array($args[0])) {
          $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
        } elseif (is_object($args[0])) {
          $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if (($max_depth == 0 || $max_depth > $depth+1) && isset($children_elements[$id])) {
          foreach ($children_elements[$id] as $child) {
            if (!isset($newlevel)) {
              $newlevel = true;
              // start the child delimiter
              $cb_args = array_merge(array(&$output, $depth), $args);
              call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
            }
            $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
          }
          unset($children_elements[$id]);
        }

        if (isset($newlevel) && $newlevel) {
          // end the child delimiter
          $cb_args = array_merge(array(&$output, $depth), $args);
          call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        // end this element
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
      }
    }
    /*
    function bootstrap_nav_menu_args($args = '') {
      $args['container']  = false;
      $args['depth']      = 2;
      $args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
      if (!$args['walker']) {
        $args['walker'] = new Bootstrap_Nav_Walker();
      }
      return $args;
    }
    add_filter('wp_nav_menu_args', 'bootstrap_nav_menu_args');
    */
}//if
// FIN SOURCE : https://github.com/enile8/Bootstrap-for-WordPress */




/* DEBUT : OPTION THEME - ADMIN */

// include Admin Files
locate_template('/includes/admin/theme-functions.php', true);
locate_template('/includes/admin/theme-admin.php', true);

// include Shortcodes
locate_template('/includes/shortcodes/shortcodes.php', true);      

/* FIN : OPTION THEME */
?>