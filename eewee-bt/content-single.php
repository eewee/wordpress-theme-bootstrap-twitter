<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'eewee' ) . '</span>', 'after' => '</div>' ) ); ?>
                <?php the_tags(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'eewee' ), '<span class="edit-link">', '</span>' ); ?>

		
		
		
		
		
		
                <?php $user = get_userdata( $post->post_author ); ?>
                <?php //ToolsController::prepre($user); ?>
                <?php
                // GRAVATAR : https://fr.gravatar.com/site/implement/images/php/
                $gravatar = new Gravatar();
                $url = $gravatar->get_gravatar( $user->user_email ); ?>
                <section class="vcard about-author clearfix" item="vcard">
                    <span itemprop="fn"><?php echo __("About author", "eewee")." : ".$user->display_name; ?></span>

                    <?php if( !empty($user->user_url) ){ ?>
                        <a itemprop="internet" href='<?php echo $user->user_url; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social-network/wordpress.png" /></a> 
                    <?php } ?>

                    <?php if( !empty($user->user_fluxrss) ){ ?>
                        <a itemprop="internet" href='<?php echo $user->user_fluxrss; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social-network/rss.png" /></a> 
                    <?php } ?>
                        
                    <?php if( !empty($user->user_twitter) ){ ?>
                        <a itemprop="internet" href='<?php echo $user->user_twitter; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social-network/twitter.png" /></a> 
                    <?php } ?>

                    <?php if( !empty($user->user_facebook) ){ ?>
                        <a itemprop="internet" href='<?php echo $user->user_facebook; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social-network/facebook.png" /></a> 
                    <?php } ?>

                    <?php if( !empty($user->user_googleplus) ){ ?>
                        <a itemprop="internet" rel='author' href='<?php echo $user->user_googleplus; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social-network/googeplus.png" /></a> 
                    <?php } ?>

                    <?php if( !empty($user->user_linkedin) ){ ?>
                        <a itemprop="internet" href='<?php echo $user->user_linkedin; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social-network/linkedin.png" /></a> 
                    <?php } ?>

                    <?php if( !empty($user->user_viadeo) ){ ?>
                        <a itemprop="internet" href='<?php echo $user->user_viadeo; ?>'><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social-network/viadeo.png" /></a> 
                    <?php } ?>

                    <div style="float: left; margin:0 1em 1em 0;">
                        <img itemprop="photo" alt="" src="<?php echo $url; ?>">
                    </div>

                    <p>
                        <span itemprop="description"><?php echo $user->description; ?></span>
                    </p>
                </section>
		
		
		
		
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
