<?php
/**
 * The template for displaying site header
 *
 * @package    BestWebLayout
 * @subpackage Restaurant Advisor
 * @since      Restaurant Advisor 1.0
 **/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif;
	wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="advisor-wrapper">
	<header>
		<div class="advisor-top-header">
			<div class="advisor-top-header-container">
				<?php wp_nav_menu( array( 'theme_location' => 'top' ) ) ?>
				<div id="advisor-contact-top">
					<?php $address = get_theme_mod( 'advisor_info_address' );
					$phone         = get_theme_mod( 'advisor_info_phone' );
					$reservation   = get_theme_mod( 'advisor_info_reservation' );
					if ( ! empty( $address ) ) {
						$link = apply_filters( 'advisor_ref_to_maps', $address );
						echo '<p id="advisor-view-us"><a href="' . esc_url( $link ) . '" target="_blank"> <i class="fa fa-map-marker"></i>' . __( 'view us on', 'restaurant-advisor' ) . '</a></p>';
					}
					if ( ! empty( $phone ) ) {
						echo '<p id="advisor-phone-top"><i class="fa fa-phone"></i>' . sanitize_text_field( $phone ) . '</p>';
					}
					if ( ! empty( $reservation ) ) {
						echo '<p id="advisor-reservation"><a href="' . esc_url( $reservation ) . '" target="_blank"> <i class="fa fa-coffee"></i>' . __( 'reservation', 'restaurant-advisor' ) . '</a></p>';
					} ?>
				</div> <!-- #advisor-contact-top -->
			</div> <!-- .advisor-top-header-container -->
			<div class="advisor-clear"></div>
		</div> <!-- .advisor-top-header-->
		<div class="advisor-logo-header-container">
			<div class="advisor-logo-header">
				<?php if ( current_theme_supports( 'custom-logo' ) ) {
					$logo = get_custom_logo();
				} else {
					$get_logo = get_theme_mod( 'advisor_header_logo' );
					$logo     = ! empty( $get_logo ) ? '<img src="' . esc_url( $get_logo ) . '" alt=" ' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' : '';
				}
				if ( isset( $logo ) && ! empty( $logo ) ) { ?>
					<div id="advisor-logo">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<?php echo $logo ?>
						</a>
					</div>
				<?php } ?>
				<nav class="advisor-nav-logo-header">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav> <!-- .advisor-nav-logo-header -->
				<div id="advisor-menu-button">
					<i class="fa fa-bars"></i>
				</div>
				<div class="advisor-clear"></div>
				<nav id="advisor-compact-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
				<div class="advisor-clear"></div>
			</div> <!-- .advisor-logo-header-->
		</div><!-- .advisor-logo-header-container-->
		<div class="advisor-banner-header">
			<div class="advisor-background-banner" style="background: url('<?php header_image(); ?>') no-repeat center 100%; background-size: cover;">
				<div class="advisor-title-banner-header">
					<div class="hgroup">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<h1 style="color:#<?php header_textcolor(); ?>;">
								<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
							</h1>
							<h3 style="color:#<?php header_textcolor(); ?>;">
								<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
							</h3>
						</a>
					</div>
				</div> <!-- .advisor-title-banner-header -->
			</div> <!-- .advisor-background-banner -->
		</div> <!-- .advisor-banner-header -->
	</header>
