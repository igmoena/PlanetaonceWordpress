<?php
/**
*Typography customizer options
*
* @package WalkerPress
*
*/
add_action( 'customize_register', 'walkerpress_color_settings_panel' );

function walkerpress_color_settings_panel( $wp_customize)  {
    $wp_customize->get_section('colors')->priority = 1;
    $wp_customize->get_section( 'colors' )->title  = esc_html__('Color', 'walkerpress');
    $wp_customize->get_section('colors')->panel = 'walkerpress_theme_option';
}
if (! function_exists('walkerpress_colors_options_register')) {
	function walkerpress_colors_options_register( $wp_customize ) {
	
		$wp_customize->add_setting( 'walkerpress_primary_color', 
			array(
		        'default'        => '#5306cf',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_primary_color', 
			array(
		        'label'   => esc_html__( 'Site Color Settings', 'walkerpress' ),
		        'description' => esc_html__( 'Primary Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_primary_color',
		        'priority' => 1
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_secondary_color', 
			array(
		        'default'        => '#d51922',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_secondary_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Secondary Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_secondary_color',
		        'priority' => 2
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_heading_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_heading_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Heading Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_heading_color',
		        'priority' => 3
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_text_color', 
			array(
		        'default'        => '#404040',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_text_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_text_color',
		        'priority' => 3
		    ) ) 
		);
		
		$wp_customize->add_setting( 'walkerpress_light_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_light_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Light Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_light_color',
		        'priority' => 5
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_home_boxes_bg_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_home_boxes_bg_color', 
			array(
		        'label'   => esc_html__( 'Extra Settings', 'walkerpress' ),
		        'description' => esc_html__( 'Box Background Color', 'walkerpress' ),
		        'section' => 'walkerpress_extra_settings',
		        'settings'   => 'walkerpress_home_boxes_bg_color',
		        'priority' => 1
		    ) ) 
		);
		$wp_customize->add_setting( 'enable_box_border', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_box_border', 
			array(
			  'label'   => esc_html__( 'Enable Box Header', 'walkerpress' ),
			  'section' => 'walkerpress_extra_settings',
			  'settings' => 'enable_box_border',
			  'type'    => 'checkbox',
			  'priority' => 1,
			)
			
		);
		$wp_customize->add_setting( 'walkerpress_home_boxes_border_color', 
			array(
		        'default'        => '#f7f7f7',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_home_boxes_border_color', 
			array(
		        'label'   => '',
		        'description' => esc_html__( 'Box Border Color', 'walkerpress' ),
		        'section' => 'walkerpress_extra_settings',
		        'settings'   => 'walkerpress_home_boxes_border_color',
		        'priority' => 1,
		        'active_callback' => function(){
					return get_theme_mod( 'enable_box_border', true );
				},
		    ) ) 
		);
		
		$wp_customize->add_setting(
		    	'walkerpress_home_boxes_border_size',
		    	array(
			        'default'			=> 1,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_home_boxes_border_size', 
				array(
					'label' => '',
					'description'      => __( 'Box Border Size', 'walkerpress'),
					'section'  => 'walkerpress_extra_settings',
					'settings' => 'walkerpress_home_boxes_border_size',
		             'input_attrs' => array(
						'min'    => 0,
						'max'    => 50,
						'step'   => 1,
					),
		            'priority' => 1,
		            'active_callback' => function(){
   						return get_theme_mod( 'enable_box_border', true );
  					},
				) ) 
			);


		$wp_customize->add_setting( 'walkerpress_topbarbg_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);
		if(walkerpress_set_to_premium()){
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_topbarbg_color', 
			array(
		        'label'   => esc_html__( 'Topbar Color Settings', 'walkerpress' ),
		        'description' => esc_html__('Background Color','walkerpress'),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_topbarbg_color',
		        'priority' => 100
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_topbar_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_topbar_color', 
			array(
				'label' =>'',
		        'description'   => esc_html__( 'Topbar Text Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_topbar_color',
		        'priority' => 101
		    ) ) 
		);

		$wp_customize->add_setting( 'walkerpress_navigation_primary_color', 
			array(
		        'default'        => '#000000',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_navigation_primary_color', 
			array(
		        'label'   => esc_html__( 'Menu Color Settings', 'walkerpress' ),
		        'description'   => esc_html__( 'Primary Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_navigation_primary_color',
		        'priority' => 150
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_navigation_secondary_color', 
			array(
		        'default'        => '#d51922',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_navigation_secondary_color', 
			array(
		        'label'   => '',
		        'description'   => esc_html__( 'Secondary Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_navigation_secondary_color',
		        'priority' => 150
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_navigation_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_navigation_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_navigation_color',
		        'priority' => 150
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_navigation_hover_color', 
			array(
		        'default'        => '#ffffff',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_navigation_hover_color', 
			array(
				'label' => '',
		        'description'   => esc_html__( 'Text Hover Color', 'walkerpress' ),
		        'section' => 'colors',
		        'settings'   => 'walkerpress_navigation_hover_color',
		        'priority' => 150
		    ) ) 
		);
	}
		
	}

}
add_action( 'customize_register', 'walkerpress_colors_options_register' );