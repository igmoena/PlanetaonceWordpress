<?php
$subheader_text_align = get_theme_mod('subheader_text_alignment','subheader-text-align-left');
if($subheader_text_align =='subheader-text-align-center'){
	$text_align_class = 'align-center';
}elseif($subheader_text_align =='subheader-text-align-right'){
	$text_align_class = 'align-right';
}else{
	$text_align_class = 'align-left';
}
if(get_theme_mod('enable_sub_header_section','true')){
	if ( !is_front_page() && !is_home() ) {?>
		<div class="walkerwp-wraper inner-page-subheader sub-header-2 no-gap <?php echo esc_attr($text_align_class);?>">
			<?php
			if(get_theme_mod('subheader_bg_image') && walkerpress_set_to_premium() ){
				$header_background_img = get_theme_mod('subheader_bg_image');?>
				
			<?php }
			
			if(is_page() && has_post_thumbnail() && get_theme_mod('use_featured_image_as_background_page')){
				the_post_thumbnail();
			}elseif(is_single() && has_post_thumbnail() && get_theme_mod('use_featured_image_as_background_post')){
				the_post_thumbnail();
			}else{?>
				<img class="header-overlay-image" src="<?php echo esc_url($header_background_img);?>" />
			<?php }
			?>
			
			<div class="walkerwp-container">
				<div class="walkerwp-grid-12">
					<?php if(get_theme_mod('enable_sub_header_section_title','true')){?>
						<h1 class="page-header-title">
						<?php if(is_search()){
								$gridchamp_title= __('Search', 'walkerpress');
							}elseif(is_404()){
								$gridchamp_title = __('404', 'walkerpress');
							}elseif(is_archive()){
								$gridchamp_title = the_archive_title();
							}else{
								$gridchamp_title = get_the_title();
							}?>
							<?php echo $gridchamp_title; ?>
								
							</h1>
						<?php } ?>

						<?php
						if(get_theme_mod('enable_sub_header_section_breadcrumbs','true')){?>
							<div class="walkerpress-breadcrumbs"><?php breadcrumb_trail();?></div>
						<?php } ?>
				</div>
			</div>
		</div>
		<?php 
	} 
}