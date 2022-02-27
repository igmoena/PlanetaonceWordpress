<?php
	$banner_layout_style= get_theme_mod('featured_grid_layout_type','featured-section-layout-box');
	if($banner_layout_style =='featured-section-layout-full'){
		$banner_layout = 'full-layout-banner';
	}else{
		$banner_layout = 'box-layout-banner';
	}
?>
<div class="walkerwp-wraper banner-layout banner-layout-9 <?php echo esc_attr($banner_layout);?>">
	<div class="walkerwp-container">
		<?php
			$featured_slide_cat = get_theme_mod('walkerpress_featured_slide_category');
			if(!empty($featured_slide_cat)){
				$featured_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 1,
			    	'category_name' => $featured_slide_cat,
				);
			}else{
				$featured_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 1,
				);
			}
			$walkerpress_featured_query = new WP_Query($featured_args);
				while ($walkerpress_featured_query->have_posts()) : $walkerpress_featured_query->the_post();?>
				   <div class="walkerpress-slide-box walkerwp-grid-6">
					  	<?php 
					    	if ( has_post_thumbnail() ) {?>
								<a href="<?php the_permalink();?>" class="slide-image">
									<?php 
										walkerpress_article_estimate_reading_time();
										the_post_thumbnail();
										?>
								</a>
							<?php } ?>
							<?php if(!has_post_thumbnail()){
								$content_part_class="without-thumbnail";
							} else{
								$content_part_class="with-thumbnail";
							}?>
							<div class="content-part <?php echo esc_attr($content_part_class);?>">
								<?php 
									if(walkerpress_set_to_premium()){
										if(get_theme_mod('home_post_cat_status','true')){
											walkerpress_custom_category();
										}
									}else{
										walkerpress_custom_category();
									}
									?>
								<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
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
		wp_reset_postdata();?>

		<?php
			if(!empty($featured_slide_cat)){
				$featured_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 2,
			    	'category_name' => $featured_slide_cat,
				);
			}else{
				$featured_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 2,
				);
			}
			$walkerpress_featured_query = new WP_Query($featured_args);
				while ($walkerpress_featured_query->have_posts()) : $walkerpress_featured_query->the_post();?>
				   <div class="walkerpress-slide-box walkerwp-grid-3">
					  	<?php 
					    	if ( has_post_thumbnail() ) {?>
								<a href="<?php the_permalink();?>" class="slide-image">
									<?php 
										walkerpress_article_estimate_reading_time();
										the_post_thumbnail();
										?>
								</a>
							<?php } ?>
							<?php if(!has_post_thumbnail()){
								$content_part_class="without-thumbnail";
							} else{
								$content_part_class="with-thumbnail";
							}?>
							<div class="content-part <?php echo esc_attr($content_part_class);?>">
								<?php 
									if(walkerpress_set_to_premium()){
										if(get_theme_mod('home_post_cat_status','true')){
											walkerpress_custom_category();
										}
									}else{
										walkerpress_custom_category();
									}
									?>
								<h3><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h3>	
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
		wp_reset_postdata();?>
	</div>
</div>