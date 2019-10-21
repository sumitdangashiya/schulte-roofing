<?php
/*
 * Display Social Icon element
 */
function schulte_roofing_social_icon_shortcode( $atts, $content = null, $shortcode_handle = '' ) {
	$default_atts = array(
		'sr_social_icon_title'         => '',
		'sr_social_icon_facebook_url'  => '',
		'sr_social_icon_pinterest_url' => '',
		'sr_social_icon_twitter_url'   => '',
		'sr_social_icon_g_plus_url'    => '',
		'sr_social_icon_houzz_url'     => '',
		'sr_social_icon_linkedin_url'  => '',
		'sr_social_icon_youtube_url'   => '',
		'sr_social_icon_instagram_url' => '',
		'sr_social_icon_rss_url'       => '',
		'sr_social_icon_bbb_url'       => '',
	);

	$atts = shortcode_atts( $default_atts, $atts );
	
	extract($atts);
	ob_start();
	?>
	<div class="sr-social-media-main">
		<?php 
		if($sr_social_icon_title) { ?>
			<h2><?php echo esc_html($sr_social_icon_title);?></h2>
		<?php 
		}
		?>
		<ul class='sr-social-media'>
			<?php 
			if($sr_social_icon_facebook_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_facebook_url);?>" target="_blank" class="social-facebook">
						<i class="fab fa-facebook-f"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_pinterest_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_pinterest_url);?>" target="_blank" class="social-pinterest">
						<i class="fab fa-pinterest-p"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_twitter_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_twitter_url);?>" target="_blank" class="social-twitter">
						<i class="fab fa-twitter"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_g_plus_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_g_plus_url);?>" target="_blank" class="social-google">
						<i class="fab fa-google-plus-g"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_houzz_url) { ?>
				<li><a href="<?php echo esc_url($sr_social_icon_houzz_url);?>" target="_blank" class="social-houzz"></a></li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_linkedin_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_linkedin_url);?>" target="_blank" class="social-linkedin">
						<i class="fab fa-linkedin"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_youtube_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_youtube_url);?>" target="_blank" class="social-youtube">
						<i class="fab fa-youtube"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_instagram_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_instagram_url);?>" target="_blank" class="social-instagram">
						<i class="fab fa-instagram"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_rss_url) { ?>
				<li>
					<a href="<?php echo esc_url($sr_social_icon_rss_url);?>" target="_blank" class="social-rss">
						<i class="fas fa-rss"></i>
					</a>
				</li>
			<?php 
			}
			?>
			<?php 
			if($sr_social_icon_bbb_url) { ?>
				<li><a href="<?php echo esc_url($sr_social_icon_bbb_url);?>" target="_blank" class="social-bbb"></a></li>
			<?php 
			}
			?>
		</ul>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode( 'sr_social_icon', 'schulte_roofing_social_icon_shortcode' );

/*
 * SR button Visual Composer Element
 */
$shortcode_fields = array(
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Title', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_title',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Facebook URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_facebook_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Pinterest URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_pinterest_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Twitter URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_twitter_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Google Plus URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_g_plus_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Houzz URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_houzz_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Linkedin URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_linkedin_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Youtube URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_youtube_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'Instagram URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_instagram_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'RSS URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_rss_url',
			'value'         => '',
			'admin_label'   => true,
		),
		array(
			'type'          => 'textfield',
			'heading'       => esc_html__( 'BBB URL', 'schulte-roofing' ),
			'param_name'    => 'sr_social_icon_bbb_url',
			'value'         => '',
			'admin_label'   => true,
		),
	);

/*
 * Params
 */
$params = array(
	"name"                   	=> esc_html__( "Social Icon", 'schulte-roofing' ),
	"description"            	=> esc_html__( "Schulte roofing Social Icon.", 'schulte-roofing' ),
	"base"                   	=> 'sr_social_icon',
	"class"                  	=> "sr_social_icon_wrapper",
	"controls"               	=> "full",
	"icon"                   	=> "",
	'category'               	=> esc_html__( 'Schulte Roofing Addon', 'schulte-roofing' ),
	"show_settings_on_create"	=> true,
	"params"                 	=> $shortcode_fields,
);

vc_map( $params );