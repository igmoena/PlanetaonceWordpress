<?php
/**
 *Footer widget for WalkerPress
 *
 * @package walkerpress
 * @since version 1.0.0
 */

if(walkerpress_footer_widgets_status()){
?>

<div class="walkerwp-wraper footer-widgets-wraper">
	<div class="walkerwp-container footer-wiget-list">
		<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
		    <div class="walkerpress-footer-column">
		        <?php dynamic_sidebar( 'footer-1' ); ?>
		    </div>
		<?php } ?>
	</div>
</div>
<?php } 
