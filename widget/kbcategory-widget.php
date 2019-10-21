<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Schulte_Roofing
 */

/**
 * Register widget with WordPress.
 */
function schulte_roofing_kbcategory_widget_load() {
    register_widget( 'schulte_roofing_kbcategory_widget' );
}
add_action( 'widgets_init', 'schulte_roofing_kbcategory_widget_load' );

/**
 * Adds schulte_roofing_kbcategory_widget widget.
 */
class schulte_roofing_kbcategory_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'sr-kbcategory-widget',
			esc_html__('Schulte Roofing Knowledge Base category', 'schulte-roofing'),
			array( 'description' => esc_html__( 'Knowledge Base category Dropdown listing', 'schulte-roofing' ), )
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
		static $first_dropdown = true;
		$sr_kdcategory_title   = $instance['sr_kdcategory_title'];
		$sr_hide_empty         = $instance['sr_hide_empty'] ? 1 : 0;

		echo $args['before_widget'];
		if ( ! empty( $sr_kdcategory_title ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $sr_kdcategory_title ) . $args['after_title'];
		}
		$kbcatargs = array(
						'orderby'    => 'name',
						'hide_empty' => $sr_hide_empty,
						'taxonomy'	 => 'ht_kb_category'
					);
		$kbcategory     = get_terms( $kbcatargs );
		$dropdown_id    = ( $first_dropdown ) ? 'sr_kb_cat_dd' : "{$this->id_base}-dropdown-{$this->number}";
		$first_dropdown = false;
		?>
		<select name="sr_kb_cat_dd" id="<?php echo $dropdown_id; ?>">
			<option value="" ><?php _e( 'Category', 'schulte-roofing' ); ?></option>
			<?php 
			foreach( $kbcategory as $term ) {
				echo '<option value="';
				echo get_term_link(intval($term->term_id),$taxonomy);
				echo '">' . "{$term->name}</option>";
			}
			?>
		</select>
		<script type="text/javascript">
			jQuery( document ).ready( function($){
				jQuery( "select#<?php echo $dropdown_id; ?>" ).change( function(){
					window.location.href = jQuery( this ).val();
				});
			});
		</script>
		<?php
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
		if ( isset( $instance[ 'sr_kdcategory_title' ] ) ) {
			$sr_kdcategory_title = $instance[ 'sr_kdcategory_title' ];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'sr_kdcategory_title' ); ?>"><?php _e( 'Title:', 'schulte-roofing' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'sr_kdcategory_title' ); ?>" name="<?php echo $this->get_field_name( 'sr_kdcategory_title' ); ?>" type="text" value="<?php echo esc_attr( $sr_kdcategory_title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("sr_hide_empty"); ?>">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("sr_hide_empty"); ?>" name="<?php echo $this->get_field_name("sr_hide_empty"); ?>" <?php checked( (bool) $instance["sr_hide_empty"], true ); ?> />
			  <?php _e( 'Hide empty categories', 'schulte-roofing' ); ?>
			</label>
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