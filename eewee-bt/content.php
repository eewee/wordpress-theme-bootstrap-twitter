<?php
/**
 * The template used for displaying page content in index.php
 *
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
            
            <div class="row-fluid">
                
                <div class="span3">
                    <?php 
                    if( has_post_thumbnail(get_the_ID()) ){
                        $args = array(
                            'class'	=> "img-rounded",
                            'alt'	=> trim(strip_tags( get_the_excerpt() )),
                            'title'	=> trim(strip_tags( get_the_title() ))
                        );
                        echo "<a href='".get_permalink()."'>";
                            echo get_the_post_thumbnail(
                                    get_the_ID(),
                                    'thumbnail',    // thumbnail, medium, large, full
                                    $args
                            );
                        echo "</a>";
                    }
                    ?>
                </div>
                <div class="span9 txt-justify">
                    <?php the_excerpt(); ?>
                    <?php //the_content(); ?>
                    <a href='<?php the_permalink(); ?>' class='btn btn-primary btn-lg btn-block'><?php _e( 'Read more', 'eewee-bt' ); ?></a>
                    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'eewee-bt' ) . '</span>', 'after' => '</div>' ) ); ?>
                </div>
            </div>
            
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'eewee-bt' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
