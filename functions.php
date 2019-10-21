<?php
/**
 * Schulte Roofing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Schulte_Roofing
 */

add_image_size( 'sr-portfolio-small', 240, 150 );
add_image_size( 'sr-portfolio-medium', 283, 213 );
add_image_size( 'sr-kb-large', 480, 175, true );
add_image_size( 'sr-kb-small', 233, 175, true );

if ( ! function_exists( 'schulte_roofing_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function schulte_roofing_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Schulte Roofing, use a find and replace
		 * to change 'schulte-roofing' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'schulte-roofing', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'schulte-roofing' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'schulte_roofing_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'schulte_roofing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function schulte_roofing_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'schulte_roofing_content_width', 640 );
}
add_action( 'after_setup_theme', 'schulte_roofing_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function schulte_roofing_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'schulte-roofing' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Knowledge base', 'schulte-roofing' ),
		'id'            => 'sr-kb-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Menu Contact', 'schulte-roofing' ),
		'id'            => 'sr-header-contact',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Quote form Popup', 'schulte-roofing' ),
		'id'            => 'sr-quote-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column 1', 'schulte-roofing' ),
		'id'            => 'sr-top-column-1',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column 2', 'schulte-roofing' ),
		'id'            => 'sr-top-column-2',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column 3', 'schulte-roofing' ),
		'id'            => 'sr-top-column-3',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Column 4', 'schulte-roofing' ),
		'id'            => 'sr-top-column-4',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom 1', 'schulte-roofing' ),
		'id'            => 'sr-bottom-1',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom 2', 'schulte-roofing' ),
		'id'            => 'sr-bottom-2',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom 3', 'schulte-roofing' ),
		'id'            => 'sr-bottom-3',
		'description'   => esc_html__( 'Add widgets here.', 'schulte-roofing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'schulte_roofing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function schulte_roofing_scripts() {
	wp_enqueue_style( 'schulte-roofing-select2', get_template_directory_uri() . '/css/select2.min.css' );
	wp_enqueue_style( 'schulte-roofing-mCustomScrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'schulte-roofing-style', get_stylesheet_uri() );
	wp_enqueue_style( 'schulte-roofing-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'schulte-roofing-fontawesome-all', get_template_directory_uri() . '/css/all.min.css' );
	wp_enqueue_style( 'schulte-roofing-fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css' );
	
	wp_enqueue_script( 'schulte-roofing-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'schulte-roofing-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array(), '20151215', true );

	if ( is_page_template( 'templates/portfolio.php' ) ) {
		wp_enqueue_script( 'jquery-mixitup-filter', get_template_directory_uri() . '/js/mixitup.min.js', array(), '20151215', true );
	}
	wp_enqueue_script( 'schulte-roofing-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );	
	wp_enqueue_script( 'schulte-roofing-select2', get_template_directory_uri() . '/js/select2.min.js', array(), '20151215', true );	
	wp_enqueue_script( 'schulte-roofing-mCustomScrollbar', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', array(), '20151215', true );
	wp_enqueue_script( 'schulte-roofing-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );
	wp_localize_script( 'schulte-roofing-custom', 'srajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

	if ( ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) || ( is_singular() && get_post_type( get_the_ID() ) == 'ht_kb' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'schulte_roofing_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Include social media widget.
 */
require get_template_directory() . '/widget/social-media-widget.php';

/**
 * Include contactus widget.
 */
require get_template_directory() . '/widget/contact-widget.php';

/**
 * Include header contact widget.
 */
require get_template_directory() . '/widget/header-contact-widget.php';

/**
 * Include custom post type.
 */
require get_template_directory() . '/inc/custom-post-type.php';

/**
 * Include kb category widget.
 */
require get_template_directory() . '/widget/kbcategory-widget.php';

/**
 * Include VC element portfolio carousel.
 */
add_action( 'init', 'schulte_roofing_vc_shortcode' );
function schulte_roofing_vc_shortcode() {

	if ( function_exists('is_plugin_active') && is_plugin_active( 'js_composer/js_composer.php' ) ) {

		require get_template_directory() . '/vc-elements/portfolio-carousel.php';
		require get_template_directory() . '/vc-elements/latest-post.php';
		require get_template_directory() . '/vc-elements/sr-button.php';
		require get_template_directory() . '/vc-elements/client-logo-slider.php';
		require get_template_directory() . '/vc-elements/roof-services.php';
		require get_template_directory() . '/vc-elements/kb-carousel.php';
		require get_template_directory() . '/vc-elements/testimonial.php';
		require get_template_directory() . '/vc-elements/social-icon.php';
	}
}

/**
 * Uber menu hook for post learn more btn link.
 */
function schulte_roofing_uber_add_subcontent( $content , $post , $item_id ) {
	$content.= '<span class="ubermenu-target-description ubermenu-target-text">';
	$content.= '<a href="'. esc_url(get_permalink($post->ID)).'">';
	$content.= 'Learn more';
	$content.= '</a>';
	$content.= '</span>';
	return $content;
}
add_filter( 'ubermenu_dp_subcontent' , 'schulte_roofing_uber_add_subcontent' , 10 , 3 );

/**
 * Knowledge base category filter.
 */
function schulte_roofing_knowledge_base_filter() {

	$choices = $_POST['choices'];
	if ( !empty( $choices ) ) {
		$array = explode( ',', $choices );
		$args = array(
			'post_type'         => 'ht_kb',
			'post_status'       => 'publish',
			'tax_query'         => array(
				array(
					'taxonomy'  => 'ht_kb_category',
					'field'     => 'term_id',
					'terms'     => $array,
				)
			)
		);
	} else {
		$ht_knowledge_base_settings =  get_option( 'ht_knowledge_base_settings' );
		$args = array(
			'post_type'      => 'ht_kb',
			'post_status'    => 'publish',
			'posts_per_page' => $ht_knowledge_base_settings['num-articles'],
			'orderby'  	  	 => $ht_knowledge_base_settings['sort-by'],
			'order'    	     => $ht_knowledge_base_settings['sort-order']
		);
	}

    $query = new WP_Query( $args );
	$count  = 0;
	if($query->have_posts() ) :
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

    die();
}
add_action( 'wp_ajax_filter_kb' , 'schulte_roofing_knowledge_base_filter' );
add_action( 'wp_ajax_nopriv_filter_kb' , 'schulte_roofing_knowledge_base_filter' );

/**
 * Comment Form Fields Placeholder
 *
 */
function schulte_roofing_comment_textarea_placeholder( $args ) {
	$args['comment_field']  = str_replace( 'textarea', 'textarea placeholder="Comment"', $args['comment_field'] );
	return $args;
}
//add_filter( 'comment_form_defaults', 'schulte_roofing_comment_textarea_placeholder' );

function schulte_roofing_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Name"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="E-Mail"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );
	}
	return $fields;
}
//add_filter( 'comment_form_default_fields', 'schulte_roofing_comment_form_fields' );

/**
 * Menu contact shortcode
 *
 */
function schulte_roofing_header_contact_shortcode () {

	ob_start();
	if( is_active_sidebar( 'sr-header-contact' ) ) {
	?>
	<div class="header-bottom">
		<div class="header-container">
			<?php dynamic_sidebar( 'sr-header-contact' ); ?>
		</div>
	</div>
	<?php
	}
	return ob_get_clean();
}
add_shortcode( 'header_contact', 'schulte_roofing_header_contact_shortcode' );

/**
 * Add three dot in blog page
 *
 */
function wpshout_change_and_link_excerpt() {
	// Change text, make it link, and return change
	return '&hellip;';
}
add_filter( 'excerpt_more', 'wpshout_change_and_link_excerpt', 999 );

/**
 * Add thumbnail image on KB post type
 *
 */
add_filter( 'register_post_type_args', 'schulte_roofing_add_registered_post_type_thumbnail', 10, 2 );
function schulte_roofing_add_registered_post_type_thumbnail( $args, $post_type ) {
	// Make sure we're only modifying our desired post type.
	if ( 'ht_kb' != $post_type )
		return $args;
	$args['supports'] = array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'post-formats', 'custom-fields', 'revisions' );
	return $args;
}

/**
 * Add kb video metabox
 *
 */
class videoMetabox {
	private $screen = array(
		'ht_kb',
	);
	private $meta_fields = array(
		array(
			'label' => 'Kb Video',
			'id' => 'kbvideo',
			'type' => 'text',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'video',
				__( 'Video', 'schulte-roofing' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'default'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'video_data', 'video_nonce' );
		echo 'Please insert youtube video id like [EngW7tLk6R8]';
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['video_nonce'] ) )
			return $post_id;
		$nonce = $_POST['video_nonce'];
		if ( !wp_verify_nonce( $nonce, 'video_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('videoMetabox')) {
	new videoMetabox;
};

/**
 * kb hide has_archive page
 */
add_filter('register_post_type_args','sr_register_post_type_args', 10, 2);
function sr_register_post_type_args($args, $post_type) {
	if ( $post_type == 'ht_kb' ) {
		$args['has_archive'] = false;
	}
	return $args;
}
add_filter( 'ht_kb_get_ancestors', 'sr_ht_kb_get_ancestors', 10) ;
function sr_ht_kb_get_ancestors($ancestors) {
	foreach ( $ancestors as $key=>$values) {
		foreach( $values as $k=>$v) {
			if ($v['type'] == 'kb_home') {
				$ancestors[$key][$k]['link'] = site_url('/expert-advice/');
				$ancestors[$key][$k]['label'] = 'Expert Advice';
			}
			if ($v['type'] == 'kb_tax') {
				//unset($ancestors[$key][$k]);
			}
		}
	}
	return $ancestors;
}

/**
 * kb digital publication mailchimp form popup
 */
add_action( 'wp_footer', 'sr_digital_publication_form' , 99 );
function sr_digital_publication_form() {
	?>
	<div id="digitalform" class="modal sr-digitalform">
		<div class="modal-content sr-quote-form">
			<a href="javascript:void(0);" id="sr_digitalform_close" class="sr-quoteform-close"><i class="far fa-times-circle"></i></a>
			<?php 
			if(isset($_POST['_mc4wp_form_id'])) {
				?>
				<script>
					jQuery( document ).ready( function() {
						jQuery( '#digital-btn' ).trigger( 'click' );
					});
				</script>
				<?php
			}
			?>
			<h2><?php esc_html_e( 'Get our eMagazine', 'schulte-roofing' ); ?></h2>
			<p class="sr-quote-subtitle">
				<?php esc_html_e( 'Get Schulte Roofing®’s digital publication in your email or receive a physical copy.', 'schulte-roofing' ); ?>
			</p>
			<?php
			echo do_shortcode( '[mc4wp_form id="15889"]' ); ?>
		</div>
	</div>
<?php
}

/**
 * Move comment box in bottom in kb detail page
 */
function sr_move_comment_field_to_bottom( $fields ) {
	$sr_post_name = get_post_type( get_the_ID() );
	if( $sr_post_name == 'ht_kb' ){
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;		
	} else {
		return $fields;	
	}
}
add_filter( 'comment_form_fields', 'sr_move_comment_field_to_bottom' );

/**
 * Testimonial Meta Box
 */
function testimonial_meta_box() {
	add_meta_box( 'testimonial-id', esc_html__( 'Testimonial Rating', 'text-domain' ), 'testimonial_callback', 'testimonial', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'testimonial_meta_box', 1);

function testimonial_callback( $meta_id ) {
	$testimonial_page = get_post_meta( $meta_id->ID, 'meta_rating', true );
	$outline = '<select name="meta_rating" id="meta_rating">';
	$outline .= '<option value="0">'.esc_attr( __( 'Select Rating' ) ).'</option>';	
		for($i=1; $i<=5; $i++){
			$rate_value = $i * 20;
			if($testimonial_page == $rate_value ){
				$select_val = 'selected="selected"' ;
			}else{
				$select_val = '' ;
			}			
			$outline .= '<option value="'.$rate_value.'" '.$select_val.'>'.$i.'</option>';
		}
	$outline .= '</select>';
	echo $outline;
}

function testimonial_save_meta_box( $post_id ) {
	if(isset($_POST['meta_rating']))
	{
		update_post_meta($post_id,'meta_rating',$_POST['meta_rating']);
	}
}
add_action( 'save_post', 'testimonial_save_meta_box' );

/**
 * Change widget categories dropdown value
 */
function sr_change_categorie_dd_title($cat_args){
	$cat_args['show_option_none'] = __('Category');
	return $cat_args;
}
add_filter('widget_categories_dropdown_args', 'sr_change_categorie_dd_title');

/**
 * add author custom link in user profile
 */
add_action( 'show_user_profile', 'sr_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'sr_extra_user_profile_fields' );

function sr_extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>
    <table class="form-table">
		<tr>
			<th><label for="address"><?php _e("Author Link"); ?></label></th>
			<td>
				<input type="text" name="sr_author_link" id="sr_author_link" value="<?php echo esc_attr( get_the_author_meta( 'sr_author_link', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description"><?php _e("Please enter your Author Link."); ?></span>
			</td>
		</tr>
    </table>
<?php }

add_action( 'personal_options_update', 'sr_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'sr_save_extra_user_profile_fields' );

function sr_save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'sr_author_link', $_POST['sr_author_link'] );
}

/**
 * add meta description snippet
 */
function custom_excerpt_fn() {
	global $post;
	if( $post->post_excerpt ) {
		return wp_html_excerpt( do_shortcode( $post->post_excerpt ), 155 );
	} else {
		return wp_html_excerpt( do_shortcode( $post->post_content ), 155 );
	}
}

/**
 * define the action for register yoast_variable replacments
 */
function register_custom_yoast_variables() {
    wpseo_register_var_replacement( '%%custom_excerpt%%', 'custom_excerpt_fn', 'advanced', 'some help text' );
}
add_action( 'wpseo_register_extra_replacements', 'register_custom_yoast_variables' );

/**
 * add mobile menu in theme customize
 */
function sr_add_mobile_logo( $wp_customize ) {
	
   $wp_customize->add_section( 'sr_mobile_menu_sec' , array(
		'title'      => __( 'Mobile Logo', 'schulte-roofing' ),
		'priority'   => 30,
	) );
	$wp_customize->add_setting( 'sr_mobile_logo' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'sr_mobile_logo', array(
		'label'      => __( 'Mobile Logo', 'schulte-roofing' ),
		'section'    => 'sr_mobile_menu_sec',
		'settings'   => 'sr_mobile_logo',
	) ) );
}
add_action( 'customize_register', 'sr_add_mobile_logo' , 11 );

/**
 * Add category and tag image on category admin side
 */
add_action( 'portfoliocategory_add_form_fields', 'sr_add_term_image', 10, 2 );
add_action( 'portfoliotag_add_form_fields', 'sr_add_term_image', 10, 2 );
function sr_add_term_image( $taxonomy ){
    ?>
    <div class="form-field sr-term-image-group">
        <label for=""><?php _e( 'Feature Image', 'schulte-roofing' ); ?></label>
        <img id="txt_preview_image" src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" width="150" height="150" />
        <br/>
        <input type="hidden" name="txt_upload_image" id="txt_upload_image" value="" style="width: 77%">
        <input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
        <input type="button" id="remove_image_btn" class="button" value="Remove an Image" />
        <p class="description"><?php _e( 'This will be displayed in various places in the Roofing Portfolio','schulte-roofing' ); ?></p>
    </div>
    <?php
}

/**
 * Create category and tag image on category admin side
 */
add_action( 'created_portfoliocategory', 'sr_save_term_image', 10, 2 );
add_action( 'created_portfoliotag', 'sr_save_term_image', 10, 2 );
function sr_save_term_image( $term_id, $tt_id ) {
    if ( isset( $_POST['txt_upload_image'] ) && '' !== $_POST['txt_upload_image'] ){
        $group = $_POST['txt_upload_image'];
        add_term_meta($term_id, 'term_image', $group, true);
    }  else {
    	update_term_meta( $term_id, 'term_image', '' );
    }
}

/**
 * Edit category and tag image on category admin side
 */
add_action( 'portfoliocategory_edit_form_fields', 'sr_edit_image_upload', 10, 2 );
add_action( 'portfoliotag_edit_form_fields', 'sr_edit_image_upload', 10, 2 );
function sr_edit_image_upload( $term, $taxonomy ) {
    // get current group
    $txt_upload_image_id = get_term_meta( $term->term_id, 'term_image', true );
    $txt_upload_image    = wp_get_attachment_image_src( $txt_upload_image_id, 'thumbnail' );
    if ( $txt_upload_image ) {
    	$txt_upload_image_url = $txt_upload_image[0];
    } else {
    	$txt_upload_image_url = get_template_directory_uri() . '/images/no_image.jpg';
    }
	?>
    <tr class="form-field sr-term-image-group">
        <th>
        	<label for=""><?php _e( 'Feature Image', 'schulte-roofing' ); ?></label>
        </th>
        <td>
        	<img id="txt_preview_image" src="<?php echo $txt_upload_image_url; ?>" width="150" height="150" />
        	<br/>
        	<input type="hidden" name="txt_upload_image" id="txt_upload_image" value="<?php echo $txt_upload_image_id; ?>" style="width: 77%">
        	<input type="button" id="upload_image_btn" class="button" value="Upload an Image" />
        	<input type="button" id="remove_image_btn" class="button" value="Remove an Image" />
        	<p class="description"><?php _e( 'This will be displayed in various places in the Roofing Portfolio','schulte-roofing' ); ?></p>
        </td>
    </tr>
	<?php
}

/**
 * Update category and tag image on category admin side
 */
add_action( 'edited_portfoliocategory', 'sr_update_image_upload', 10, 2 );
add_action( 'edited_portfoliotag', 'sr_update_image_upload', 10, 2 );
function sr_update_image_upload( $term_id, $tt_id ) {
    if ( isset( $_POST['txt_upload_image'] ) && '' !== $_POST['txt_upload_image'] ){
        $group = $_POST['txt_upload_image'];
        update_term_meta( $term_id, 'term_image', $group );
    } else {
    	update_term_meta( $term_id, 'term_image', '' );
    }
}

/**
 * Upload media uploader js on category admin side
 */
function sr_image_uploader_enqueue() {
    global $typenow;
    if( ( $typenow == 'roofingportfolio' ) ) {
        wp_enqueue_media();

        wp_register_script( 'meta-image', get_template_directory_uri() . '/js/media-uploader.js', array( 'jquery' ) );
        wp_localize_script( 'meta-image', 'meta_image',
            array(
                'title' => 'Upload an Image',
                'button' => 'Use this Image',
                'siteurl' => get_template_directory_uri()
            )
        );
        wp_enqueue_script( 'meta-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'sr_image_uploader_enqueue' );


if (!(is_admin() )) {
	function defer_parsing_of_js ( $url ) {
		if ( FALSE === strpos( $url, '.js' ) ) return $url;
		if ( strpos( $url, 'jquery.js' ) ) return $url;
		// return "$url' defer ";
		return "$url' defer onload='";
	}
	add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}