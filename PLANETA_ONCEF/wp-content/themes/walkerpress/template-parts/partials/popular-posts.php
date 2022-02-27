<div class="popular-posts">
			
			<?php

			$popular_posts_args = array(
			   // 'posts_per_page' => $post_per_page,
			   'meta_key' => 'walker_post_viewed',
			   'orderby' => 'meta_value_num',
			   'order'=> 'DESC',
			   'posts_per_page' => 4
			);
			 
			$popular_posts_loop = new WP_Query( $popular_posts_args );
			 
			while( $popular_posts_loop->have_posts() ):
			   $popular_posts_loop->the_post(); ?>
			   <div class="popular-post-list">
				    <?php if(has_post_thumbnail()){ 
				    	$content_class='with-thumbnail';?>
					     <div class="walkerpress-post-thumbnails">
					     	<a href="<?php the_permalink()?>">
					     	 <?php  the_post_thumbnail(); ?>
					     	 	
					     	 </a>
					     </div>
				    
				   <?php } else{
				   		$content_class='without-thumbnail';
				   }?>
				    <div class="content-part <?php echo esc_attr($content_class);?>">
					   	<h6>
					   		<a href="<?php the_permalink();?>"><?php the_title();?> </a>
					 	</h6>
					 <span class="post-date">
						<?php 
						if(walkerpress_set_to_premium()){
							if(get_theme_mod('home_post_date_status','true')){
								walkerpress_custom_post_date();
							}
						}else{
							walkerpress_custom_post_date();	
						}
						
						?>
					</span>
					</div>
				</div>
			<?php endwhile;
			wp_reset_query();
			?>
		</div>