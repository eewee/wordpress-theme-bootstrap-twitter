<?php
/**
 * Template Name: Full Width
 * Description: A Page Template that show full width
 *
 * The full width page, display the page on full width.
 * it's use for corporate website for sample.
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

                        <?php get_template_part( 'content', 'page' ); ?>

                <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
    
</div>
<?php get_footer(); ?>