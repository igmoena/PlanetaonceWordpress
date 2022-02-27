<?php
/**
 *  Template for Woocommerce 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package walkerpress
 */


get_header(); ?>
<div class="walkerwp-wraper inner-wraper woocommerce-wraper">
	<div class="walkerwp-container">
		<main id="primary" class="site-main walkerwp-grid-9">
			<?php woocommerce_content(); ?>
		</main>
		<div class="walkerwp-grid-3  sidebar-block">
			<?php get_sidebar();?>
		</div>
	</div>
</div>

<?php get_footer();