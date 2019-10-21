<?php
/**
 * Template Name: Knowledge base
 *
 * The template for displaying Knowledge base listing
 */

get_header();
?>

	<div id="primary" class="content-area">
		<div class="container">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/knowledge/content', 'knowledge' );

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #container -->
	</div><!-- #primary -->

<?php
get_footer();
