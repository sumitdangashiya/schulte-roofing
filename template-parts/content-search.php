<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Schulte_Roofing
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
			<div class="sr-blog-image">
				<?php schulte_roofing_post_thumbnail(); ?>
			</div>
	<?php } ?>
		<div class="sr-blog-main-title">
			<?php 
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>
		</div>
	<?php
		if ( 'post' === get_post_type() ) :
		?>
		<div class="sr-blog-postmeta">
			<?php
			schulte_roofing_posted_by();
			schulte_roofing_posted_on();

			$categories_list = get_the_category_list( esc_html__( ', ', 'schulte-roofing' ) );
			if ( $categories_list ) {
				printf( '<span class="sr-blog-category">' . esc_html__( '%1$s', 'schulte-roofing' ) . '</span>', $categories_list );
			}
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
	<div class="sr-blog-content">
		<?php the_excerpt();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'schulte-roofing' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<div class="sr-blog-btn">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="sr-all-btn"><?php echo esc_html__( 'READ MORE', 'schulte-roofing' ); ?></a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
