<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Schulte_Roofing
 */

/**
 * Register widget with WordPress.
 */
function schulte_roofing_header_contact_widget_load() {
    register_widget( 'schulte_roofing_header_contact_widget' );
}
add_action( 'widgets_init', 'schulte_roofing_header_contact_widget_load' );

/**
 * Adds schulte_roofing_header_contact_widget widget.
 */
class schulte_roofing_header_contact_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sr-header-contact-widget',
			esc_html__('Schulte Roofing Menu Contact', 'schulte-roofing'),
			array( 'description' => esc_html__( 'Contact Details on the header', 'schulte-roofing' ), )
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
		$sr_header_phone      = $instance['sr_header_phone'];
		$sr_header_phone_link = $instance['sr_header_phone_link'];
		$sr_header_sec_phone  = $instance['sr_header_sec_phone'];
		$sr_header_livelink   = $instance['sr_header_livelink'];
		$sr_header_get_quote  = $instance['sr_header_get_quote'];

		echo $args['before_widget'];

		echo "<ul class='sr-header-contact'>";
			if( $sr_header_phone ) {
				echo "<li><span>" . esc_html__( 'Texas ', 'schulte-roofing' ) . "</span><a href='tel:" . $sr_header_phone_link . "'>" . $sr_header_phone . "</a></li>";
			}
			if( $sr_header_sec_phone ) {
				echo "<li><span>" . esc_html__( 'Direct ', 'schulte-roofing' ) . "</span><a href='tel:" . $sr_header_sec_phone . "'>" . $sr_header_sec_phone . "</a></li>";
			}
			echo "<li class='sr-header-contact-btn'>";
			if( $sr_header_livelink ) {
				echo "<a class='sr-all-btn tidio-live-chat' href='" . $sr_header_livelink . "'>" . esc_html__( 'Live Chat', 'schulte-roofing' ) . "</a>";
			}
			if( $sr_header_sec_phone ) {
				echo "<a href='tel:" . $sr_header_sec_phone . "' class='sr-mobile-call-now sr-all-btn'>" . esc_html__( 'Call Now', 'schulte-roofing' ) . "</a>";
			}
			if( $sr_header_get_quote ) {
				echo "<a id='quote_btn' class='sr-all-btn reverse' href='" . $sr_header_get_quote . "'>" . esc_html__( 'Get Quote', 'schulte-roofing' ) . "</a>";
			}
			echo "</li>";
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

		if ( isset( $instance[ 'sr_header_phone' ] ) ) {
			$sr_header_phone = $instance[ 'sr_header_phone' ];
		}
		if ( isset( $instance[ 'sr_header_phone_link' ] ) ) {
			$sr_header_phone_link = $instance[ 'sr_header_phone_link' ];
		}
		if ( isset( $instance[ 'sr_header_sec_phone' ] ) ) {
			$sr_header_sec_phone = $instance[ 'sr_header_sec_phone' ];
		}
		if ( isset( $instance[ 'sr_header_livelink' ] ) ) {
			$sr_header_livelink = $instance[ 'sr_header_livelink' ];
		}
		if ( isset( $instance[ 'sr_header_get_quote' ] ) ) {
			$sr_header_get_quote = $instance[ 'sr_header_get_quote' ];
		}
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_header_phone' ); ?>"><?php _e( 'Texas:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_header_phone' ); ?>" name="<?php echo $this->get_field_name( 'sr_header_phone' ); ?>" type="text" value="<?php echo esc_attr( $sr_header_phone ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_header_phone_link' ); ?>"><?php _e( 'Texas Link:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_header_phone_link' ); ?>" name="<?php echo $this->get_field_name( 'sr_header_phone_link' ); ?>" type="text" value="<?php echo esc_attr( $sr_header_phone_link ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_header_sec_phone' ); ?>"><?php _e( 'Direct:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_header_sec_phone' ); ?>" name="<?php echo $this->get_field_name( 'sr_header_sec_phone' ); ?>" type="text" value="<?php echo esc_attr( $sr_header_sec_phone ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_header_livelink' ); ?>"><?php _e( 'Live Chat Link:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_header_livelink' ); ?>" name="<?php echo $this->get_field_name( 'sr_header_livelink' ); ?>" type="text" value="<?php echo esc_attr( $sr_header_livelink ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_header_get_quote' ); ?>"><?php _e( 'Get Quote Link:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_header_get_quote' ); ?>" name="<?php echo $this->get_field_name( 'sr_header_get_quote' ); ?>" type="text" value="<?php echo esc_attr( $sr_header_get_quote ); ?>" />
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