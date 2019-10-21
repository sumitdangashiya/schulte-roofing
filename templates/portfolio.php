<?php
/**
 * Template Name: Portfolio
 *
 * The template for displaying Portfolio listing
 */

get_header();
?>

	<div id="primary" class="content-area sr-portfolio-template">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/portfolio/content', 'portfolio' );

		endwhile; // End of the loop.
		?>
	</div><!-- #primary -->

<?php
get_footer();
