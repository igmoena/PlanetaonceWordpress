<?php
/**
*Frontpage  customizer options
*
* @package WalkerPress
*
*/
if (! function_exists('walkerpress_header_options_register')) {
	function walkerpress_header_options_register( $wp_customize ) {
		//header

		$wp_customize->add_section('walkerpress_header_options', 
		 	array(
		        'title' => esc_html__('Header', 'walkerpress'),
		        'panel' =>'walkerpress_theme_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 
		          'walkerpress_header_setting_tabs', 
		          array(
		              'default'           => 'header-setting-tab-content',
		              'sanitize_callback' => 'walkerpress_sanitize_choices'
		          ) 
		      );

		      $header_settings_tabs = array(
		      'header-setting-tab-content'  => esc_html__('General','walkerpress'),
		      'header-setting-tab-style'  => esc_html__('Style','walkerpress'),
		  
		    );
		      
		      $wp_customize->add_control( 'walkerpress_header_setting_tabs',
		        array(
		          'type' => 'radio',
		          'section'   => 'walkerpress_header_options',
		          'label'     => '',
		          'description' => '',
		          'choices'   => $header_settings_tabs,
		          'priority' => 1,
		        )
		    );
		$wp_customize->add_setting( 'enable_stikcy_header', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'enable_stikcy_header', 
			array(
			  'label'   => esc_html__( 'Enable Sticky Header', 'walkerpress' ),
			  'section' => 'walkerpress_header_options',
			  'settings' => 'enable_stikcy_header',
			  'type'    => 'checkbox',
			  'priority' => 1,
			  'active_callback' => 'walkerpress_tab_general_status'
			)
			
		);
		$wp_customize->add_setting( 'current_date_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'current_date_status', 
			array(
			  'label'   => esc_html__( 'Enable current date', 'walkerpress' ),
			  'section' => 'walkerpress_header_options',
			  'settings' => 'current_date_status',
			  'type'    => 'checkbox',
			  'priority' => 1,
			  'active_callback' => 'walkerpress_tab_general_status'
			)
			
		);
		$wp_customize->add_setting( 'header_social_icons_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'header_social_icons_status', 
			array(
			  'label'   => esc_html__( 'Enable Social Icons', 'walkerpress' ),
			  'section' => 'walkerpress_header_options',
			  'settings' => 'header_social_icons_status',
			  'type'    => 'checkbox',
			  'priority' => 2,
			  'active_callback' => 'walkerpress_tab_general_status'
			)
		);

		$wp_customize->add_setting( 'search_icon_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'search_icon_status', 
			array(
			  'label'   => esc_html__( 'Show Search Icon in Header', 'walkerpress' ),
			  'section' => 'walkerpress_header_options',
			  'settings' => 'search_icon_status',
			  'type'    => 'checkbox',
			  'priority' => 3,
			  'active_callback' => 'walkerpress_tab_general_status'
			)
		);
		if(walkerpress_set_to_premium()){
			$wp_customize->add_setting( 'sidebar_panel_status', 
		    	array(
			      'default'  =>  false,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'sidebar_panel_status', 
				array(
				  'label'   => esc_html__( 'Enable Sidebar Panel Feature', 'walkerpress' ),
				  'section' => 'walkerpress_header_options',
				  'settings' => 'sidebar_panel_status',
				  'type'    => 'checkbox',
				  'priority' => 3,
				  'active_callback' => 'walkerpress_tab_general_status'
				)
			);
		}
		$wp_customize->add_setting('header_background_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walkerpress_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_background_image', array(
	        'label'             => esc_html__('Background Image', 'walkerpress'),
	        'description' => esc_html__('Recomended Size for Background Image- 1920x250 pixel','walkerpress'),
	        'section'           => 'walkerpress_header_options',
	        'settings'          => 'header_background_image',
	        'priority' => 3,
	        'active_callback' => 'walkerpress_tab_style_status'
	    )));
		$wp_customize->add_setting( 'walkerpress_heaer_bg_color', 
				array(
			        'default'        => '#313131',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_heaer_bg_color', 
				array(
			        'label'   => esc_html__( 'Background Color', 'walkerpress' ),
			        'section' => 'walkerpress_header_options',
			        'settings'   => 'walkerpress_heaer_bg_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_tab_style_status',
			    ) ) 
			);
			

			
	$wp_customize->add_setting(
    	'header_bg_opacity',
    	array(
	        'default'			=> '0.60',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'walkerpress_sanitize_text',
			'priority'  => 11,
		)
	);
	$wp_customize->add_control( 
	new WalkerPress_Customizer_Range_Control( $wp_customize, 'header_bg_opacity', 
		array(
			'label'      => __( 'Background Opacity', 'walkerpress'),
			'section'  => 'walkerpress_header_options',
			'settings' => 'header_bg_opacity',
             'input_attrs' => array(
				'min'    => 0,
				'max'    => 1.00,
				'step'   => 0.01,
			),
            'priority' => 4,
            'active_callback' => 'walkerpress_tab_style_status',
		) ) 
	);
			$wp_customize->add_setting( 'walkerpress_header_text_color', 
				array(
			        'default'        => '#000000',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_header_text_color', 
				array(
			        'label'   => esc_html__( 'Text Color', 'walkerpress' ),
			        'section' => 'walkerpress_header_options',
			        'settings'   => 'walkerpress_header_text_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_tab_style_status',
			    ) ) 
			);
			$wp_customize->add_setting( 'walkerpress_header_site_name_color', 
				array(
			        'default'        => '#c70315',
			        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
		    	) 
			);

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
				'walkerpress_header_site_name_color', 
				array(
			        'label'   => esc_html__( 'Site Name color', 'walkerpress' ),
			        'section' => 'walkerpress_header_options',
			        'settings'   => 'walkerpress_header_site_name_color',
			        'priority' => 4,
			        'active_callback' => 'walkerpress_tab_style_status',
			    ) ) 
			);

		/** header layout layout */
	    $wp_customize->add_setting( 
	        'walkerpress_header_layout', 
	        array(
	            'default'           => 'header-layout-1',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );
	    if(walkerpress_set_to_premium()){
		   	$header_layout_choices = array(
				'header-layout-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-1.png' ),
				'header-layout-2'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-2.png' ),
				'header-layout-3'=> esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-3.png' ),
				'header-layout-4'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-4.png' ),
			);
		}else{
			$header_layout_choices = array(
				'header-layout-1'  => esc_url( get_template_directory_uri() . '/images/dashboard/header-layout-1.png' ),
				
			);
		}
	    
	    $wp_customize->add_control(
			new walkerpress_Radio_Image_Control_Vertical(
				$wp_customize,
				'walkerpress_header_layout',
				array(
					'section'	  => 'walkerpress_header_options',
					'label'		  => esc_html__( 'Choose Layout', 'walkerpress' ),
					'description' => '',
					'choices'	  => $header_layout_choices,
					'priority' => 4,
					'active_callback' => 'walkerpress_tab_general_status'
				)
			)
		);
		/*header ads setting*/
		if(walkerpress_set_to_premium()){
			$walkerpress_header_ads_choices = array(
		        'header-ads-type-image'  => esc_html__('Image- Default','walkerpress'),
		        'header-ads-type-widget'  => esc_html__('Widget Content','walkerpress'),
		     );
		}else{
			$walkerpress_header_ads_choices = array(
		        'header-ads-type-image'  => esc_html__('Image- Default','walkerpress'),
		    );
		}
		if(walkerpress_set_to_premium()){
			$walkerpress_header_ads_position_choices = array(
		        'header-ads-below-brand'  => esc_html__('Below Branding','walkerpress'),
		        'header-ads-above-brand'  => esc_html__('Above Branding','walkerpress'),
		    );
		}else{
			$walkerpress_header_ads_position_choices = array(
		        'header-ads-below-brand'  => esc_html__('Below Branding','walkerpress'),
		    );
		}

    $wp_customize->add_setting( 
        'walkerpress_heaer_ads_type', 
        array(
            'default'           => 'header-ads-type-image',
            'sanitize_callback' => 'walkerpress_sanitize_choices'
        ) 
    );
        
    $wp_customize->add_control( new WP_Customize_Control(
      	$wp_customize,
      	'walkerpress_heaer_ads_type',
	      array(
	        'section'   => 'walkerpress_header_options',
	        'label'     => esc_html__( 'Header Ads Settings', 'walkerpress' ),
	        'description' => esc_html__( 'Choose Ads Type', 'walkerpress' ),
	        'type'           => 'select',
	        'choices'   => $walkerpress_header_ads_choices,
	        'priority' => 5,
	        'active_callback' => 'walkerpress_tab_general_status'
	    )
    ));
    $walkerpress_header_ads_info_text = '<span class="widget-ads-info">'.esc_html('- Click on "Publish" to save your settings and go to dashboard > appearance > widgets > Header Ads. area - and add the advertisement content here!','walkerpress').'</span>';
    $wp_customize->add_setting( 'walkerpress_header_ads_info', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ) );

        $wp_customize->add_control( new WalkerPress_Custom_Text_Control( $wp_customize, 'walkerpress_header_ads_info', array(
	        'section' => 'walkerpress_header_options',
	        'label'   => $walkerpress_header_ads_info_text,
	        'type' => 'walkerpress-custom-text',
	        'active_callback' =>'walkerpress_widget_message',
	        'priority' => 5,
	    ) ) );
    $wp_customize->add_setting( 
        'walkerpress_heaer_ads_postion', 
        array(
            'default'           => 'header-ads-below-brand',
            'sanitize_callback' => 'walkerpress_sanitize_choices'
        ) 
    );
        
    $wp_customize->add_control( new WP_Customize_Control(
      	$wp_customize,
      	'walkerpress_heaer_ads_postion',
	      array(
	        'section'   => 'walkerpress_header_options',
	        'label'     => esc_html__( 'Header Ads Position', 'walkerpress' ),
	        'description' => '',
	        'type'           => 'select',
	        'choices'   => $walkerpress_header_ads_position_choices,
	        'priority' => 5,
	        'active_callback' => 'walkerpress_header_ads_position'
	    )
    ));

		$wp_customize->add_setting('header_ads_image', array(
	        'transport'         => 'refresh',
	        'sanitize_callback'     =>  'walkerpress_sanitize_file',
	    ));

	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_ads_image', array(
	    	'label' => '',
	        'description'             => esc_html__('Upload Ads. Image', 'walkerpress'),
	        'section'           => 'walkerpress_header_options',
	        'settings'          => 'header_ads_image',
	        'active_callback'   => 'walkerpress_current_header_layout',
	        'priority' => 5,
	        'active_callback' => 'walkerpress_image_ads_upolaod'
	    )));
	    $wp_customize->add_setting( 'header_ads_image_link',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'header_ads_image_link', 
            array(
	            'label' => '',
	            'description'   => esc_html__( 'Advertisement Link', 'walkerpress' ),
	            'section' => 'walkerpress_header_options',
	            'settings'   => 'header_ads_image_link',
	            'type'     => 'text',
	            'priority' => 6,
	            'active_callback' => 'walkerpress_image_ads_upolaod'
          )
        );
        $wp_customize->add_setting( 'walkerpress_header_section_padding_top', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walkerpress_header_section_padding_top', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_header_options',
				'settings' => 'walkerpress_header_section_padding_top',
				'label' => '',
				'description' => esc_html__( 'Section Top Space','walkerpress' ),
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => 'walkerpress_tab_style_status' 
			) 
		);
		$wp_customize->add_setting( 'walkerpress_header_section_padding_bottom', 
			array(
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'walkerpress_sanitize_number_absint',
				'default' => 50,
			) 
		);

		$wp_customize->add_control( 'walkerpress_header_section_padding_bottom', 
			array(
				'type' => 'number',
				'section' => 'walkerpress_header_options',
				'settings' => 'walkerpress_header_section_padding_bottom',
				'description' => esc_html__( 'Section Bottom Space','walkerpress' ),
				'label' => '',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 200,
			        'step'  => 1,
			    ),
			    'priority' => 50,
			    'active_callback' => 'walkerpress_tab_style_status' 
			) 
		);
		
	}
	function walkerpress_current_header_layout(){
        $header_choice_type= get_theme_mod( 'walkerpress_header_layout' );
		$header_ads_display_status = false;
		if($header_choice_type == 'header-layout-1' || $header_choice_type == 'header-layout-2'){
			$header_ads_display_status = true;
		}
		return $header_ads_display_status;
    }
    function walkerpress_tab_style_status(){
        $choice_tab_style= get_theme_mod( 'walkerpress_header_setting_tabs' );
		$tab_style_status = false;
		if($choice_tab_style == 'header-setting-tab-style'){
			$tab_style_status = true;
		}
		return $tab_style_status;
    }
    function walkerpress_tab_general_status(){
        $choice_tab_general= get_theme_mod( 'walkerpress_header_setting_tabs' );
		$tab_general_status = false;
		if($choice_tab_general == 'header-setting-tab-content'){
			$tab_general_status = true;
		}
		return $tab_general_status;
    }
    function walkerpress_widget_message(){
    	$choice_tab_general= get_theme_mod( 'walkerpress_header_setting_tabs' );
    	$ads_content_type = get_theme_mod('walkerpress_heaer_ads_type');
    	$widget_contnt = false;
    	if($choice_tab_general =='header-setting-tab-content' && $ads_content_type=='header-ads-type-widget'){
    		$widget_contnt = true;
    	}
    	return $widget_contnt;
    }
    function walkerpress_image_ads_upolaod(){
    	$choice_tab_general= get_theme_mod( 'walkerpress_header_setting_tabs' );
    	$ads_content_type = get_theme_mod('walkerpress_heaer_ads_type');
    	$image_contnt = false;
    	if($choice_tab_general =='header-setting-tab-content' && $ads_content_type=='header-ads-type-image'){
    		$image_contnt = true;
    	}
    	return $image_contnt;
    }
     function walkerpress_header_ads_position(){
    	$choice_tab_general= get_theme_mod( 'walkerpress_header_setting_tabs' );
    	$header_choice = get_theme_mod('walkerpress_header_layout');
    	$position_field_status = false;
    	if($choice_tab_general =='header-setting-tab-content' && $header_choice=='header-layout-2' || $choice_tab_general =='header-setting-tab-content' && $header_choice=='header-layout-3'){
    		$position_field_status = true;
    	}
    	return $position_field_status;
    }
}
add_action( 'customize_register', 'walkerpress_header_options_register' );