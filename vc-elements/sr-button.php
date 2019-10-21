<?php
/*
 * Display button lists element
 */
function schulte_roofing_button_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_text'       => 'Learn More',
		'sr_link'       => '',
		'sr_alignment'  => 'left',
		'sr_class'      => '',
		'sr_id'      => '',
	);

	$atts = shortcode_atts( $default_atts, $atts );
	
	extract($atts);
	ob_start();
	$sr_link = vc_build_link($sr_link);
	if( $sr_id ) {
		$sr_id_var = 'id="'.$sr_id.'"';
	}
	?>
	<div class="sr-button <?php echo esc_attr($sr_alignment.' '.$sr_class); ?>">
		<a <?php echo $sr_id_var; ?> href="<?php echo esc_url($sr_link['url']);?>" target="<?php echo ( strlen( $sr_link['target'] ) > 0 ? esc_attr( $sr_link['target'] ) : '_self' ); ?>" title="<?php echo esc_attr($sr_link['title']);?>" rel="<?php echo esc_attr($sr_link['rel']);?>" class="sr-all-btn"><?php echo esc_html($sr_text);?></a>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode( 'sr_button', 'schulte_roofing_button_shortcode' );

/*
 * SR button Visual Composer Element
 */
$shortcode_fields = array(
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Text', 'schulte-roofing' ),
			'param_name'    => 'sr_text',
			'value'         => 'Learn More',
			'admin_label'   => true,
		),
		array(
			'type'          => 'vc_link',
			'heading'       => esc_html__( 'URL (Link)', 'schulte-roofing' ),
			'param_name'    => 'sr_link',
			'value'         => '',
			'admin_label'   => true,
			'description'   => esc_html__( 'Add link to button.', 'schulte-roofing' ),
		),
		array(
			'type'          => 'dropdown',
			'param_name'    => 'sr_alignment',
			'heading'       => esc_html__( 'Alignment', 'schulte-roofing' ),
			'value'    		=> array_flip( array(									
									'left'   => esc_html__( 'Left', 'schulte-roofing' ),
									'right'  => esc_html__( 'Right', 'schulte-roofing' ),
									'center' => esc_html__( 'Center', 'schulte-roofing' ),
								) ),
			'admin_label'   => true,
			'std'			=> 'left',
			'description'   => esc_html__( 'Select button alignment.', 'schulte-roofing' ),
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Extra class name', 'schulte-roofing' ),
			'param_name'    => 'sr_class',
			'value'         => '',
			'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'schulte-roofing' ),
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Extra Id name', 'schulte-roofing' ),
			'param_name'    => 'sr_id',
			'value'         => '',
			'description'   => esc_html__( 'Style particular content element differently - add a id name and refer to it in custom CSS.', 'schulte-roofing' ),
			'admin_label'   => true,
		),
	);

/*
 * Params
 */
$params = array(
	"name"                   	=> esc_html__( "Button", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Schulte roofing button.", 'schulte-roofing' ),
	"base"                   	=> 'sr_button',
	"class"                  	=> "sr_element_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );