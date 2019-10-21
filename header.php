<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Schulte_Roofing
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'schulte-roofing' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-top">
			<div class="header-container">
				<div class="header-logo">
					<?php
					the_custom_logo();
					?>
					<div class="header-mobile-logo">
						<?php
						$mobile_custom_logo_id = get_theme_mod( 'sr_mobile_logo' );
						$mobile_custom_logo    = wp_get_attachment_image( $mobile_custom_logo_id, 'full' );
						?>
						<a href="<?php echo site_url(); ?>">
							<?php echo $mobile_custom_logo; ?>
						</a>
					</div>
				</div>
				<div class="header-menu-search">
					<nav id="site-navigation" class="main-navigation">
						<?php
						if( function_exists( 'ubermenu' ) ) {
							ubermenu( 'main' , array( 'menu' => 6309 ) );
						} else {
							?>
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						}
						?>
					</nav>
					<div class="header-search">
						<button type="button"></button>
					</div>
				</div>
			</div>
		</div>
		<div class="header-search-div" style="display:none;">
			<div class="header-search-form-wrap">
				<a href="javascript:void();" class="sr-search-close" ></a>
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
					<label><?php esc_html_e( 'WHAT ARE YOU LOOKING FOR?', 'schulte-roofing' ); ?></label>
					<div class="header-search-input">
						<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" />
						<button type="button"></button>
					</div>
				</form>
			</div>
		</div>
		<div class="header-bottom">
			<div class="header-container">
				<?php
				if( is_active_sidebar( 'sr-header-contact' ) ) {
					dynamic_sidebar( 'sr-header-contact' );
				}
				?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if ( !is_front_page() && get_post_type() != 'ht_kb' ) { ?>
			<div class="sr-breadcrumbs-container">
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="breadcrumbs" class="container">','</div>' );
				} ?>
			</div>
		<?php } ?>
