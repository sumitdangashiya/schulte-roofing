<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Schulte_Roofing
 */

/**
 * Register widget with WordPress.
 */
function schulte_roofing_contact_widget_load() {
    register_widget( 'schulte_roofing_contact_widget' );
}
add_action( 'widgets_init', 'schulte_roofing_contact_widget_load' );

/**
 * Adds schulte_roofing_contact_widget widget.
 */
class schulte_roofing_contact_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sr-contact-widget',
			esc_html__('Schulte Roofing Contact', 'schulte-roofing'),
			array( 'description' => esc_html__( 'Contact Details on the footer', 'schulte-roofing' ), )
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
		$sr_contact_title     = $instance['sr_contact_title'];
		$sr_contact_address   = $instance['sr_contact_address'];
		$sr_contact_phone     = $instance['sr_contact_phone'];
		$sr_contact_sec_phone = $instance['sr_contact_sec_phone'];
		$sr_contact_email     = $instance['sr_contact_email'];
		$sr_contact_link      = $instance['sr_contact_link'];

		echo $args['before_widget'];
		if ( ! empty( $sr_contact_title ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $sr_contact_title ) . $args['after_title'];
		}

		echo "<ul class='sr-contact-details'>";
			if($sr_contact_address){
				echo "<li>". $sr_contact_address ."</li>";
			}
			if($sr_contact_phone){
				echo "<li class='contact-phone'>".esc_html__( 'Phone: ', 'schulte-roofing' )."<a href='tel:". $sr_contact_phone ."'>". $sr_contact_phone ."</a></li>";
			}
			if($sr_contact_sec_phone){
				echo "<li>".esc_html__( 'Secondary Phone: ', 'schulte-roofing' )."<a href='tel:". $sr_contact_sec_phone ."'>". $sr_contact_sec_phone ."</a></li>";
			}
			if($sr_contact_email){
				echo "<li>".esc_html__( 'Email: ', 'schulte-roofing' )."<a href='mailto:". $sr_contact_email ."'>". $sr_contact_email ."</a></li>";
			}
			if($sr_contact_link){
				echo "<li><a href='". $sr_contact_link ."'>".esc_html__( 'Learn More', 'schulte-roofing' )."</a></li>";
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

		if ( isset( $instance[ 'sr_contact_title' ] ) ) {
			$sr_contact_title = $instance[ 'sr_contact_title' ];
		}
		if ( isset( $instance[ 'sr_contact_address' ] ) ) {
			$sr_contact_address = $instance[ 'sr_contact_address' ];
		}
		if ( isset( $instance[ 'sr_contact_phone' ] ) ) {
			$sr_contact_phone = $instance[ 'sr_contact_phone' ];
		}
		if ( isset( $instance[ 'sr_contact_sec_phone' ] ) ) {
			$sr_contact_sec_phone = $instance[ 'sr_contact_sec_phone' ];
		}
		if ( isset( $instance[ 'sr_contact_email' ] ) ) {
			$sr_contact_email = $instance[ 'sr_contact_email' ];
		}
		if ( isset( $instance[ 'sr_contact_link' ] ) ) {
			$sr_contact_link = $instance[ 'sr_contact_link' ];
		}
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_contact_title' ); ?>"><?php _e( 'Contact Title:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_contact_title' ); ?>" name="<?php echo $this->get_field_name( 'sr_contact_title' ); ?>" type="text" value="<?php echo esc_attr( $sr_contact_title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_contact_address' ); ?>"><?php _e( 'Address:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_contact_address' ); ?>" name="<?php echo $this->get_field_name( 'sr_contact_address' ); ?>" type="text" value="<?php echo esc_attr( $sr_contact_address ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_contact_phone' ); ?>"><?php _e( 'Phone:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_contact_phone' ); ?>" name="<?php echo $this->get_field_name( 'sr_contact_phone' ); ?>" type="text" value="<?php echo esc_attr( $sr_contact_phone ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_contact_sec_phone' ); ?>"><?php _e( 'Secondary Phone:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_contact_sec_phone' ); ?>" name="<?php echo $this->get_field_name( 'sr_contact_sec_phone' ); ?>" type="text" value="<?php echo esc_attr( $sr_contact_sec_phone ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_contact_email' ); ?>"><?php _e( 'Email:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_contact_email' ); ?>" name="<?php echo $this->get_field_name( 'sr_contact_email' ); ?>" type="text" value="<?php echo esc_attr( $sr_contact_email ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_contact_link' ); ?>"><?php _e( 'Link:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_contact_link' ); ?>" name="<?php echo $this->get_field_name( 'sr_contact_link' ); ?>" type="text" value="<?php echo esc_attr( $sr_contact_link ); ?>" />
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