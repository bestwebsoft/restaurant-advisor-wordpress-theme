<?php
/**
 * The template for displaying site footer
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/
?>
<footer class="advisor-site-footer">
	<div class="advisor-footer-container">
		<?php $address = get_theme_mod( 'advisor_info_address' );
		$phone         = get_theme_mod( 'advisor_info_phone' );
		$email         = get_theme_mod( 'advisor_info_email' );
		$logo_url      = get_theme_mod( 'advisor_footer_logo' );

		if ( ! empty( $logo_url ) || ! empty( $address ) || ! empty( $phone ) || ! empty( $email ) ) {
			$contact_block_id       = ( empty( $address ) && empty( $phone ) && empty( $email ) ) ? 'advisor-logo-contact-alone' : 'advisor-logo-contact';
			$footer_container_class = 'advisor-nav-footer-container'; ?>
			<div id="<?php echo $contact_block_id; ?>">
				<?php if ( ! empty( $logo_url ) ) { ?>
					<div class="advisor-logo-footer">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
					</div><!-- .advisor-logo-footer -->
				<?php }
				if ( ! empty( $address ) || ! empty( $phone ) || ! empty( $email ) ) { ?>
					<div class='advisor-contact-footer'>
						<?php if ( ! empty( $address ) ) {
							echo '<p id="advisor-address"><i class="fa fa-map-marker"></i><span class="advisor-contact-footer-data">' . esc_html( $address ) . '</span></p>';
						}
						if ( ! empty( $phone ) ) {
							echo '<p id="advisor-phone-footer"><i class="fa fa-phone"></i><span class="advisor-contact-footer-data">' . esc_html( $phone ) . '</span></p>';
						}
						if ( ! empty( $email ) ) {
							echo '<p id="advisor-contact-us"><a href="mailto:' . esc_attr( $email ) . '"><i class="fa fa-envelope"></i><span class="advisor-contact-footer-data">' . __( 'Contact us', 'restaurant-advisor' ) . '</a></span></p>';
						} ?>
					</div><!-- .advisor-contact-footer -->
				<?php } ?>
			</div> <!-- .advisor-logo-contact -->
		<?php } else {
			$footer_container_class = 'advisor-nav-footer-container-alone';
		} ?>
		<div class="<?php echo $footer_container_class; ?>">
			<div class='advisor-nav-footer'>
				<div class='advisor-top-footer'>
					<?php wp_nav_menu( array(
						'theme_location' => 'footer',
						'before'         => '<i class="fa fa-angle-right"></i>',
					) ); ?>
					<div class="advisor-clear"></div>
				</div> <!-- .advisor-top-footer -->
				<div class='advisor-widgets advisor-widget-footer'>
					<?php if ( is_active_sidebar( 'footer_widget' ) ) {
						dynamic_sidebar( 'footer_widget' );
					} ?>
					<div class="advisor-clear"></div>
				</div> <!-- .advisor-widget-footer -->
			</div> <!-- .advisor-nav-footer -->
		</div> <!-- .advisor-nav-footer-container or .advisor-nav-footer-container-alone -->
		<div class="advisor-clear"></div>
		<div class="advisor-copyright">
			<p>
				<?php echo __( 'Theme by', 'restaurant-advisor' ) . '&nbsp;'; ?>
				<span id="advisor_copyright_author_name">
					<?php $author = wp_get_theme();
					echo esc_html( $author->get( 'Author' ) ); ?>
				</span>
			</p>
		</div> <!-- .advisor-copyright -->
	</div> <!-- .advisor-footer-container -->
</footer>
</div> <!-- .advisor-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
