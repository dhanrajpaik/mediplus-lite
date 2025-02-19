<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package mediplus-lite
 */

function mediplus_lite_preloader(){
    ?>
    <?php if ( get_theme_mod( 'enable_preloader', true ) ) : ?>
        <div id="preloader">
            <div class="spinner"></div>
        </div>
    <?php endif; ?>
    <?php
} 

/**
 * Header Function
 *
 * @return void
 */
function mediplus_lite_header(){
    ?>
    <!-- Header Area -->
    <header class="header" >
        <?php mediplus_lite_topbar(); ?>
        <!-- Header Inner -->
         <?php mediplus_lite_header_inner(); ?>
        
    </header>
    <!-- End Header Area -->
    <?php
}

function mediplus_lite_header_inner(){
   ?>
   <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                    <?php
                    /**
                     * header_inner
                     * 
                     * @hooked mediplus_lite_header_site_identity_desc     - 30     
                     * @hooked mediplus_lite_mainmenu        - 40 
                     * @hooked mediplus_lite_header_appointment   -60 
                    */
                    do_action( 'mediplus_lite_header_inner' );
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
   <?php
   
}

function mediplus_lite_header_site_identity_desc() {
    ?>
    <div class="col-lg-3 col-md-3 col-12">
    <?php
        if ( function_exists( 'the_custom_logo' ) ) {
            $logo_size = get_theme_mod( 'logo_size', 100 ); // Default 100%
            ?>
            <div class="site-logo" style="max-width: <?php echo esc_attr( $logo_size ); ?>%;">
                <?php the_custom_logo(); ?>
            </div>
            <?php
        }

        //site desription
        mediplus_lite_site_description()
        ?>
       
    </div>
    <?php
}
add_action('mediplus_lite_header_inner','mediplus_lite_header_site_identity_desc',30);



function mediplus_lite_mainmenu(){
    ?>
    <div class="col-lg-7 col-md-9 col-12">
        <!-- Main Menu -->
         <?php
            wp_nav_menu( array(
                'theme_location'  => 'main-menu',
                'container'       => 'nav',
                'container_class' => 'main-navigation active',
                'menu_class'      => 'nav menu', // Add this class for styling
                'aria_label'      => esc_attr__('Main Menu', 'mediplus-lite'),
            ));
                               
            ?>
            <!--/ End Main Menu -->
        </div>
    <?php
}
add_action('mediplus_lite_header_inner','mediplus_lite_mainmenu', 40);

function mediplus_lite_topbar(){
    ?>
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <?php
                     /**
                     * Topbar
                     * 
                     * @hooked mediplus_lite_topbar_menu     - 10     
                     * @hooked mediplus_lite_header_top_contact         - 20  
                    */
                    do_action( 'mediplus_lite_topbar' );
                ?>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <?php
}

function mediplus_lite_topbar_menu(){
    ?>
    <div class="col-lg-6 col-md-5 col-12">
        <?php 
            wp_nav_menu( array(
                'theme_location' => 'top-bar',
                'container'      => 'nav',
                'container_class' => 'top-link'
            ) );
        ?>
        <!-- End Contact -->
    </div>
    <?php
}
add_action( 'mediplus_lite_topbar', 'mediplus_lite_topbar_menu',10 );

/**
 * Header Top Contact
 *
 * @return void
 */

