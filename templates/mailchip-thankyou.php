<?php
/**
 * Template Name: Mailchip Thank You
 *
 * The template for displaying Portfolio listing
 */

get_header();
?>

	<div id="primary" class="content-area sr-mailchip-thankyou-page">
		<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
