<?php
/**
 * Template Name: home
 * Description: A Page Template for home page
 *
 * The home page, display a slide and news.
 *
 * @package WordPress
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */

get_header(); ?>
<div class="row-fluid">
    

    <div id="primary" class="span12">
        <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page-home' ); ?>

                <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
    
</div>
<?php get_footer(); ?>