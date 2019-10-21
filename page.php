<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Schulte_Roofing
 */

get_header();
?>

	<div id="primary" class="content-area">
		<?php 
			if ( !is_singular( 'ht_kb' ) ) 
			{
				echo '<div class="container">';
			} ?>
			
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );
				
				if ( !is_singular( 'ht_kb' ) ) 
				{
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				}
				
			endwhile; // End of the loop.

			if ( !is_singular( 'ht_kb' ) ) 
			{
				echo '</div><!-- #container -->';
			} ?>
		
	</div><!-- #primary -->

<?php
get_footer();
