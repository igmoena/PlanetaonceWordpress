<?php
class WalkerPress_Newsletter_Widget extends WP_Widget {
			public function __construct() {
			    parent::__construct(
			      'walkerpress_newsletter_widget', 
			      __( 'WalkerPress: Newsletter', 'walkerpress' ), 
			      array( 'description' => __( 'Newsletter Widget for Theme', 'walkerpress' ), ) // Args
			    );
			}
			
			/**
			   * Outputs the content of the widget
			   *
			   * @param array $args
			   * @param array $instance
			   */
			public function widget( $args, $instance ) {
				$newsletter_text_alignment = isset( $instance['newsletter_text_alignment'] ) ? apply_filters( 'newsletter_text_alignment', $instance['newsletter_text_alignment'] ) : 'align-left';
				if($newsletter_text_alignment =='align-center'){
					$text_alignment_class = 'text-center';
				}else{
					$text_alignment_class = 'text-left';
				}
				$newsletter_form_width    = isset( $instance['newsletter_form_width'] ) ? apply_filters( 'newsletter_form_width', $instance['newsletter_form_width'] ) : '';
				echo '<div class="newsletter-form '.esc_attr($text_alignment_class).'" style="width:'.esc_attr($newsletter_form_width).'% ">';
				$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
				$newsletter_description = isset( $instance['newsletter_description'] ) ? apply_filters( 'newsletter_description', $instance['newsletter_description'] ) : '';
				$newsletter_form_shortcode = isset( $instance['newsletter_form_shortcode'] ) ? apply_filters( 'newsletter_form_shortcode', $instance['newsletter_form_shortcode'] ) : '';
				
				if ( $title ) {
					echo '<h3 class="widget-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h3>';
				}
				if(!empty($newsletter_description)){
					echo '<p class="form-desc">'.esc_html($newsletter_description).'</p>';
				}
				if(!empty($newsletter_form_shortcode)){
					echo do_shortcode($newsletter_form_shortcode);
				}
				
				echo '</div>';
				
			}
			
			/**
				* Outputs the options form on admin
				*
				* @param array $instance The widget options
				*/
			public function form( $instance ) {
				$defaults = array(
					'title'    => __('Newsletter','walkerpress'),
					'newsletter_description' => '',
					'newsletter_form_shortcode' => '',
					'newsletter_text_alignment' => 'align-left',
					'newsletter_form_width' => 100,
				);
				extract( wp_parse_args( ( array ) $instance, $defaults ) ); 
				?>
				<div class="walkerpress-widget-form">
				<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'walkerpress' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
				</p>
				<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'newsletter_description' ) ); ?>"><?php _e( 'Description:', 'walkerpress' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'newsletter_description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'newsletter_description' ) ); ?>" type="text" value="<?php echo esc_attr( $newsletter_description ); ?>">
				</p>
				<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'newsletter_form_shortcode' ) ); ?>"><?php _e( 'Contact Form 7: Form Shortcode:', 'walkerpress' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'newsletter_form_shortcode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'newsletter_form_shortcode' ) ); ?>" type="text" value="<?php echo esc_attr( $newsletter_form_shortcode ); ?>">
				</p>
				<p>
				<?php
				$newsletter_alignment = array('align-left'=>__('Left','walkerpress'), 'align-center'=>__('Center','walkerpress') );
				?>
				<label for="<?php echo esc_attr( $this->get_field_id( 'newsletter_text_alignment' ) ); ?>"><?php _e( 'Choose Layout', 'walkerpress' ); ?></label><br />
				<select name="<?php echo $this->get_field_name( 'newsletter_text_alignment' ); ?>" id="<?php echo $this->get_field_id( 'newsletter_text_alignment' ); ?>" >
					
					<?php 
					foreach($newsletter_alignment as $text_alignment => $text_align_label) {?>
					  <option value="<?php echo $text_alignment;?>"  <?php selected( $newsletter_text_alignment,$text_alignment ); ?> ><?php echo $text_align_label;?></option>
					<?php }
					?>
				</select>
			</p>
			<?php //form width ?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'newsletter_form_width' ) ); ?>"><?php _e( 'Newsletter Width [%] ( Please keep the value between 10 to 100 )', 'walkerpress' ); ?></label>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'newsletter_form_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'newsletter_form_width' ) ); ?>" type="number" value="<?php echo esc_attr( $newsletter_form_width ); ?>" min="10" max="100" />
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
				$instance['newsletter_description'] = ( ! empty( $new_instance['newsletter_description'] ) ) ? strip_tags( $new_instance['newsletter_description'] ) : '';
				$instance['newsletter_form_shortcode'] = ( ! empty( $new_instance['newsletter_form_shortcode'] ) ) ? strip_tags( $new_instance['newsletter_form_shortcode'] ) : '';
				$instance['newsletter_text_alignment'] = ( ! empty( $new_instance['newsletter_text_alignment'] ) ) ? strip_tags( $new_instance['newsletter_text_alignment'] ) : '';
				$instance['newsletter_form_width'] = ( ! empty( $new_instance['newsletter_form_width'] ) ) ? strip_tags( $new_instance['newsletter_form_width'] ) : '';
				return $instance;
			}
			
		}
		function register_walkerpress_newsletter_widget() {
		    register_widget( 'WalkerPress_Newsletter_Widget' );
		}
		add_action( 'widgets_init', 'register_walkerpress_newsletter_widget' );
