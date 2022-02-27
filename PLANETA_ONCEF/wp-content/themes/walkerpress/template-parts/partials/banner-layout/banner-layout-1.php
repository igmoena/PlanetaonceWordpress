<div class="walkerwp-wraper banner-layout banner-layout-1">
	<div class="walkerwp-container">
		<div class="walkerwp-grid-3 grid-posts">
			<?php
				$featured_grid_cat = get_theme_mod('walkerpress_featured_grid_category');
				if(!empty($featured_grid_cat)){
					$featured_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' => 2,
				    	'category_name' => $featured_grid_cat,
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
					   <div class="walkerwp-grid-12">
					    	<div class="walkerpress-featured-box">
						  	<?php 
						    	if ( has_post_thumbnail() ) {?>
									<a href="<?php the_permalink();?>" class="focus-news-thumbnails"><?php 
									walkerpress_article_estimate_reading_time();
									the_post_thumbnail();
									?></a>
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
									<h4><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h4>	
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
					<?php endwhile; 
				wp_reset_postdata();?>

		</div>
		<div class="walkerwp-grid-6 walkerpress-slider slider-1">
			<div class="banner-slider-1">

<div class="swiper-container walkerpress-featured-slider-one">
					<div class="swiper-wrapper">
						<?php
							$featured_slide_cat = get_theme_mod('walkerpress_featured_slide_category');
							if(get_theme_mod('featured_slide_items_show')){
								$featured_image_slides= get_theme_mod('featured_slide_items_show');
							}else{
								$featured_image_slides =3;
							}
							if(!empty($featured_slide_cat)){
								$featured_args = array(
							    	'post_type' => 'post',
							    	'order'=> 'DESC',
							    	'posts_per_page' => $featured_image_slides,
							    	'category_name' => $featured_slide_cat,
								);
							}else{
								$featured_args = array(
							    	'post_type' => 'post',
							    	'order'=> 'DESC',
							    	'posts_per_page' => $featured_image_slides,
								);
							}
							$walkerpress_featured_query = new WP_Query($featured_args);
								while ($walkerpress_featured_query->have_posts()) : $walkerpress_featured_query->the_post();?>
								    <div class="swiper-slide">
								    	<div class="walkerpress-slide-box">
									  	<?php 
									    	if ( has_post_thumbnail() ) {?>
												<a href="<?php the_permalink();?>" class="slide-image">
											<?php 
												walkerpress_article_estimate_reading_time();
												the_post_thumbnail();
												?></a>
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
									</div>
								<?php endwhile; 
						wp_reset_postdata();?>
					</div>
				</div>
				<div class="bannerslider-arrows">
					<div class="walkerpress-slide-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				    <div class="walkerpress-slide-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
				</div>
			</div>



			</div>
		<div class="walkerwp-grid-3 tabs-section">
			<ul class="tabs">
		<li class="tab-link active" data-tab="tab-1">
			<?php
			if(get_theme_mod('latest_post_heading')){
				$latest_section_title = get_theme_mod('latest_post_heading');
			}else{
				$latest_section_title = __('Latest Posts', 'walkerpress');
			}
			?>
			<h6><?php echo esc_html($latest_section_title);?></h6>
		</li>
		<li class="tab-link" data-tab="tab-2"><?php
			if(get_theme_mod('popular_post_heading')){
				$popular_section_title = get_theme_mod('popular_post_heading');
			}else{
				$popular_section_title = __('Popular Posts', 'walkerpress');
			}
			?>
			<h6><?php echo esc_html($popular_section_title);?></h6>
		</li>
		
	</ul>

	<div id="tab-1" class="tab-content active">
		<?php walkerpress_latest_posts();?>
	</div>
	<div id="tab-2" class="tab-content">
		 <?php walkerpress_popular_posts();?>
	</div>
	
		
		</div>
	</div>
</div>