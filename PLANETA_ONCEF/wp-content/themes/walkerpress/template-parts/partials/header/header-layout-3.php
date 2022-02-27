<header id="masthead" class="site-header header-layout-3">
	<div class="walkerwp-wraper main-header no-gap">
		<?php
			$header_current_ads_postion = get_theme_mod('walkerpress_heaer_ads_postion','header-ads-below-brand');
		 	
		 	if( !empty(get_theme_mod('header_background_image') ) ){
				$header_background_img = get_theme_mod('header_background_image');
			}else{
				$header_background_img = "";
				if( has_header_image() ) {
					$header_background_img = get_header_image();
				}
			}
			if($header_background_img){ ?>
				<img class="header-overlay-image" src="<?php echo esc_url($header_background_img);?>" />
			<?php } ?>
		<?php
				if($header_current_ads_postion == 'header-ads-above-brand'){?>
					<div class="walkerwp-container header-ads-container">
						<?php	walkerpress_header_ads_section(); ?>
					</div>
				<?php }
			?>
		<div class="walkerwp-container">
			<div class="walkerwp-grid-4">
				<?php walkerpress_header_current_date(); ?>
			</div>
			<div class="walkerwp-grid-4 brands-col">
				<?php walkerpress_branding(); ?>
			</div>
			<div class="walkerwp-grid-4 social-icons">
				<?php walkerpress_header_social_media(); ?>
			</div>
		</div>
		
			<?php
				if($header_current_ads_postion == 'header-ads-below-brand'){?>
					<div class="walkerwp-container header-ads-container">
						<?php	walkerpress_header_ads_section(); ?>
					</div>
				<?php }
			?>
			
		
	</div>
	<?php 
		$sticky_menu_class='';
		if(get_theme_mod('enable_stikcy_header')){
			$sticky_menu_class='sticky-menu';
		}?>
	<div class="walkerwp-wraper navigation no-gap <?php echo esc_attr($sticky_menu_class);?>">
		<div class="walkerwp-container">
			<?php sidebar_panel_switcher(); ?>
			<?php walkerpress_navigation();?> <?php walkerpress_header_global_search(); ?>
		</div>
	</div>
</header><!-- #masthead -->