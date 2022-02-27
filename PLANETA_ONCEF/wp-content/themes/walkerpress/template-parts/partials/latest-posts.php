<div class="latest-post">
	<?php
	$sticky = get_option( 'sticky_posts' );
		$walkerpress_query = new WP_Query( array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => 4, 
			'ignore_sticky_posts' => 1,'post__not_in' => $sticky) );
			    while ($walkerpress_query->have_posts()) : $walkerpress_query->the_post();?>
			    <div class="post-box">
			    	<div class="walkerpress-recentpost-box">
				  	<?php 
				    	if ( has_post_thumbnail() ) {?>
							<a href="<?php the_permalink();?>" class="walkerpress-post-thumbnails"><?php the_post_thumbnail();?></a>
						<?php } ?>
						<?php if(!has_post_thumbnail()){
							$content_part_class="without-thumbnail";
						} else{
							$content_part_class="with-thumbnail";
						}?>
						<div class="content-part <?php echo esc_attr($content_part_class);?>">
							<h6><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h6>	
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
				</div>
		<?php endwhile; 
	wp_reset_postdata(); ?>
</div>