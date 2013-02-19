<?php
function eewee_get_address_sections() {
        $eewee_sections = array();

        $eewee_sections[] = array("id" => "eewee_address_layout",
                                "name" => __('Layout Settings', 'eewee-bt'));

        return $eewee_sections;
}

function eewee_get_address_settings() {
    $eewee_settings = array();

    ### address SETTINGS
    #######################################################################################
    $eewee_settings[] = array(
        "name" => "Logo",
        "desc" => __('Paste the full Image URL of your logo.', 'eewee-bt'),
        "id" => "eewee_address_logo",
        "std" => "",
        "type" => "image",
        "section" => "eewee_address_layout");	

    $eewee_settings[] = array(
        "name" => __('Company', 'eewee-bt'),
        "desc" => "address of your company",
        "id" => "eewee_address_company",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Address', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_address1",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Complement address', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_address2",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('City', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_city",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Zip', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_zip",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );
    
    $eewee_settings[] = array(
        "name" => __('Country', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_country",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Phone 1', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_phone1",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Phone 2', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_phone2",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Phone 3', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_phone3",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Mobile', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_mobile",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Fax', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_fax",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Email', 'eewee-bt'),
        "desc" => "",
        "id" => "eewee_address_email",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('About', 'eewee-bt'),
        "desc" => __('Description of your company.', 'eewee-bt'),
        "id" => "eewee_address_about",
        "std" => "",
        "type" => "html",
        "section" => "eewee_address_layout");
    
    $eewee_settings[] = array(
        "name" => __('Google map', 'eewee-bt'),
        "desc" => __('Paste your google map code here.', 'eewee-bt'),
        "id" => "eewee_address_gmap",
        "std" => "",
        "type" => "html",
        "section" => "eewee_address_layout");

    $eewee_settings[] = array(
        "name" => __('Google analytics', 'eewee-bt'),
        "desc" => __('Paste your google analytics code here.', 'eewee-bt'),
        "id" => "eewee_address_ganalytics",
        "std" => "",
        "type" => "textarea",
        "section" => "eewee_address_layout");

    return $eewee_settings;
}
?>