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

//features
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
// =====================

// Add Section for Fun Facts
    $wp_customize->add_section( 'mediplus_fun_facts_section', array(
        'title'    => __( 'fun_facts_section', 'mediplus-lite' ),
        'priority' => 50,
    ) );

    // Add Section for Fun Facts
    $wp_customize->add_section('mediplus_lite_fun_facts_section', array(
        'title'    => __('Fun Facts Section', 'mediplus-lite'),
        'priority' => 120,
    ));

    // Define Fun Facts Items
    $fun_facts = array(
        'hospital_rooms'      => __('Hospital Rooms', 'mediplus-lite'),
        'specialist_doctors'  => __('Specialist Doctors', 'mediplus-lite'),
        'happy_patients'      => __('Happy Patients', 'mediplus-lite'),
        'years_experience'    => __('Years of Experience', 'mediplus-lite'),
    );

    // Loop through Fun Facts to create settings & controls
    foreach ($fun_facts as $key => $label) {
        // Counter Value
        $wp_customize->add_setting("mediplus_lite_{$key}_count", array(
            'default'           => '0',
            'sanitize_callback' => 'absint',
        ));
        $wp_customize->add_control("mediplus_lite_{$key}_count", array(
            'label'   => sprintf(__('Number of %s', 'mediplus-lite'), $label),
            'section' => 'mediplus_lite_fun_facts_section',
            'type'    => 'number',
        ));

        // Title Text
        $wp_customize->add_setting("mediplus_lite_{$key}_title", array(
            'default'           => $label,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("mediplus_lite_{$key}_title", array(
            'label'   => sprintf(__('Title for %s', 'mediplus-lite'), $label),
            'section' => 'mediplus_lite_fun_facts_section',
            'type'    => 'text',
        ));

        // Icon Class
        $wp_customize->add_setting("mediplus_lite_{$key}_icon", array(
            'default'           => 'icofont icofont-home',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("mediplus_lite_{$key}_icon", array(
            'label'   => sprintf(__('Icon Class for %s', 'mediplus-lite'), $label),
            'section' => 'mediplus_lite_fun_facts_section',
            'type'    => 'text',
            'description' => __('Use Icofont or FontAwesome class names (e.g., icofont-home, fa fa-hospital)', 'mediplus-lite'),
        ));
    }
// =====================

//why_choose_us_section
    // Add Section
    $wp_customize->add_section('mediplus_lite_why_choose_us_section', array(
        'title'    => __('Why Choose Us Section', 'mediplus-lite'),
        'priority' => 130,
    ));

    // Title
    $wp_customize->add_setting('mediplus_lite_why_choose_us_title', array(
        'default'           => 'We Offer Different Services To Improve Your Health',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mediplus_lite_why_choose_us_title', array(
        'label'   => __('Main Title', 'mediplus-lite'),
        'section' => 'mediplus_lite_why_choose_us_section',
        'type'    => 'text',
    ));

    // Subtitle
    $wp_customize->add_setting('mediplus_lite_why_choose_us_subtitle', array(
        'default'           => 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mediplus_lite_why_choose_us_subtitle', array(
        'label'   => __('Subtitle', 'mediplus-lite'),
        'section' => 'mediplus_lite_why_choose_us_section',
        'type'    => 'textarea',
    ));

    // Left Section Title
    $wp_customize->add_setting('mediplus_lite_why_choose_us_left_title', array(
        'default'           => 'Who We Are',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mediplus_lite_why_choose_us_left_title', array(
        'label'   => __('Left Section Title', 'mediplus-lite'),
        'section' => 'mediplus_lite_why_choose_us_section',
        'type'    => 'text',
    ));

    // Left Section Text
    $wp_customize->add_setting('mediplus_lite_why_choose_us_left_text', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra antege vel est lobortis.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('mediplus_lite_why_choose_us_left_text', array(
        'label'   => __('Left Section Text', 'mediplus-lite'),
        'section' => 'mediplus_lite_why_choose_us_section',
        'type'    => 'textarea',
    ));

    // Bullet Points (JSON)
    $wp_customize->add_setting('mediplus_lite_why_choose_us_bullets', array(
        'default'           => json_encode(array('Maecenas vitae luctus nibh.', 'Duis massa massa.', 'Aliquam feugiat interdum.')),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mediplus_lite_why_choose_us_bullets', array(
        'label'   => __('Bullet Points (comma-separated)', 'mediplus-lite'),
        'section' => 'mediplus_lite_why_choose_us_section',
        'type'    => 'text',
    ));

    // Video Link
    $wp_customize->add_setting('mediplus_lite_why_choose_us_video', array(
        'default'           => 'https://www.youtube.com/watch?v=RFVXy6CRVR4',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('mediplus_lite_why_choose_us_video', array(
        'label'   => __('Video URL', 'mediplus-lite'),
        'section' => 'mediplus_lite_why_choose_us_section',
        'type'    => 'url',
    ));
// =====================
   

}
add_action( 'customize_register', 'mediplus_customize_register' );

// services
function mediplus_lite_customize_services($wp_customize) {
    // Add Section
    $wp_customize->add_section('services_section', array(
        'title'    => __('Services Section', 'mediplus-lite'),
        'priority' => 30,
    ));

    // Section Heading
    $wp_customize->add_setting('services_heading', array(
        'default'           => 'We Offer Different Services To Improve Your Health',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_heading', array(
        'label'    => __('Section Heading', 'mediplus-lite'),
        'section'  => 'services_section',
        'settings' => 'services_heading',
        'type'     => 'text',
    ));

    // Section Description
    $wp_customize->add_setting('services_description', array(
        'default'           => 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('services_description', array(
        'label'    => __('Section Description', 'mediplus-lite'),
        'section'  => 'services_section',
        'settings' => 'services_description',
        'type'     => 'textarea',
    ));

    // Services (Dynamic Fields)
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("service_{$i}_icon", array(
            'default'           => 'icofont icofont-prescription',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("service_{$i}_icon", array(
            'label'    => __("Service {$i} Icon Class", 'mediplus-lite'),
            'section'  => 'services_section',
            'settings' => "service_{$i}_icon",
            'type'     => 'text',
        ));

        $wp_customize->add_setting("service_{$i}_title", array(
            'default'           => "Service {$i} Title",
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("service_{$i}_title", array(
            'label'    => __("Service {$i} Title", 'mediplus-lite'),
            'section'  => 'services_section',
            'settings' => "service_{$i}_title",
            'type'     => 'text',
        ));

        $wp_customize->add_setting("service_{$i}_description", array(
            'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'sanitize_callback' => 'wp_kses_post',
        ));

        $wp_customize->add_control("service_{$i}_description", array(
            'label'    => __("Service {$i} Description", 'mediplus-lite'),
            'section'  => 'services_section',
            'settings' => "service_{$i}_description",
            'type'     => 'textarea',
        ));

        $wp_customize->add_setting("service_{$i}_link", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("service_{$i}_link", array(
            'label'    => __("Service {$i} Link", 'mediplus-lite'),
            'section'  => 'services_section',
            'settings' => "service_{$i}_link",
            'type'     => 'url',
        ));
    }
}

add_action('customize_register', 'mediplus_lite_customize_services');

//call to action
function mediplus_lite_customize_register_CTA($wp_customize) {
    // Add Section
    $wp_customize->add_section('cta_section', array(
        'title'    => __('Call to Action', 'mediplus-lite'),
        'priority' => 30,
    ));

    // CTA Heading
    $wp_customize->add_setting('cta_heading', array(
        'default'           => 'Do you need Emergency Medical Care? Call @ 1234 56789',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_heading', array(
        'label'    => __('Heading', 'mediplus-lite'),
        'section'  => 'cta_section',
        'settings' => 'cta_heading',
        'type'     => 'text',
    ));

    // CTA Description
    $wp_customize->add_setting('cta_description', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor dictum turpis nec gravida.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('cta_description', array(
        'label'    => __('Description', 'mediplus-lite'),
        'section'  => 'cta_section',
        'settings' => 'cta_description',
        'type'     => 'textarea',
    ));

    // Contact Button Text
    $wp_customize->add_setting('cta_button_text', array(
        'default'           => 'Contact Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_button_text', array(
        'label'    => __('Primary Button Text', 'mediplus-lite'),
        'section'  => 'cta_section',
        'settings' => 'cta_button_text',
        'type'     => 'text',
    ));

    // Contact Button Link
    $wp_customize->add_setting('cta_button_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cta_button_link', array(
        'label'    => __('Primary Button Link', 'mediplus-lite'),
        'section'  => 'cta_section',
        'settings' => 'cta_button_link',
        'type'     => 'url',
    ));

    // Secondary Button Text
    $wp_customize->add_setting('cta_second_button_text', array(
        'default'           => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cta_second_button_text', array(
        'label'    => __('Secondary Button Text', 'mediplus-lite'),
        'section'  => 'cta_section',
        'settings' => 'cta_second_button_text',
        'type'     => 'text',
    ));

    // Secondary Button Link
    $wp_customize->add_setting('cta_second_button_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('cta_second_button_link', array(
        'label'    => __('Secondary Button Link', 'mediplus-lite'),
        'section'  => 'cta_section',
        'settings' => 'cta_second_button_link',
        'type'     => 'url',
    ));
}

add_action('customize_register', 'mediplus_lite_customize_register_CTA');

function mediplus_lite_customize_register_pricing($wp_customize) {
    // Pricing Table Section
    $wp_customize->add_section('pricing_table_section', array(
        'title'    => __('Pricing Table', 'mediplus-lite'),
        'priority' => 30,
    ));

    for ($i = 1; $i <= 3; $i++) {
        // Pricing Title
        $wp_customize->add_setting("pricing_title_$i", array(
            'default'   => "Service $i",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("pricing_title_$i", array(
            'label'   => __("Pricing Title $i", 'mediplus-lite'),
            'section' => 'pricing_table_section',
            'type'    => 'text',
        ));

        // Pricing Amount
        $wp_customize->add_setting("pricing_amount_$i", array(
            'default'   => '$199',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("pricing_amount_$i", array(
            'label'   => __("Price $i", 'mediplus-lite'),
            'section' => 'pricing_table_section',
            'type'    => 'text',
        ));

        // Pricing Icon
        $wp_customize->add_setting("pricing_icon_$i", array(
            'default'   => 'icofont-heart-beat',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("pricing_icon_$i", array(
            'label'   => __("Icon Class $i", 'mediplus-lite'),
            'section' => 'pricing_table_section',
            'type'    => 'text',
        ));

        // Pricing Description
        $wp_customize->add_setting("pricing_desc_$i", array(
            'default'   => 'Lorem ipsum dolor sit amet.',
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("pricing_desc_$i", array(
            'label'   => __("Description $i", 'mediplus-lite'),
            'section' => 'pricing_table_section',
            'type'    => 'textarea',
        ));
    }
}
add_action('customize_register', 'mediplus_lite_customize_register_pricing');

function glthemes_customize_register_blog($wp_customize) {
    // Blog Section Panel
    $wp_customize->add_section('blog_section', array(
        'title'    => __('Blog Section', 'glthemes'),
        'priority' => 30,
    ));

    // Blog Title
    $wp_customize->add_setting('blog_title', array(
        'default'           => 'Keep up with Our Most Recent Medical News.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('blog_title', array(
        'label'   => __('Blog Title', 'glthemes'),
        'section' => 'blog_section',
        'type'    => 'text',
    ));

    // Blog Subtitle
    $wp_customize->add_setting('blog_subtitle', array(
        'default'           => 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('blog_subtitle', array(
        'label'   => __('Blog Subtitle', 'glthemes'),
        'section' => 'blog_section',
        'type'    => 'textarea',
    ));

    // Section Image
    $wp_customize->add_setting('blog_section_image', array(
        'default'           => get_template_directory_uri() . '/img/section-img.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blog_section_image', array(
        'label'    => __('Section Image', 'glthemes'),
        'section'  => 'blog_section',
        'settings' => 'blog_section_image',
    )));
}
add_action('customize_register', 'glthemes_customize_register_blog');

function glthemes_customize_register_clients($wp_customize) {
    // Clients Section
    $wp_customize->add_section('clients_section', array(
        'title'    => __('Clients Section', 'glthemes'),
        'priority' => 40,
    ));

    // Enable/Disable Clients Section
    $wp_customize->add_setting('clients_enable', array(
        'default'           => true,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('clients_enable', array(
        'label'   => __('Enable Clients Section', 'glthemes'),
        'section' => 'clients_section',
        'type'    => 'checkbox',
    ));

    // Clients Images (Repeater)
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("client_image_$i", array(
            'default'           => get_template_directory_uri() . "/img/client$i.png",
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "client_image_$i", array(
            'label'    => __("Client Logo $i", 'glthemes'),
            'section'  => 'clients_section',
            'settings' => "client_image_$i",
        )));
    }
}
add_action('customize_register', 'glthemes_customize_register_clients');

function glthemes_customize_register_appointment($wp_customize) {
    // Appointment Section
    $wp_customize->add_section('appointment_section', array(
        'title'    => __('Appointment Section', 'glthemes'),
        'priority' => 50,
    ));

    // Enable/Disable Appointment Section
    $wp_customize->add_setting('appointment_enable', array(
        'default'           => true,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('appointment_enable', array(
        'label'   => __('Enable Appointment Section', 'glthemes'),
        'section' => 'appointment_section',
        'type'    => 'checkbox',
    ));

    // Appointment Title
    $wp_customize->add_setting('appointment_title', array(
        'default'           => 'We Are Always Ready to Help You. Book An Appointment',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('appointment_title', array(
        'label'   => __('Appointment Title', 'glthemes'),
        'section' => 'appointment_section',
        'type'    => 'text',
    ));

    // Appointment Subtitle
    $wp_customize->add_setting('appointment_subtitle', array(
        'default'           => 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('appointment_subtitle', array(
        'label'   => __('Appointment Subtitle', 'glthemes'),
        'section' => 'appointment_section',
        'type'    => 'textarea',
    ));

    // Appointment Section Image
    $wp_customize->add_setting('appointment_section_image', array(
        'default'           => get_template_directory_uri() . '/img/contact-img.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'appointment_section_image', array(
        'label'    => __('Appointment Section Image', 'glthemes'),
        'section'  => 'appointment_section',
        'settings' => 'appointment_section_image',
    )));
}
add_action('customize_register', 'glthemes_customize_register_appointment');

function glthemes_customize_register_newsletter($wp_customize) {
    // Newsletter Section
    $wp_customize->add_section('newsletter_section', array(
        'title'    => __('Newsletter Section', 'glthemes'),
        'priority' => 60,
    ));

    // Enable/Disable Newsletter Section
    $wp_customize->add_setting('newsletter_enable', array(
        'default'           => true,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('newsletter_enable', array(
        'label'   => __('Enable Newsletter Section', 'glthemes'),
        'section' => 'newsletter_section',
        'type'    => 'checkbox',
    ));

    // Newsletter Title
    $wp_customize->add_setting('newsletter_title', array(
        'default'           => 'Sign up for newsletter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('newsletter_title', array(
        'label'   => __('Newsletter Title', 'glthemes'),
        'section' => 'newsletter_section',
        'type'    => 'text',
    ));

    // Newsletter Subtitle
    $wp_customize->add_setting('newsletter_subtitle', array(
        'default'           => 'Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu, homero alterum.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('newsletter_subtitle', array(
        'label'   => __('Newsletter Subtitle', 'glthemes'),
        'section' => 'newsletter_section',
        'type'    => 'textarea',
    ));

    // Newsletter Form Action URL
    $wp_customize->add_setting('newsletter_form_action', array(
        'default'           => 'mail/mail.php',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('newsletter_form_action', array(
        'label'   => __('Form Action URL', 'glthemes'),
        'section' => 'newsletter_section',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'glthemes_customize_register_newsletter');




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
