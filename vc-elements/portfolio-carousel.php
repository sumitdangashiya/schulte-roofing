<?php
/*
 * Display Portfolio lists element
 */
function schulte_roofing_portfolio_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_heading'   			=> '',
		'sr_post_type' 			=> 'roofingportfolio',
		'sr_orderby'   			=> '',
		'sr_order'     			=> '',
		'sr_itemno'	   			=> '',
		'sr_portfolio_category'	=> '',
		'sr_portfolio_tags'  	=> '',
	);

	$atts = shortcode_atts( $default_atts, $atts );
	extract($atts);

	ob_start();
	$args = array(
			'post_type'      => $sr_post_type,
			'orderby'        => $sr_orderby,
			'order'		     => $sr_order,
			'posts_per_page' => $sr_itemno,
			'post_status'    => 'publish',
		);
		
	if ( isset($sr_portfolio_category) && $sr_portfolio_category != '' ) {
		$args['tax_query'][]= array(
			'taxonomy' => 'portfoliocategory',
			'field'    => 'slug',
			'terms'    => explode( ',', $sr_portfolio_category ),
		);
	}
	if ( isset($sr_portfolio_tags) && $sr_portfolio_tags != '' ) {
		$args['tax_query'][]= array(
			'taxonomy' => 'portfoliotag',
			'field'    => 'slug',
			'terms'    => explode( ',', $sr_portfolio_tags ),
		);
	}
	$query = new WP_Query($args);
	?>
	<div class="sr-portfolio owl-carousel">
		<?php if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
				?>
				<div class="sr-portfolio-item">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="sr-portfolio-img">
							<?php the_post_thumbnail( 'sr-portfolio-small' ); ?>
						</div>
					<?php } ?>
					<div class="sr-portfolio-desc">
						<h4><?php esc_html(the_title()); ?></h4>
						<p>
						<?php $content = get_the_content();
							 echo wp_trim_words( apply_filters('the_content', $content), 12, '...' ); 
						?>
						</p>
						<div class="sr-portfolio-link">
							<a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" ><?php esc_html_e( 'LEARN MORE', 'schulte-roofing' ); ?></a>
						</div>
					</div>
				</div>
			<?php
				}
			}
			wp_reset_postdata();
		?>
	</div>
	<?php
	return ob_get_clean();

}

add_shortcode( 'sr_portfolio', 'schulte_roofing_portfolio_shortcode' );

function sr_portfolio_categories_lists($post_type){
	if($post_type == 'roofingportfolio') {
		$sr_category = 'portfoliocategory';
	}
	$post_category = get_terms( array(
		'taxonomy'  	=> $sr_category,
		'hide_empty'	=> true,
	));

	$post_categories_lists = array();

	if ( !is_wp_error( $post_category ) ) {
		$post_categories_lists['Select Category'] = '';
		if ( is_array( $post_category ) || !empty( $post_category ) ) {
			foreach ( $post_category as $term_data ) {
				if ( is_object( $term_data ) && isset( $term_data->name, $term_data->term_id ) ) {
					$post_categories_lists[ "{$term_data->name} ({$term_data->count})"] = $term_data->slug;
				}
			}
		}
	}
	return $post_categories_lists;
}

function sr_portfolio_tag_lists($post_type){
	
	if($post_type == 'roofingportfolio') {
		$sr_tag = 'portfoliotag';
	}
	$portfolio_tag_list = get_terms( array(
		'taxonomy'  	=> $sr_tag,
		'hide_empty'	=> true,
	));
	$portfolio_tags_arr = array();
	if ( !is_wp_error( $portfolio_tag_list ) ) {
		if ( is_array( $portfolio_tag_list ) || !empty( $portfolio_tag_list ) ) {				
			foreach ( $portfolio_tag_list as $tag_data ) {
				if ( is_object( $tag_data ) && isset( $tag_data->name, $tag_data->term_id ) ) {
					$portfolio_tags_arr[ "{$tag_data->name}"] = $tag_data->slug;
				}
			}
		}
	}
	return $portfolio_tags_arr;
}

/*
 * SR Portfolio Visual Composer Element
 */
$shortcode_fields = array(
		array(
			'type'       	=> 'textfield',
			'heading'       => esc_html__( 'Heading', 'schulte-roofing' ),
			'param_name'    => 'sr_heading',
			'value'         => '',
			'description'   => esc_html__( 'Enter heading.', 'schulte-roofing' ),
			'admin_label'   => true,
		),
		array(
			'type'          => 'dropdown',
			'param_name'    => 'sr_post_type',
			'heading'       => esc_html__( 'Post Type', 'schulte-roofing' ),
			'value'    		=> array_flip( array(
									'roofingportfolio' => esc_html__( 'Portfolio', 'schulte-roofing' )
								) ),
			'admin_label'   => true,
		),
		/* category */
		array(
			'type'       	=> 'dropdown',
			'param_name'    => 'sr_portfolio_category',
			'heading'       => esc_html__( 'Portfolio Category', 'schulte-roofing' ),			
			'value'      	=> sr_portfolio_categories_lists($post_type = 'roofingportfolio'),
			'admin_label'   => true,
		),
		/* tag */
		array(
			'type'          => 'checkbox',
			'param_name'    => 'sr_portfolio_tags',
			'heading'       => esc_html__( 'Select Portfolio Tags', 'schulte-roofing' ),			
			'value'      	=> sr_portfolio_tag_lists($post_type = 'roofingportfolio'),
			'admin_label'   => true,
		),
		
		array(
			'type'         	=> 'dropdown',
			'param_name'    => 'sr_orderby',
			'heading'       => esc_html__( 'Order by', 'schulte-roofing' ),
			'value'    		=> array_flip( array(
									'date'   => esc_html__( 'Date', 'schulte-roofing' ),
									'id'     => esc_html__( 'Order by post ID', 'schulte-roofing' ),
									'title'  => esc_html__( 'Title', 'schulte-roofing' ),
								) ),
			'admin_label'   => true,
			'description'   => esc_html__( 'Select order type.', 'schulte-roofing' ),
		),
		array(
			'type'          => 'dropdown',
			'param_name'    => 'sr_order',
			'heading'       => esc_html__( 'Sort order', 'schulte-roofing' ),
			'value'    		=> array_flip( array(
									'desc' => esc_html__( 'Descending', 'schulte-roofing' ),
									'asc'  => esc_html__( 'Ascending', 'schulte-roofing' ),
								) ),
			'admin_label'   => true,
			'description'   => esc_html__( 'Select sorting order.', 'schulte-roofing' ),
		),
		array(
			'type'         	=> 'textfield',
			'heading'       => esc_html__( 'Total items', 'schulte-roofing' ),
			'param_name'    => 'sr_itemno',
			'value'         => '10',
			'description'   => esc_html__( 'Set max limit for items in carousel or enter -1 to display all.', 'schulte-roofing' ),
			'admin_label'   => true,
		),

	);

/*
 * Params
 */
$params = array(
	"name"                   	=> esc_html__( "Portfolio Carousel", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Display portfolio as carousel.", 'schulte-roofing' ),
	"base"                   	=> 'sr_portfolio',
	"class"                  	=> "sr_element_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );