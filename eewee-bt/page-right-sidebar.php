<?php
/**
 * Template Name: right sidebar
 * Description: A Page Template that show full width
 *
 * The page with a sidebar right.
 *
 * @package WordPress
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */

get_header(); ?>
<div class="row-fluid">

    <div id="primary" class="span8">
        <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page-right-sidebar' ); ?>

                <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->

    <?php get_sidebar(); ?>
    
</div>
<?php get_footer(); ?>