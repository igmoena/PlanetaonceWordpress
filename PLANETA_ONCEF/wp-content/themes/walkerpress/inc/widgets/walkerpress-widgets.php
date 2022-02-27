<?php
/**
 * adding themes cusotm widgets .
 */
if(walkerpress_set_to_premium()){
	require get_template_directory() . '/inc/widgets/walkerpress-popular-post-widget.php';
	require get_template_directory() . '/inc/widgets/walkerpress-single-category-widget.php';
	require get_template_directory() . '/inc/widgets/walkerpress-double-category-widget.php';
	require get_template_directory() . '/inc/widgets/walkerpress-three-category-widget.php';
	require get_template_directory() . '/inc/widgets/walkerpress-social-icons-widget.php';
	require get_template_directory() . '/inc/widgets/walkerpress-newsletter-widget.php';
}
require get_template_directory() . '/inc/widgets/walkerpress-heading-widgets.php';
require get_template_directory() . '/inc/widgets/walkerpress-latest-post-widget.php';

if(! function_exists('walkerpress_widgets_register')):
function walkerpress_widgets_register() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #1', 'walkerpress' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'walkerpress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #2', 'walkerpress' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'walkerpress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #3', 'walkerpress' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'walkerpress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer #4', 'walkerpress' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'walkerpress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	if(walkerpress_set_to_premium()){
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home Content Block #1', 'walkerpress' ),
				'id'            => 'frontpage-content-1',
				'description'   => esc_html__( 'Add widgets here to be shown on home page section.', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home Sidebar #1', 'walkerpress' ),
				'id'            => 'frontpage-sidebar-1',
				'description'   => esc_html__( 'Add widgets here to be shown on Home content Block #1 section.', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home Content Block #2', 'walkerpress' ),
				'id'            => 'frontpage-content-2',
				'description'   => esc_html__( 'Add widgets here to be shown on home page section.', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home Sidebar #2', 'walkerpress' ),
				'id'            => 'frontpage-sidebar-2',
				'description'   => esc_html__( 'Add widgets here to be shown on Home content Block #2 section.', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home Content Block #3', 'walkerpress' ),
				'id'            => 'frontpage-content-3',
				'description'   => esc_html__( 'Add widgets here to be shown on home page section.', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Home Sidebar #3', 'walkerpress' ),
				'id'            => 'frontpage-sidebar-3',
				'description'   => esc_html__( 'Add widgets here to be shown on Home content Block #3 section.', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Header Ads. Area', 'walkerpress' ),
				'id'            => 'header-ads-1',
				'description'   => esc_html__( 'Add widgets here to be shown on Advertisement in header', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar Panel', 'walkerpress' ),
				'id'            => 'sidebar-panel',
				'description'   => esc_html__( 'Add widgets here to be content in sidebar panel', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Single Post: Top Area Ads.', 'walkerpress' ),
				'id'            => 'single-ads-top',
				'description'   => esc_html__( 'Add widgets here to be shown on Advertisement in single post top section', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Single Post: Bottom Area Ads.', 'walkerpress' ),
				'id'            => 'single-ads-bottom',
				'description'   => esc_html__( 'Add widgets here to be shown on Advertisement in single post bottom section', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog/Archive: Top Area Ads.', 'walkerpress' ),
				'id'            => 'blog-ads-top',
				'description'   => esc_html__( 'Add widgets here to be shown on Advertisement in blog/archive post top section', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog/Archive: Bottom Area Ads.', 'walkerpress' ),
				'id'            => 'blog-ads-bottom',
				'description'   => esc_html__( 'Add widgets here to be shown on Advertisement in blog/archive post bottom section', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Banner Ads Area.', 'walkerpress' ),
				'id'            => 'featured-banner-ads',
				'description'   => esc_html__( 'Add widgets here to be shown on Advertisement in banner section', 'walkerpress' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
		
		
	
}
add_action( 'widgets_init', 'walkerpress_widgets_register' );
endif;