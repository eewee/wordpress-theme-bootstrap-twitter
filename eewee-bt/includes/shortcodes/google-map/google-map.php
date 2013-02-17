<?php

    // Add google-map Shortcode
    add_shortcode('eewee_map', 'themeeewee_shortcode_map_function');
    function themeeewee_shortcode_map_function($atts, $content = null) {

        extract(shortcode_atts(array(
                'address' => '',
                'zip' => '',
                'city' => '',
                'country' => '',
                'width' => '',
                'height' => '',
                'zoom' => ''
        ), $atts));

        return '
        <div class="shortcode_googlemap">
            <iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.str_replace(" ", "+", $address).',+'.trim($zip).'+'.str_replace(" ", "+", $city).',+'.str_replace(" ", "+", $country).'&amp;t=h&amp;ie=UTF8&amp;z='.$zoom.'&amp;output=embed"></iframe>
        </div>';

    }

    // Include tineMCE plugin
    locate_template('/includes/shortcodes/google-map/tinyMCE/tinyMCE.php', true);

?>