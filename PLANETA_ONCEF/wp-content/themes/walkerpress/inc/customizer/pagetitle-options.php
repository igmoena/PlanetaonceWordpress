<?php
/**
*Page Title customizer options
*
* @package walkerpress
*
*/

if (! function_exists('walkerpress_page_options_register')) {
	function walkerpress_page_options_register( $wp_customize ) {
		if(walkerpress_set_to_premium() ){
		$wp_customize->add_section(
	        'walkerpress_page_option',
	        array(
	            'title'    => esc_html__( 'Page Options', 'walkerpress' ),
	            'panel'    => 'walkerpress_theme_option',
	            'priority' => 4,
	        )
	    );
	    $wp_customize->add_setting( 
		          'walkerpress_subheader_setting_tabs', 
		          array(
		              'default'           => 'subheader-setting-tab-content',
		              'sanitize_callback' => 'walkerpress_sanitize_choices'
		          ) 
		      );

		      $subheaer_settings_tabs = array(
		      'subheader-setting-tab-content'  => esc_html__('General','walkerpress'),
		      'subheader-setting-tab-style'  => esc_html__('Style','walkerpress'),
		  
		    );
		      
		      $wp_customize->add_control( 'walkerpress_subheader_setting_tabs',
		        array(
		          'type' => 'radio',
		          'section'   => 'walkerpress_sub_header_option',
		          'label'     => '',
		          'description' => '',
		          'choices'   => $subheaer_settings_tabs,
		          'priority' => 1,
		        )
		    );
	    $wp_customize->add_setting( 'enable_featrued_page_image', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_featrued_page_image', 
			array(
			  'label'   => __( 'Enable Featured Image', 'walkerpress' ),
			  'section' => 'walkerpress_page_option',
			  'settings' => 'enable_featrued_page_image',
			  'type'    => 'checkbox',
			)
		);

		$wp_customize->add_setting( 'enable_page_content_title', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_page_content_title', 
			array(
			  'label'   => __( 'Enable Title of Inside Content', 'walkerpress' ),
			  'section' => 'walkerpress_page_option',
			  'settings' => 'enable_page_content_title',
			  'type'    => 'checkbox',
			)
		);

		$wp_customize->add_section(
	        'walkerpress_sub_header_option',
	        array(
	            'title'    => esc_html__( 'Sub Header Options', 'walkerpress' ),
	            'panel'    => 'walkerpress_theme_option',
	            'priority' => 5,
	        )
	    );
	    $wp_customize->add_setting( 'enable_sub_header_section', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_sub_header_section', 
			array(
			  'label'   => __( 'Enable Sub-Header Section', 'walkerpress' ),
			  'section' => 'walkerpress_sub_header_option',
			  'settings' => 'enable_sub_header_section',
			  'type'    => 'checkbox',
			  'active_callback' => 'walkerpress_subheader_tab_general_status'
			)
		);
		$wp_customize->add_setting( 
	        'subheader_layout_option', 
	        array(
	            'default'           => 'subheader-layout-1',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'subheader_layout_option',
				array(
					'section'	  => 'walkerpress_sub_header_option',
					'label'		  => esc_html__( 'Choose Layout', 'walkerpress' ),
					'description' => '',
					'type'        => 'select',
					'active_callback' => 'walkerpress_subheader_tab_general_status',
					'choices'	  => array(
						'subheader-layout-1'  => esc_html__('Default-Breadcrumbs Only','walkerpress'),
						'subheader-layout-2'  => esc_html__('Cover Image Layout','walkerpress'),
					),
					
				)
			)
		);
		$wp_customize->add_setting( 'enable_sub_header_section_title', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_sub_header_section_title', 
			array(
			  'label'   => __( 'Enable Title', 'walkerpress' ),
			  'section' => 'walkerpress_sub_header_option',
			  'settings' => 'enable_sub_header_section_title',
			  'type'    => 'checkbox',
			  'active_callback' => 'walkerpress_subheader_layout_two_general',
			)
		);
		$wp_customize->add_setting( 'enable_sub_header_section_breadcrumbs', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_sub_header_section_breadcrumbs', 
			array(
			  'label'   => __( 'Enable Breadcrumbs', 'walkerpress' ),
			  'section' => 'walkerpress_sub_header_option',
			  'settings' => 'enable_sub_header_section_breadcrumbs',
			  'type'    => 'checkbox',
			  'active_callback' => 'walkerpress_subheader_tab_general_status',
			)
		);
			$wp_customize->add_setting( 'walkerpress_subheader_background_color', 
				array(
			        'default'        => '#0d1741',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_subheader_background_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Background Color', 'walkerpress' ),
			        'section' => 'walkerpress_sub_header_option',
			        'settings'   => 'walkerpress_subheader_background_color',
			        'active_callback' => 'walkerpress_subheader_tab_style_status',
			    ) ) 
			);
			$wp_customize->add_setting('subheader_bg_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'subheader_bg_image', array(
		    	'label' => '',
		        'description'             => esc_html__('Background Image', 'walkerpress'),
		        'section'           => 'walkerpress_sub_header_option',
		        'settings'          => 'subheader_bg_image',
		        'active_callback' => 'walkerpress_subheader_layout_two_general',
		
		    )));
		$wp_customize->add_setting( 'use_featured_image_as_background_post', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'use_featured_image_as_background_post', 
			array(
			  'label'   => __( 'Use featured image as background image for post', 'walkerpress' ),
			  'section' => 'walkerpress_sub_header_option',
			  'settings' => 'use_featured_image_as_background_post',
			  'type'    => 'checkbox',
			  'active_callback' => 'walkerpress_subheader_layout_two_general',
			)
		);
		$wp_customize->add_setting( 'use_featured_image_as_background_page', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'use_featured_image_as_background_page', 
			array(
			  'label'   => __( 'Use featured image as background image for page', 'walkerpress' ),
			  'section' => 'walkerpress_sub_header_option',
			  'settings' => 'use_featured_image_as_background_page',
			  'type'    => 'checkbox',
			  'active_callback' => 'walkerpress_subheader_layout_two_general',
			)
		);
		$wp_customize->add_setting( 
	        'subheader_text_alignment', 
	        array(
	            'default'           => 'subheader-text-align-left',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'subheader_text_alignment',
				array(
					'section'	  => 'walkerpress_sub_header_option',
					'description'		  => esc_html__( 'Text Alignment', 'walkerpress' ),
					'label' => '',
					'type'        => 'select',
					'active_callback' => 'walkerpress_subheader_tab_style_status',
					'choices'	  => array(
						'subheader-text-align-left'  => esc_html__('Left','walkerpress'),
						'subheader-text-align-center'  => esc_html__('Center','walkerpress'),
						'subheader-text-align-right'  => esc_html__('Right','walkerpress'),
					),
					
				)
			)
		);
		
	$wp_customize->add_setting(
    	'subheader_background_opacity',
    	array(
	        'default'			=> '0.60',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'walkerpress_sanitize_text',
			'priority'  => 11,

		)
	);
	$wp_customize->add_control( 
	new WalkerPress_Customizer_Range_Control( $wp_customize, 'subheader_background_opacity', 
		array(
			'label'      => __( 'Background Opacity', 'walkerpress'),
			'section'  => 'walkerpress_sub_header_option',
			'settings' => 'subheader_background_opacity',
             'input_attrs' => array(
				'min'    => 0,
				'max'    => 1.00,
				'step'   => 0.01,
			),
            'active_callback' => 'walkerpress_subheader_layout_two_style',
		) ) 
	);



		    $wp_customize->add_setting( 'walkerpress_subheader_text_color', 
				array(
			        'default'        => '#ffffff',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_subheader_text_color', 
				array(
					'label' => '',
			        'description'   => esc_html__( 'Text Color', 'walkerpress' ),
			        'section' => 'walkerpress_sub_header_option',
			        'settings'   => 'walkerpress_subheader_text_color',
			        'active_callback' => 'walkerpress_subheader_tab_style_status',
			    ) ) 
			);
			$wp_customize->add_setting(
		    	'walkerpress_sub_header_height',
		    	array(
			        'default'			=> '400',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_sub_header_height', 
				array(
					'label'      => __( 'Section height for single post and page [PX]', 'walkerpress'),
					'section'  => 'walkerpress_sub_header_option',
					'settings' => 'walkerpress_sub_header_height',
		             'input_attrs' => array(
						'min'    => 100,
						'max'    => 1000,
						'step'   => 1,
					),
		            'active_callback' => 'walkerpress_subheader_layout_two_style',
				) ) 
			);

			$wp_customize->add_setting( 'walkerpress_subheader_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walkerpress_subheader_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_sub_header_option',
				'settings' => 'walkerpress_subheader_section_padding_top',
				'label' => esc_html__( 'Section Top Space','walkerpress' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => 'walkerpress_subheader_tab_style_status'
			) 
		);
		$wp_customize->add_setting( 'walkerpress_subheader_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 170,
			) 
		);

		$wp_customize->add_control( 'walkerpress_subheader_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_sub_header_option',
				'settings' => 'walkerpress_subheader_section_padding_bottom',
				'label' => esc_html__( 'Section Bottom Space','walkerpress' ),
				'description' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 300,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => 'walkerpress_subheader_tab_style_status',
			) 
		);
	}

		/*scroll top*/
		$wp_customize->add_section(
	        'walkerpress_scroll_top_icon',
	        array(
	            'title'    => esc_html__( 'Scroll Top Options', 'walkerpress' ),
	            'panel'    => 'walkerpress_theme_option',
	            'priority' => 4,
	        )
	    );
		$wp_customize->add_setting( 'enable_scroll_top_icon', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_scroll_top_icon', 
			array(
			  'label'   => __( 'Enable Scroll Top', 'walkerpress' ),
			  'section' => 'walkerpress_scroll_top_icon',
			  'settings' => 'enable_scroll_top_icon',
			  'type'    => 'checkbox',
			)
		);
		if(walkerpress_set_to_premium() ){
		/*content-width*/
		$wp_customize->add_section(
	        'walkerpress_content_width_options',
	        array(
	            'title'    => esc_html__( 'Content Width', 'walkerpress' ),
	            'panel'    => 'walkerpress_theme_option',
	            'priority' => 4,
	        )
	    );
			$wp_customize->add_setting(
		    	'walkerpress_container_width',
		    	array(
			        'default'			=> '1280',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_container_width', 
				array(
					'label'      => __( 'Main Container Width [PX]', 'walkerpress'),
					'section'  => 'walkerpress_content_width_options',
					'settings' => 'walkerpress_container_width',
		             'input_attrs' => array(
						'min'    => 1100,
						'max'    => 1900,
						'step'   => 1,
					),
				) ) 
			);
			$wp_customize->add_setting(
		    	'walkerpress_sidebar_width',
		    	array(
			        'default'			=> '28',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_sidebar_width', 
				array(
					'label'      => __( 'Sidebar Width [%]', 'walkerpress'),
					'section'  => 'walkerpress_content_width_options',
					'settings' => 'walkerpress_sidebar_width',
		             'input_attrs' => array(
						'min'    => 20,
						'max'    => 35,
						'step'   => 1,
					),
				) ) 
			);
		
		 /*button style*/
		$wp_customize->add_section(
	        'walkerpress_button_options',
	        array(
	            'title'    => esc_html__( 'Button Options', 'walkerpress' ),
	            'panel'    => 'walkerpress_theme_option',
	            'priority' => 4,
	        )
	    );
		$wp_customize->add_setting(
		    	'walkerpress_button_radius',
		    	array(
			        'default'			=> '3',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_button_radius', 
				array(
					'label'      => __( 'Border Radius [px]', 'walkerpress'),
					'section'  => 'walkerpress_button_options',
					'settings' => 'walkerpress_button_radius',
		             'input_attrs' => array(
						'min'    => 1,
						'max'    => 50,
						'step'   => 1,
					),
				) ) 
			);
			$walkerpress_button_text_transform = array(
				'walkerpress-texttransform-initial'  => esc_html__('Initial - Default','walkerpress'),
				'walkerpress-texttransform-uppercase'  => esc_html__('Uppercase','walkerpress'),
				'walkerpress-texttransform-capitalize'  => esc_html__('Capitalize','walkerpress'),
				'walkerpress-texttransform-lowercase'  => esc_html__('Lowercase','walkerpress'),
					
			);

			$wp_customize->add_setting( 
		        'walkerpress_button_text_option', 
		        array(
		            'default'           => 'walkerpress-texttransform-normal',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'walkerpress_button_text_option',
					array(
						'section'	  => 'walkerpress_button_options',
						'label'		  => esc_html__( 'Text Transform', 'walkerpress' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => $walkerpress_button_text_transform,
					)
				)
			);
			$wp_customize->add_setting(
		    	'walkerpress_button_text_size',
		    	array(
			        'default'			=> 14,
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'walkerpress_button_text_size', 
				array(
					'label' => '',
					'description'      => __( 'Font Size', 'walkerpress'),
					'section'  => 'walkerpress_button_options',
					'settings' => 'walkerpress_button_text_size',
		             'input_attrs' => array(
						'min'    => 10,
						'max'    => 20,
						'step'   => 1,
					),
				) ) 
			);
		}
	}
	function walkerpress_subheader_tab_style_status(){
        $choice_tab_style= get_theme_mod( 'walkerpress_subheader_setting_tabs' );
		$tab_style_status = false;
		if($choice_tab_style == 'subheader-setting-tab-style'){
			$tab_style_status = true;
		}
		return $tab_style_status;
    }
    function walkerpress_subheader_tab_general_status(){
        $choice_tab_general= get_theme_mod( 'walkerpress_subheader_setting_tabs' );
		$tab_general_status = false;
		if($choice_tab_general == 'subheader-setting-tab-content'){
			$tab_general_status = true;
		}
		return $tab_general_status;
    }
    function walkerpress_subheader_layout_two_general(){
    	$choice_tab_general= get_theme_mod( 'walkerpress_subheader_setting_tabs' );
    	$current_subheader_layout = get_theme_mod('subheader_layout_option');
    	$layout_one_status = false;
    	if($choice_tab_general =='subheader-setting-tab-content' && $current_subheader_layout =='subheader-layout-2'){
    		$layout_one_status = true;
    	}
    	return $layout_one_status;
    }
    function walkerpress_subheader_layout_two_style(){
    	$choice_tab_general= get_theme_mod( 'walkerpress_subheader_setting_tabs' );
    	$current_subheader_layout = get_theme_mod('subheader_layout_option');
    	$layout_one_status = false;
    	if($choice_tab_general =='subheader-setting-tab-style' && $current_subheader_layout =='subheader-layout-2'){
    		$layout_one_status = true;
    	}
    	return $layout_one_status;
    }
}
add_action( 'customize_register', 'walkerpress_page_options_register' );