<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Schulte_Roofing
 */

/**
 * Register widget with WordPress.
 */
function schulte_roofing_social_media_widget_load() {
    register_widget( 'schulte_roofing_social_media_widget' );
}
add_action( 'widgets_init', 'schulte_roofing_social_media_widget_load' );

/**
 * Adds schulte_roofing_social_media_widget widget.
 */
class schulte_roofing_social_media_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sr-social-media-widget',
			esc_html__('Schulte Roofing Social Media', 'schulte-roofing'),
			array( 'description' => esc_html__( 'Social Media on the footer', 'schulte-roofing' ), )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$sr_title    	    = $instance['sr_title'];
		$sr_facebook_url    = $instance['sr_facebook_url'];
		$sr_pinterest_url   = $instance['sr_pinterest_url'];
		$sr_twitter_url     = $instance['sr_twitter_url'];
		$sr_google_url      = $instance['sr_google_url'];
		$sr_houzz_url       = $instance['sr_houzz_url'];
		$sr_linkedin_url    = $instance['sr_linkedin_url'];
		$sr_youtube_url     = $instance['sr_youtube_url'];
		$sr_instagram_url   = $instance['sr_instagram_url'];
		$sr_rss_url         = $instance['sr_rss_url'];
		$sr_bbb_url         = $instance['sr_bbb_url'];
	
		echo $args['before_widget'];
		if ( ! empty( $sr_title ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $sr_title ) . $args['after_title'];
		}

		echo "<ul class='sr-social-media'>";
			if ( $sr_facebook_url ) {
				echo "<li><a href='$sr_facebook_url' target='_blank' class='social-facebook'><i class='fab fa-facebook-f'></i></a></li>";
			}
			if ( $sr_pinterest_url ) {
				echo "<li><a href='$sr_pinterest_url' target='_blank' class='social-pinterest'><i class='fab fa-pinterest-p'></i></a></li>";
			}
			if ( $sr_twitter_url ) {
				echo "<li><a href='$sr_twitter_url' target='_blank' class='social-twitter'><i class='fab fa-twitter'></i></a></li>";
			}
			if ( $sr_google_url ) {
				echo "<li><a href='$sr_google_url' target='_blank' class='social-google'><i class='fab fa-google-plus-g'></i></a></li>";
			}
			if ( $sr_houzz_url ) {
				echo "<li><a href='$sr_houzz_url' target='_blank' class='social-houzz'></a></li>";
			}
			if ( $sr_linkedin_url ) {
				echo "<li><a href='$sr_linkedin_url' target='_blank' class='social-linkedin'><i class='fab fa-linkedin'></i></a></li>";
			}
			if ( $sr_youtube_url ) {
				echo "<li><a href='$sr_youtube_url' target='_blank' class='social-youtube'><i class='fab fa-youtube'></i></a></li>";
			}
			if ( $sr_instagram_url ) {
				echo "<li><a href='$sr_instagram_url' target='_blank' class='social-instagram'><i class='fab fa-instagram'></i></a></li>";
			}
			if ( $sr_rss_url ) {
				echo "<li><a href='$sr_rss_url' target='_blank' class='social-rss'><i class='fas fa-rss'></i></a></li>";
			}
			if ( $sr_bbb_url ) {
				echo "<li><a href='$sr_bbb_url' target='_blank' class='social-bbb'></a></li>";
			}

		echo "</ul>";

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'sr_title' ] ) ) {
			$sr_title = $instance[ 'sr_title' ];
		}
		if ( isset( $instance[ 'sr_facebook_url' ] ) ) {
			$sr_facebook_url = $instance[ 'sr_facebook_url' ];
		}
		if ( isset( $instance[ 'sr_pinterest_url' ] ) ) {
			$sr_pinterest_url = $instance[ 'sr_pinterest_url' ];
		}
		if ( isset( $instance[ 'sr_twitter_url' ] ) ) {
			$sr_twitter_url = $instance[ 'sr_twitter_url' ];
		}
		if ( isset( $instance[ 'sr_google_url' ] ) ) {
			$sr_google_url = $instance[ 'sr_google_url' ];
		}
		if ( isset( $instance[ 'sr_houzz_url' ] ) ) {
			$sr_houzz_url = $instance[ 'sr_houzz_url' ];
		}
		if ( isset( $instance[ 'sr_linkedin_url' ] ) ) {
			$sr_linkedin_url = $instance[ 'sr_linkedin_url' ];
		}
		if ( isset( $instance[ 'sr_youtube_url' ] ) ) {
			$sr_youtube_url = $instance[ 'sr_youtube_url' ];
		}
		if ( isset( $instance[ 'sr_instagram_url' ] ) ) {
			$sr_instagram_url = $instance[ 'sr_instagram_url' ];
		}
		if ( isset( $instance[ 'sr_rss_url' ] ) ) {
			$sr_rss_url = $instance[ 'sr_rss_url' ];
		}
		if ( isset( $instance[ 'sr_bbb_url' ] ) ) {
			$sr_bbb_url = $instance[ 'sr_bbb_url' ];
		}
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_title' ); ?>" name="<?php echo $this->get_field_name( 'sr_title' ); ?>" type="text" value="<?php echo esc_attr( $sr_title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_facebook_url' ); ?>"><?php _e( 'Facebook URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_facebook_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_facebook_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_pinterest_url' ); ?>"><?php _e( 'Pinterest URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_pinterest_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_pinterest_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_pinterest_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_twitter_url' ); ?>"><?php _e( 'Twitter URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_twitter_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_twitter_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_google_url' ); ?>"><?php _e( 'Google Plus URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_google_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_google_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_google_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_houzz_url' ); ?>"><?php _e( 'Houzz URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_houzz_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_houzz_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_houzz_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_linkedin_url' ); ?>"><?php _e( 'Linkedin URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_linkedin_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_linkedin_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_youtube_url' ); ?>"><?php _e( 'Youtube URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_youtube_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_youtube_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_youtube_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_instagram_url' ); ?>"><?php _e( 'Instagram URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_instagram_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_instagram_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_instagram_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_rss_url' ); ?>"><?php _e( 'RSS URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_rss_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_rss_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_rss_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_bbb_url' ); ?>"><?php _e( 'BBB URL:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_bbb_url' ); ?>" name="<?php echo $this->get_field_name( 'sr_bbb_url' ); ?>" type="text" value="<?php echo esc_attr( $sr_bbb_url ); ?>" />
		</p>

	<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		return $new_instance;
	}
}