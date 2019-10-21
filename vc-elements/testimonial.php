<?php
/*
 * Display Testimonial element
 */
function schulte_roofing_testimonial_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_wordlimit' => '15',
		'sr_btn_text' => 'Read More',
	);

	$atts = shortcode_atts( $default_atts, $atts );
	
	extract($atts);
	ob_start();
	
	$args = array( 
				'post_type'		 => 'testimonial',
				'posts_per_page' => '1' 
			);
	$query = new WP_Query( $args );
		
	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {
			$query->the_post();
	?>
	<div class="sr-testimonial-post">
		<div class="sr-testimonial-left">
			<h3>				
				<a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
					<?php echo wp_trim_words( get_the_title(), 5, '...' ); ?>
				</a>
			</h3>
			<div class="sr-testimonial-details">				
				<!--p><?php //esc_html_e( 'by ', 'schulte-roofing' );  echo get_the_author(); ?></p>
				<p><?php //echo get_the_date(); ?></p-->
				<?php					
				$categoriesArray = Array();
				$category_detail = get_the_terms( get_the_ID(), 'tsmcategory' );
				
				if ( !empty ( $category_detail ) ) {
					foreach ( $category_detail as $category_list ){
						$category_lists[] = $category_list->term_id;
						$categoriesArray[] = $category_list->name;
					}
				}
				echo '<p>'.implode(',',array_slice($categoriesArray,0,1)).'</p>';			
			?>	
				<div class="sr-testimonial-rating">
					<div class="sr-star-rating">
						<?php $sr_meta_rating = get_post_meta( get_the_ID(), 'meta_rating' );?>
						<span style="width:<?php echo $sr_meta_rating[0]; ?>%;"></span>												
					</div>		
				</div>
				
			</div>
		</div>
		<div class="sr-testimonial-center">
			<p>
			<?php $content = get_the_content();
					echo wp_trim_words( apply_filters('the_content', $content), $atts['sr_wordlimit'], '...' ); ?>
			</p>
		</div>
		<div class="sr-testimonial-right">
			<div class="sr-testimonial-more">
				<a href="<?php esc_url(the_permalink()); ?>" class="sr-all-btn"><?php echo wp_trim_words($atts['sr_btn_text']); ?></a>
			</div>			
		</div>
	</div>
	<?php
		}
	}
	wp_reset_postdata();

	return ob_get_clean();
}

add_shortcode( 'sr_testimonial', 'schulte_roofing_testimonial_shortcode' );

/*
 * SR Latest Single Post Visual Composer Element
 */
$shortcode_fields = array(
		array(
			'type'            => 'textfield',
			'heading'         => esc_html__( 'Words limit', 'schulte-roofing' ),
			'param_name'      => 'sr_wordlimit',
			'value'           => '15',
			'description'     => esc_html__( 'Set Words limit.', 'schulte-roofing' ),
			'admin_label'     => true,
		),
		array(
			'type'            => 'textfield',
			'heading'         => esc_html__( 'Button Text', 'schulte-roofing' ),
			'param_name'      => 'sr_btn_text',
			'value'           => 'Read More',
			'description'     => esc_html__( 'Enter Button Text.', 'schulte-roofing' ),
			'admin_label'     => true,
		),
	);

/*
 * Params
 */
$params = array(
	"name"                   	=> esc_html__( "Latest Testimonial", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Display Latest Testimonial.", 'schulte-roofing' ),
	"base"                   	=> 'sr_testimonial',
	"class"                  	=> "sr_testimonial_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );