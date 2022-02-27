<div class="walkerwp-wraper featured-post-wraper featured-post-layout-1">
	<div class="walkerwp-container">
		<div class="walkerwp-grid-12 featured-post-box">
			<?php
			if(get_theme_mod('featured_post_heading')){
				$featured_section_title = get_theme_mod('featured_post_heading');
			}else{
				$featured_section_title = __('Featured Posts', 'walkerpress');
			}
			?>
			<h3 class="box-title"><span><?php echo esc_html($featured_section_title);?></span></h3>
			<div class="featured-post-grid">
				<?php
				$sticky = get_option( 'sticky_posts' );
				$featured_post_cat = get_theme_mod('walkerpress_featured_post_category');
				$focus_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 4,
			    	'ignore_sticky_posts' => 1,
			    	'post__not_in' => $sticky,
			    	'category_name' => $featured_post_cat,
				);
				$walkerpress_focus_query = new WP_Query($focus_args);
					while ($walkerpress_focus_query->have_posts()) : $walkerpress_focus_query->the_post();?>
					    <div class="featured-post-item">
					    	<div class="post-thumbnail">
					    		<a href="<?php echo the_permalink();?>"><?php
								if ( has_post_thumbnail() ) {
									walkerpress_article_estimate_reading_time();
								    the_post_thumbnail();
								}?>
							</a>
							
							</div>
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
					<?php endwhile; 
				wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	<?php 
	if(walkerpress_set_to_premium()){
		walkerpress_feature_post_section_ads();
	}?>
</div>
