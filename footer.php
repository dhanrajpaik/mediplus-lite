<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediplus-lite
 */

?>

			<!-- Footer Area -->
            <footer id="footer" class="footer ">
			<!-- Footer Top -->
			<?php  mediplus_lite_footer() ?>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<?php mediplus_lite_footer_copyright() ?>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		

            <?php wp_footer(); ?>
        </footer>
</body>
</html>
