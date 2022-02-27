<?php 
		$sticky_menu_class='';
		if(get_theme_mod('enable_stikcy_header')){
			$sticky_menu_class='sticky-menu';
		}?>
<header id="masthead" class="site-header header-layout-4">
	<div class="walkerwp-wraper navigation no-gap <?php echo esc_attr($sticky_menu_class);?>">
		<div class="walkerwp-container">
			<div class="left-part">
				<div class="branding">
					<?php walkerpress_branding();?>
				</div>
				<div class="main-menu">
					<?php walkerpress_navigation();?>
				</div>
			</div>
			<div class="header-icons"> 
			 	<?php walkerpress_header_social_media(); walkerpress_header_global_search(); ?>
			 </div>
		</div>
	</div>
</header><!-- #masthead -->