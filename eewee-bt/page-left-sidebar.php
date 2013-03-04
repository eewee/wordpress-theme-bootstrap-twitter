<?php
/**
 * Template Name: left sidebar
 * Description: A Page Template that show full width
 *
 * The page with a sidebar left.
 *
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */

get_header(); ?>
<div class="row-fluid">

    <?php get_sidebar(); ?>

    <div id="primary" class="span8">
        <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page-left-sidebar' ); ?>

                <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
    
</div>
<?php get_footer(); ?>