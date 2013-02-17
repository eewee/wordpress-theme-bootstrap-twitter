<?php
function eewee_get_address_sections() {
        $eewee_sections = array();

        $eewee_sections[] = array("id" => "eewee_address_layout",
                                "name" => __('Layout Settings', 'eewee'));

        return $eewee_sections;
}

function eewee_get_address_settings() {
    $eewee_settings = array();

    ### address SETTINGS
    #######################################################################################
    $eewee_settings[] = array(
        "name" => "Logo",
        "desc" => __('Paste the full Image URL of your logo.', 'eewee'),
        "id" => "eewee_address_logo",
        "std" => "",
        "type" => "image",
        "section" => "eewee_address_layout");	

    $eewee_settings[] = array(
        "name" => __('Company', 'eewee'),
        "desc" => "address of your company",
        "id" => "eewee_address_company",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Address', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_address1",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Complement address', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_address2",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('City', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_city",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Zip', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_zip",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );
    
    $eewee_settings[] = array(
        "name" => __('Country', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_country",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Phone 1', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_phone1",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Phone 2', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_phone2",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Phone 3', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_phone3",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Mobile', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_mobile",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Fax', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_fax",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('Email', 'eewee'),
        "desc" => "",
        "id" => "eewee_address_email",
        "std" => '',
        "type" => "text",
        "section" => "eewee_address_layout"
        );

    $eewee_settings[] = array(
        "name" => __('About', 'eewee'),
        "desc" => __('Description of your company.', 'eewee'),
        "id" => "eewee_address_about",
        "std" => "",
        "type" => "html",
        "section" => "eewee_address_layout");
    
    $eewee_settings[] = array(
        "name" => __('Google map', 'eewee'),
        "desc" => __('Paste your google map code here.', 'eewee'),
        "id" => "eewee_address_gmap",
        "std" => "",
        "type" => "html",
        "section" => "eewee_address_layout");

    $eewee_settings[] = array(
        "name" => __('Google analytics', 'eewee'),
        "desc" => __('Paste your google analytics code here.', 'eewee'),
        "id" => "eewee_address_ganalytics",
        "std" => "",
        "type" => "textarea",
        "section" => "eewee_address_layout");

    return $eewee_settings;
}
?>