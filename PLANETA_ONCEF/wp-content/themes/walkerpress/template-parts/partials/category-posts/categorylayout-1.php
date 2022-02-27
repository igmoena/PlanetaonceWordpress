<div class="walkerwp-wraper category-post-wraper">
	<div class="walkerwp-container">
		<div class="walkerwp-grid-8 category-post-box">
			<?php
			$category_post_cat_one = get_theme_mod('walkerpress_category_post_category_1');
			?>
			<h3 class="box-title"><span><?php echo esc_html($category_post_cat_one);?></span></h3>
			<div class="walkerwp-grid-7 category-post-1">
				<?php
				$sticky = get_option( 'sticky_posts' );
				$focus_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 1,
			    	'ignore_sticky_posts' => 1,
			    	'post__not_in' => $sticky,
			    	'category_name' => $category_post_cat_one,
				);
				$walkerpress_focus_query = new WP_Query($focus_args);
					while ($walkerpress_focus_query->have_posts()) : $walkerpress_focus_query->the_post();?>
					    <div class="category-post-item">
					    	<div class="post-thumbnail">
					    		<a href="<?php echo the_permalink();?>"><?php
								if ( has_post_thumbnail() ) {
									echo walkerpress_article_estimate_reading_time();
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
							<h4><a href="<?php echo the_permalink();?>"><?php  the_title(); ?></a></h4>
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
							<?php echo'<div class="walkerpress-excerpt">'. esc_html(walkerpress_excerpt('20')).'</div>';?>
							<a href="<?php echo the_permalink();?>" class="walkerpress-primary-button"> 
							<?php if(get_theme_mod('walkerpress_excerpt_more')){
									echo esc_html(get_theme_mod('walkerpress_excerpt_more'));
								}else{
									echo __('Read More','walkerpress');
								}?>
							</a>
						</div>
					<?php endwhile; 
				wp_reset_postdata(); ?>
			</div>
			<div class="walkerwp-grid-5 category-post-grid">
				<?php
				$sticky = get_option( 'sticky_posts' );
				$focus_args = array(
			    	'post_type' => 'post',
			    	'order'=> 'DESC',
			    	'posts_per_page' => 5,
			    	'ignore_sticky_posts' => 1,
			    	'post__not_in' => $sticky,
			    	'category_name' => $category_post_cat_one,
			    	'offset' => 1,
				);
				$walkerpress_focus_query = new WP_Query($focus_args);
					while ($walkerpress_focus_query->have_posts()) : $walkerpress_focus_query->the_post();?>
					    <div class="category-post-item">
					    	<div class="post-thumbnail">
					    		<a href="<?php echo the_permalink();?>"><?php
								if ( has_post_thumbnail() ) {
								    the_post_thumbnail();
								}?>
							</a>
							
							</div>
							<span class="post-content">
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
							</span>
						</div>
					<?php endwhile; 
				wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="walkerwp-grid-4 category-post-2">
			<div class="category-post-content">
				<h3 class="box-title"><span><?php 
				$category_post_cat_two = get_theme_mod('walkerpress_category_post_category_2');
				echo esc_html($category_post_cat_two);
				?></span></h3>
					<?php
					$sticky = get_option( 'sticky_posts' );
					$focus_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' => 1,
				    	'ignore_sticky_posts' => 1,
				    	'post__not_in' => $sticky,
				    	'category_name' => $category_post_cat_two,
					);
					$walkerpress_focus_query = new WP_Query($focus_args);
					while ($walkerpress_focus_query->have_posts()) : $walkerpress_focus_query->the_post();?>
					    <div class="category-post-item">
					    	<div class="post-thumbnail">
					    		<a href="<?php echo the_permalink();?>"><?php
								if ( has_post_thumbnail() ) {
									walkerpress_article_estimate_reading_time();
								    the_post_thumbnail();
								}?>
							</a>
							
							</div>
							
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
					<?php endwhile; 
				wp_reset_postdata(); ?>
				<?php
					$sticky = get_option( 'sticky_posts' );
					$focus_args = array(
				    	'post_type' => 'post',
				    	'order'=> 'DESC',
				    	'posts_per_page' => 2,
				    	'ignore_sticky_posts' => 1,
				    	'post__not_in' => $sticky,
				    	'category_name' => $category_post_cat_two,
				    	'offset' => 1,
					);
					$walkerpress_focus_query = new WP_Query($focus_args);
					while ($walkerpress_focus_query->have_posts()) : $walkerpress_focus_query->the_post();?>
					    <div class="category-post-item list-item">
					    	<div class="post-thumbnail">
					    		<a href="<?php echo the_permalink();?>"><?php
								if ( has_post_thumbnail() ) {
								    the_post_thumbnail();
								}?>
							</a>
							
							</div>
							<span class="post-content">
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
							</span>
						</div>
					<?php endwhile; 
				wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
	<?php 
	if(walkerpress_set_to_premium()){
		walkerpress_feature_category_section_ads();
	}
	?>
</div>
