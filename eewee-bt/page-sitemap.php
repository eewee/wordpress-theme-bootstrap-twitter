<?php
/**
 * Template Name: sitemap
 * Description: A Page Template that show sitemap
 *
 * The page links of your website.
 *
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */
?>
<?php get_header(); ?>

	<div id="content">
		
            <?php if (have_posts()) {
                while (have_posts()){ the_post(); ?>

                    <div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <h2 class="page-title"><?php the_title(); ?></h2>
                            <?php edit_post_link(__( 'Edit', 'eewee-bt' )); ?>

                            <div class="entry">
                                    <?php the_post_thumbnail('medium', array('class' => 'alignleft')); ?>
                                    <?php the_content(); ?>
                                    <div class="clear"></div>

                <?php }//while ?>
            <?php }//if ?>

            <?php wp_reset_query(); ?> 

                <h2><?php _e('Latest Posts', 'eewee-bt'); ?></h2>
                <ul>
                    <?php query_posts('post_type="post"&post_status="publish"&showposts=9'); ?>
                    <?php if ( have_posts() ) {
                        while ( have_posts() ){ the_post(); ?>
                            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                        <?php }//while ?>
                    <?php }//fin ?>
                    <?php wp_reset_query(); ?> 
                </ul>
	            <hr />
	                
                <h2><?php _e('Pages', 'eewee-bt'); ?></h2>
                <ul>
                    <?php wp_list_pages('title_li='); ?>
                </ul>
                <hr />
                    
                <h2><?php _e('Categories', 'eewee-bt'); ?></h2>
                <ul>
                    <?php wp_list_categories('title_li=&show_count=1'); ?>
                </ul>
                <hr />
                    
                <h2><?php _e('Archives', 'eewee-bt'); ?></h2>
                <ul>
                    <?php wp_get_archives('show_post_count=true'); ?>
                </ul>
                <hr />
                    
                <h2><?php _e('Posts by Category', 'eewee-bt'); ?></h2>
                <?php $categories = get_categories( $args ); ?>
                <?php foreach($categories as $cat){ ?>
                	<strong><?php _e('Category', 'eewee-bt'); ?>: <a href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a></strong>
                    <ul>
                    	<?php query_posts('post_type="post"&post_status="publish"&cat='. $cat->term_id); ?>
	                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	                        	<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
	                        <?php endwhile; ?>
	                        <?php endif; ?>
	                    <?php wp_reset_query(); ?> 
                    </ul>
            	<?php } ?>
                    
            </div><!-- entry -->
        </div><!-- page -->					
    </div><!-- content -->

<?php get_footer(); ?>