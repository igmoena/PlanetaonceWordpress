<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WalkerPress
 */

walkerpress_before_footer();
$walkerpress_footer_layout = get_theme_mod('walkerpress_footer_layout','footer-layout-one');
if($walkerpress_footer_layout == 'footer-layout-two'){
	$walkerpress_footer_layout_class= 'layout-two';
	$current_footer_layout = 'footer-layout-2';
}elseif($walkerpress_footer_layout == 'footer-layout-three'){
	$walkerpress_footer_layout_class= 'layout-three';
	$current_footer_layout = 'footer-layout-3';
}else{
	$walkerpress_footer_layout_class= 'layout-one';
	$current_footer_layout = 'footer-layout-1';
}
?>
	<footer id="colophon" class="site-footer <?php echo esc_attr($walkerpress_footer_layout_class);?>">
		<?php 
		
             $footer_background_img = get_theme_mod('footer_bg_image');
			if($footer_background_img){ ?>
				<img class="footer-overlay-image" src="<?php echo esc_url($footer_background_img);?>" />
		<?php } 
		
			get_template_part( 'template-parts/partials/footer/'.$current_footer_layout);?>
			<?php walkerpress_footer_copyright();
			
		 ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php 
walkerpress_scroll_top();
wp_footer(); 
?>

</body>
</html>
