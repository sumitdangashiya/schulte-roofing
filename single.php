<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Schulte_Roofing
 */

get_header();
?>

	<div id="primary" class="content-area">
	<?php
		while ( have_posts() ) :
			the_post();

			$sr_blog_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );
			if( $sr_blog_image ) {
				$sr_image_url = "background-image:url('".$sr_blog_image."');";
			} else {
				$sr_image_url = "background-color:#EC2528;";
				$sr_class     = " sr-single-post-noimg";
			}
			?>
			<div class="sr-single-post-header<?php echo $sr_class; ?>" style="<?php echo $sr_image_url; ?>">
				<div class="container">
					<div class="sr-single-post-cat">
					<?php
						$post_cat_name   = 'category';
						$post_categories = get_the_terms( $post->ID, $post_cat_name );
						if ( !empty ( $post_categories ) ) {
							foreach ( $post_categories as $post_categories_list ){
								$post_categories_lists[] = $post_categories_list->term_id;
								$post_categoriesArray[]  = $post_categories_list->name;
							}
						}
						?>
						<h3><?php echo implode(',',array_slice($post_categoriesArray,0,1)); ?></h3>
					</div>
					<?php
						the_title( '<h1 class="entry-title">', '</h1>' );
					?>
					<!--p><?php //echo wp_trim_words( apply_filters('the_content', get_the_content()), 20, '...' ); ?></p-->
					<div class="sr-blog-postmeta">
					<?php
						schulte_roofing_posted_by();
						schulte_roofing_posted_on();
					?>
					</div><!-- .entry-meta -->
				</div>
			</div>
			<div class="sr-single-post-wrap">
				<div class="container">
					<div class="sr-single-post-content">
						<?php
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'schulte-roofing' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );
						
						$sr_author_bio = get_the_author_meta('description', $author_id);
						if( $sr_author_bio != '' ) {
						?>
							<div class="sr-author-bio-wrap">
								<?php 
								$sr_author_link = get_the_author_meta('sr_author_link', $author_id);
								if( $sr_author_link == '' ) {
									$sr_author_link_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
								} else {
									$sr_author_link_url = get_the_author_meta('sr_author_link', $author_id);
								}
								?>
								<h3>
									<?php echo esc_html__( 'About', 'schulte-roofing' ); ?> <a href="<?php echo esc_url( $sr_author_link_url ); ?>"><?php echo get_the_author_meta('display_name', $author_id); ?></a>
								</h3>
								<p><?php echo $sr_author_bio; ?></p>
							</div>
						<?php 
						}
						?>
						<div class="sr-single-post-nav">
							<?php
								the_post_navigation( array(
									'prev_text'  => __( '<span class="sr-blog-pag">PREVIOUS</span> <span class="sr-blog-pag-title">%title</span>' ),
									'next_text'  => __( '<span class="sr-blog-pag">NEXT</span> <span class="sr-blog-pag-title">%title</span>' ),
								) );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									?>
									<div class="sr-blog-comment-sec">
										<?php
										comments_template();
										?>
									</div>
									<?php
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
		endwhile; // End of the loop.
	?>
	</div><!-- #primary -->

<?php
get_footer();
