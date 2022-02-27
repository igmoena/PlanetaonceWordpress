<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WalkerPress
 */

get_header();
$current_post_view = get_theme_mod('walkerpress_blog_post_view','post-layout-grid');
$current_sidebar_layout = get_theme_mod('walkerpress_blog_layout','sidebar-layout-right');
if($current_post_view=='post-layout-full'){
	$content_class= 'full-layout';
}elseif($current_post_view=='post-layout-list'){
	$content_class= 'list-layout';
}else{
	$content_class= 'grid-layout';
}

if($current_sidebar_layout=='sidebar-layout-none'){
	$current_content_class='walkerwp-grid-12';
	$current_content_sub_class ='full-width';
}elseif($current_sidebar_layout=='sidebar-layout-left'){
	$current_content_class='walkerwp-grid-9';
	$current_content_sub_class='left-sidebar';
}else{
	$current_content_class='walkerwp-grid-9';
	$current_content_sub_class='right-sidebar';
}

?>
<div class="walkerwp-wraper inner-wraper">
	<div class="walkerwp-container">
	<?php
		if($current_sidebar_layout=='sidebar-layout-left'){?>
			<div class="walkerwp-grid-3 sidebar-block">
		<?php get_sidebar();?>
	</div>
		<?php }
	?>
		<main id="primary" class="site-main <?php echo esc_attr($current_content_class).' '. esc_attr($current_content_sub_class);?>">
			<div class="content-layout <?php echo esc_attr($content_class);?>">
				<?php if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
			echo '</div>';
			$wlakerpress_paginate_style = get_theme_mod('walkerpress_pagination_style','walkerpress-default-style');
			if($wlakerpress_paginate_style =='walkerpress-numeric-style'){
				walkerpress_pagination();
			}else{
				the_posts_navigation();
			}

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
	</main><!-- #main -->

	<?php
		if($current_sidebar_layout=='sidebar-layout-right'){?>
			<div class="walkerwp-grid-3 sidebar-block">
		<?php get_sidebar();?>
	</div>
		<?php }
	?>
	</div>
</div>
<?php get_footer();