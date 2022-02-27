<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WalkerPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php if ( has_post_thumbnail() ) {
			$inner_content_class= 'has-thumbnails';
		}else{
			$inner_content_class= 'has-no-thumbnails';
		}

	 ?>
	<div class="article-inner <?php echo $inner_content_class;?>">
		<header class="entry-header">

			<?php
			if(get_theme_mod('single_content_title_status','true')){
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
			
			 if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					if(walkerpress_set_to_premium()){
						if(get_theme_mod('single_author_status','true')){
							walkerpress_custom_post_author();
						}
						if(get_theme_mod('single_post_date_status','true')){
							walkerpress_custom_post_date();
						}
						if(get_theme_mod('single_category_status','true')){
							 walkerpress_singlepage_category();
						}
						if(get_theme_mod('single_tags_status','true')){
							walkerpress_custom_post_tag();
						}
						
					}else{
						walkerpress_custom_post_author();
						walkerpress_custom_post_date();
						walkerpress_singlepage_category();
						walkerpress_custom_post_tag();
						
					}
					walkerpress_single_post_estimate_reading_time();
					?>

					
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php
		if(get_theme_mod('single_featured_image_status','true') && has_post_thumbnail() ){?>
			<div class="walkerpress-post-thumbnails">
				<?php walkerpress_post_thumbnail(); ?>
		</div>
		<?php }
		?>
	

	<div class="entry-content">
		<?php
		
			the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'walkerpress' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'walkerpress' ),
				'after'  => '</div>',
			)
		);

		
		?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php
	if(walkerpress_set_to_premium()){
		if(get_theme_mod('single_postnav_status','true')){
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'walkerpress' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'walkerpress' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
		}
	}else{
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'walkerpress' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'walkerpress' ) . '</span> <span class="nav-title">%title</span>',
			)
		);
	}

    if(get_theme_mod('related_post_status','true')){?>
		<div class="related-posts">
			<h3 class="related-post-heading box-title">
				<span>
					<?php 
					if(get_theme_mod('walkerpress_related_postheading')){
						$related_post_heading = get_theme_mod('walkerpress_related_postheading');
					}else{
						$related_post_heading = __('Related Posts','walkerpress');
					}
						echo esc_html($related_post_heading);
						?>
				</span>
			</h3>
		
		
		<div class="related-post-list">
			<?php $current_post_ic = get_the_ID();
		    $cat_ids = array();
		    $categories = get_the_category( $current_post_ic );

		    if(!empty($categories) && !is_wp_error($categories)):
		        foreach ($categories as $category):
		            array_push($cat_ids, $category->term_id);
		        endforeach;
		    endif;

		    $current_post_type = get_post_type($current_post_ic);

		    $query_args = array( 
		        'category__in'   => $cat_ids,
		        'post_type'      => $current_post_type,
		        'post__not_in'    => array($current_post_ic),
		        'posts_per_page'  => '3',
		     );

		    $related_cats_post = new WP_Query( $query_args );

		    if($related_cats_post->have_posts()):
		         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
		           <div class="related-posts-box">
		           		<a href="<?php the_permalink(); ?>" class="related-post-feature-image">
		           			<?php walkerpress_post_thumbnail(); ?>
		           		</a>
		           		<div class="related-post-content">
		                    <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>
		                    <div class="meta-data">
		                    	<?php walkerpress_custom_post_date(); ?>
		                    </div>
		                </div>
		              </div>
		        <?php endwhile;

		        // Restore original Post Data
		        wp_reset_postdata();
		     endif;
		     ?>
		</div>
	 </div>
	<?php } ?>
	<?php if(get_theme_mod('single_author_box_status','true')){?>
		<div class="wc-author-box">
            <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), 215 ); ?>
            <?php if( $avatar ) : ?>
            <div class="author-img">
               <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                   <?php echo $avatar; ?>
                </a>
            </div>
            <?php endif; ?>
            <div class="author-details">
                <h4><?php echo esc_html( get_the_author() ); ?> </h4>
                <p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
                <a class="author-more" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo __('Learn More','walkerpress');?> &#8594; </a>
            </div>
        </div>
    <?php }