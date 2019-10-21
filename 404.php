<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Schulte_Roofing
 */

get_header();
?>

<div id="primary" class="content-area">
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
</div><!-- #primary -->

<?php
get_footer();
