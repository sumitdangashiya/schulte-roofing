<?php
/**
 * Template part for displaying portfolio content in template-portfolio.php
 *
 * @package Schulte_Roofing
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="sr-portfolio-cat sr-portfolio-maincat">
		<div class="container">
			<ul class="maincat">
				<li>
					<p class="portfolio-cat catactive all" data-filter="all" data-id=""><?php echo esc_html_e( 'All', 'schulte-roofing' );?></p>
				</li>
				<?php
					$portfolio_category = array( 'orderby'  => 'term_order', 'order' => 'ASC', 'hide_empty' => 1, 'parent' => 0 );
					$category_results   = get_terms( 'portfoliocategory', $portfolio_category );
					foreach ( $category_results as $result ) {
						$port_child_cat = array( 'orderby'  => 'term_order', 'order' => 'ASC', 'hide_empty' => 1, 'parent'  => $result->term_id );
						$child_cat_res  = get_terms( 'portfoliocategory', $port_child_cat );
						if ( $child_cat_res ) {
							$child_cat_res_class = "portfolio-subcat-dropdown";
						} else {
							$child_cat_res_class = "";
						}
						?>
						<li class="<?php echo $child_cat_res_class; ?>">
							<p class="portfolio-cat" data-filter="<?php echo '.'.$result->slug; ?>" data-id="<?php echo $result->term_id; ?>">
								<span><?php echo esc_html_e( $result->name, 'schulte-roofing' );?></span>
							</p>
							<?php
							if ( $child_cat_res ) { ?>
								<ul class="subcat" data-id="<?php echo $result->term_id; ?>">
									<?php foreach ( $child_cat_res as $res ) { ?>
										<li>
											<p class="portfolio-cat" data-filter="<?php echo '.'.$res->slug; ?>" data-id="<?php echo $res->term_id; ?>">
												<span><?php echo esc_html_e( $res->name, 'schulte-roofing' );?></span>
											</p>
										</li>
									<?php } ?>
								</ul>
							<?php
							}
							?>
						</li>
			  <?php } ?>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="sr-portfolio-items" data-ref="sr-portfolio-items">
			<?php
				$args = array(
						'post_type'      => 'roofingportfolio',
						'post_status'    => 'publish',
						'posts_per_page' => -1,
						'orderby'  	  	 => 'id',
						'order'    	     => 'asc'
					);

				$query = new WP_Query( $args );
				$count  = 1;
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
					$cat_list =  get_the_terms( $post->ID, 'portfoliocategory' );
					?>
					<div class="sr-portfolio-item <?php if($cat_list): foreach ($cat_list as $catPost){ $class =  $catPost->slug.' '; echo $class; } endif; ?>" data-ref="mixitup-item">
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
									
										<?php
										//$the_content = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', the_content());
										//echo esc_html_e( wp_trim_words( $the_content, 15, '...' ), 'schulte-roofing' );
										if ( has_excerpt() ) {
											the_excerpt();
										}
										?>
									
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
				$count++;
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->