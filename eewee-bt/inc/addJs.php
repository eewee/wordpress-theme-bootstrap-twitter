<?php 
function eeweeAddJs(){
	// jQuery
	wp_enqueue_script( 'jquery');
	// Bootstrap twitter
	wp_enqueue_script( 'eeweeJs-bootstrap-min', get_template_directory_uri().'/js/bootstrap-twitter/bootstrap.min.js' );
}
add_action("wp_enqueue_scripts", "eeweeAddJs");

/*
// UTILISER JQUERY
function eeweeJsCustom(){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(document).ready(function() {
				//$( "#xxx" ).hide();
				//$("#xxx").addClass("toto");
 
   				//$(".nav-collapse").collapse();
                                
                                //$( "#page" ).hide();
                                //$("#xxx").addClass("toto");

			});
		 });
	</script>	
	<?php
}
add_action("wp_head", "eeweeJsCustom");
*/
?>