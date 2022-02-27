<?php
class WalkerPress_Social_Media_Widget extends WP_Widget {
			public function __construct() {
			    parent::__construct(
			      'walkerpress_social_media_widget', 
			      __( 'WalkerPress: Social Media', 'walkerpress' ), 
			      array( 'description' => __( 'Social Media Widgets for Theme', 'walkerpress' ), ) // Args
			    );
			}
			
			/**
			   * Outputs the content of the widget
			   *
			   * @param array $args
			   * @param array $instance
			   */
			public function widget( $args, $instance ) {
				echo $args['before_widget'];
				$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
				if ( $title ) {
				echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
			}

				ob_start();
				get_template_part( 'template-parts/partials/social-icons');
				$strrr= ob_get_clean();
				echo $strrr;
				echo $args['after_widget'];
				
			}
			
			/**
				* Outputs the options form on admin
				*
				* @param array $instance The widget options
				*/
			public function form( $instance ) {
				$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Follow us', 'walkerpress' );
				?>
				<div class="walkerpress-widget-form">
					<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php __( 'Title:', 'walkerpress' ); ?></label> 
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
					</p>
				</div>
				<?php 
			}
			
			/**
				* Processing widget options on save
				*
				* @param array $new_instance The new options
				* @param array $old_instance The previous options
				*/
			public function update( $new_instance, $old_instance ) {
				$instance = array();
				$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
				return $instance;
			}
			
		}
		function register_walkerpress_social_media_widget() {
		    register_widget( 'WalkerPress_Social_Media_Widget' );
		}
		add_action( 'widgets_init', 'register_walkerpress_social_media_widget' );
