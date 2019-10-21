<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Schulte_Roofing
 */

get_header();
?>

	<div id="primary" class="content-area sr-blog-wrap">
		<?php if ( have_posts() ) : ?>
			<div class="sr-blog-title">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'schulte-roofing' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div>
			<div class="sr-blog-items">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();
				?>
			</div>
			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		<div class="sr-blog-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
