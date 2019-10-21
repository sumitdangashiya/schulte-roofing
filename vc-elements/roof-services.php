<?php
/*
 * Display Roof Services element
 */
function schulte_roofing_roof_services_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_roof_services_image'	       => '',
		'sr_roof_services_title'           => '',
		'sr_roof_services_desc'            => '',
		'sr_residential_services_link'     => '',
		'sr_commercial_services_link'      => '',
		'sr_roof_services_image_alignment' => '',
		'sr_roof_services_class'           => '',
	);
	$atts = shortcode_atts( $default_atts, $atts );
	extract($atts);
	$sr_residential_url = vc_build_link( $sr_residential_services_link );
	$sr_commercial_url = vc_build_link( $sr_commercial_services_link );
	ob_start();
	?>
	<div class="sr-roof-services-main <?php echo $sr_roof_services_class ?>" >
		<div class="vc_row <?php echo $sr_roof_services_image_alignment ?>">
			<div class="wpb_column vc_column_container vc_col-sm-6">
				<div class="vc_single_image-wrapper">
					<?php $sr_roof_services_image = wp_get_attachment_image_src($sr_roof_services_image, 'full'); ?>
					<img width="<?php echo $sr_roof_services_image[1]; ?>" height="<?php echo $sr_roof_services_image[2]; ?>" src="<?php echo $sr_roof_services_image[0]; ?>" class="vc_single_image-img attachment-full" alt="<?php echo $sr_roof_services_image[3]; ?>" />
				</div>
			</div>
			<div class="sr-home-commercial-res-content wpb_column vc_column_container vc_col-sm-6">
				<h4 class="vc_custom_heading"><?php echo esc_html($sr_roof_services_title);?></h4>
				<div class="wpb_wrapper">
					<p><?php echo esc_html($sr_roof_services_desc);?></p>
					<div class="sr-roof-services-link-wrap">
						<a class="sr-residential-services-link" target="<?php echo $sr_residential_url['target'] ?>" href="<?php echo esc_url( $sr_residential_url['url'] ); ?>"></a>
						<a class="sr-commercial-services-link" target="<?php echo $sr_commercial_url['target'] ?>" href="<?php echo esc_url( $sr_commercial_url['url'] ); ?>"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'sr_roof_services', 'schulte_roofing_roof_services_shortcode' );

/*
 * SR Portfolio Visual Composer Element
 */
$shortcode_fields = array(
		array(
			"type"            => "attach_image",
			"heading"         => esc_html__("Services Image", 'schulte-roofing' ),
			"param_name"      => "sr_roof_services_image",
			'value'           => '',
			'description'     => esc_html__( 'Choose Services Image.', 'schulte-roofing' ),
			'admin_label'     => true,
		),
		array(
			'type'          => 'dropdown',
			'param_name'    => 'sr_roof_services_image_alignment',
			'heading'       => esc_html__( 'Services Image Alignment', 'schulte-roofing' ),
			'value'    		=> array_flip( array(									
									'services_image_left'   => esc_html__( 'Left', 'schulte-roofing' ),
									'services_image_right'  => esc_html__( 'Right', 'schulte-roofing' ),
								) ),
			'admin_label'   => true,
			'std'			=> 'left',
			'description'   => esc_html__( 'Select Services Image alignment.', 'schulte-roofing' ),
		),
		array(
			'type'            => 'textfield',
			'heading'         => esc_html__( 'Title', 'schulte-roofing' ),
			'param_name'      => 'sr_roof_services_title',
			'value'           => '',
			'description'     => esc_html__( 'Enter Title.', 'schulte-roofing' ),
			'admin_label'     => true,
		),
		array(
			'type'            => 'textfield',
			'heading'         => esc_html__( 'Description', 'schulte-roofing' ),
			'param_name'      => 'sr_roof_services_desc',
			'value'           => '',
			'description'     => esc_html__( 'Enter Description.', 'schulte-roofing' ),
			'admin_label'     => true,
		),
		array(
			'type'          => 'vc_link',
			'heading'       => esc_html__( 'Residential URL (Link)', 'schulte-roofing' ),
			'param_name'    => 'sr_residential_services_link',
			'value'         => '',
			'admin_label'   => true,
			'description'   => esc_html__( 'Add link to Residential Services.', 'schulte-roofing' ),
		),
		array(
			'type'          => 'vc_link',
			'heading'       => esc_html__( 'Commercial URL (Link)', 'schulte-roofing' ),
			'param_name'    => 'sr_commercial_services_link',
			'value'         => '',
			'admin_label'   => true,
			'description'   => esc_html__( 'Add link to Commercial Services.', 'schulte-roofing' ),
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Extra class name', 'schulte-roofing' ),
			'param_name'    => 'sr_roof_services_class',
			'value'         => '',
			'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'schulte-roofing' ),
			'admin_label'   => true,
		),

	);

/*
 * Params
 */
$params = array(
	"name"                   	=> esc_html__( "Roof Services", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Display Roof Services.", 'schulte-roofing' ),
	"base"                   	=> 'sr_roof_services',
	"class"                  	=> "sr_roof_services_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );