<?php class WalkerPress_Single_Category_Post extends WP_Widget {
	public function __construct() {
		parent::__construct(
				'walkerpress_single_category_widget', // Base ID
				__( 'WalkerPress: Single Category', 'walkerpress' ), // Name
				array( 'description' => __( 'Single Category Layout Widget for Theme', 'walkerpress' ), ) // Args
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
		echo '<div class="walkerpress-widget-content">';
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		if ( $title ) {
			echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
		}
		$select_category    = isset( $instance['select_category'] ) ? apply_filters( 'select_category', $instance['select_category'] ) : '';
		$post_thumbnail_status = $instance[ 'post_thumbnail_status' ];
		$post_per_page    = isset( $instance['post_per_page'] ) ? apply_filters( 'post_per_page', $instance['post_per_page'] ) : '';
		$single_category_layout = isset( $instance['single_category_layout'] ) ? apply_filters( 'single_category_layout', $instance['single_category_layout'] ) : '';
		$current_category = get_category_by_slug($select_category); 
   		$selected_category = $current_category->term_id;
		if($single_category_layout=='single-layout-list-2'){
			if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );
					echo ' <ul class="categories-widget single-category list-layout-2">';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>"> <?php if($post_thumbnail_status) {
								     		the_post_thumbnail();
								     	}  ?></a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
											}else{
												walkerpress_custom_post_date();	
											}
											
											?>
									</div>
							     	
								</div>
					     	</li>
						<?php endwhile;
					echo '</ul>';
				wp_reset_postdata();
			}
		}elseif($single_category_layout=='single-layout-list-full'){
			if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );
					echo ' <ul class="categories-widget single-category list-layout-full">';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>"> <?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	}  ?></a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h4 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h4>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_author_status','true')){
													walkerpress_custom_post_author();
												}
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
												if(get_theme_mod('home_post_comment_status','true')){
													walkerpress_post_comments();
												}
												
											}else{
												walkerpress_custom_post_author();
												walkerpress_custom_post_date();
												walkerpress_post_comments();
												
											}
											?>

									</div>
									<p><?php echo esc_html(walkerpress_excerpt('35'));?></p>
							     	<a href="<?php the_permalink();?>"  class="walkerpress-primary-button">
							     		<?php if(get_theme_mod('walkerpress_excerpt_more')){
											echo esc_html(get_theme_mod('walkerpress_excerpt_more'));
										}else{
											echo __('Read More','walkerpress');
										}?>
							     	</a>
							     	
								</div>
					     	</li>
						<?php endwhile;
					echo '</ul>';
				wp_reset_postdata();
			}
		}elseif($single_category_layout=='single-layout-grid'){
			if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );
					echo ' <ul class="categories-widget single-category grid-layout">';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>">
								     	<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?></a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_author_status','true')){
													walkerpress_custom_post_author();
												}
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
												if(get_theme_mod('home_post_comment_status','true')){
													walkerpress_post_comments();
												}
												
											}else{
												walkerpress_custom_post_author();
												walkerpress_custom_post_date();
												walkerpress_post_comments();
												
											}
											?>
									</div>
								</div>
					     	</li>
						<?php endwhile;
					echo '</ul>';
				wp_reset_postdata();
			}
		}elseif($single_category_layout=='single-layout-featured-list'){
			if($selected_category > 0){
				echo '<div class="categories-widget single-category featured-list-layout">';
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => 1,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );
					echo '<div class="walkerwp-grid-7 featured-post">';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>"> 
								     		<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?>
								     	</a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h4 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h4>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_author_status','true')){
													walkerpress_custom_post_author();
												}
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
												if(get_theme_mod('home_post_comment_status','true')){
													walkerpress_post_comments();
												}
												
											}else{
												walkerpress_custom_post_author();
												walkerpress_custom_post_date();
												walkerpress_post_comments();
												
											}
											?>
									</div>
									<p><?php echo esc_html(walkerpress_excerpt('35'));?></p>
							     	<a href="<?php the_permalink();?>"  class="walkerpress-primary-button">
							     		<?php if(get_theme_mod('walkerpress_excerpt_more')){
											echo esc_html(get_theme_mod('walkerpress_excerpt_more'));
										}else{
											echo __('Read More','walkerpress');
										}?>
							     	</a>
								</div>
					     	</li>
						<?php endwhile;
					echo '</div>';
				wp_reset_postdata();
				echo '<div class="walkerwp-grid-5 post-lists">';
				if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page-1,
					'cat'			=>$selected_category,
					'offset' 		=> 1,
				);
				$wp_query = new WP_Query( $args );
					echo ' <ul>';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>"> <?php if($post_thumbnail_status) the_post_thumbnail(); ?></a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
											}else{
												walkerpress_custom_post_date();	
											}
											
											?>
									</div>
							     	
								</div>
					     	</li>
						<?php endwhile;
					echo '</ul>';
				wp_reset_postdata();
			}
				echo '</div>';
			echo '</div>';
			}
		}elseif($single_category_layout=='single-layout-featured-grid'){
			if($selected_category > 0){
				echo '<div class="categories-widget single-category featured-grid-layout">';
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => 1,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );
					echo '<div class="walkerwp-grid-6 featured-post">';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>"> 
								     		<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?>
								     	</a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h4 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h4>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_author_status','true')){
													walkerpress_custom_post_author();
												}
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
												if(get_theme_mod('home_post_comment_status','true')){
													walkerpress_post_comments();
												}
												
											}else{
												walkerpress_custom_post_author();
												walkerpress_custom_post_date();
												walkerpress_post_comments();
												
											}
											?>
									</div>
									<p><?php echo esc_html(walkerpress_excerpt('35'));?></p>
							     	<a href="<?php the_permalink();?>"  class="walkerpress-primary-button">
							     		<?php if(get_theme_mod('walkerpress_excerpt_more')){
											echo esc_html(get_theme_mod('walkerpress_excerpt_more'));
										}else{
											echo __('Read More','walkerpress');
										}?>
							     	</a>
								</div>
					     	</li>
						<?php endwhile;
					echo '</div>';
				wp_reset_postdata();
				echo '<div class="walkerwp-grid-6 post-lists">';
				if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page-1,
					'cat'			=>$selected_category,
					'offset' 		=> 1,
				);
				$wp_query = new WP_Query( $args );
					echo ' <ul>';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>"> 
								     		<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?>
								     	</a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
											}else{
												walkerpress_custom_post_date();	
											}
											
											?>
									</div>
							     	
								</div>
					     	</li>
						<?php endwhile;
					echo '</ul>';
				wp_reset_postdata();
			}
				echo '</div>';
				echo '</div>';
			}

		}elseif($single_category_layout=='single-layout-overlay-grid'){
			if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );
					echo ' <ul class="categories-widget single-category grid-layout-overlay">';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>"> 
								     		<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?>
								     	</a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
											}else{
												walkerpress_custom_post_date();	
											}
											
											?>
									 	
									</div>
								</div>
					     	</li>
						<?php endwhile;
					echo '</ul>';
				wp_reset_postdata();
			}
		}elseif($single_category_layout=='single-layout-carousel'){
			if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );?>
				<div class="carousel-widget-single categories-widget single-category">
					<div class="single-cat-layout-carousel-arrows">
						<div class="grid-layout-post-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
					    <div class="grid-layout-post-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
					</div>
					<div class="swiper-container grid-layout-carousel">
						<div class="swiper-wrapper">
						<?php while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
							<div class="swiper-slide">
						    	<div class="post-box">
							     	<?php 
							     	if($post_thumbnail_status): ?>
									     <div class="post-thumbnail">
									     	<a href="<?php the_permalink()?>"> 
									     	<?php if($post_thumbnail_status){
									     		walkerpress_article_estimate_reading_time();
									     		the_post_thumbnail();
									     	} 
									     	 ?>
									     	</a>
									     </div>
									<?php endif; ?>
									<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
									  	<div class="post-content swith-thumbnail">
									<?php else: ?>
										<div class="post-content">
									<?php endif; ?>
						     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
								     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
								     	<div class="entry-meta">
								     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
											}else{
												walkerpress_custom_post_date();	
											}
											
											?>
										 	
										</div>
									</div>
						     	</div>
						    </div>
						<?php endwhile;
						wp_reset_postdata();
					echo '</div>';
				echo '</div>';
				echo '</div>';
			}
		}else{
			if($selected_category > 0){
				$selected_category = $selected_category;
				$args = array(
					'posts_per_page' => $post_per_page,
					'cat'			=>$selected_category,
				);
				$wp_query = new WP_Query( $args );
					echo ' <ul class="categories-widget single-category list-layout">';
						while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
					    	<li class="post-box">
						     	<?php 
						     	if($post_thumbnail_status): ?>
								     <div class="post-thumbnail">
								     	<a href="<?php the_permalink()?>">
								     		<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?>
								     	</a>
								     </div>
								<?php endif; ?>
								<?php if($post_thumbnail_status && has_post_thumbnail()): ?>
								  	<div class="post-content with-thumbnail">
								<?php else: ?>
									<div class="post-content">
								<?php endif; ?>
					     			<?php 
										if(walkerpress_set_to_premium()){
											if(get_theme_mod('home_post_cat_status','true')){
												walkerpress_custom_category();
											}
										}else{
											walkerpress_custom_category();
										}
										?>
							     	<h4 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h4>
							     	<div class="entry-meta">
							     		<?php 
											if(walkerpress_set_to_premium()){
												if(get_theme_mod('home_post_author_status','true')){
													walkerpress_custom_post_author();
												}
												if(get_theme_mod('home_post_date_status','true')){
													walkerpress_custom_post_date();
												}
												if(get_theme_mod('home_post_comment_status','true')){
													walkerpress_post_comments();
												}
												
											}else{
												walkerpress_custom_post_author();
												walkerpress_custom_post_date();
												walkerpress_post_comments();
												
											}
											?>
									</div>
							     	<p><?php echo esc_html(walkerpress_excerpt('35'));?></p>
							     	<a href="<?php the_permalink();?>"  class="walkerpress-primary-button">
							     		<?php if(get_theme_mod('walkerpress_excerpt_more')){
											echo esc_html(get_theme_mod('walkerpress_excerpt_more'));
										}else{
											echo __('Read More','walkerpress');
										}?>
									</a>
							     
								</div>
					     	</li>
						<?php endwhile;
					echo '</ul>';
				wp_reset_postdata();
			}
		}
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
				'select_category' =>'',
				'post_date_status' => true,
				'post_thumbnail_status' => true,
				'post_per_page' => 3,
				'single_category_layout' => 'single-layout-list',
			);
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

			<?php // Widget Title ?>
			<div class="walkerpress-widget-form single-category-widget-form">
			<p class="half one">
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Category Label', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			<p class="half two">
				<?php
				$single_cat_section_layouts = array('single-layout-list'=>__('List View','walkerpress'), 'single-layout-list-2'=>__('List View: 2 Column','walkerpress'), 'single-layout-list-full'=>__('List View: Full Featured Image','walkerpress'),'single-layout-grid'=>__('Grid View','walkerpress'),'single-layout-featured-list' => __('Featured Post:List View','walkerpress'),'single-layout-featured-grid' => __('Featured Post:Grid View','walkerpress'),'single-layout-overlay-grid'=> __('Grid View: Content Overlay','walkerpress'),'single-layout-carousel' => __('Carousel post View','walkerpress') );
				?>
				<label for="<?php echo esc_attr( $this->get_field_id( 'single_category_layout' ) ); ?>"><?php _e( 'Choose Layout', 'walkerpress' ); ?></label><br />
				<select name="<?php echo $this->get_field_name( 'single_category_layout' ); ?>" id="<?php echo $this->get_field_id( 'single_category_layout' ); ?>" >
					
					<?php 
					foreach($single_cat_section_layouts as $single_layout => $single_layout_label) {?>
					  <option value="<?php echo $single_layout;?>"  <?php selected( $single_category_layout,$single_layout ); ?> ><?php echo $single_layout_label;?></option>
					<?php }
					?>
				</select>
			</p>

			<?php // Widget Category ?>
			<p class="half three">
			<?php	
				$cat_args=array(
				  'post_type' => 'post',
				  'order' => 'ASC',
				  'hide_empty' => true,
				);
				$categories=get_categories($cat_args);
				if($categories){?>
					<label for="<?php echo esc_attr( $this->get_field_id( 'select_category' ) ); ?>"><?php _e( 'Select Categroy', 'walkerpress' ); ?></label>
					 <select name="<?php echo $this->get_field_name( 'select_category' ); ?>" id="<?php echo $this->get_field_id( 'select_category' ); ?>" >
					 	<option value="0"><?php _e('Select Category','walkerpress');?></option>
					 	 <?php foreach( $categories as $category ) : ?>
		                    <option value="<?php echo $category->slug; ?>"  <?php selected( $select_category,$category->slug ); ?> ><?php echo $category->name; ?></option>
		                <?php endforeach; ?>
					</select>
				<?php }?>

	       
			</p>
			<?php //post per page ?>
			<p class="half four">
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_per_page' ) ); ?>"><?php _e( 'Post Per Page', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_per_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_per_page' ) ); ?>" type="number" value="<?php echo esc_attr( $post_per_page ); ?>" />
			</p>
			
			<?php // Thumbnail Checkbox ?>
			<p>
				<input class="checkbox" type="checkbox" <?php checked( $post_thumbnail_status ); ?> id="<?php echo $this->get_field_id( 'post_thumbnail_status' ); ?>" name="<?php echo $this->get_field_name( 'post_thumbnail_status' ); ?>" />
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_thumbnail_status' ) ); ?>"><?php _e( 'Show Thumbnail', 'walkerpress' ); ?></label>
			</p>

			
		</div>
			

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
				$instance['select_category']    = isset( $new_instance['select_category'] ) ? wp_strip_all_tags( $new_instance['select_category'] ) : '';
				$instance['post_thumbnail_status'] = isset( $new_instance['post_thumbnail_status'] ) ? (bool) $new_instance['post_thumbnail_status'] : false;
				$instance['post_per_page']    = isset( $new_instance['post_per_page'] ) ? wp_strip_all_tags( $new_instance['post_per_page'] ) : '3';
				$instance['single_category_layout']    = isset( $new_instance['single_category_layout'] ) ? wp_strip_all_tags( $new_instance['single_category_layout'] ) : '';
				return $instance;
			}
		}
	function walkerpress_register_single_category_post_widget() {
			register_widget( 'WalkerPress_Single_Category_Post' );
	}
	add_action( 'widgets_init', 'walkerpress_register_single_category_post_widget' );