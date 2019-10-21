<?php
/*
 * display Client Logo element
 */
function schulte_roofing_client_logo_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_img_size'		    => '',
		'sr_client_logos'		=> '',
	);
	$atts = shortcode_atts( $default_atts, $atts );
	extract($atts);
	// List Items
	$client_logo_all = vc_param_group_parse_atts($sr_client_logos) ;
	ob_start();
	?>
	<div id="client-logo-slider" class="sr-client-logo-slider owl-carousel">
		<?php foreach ($client_logo_all as $client_logo): ?>
		<div class="item">
			<?php
			if (!empty($client_logo['image'])) {
				$sr_image_src = wp_get_attachment_image_src($client_logo['image'], $sr_img_size);
			}
			?>
			<img class="img-fluid" src="<?php echo esc_url($sr_image_src[0]);?>" width="<?php echo esc_attr($sr_image_src[1]);?>" height="<?php echo esc_attr($sr_image_src[2]);?>" >
		</div>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();

}

add_shortcode( 'sr_client_logo', 'schulte_roofing_client_logo_shortcode' );

/*
 * Slider Image Visual Composer Element
 **/
$shortcode_fields = array(
		array(
			'type'            => 'textfield',
			'heading'         => esc_html__( 'Image Size', 'ansh-addon' ),
			'param_name'      => 'sr_img_size',
			'value'           => 'full',
			'description'     => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'ansh-addon' ),
			'admin_label'     => true,
		),
		array(
			'type'       => 'param_group',
			"heading"     => esc_html__("Client Logos", 'schulte-roofing' ),
			'value'      => '',
			'param_name' => 'sr_client_logos',
			'params'     => array(
				array(
					"type"        => "attach_image",
					"heading"     => esc_html__("Image", 'schulte-roofing' ),
					"param_name"  => "image",
					'admin_label' => true,
				),
			),
			"group"     => esc_html__("Client Logos", 'schulte-roofing' ),
		),
	);


// Params
$params = array(
	"name"                   	=> esc_html__( "Client Logo", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Display Client Logo.", 'schulte-roofing' ),
	"base"                   	=> 'sr_client_logo',
	"class"                  	=> "sr_element_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );