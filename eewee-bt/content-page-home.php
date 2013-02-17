<?php
/**
 * The template used for displaying page content in page-home.php
 *
 * @package WordPress
 * @subpackage Eewee_Bootstrap_Twitter
 * @since Eewee Bootstrap Twitter 0.1
 */
?>


<?php //CAROUSEL ?>
<div class="row-fluid">
    <div class="span12">
        <?php echo do_shortcode("[eewee-carousel]"); ?>
    </div>
</div>



<?php // CONTENT PAGE ?>
<div class="row-fluid">
    <div class="span12">
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                        <?php the_content(); ?>
                </div><!-- .entry-content -->
                <footer class="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'eewee' ), '<span class="edit-link">', '</span>' ); ?>
                </footer><!-- .entry-meta -->
        </article><!-- #post-<?php the_ID(); ?> -->

    </div>
</div>



<?php // LAST POST ?>
<div class="row-fluid">
    <?php
    // get posts
    global $post;
    $tmp_post = $post;

    $args = array(
        'numberposts'     => 3,
        'offset'          => 0,
        'category'        => '',
        'orderby'         => 'post_date',
        'order'           => 'DESC',
        'include'         => '',
        'exclude'         => '',
        'meta_key'        => '',
        'meta_value'      => '',
        'post_type'       => 'post',
        'post_mime_type'  => '',
        'post_parent'     => '',
        'post_status'     => 'publish',
        'suppress_filters' => true );
    $myposts = get_posts( $args );
    foreach( $myposts as $post ){ setup_postdata($post); ?>
        <div class="span4">
            <div class="thumbnail">
                <div class="caption news-home">
                    <h2><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
        </div>
    <?php }//foreach ?>
    <?php $post = $tmp_post; ?>
</div>
    