<?php
/**
 * Mediplus Lite Theme Customizer
 */

function mediplus_customize_register( $wp_customize ) {

// =====================
// Header Settings
// =====================
$wp_customize->add_section( 'mediplus_header_settings', array(
        'title'    => __( 'Header Settings', 'mediplus-lite' ),
        'priority' => 25,
    ) );

     
    // Logo Size Setting
    $wp_customize->add_setting( 'logo_size', array(
        'default'           => 100, // Default size (percentage)
        'sanitize_callback' => 'absint', // Ensure it's a positive integer
    ) );

    // Logo Size Control (Range Slider)
    $wp_customize->add_control( 'logo_size', array(
        'label'       => __( 'Logo Size (%)', 'mediplus-lite' ),
        'section'     => 'mediplus_header_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 25,  // Minimum logo size (50%)
            'max'  => 200, // Maximum logo size (200%)
            'step' => 5,   // Steps of 5%
        ),
    ) );

    // Phone Number
        $wp_customize->add_setting( 'mediplus_top_phone', array(
            'default'           => '+880 1234 56789',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( 'mediplus_top_phone', array(
            'label'   => __( 'Phone Number', 'mediplus-lite' ),
            'section' => 'mediplus_header_settings',
            'type'    => 'text',
            'input_attrs' => array( 'class' => 'pencil-icon' ),
        ) );
     

    

    // Email Address
        $wp_customize->add_setting( 'mediplus_top_email', array(
            'default'           => 'support@yourmail.com',
            'sanitize_callback' => 'sanitize_email',
        ) );

        $wp_customize->add_control( 'mediplus_top_email', array(
            'label'   => __( 'Email Address', 'mediplus-lite' ),
            'section' => 'mediplus_header_settings',
            'type'    => 'email',
            
        ) );

    //appointement button
        $wp_customize->add_setting( 'header_appointment', array(
            'default'           => 'Book appointement',
            'sanitize_callback' => 'sanitiize_text_field',
        ) );

        $wp_customize->add_control( 'header_appointment', array(
        'label'   => __( 'appointement', 'mediplus-lite' ),
        'section' => 'mediplus_header_settings',
        'type'    => 'text',
        ) );    

    //button url
        $wp_customize->add_setting( 'header_appointment_url', array(
            'default'           => '#',
            'transport'        =>'refresh',
        ) );

        $wp_customize->add_control( 'header_appointment_url', array(
            'label'   => __('Button URL', 'mediplus-lite'),
            'section' => 'mediplus_header_settings',
            'type'    => 'url',
        ));
   
// =====================



// Footer Settings
// =====================
   
//about us
    // Footer Title Setting
    $wp_customize->add_setting( 'footer_about_title', array(
        'default'           => __( 'About Us', 'mediplus-lite' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_about_title', array(
        'label'   => __( 'Footer Title', 'mediplus-lite' ),
        'section' => 'mediplus_footer_settings',
        'type'    => 'text',
    ) );

    // Footer Description Setting
    $wp_customize->add_setting( 'footer_about_text', array(
        'default'           => __( 'Your trusted partner in healthcare, dedicated to quality service.', 'mediplus-lite' ),
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'footer_about_text', array(
        'label'   => __( 'Footer Description', 'mediplus-lite' ),
        'section' => 'mediplus_footer_settings',
        'type'    => 'textarea',
    ) );

        // socialmedia about us 
    $wp_customize->add_section('mediplus_footer_settings', array(
        'title'    => __('Footer Settings', 'mediplus-lite'),
        'priority' => 30,
        ));

        $social_platforms = array('facebook', 'twitter', 'instagram', 'linkedin', 'youtube');

        foreach ($social_platforms as $platform) {
            $wp_customize->add_setting('social_' . $platform, array(
                'default'           => '#',
                'sanitize_callback' => 'esc_url',
            ));

            $wp_customize->add_control('social_' . $platform, array(
                'label'    => ucfirst($platform) . ' URL',
                'section'  => 'mediplus_footer_settings',
             'type'     => 'url',
        ));
    }
// =====================

//quicks links
    // Add setting for Footer Title
    $wp_customize->add_setting( 'footer_quicklinks_title', array(
        'default'   => get_bloginfo( 'name' ),
        'transport' => 'refresh',
    ));

    // Add control for Footer Title
    $wp_customize->add_control( 'footer_quicklinks_title', array(
        'label'   => __( 'Footer Quick Links Title', 'mediplus_lite' ),
        'section' => 'mediplus_footer_settings',
        'type'    => 'text',
    ));

    // =====================
    // Newsletter Section
    // =====================

    // 📌 Newsletter Title Setting
        $wp_customize->add_setting( 'newsletter_text_title', array(
            'default'           => __( 'Newsletter', 'mediplus-lite' ),
            'sanitize_callback' => 'sanitize_text_field', // Only allows plain text
        ) );

        $wp_customize->add_control( 'newsletter_text_title', array(
            'label'   => __( 'Newsletter Title', 'mediplus-lite' ),
            'section' => 'mediplus_footer_settings',
            'type'    => 'text',
        ) );

    // 📌 Newsletter Description Setting
        $wp_customize->add_setting( 'newsletter_text', array(
            'default'           => __( 'Subscribe to our newsletter to get all our news in your inbox.', 'mediplus-lite' ),
            'sanitize_callback' => 'wp_kses_post', // Allows safe HTML
        ) );

        $wp_customize->add_control( 'newsletter_text', array(
            'label'   => __( 'Newsletter Description', 'mediplus-lite' ),
            'section' => 'mediplus_footer_settings',
            'type'    => 'textarea',
        ) );

    // 📌 Newsletter Form Action URL
        $wp_customize->add_setting( 'newsletter_form_action', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url', // Ensures safe URLs
        ) );

        $wp_customize->add_control( 'newsletter_form_action', array(
            'label'   => __( 'Newsletter Form Action URL', 'mediplus-lite' ),
            'section' => 'mediplus_footer_settings',
            'type'    => 'url',
        ) );
// =====================
   
 
//office hours
// Open Hours Title
    $wp_customize->add_setting( 'open_hours_title', array(
        'default'           => __( 'Open Hours', 'mediplus-lite' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'open_hours_title', array(
        'label'   => __( 'Open Hours Title', 'mediplus-lite' ),
        'section' => 'mediplus_footer_settings',
        'type'    => 'text',
    ) );
// Add setting and control for each day of the week
    $days_of_week = array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' );

    foreach ( $days_of_week as $day ) {
        $wp_customize->add_setting( "office_hours_$day", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( "office_hours_$day", array(
            'label'       => __( ucfirst( $day ) . ' Office Hours', 'mediplus-lite' ),
            'section'     => 'mediplus_footer_settings',
            'type'        => 'text',
            'description' => __( 'Enter office hours for ' . ucfirst( $day ), 'mediplus-lite' ),
        ) );
    }

// =====================

//copyright section
// Add setting and control for Copyright Text
    $wp_customize->add_setting( 'copyright_text', array(
        'default'           => '© Copyright 2018  |  All Rights Reserved by',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'copyright_text', array(
        'label'       => __( 'Copyright Text', 'mediplus-lite' ),
        'section'     => 'mediplus_footer_settings',
        'type'        => 'text',
        'description' => __( 'Enter the copyright text to be displayed in the footer.', 'mediplus-lite' ),
    ) );

    // Add setting and control for the Copyright Link URL
    $wp_customize->add_setting( 'copyright_link', array(
        'default'           => 'https://www.wpthemesgrid.com',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'copyright_link', array(
        'label'       => __( 'Copyright Link URL', 'mediplus-lite' ),
        'section'     => 'mediplus_footer_settings',
        'type'        => 'url',
        'description' => __( 'Enter the URL for the copyright link.', 'mediplus-lite' ),
    ) );
// =====================


// Color Options
// =====================
    $wp_customize->add_section( 'mediplus_color_settings', array(
        'title'    => __( 'Color Options', 'mediplus-lite' ),
        'priority' => 50,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'primary_color', array(
        'default'           => '#0073e6',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'   => __( 'Primary Color', 'mediplus-lite' ),
        'section' => 'mediplus_color_settings',
    ) ) );

    // Background Color
    $wp_customize->add_setting( 'background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'label'   => __( 'Background Color', 'mediplus-lite' ),
        'section' => 'mediplus_color_settings',
    ) ) );

// =====================

// FrontPage Panel
    // =====================
    $wp_customize->add_panel( 'mediplus_frontpage_panel', array(
        'title'    => __( 'FrontPage', 'mediplus-lite' ),
        'priority' => 10,
    ) );

    // =====================
    // 📌 Add Features Section
    $wp_customize->add_section( 'mediplus_features_settings', array(
        'title'       => __( 'Features Section', 'mediplus-lite' ),
        'priority'    => 40,
        'description' => __( 'Customize the Features Section on the homepage.', 'mediplus-lite' ),
    ) );

    // 📌 Section Title
    $wp_customize->add_setting( 'features_section_title', array(
        'default'           => __( 'We Are Always Ready to Help You & Your Family', 'mediplus-lite' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'features_section_title', array(
        'label'   => __( 'Section Title', 'mediplus-lite' ),
        'section' => 'mediplus_features_settings',
        'type'    => 'text',
    ) );

    // 📌 Section Description
    $wp_customize->add_setting( 'features_section_desc', array(
        'default'           => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet.', 'mediplus-lite' ),
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'features_section_desc', array(
        'label'   => __( 'Section Description', 'mediplus-lite' ),
        'section' => 'mediplus_features_settings',
        'type'    => 'textarea',
    ) );

    // 📌 Features (Loop through 3 features)
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "feature_{$i}_icon", array(
            'default'           => 'icofont icofont-ambulance-cross',
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( "feature_{$i}_icon", array(
            'label'   => __( "Feature {$i} Icon Class", 'mediplus-lite' ),
            'section' => 'mediplus_features_settings',
            'type'    => 'text',
            'description' => __( 'Use FontAwesome or IcoFont class names (e.g., icofont-ambulance-cross).', 'mediplus-lite' ),
        ) );

        $wp_customize->add_setting( "feature_{$i}_title", array(
            'default'           => __( 'Feature Title', 'mediplus-lite' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( "feature_{$i}_title", array(
            'label'   => __( "Feature {$i} Title", 'mediplus-lite' ),
            'section' => 'mediplus_features_settings',
            'type'    => 'text',
        ) );

        $wp_customize->add_setting( "feature_{$i}_desc", array(
            'default'           => __( 'Feature description goes here.', 'mediplus-lite' ),
            'sanitize_callback' => 'wp_kses_post',
        ) );

        $wp_customize->add_control( "feature_{$i}_desc", array(
            'label'   => __( "Feature {$i} Description", 'mediplus-lite' ),
            'section' => 'mediplus_features_settings',
            'type'    => 'textarea',
        ) );
        $wp_customize->add_setting( 'features_section_title_icon', array(
            'default'           => 'icofont icofont-medical-sign-alt',
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( 'features_section_title_icon', array(
            'label'   => __( 'Section Title Icon', 'mediplus-lite' ),
            'section' => 'mediplus_features_settings',
            'type'    => 'text',
            'description' => __( 'Enter an icon class (e.g., icofont-medical-sign-alt).', 'mediplus-lite' ),
        ) );
    }
    
}

add_action( 'customize_register', 'mediplus_customize_register' );

/**
 * Sanitize checkbox input
 */
function mediplus_sanitize_checkbox( $input ) {
    return ( $input === true ) ? true : false;
}

/**
 * Sanitize select input
 */
function mediplus_sanitize_choices( $input, $setting ) {
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ) ? $input : $setting->default;
}
