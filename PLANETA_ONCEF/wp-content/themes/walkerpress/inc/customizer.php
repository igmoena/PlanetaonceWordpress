<?php
/**
 * WalkerPress Theme Customizer
 *
 * @package WalkerPress
 */
/**
*Custom controls for theme
*/

require get_template_directory() . '/inc/walkerpress-custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function walkerpress_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'walkerpress_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'walkerpress_customize_partial_blogdescription',
			)
		);
		//Panel register for theme option
	    $wp_customize->add_panel( 'walkerpress_theme_option', 
		  	array(
			    'priority'       => 20,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('General Settings', 'walkerpress'),
			) 
		);

		$wp_customize->add_panel( 'walkerpress_frontpage_option', 
		  	array(
			    'priority'       => 21,
			    'capability'     => 'edit_theme_options',
			    'title'      => esc_html__('Front Page Settings', 'walkerpress'),
			) 
		);
	    $wp_customize->add_setting(
		    	'walkerpress_site_title_size',
		    	array(
			        'default'			=> '30',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_site_title_size', 
				array(
					'label'      => __( 'Logo Size [PX]', 'walkerpress'),
					'section'  => 'title_tagline',
					'settings' => 'walkerpress_site_title_size',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 150,
						'step'   => 1,
					),
				) ) 
			);
	}
}
add_action( 'customize_register', 'walkerpress_customize_register' );
/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/walkerpress-sanitization-functions.php';
/**
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
require get_template_directory() . '/inc/customizer/color-options.php';
require get_template_directory() . '/inc/customizer/social-options.php';
require get_template_directory() . '/inc/customizer/header-options.php';
require get_template_directory() . '/inc/customizer/typography-options.php';
require get_template_directory() . '/inc/customizer/frontpage-options.php';
require get_template_directory() . '/inc/customizer/blog-options.php';
require get_template_directory() . '/inc/customizer/footer-options.php';
require get_template_directory() . '/inc/customizer/pagetitle-options.php';
if(!walkerpress_set_to_premium()){
	require get_template_directory() . '/inc/customizer/theme-info.php';
}
function walkerpress_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function walkerpress_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
*
*Enqueue customizer styles and scripts
*/
function walkerpress_customize_controls_register_scripts() {
	wp_enqueue_style( 'walkerpress-customizer-styles', get_template_directory_uri() . '/inc/customizer/walkerpress-customizer-styles.css', array(), WALKERPRESS_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'walkerpress_customize_controls_register_scripts', 0 );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function walkerpress_customize_preview_js() {
	wp_enqueue_script( 'walkerpress-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), WALKERPRESS_VERSION, true );
}
add_action( 'customize_preview_init', 'walkerpress_customize_preview_js' );
