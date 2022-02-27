<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WalkerPress
 */

get_header();
$single_post_sidebar_layout = get_theme_mod('walkerpress_single_blog_layout','single-sidebar-layout-right');
if($single_post_sidebar_layout == 'single-sidebar-layout-none'){
	$main_content_class='walkerwp-grid-12';
	$main_content_sub_class= 'full-width-layout';
}elseif($single_post_sidebar_layout=='single-sidebar-layout-left'){
	$main_content_class='walkerwp-grid-9';
	$main_content_sub_class= 'left-sidebar-layout';
}else{
	$main_content_class='walkerwp-grid-9';
	$main_content_sub_class= 'right-sidebar-layout';
}

?>

<div class="walkerwp-wraper inner-wraper">
	<?php walkerpress_single_post_before();?>
	<div class="walkerwp-container">
		<?php if($single_post_sidebar_layout=='single-sidebar-layout-left'){?>
			<div class="walkerwp-grid-3 sidebar-block left-sidebar-layout">
				<?php get_sidebar();?>
			</div>
		<?php } ?>
		<main id="primary" class="site-main <?php echo esc_attr($main_content_class);?> <?php echo esc_attr($main_content_sub_class);?>">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
		</main><!-- #main -->
		<?php if($single_post_sidebar_layout=='single-sidebar-layout-right'){?>
			<div class="walkerwp-grid-3 sidebar-block right-sidebar-layout">
				<?php get_sidebar();?>
			</div>
		<?php } ?>
	</div>
	<?php walkerpress_single_post_after();?>
</div>
<?php get_footer();

