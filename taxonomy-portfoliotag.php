<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Schulte_Roofing
 */

get_header();
?>
<div id="primary" class="content-area sr-portfolio-template">
	<?php
	if ( have_posts() ) : ?>

	<?php 
	$sr_roofing_category = get_queried_object();
    $sr_current_cat_id   = $sr_roofing_category->term_id;
    $sr_current_image_id = get_term_meta( $sr_current_cat_id, 'term_image', true );
    $sr_portfolio_image  = wp_get_attachment_url( $sr_current_image_id );
    if( $sr_portfolio_image ) {
		$sr_image_url = "background-image:url('". $sr_portfolio_image ."');";
		$sr_class     = "";
	} else {
		$sr_image_url = "background-color:#EC2528;";
		$sr_class     = " sr-single-post-noimg";
	}
	?>
	<div class="sr-portfolio-header<?php echo $sr_class; ?>" style="<?php echo $sr_image_url; ?>" >
		<div class="container">
			<h1 class="entry-title"><?php single_cat_title(); ?></h1>
			<p><?php echo category_description(); ?></p>
		</div>
	</div>
	<div class="container">
		<div class="sr-portfolio-items">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<div class="sr-portfolio-item">
					<div class="sr-portfolio-content-wrap">
						<div class="sr-portfolio-item-image">
							<div class="post-thumbnail">
								<?php the_post_thumbnail( 'sr-portfolio-medium' ); ?>
							</div>
						</div>
						<div class="sr-portfolio-item-content">
							<div class="sr-portfolio-item-title">
								<h3><?php esc_html_e( the_title(), 'schulte-roofing' ); ?></h3>
							</div>
							<div class="sr-portfolio-item-desc">
								<p>
									<?php
										//echo esc_html_e( wp_trim_words( get_the_content(), 50, '...' ), 'schulte-roofing' );
										if ( has_excerpt() ) {
											the_excerpt();
										}
									?>
								</p>
							</div>
							<div class="sr-portfolio-item-btn">
								<a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" class="sr-all-btn" >
									<?php esc_html_e( 'LEARN MORE', 'schulte-roofing' ); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php
			endwhile;
			?>
		</div>	
	</div>	
	<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div><!-- #primary -->

<?php
get_footer();
