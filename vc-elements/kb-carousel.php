<?php
/*
 * Display Knowledge Base lists element
 */
function schulte_roofing_kb_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_heading'   		=> '',
		'sr_post_type' 		=> 'ht_kb',
		'sr_orderby'   		=> 'id',
		'sr_order'     		=> 'asc',
		'sr_itemno'	   		=> '10',
		'sr_ht_kb_category'	=> '',
		'sr_post_category'  => '',
		'sr_kb_tags'  		=> '',
		'sr_post_tags'  	=> '',
		'sr_post_author' 	=> '',
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
			'author' 		 => $sr_post_author,
		);

	if ( isset($sr_ht_kb_category) && $sr_ht_kb_category != '' ) {
		$args['tax_query'][]= array(
								'taxonomy' => 'ht_kb_category',
								'field'    => 'slug',
								'terms'    => explode( ',', $sr_ht_kb_category ),
							);
	}
	if ( isset($sr_post_category) && $sr_post_category != '' ) {
		$args['tax_query'][]= array(
								'taxonomy' => 'category',
								'field'    => 'slug',
								'terms'    => explode( ',', $sr_post_category ),
							);
	}
	if ( isset($sr_kb_tags) && $sr_kb_tags != '' ) {
		$args['tax_query'][]= array(
								'taxonomy' => 'ht_kb_tag',
								'field'    => 'slug',
								'terms'    => explode( ',', $sr_kb_tags ),
							);
	}
	if ( isset($sr_post_tags) && $sr_post_tags != '' ) {
		$args['tax_query'][]= array(
								'taxonomy' => 'post_tag',
								'field'    => 'slug',
								'terms'    => explode( ',', $sr_post_tags ),
							);
	}
	
	$query = new WP_Query($args);
	?>
	<div class="sr-portfolio sr-kb-slider owl-carousel">
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
							 echo wp_trim_words( $content, 12, '...' );
						?>
						</p>
						<div class="sr-portfolio-link">
							<div class="sr-kb-link">
								<a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" ><?php esc_html_e( 'LEARN MORE', 'schulte-roofing' ); ?></a>
							</div>
							<?php if($sr_post_type == 'ht_kb'){
									echo schulte_roofing_ht_usefulness( get_the_ID() );
								}
							?>

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

add_shortcode( 'sr_kb', 'schulte_roofing_kb_shortcode' );

/* sr category function*/
function sr_blog_posts_categories_lists($post_type){

	if($post_type == 'ht_kb') {
		$sr_category = 'ht_kb_category';
	}else {
		$sr_category = 'category';
	}
	$post_category = get_terms( array(
		'taxonomy'  => $sr_category,
		'hide_empty'=> true,
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

/* sr tag function */
function sr_blog_posts_tag_lists($post_type){
	if($post_type == 'ht_kb') {
		$sr_tag = 'ht_kb_tag';
	}else {
		$sr_tag = 'post_tag';
	}
	$post_tag_list = get_terms( array(
		'taxonomy'  => $sr_tag,
		'hide_empty'=> true,
	));

	$post_tag_lists = array();
	if ( !is_wp_error( $post_tag_list ) ) {		
		if ( is_array( $post_tag_list ) || !empty( $post_tag_list ) ) {
			foreach ( $post_tag_list as $tag_data ) {
				if ( is_object( $tag_data ) && isset( $tag_data->name, $tag_data->term_id ) ) {
					$post_tag_lists[ "{$tag_data->name}"] = $tag_data->slug;
				}
			}
		}
	}
	return $post_tag_lists;
}

/* sr post author*/
function sr_blog_posts_author(){
	$post_author_lists = array();
	$autho = get_users();
	$post_author_lists['Select Author'] = '';
	foreach($autho as $author_data){
		if ( is_object( $author_data ) && isset( $author_data->user_nicename, $author_data->ID ) ) {
			$post_author_lists[ "{$author_data->user_nicename}"] = $author_data->ID;
		}
	}
	return $post_author_lists;
}

/*
 * SR Portfolio Visual Composer Element
 */
$shortcode_fields = array(
		array(
			'type'            => 'textfield',
			'heading'         => esc_html__( 'Heading', 'schulte-roofing' ),
			'param_name'      => 'sr_heading',
			'value'           => '',
			'description'     => esc_html__( 'Enter heading.', 'schulte-roofing' ),
			'admin_label'     => true,
		),
		array(
			'type'            => 'dropdown',
			'param_name'      => 'sr_post_type',
			'heading'         => esc_html__( 'Post Type', 'schulte-roofing' ),
			'value'    		  => array_flip( array(
									'ht_kb' => esc_html__( 'Knowledge Base', 'schulte-roofing' ),
									'post' => esc_html__( 'Blog', 'schulte-roofing' )
								) ),
			'admin_label'     => true,
		),
		array(
			'type'          => 'dropdown',
			'param_name'    => 'sr_ht_kb_category',
			'heading'       => esc_html__( 'Knowledge base Category', 'schulte-roofing' ),
			'dependency' 	=> array(
				'element' 	=> 'sr_post_type',
				'value_not_equal_to' => array('post')
			),
			'value'      	=> sr_blog_posts_categories_lists($post_type = 'ht_kb'),
			'admin_label'   => true,

		),
		array(
			'type'          => 'dropdown',
			'param_name'    => 'sr_post_category',
			'heading'       => esc_html__( 'Blog Category', 'schulte-roofing' ),
			'dependency' 	=> array(
				'element' 	=> 'sr_post_type',
				'value_not_equal_to' => array('ht_kb')
			),
			'value'			=> sr_blog_posts_categories_lists($post_type = 'post'),
			'admin_label'   => true,

		),
		/* KB tag*/
		array(
			'type'          => 'checkbox',
			'param_name'    => 'sr_kb_tags',			 
			'heading'       => esc_html__( 'Select Article Tags', 'schulte-roofing' ),
			'dependency' 	=> array(
				'element' 	=> 'sr_post_type',
				'value_not_equal_to' => array('post')
			),
			'value'      	=> sr_blog_posts_tag_lists($post_type = 'ht_kb'),
			'admin_label'   => true,
		),
		/* blog tag */
		array(
			'type'         	=> 'checkbox',
			'param_name'   	=> 'sr_post_tags',
			'heading'     	=> esc_html__( 'Select Blog Tags', 'schulte-roofing' ),
			'dependency' 	=> array(
				'element' 				=> 'sr_post_type',
				'value_not_equal_to'	=> array('ht_kb')
			),
			'value'      	=> sr_blog_posts_tag_lists($post_type = 'post'),
			'admin_label'	=> true,
		),
		/* author*/
		array(
			'type'          => 'dropdown',
			'param_name'    => 'sr_post_author',
			'heading'       => esc_html__( 'Select Author', 'schulte-roofing' ),
			'value'      	=> sr_blog_posts_author(),
			'admin_label'   => true,
			'description'	=> esc_html__( 'Select author name.', 'schulte-roofing' ),
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
			'type'        	=> 'textfield',
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
	"name"                   	=> esc_html__( "Kb Carousel", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Display Knowledge Base as carousel.", 'schulte-roofing' ),
	"base"                   	=> 'sr_kb',
	"class"                  	=> "sr_element_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );