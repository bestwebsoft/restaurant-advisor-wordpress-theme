<?php
/**
* The template for displaying site footer
*
* @package BestWebSoft
* @subpackage Restaurant Advisor
* @since Restaurant Advisor 1.3
**/
?>
			<footer class="advisor-site-footer">
			<div class="advisor-footer-container">
				<?php $adress = get_theme_mod('advisor_info_adress');
				$phone = get_theme_mod('advisor_info_phone');
				$email = get_theme_mod('advisor_info_email');
				$logo_url = get_theme_mod( 'advisor_footer_logo' );
				if (  ! empty( $logo_url ) || ! empty( $adress ) || ! empty( $phone ) || ! empty( $email ) ) {
					if ( empty( $adress ) && empty( $phone ) && empty( $email ) ) { ?>
						<div id="advisor-logo-contact-alone">
					<?php } else { ?>
						<div id="advisor-logo-contact">
					<?php }
					if ( ! empty( $logo_url ) ) { ?>
						<div class="advisor-logo-footer">
							<a href="<?php echo esc_url( home_url() ); ?>">
								<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							</a>
						</div><!-- .advisor-logo-footer -->
					<?php }
					if ( ! empty( $adress ) || ! empty( $phone ) || ! empty( $email ) ) { ?>
						<div class='advisor-contact-footer'>
							<?php if ( ! empty( $adress ) ) {
								echo '<p id="advisor-address"><i class="fa fa-map-marker"></i><span class="advisor-contact-footer-data">' . sanitize_text_field( $adress ) . '</span></p>';
							}  
							if ( ! empty( $phone ) ) {
						 		echo '<p id="advisor-phone-footer"><i class="fa fa-phone"></i><span class="advisor-contact-footer-data">' . sanitize_text_field( $phone ) . '</span></p>';
						 	}
						 	if ( ! empty( $email ) ) {
						 		echo '<p id="advisor-contact-us"><a href="mailto:' . esc_attr( $email ) . '"><i class="fa fa-envelope"></i><span class="advisor-contact-footer-data">' . __( 'Contact us', 'restaurant-advisor' ) . '</a></span></p>';
						 	}  ?>
						</div><!-- .advisor-contact-footer -->
					<?php } ?>
					</div> <!-- .advisor-logo-contact -->
					<div class="advisor-nav-footer-container">
				<?php } else { ?>
					<div class="advisor-nav-footer-container-alone">
				<?php } ?>
						<div class='advisor-nav-footer'>
							<div class='advisor-top-footer'>
							<?php wp_nav_menu( array( 
								'theme_location'  => 'footer',
								'before'          => '<i class="fa fa-angle-right"></i>',
							) ); ?>
							<div class="advisor-clear"></div>
							</div> <!-- .advisor-top-footer -->
							<div class='advisor-widgets advisor-widget-footer'>
								<?php if( is_active_sidebar( 'footer_widget' ) ) {
									dynamic_sidebar( 'footer_widget' );
								} ?>
								<div class="advisor-clear"></div>
							</div> <!-- .advisor-widget-footer -->
						</div> <!-- .advisor-nav-footer -->
					</div> <!-- .advisor-nav-footer-container or .advisor-nav-footer-container-alone -->
					<div class="advisor-clear"></div>
					<div class="advisor-copyright">
						<p><?php _e( 'Copyright', 'restaurant-advisor' ); ?> &copy; <?php echo current_time( 'Y' ); ?> <span id="advisor_copyright_author_name">
							<?php $author = wp_get_theme();
							echo sanitize_text_field( $author->get( 'Author' ) ); ?>.</span></p>
					</div> <!-- .advisor-copyright -->
				</div> <!-- .advisor-footer-container -->
			</footer>
		</div> <!-- .advisor-wrapper -->
	<?php wp_footer(); ?>
	</body>
</html>