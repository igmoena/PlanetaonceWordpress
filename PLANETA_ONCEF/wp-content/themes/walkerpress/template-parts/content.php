<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WalkerPress
 */
$current_post_view = get_theme_mod('walkerpress_blog_post_view','post-layout-list');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) {?>
		<div class="walkerpress-post-thumbnails">
			<?php 
			walkerpress_archive_estimate_reading_time();
			walkerpress_post_thumbnail();
			 ?>
		</div>
	<?php } ?>
		<?php if ( has_post_thumbnail() ) {
			$inner_content_class= 'has-thumbnails';
		}else{
			$inner_content_class= 'has-no-thumbnails';
		}


	 ?>
	<div class="article-inner <?php echo $inner_content_class;?>">
		<header class="entry-header">
			<?php  
			if($current_post_view!='post-layout-full'){
				if(walkerpress_set_to_premium()){
					if(get_theme_mod('category_status','true')){
						walkerpress_custom_category();
					}
				}else{
					walkerpress_custom_category();
				}
			}

			if($current_post_view=='post-layout-full'){
				if(walkerpress_set_to_premium()){
					if(get_theme_mod('category_status','true')){
						walkerpress_custom_category();
					}
				}else{
					walkerpress_custom_category();
				}
			}
			if(walkerpress_set_to_premium()){
				if ( ! has_post_thumbnail() ) {
					if(get_theme_mod('estimate_reading_time_status','true')){
						echo '<span class="estimate-time">-'. walkerpress_estimate_reading_time().'</span>';
					}
				}
			}else{
				if ( ! has_post_thumbnail() ) {
					echo '<span class="estimate-time">-'. walkerpress_estimate_reading_time().'</span>';
				}
			}?>
			<?php if($current_post_view=='post-layout-full') :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;

			if ( 'post' === get_post_type() ) :
				walkerpress_meta_data();
		    endif;?>
			
		
		</header><!-- .entry-header -->
	<div class="entry-content">
		<?php echo'<div class="walkerpress-excerpt">'. esc_html(walkerpress_excerpt('35')).'</div>';
		

					?>
					<a href="<?php echo the_permalink();?>" class="walkerpress-primary-button"> 
					<?php if(get_theme_mod('walkerpress_excerpt_more')){
							echo esc_html(get_theme_mod('walkerpress_excerpt_more'));
						}else{
							echo __('Read More','walkerpress');
						}?>
					</a>
			
		
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->