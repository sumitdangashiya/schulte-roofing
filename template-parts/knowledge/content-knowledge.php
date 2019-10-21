<?php
/**
 * Template part for displaying kb content in template-knowledge-base.php
 *
 * @package Schulte_Roofing
 */

add_thickbox();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<div class="sr-kb-category" id="sr-kb-filter">
		<ul>
		<?php
			$kb_category = array( 'orderby'  => 'term_order', 'order' => 'ASC', 'hide_empty' => 0 );
			$kbcategory = get_terms( 'ht_kb_category', $kb_category );
			foreach ( $kbcategory as $kbcat ) {
			?>
				<li>
					<label>
						<input type="checkbox" name="kbcategory" class="kbcategory" data-title="<?php echo $kbcat->name;?>" value="<?php echo $kbcat->term_id;?>" />
						<span><?php echo esc_html_e( $kbcat->name, 'schulte-roofing' );?></span>
					</label>
				</li>
		<?php }	?>
		</ul>
	</div>
	<div class="sr-kb-filter-title">
		<h2>All</h2>
	</div>
	<div class="sr-kb-items kb-filter-output">
		<?php
			$ht_knowledge_base_settings =  get_option( 'ht_knowledge_base_settings' );
			$args = array(
					'post_type'      => 'ht_kb',
					'post_status'    => 'publish',
					'posts_per_page' => $ht_knowledge_base_settings['num-articles'],
					'orderby'  	  	 => $ht_knowledge_base_settings['sort-by'],
					'order'    	     => $ht_knowledge_base_settings['sort-order']
				);

			$query = new WP_Query( $args );
			
			$count  = 0;
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) : $query->the_post();				
				
				$open = !($count%3) ? '<div class="sr-kb-column-3">' : '';
				$close = !($count%3) && $count ? '</div>' : '';
				echo $close.$open;
				if ( $count%3 == 0 ) {
					$kbclass =  'kb-item-50';
				} else {
					$kbclass =  'kb-item-25';
				}
				?>
				<div class="sr-kb-item <?php echo $kbclass; ?>">
					<div class="sr-kb-item-image">
						<div class="post-thumbnail kb-image-50">
							<?php the_post_thumbnail( "sr-kb-large" ); ?>
						</div>
						<div class="post-thumbnail kb-image-25">
							<?php the_post_thumbnail( "sr-kb-small" ); ?>
						</div>
						<div class="sr-kb-catlabel-video">
							<div class="sr-kb-catlabel">
								<?php
								$terms = get_the_term_list( get_the_ID(), 'ht_kb_category', '', ', ' );
								$terms = strip_tags( $terms );
								echo _e( $terms, 'schulte-roofing' ); ?>
							</div>
							<?php 
							$videoid = get_post_meta( get_the_ID(), 'kbvideo', true );
							if ( $videoid ) { ?>
								<a href="#TB_inline?width=560&height=300&inlineId=content-<?php echo get_the_ID(); ?>" class="thickbox"></a>
								<!-- Video Modal -->
								<div id="content-<?php echo get_the_ID(); ?>" style="display:none;">
									<iframe width="560" height="270" src="https://www.youtube.com/embed/<?php echo $videoid; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="sr-kb-item-content">
						<div class="sr-kb-item-title">
							<h3>
								<a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
									<?php esc_html_e( the_title(), 'schulte-roofing' ); ?>
								</a>
							</h3>
						</div>
						<div class="sr-kb-item-desc">
							<p><?php echo esc_html_e( wp_trim_words( get_the_content(), 15, '...' ), 'schulte-roofing' ); ?></p>
						</div>
						<div class="sr-kb-item-date-rating">
							<div class="sr-kb-item-date">
								<?php
									$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
									if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
										$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
									}

									$time_string = sprintf( $time_string,
										esc_attr( get_the_date( DATE_W3C ) ),
										esc_html( get_the_date() ),
										esc_attr( get_the_modified_date( DATE_W3C ) ),
										esc_html( get_the_modified_date() )
									);
									echo $time_string ;
								?>
							</div>
							<?php echo schulte_roofing_ht_usefulness( get_the_ID() ); ?>
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

</article><!-- #post-<?php the_ID(); ?> -->