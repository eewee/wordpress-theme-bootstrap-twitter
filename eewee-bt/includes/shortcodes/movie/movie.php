<?php

    // Add movie Shortcode
    add_shortcode('eewee_movie', 'themeeewee_shortcode_movie_function');
    function themeeewee_shortcode_movie_function($atts, $content = null) {

        extract(shortcode_atts(array(
                'type' => '',
                'code' => '',
                'width' => '',
                'height' => ''
        ), $atts));

        switch( $type ){
            case "youtube" :
                $movie = '
                <iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$code.'" frameborder="0" allowfullscreen></iframe>';
                break;
            
            case "vimeo" :
                $movie = '
                <iframe src="http://player.vimeo.com/video/'.$code.'?title=0&amp;byline=0&amp;portrait=0&amp;color=0d0d0d" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
                break;
            
            case "dailymotion" :
                $movie = '
                <iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$code.'"></iframe><br />';
                break;
            
            default : 
                $movie = "";
            
        }
        
        return "<div class='shortcode_movie'>".$movie."</div>";
    }

    // Include tineMCE plugin
    locate_template('/includes/shortcodes/movie/tinyMCE/tinyMCE.php', true);

?>