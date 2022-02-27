<?php /**
	*
	*Widgets for popular post
	*/
	class WalkerPress_Latest_Blog_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'walkerpress_latest_blog', // Base ID
			__( 'WalkerPress: Latest Post', 'walkerpress' ), // Name
			array( 'description' => __( 'Latest post Widets for the theme.', 'walkerpress' ), ) // Args
		);
	}
	/**
		* Outputs the content of the widget
		*
		* @param array $args
		* @param array $instance
		*/
	public function widget( $args, $instance ) {
		echo '<div class="sidebar-widget-block latest-post">';
			extract( $args );
			$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			if ( $title ) {
				echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
			}
			$latest_post_layout = isset( $instance['latest_post_layout'] ) ? apply_filters( 'latest_post_layout', $instance['latest_post_layout'] ) : 'layout-list';
			$post_date_status = $instance['post_date_status'];
			$post_thumbnail_status = $instance[ 'post_thumbnail_status' ];
			$post_per_page    = isset( $instance['post_per_page'] ) ? apply_filters( 'post_per_page', $instance['post_per_page'] ) : '';
			
			$args = array(
				'posts_per_page' => $post_per_page,
				);
			$wp_query = new WP_Query( $args );?>
			<ul class="latest-blog-widget <?php echo esc_attr($latest_post_layout);?>">
			<?php while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
		    
			     <li class="post-box latest-posts">

			     	<?php 
			     	if($post_thumbnail_status && has_post_thumbnail() ): ?>
					     <div class="post-thumbnail">
					     	<a href="<?php the_permalink()?>"> <?php if($post_thumbnail_status) the_post_thumbnail(); ?></a>
					     </div>
					     <?php endif; ?>
					  <?php if($post_thumbnail_status && has_post_thumbnail()): ?>
					  	<div class="post-content with-thumbnail">
					  <?php else: ?>
						<div class="post-content">
					  <?php endif; ?>
			     
			     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
				 	<?php if($post_date_status){
						walkerpress_custom_post_date(); 
				 	} ?>
			     </li>
		    
		<?php 
		endwhile;
		wp_reset_postdata();
			echo $after_widget;
		echo '</div>';
	}
	/**
	* Outputs the options form on admin
	*
	* @param array $instance The widget options
	*/
		public function form( $instance ) {
			// Set widget defaults
			$defaults = array(
				'title'    => '',
				'latest_post_layout' => 'layout-list',
				'post_date_status' => true,
				'post_thumbnail_status' => true,
				'post_per_page' => 3,
			);
			// Parse current settings with defaults
			extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>
			<?php // Widget Title ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'latest_post_layout' ) ); ?>"><?php _e( 'Choose Layout', 'walkerpress' ); ?></label><br />
                <input type="radio" value="layout-list" name="<?php echo $this->get_field_name( 'latest_post_layout' ); ?>" <?php checked( $latest_post_layout, 'layout-list' ); ?> id="<?php echo $this->get_field_id( 'latest_post_layout' ); ?>" />
                <?php esc_attr_e( 'List Layout', 'walkerpress' ); ?>
                <input type="radio" value="layout-thumb" name="<?php echo $this->get_field_name( 'latest_post_layout' ); ?>" <?php checked( $latest_post_layout, 'layout-thumb' ); ?> id="<?php echo $this->get_field_id( 'latest_post_layout' ); ?>" />
                <?php esc_attr_e( 'Full Thumbnail', 'walkerpress' ); ?>
            
			</p>
			<?php // Date Checkbox ?>
			<p>
			 	<input class="checkbox" type="checkbox" <?php checked( $post_date_status ); ?> id="<?php echo $this->get_field_id( 'post_date_status' ); ?>" name="<?php echo $this->get_field_name( 'post_date_status' ); ?>" />
                
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_date_status' ) ); ?>"><?php _e( 'Show Published Dates', 'walkerpress' ); ?></label>
			</p>
			<?php // Thumbnail Checkbox ?>
			<p>
				<input class="checkbox" type="checkbox" <?php checked( $post_thumbnail_status ); ?> id="<?php echo $this->get_field_id( 'post_thumbnail_status' ); ?>" name="<?php echo $this->get_field_name( 'post_thumbnail_status' ); ?>" />
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_thumbnail_status' ) ); ?>"><?php _e( 'Show Thumbnail', 'walkerpress' ); ?></label>
			</p>

			<?php //post per page ?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_per_page' ) ); ?>"><?php _e( 'Post Per Pagess', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_per_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_per_page' ) ); ?>" type="number" value="<?php echo esc_attr( $post_per_page ); ?>" />
			</p>
		<?php }
		/**
		* Widget options on save
		*
		* @param array $new_instance The new options
		* @param array $old_instance The previous options
		*/
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
			$instance['latest_post_layout']    = isset( $new_instance['latest_post_layout'] ) ? wp_strip_all_tags( $new_instance['latest_post_layout'] ) : 'layout-list';
			$instance['post_date_status'] = isset( $new_instance['post_date_status'] ) ? (bool) $new_instance['post_date_status'] : false;
			$instance['post_thumbnail_status'] = isset( $new_instance['post_thumbnail_status'] ) ? (bool) $new_instance['post_thumbnail_status'] : false;
			$instance['post_per_page']    = isset( $new_instance['post_per_page'] ) ? wp_strip_all_tags( $new_instance['post_per_page'] ) : '3';
			return $instance;
		}
	}
function walkerpress_register_latest_blog_widget() {
	register_widget( 'WalkerPress_Latest_Blog_Widget' );
}
add_action( 'widgets_init', 'walkerpress_register_latest_blog_widget' );	