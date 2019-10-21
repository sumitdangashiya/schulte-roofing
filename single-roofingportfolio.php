<?php
/**
 * The template for displaying all single portfolio
 *
 * @package Schulte_Roofing
 */

get_header();
?>
	<div id="primary" class="content-area sr-portfolio-wrap">
		<?php
			while ( have_posts() ) :
				the_post();

				$sr_portfolio_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );
				if( $sr_portfolio_image ) {
					$sr_image_url = "background-image:url('".$sr_portfolio_image."');";
					//$sr_image_url = "background-image:url('https://dev.schulteroofing.com/wp-content/uploads/2018/10/portfolio.jpg');";
				} else {
					$sr_image_url = "background-color:#EC2528;";
					$sr_class = " sr-single-post-noimg";
				}
				?>
				<div class="sr-portfolio-header<?php echo $sr_class; ?>" style="<?php echo $sr_image_url; ?>" >
					<div class="container">
						<?php the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' ); ?>
						<p>
							<?php
								//echo esc_html_e( wp_trim_words( get_the_content(), 50, '...' ), 'schulte-roofing' );
								if ( has_excerpt() ) {
									the_excerpt();
								}
							?>
						</p>
					</div>
				</div>
				<?php /* ?>
				<div class="sr-portfolio-cat" id="sr-portfolio-cat">
					<div class="container">
						<ul>
							<li data-filter="all"><?php echo esc_html_e( 'All', 'schulte-roofing' );?></li>
							<?php
								$portfolio_category = array( 'orderby'  => 'term_order', 'order' => 'ASC', 'hide_empty' => 1, 'parent' => 0 );
								$category_results = get_terms( 'portfoliocategory', $portfolio_category );
								foreach ( $category_results as $result ) {
								?>
									<li data-filter="<?php echo '.'.$result->slug; ?>"><?php echo esc_html_e( $result->name, 'schulte-roofing' );?></li>
						<?php }	?>
						</ul>
					</div>
				</div>
				<?php */
				$portfolio_page = get_post(180);
				?>
				<!--div class="portfolio-breadcrumbs">
					<div class="container">
						<div class="portfolio-breadcrumb-search">
							<ol class="portfolio-breadcrumb hkb-breadcrumbs" >
								<li>
									<a href="<?php //echo site_url().'/'.$portfolio_page->post_name; ?>" title="Home">Home</a>
								</li>
								<li>
								<?php
									/*$cat_name           = 'portfoliocategory';
									$categories         = get_the_terms( $post->ID, $cat_name );
									if( $categories ) {
										$current_categories = current( $categories );
										if( !$current_categories->parent ): ?>
											<a href="<?php echo esc_attr(get_term_link($current_categories->slug, $cat_name)); ?>">
												<?php echo $current_categories->name; ?>
											</a>
											<?php
										endif;	
									}*/
									
								?>
								</li>
								<li><?php// the_title();?></li>
							</ol>
						</div>
					</div>
				</div-->
				<div class="container">
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
					?>
					<?php
					$tag_name    = 'portfoliotag';
					$tags  = get_the_terms( $post->ID, $tag_name );
					if ( $tags ) {
						echo '<div class="sr-portfolio-tag-wrap">';
						echo '<span class="sr-portfolio-tag-title">Tag: </span>';
						echo '<ul class="sr-portfolio-tags">';
						foreach ($tags as $tag) {
							echo '<li><a href="'.esc_attr(get_term_link($tag->slug, $tag_name)).'" class="sr-portfolio-tag">'.$tag->name.'</a></li>';
						}
						echo '</ul>';
						echo '</div>';
					}
					?>
				</div>
			<?php
			endwhile; // End of the loop.
		?>
	</div><!-- #primary -->

<?php
get_footer();
