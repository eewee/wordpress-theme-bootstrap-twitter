<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */

get_header(); ?>

    <div id="primary">
            <div id="content" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                            <nav id="nav-single">
                                <ul class="pager">
                                    <li class="previous">
                                        <?php previous_post_link( '%link', __( '&larr; Previous', 'eewee' ) ); ?>
                                    </li>
                                    <li class="next">
                                        <?php next_post_link( '%link', __( 'Next &rarr;', 'eewee' ) ); ?>
                                    </li>
                                </ul>
                            </nav><!-- #nav-single -->

                            <?php get_template_part( 'content', 'single' ); ?>

                            <?php comments_template( '', true ); ?>

                    <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
    </div><!-- #primary -->

<?php get_footer(); ?>