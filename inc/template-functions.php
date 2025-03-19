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
//header
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
						 * @hooked mediplus_lite_topbar     - 10     
						 * @hooked mediplus_lite_         - 20  
						*/
						do_action( 'mediplus_lite_topbar' );
					?>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<?php
	}
	add_action('meediplus_lite_front_page','mediplus_lite_topbar',10);

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
	//quicks links
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
	//office hours

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
                    <?php
                    /**
                     * Topbar
                     * 
                     * @hooked mediplus_lite_features_section_title    - 10     
                     * @hooked mediplus_lite_features_single_features        - 20  
                    */
                    do_action( 'mediplus_lite_frontpage_features' );
                    ?>
       
    </div>
    </section>
    <?php 
}

add_action('mediplus_lite_front_page','mediplus_lite_frontpage_features', 10);

function mediplus_lite_features_section_title(){
    ?>
    <div class="row">
    
        <div class="col-lg-12">
            <div class="section-title">
                <h2>
                        <i class="<?php echo esc_attr( get_theme_mod( 'features_section_title_icon' ) ); ?>"></i>
                        <?php echo esc_html( get_theme_mod( 'features_section_title', __( 'We Are Always Ready to Help You & Your Family', 'mediplus-lite' ) ) ); ?>
                    </h2>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/section-img.png' ); ?>" alt="#">
                    <p><?php echo wp_kses_post( get_theme_mod( 'features_section_desc', __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet.', 'mediplus-lite' ) ) ); ?></p>
            </div>
        </div>
    </div>
    
    <?php
}
add_action('mediplus_lite_frontpage_features','mediplus_lite_features_section_title',10);

function mediplus_lite_features_single_features(){
    ?>
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
    <?php
}
add_action('mediplus_lite_frontpage_features','mediplus_lite_features_single_features',20);

//funfacts
function mediplus_lite_frontpage_fun_facts(){
	$fun_facts = array(
        'hospital_rooms'      => __('Hospital Rooms', 'mediplus-lite'),
        'specialist_doctors'  => __('Specialist Doctors', 'mediplus-lite'),
        'happy_patients'      => __('Happy Patients', 'mediplus-lite'),
        'years_experience'    => __('Years of Experience', 'mediplus-lite'),
    );
    ?>
    <!-- Start Fun-facts -->
    <div id="fun-facts" class="fun-facts section overlay">
        <div class="container">
            <div class="row">
                <?php foreach ($fun_facts as $key => $label) : ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-fun">
                            <i class="<?php echo esc_attr(get_theme_mod("mediplus_lite_{$key}_icon", 'icofont icofont-home')); ?>"></i>
                            <div class="content">
                                <span class="counter"><?php echo esc_html(get_theme_mod("mediplus_lite_{$key}_count", 0)); ?></span>
                                <p><?php echo esc_html(get_theme_mod("mediplus_lite_{$key}_title", $label)); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!--/ End Fun-facts -->
    <?php
}
add_action('mediplus_lite_front_page','mediplus_lite_frontpage_fun_facts', 20);

function mediplus_lite_frontpage_why_choose_us() {
    ?>
    <!-- Start Why choose -->
    <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php mediplus_lite_why_choose_us_title_section(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <?php mediplus_lite_why_choose_us_left_section(); ?>
                </div>
                <div class="col-lg-6 col-12">
                    <?php mediplus_lite_why_choose_us_right_section(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why choose -->
    <?php
}
add_action('mediplus_lite_homepage', 'mediplus_lite_frontpage_why_choose_us', 20);

	function mediplus_lite_why_choose_us_title_section() {
		?>
		<div class="section-title">
			<h2><?php echo esc_html(get_theme_mod('mediplus_lite_why_choose_us_title', 'We Offer Different Services To Improve Your Health')); ?></h2>
			<img src="<?php echo esc_url(get_template_directory_uri() . '/img/section-img.png'); ?>" alt="#">
			<p><?php echo esc_html(get_theme_mod('mediplus_lite_why_choose_us_subtitle', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet.')); ?></p>
		</div>
		<?php
	}
	function mediplus_lite_why_choose_us_left_section() {
		$bullets = get_theme_mod('mediplus_lite_why_choose_us_bullets', '[]');
		$bullets = json_decode($bullets, true);
		?>
		<div class="choose-left">
			<h3><?php echo esc_html(get_theme_mod('mediplus_lite_why_choose_us_left_title', 'Who We Are')); ?></h3>
			<p><?php echo esc_html(get_theme_mod('mediplus_lite_why_choose_us_left_text', '')); ?></p>
			<div class="row">
				<div class="col-lg-6">
					<ul class="list">
						<?php
						if (!empty($bullets) && is_array($bullets)) {
							$half = ceil(count($bullets) / 2);
							foreach (array_slice($bullets, 0, $half) as $bullet) {
								echo '<li><i class="fa fa-caret-right"></i> ' . esc_html($bullet) . '</li>';
							}
						}
						?>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="list">
						<?php
						if (!empty($bullets) && is_array($bullets)) {
							foreach (array_slice($bullets, $half) as $bullet) {
								echo '<li><i class="fa fa-caret-right"></i> ' . esc_html($bullet) . '</li>';
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php
	}
	function mediplus_lite_why_choose_us_right_section() {
    ?>
    <div class="choose-right">
        <div class="video-image">
            <!-- Video Animation -->
            <div class="promo-video">
                <div class="waves-block">
                    <div class="waves wave-1"></div>
                    <div class="waves wave-2"></div>
                    <div class="waves wave-3"></div>
                </div>
            </div>
            <!-- End Video Animation -->
            <a href="<?php echo esc_url(get_theme_mod('mediplus_lite_why_choose_us_video', 'https://www.youtube.com/watch?v=RFVXy6CRVR4')); ?>" 
               class="video video-popup mfp-iframe">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
    <?php
}

function mediplus_lite_frontpage_call_to_action(){
    ?>
    <!-- Start Call to Action -->
    <section class="call-action overlay" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="content">
                        <h2><?php echo esc_html(get_theme_mod('cta_heading', 'Do you need Emergency Medical Care? Call @ 1234 56789')); ?></h2>
                        <p><?php echo esc_html(get_theme_mod('cta_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor dictum turpis nec gravida.')); ?></p>
                        <div class="button">
                            <a href="<?php echo esc_url(get_theme_mod('cta_button_link', '#')); ?>" class="btn">
                                <?php echo esc_html(get_theme_mod('cta_button_text', 'Contact Now')); ?>
                            </a>
                            <a href="<?php echo esc_url(get_theme_mod('cta_second_button_link', '#')); ?>" class="btn second">
                                <?php echo esc_html(get_theme_mod('cta_second_button_text', 'Learn More')); ?>
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Call to Action -->
    <?php
}
function mediplus_lite_frontpage_start_service(){
    ?>
    <!-- Start service -->
    <section class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo esc_html(get_theme_mod('services_heading', 'We Offer Different Services To Improve Your Health')); ?></h2>
                        <img src="img/section-img.png" alt="#">
                        <p><?php echo esc_html(get_theme_mod('services_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php for ($i = 1; $i <= 6; $i++) : ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Service -->
                        <div class="single-service">
                            <i class="<?php echo esc_attr(get_theme_mod("service_{$i}_icon", 'icofont icofont-prescription')); ?>"></i>
                            <h4><a href="<?php echo esc_url(get_theme_mod("service_{$i}_link", '#')); ?>">
                                <?php echo esc_html(get_theme_mod("service_{$i}_title", "Service {$i} Title")); ?>
                            </a></h4>
                            <p><?php echo esc_html(get_theme_mod("service_{$i}_description", 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.')); ?></p>    
                        </div>
                        <!-- End Single Service -->
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <!--/ End service -->
    <?php
}

function Mediplus_lite_frontpage_pricing_table(){
    ?>
    <!-- Pricing Table -->
		<!-- Pricing Table -->
		<section class="pricing-table section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo esc_html(get_theme_mod('pricing_section_title', 'We Provide You The Best Treatment In Reasonable Price')); ?></h2>
                        <img src="img/section-img.png" alt="#">
                        <p><?php echo esc_html(get_theme_mod('pricing_section_desc', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="single-table">
                            <div class="table-head">
                                <div class="icon">
                                    <i class="<?php echo esc_attr(get_theme_mod("pricing_icon_$i", 'icofont-heart-beat')); ?>"></i>
                                </div>
                                <h4 class="title"><?php echo esc_html(get_theme_mod("pricing_title_$i", "Service $i")); ?></h4>
                                <div class="price">
                                    <p class="amount"><?php echo esc_html(get_theme_mod("pricing_amount_$i", '$199')); ?><span>/ Per Visit</span></p>
                                </div>    
                            </div>
                            <p><?php echo esc_html(get_theme_mod("pricing_desc_$i", 'Lorem ipsum dolor sit amet.')); ?></p>
                            <div class="table-bottom">
                                <a class="btn" href="#">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>    
        </div>    
    </section> 
		<!--/ End Pricing Table -->
    <?php
}

function mediplus_lite_frontpage_blog_area(){
    ?>
  <section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2><?php echo esc_html(get_theme_mod('blog_title', 'Keep up with Our Most Recent Medical News.')); ?></h2>
                    <img src="<?php echo esc_url(get_theme_mod('blog_section_image', get_template_directory_uri() . '/img/section-img.png')); ?>" alt="#">
                    <p><?php echo esc_html(get_theme_mod('blog_subtitle', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts')); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3, // Fetch latest 3 posts
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-news">
                    <div class="news-head">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date"><?php echo get_the_date(); ?></div>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="text"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No recent blog posts available.</p>';
            endif;
            ?>
        </div>
    </div>
	</section>
    <?php
}

function mediplus_lite_frontpage_client(){
    ?>
    
		<?php if (get_theme_mod('clients_enable', true)) : ?>
		<!-- Start Clients Section -->
		<div class="clients overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="owl-carousel clients-slider">
							<?php for ($i = 1; $i <= 6; $i++) :
								$client_logo = get_theme_mod("client_image_$i", get_template_directory_uri() . "/img/client$i.png");
								if ($client_logo) : ?>
									<div class="single-clients">
										<img src="<?php echo esc_url($client_logo); ?>" alt="Client Logo <?php echo $i; ?>">
									</div>
							<?php endif;
							endfor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Clients Section -->
	<?php endif; ?>
		
    <?php
}

function mediplus_lite_frontpage_Start_Appointment(){
    ?>
   <?php if (get_theme_mod('appointment_enable', true)) : ?>
    <!-- Start Appointment -->
    <section class="appointment">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2><?php echo esc_html(get_theme_mod('appointment_title', 'We Are Always Ready to Help You. Book An Appointment')); ?></h2>
                        <img src="<?php echo esc_url(get_theme_mod('appointment_section_image', get_template_directory_uri() . '/img/section-img.png')); ?>" alt="#">
                        <p><?php echo esc_html(get_theme_mod('appointment_subtitle', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <form class="form" action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <input name="email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <input name="phone" type="text" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Department</option>
                                        <option>Cardiac Clinic</option>
                                        <option>Neurology</option>
                                        <option>Dentistry</option>
                                        <option>Gastroenterology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Doctor</option>
                                        <option>Dr. Akther Hossain</option>
                                        <option>Dr. Dery Alex</option>
                                        <option>Dr. Jovis Karon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Date" id="datepicker">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <textarea name="message" placeholder="Write Your Message Here....."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-md-4 col-12">
                                <div class="form-group">
                                    <div class="button">
                                        <button type="submit" class="btn">Book An Appointment</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 col-12">
                                <p>( We will confirm via a Text Message )</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="appointment-image">
                        <img src="<?php echo esc_url(get_theme_mod('appointment_section_image', get_template_directory_uri() . '/img/contact-img.png')); ?>" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment -->
	<?php endif; ?>

    <?php
}

function mediplus_lite_frontpage_Start_Newsletter_Area(){
    ?>
    <?php if (get_theme_mod('newsletter_enable', true)) : ?>
    <!-- Start Newsletter Area -->
    <section class="newsletter section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- Start Newsletter Text -->
                    <div class="subscribe-text">
                        <h6><?php echo esc_html(get_theme_mod('newsletter_title', 'Sign up for newsletter')); ?></h6>
                        <p><?php echo esc_html(get_theme_mod('newsletter_subtitle', 'Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu, homero alterum.')); ?></p>
                    </div>
                    <!-- End Newsletter Text -->
                </div>
                <div class="col-lg-6 col-12">
                    <!-- Start Newsletter Form -->
                    <div class="subscribe-form">
                        <form action="<?php echo esc_url(get_theme_mod('newsletter_form_action', 'mail/mail.php')); ?>" method="post" target="_blank" class="newsletter-inner">
                            <input name="EMAIL" placeholder="Your email address" class="common-input" required="" type="email">
                            <button class="btn">Subscribe</button>
                        </form>
                    </div>
                    <!-- End Newsletter Form -->
                </div>
            </div>
        </div>
    </section>
    <!-- /End Newsletter Area -->
	<?php endif; ?>

		
    <?php
}