<?php 
function eeweeAddCss(){
	wp_enqueue_style( 'eewee-bootstrap-twitter', get_template_directory_uri().'/css/bootstrap-twitter/bootstrap.min.css' );
        wp_enqueue_style( 'eewee-bootstrap-twitter-responsive', get_template_directory_uri().'/css/bootstrap-twitter/bootstrap-responsive.min.css' );
}
add_action("wp_enqueue_scripts", "eeweeAddCss");
?>