function mediplus_lite_header_top_contact(){
    $topphone = get_theme_mod( 'mediplus_top_phone', '+880 1234 56789' );
    $topemail = get_theme_mod( 'mediplus_top_email', 'support@yourmail.com' );
    ?>  
        <div class="col-lg-6 col-md-7 col-12">
            <?php if ( $topphone || $topemail ) { ?>
            <!-- Top Contact --> 
            <ul class="top-contact">
                <?php if( $topphone ) { ?>
                    <li><i class="fa fa-phone"></i> <?php echo esc_html( $topphone ); ?></li>
                <?php }if( $topemail ){
                    ?>
                    <li><i class="fa fa-envelope"></i> 
                        <a href="mailto:<?php echo esc_attr( $topemail ); ?>">
                            <?php echo esc_html( $topemail ); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
        <!-- End Top Contact -->
    <?php
}
add_action( 'mediplus_lite_topbar', 'mediplus_lite_header_top_contact',20 );

function mediplus_lite_mobile_nav( ){
    ?>
    <!-- Mobile Nav -->
        <div class="mobile-nav"></div>
    <!-- End Mobile Nav -->
    <?php
}

//appointement button
function mediplus_lite_header_appointment(){
    ?>
    <div class="col-lg-2 col-12">
        <div class="get-quote">
        <a href="appointment.html" class="btn">Book Appointment</a>
        </div>
        </div>
        
    <?php
}
add_action('mediplus_lite_header_inner', 'mediplus_lite_header_appointment', 60);


function mediplus_lite_site_description(){
    ?>
    <!-- Display Site Title & Description -->
    <div class="site-title-description">
        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
    <?php
}

//footer 
    function mediplus_lite_footer_aboutus(){
        ?>
        <div class="col-lg-3 col-md-6 col-12">
        <div class="single-footer">
            <h2><?php echo esc_html( get_theme_mod( 'footer_about_title', __( 'About Us', 'mediplus-lite' ) ) ); ?></h2>
            <p><?php echo wp_kses_post( get_theme_mod( 'footer_about_text', 'Your trusted partner in healthcare, dedicated to quality service.' ) ); ?></p>

            <!-- Dynamic Social Media Links -->
            <div class="social-media">
                <?php 
                $social_links = array(
                    'facebook'  => get_theme_mod('social_facebook', '#'),
                    'twitter'   => get_theme_mod('social_twitter', '#'),
                    'instagram' => get_theme_mod('social_instagram', '#'),
                    'linkedin'  => get_theme_mod('social_linkedin', '#'),
                    'youtube'   => get_theme_mod('social_youtube', '#')
                );

                foreach ($social_links as $platform => $url) {
                    if ($url && $url !== '#') {
                        echo '<a href="'. esc_url($url) .'" target="_blank" class="social-icon '. esc_attr($platform) .'">
                                <i class="fa fa-'. esc_attr($platform) .'"></i>
                            </a>';
                    }
                }
                ?>
            </div>
        </div>
        </div>
        <?php
    }
    add_action('mediplus_lite_footer','mediplus_lite_footer_aboutus', 10);

    function mediplus_lite_footer_quicklinks(){
        ?>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer f-link">
                <h2 class="footer-quick-links-title">
                    <?php 
                    // Call the setting from the customizer, fall back to the site name if not set
                    echo get_theme_mod( 'footer_quicklinks_title', get_bloginfo( 'name' ) ); 
                    ?>
                </h2>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-2',
                    'container'      => 'nav',
                    'container_class' => 'footer-menu',
                    'menu_class'     => 'menu',
                    'fallback_cb'    => false,
                ) );
                ?>
            </div>
        </div>
        <?php
    }
    add_action('mediplus_lite_footer','mediplus_lite_footer_quicklinks',20);

    function mediplus_lite_footer_office_hours() {
    ?>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="single-footer">
                <h2><?php echo esc_html( get_theme_mod( 'open_hours_title', __( 'Open Hours', 'mediplus-lite' ) ) ); ?></h2>

                <?php
                // Array for the days of the week
                $days_of_week = array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' );

                // Initialize a flag to check if any hours are set
                $any_hours_set = false;
                ?>

                <ul class="time-sidual">
                    <?php
                    // Loop through each day of the week
                    foreach ( $days_of_week as $day ) :
                        // Get the office hours for each day from the Customizer
                        $office_hours = get_theme_mod( "office_hours_$day", '' );

                        if ( ! empty( $office_hours ) ) :
                            $any_hours_set = true;
                            ?>
                            <li class="day"><?php echo esc_html( ucfirst( $day ) . ': ' . $office_hours ); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>

                <?php if ( ! $any_hours_set ) : ?>
                    <p><?php echo esc_html__( 'Office hours not set.', 'mediplus-lite' ); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <?php
    }
    add_action('mediplus_lite_footer','mediplus_lite_footer_office_hours',30);

    function mediplus_lite_footer_newsletter() {
        ?>
        <div class="col-lg-3 col-md-6 col-12">
        <div class="single-footer">
            <h2><?php echo esc_html( get_theme_mod( 'newsletter_text_title', __( 'Newsletter', 'mediplus-lite' ) ) ); ?></h2>
            <p><?php echo wp_kses_post( get_theme_mod( 'newsletter_text', 'Subscribe to our newsletter to get all our news in your inbox.' ) ); ?></p>

            <form action="<?php echo esc_url( get_theme_mod( 'newsletter_form_action', '#' ) ); ?>" method="post" class="newsletter-inner">
                <input name="email" placeholder="<?php esc_attr_e( 'Your email address', 'mediplus-lite' ); ?>" class="common-input" required="" type="email">
                <button class="button"><i class="icofont icofont-paper-plane"></i></button>
            </form>
        </div>
        </div>
        <?php
    }
    add_action('mediplus_lite_footer','mediplus_lite_footer_newsletter',40);

    function mediplus_lite_footer_copyright() {
        ?>
        <div class="col-lg-12 col-md-12 col-12">
        <div class="copyright-content">
            <p>
                <?php 
                // Get the copyright text from the Customizer
                $copyright_text = get_theme_mod( 'copyright_text', '© Copyright 2018  |  All Rights Reserved by' );
                // Get the copyright link from the Customizer
                $copyright_link = get_theme_mod( 'copyright_link', 'https://www.wpthemesgrid.com' );
                ?>
                <?php echo esc_html( $copyright_text ); ?> 
                <a href="<?php echo esc_url( $copyright_link ); ?>" target="_blank">
                    <?php echo esc_url( $copyright_link ); ?>
                </a>
            </p>
        </div>
        </div>
        <?php
    }

    function mediplus_lite_footer(){
        ?>
        <div class="footer-top">
                    <div class="container">
                        <div class="row">
                        <?php
                        /**
                         * Topbar
                         * 
                         * @hooked mediplus_lite_footer_aboutus    - 10     
                         * @hooked mediplus_lite_footer_quicklinks         - 20 
                         *  @hooked mediplus_lite_footer_office_hours        - 30 
                         * @hooked mediplus_lite_footer_newsletter        - 40 
                        */
                        do_action( 'mediplus_lite_footer');
                    ?>
                        </div>
                    </div>
                </div>
        

        <?php
    }
    
