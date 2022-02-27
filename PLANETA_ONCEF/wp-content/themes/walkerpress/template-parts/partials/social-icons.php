<?php
/**
 * Social media icons for WalkerPress
 *
 * @package WalkerPress
 * @since version 1.0.0
 */

$walkerpress_social_icons_color = get_theme_mod('walkerpress_social_icon_color');
$walkerpress_social_icons_style = get_theme_mod('walkerpress_social_icon_style');
$icons_color_class = 'icons-default-color';
if($walkerpress_social_icons_color=='walkerpress-social-custom-color'){
	$icons_color_class = 'icons-custom-color';
}
$social_icons_layout = 'boxed-style';
if($walkerpress_social_icons_style=='walkerpress-social-style-normal'){
	$social_icons_layout = 'normal-style';
}
?>
<ul class="walkerpress-social <?php echo esc_attr($icons_color_class);?> <?php echo esc_attr($social_icons_layout);?>">
	<?php if(get_theme_mod('walkerpress_facebook')){?>
		<li>
			<a class="facebook" href="<?php echo esc_url(get_theme_mod('walkerpress_facebook'));?>" target="_blank">
				<i class="fab fa-facebook-f"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_twitter')){?>
		<li>
			<a class="twitter" href="<?php echo esc_url(get_theme_mod('walkerpress_twitter'));?>" target="_blank">
				<i class="fab fa-twitter"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_youtube')){?>
		<li>
			<a class="youtube" href="<?php echo esc_url(get_theme_mod('walkerpress_youtube'));?>" target="_blank">
				<i class="fab fa-youtube"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_instagram')){?>
		<li>
			<a class="instagram" href="<?php echo esc_url(get_theme_mod('walkerpress_instagram'));?>" target="_blank">
				<i class="fab fa-instagram"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_linkedin')){?>
		<li>
			<a class="linkedin" href="<?php echo esc_url(get_theme_mod('walkerpress_linkedin'));?>" target="_blank">
				<i class="fab fa-linkedin-in"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_google')){?>
		<li>
			<a class="google" href="<?php echo esc_url(get_theme_mod('walkerpress_google'));?>" target="_blank">
				<i class="fab fa-google"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_pinterest')){?>
		<li>
			<a class="pinterest" href="<?php echo esc_url(get_theme_mod('walkerpress_pinterest'));?>" target="_blank">
				<i class="fab fa-pinterest-p"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_vk')){?>
		<li>
			<a class="vk" href="<?php echo esc_url(get_theme_mod('walkerpress_vk'));?>" target="_blank">
				<i class="fab fa-vk"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_yelp')){?>
		<li>
			<a class="yelp" href="<?php echo esc_url(get_theme_mod('walkerpress_yelp'));?>" target="_blank">
				<i class="fab fa-yelp"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_git')){?>
		<li>
			<a class="github" href="<?php echo esc_url(get_theme_mod('walkerpress_git'));?>" target="_blank">
				<i class="fab fa-github-alt"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_dribbble')){?>
		<li>
			<a class="dribbble" href="<?php echo esc_url(get_theme_mod('walkerpress_dribbble'));?>" target="_blank">
				<i class="fab fa-dribbble"></i>
			</a>
		</li>
	<?php }
	if(get_theme_mod('walkerpress_reddit')){?>
		<li>
			<a class="reddit" href="<?php echo esc_url(get_theme_mod('walkerpress_reddit'));?>" target="_blank">
				<i class="fab fa-reddit-alien"></i>
			</a>
		</li>
	<?php } ?>
</ul>