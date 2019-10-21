<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Schulte_Roofing
 */

get_header();
?>

<div id="primary" class="content-area sr-blog-wrap">
	<?php
	if ( have_posts() ) :
		if ( is_home() && ! is_front_page() ) :
			?>
			<div class="sr-blog-title">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</div>
			<?php
		endif;
		?>
		<div class="sr-blog-items">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			the_posts_navigation();
			?>
		</div><!-- #main -->
		<div class="sr-blog-sidebar">
			<?php get_sidebar(); ?>
		</div>
	<?php
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</div><!-- #primary -->

<?php
get_footer();
