<div class="walker-core-dashboard">
	<div class="container">
		<h1 class="dashboard-heading"><?php echo __('Welcome to the Walker Core Dashboard','walker-core');?></h1>
		<div class="dashboard-box">
			<div class="dashboard-info">
				<?php echo __('Walker Core is the companion plugin for the themes of WalkerWP, which provides core functionlity and custom post types for the themes.','walker-core');

				echo  ' <a href="' . esc_url( 'https://walkerwp.com/walker-core/' ) . '"target="_blank" aria-label="' . esc_attr__( 'View More About Walker Core', 'walker-core' ) . '">' . esc_html__( 'View More About Walker Core', 'walker-core' ) . '</a>';

				?>
			</div>
			<div class="walker-dashboard-col-half">
				<?php $theme = wp_get_theme();
                    if ( 'Gridchamp' == $theme->name || 'Gridchamp' == $theme->parent_theme || 'Walker Charity' == $theme->name || 'Walker Charity' == $theme->parent_theme  ):
					echo '<h3>'.__('Available Custom Post Types for Pro Features','walker-core').'</h3>';
				endif;?>
					<ul class="walker-core-features">
						<?php
						if ( 'Gridchamp' == $theme->name || 'Gridchamp' == $theme->parent_theme || 'Walker Charity' == $theme->name || 'Walker Charity' == $theme->parent_theme  ): ?>
						<li>Slider</li>
						<li>Testimonials</li>
						<li>Portfolios</li>
						<li>Teams</li>
						<li>Brands</li>
						<?php endif; ?>
						<?php if ( 'Gridchamp' == $theme->name || 'Gridchamp' == $theme->parent_theme ): ?>
							<li>FAQs</li>
						<?php endif; ?>

					</ul>
				<?php 
				 if ( 'WalkerMag' == $theme->name || 'WalkerMag' == $theme->parent_theme  ): ?>
				 	<?php echo '<h3>'.__('Available Widgets for Pro Features','walker-core').'</h3>';?>
				 	<ul class="walker-core-widgets">
					<li><?php echo '<h4>'.__('WalkerWP Category Post','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add recent post blogs in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					<li><?php echo '<h4>'.__('WalkerWP Popular Post','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add social medias icons in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					
					
				</ul>
				<?php  endif;
				 if ( 'WalkerPress' == $theme->name || 'WalkerPress' == $theme->parent_theme  ): ?>
				 	<?php echo '<h3>'.__('Available Widgets for Pro Features','walker-core').'</h3>';?>
				 	<ul class="walker-core-widgets">
					<li><?php echo '<h4>'.__('WalkerPress: Popular Post','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add popular post in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					<li><?php echo '<h4>'.__('WalkerPress: Social Media','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add social medias icons in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					<li><?php echo '<h4>'.__('WalkerPress: Newsletter','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add newsletter form anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					
					
					
				</ul>

				 <?php
				 echo  ' <a href="' . esc_url( 'https://walkerwp.com/walkerpress' ) . '"target="_blank" aria-label="' . esc_attr__( 'View More Premium Features', 'walker-core' ) . '">' . esc_html__( 'View More Premium Features', 'walker-core' ) . '</a>';
				 	endif;
				?>
			</div>
			<div class="walker-dashboard-col-half right-part">
				<?php if ( 'Gridchamp' == $theme->name || 'Gridchamp' == $theme->parent_theme || 'WalkerMag' == $theme->name || 'WalkerMag' == $theme->parent_theme  ): ?>
				<?php echo '<h3>'.__('Available Widgets for Pro Features','walker-core').'</h3>';?>
				<ul class="walker-core-widgets">
					<li><?php echo '<h4>'.__('WalkerWP Recent Blog','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add recent post blogs in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					<li><?php echo '<h4>'.__('WalkerWP Social Media','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add social medias icons in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					<li><?php echo '<h4>'.__('WalkerWP Address Box','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add Address box information in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
					</li>
					
				</ul>
			<?php endif; ?>
			<?php if ( 'Walker Charity' == $theme->name || 'Walker Charity' == $theme->parent_theme  ): ?>
				<?php echo '<h3>'.__('Available Widgets for Pro Features','walker-core').'</h3>';?>
					<ul class="walker-core-widgets">
						<li><?php echo '<h4>'.__('WalkerWP Social Media','walker-core').'</h4>';?>
							<?php echo '<p>'. __('This widgets helps to add social medias icons in anywhere in the dyanmic sidebar like footer, sidebar of the themes','walker-core').'</p>';?>
						</li>
					</ul>
			<?php endif;
			 if ( 'WalkerPress' == $theme->name || 'WalkerPress' == $theme->parent_theme  ): ?>
			 	<ul class="walker-core-widgets">
			    <?php echo '<h3>'.__('Available Widgets for Pro Features','walker-core').'</h3>';?>
			 	<li><?php echo '<h4>'.__('WalkerPress: Single Category','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add single category section with 8 different layouts anywhere in the dyanmic sidebar like footer, sidebar of the themes but specially cretaed for frontpage.','walker-core').'</p>';?>
					</li>
					<li><?php echo '<h4>'.__('WalkerPress: Double Category','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add section with two category section with 6 different layouts anywhere in the dyanmic sidebar like footer, sidebar of the themes but specially cretaed for frontpage.','walker-core').'</p>';?>
					</li>
					<li><?php echo '<h4>'.__('WalkerPress: Three Category','walker-core').'</h4>';?>
						<?php echo '<p>'. __('This widgets helps to add section with three category section with 6 different layouts anywhere in the dyanmic sidebar like footer, sidebar of the themes but specially cretaed for frontpage.','walker-core').'</p>';?>
					</li>
				</ul>
			<?php endif; ?>
			</div>
		</div>
		<div class="faqs">
			<?php echo '<h1>'.__('Few FAQs about this plugin','walker-core').'</h1>'; ?>
			-------------------------
			<ul>
				<li><?php echo '<h2>'.__('Is Walker Core is a free plugin?','walker-core').'</h2>';?>
				<p><?php echo __('- Yes, it is a free plugin.','walker-core');?></p></li>
				<li><?php echo '<h2>'.__('Can i use this plugin for any theme?','walker-core').'</h2>';?></h2>
				<p><?php echo __('This is the companion plugin for themes of WalkerWP so we don’t recommended to using with other theme.','walker-core');?></p></li>
			</ul>
			-------------------------
			<?php echo '<h2>' .__('Thank You For Choosing Us!!!','walker-core').'</h2>';?>
		</div>
	</div>
</div>