//features
function mediplus_lite_frontpage_features(){
    
    ?>
    <section class="Features section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>
                        <i class="<?php echo esc_attr( get_theme_mod( 'features_section_title_icon', 'icofont icofont-medical-sign-alt' ) ); ?>"></i>
                        <?php echo esc_html( get_theme_mod( 'features_section_title', __( 'We Are Always Ready to Help You & Your Family', 'mediplus-lite' ) ) ); ?>
                    </h2>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/section-img.png' ); ?>" alt="#">
                    <p><?php echo wp_kses_post( get_theme_mod( 'features_section_desc', __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet.', 'mediplus-lite' ) ) ); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
                <div class="col-lg-4 col-12">
                    <div class="single-features">
                        <div class="signle-icon">
                            <i class="<?php echo esc_attr( get_theme_mod( "feature_{$i}_icon", 'icofont icofont-ambulance-cross' ) ); ?>"></i>
                        </div>
                        <h3><?php echo esc_html( get_theme_mod( "feature_{$i}_title", __( 'Feature Title', 'mediplus-lite' ) ) ); ?></h3>
                        <p><?php echo wp_kses_post( get_theme_mod( "feature_{$i}_desc", __( 'Feature description goes here.', 'mediplus-lite' ) ) ); ?></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    </section>
    <?php 
}

function mediplus_lite_frontpage_fun_facts(){
    ?>
    		<!-- Start Fun-facts -->
		<div id="fun-facts" class="fun-facts section overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-home"></i>
							<div class="content">
								<span class="counter">3468</span>
								<p>Hospital Rooms</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-user-alt-3"></i>
							<div class="content">
								<span class="counter">557</span>
								<p>Specialist Doctors</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont-simple-smile"></i>
							<div class="content">
								<span class="counter">4379</span>
								<p>Happy Patients</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Fun -->
						<div class="single-fun">
							<i class="icofont icofont-table"></i>
							<div class="content">
								<span class="counter">32</span>
								<p>Years of Experience</p>
							</div>
						</div>
						<!-- End Single Fun -->
					</div>
				</div>
			</div>
		</div>
		<!--/ End Fun-facts -->
    <?php
}