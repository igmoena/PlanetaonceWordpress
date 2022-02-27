<?php
/**
* Custom header sidebar widget for theme
* 
*/
	class WalkerPress_Custom_Header_Widget extends WP_Widget {
		public function __construct() {
		    parent::__construct(
		      'walkerpress_custom_header_widget', 
		      __( 'WalkerPress: Custom Header', 'walkerpress' ), 
		      array( 'description' => __( 'Theme Custom Widgets for Sidebar', 'walkerpress' ), ) // Args
		    );
		}
		
		/**
		   * Outputs the content of the widget
		   *
		   * @param array $args
		   * @param array $instance
		   */
		public function widget( $args, $instance ) {
			extract( $args );
			$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			if ( $title  ) {
				echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
			}
			
		}
		
		/**
			* Outputs the options form on admin
			*
			* @param array $instance The widget options
			*/
		public function form( $instance ) {
			$defaults = array(
				'title'    => __('Custom Heading','walkerpress'),
			);
			extract( wp_parse_args( ( array ) $instance, $defaults ) );?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php 
		}
		
		/**
			* Processing widget options on save
			*
			* @param array $new_instance The new options
			* @param array $old_instance The previous options
			*/
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
			return $instance;
		}
		
	}
	function register_walkerpress_custom_heading_widget() {
	    register_widget( 'WalkerPress_Custom_Header_Widget' );
	}
	add_action( 'widgets_init', 'register_walkerpress_custom_heading_widget' );