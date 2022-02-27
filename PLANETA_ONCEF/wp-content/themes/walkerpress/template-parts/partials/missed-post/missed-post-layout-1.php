<div class="walkerwp-wraper missed-post-wraper missed-post-layout-1">
	<div class="walkerwp-container">
		<div class="walkerwp-grid-12 missed-post-box">
			<?php
			if(get_theme_mod('missing_post_heading')){
				$missed_section_title = get_theme_mod('missing_post_heading');
			}else{
				$missed_section_title = __('You May Have Missed!', 'walkerpress');
			}
			?>
			<h3 class="box-title"><span><?php echo esc_html($missed_section_title);?></span></h3>
			<div class="featured-post-grid">
				<?php
				$sticky = get_option( 'sticky_posts' );
				$featured_post_cat = get_theme_mod('walkerpress_missed_post_category');
				$focus_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 4,
			    	'ignore_sticky_posts' => 1,
			    	'post__not_in' => $sticky,
			    	'category_name' => $featured_post_cat,
				);
				$walkerpress_missed_query = new WP_Query($focus_args);
					while ($walkerpress_missed_query->have_posts()) : $walkerpress_missed_query->the_post();?>
					    <div class="featured-post-item">
					    	<?php 
					    		if (! has_post_thumbnail() ) {
					    			 walkerpress_article_estimate_reading_time();
					    	}
					    	?>
					    	<div class="post-thumbnail">
					    		<a href="<?php echo the_permalink();?>"><?php
								if ( has_post_thumbnail() ) {
									walkerpress_article_estimate_reading_time();
								    the_post_thumbnail();
								}?>
							</a>
							
							</div>
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
								<h5><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h5>
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
					<?php endwhile; 
				wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
