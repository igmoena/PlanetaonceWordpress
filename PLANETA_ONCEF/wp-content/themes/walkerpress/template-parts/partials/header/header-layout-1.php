<header id="masthead" class="site-header  header-layout-1">
			
		<div class="walkerwp-wraper top-header no-gap">
			<div class="walkerwp-container">
				<?php 
				walkerpress_header_current_date();
				walkerpress_header_social_media();
				?>
			</div>
		</div>
		<div class="walkerwp-wraper main-header no-gap">
			<?php 
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
			<div class="walkerwp-container">
				<?php
					walkerpress_branding();
					walkerpress_header_ads_section();					
				?>
				
			</div>
		</div>
		<?php 
		$sticky_menu_class='';
		if(get_theme_mod('enable_stikcy_header')){
			$sticky_menu_class='sticky-menu';
		}?>
		<div class="walkerwp-wraper navigation no-gap <?php echo esc_attr($sticky_menu_class);?>">
			<div class="walkerwp-container">

				<div class="walkerpress-nav">
					<?php sidebar_panel_switcher(); ?>
					<?php walkerpress_navigation();?>
				</div>
				<?php walkerpress_header_global_search(); ?>
			</div>
		</div>
	</header><!-- #masthead -->