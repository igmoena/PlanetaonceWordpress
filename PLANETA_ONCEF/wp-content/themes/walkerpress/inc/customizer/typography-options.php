<?php
/**
*Typography customizer options
*
* @package WalkerPress
*
*/

if (! function_exists('walkerpress_typography_options_register')) {
	function walkerpress_typography_options_register( $wp_customize ) {
	//Typography
		$wp_customize->add_section('walkerpress_site_typography', 
		 	array(
		        'title' => esc_html__('Typography', 'walkerpress'),
		        'panel' =>'walkerpress_theme_option',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$font_choices = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
			'Staatliches' => 'Staatliches',
		    'Poppins:wght@100;200;300;400;500;700' => 'Poppins',
		    'Abel' => 'Abel',
		    'Prata' => 'Prata',
		    'Heebo:wght@100;200;300;400;500;700' => 'Heebo',
		    'Quicksand:wght@300;400;500;600;700' => 'Quicksand',
		);

		$wp_customize->add_setting( 'walkerpress_body_fonts', array(
				'sanitize_callback' => 'walkerpress_sanitize_fonts',
				'default' => 'Oxygen:400,300,700',
			)
		);

		$wp_customize->add_control( 'walkerpress_body_fonts', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Body Typography', 'walkerpress' ),
				'description' => esc_html__('Font Family','walkerpress'),
				'section' => 'walkerpress_site_typography',
				'choices' => $font_choices
			)
		);

		$wp_customize->add_setting(
		    	'walkerpress_font_size',
		    	array(
			        'default'			=> 14,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_font_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for Body [PX]', 'walkerpress'),
					'section'  => 'walkerpress_site_typography',
					'settings' => 'walkerpress_font_size',
		             'input_attrs' => array(
						'min'    => 12,
						'max'    => 24,
						'step'   => 1,
					),
				) ) 
			);


		$wp_customize->add_setting( 'walkerpress_heading_fonts', array(
				'sanitize_callback' => 'walkerpress_sanitize_fonts',
				'default' => 'Roboto:400,400italic,700,700italic',
			)
		);

		$wp_customize->add_control( 'walkerpress_heading_fonts', array(
				'type' => 'select',
				'label'		  => esc_html__( 'Heading Typography', 'walkerpress' ),
				'description' => esc_html__('Font Family','walkerpress'),
				'section' => 'walkerpress_site_typography',
				'choices' => $font_choices
			)
		);
		$wp_customize->add_setting(
		    	'walkerpress_heading_one_size',
		    	array(
			        'default'			=> 40,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_heading_one_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for H1 [PX]', 'walkerpress'),
					'section'  => 'walkerpress_site_typography',
					'settings' => 'walkerpress_heading_one_size',
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);

		$wp_customize->add_setting(
		    	'walkerpress_heading_two_size',
		    	array(
			        'default'			=> 32,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_heading_two_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for H2 [PX]', 'walkerpress'),
					'section'  => 'walkerpress_site_typography',
					'settings' => 'walkerpress_heading_two_size',
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);

		$wp_customize->add_setting(
		    	'walkerpress_heading_three_size',
		    	array(
			        'default'			=> 24,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_heading_three_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for H3 [PX]', 'walkerpress'),
					'section'  => 'walkerpress_site_typography',
					'settings' => 'walkerpress_heading_three_size',
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);

		$wp_customize->add_setting(
		    	'walkerpress_heading_four_size',
		    	array(
			        'default'			=> 20,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_heading_four_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for H4 [PX]', 'walkerpress'),
					'section'  => 'walkerpress_site_typography',
					'settings' => 'walkerpress_heading_four_size',
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);

		
		$wp_customize->add_setting(
		    	'walkerpress_heading_five_size',
		    	array(
			        'default'			=> 16,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_heading_five_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for H5 [PX]', 'walkerpress'),
					'section'  => 'walkerpress_site_typography',
					'settings' => 'walkerpress_heading_five_size',
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);

		$wp_customize->add_setting(
		    	'walkerpress_heading_six_size',
		    	array(
			        'default'			=> 14,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_heading_six_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size for H6 [PX]', 'walkerpress'),
					'section'  => 'walkerpress_site_typography',
					'settings' => 'walkerpress_heading_six_size',
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);

			$wp_customize->add_setting(
		    	'walkerpress_homepage_meta_size',
		    	array(
			        'default'			=> 12,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_homepage_meta_size', 
				array(
					'label' => '',
					'description'      => __( 'Meta Font Size', 'walkerpress'),
					'section'  => 'walkerpress_extra_settings',
					'settings' => 'walkerpress_homepage_meta_size',
					'priority' => 11,
		             'input_attrs' => array(
						'min'    => 8,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting(
		    	'walkerpress_homepage_category_size',
		    	array(
			        'default'			=> 12,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_homepage_category_size', 
				array(
					'label' => '',
					'description'      => __( 'Category Font Size', 'walkerpress'),
					'section'  => 'walkerpress_extra_settings',
					'settings' => 'walkerpress_homepage_category_size',
					'priority' => 21,
		             'input_attrs' => array(
						'min'    => 8,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting(
		    	'walkerpress_homepage_header_size',
		    	array(
			        'default'			=> 18,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_homepage_header_size', 
				array(
					'label' => '',
					'description'      => __( 'Main Header Font Size', 'walkerpress'),
					'section'  => 'walkerpress_extra_settings',
					'settings' => 'walkerpress_homepage_header_size',
					'priority' => 2,
		             'input_attrs' => array(
						'min'    => 14,
						'max'    => 120,
						'step'   => 1,
					),
				) ) 
			);
		
	}

}
add_action( 'customize_register', 'walkerpress_typography_options_register' );