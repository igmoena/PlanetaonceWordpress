<?php
/**
 * Template Name: Front page template
 * The template for front page 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WalkerPress
 */

get_header();
if(walkerpress_set_to_premium()){
	if ( is_active_sidebar( 'frontpage-content-1' ) ) : ?>
	    <div class="walkerwp-wraper">
	    	<div class="walkerwp-container">
	    		<?php
	    			if ( is_active_sidebar( 'frontpage-sidebar-1' ) ){
	    				$frontpage_content_class= 'walkerwp-grid-8';
	    				$fontpage_content_subclass= 'sidebar-activated';
	    			}else{
	    				$frontpage_content_class= 'walkerwp-grid-12';
	    				$fontpage_content_subclass='';
	    			}
	    		?>
	    		<div class="frontpage-content-block <?php echo esc_attr($frontpage_content_class);?> <?php echo esc_attr($fontpage_content_subclass);?>">
	        		<?php dynamic_sidebar( 'frontpage-content-1' ); ?>
	        	</div>
	        	<?php if ( is_active_sidebar( 'frontpage-sidebar-1' ) ){?>
		        	<div class="walkerwp-grid-4 frontpage-sidebar-block">
		        		<div class="sidebar-block-inner">
		        			<?php dynamic_sidebar( 'frontpage-sidebar-1' ); ?>
		        		</div>
		        	</div>
		        <?php } ?>
	        </div>
	    </div>
	<?php endif;
	if ( is_active_sidebar( 'frontpage-content-2' ) ) : ?>
	    <div class="walkerwp-wraper content-holder-2">
	    	<div class="walkerwp-container">
	    		<?php
	    			if ( is_active_sidebar( 'frontpage-sidebar-2' ) ){
	    				$frontpage_content_class= 'walkerwp-grid-8';
	    				$fontpage_content_subclass= 'sidebar-activated';
	    			}else{
	    				$frontpage_content_class= 'walkerwp-grid-12';
	    				$fontpage_content_subclass='';
	    			}
	    		?>
	    		<div class="frontpage-content-block <?php echo esc_attr($frontpage_content_class);?> <?php echo esc_attr($fontpage_content_subclass);?>">
	        		<?php dynamic_sidebar( 'frontpage-content-2' ); ?>
	        	</div>
	        	<?php if ( is_active_sidebar( 'frontpage-sidebar-2' ) ){?>
		        	<div class="walkerwp-grid-4 frontpage-sidebar-block">
		        		<div class="sidebar-block-inner">
		        			<?php dynamic_sidebar( 'frontpage-sidebar-2' ); ?>
		        		</div>
		        	</div>
		        <?php } ?>
	        </div>
	    </div>
	<?php endif;
	if ( is_active_sidebar( 'frontpage-content-3' ) ) : ?>
	    <div class="walkerwp-wraper content-holder-3">
	    	<div class="walkerwp-container">
	    		<?php
	    			if ( is_active_sidebar( 'frontpage-sidebar-3' ) ){
	    				$frontpage_content_class= 'walkerwp-grid-8';
	    				$fontpage_content_subclass= 'sidebar-activated';
	    			}else{
	    				$frontpage_content_class= 'walkerwp-grid-12';
	    				$fontpage_content_subclass='';
	    			}
	    		?>
	    		<div class="frontpage-content-block <?php echo esc_attr($frontpage_content_class);?> <?php echo esc_attr($fontpage_content_subclass);?>">
	        		<?php dynamic_sidebar( 'frontpage-content-3' ); ?>
	        	</div>
	        	<?php if ( is_active_sidebar( 'frontpage-sidebar-3' ) ){?>
		        	<div class="walkerwp-grid-4 frontpage-sidebar-block">
		        		<div class="sidebar-block-inner">
		        			<?php dynamic_sidebar( 'frontpage-sidebar-3' ); ?>
		        		</div>
		        	</div>
		        <?php } ?>
	        </div>
	    </div>
	<?php endif;
}
get_footer();