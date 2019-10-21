<?php
/*
* Compat template for displaying knowledgebase single item content
*/
?>

<!-- #ht-kb -->
<div id="hkb" class="hkb-template-single">

  <?php $ht_knowledge_base_settings =  get_option( 'ht_knowledge_base_settings' );
	    if ( $ht_knowledge_base_settings['display-breadcrumbs'] == 1 ) {
		?>
			<div  class="kb-breadcrumbs sr-breadcrumbs-container">
				<div class="container">
					<?php hkb_get_template_part('hkb-searchbox', 'single'); ?>

					<?php hkb_get_template_part('hkb-breadcrumbs', 'single'); ?>
				</div>
			</div>
		 <?php  } 
		while ( have_posts() ) : the_post();
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
					<?php the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' );	
					echo schulte_roofing_ht_usefulness( get_the_ID() ); ?>
					<!-- <p>
						<?php
							//echo esc_html_e( wp_trim_words( get_the_content(), 50, '...' ), 'schulte-roofing' );
							//if ( has_excerpt() ) {
							//	the_excerpt();
							//}
						?>
					</p> -->
				</div>
			</div>
				
		<?php endwhile; ?>
	<div class="sr-kb-wrap sr-blog-wrap">
		<div class="sr-blog-title">&nbsp;</div>
		<?php while ( have_posts() ) : the_post(); ?>
				<div class="sr-blog-items">
					<!--div class="sr-kb-title-rating-wrap">
						<?php //the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' );	
						//echo schulte_roofing_ht_usefulness( get_the_ID() ); ?>
					</div-->

					<?php hkb_get_template_part('hkb-entry-content'); ?>

					<?php hkb_get_template_part('hkb-single-attachments'); ?>

					<?php $sr_author_bio = get_the_author_meta('description', $author_id);
					if( $sr_author_bio != '' ) { ?>
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
					} ?>
					<div class="sr-single-post-nav">
						<?php
							the_post_navigation( array(
								'prev_text'  => __( '<span class="sr-blog-pag">PREVIOUS</span> <span class="sr-blog-pag-title">%title</span>' ),
								'next_text'  => __( '<span class="sr-blog-pag">NEXT</span> <span class="sr-blog-pag-title">%title</span>' ),
							) );
						?>
					</div>

					<?php do_action('ht_kb_end_article'); ?>

					<?php //hkb_get_template_part('hkb-single-author'); ?>

					<?php hkb_get_template_part('hkb-single-related'); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>

		<?php endwhile; // end of the loop. ?>
		<?php if ( is_active_sidebar( 'sr-kb-sidebar' ) ) { ?>
					<div class="sr-blog-sidebar">
						<?php dynamic_sidebar( 'sr-kb-sidebar' ); ?>
					</div>
  		<?php } ?>
	</div>
</div><!-- /#ht-kb -->