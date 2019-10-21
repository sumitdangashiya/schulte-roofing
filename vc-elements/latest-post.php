<?php
/*
 * Display Latest Single Post lists element
 */
function schulte_roofing_latest_post_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_wordlimit' => '15',
		'sr_btn_text' => 'Read More',
		'sr_latest_post_title' => 'From the blog',
	);

	$atts = shortcode_atts( $default_atts, $atts );
	
	extract($atts);
	ob_start();
	
	$args = array( 
				'post_type'		 => 'post',
				'posts_per_page' => '1' 
			);
	$query = new WP_Query( $args );
	
	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {
			$query->the_post();
	?>
	<div class="sr-latest-post">
		<h2 class="vc_custom_heading sr-latest-post-title"><?php echo wp_trim_words($atts['sr_latest_post_title']); ?></h2>
		<div class="sr-latest-post-wrap">
			<div class="sr-latest-post-left">
				<h3>				
					<a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>" >
						<?php echo wp_trim_words( get_the_title(), 5, '...' ); ?>
					</a>
				</h3>
				<p>
				<?php $content = get_the_content();
					echo wp_trim_words( apply_filters('the_content', $content), $atts['sr_wordlimit'], '...' ); ?>
				</p>
			</div>
			<div class="sr-latest-post-right">
				<div class="sr-posts-more">
					<a href="<?php esc_url(the_permalink()); ?>" class="sr-all-btn"><?php echo wp_trim_words($atts['sr_btn_text']); ?></a>
				</div>
				<?php 
					$categoriesArray = Array();
					$category_detail = get_the_category( get_the_ID() ); 
					if ( !empty ( $category_detail ) ) {
						foreach ( $category_detail as $category_list ){
							$category_lists[] = $category_list->term_id;
							$categoriesArray[] = $category_list->cat_name;
						}
					}
					echo '<p>'.implode(',',array_slice($categoriesArray,0,3)).'</p>';			
				?>			
			</div>
		</div>
	</div>
	<?php
		}
	}
	wp_reset_postdata();

	return ob_get_clean();
}

add_shortcode( 'sr_latest_post', 'schulte_roofing_latest_post_shortcode' );

/*
 * SR Latest Single Post Visual Composer Element
 */
$shortcode_fields = array(
		array(
			'type'            => 'textfield',
			'heading'         => esc_html__( 'Blog Title', 'schulte-roofing' ),
			'param_name'      => 'sr_latest_post_title',
			'value'           => 'From the blog',
			'description'     => esc_html__( 'Enter Blog Title.', 'schulte-roofing' ),
			'admin_label'     => true,
		),
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
	"name"                   	=> esc_html__( "Latest Post", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Display latest single post.", 'schulte-roofing' ),
	"base"                   	=> 'sr_latest_post',
	"class"                  	=> "sr_element_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );