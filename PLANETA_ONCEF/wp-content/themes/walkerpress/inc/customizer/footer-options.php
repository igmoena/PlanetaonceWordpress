<?php
/**
*Footer customizer options
*
* @package WalkerPress
*
*/
if(walkerpress_set_to_premium()):
	if (! function_exists('walkerpress_footer_options_register')) {
		function walkerpress_footer_options_register( $wp_customize ) {
			$wp_customize->add_section('walkerpress_footer_setting', 
			 	array(
			        'title' => esc_html__('Footer', 'walkerpress'),
			        'panel' =>'walkerpress_theme_option',
			        'priority' => 12
		    	)
			 );

			$wp_customize->add_setting( 
		          'walkerpress_footer_setting_tabs', 
		          array(
		              'default'           => 'footer-setting-tab-content',
		              'sanitize_callback' => 'walkerpress_sanitize_choices'
		          ) 
		      );

		      $footer_settings_tabs = array(
		      'footer-setting-tab-content'  => esc_html__('General','walkerpress'),
		      'footer-setting-tab-style'  => esc_html__('Style','walkerpress'),
		  
		    );
		      
		      $wp_customize->add_control( 'walkerpress_footer_setting_tabs',
		        array(
		          'type' => 'radio',
		          'section'   => 'walkerpress_footer_setting',
		          'label'     => '',
		          'description' => '',
		          'choices'   => $footer_settings_tabs,
		          'priority' => 1,
		        )
		    );
			$wp_customize->add_setting( 
		        'walkerpress_footer_layout', 
		        array(
		            'default'           => 'footer-layout-one',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'walkerpress_footer_layout',
					array(
						'section'	  => 'walkerpress_footer_setting',
						'label'		  => esc_html__( 'Footer Settings', 'walkerpress' ),
						'description' => esc_html__( 'Choose Layout', 'walkerpress' ),
						'type'           => 'select',
						'choices'	  => array(
							'footer-layout-one'  => esc_html__('Layout 1','walkerpress'),
							'footer-layout-two'  => esc_html__('Layout 2','walkerpress'),
							'footer-layout-three'  => esc_html__('Layout 3','walkerpress'),
						),
						'priority' => 2,
						'active_callback' => 'walkerpress_footer_content_tabs',
					)
				)
			);

			$wp_customize->add_setting( 'walkerpress_footer_background_color', 
				array(
			        'default'        => '#0d1741',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_footer_background_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Background Color', 'walkerpress' ),
			        'section' => 'walkerpress_footer_setting',
			        'settings'   => 'walkerpress_footer_background_color',
			        'priority' => 3,
			        'active_callback' => 'walkerpress_footer_style_tabs' 
			    ) ) 
			);
			$wp_customize->add_setting('footer_bg_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
		    	'label' => '',
		        'description'             => esc_html__('Background Image', 'walkerpress'),
		        'section'           => 'walkerpress_footer_setting',
		        'settings'          => 'footer_bg_image',
		        'priority' 			=> 3,
		        'active_callback' => 'walkerpress_footer_style_tabs' 
		
		    )));
			
	$wp_customize->add_setting(
    	'footer_bg_opacity',
    	array(
	        'default'			=> '0',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'walkerpress_sanitize_text',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new WalkerPress_Customizer_Range_Control( $wp_customize, 'footer_bg_opacity', 
		array(
			'label'      => __( 'Background Opacity', 'walkerpress'),
			'section'  => 'walkerpress_footer_setting',
			'settings' => 'footer_bg_opacity',
             'input_attrs' => array(
				'min'    => 0,
				'max'    => 1.00,
				'step'   => 0.01,
			),
            'priority' => 4,
            'active_callback' => 'walkerpress_footer_style_tabs' 
		) ) 
	);
			
			$wp_customize->add_setting( 'walkerpress_footer_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',

		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_footer_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'walkerpress' ),
			        'section' => 'walkerpress_footer_setting',
			        'settings'   => 'walkerpress_footer_text_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_footer_style_tabs' 
			    ) ) 
			);
			$wp_customize->add_setting( 'walkerpress_footer_link_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_footer_link_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Color', 'walkerpress' ),
			        'section' => 'walkerpress_footer_setting',
			        'settings'   => 'walkerpress_footer_link_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_footer_style_tabs' 
			    ) ) 
			);
			$wp_customize->add_setting( 'walkerpress_footer_link_hover_color', 
				array(
			        'default'        => '#f15754',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_footer_link_hover_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Link Hover Color', 'walkerpress' ),
			        'section' => 'walkerpress_footer_setting',
			        'settings'   => 'walkerpress_footer_link_hover_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_footer_style_tabs' 
			    ) ) 
			);
			$wp_customize->add_setting( 'walkerpress_footer_box_color', 
				array(
			        'default'        => '#000000',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_footer_box_color', 
				array(
					'label' => esc_html__('Footer Column Box','walkerpress'),
			        'description'   => esc_html__( 'Background Color', 'walkerpress' ),
			        'section' => 'walkerpress_footer_setting',
			        'settings'   => 'walkerpress_footer_box_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_footer_box' 
			    ) ) 
			);
		$wp_customize->add_setting( 'footer_box_opacity',
	    	array(
		        'default'			=> '0.2',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_text',
				'priority'  => 4,
			)
		);
		$wp_customize->add_control( 
		new WalkerPress_Customizer_Range_Control( $wp_customize, 'footer_box_opacity', 
			array(
				'label' => '',
				'description'    => __( 'Box Background Opacity', 'walkerpress'),
				'section'  => 'walkerpress_footer_setting',
				'settings' => 'footer_box_opacity',
	             'input_attrs' => array(
					'min'    => 0,
					'max'    => 1.00,
					'step'   => 0.01,
				),
	            'priority' => 4,
	            'active_callback' => 'walkerpress_footer_box' 
			) ) 
		);
			$wp_customize->add_setting( 'walkerpress_footer_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walkerpress_footer_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_footer_setting',
				'settings' => 'walkerpress_footer_section_padding_top',
				'label' => '',
				'description' => esc_html__( 'Section Top Space','walkerpress' ),
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 4,
			    'active_callback' => 'walkerpress_footer_style_tabs' 
			) 
		);
		$wp_customize->add_setting( 'walkerpress_footer_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walkerpress_footer_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_footer_setting',
				'settings' => 'walkerpress_footer_section_padding_bottom',
				'description' => esc_html__( 'Section Bottom Space','walkerpress' ),
				'label' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 4,
			    'active_callback' => 'walkerpress_footer_style_tabs' 
			) 
		);
			$wp_customize->add_setting( 'walkerpress_footer_bottom_color', 
				array(
			        'default'        => '#0d1741',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_footer_bottom_color', 
				array(
			        'label'   => esc_html__( 'Copyright Settings', 'walkerpress' ),
			        'description' => esc_html__('Background Color','walkerpress'),
			        'section' => 'walkerpress_footer_setting',
			        'settings'   => 'walkerpress_footer_bottom_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_footer_style_tabs' 
			    ) ) 
			);
			$wp_customize->add_setting( 'footer_copyright_social_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'footer_copyright_social_status', 
				array(
				  'label'   => esc_html__( 'Enable Social Icons In Footer Bottom', 'walkerpress' ),
				  'section' => 'walkerpress_footer_setting',
				  'settings' => 'footer_copyright_social_status',
				  'type'    => 'checkbox',
				  'priority' => 4,
				  'active_callback' => 'walkerpress_footer_content_tabs',
				)
			);
		
	$wp_customize->add_setting(
    	'copyright_bg_opacity',
    	array(
	        'default'			=> '0',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'walkerpress_sanitize_text',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new WalkerPress_Customizer_Range_Control( $wp_customize, 'copyright_bg_opacity', 
		array(
			'label'      => __( 'Background Opacity', 'walkerpress'),
			'section'  => 'walkerpress_footer_setting',
			'settings' => 'copyright_bg_opacity',
             'input_attrs' => array(
				'min'    => 0,
				'max'    => 1.00,
				'step'   => 0.01,
			),
            'priority' => 4,
            'active_callback' => 'walkerpress_footer_style_tabs' 
		) ) 
	);
			$wp_customize->add_setting( 'walkerpress_copyright_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_copyright_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Copyright Text Color', 'walkerpress' ),
			        'section' => 'walkerpress_footer_setting',
			        'settings'   => 'walkerpress_copyright_text_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_footer_style_tabs' 
			    ) ) 
			);
			
			$wp_customize->add_setting( 'footer_copiright_text', 
			 	array(
					'capability' => 'edit_theme_options',
					'default' => '',
					'sanitize_callback' => 'wp_kses_post',
				) 
			);

			$wp_customize->add_control( 'footer_copiright_text', 
				array(
					'type' => 'textarea',
					'section' => 'walkerpress_footer_setting',
					'label' => '',
					'description' => esc_html__( 'Copyright Text','walkerpress' ),
					'active_callback' => 'walkerpress_footer_content_tabs',
				)
			);
		$wp_customize->add_setting( 
	        'copyright_text_alignment', 
	        array(
	            'default'           => 'copyright-text-align-left',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'copyright_text_alignment',
				array(
					'section'	  => 'walkerpress_footer_setting',
					'description'		  => esc_html__( 'Copyright Text Alignment', 'walkerpress' ),
					'label' => '',
					'type'        => 'select',
					'active_callback' => 'walkerpress_copyright_text_alignment',
					'choices'	  => array(
						'copyright-text-align-left'  => esc_html__('Left','walkerpress'),
						'copyright-text-align-center'  => esc_html__('Center','walkerpress'),
					),
					
				)
			)
		);
			$wp_customize->selective_refresh->add_partial( 'footer_copiright_text', array(
	            'selector' => '.site-info',
	        ) );

	    $wp_customize->add_setting( 'walkerpress_copyright_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 15,
			) 
		);

		$wp_customize->add_control( 'walkerpress_copyright_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_footer_setting',
				'settings' => 'walkerpress_copyright_section_padding_top',
				'label' => '',
				'description' => esc_html__( 'Section Top Space','walkerpress' ),
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => 'walkerpress_footer_style_tabs' 
			) 
		);
		$wp_customize->add_setting( 'walkerpress_copyright_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 15,
			) 
		);

		$wp_customize->add_control( 'walkerpress_copyright_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_footer_setting',
				'settings' => 'walkerpress_copyright_section_padding_bottom',
				'description' => esc_html__( 'Section Bottom Space','walkerpress' ),
				'label' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => 'walkerpress_footer_style_tabs' 
			) 
		);
		}

		function walkerpress_footer_box(){
			$footer_tabs_style = get_theme_mod( 'walkerpress_footer_setting_tabs');
			$footer_layout_choice = get_theme_mod( 'walkerpress_footer_layout');
			$footer_box_option= false;
			if($footer_tabs_style =='footer-setting-tab-style' && $footer_layout_choice=='footer-layout-one' || $footer_tabs_style =='footer-setting-tab-style' && $footer_layout_choice =='footer-layout-three'){
				$footer_box_option = true;
			}
			return $footer_box_option;
		}
		function walkerpress_footer_style_tabs(){
	        $footer_tabs_style = get_theme_mod( 'walkerpress_footer_setting_tabs');
	        $style_tab_status = false;
	        if($footer_tabs_style == 'footer-setting-tab-style'){
	          $style_tab_status = true;
	        }
	        return $style_tab_status;
	    }
	    function walkerpress_footer_content_tabs(){
	        $footer_tabs_content = get_theme_mod( 'walkerpress_footer_setting_tabs');
	        $content_tabs_status = false;
	        if($footer_tabs_content == 'footer-setting-tab-content'){
	          $content_tabs_status = true;
	        }
	        return $content_tabs_status;
	    }

	    function walkerpress_copyright_text_alignment(){
	    	$footer_tabs_content = get_theme_mod( 'walkerpress_footer_setting_tabs');
	    	$footer_layout = get_theme_mod('walkerpress_footer_layout');
	    	$text_alignment_status = false;
	    	if($footer_tabs_content == 'footer-setting-tab-content' && $footer_layout=='footer-layout-three'){
	          $text_alignment_status = true;
	        }
	        return $text_alignment_status;
	    }
	}
	add_action( 'customize_register', 'walkerpress_footer_options_register' );
endif;
