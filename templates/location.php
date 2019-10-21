<?php
/**
 * Template Name: Location
 * Template Post Type: wpseo_locations
 *
 * The template for displaying location single page
 */

get_header();
?>

<div id="primary" class="content-area sr-location-template">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
		endwhile; // End of the loop.
		?>
	</div>
</div><!-- #primary -->
	
<?php
get_footer();
