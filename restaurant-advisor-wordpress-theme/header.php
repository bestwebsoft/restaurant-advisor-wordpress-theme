<?php
/**
* The template for displaying site header
*
* @package BestWebSoft
* @subpackage Restaurant Advisor
* @since Restaurant Advisor 1.3
**/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<div class="advisor-wrapper">
			<header>
				<div class="advisor-top-header">
					<div class="advisor-top-header-container">
						<?php wp_nav_menu( array( 'theme_location'  => 'top' ) ) ?>
						<div id="advisor-contact-top">
							<?php $adress = get_theme_mod('advisor_info_adress');
							$phone = get_theme_mod('advisor_info_phone');
							$reservation = get_theme_mod('advisor_info_reservation');
							if ( ! empty( $adress ) ) {
						 		$link = apply_filters( 'advisor_ref_to_maps', $adress );
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
					<div class="advisor-clear"> </div>
				</div> <!-- .advisor-top-header-->
				<div class="advisor-logo-header-container">
					<div class="advisor-logo-header">
						<?php $logo = get_theme_mod( 'advisor_header_logo' );
						if ( ! empty( $logo ) ) { ?>
							<div id="advisor-logo">
								<a href="<?php echo esc_url( home_url() ); ?>">
									<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								</a>	
							</div>
						<?php } ?>
						<nav class="advisor-nav-logo-header">
							<?php wp_nav_menu ( array( 'theme_location'  => 'primary' ) ); ?>
						</nav> <!-- .advisor-nav-logo-header -->
						<div id="advisor-menu-button">
							<i class="fa fa-bars"></i>
						</div>
						<div class="advisor-clear"></div>
						<nav id="advisor-compact-menu">
							<?php wp_nav_menu ( array( 'theme_location'  => 'primary') ); ?>
						</nav>
						<div class="advisor-clear"> </div>
					</div> <!-- .advisor-logo-header-->
				</div><!-- .advisor-logo-header-container-->
				<div class="advisor-banner-header">
					<div class="advisor-background-banner" style="background: url('<?php esc_url( header_image() ); ?>') no-repeat center 100%; background-size: cover;">
						<div class="advisor-title-banner-header">
							<hgroup>
								<a href="<?php echo esc_url( home_url() ); ?>">
									<h1 style="color:#<?php header_textcolor(); ?>;">
										<?php esc_html( bloginfo ( 'name' ) ); ?>
									</h1>
									<h3 style="color:#<?php header_textcolor(); ?>;">
										<?php esc_html( bloginfo ( 'description' ) ); ?>
									</h3>
								</a>
							</hgroup>
						</div> <!-- .advisor-title-banner-header -->
					</div> <!-- .advisor-background-banner -->
				</div> <!-- .advisor-banner-header -->
			</header>