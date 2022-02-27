<?php class WalkerPress_Double_Category_Post extends WP_Widget {
	public function __construct() {
		parent::__construct(
				'walkerpress_double_category_widget', // Base ID
				__( 'WalkerPress: Double Category', 'walkerpress' ), // Name
				array( 'description' => __( 'Double Category Layout Widget for Theme', 'walkerpress' ), ) // Args
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
		$title_two    = isset( $instance['title_two'] ) ? apply_filters( 'widget_title', $instance['title_two'] ) : '';
		
		$select_category    = isset( $instance['select_category'] ) ? apply_filters( 'select_category', $instance['select_category'] ) : '';
		$select_category_two   = isset( $instance['select_category_two'] ) ? apply_filters( 'select_category_two', $instance['select_category_two'] ) : '';
		$post_thumbnail_status = $instance[ 'post_thumbnail_status' ];
		$post_per_page    = isset( $instance['post_per_page'] ) ? apply_filters( 'post_per_page', $instance['post_per_page'] ) : '';
		$post_per_page_two    = isset( $instance['post_per_page_two'] ) ? apply_filters( 'post_per_page_two', $instance['post_per_page_two'] ) : '';
		$double_category_layout = isset( $instance['double_category_layout'] ) ? apply_filters( 'double_category_layout', $instance['double_category_layout'] ) : '';
		$current_category = get_category_by_slug($select_category); 
   		$select_category = $current_category->term_id;

   		$current_category_two = get_category_by_slug($select_category_two); 
   		$select_category_two = $current_category_two->term_id;

		if($double_category_layout=='double-layout-list'){
			/**
			* Category 1 
			*/
			if($select_category > 0){
				$selected_category = $select_category;

				
				echo '<div class="walkerwp-grid-6 category-one">';
				if ( $title ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
				}

					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page,
						'cat'			=>$selected_category,
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
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
				echo '</div>';
			}
		
	/*end of category 1*/
	/**
			* Category 2
			*/
			if($select_category_two > 0){
				$selected_category = $select_category_two;

				echo '<div class="walkerwp-grid-6 category-two">';
				if ( $title_two ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title_two'] ) .'</span></h5>';
				}
					
					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page_two,
						'cat'			=>$selected_category,
						
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
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
				echo '</div>';
			}
			/*end of category 2*/
		}elseif($double_category_layout=='double-featured-view'){
			/**
			* Category 1 
			*/
			if($select_category > 0){
				$selected_category = $select_category;

				$args = array(
					'posts_per_page' => 1,
					'cat'			=>$selected_category,
				);
				echo '<div class="walkerwp-grid-8 category-one featured-view">';
				if ( $title ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
				}
				echo '<div class="walkerwp-grid-7">';
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box featured-post">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
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
								     	<p><?php echo esc_html(walkerpress_excerpt('25'));?></p>
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
						echo '</ul> </div>';
					wp_reset_postdata();

					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page-1,
						'cat'			=>$selected_category,
						'offset'		=> 1,
					);
					$wp_query = new WP_Query( $args );
					echo '<div class="walkerwp-grid-5">';
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
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
						echo '</ul></div>';
					wp_reset_postdata();
				echo '</div>';
			}
	/*end of category 1*/
	/*category 2 start*/
	if($select_category_two > 0){
				$selected_category = $select_category_two;

				echo '<div class="walkerwp-grid-4 category-two featured-view">';
				if ( $title_two ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title_two'] ) .'</span></h5>';
				}
					
					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page_two,
						'cat'			=>$selected_category,
						
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout ">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
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
				echo '</div>';
			}
	/*end category 2*/
		}

elseif($double_category_layout=='double-featured-view-two'){
			/**
			* Category 1 
			*/
			if($select_category > 0){
				$selected_category = $select_category;

				
				echo '<div class="walkerwp-grid-8 category-one featured-view style-2">';
				if ( $title ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
				}


					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page-1,
						'cat'			=>$selected_category,
						'offset'		=> 1,
					);
					$wp_query = new WP_Query( $args );
					echo '<div class="walkerwp-grid-5">';
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
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
						echo '</ul></div>';
					wp_reset_postdata();

					$args = array(
					'posts_per_page' => 1,
					'cat'			=>$selected_category,
				);
				echo '<div class="walkerwp-grid-7">';
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box featured-post">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
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
								     	<p><?php echo esc_html(walkerpress_excerpt('25'));?></p>
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
						echo '</ul> </div>';
					wp_reset_postdata();
				echo '</div>';
			}
	/*end of category 1*/
	/*category 2 start*/
	if($select_category_two > 0){
				$selected_category = $select_category_two;

				echo '<div class="walkerwp-grid-4 category-two featured-view">';
				if ( $title_two ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title_two'] ) .'</span></h5>';
				}
					
					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page_two,
						'cat'			=>$selected_category,
						
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout ">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
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
				echo '</div>';
			}
		/*end category 2*/
		}elseif($double_category_layout=='double-featured-view-three'){
			/**
			* Category 1 
			*/
			if($select_category > 0){
				$selected_category = $select_category;

				$args = array(
					'posts_per_page' => 1,
					'cat'			=>$selected_category,
				);
				echo '<div class="walkerwp-grid-8 category-one featured-view style-thumbnail">';
				if ( $title ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
				}
				echo '<div class="walkerwp-grid-7">';
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout"> ';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box featured-post">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
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
								     	<p><?php echo esc_html(walkerpress_excerpt('25'));?></p>
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
						echo '</ul> </div>';
					wp_reset_postdata();

					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page-1,
						'cat'			=>$selected_category,
						'offset'		=> 1,
					);
					$wp_query = new WP_Query( $args );
					echo '<div class="walkerwp-grid-5">';
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
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
						     		
								     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
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
						     	</li>
							<?php endwhile;
						echo '</ul></div>';
					wp_reset_postdata();
				echo '</div>';
			}
	/*end of category 1*/
	/*category 2 start*/
	if($select_category_two > 0){
				$selected_category = $select_category_two;

				echo '<div class="walkerwp-grid-4 category-two featured-view style-thumbnail">';
				if ( $title_two ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title_two'] ) .'</span></h5>';
				}
					
					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page_two,
						'cat'			=>$selected_category,
						
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout ">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail() ): ?>
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
						     			
								     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
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
						     	</li>
							<?php endwhile;
						echo '</ul>';
					wp_reset_postdata();
				echo '</div>';
			}
	/*end category 2*/
		}
		elseif($double_category_layout=='double-grid-view'){
			/**
			* Category 1 
			*/
			if($select_category > 0){
				$selected_category = $select_category;

				
				echo '<div class="walkerwp-grid-6 double-category category-one featured-view style-grid">';
				if ( $title ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
				}
					
					/*featured post*/
					$args = array(
						'posts_per_page' => 1,
						'cat'			=>$selected_category,
						
					);
					$wp_query = new WP_Query( $args );
					while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="post-box featured-post">
							<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
									     <div class="post-thumbnail">
									     	<a href="<?php the_permalink()?>"> 
									     		<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?>
									     	</a>
									     	<div class="post-content">
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
									<?php endif; ?>
								
						</div>
					<?php 
					endwhile;
					wp_reset_postdata();
					/*end featured post*/
					?>

					<?php
					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page-1,
						'cat'			=>$selected_category,
						'offset' => 1
						
					);
					$wp_query = new WP_Query( $args );
					
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
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
						     		
								     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
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
						     	</li>
							<?php endwhile;
						echo '</ul>';
					wp_reset_postdata();
				echo '</div>';
			}
	/*end of category 1*/
	/*category 2 start*/
	if($select_category_two > 0){
				$selected_category = $select_category_two;

				echo '<div class="walkerwp-grid-6 double-category category-two featured-view style-grid">';
				if ( $title_two ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title_two'] ) .'</span></h5>';
				}
				/*featured post*/
					$args = array(
						'posts_per_page' => 1,
						'cat'			=>$selected_category,
						
					);
					$wp_query = new WP_Query( $args );
					while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<div class="post-box featured-post">
							<?php 
							     	if($post_thumbnail_status && has_post_thumbnail()): ?>
									     <div class="post-thumbnail">
									     	<a href="<?php the_permalink()?>"> 
									     		<?php if($post_thumbnail_status){
								     		walkerpress_article_estimate_reading_time();
								     		the_post_thumbnail();
								     	} 
								     	 ?>
									     	</a>
									     	<div class="post-content">
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
									<?php endif; ?>
								
						</div>
					<?php 
					endwhile;
					wp_reset_postdata();
					/*end featured post*/
				
					
					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page_two-1,
						'cat'			=>$selected_category,
						'offset' => 1
						
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout ">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail() ): ?>
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
						     			
								     	<h5 class="post-title"><a href="<?php the_permalink()?>"><?php the_title();?> </a></h5>
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
						     	</li>
							<?php endwhile;
						echo '</ul>';
					wp_reset_postdata();
				echo '</div>';
			}
	/*end category 2*/
		}else{
			/**
			* Category 1 
			*/
			if($select_category > 0){
				$selected_category = $select_category;

				$args = array(
					'posts_per_page' => 1,
					'cat'			=>$selected_category,
				);
				echo '<div class="walkerwp-grid-6 category-one">';
				if ( $title ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title'] ) .'</span></h5>';
				}
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box featured-post">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail() ): ?>
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
								     	<p><?php echo esc_html(walkerpress_excerpt('25'));?></p>
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

					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page-1,
						'cat'			=>$selected_category,
						'offset'		=> 1,
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
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
				echo '</div>';
			}
		
	/*end of category 1*/
	/**
			* Category 2
			*/
			if($select_category_two > 0){
				$selected_category = $select_category_two;

				$args = array(
					'posts_per_page' => 1,
					'cat'			=>$selected_category,
				);
				echo '<div class="walkerwp-grid-6 category-two">';
				if ( $title_two ) {
					echo '<h5 class="walkerpress-custom-header"> <span>'.  apply_filters( 'widget_title', $instance['title_two'] ) .'</span></h5>';
				}
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box featured-post">
							     	<?php 
							     	if($post_thumbnail_status && has_post_thumbnail() ): ?>
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
								     	<p><?php echo esc_html(walkerpress_excerpt('25'));?></p>
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

					/**
					*post list display
					*/
					$args = array(
						'posts_per_page' => $post_per_page_two-1,
						'cat'			=>$selected_category,
						'offset'		=> 1,
					);
					$wp_query = new WP_Query( $args );
						echo ' <ul class="categories-widget double-category featured-list-layout">';
							while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
						    	<li class="post-box">
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
				echo '</div>';
			}
			/*end of category 2*/
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
				'title_two'    => '',
				'select_category_two' =>'',
				'post_date_status' => true,
				'post_thumbnail_status' => true,
				'post_per_page' => 3,
				'post_per_page_two' => 3,
				'double_category_layout' => 'featured-layout-list',
			);
		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

			<?php // Widget Title ?>
			<div class="walkerpress-widget-form double-category-widget-form">
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'double_category_layout' ) ); ?>"><?php _e( 'Choose Layout', 'walkerpress' ); ?></label><br />
				<?php
				$double_cat_section_layouts = array('featured-layout-list'=>__('Featurd: List View','walkerpress'),'double-layout-list'=>__('List View','walkerpress'),  'double-featured-view'=>__('Featured View','walkerpress'), 'double-featured-view-two'=>__('Featured View: Style 2','walkerpress'),'double-featured-view-three'=>__('Featured View: Thumbnail','walkerpress'),'double-grid-view'=>__('Grid View','walkerpress') );
				?>
				<select name="<?php echo $this->get_field_name( 'double_category_layout' ); ?>" id="<?php echo $this->get_field_id( 'double_category_layout' ); ?>" >
					
					<?php 
					foreach($double_cat_section_layouts as $double_layout => $double_layout_label) {?>
					  <option value="<?php echo $double_layout;?>"  <?php selected( $double_category_layout,$double_layout ); ?> ><?php echo $double_layout_label;?></option>
					<?php }
					?>
				</select>
			</p>
			<p class="full category-header"><?php _e('Category 1','walkerpress');?></p>
			<p class="one-third one">
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Category Label', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>

			

			<?php // Widget Category ?>
			<p class="one-third two">
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
			<p class="one-third three" >
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_per_page' ) ); ?>"><?php _e( 'Post Per Page', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_per_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_per_page' ) ); ?>" type="number" value="<?php echo esc_attr( $post_per_page ); ?>" />
			</p>
			<p class="full category-header"><?php _e('Category 2','walkerpress');?></p>
			<p class="one-third four">
				<label for="<?php echo esc_attr( $this->get_field_id( 'title_two' ) ); ?>"><?php _e( 'Category Label', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_two' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_two' ) ); ?>" type="text" value="<?php echo esc_attr( $title_two ); ?>" />
			</p>
			<?php //post per page ?>
			
			<?php // Widget Category 2 ?>
			<p class="one-third five">
				<?php	
				$cat_args=array(
				  'post_type' => 'post',
				  'order' => 'ASC',
				  'hide_empty' => true,
				);
				$categories=get_categories($cat_args);
				if($categories){?>
					<label for="<?php echo esc_attr( $this->get_field_id( 'select_category_two' ) ); ?>"><?php _e( 'Select Categroy', 'walkerpress' ); ?></label>
					 <select name="<?php echo $this->get_field_name( 'select_category_two' ); ?>" id="<?php echo $this->get_field_id( 'select_category_two' ); ?>" >
					 	<option value="0"><?php _e('Select Category','walkerpress');?></option>
					 	 <?php foreach( $categories as $category ) : ?>
		                    <option value="<?php echo $category->slug; ?>"  <?php selected( $select_category_two,$category->slug ); ?> ><?php echo $category->name; ?></option>
		                <?php endforeach; ?>
					</select>
				<?php }?>
			</p>
			<p class="one-third six" >
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_per_page_two' ) ); ?>"><?php _e( 'Post Per Page', 'walkerpress' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_per_page_two' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_per_page_two' ) ); ?>" type="number" value="<?php echo esc_attr( $post_per_page_two ); ?>" />
			</p>
			

			<?php // Thumbnail Checkbox ?>
			<p class="full">
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
				$instance['title_two']    = isset( $new_instance['title_two'] ) ? wp_strip_all_tags( $new_instance['title_two'] ) : '';
				$instance['select_category_two']    = isset( $new_instance['select_category_two'] ) ? wp_strip_all_tags( $new_instance['select_category_two'] ) : '';
				$instance['post_thumbnail_status'] = isset( $new_instance['post_thumbnail_status'] ) ? (bool) $new_instance['post_thumbnail_status'] : false;
				$instance['post_per_page']    = isset( $new_instance['post_per_page'] ) ? wp_strip_all_tags( $new_instance['post_per_page'] ) : '3';
				$instance['post_per_page_two']    = isset( $new_instance['post_per_page_two'] ) ? wp_strip_all_tags( $new_instance['post_per_page_two'] ) : '3';
				$instance['double_category_layout']    = isset( $new_instance['double_category_layout'] ) ? wp_strip_all_tags( $new_instance['double_category_layout'] ) : '';
				return $instance;
			}
		}
	function walkerpress_register_double_category_post_widget() {
			register_widget( 'WalkerPress_Double_Category_Post' );
	}
	add_action( 'widgets_init', 'walkerpress_register_double_category_post_widget' );