<?php
if(get_theme_mod('enable_sub_header_section','true')){
	if ( !is_front_page() && !is_home() ) {?>
		<div class="walkerwp-wraper inner-page-subheader normal-subheader no-gap">
			<div class="walkerwp-container">
				<div class="walkerwp-grid-12">
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