<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Schulte_Roofing
 */

?>

<section class="error-404 not-found">
	<div class="container">
		<div class="sr-404-img">
			<img alt="404-banner" width="202" height="220" src="<?php echo get_template_directory_uri(); ?>/images/error_404.png" />
		</div>
		<h1 class="page-title"><?php esc_html_e( 'Oops 404 again! That page can&rsquo;t be found.', 'schulte-roofing' ); ?></h1>
		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'schulte-roofing' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div><!-- .page-content -->
</section><!-- .error-404 -->
