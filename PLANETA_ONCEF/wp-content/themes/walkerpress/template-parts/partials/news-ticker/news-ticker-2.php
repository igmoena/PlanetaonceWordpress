<?php
$walkerpress_focus_news_status = esc_attr(get_theme_mod('focus_news_status'));
if($walkerpress_focus_news_status){?>
	<div class="walkerwp-wraper ticker-news-wraper ticker-layout-2 no-gap">
		<div class="walkerwp-container">
			
			<div class="news-ticker-box walkerwp-grid-12">
		    	<div class="swiper-container walkerpress-ticker-news">
					<div class="swiper-wrapper">
						<?php
						$focus_post_type = get_theme_mod('focus_news_post_type');
						if(get_theme_mod('focus_news_items_show')){
							$focus_news_total= get_theme_mod('focus_news_items_show');
						}else{
							$focus_news_total =8;
						}
						$sticky = get_option( 'sticky_posts' );
						$focus_post_cat = get_theme_mod('walkerpress_focus_news_category');
						if($focus_post_type =='latest-post'){
							$focus_args = array(
						    	'post_type' => 'post',
						    	'order'=> 'DESC',
						    	'posts_per_page' => $focus_news_total,
						    	'ignore_sticky_posts' => 1,
						    	'post__not_in' => $sticky
							);
						}else{
							$focus_args = array(
						    	'post_type' => 'post',
						    	'order'=> 'DESC',
						    	'posts_per_page' => $focus_news_total,
						    	'ignore_sticky_posts' => 1,
						    	'post__not_in' => $sticky,
						    	'category_name' => $focus_post_cat,
							);
						}
						$walkerpress_focus_query = new WP_Query($focus_args);
							while ($walkerpress_focus_query->have_posts()) : $walkerpress_focus_query->the_post();?>
							    <div class="swiper-slide">
							    	<span class="focus-news-box">
							    	<?php
											if(has_post_thumbnail()){
                                				$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                        					?>
	                        					<span class="focus-thumb">
							                       <img width="115" height="115" src="<?php echo esc_url($image_url[0]); ?>"
							                            class="attachment-full size-full wp-post-image" alt="" loading="lazy">
							                    </span>
						                    <?php } ?>
										<div class="ticker-content">
											<h6>
												<a href="<?php echo the_permalink();?>" class="post-title"><?php  the_title(); ?></a></h6>
											<?php walkerpress_custom_post_date();?>
										</div>
									</span>
								</div>
							<?php endwhile; 
						wp_reset_postdata(); ?>	
					</div>
				</div>
			</div>
			<div class="ticker-arrows">
				<div class="ticker-news-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
			    <div class="ticker-news-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
			</div>
		</div>
	</div>
	<?php } ?>