<?php
/**
*Frontpage  customizer options
*
* @package WalkerPress
*
*/
if (! function_exists('walkerpress_frontpage_options_register')) {
	function walkerpress_frontpage_options_register( $wp_customize ) {
		//Focus news
		$wp_customize->add_section('walkerpress_focus_options', 
		 	array(
		        'title' => esc_html__('News Ticker', 'walkerpress'),
		        'panel' =>'walkerpress_frontpage_option',
		        'priority' => 1,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'focus_news_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'focus_news_status', 
			array(
			  'label'   => esc_html__( 'Enable News Ticker', 'walkerpress' ),
			  'section' => 'walkerpress_focus_options',
			  'settings' => 'focus_news_status',
			  'type'    => 'checkbox',
			)
		);
		if(walkerpress_set_to_premium()){
			$focus_news_choices = array(
				'focus-layout-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/focus-1.png' ),
				'focus-layout-two'  => esc_url( get_template_directory_uri() . '/images/dashboard/focus-2.png' ),
					
			);
		}else{
			$focus_news_choices = array(
				'focus-layout-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/focus-1.png' ),
					
			);
		}
		$wp_customize->add_setting( 
	        'walkerpress_focus_layout', 
	        array(
	            'default'           => 'focus-layout-one',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );
	    $wp_customize->add_control(
			new walkerpress_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkerpress_focus_layout',
				array(
					'section'	  => 'walkerpress_focus_options',
					'label'		  => esc_html__( 'Choose Focus News Layout', 'walkerpress' ),
					'description' => '',
					'choices'	  => $focus_news_choices,
					'active_callback' => function(){
							return get_theme_mod( 'focus_news_status', true );
					},
				)
			)
		);
		$wp_customize->add_setting( 'focus_news_ticker_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkerpress_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'focus_news_ticker_heading', 
			array(
				'type' => 'text',
				'section' => 'walkerpress_focus_options',
				'label' => esc_html__( 'Ticker News Heading','walkerpress' ),
				'description' => esc_html__( 'Heading text for display on ticker news section','walkerpress' ),
				'active_callback' =>'walkerpress_check_focus_layout',
			)
		);
		/** header layout layout */

		$wp_customize->add_setting(
		    	'focus_news_items_show',
		    	array(
			        'default'			=> '5',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_text',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'focus_news_items_show', 
				array(
					'label'      => __( 'Total Item To Display', 'walkerpress'),
					'section'  => 'walkerpress_focus_options',
					'settings' => 'focus_news_items_show',
		             'input_attrs' => array(
						'min'    => 5,
						'max'    => 25,
						'step'   => 1,
					),
		            'active_callback' => function(){
							return get_theme_mod( 'focus_news_status', true );
					},
				) ) 
			);

		$wp_customize->add_setting( 
	        'focus_news_post_type', 
	        array(
	            'default'           => 'latest-post',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );
	    
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'focus_news_post_type',
				array(
					'section'	  => 'walkerpress_focus_options',
					'label'		  => esc_html__( 'Choose Post Type', 'walkerpress' ),
					'description' => '',
					'type'           => 'select',
					'choices'	  => array(
						'latest-post'    => esc_html__('Latest Posts','walkerpress'),
						'select-category'  => esc_html__('Select Category','walkerpress'),
					),
					'active_callback' => function(){
							return get_theme_mod( 'focus_news_status', true );
					},
				)
			)
		);

		$wp_customize->add_setting('walkerpress_focus_news_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkerpress_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new walkerpress_Dropdown_Taxonomies_Control($wp_customize, 
			'walkerpress_focus_news_category',
			    array(
			        'label'       => esc_html__('Select Category', 'walkerpress'),
			        'description' => esc_html__('Select category to be shown on home page news ticker section. Recommended minimum 5 and maximum 15', 'walkerpress'),
			        'section'     => 'walkerpress_focus_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkerpress_focus_news_category',
			        'priority'    => 10,
			        'active_callback' => 'walkerpress_current_post_type',
		    	)
			)
		);
		//Featured news
		$wp_customize->add_section('walkerpress_featured_options', 
		 	array(
		        'title' => esc_html__('Banner Section', 'walkerpress'),
		        'panel' =>'walkerpress_frontpage_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'featured_news_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'featured_news_status', 
			array(
			  'label'   => esc_html__( 'Enable Banner Section', 'walkerpress' ),
			  'section' => 'walkerpress_featured_options',
			  'settings' => 'featured_news_status',
			  'type'    => 'checkbox',
			)
		);
		/** featured layout layout */
		if(walkerpress_set_to_premium()){
			$featured_news_choices = array(
				'featured-banner-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-1.png' ),
				'featured-banner-two'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-2.png' ),
				'featured-banner-three'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-3.png' ),
				'featured-banner-four'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-4.png' ),
				'featured-banner-five'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-5.png' ),
				'featured-banner-six'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-6.png' ),
				'featured-banner-seven'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-7.png' ),
				'featured-banner-eight'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-8.png' ),
				'featured-banner-nine'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-9.png' ),
			);
		}else{
			$featured_news_choices = array(
				'featured-banner-one'  => esc_url( get_template_directory_uri() . '/images/dashboard/banner-1.png' )
			);
		}
    	

	    
	    $wp_customize->add_setting( 
	        'walkerpress_featured_layout', 
	        array(
	            'default'           => 'featured-banner-one',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );
	    $wp_customize->add_control(
			new walkerpress_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkerpress_featured_layout',
				array(
					'section'	  => 'walkerpress_featured_options',
					'label'		  => esc_html__( 'Choose Banner Layout', 'walkerpress' ),
					'description' => '',
					'choices'	  => $featured_news_choices,
					'active_callback' => function(){
							return get_theme_mod( 'featured_news_status', true );
					},
				)
			)
		);
		$wp_customize->add_setting('walkerpress_featured_slide_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkerpress_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new walkerpress_Dropdown_Taxonomies_Control($wp_customize, 
			'walkerpress_featured_slide_category',
			    array(
			        'label'       => esc_html__('Select Slide Category', 'walkerpress'),
			        'description' =>'',
			        'section'     => 'walkerpress_featured_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkerpress_featured_slide_category',
			        'priority'    => 10,
			        'active_callback' => function(){
							return get_theme_mod( 'featured_news_status', true );
					},
			        
		    	)
			)
		);
		
		$wp_customize->add_setting(
		    	'featured_slide_items_show',
		    	array(
			        'default'			=> '4',
					'capability'     	=> 'edit_theme_options',
					'sanitize_callback' => 'walkerpress_sanitize_text',
				
				)
			);
			$wp_customize->add_control( 
			new WalkerPress_Customizer_Range_Control( $wp_customize, 'featured_slide_items_show', 
				array(
					'label'      => __( 'Total Item To Display', 'walkerpress'),
					'section'  => 'walkerpress_featured_options',
					'settings' => 'featured_slide_items_show',
		             'input_attrs' => array(
						'min'    => 3,
						'max'    => 15,
						'step'   => 1,
					),
		            'active_callback' => function(){
				    return get_theme_mod( 'featured_news_status', true );
				},
				) ) 
			);

		$wp_customize->add_setting('walkerpress_featured_grid_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkerpress_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new walkerpress_Dropdown_Taxonomies_Control($wp_customize, 
			'walkerpress_featured_grid_category',
			    array(
			        'label'       => esc_html__('Select Grid Category', 'walkerpress'),
			        'description' =>esc_html('Select Cartgory to be shown on right grid of slider in featured section','walkerpress'),
			        'section'     => 'walkerpress_featured_options',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkerpress_featured_grid_category',
			        'priority'    => 10,
			        'active_callback' => 'walkerpress_current_feature_type',
			        
		    	)
			)
		);
		$wp_customize->add_setting( 'latest_post_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkerpress_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'latest_post_heading', 
			array(
				'type' => 'text',
				'section' => 'walkerpress_featured_options',
				'label' => esc_html__( 'Latest Post Heading','walkerpress' ),
				'description' => '',
				'active_callback' => 'walkerpress_first_banner_layout',	
			)
		);
		$wp_customize->add_setting( 'popular_post_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkerpress_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'popular_post_heading', 
			array(
				'type' => 'text',
				'section' => 'walkerpress_featured_options',
				'label' => esc_html__( 'Popular Post Heading','walkerpress' ),
				'description' => '',
				'active_callback' => 'walkerpress_first_banner_layout',	
			)
		);
		
		if(walkerpress_set_to_premium()){
			$wp_customize->add_setting( 
		        'featured_grid_layout_type', 
		        array(
		            'default'           => 'featured-section-layout-box',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'featured_grid_layout_type',
					array(
						'section'	  => 'walkerpress_featured_options',
						'label'		  => esc_html__( 'Featured Container Style', 'walkerpress' ),
						'description' => '',
						'type'        => 'select',
						'settings'	  => 'featured_grid_layout_type',
						'choices'	  => array(
							'featured-section-layout-box'    => esc_html__('Box Layout','walkerpress'),
							'featured-section-layout-full'  => esc_html__('Full width Layout','walkerpress'),
						),
						'active_callback' => 'walkerpress_slider_width_layout',
					)
				)
			);
		}
	    if(walkerpress_set_to_premium()){
		    $wp_customize->add_setting('featured_secton_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_secton_ads_image', array(
		        'label'             => esc_html__('Upload Image', 'walkerpress'),
		        'description'       => esc_html__('Advertisement Image for featured section', 'walkerpress'),
		        'section'           => 'walkerpress_featured_options',
		        'settings'          => 'featured_secton_ads_image',
		        'active_callback' => function(){
				    return get_theme_mod( 'featured_news_status', true );
				},
		    )));
		    
		    $wp_customize->add_setting( 'featured_secton_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'featured_secton_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Advertisement Link', 'walkerpress' ),
	              'section' => 'walkerpress_featured_options',
	              'settings'   => 'featured_secton_ads_image_link',
	              'type'     => 'text',
	              'active_callback' => function(){
				    return get_theme_mod( 'featured_news_status', true );
				},
	          )
	        );
	    }

	    /*featured post sections*/
	    $wp_customize->add_section('walkerpress_featured_posts', 
		 	array(
		        'title' => esc_html__('Featured Posts', 'walkerpress'),
		        'panel' =>'walkerpress_frontpage_option',
		        'priority' => 6,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'featured_posts_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'featured_posts_status', 
			array(
			  'label'   => esc_html__( 'Enable Featured Posts', 'walkerpress' ),
			  'section' => 'walkerpress_featured_posts',
			  'settings' => 'featured_posts_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'featured_post_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkerpress_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'featured_post_heading', 
			array(
				'type' => 'text',
				'section' => 'walkerpress_featured_posts',
				'label' => esc_html__( 'Section Heading','walkerpress' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'featured_posts_status', true );
				},	
			)
		);
		$wp_customize->add_setting('walkerpress_featured_post_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkerpress_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new walkerpress_Dropdown_Taxonomies_Control($wp_customize, 
			'walkerpress_featured_post_category',
			    array(
			        'label'       => esc_html__('Select Category', 'walkerpress'),
			        'description' =>esc_html('Select Cartgory to be shown on featured posts section','walkerpress'),
			        'section'     => 'walkerpress_featured_posts',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkerpress_featured_post_category',
			        'priority'    => 10,
		            'active_callback' => function(){
					    return get_theme_mod( 'featured_posts_status', true );
					},
		    	)
			)
		);
		if(walkerpress_set_to_premium()){
		    $wp_customize->add_setting('featured_post_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_post_ads_image', array(
		        'label'             => esc_html__('Upload Image', 'walkerpress'),
		        'description'       => esc_html__('Advertisement Image for featured post section', 'walkerpress'),
		        'section'           => 'walkerpress_featured_posts',
		        'settings'          => 'featured_post_ads_image',
		        'active_callback' => function(){
				    return get_theme_mod( 'featured_posts_status', true );
				},
		    )));
		    
		    $wp_customize->add_setting( 'featured_post_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'featured_post_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Advertisement Link', 'walkerpress' ),
	              'section' => 'walkerpress_featured_posts',
	              'settings'   => 'featured_post_ads_image_link',
	              'type'     => 'text',
	              'active_callback' => function(){
				    return get_theme_mod( 'featured_posts_status', true );
				},
	          )
	        );
	    }

		/*home category section*/
		$wp_customize->add_section('walkerpress_category_section', 
		 	array(
		        'title' => esc_html__('Category Posts', 'walkerpress'),
		        'panel' =>'walkerpress_frontpage_option',
		        'priority' => 6,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'category_section_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'category_section_status', 
			array(
			  'label'   => esc_html__( 'Enable Category Posts', 'walkerpress' ),
			  'section' => 'walkerpress_category_section',
			  'settings' => 'category_section_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting('walkerpress_category_post_category_1',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkerpress_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new walkerpress_Dropdown_Taxonomies_Control($wp_customize, 
			'walkerpress_category_post_category_1',
			    array(
			        'label'       => esc_html__('Category 1', 'walkerpress'),
			        'description' =>esc_html('Select Cartgory to be shown on homepage category section','walkerpress'),
			        'section'     => 'walkerpress_category_section',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkerpress_category_post_category_1',
			        'priority'    => 10,
		            'active_callback' => function(){
					    return get_theme_mod( 'category_section_status', true );
					},
		    	)
			)
		);
		$wp_customize->add_setting('walkerpress_category_post_category_2',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkerpress_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new walkerpress_Dropdown_Taxonomies_Control($wp_customize, 
			'walkerpress_category_post_category_2',
			    array(
			        'label'       => esc_html__('Category 2', 'walkerpress'),
			        'description' =>esc_html('Select Cartgory to be shown on homepage category section','walkerpress'),
			        'section'     => 'walkerpress_category_section',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkerpress_category_post_category_2',
			        'priority'    => 10,
		            'active_callback' => function(){
					    return get_theme_mod( 'category_section_status', true );
					},
		    	)
			)
		);
		if(walkerpress_set_to_premium()){
		    $wp_customize->add_setting('featured_category_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_category_ads_image', array(
		        'label'             => esc_html__('Upload Image', 'walkerpress'),
		        'description'       => esc_html__('Advertisement Image for featured category post section', 'walkerpress'),
		        'section'           => 'walkerpress_category_section',
		        'settings'          => 'featured_category_ads_image',
		        'active_callback' => function(){
				    return get_theme_mod( 'category_section_status', true );
				},
		    )));
		    
		    $wp_customize->add_setting( 'featured_category_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'featured_category_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Advertisement Link', 'walkerpress' ),
	              'section' => 'walkerpress_category_section',
	              'settings'   => 'featured_category_ads_image_link',
	              'type'     => 'text',
	              'active_callback' => function(){
				    return get_theme_mod( 'category_section_status', true );
				},
	          )
	        );
	    }

		/*missed post sections*/
	    $wp_customize->add_section('walkerpress_missed_posts', 
		 	array(
		        'title' => esc_html__('You May Missing Section', 'walkerpress'),
		        'panel' =>'walkerpress_frontpage_option',
		        'priority' => 6,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 'missed_posts_status', 
	    	array(
		      'default'  =>  false,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'missed_posts_status', 
			array(
			  'label'   => esc_html__( 'Enable you may missed section', 'walkerpress' ),
			  'section' => 'walkerpress_missed_posts',
			  'settings' => 'missed_posts_status',
			  'type'    => 'checkbox',
			)
		);
		$wp_customize->add_setting( 'missing_post_heading', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' => '',
				'sanitize_callback' => 'walkerpress_sanitize_text',
			) 
		);
		$wp_customize->add_control( 'missing_post_heading', 
			array(
				'type' => 'text',
				'section' => 'walkerpress_missed_posts',
				'label' => esc_html__( 'Section Heading','walkerpress' ),
				'description' => '',
				'active_callback' => function(){
				    return get_theme_mod( 'missed_posts_status', true );
				},	
			)
		);
		$wp_customize->add_setting('walkerpress_missed_post_category',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'walkerpress_sanitize_text',
	    )
		);
		$wp_customize->add_control(
			new walkerpress_Dropdown_Taxonomies_Control($wp_customize, 
			'walkerpress_missed_post_category',
			    array(
			        'label'       => esc_html__('Select Category', 'walkerpress'),
			        'description' =>esc_html('Select Cartgory to be shown on you may missing section','walkerpress'),
			        'section'     => 'walkerpress_missed_posts',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'walkerpress_missed_post_category',
			        'priority'    => 10,
		            'active_callback' => function(){
					    return get_theme_mod( 'missed_posts_status', true );
					},
		    	)
			)
		);

		if(walkerpress_set_to_premium()){
		/*home page style*/
		 $wp_customize->add_section('walkerpress_extra_settings', 
		 	array(
		        'title' => esc_html__('Extra Settings', 'walkerpress'),
		        'panel' =>'walkerpress_theme_option',
		        'priority' => 20,
	    	)
		 );

		 $wp_customize->add_setting( 'walkerpress_home_meta_color', 
			array(
		        'default'        => '#b5b5b5',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_home_meta_color', 
			array(
		        'label'   => esc_html__( 'Meta Setting', 'walkerpress' ),
		        'description' => esc_html__( 'Meta Color', 'walkerpress' ),
		        'section' => 'walkerpress_extra_settings',
		        'settings'   => 'walkerpress_home_meta_color',
		        'priority' => 10
		    ) ) 
		);
		$wp_customize->add_setting( 'walkerpress_home_category_color', 
			array(
		        'default'        => '#c70315',
		        'sanitize_callback' => 'walkerpress_sanitize_hex_color',
	    	) 
		);

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
			'walkerpress_home_category_color', 
			array(
		        'label'   => esc_html__('Category Settings','walkerpress'),
		        'description' => esc_html__( 'Category Color', 'walkerpress' ),
		        'section' => 'walkerpress_extra_settings',
		        'settings'   => 'walkerpress_home_category_color',
		        'priority' => 20
		    ) ) 
		);

	$walkerpress_cat_text_transform = array(
        'cat-transform-initial'  => esc_html__('Initial','walkerpress'),
        'cat-transform-uppercase'  => esc_html__('Uppercase','walkerpress'),
        'cat-transform-capitalize'  => esc_html__('Capitalize','walkerpress'),
        'cat-transform-lowercase'  => esc_html__('Lowercase','walkerpress'),
	);
		

    $wp_customize->add_setting( 
        'walkerpress_category_text_transform', 
        array(
            'default'           => 'cat-transform-initial',
            'sanitize_callback' => 'walkerpress_sanitize_choices'
        ) 
    );
        
    $wp_customize->add_control( new WP_Customize_Control(
      	$wp_customize,
      	'walkerpress_category_text_transform',
	      array(
	        'section'   => 'walkerpress_extra_settings',
	        'label'     => '',
	        'description' => esc_html__( 'Text Transform', 'walkerpress' ),
	        'type'           => 'select',
	        'choices'   => $walkerpress_cat_text_transform,
	        'priority' => 20,
	    )
    ));
    $walkerpress_cat_font_weight = array(
        'cat-weight-initial'  => esc_html__('Normal','walkerpress'),
        'cat-weight-light'  => esc_html__('Light','walkerpress'),
        'cat-weight-medium'  => esc_html__('Medium','walkerpress'),
        'cat-weight-bold'  => esc_html__('Bold','walkerpress'),
        'cat-weight-dark'  => esc_html__('Bolder','walkerpress'),
	);
	$wp_customize->add_setting( 
        'walkerpress_category_font_weight', 
        array(
            'default'           => 'cat-weight-initial',
            'sanitize_callback' => 'walkerpress_sanitize_choices'
        ) 
    );
        
    $wp_customize->add_control( new WP_Customize_Control(
      	$wp_customize,
      	'walkerpress_category_font_weight',
	      array(
	        'section'   => 'walkerpress_extra_settings',
	        'label'     => '',
	        'description' => esc_html__( 'Font Weight', 'walkerpress' ),
	        'type'           => 'select',
	        'choices'   => $walkerpress_cat_font_weight,
	        'priority' => 20,
	    )
    ));
	$wp_customize->add_setting( 'home_estimate_reading_time_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'home_estimate_reading_time_status', 
			array(
			  'label'   => __( 'Show Estimated Reading Time on Frontpage', 'walkerpress' ),
			  'section' => 'walkerpress_extra_settings',
			  'settings' => 'home_estimate_reading_time_status',
			  'type'    => 'checkbox',
			  'priority' => 80
			)
		);
		$wp_customize->add_setting( 'home_post_date_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'home_post_date_status', 
			array(
			  'label'   => __( 'Show Post Date On Frontpage', 'walkerpress' ),
			  'section' => 'walkerpress_extra_settings',
			  'settings' => 'home_post_date_status',
			  'type'    => 'checkbox',
			  'priority' => 80
			)
		);
		$wp_customize->add_setting( 'home_post_cat_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'home_post_cat_status', 
			array(
			  'label'   => __( 'Show Category On Frontpage', 'walkerpress' ),
			  'section' => 'walkerpress_extra_settings',
			  'settings' => 'home_post_cat_status',
			  'type'    => 'checkbox',
			  'priority' => 80
			)
		);
		$wp_customize->add_setting( 'home_post_author_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'home_post_author_status', 
			array(
			  'label'   => __( 'Show Author On Frontpage', 'walkerpress' ),
			  'section' => 'walkerpress_extra_settings',
			  'settings' => 'home_post_author_status',
			  'type'    => 'checkbox',
			  'priority' => 80
			)
		);
		$wp_customize->add_setting( 'home_post_comment_status', 
	    	array(
		      'default'  =>  true,
		      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
		  	)
	    );
		$wp_customize->add_control( 'home_post_comment_status', 
			array(
			  'label'   => __( 'Show Comment On Frontpage', 'walkerpress' ),
			  'section' => 'walkerpress_extra_settings',
			  'settings' => 'home_post_comment_status',
			  'type'    => 'checkbox',
			  'priority' => 80
			)
		);
	}

	}
	function walkerpress_current_post_type(){
		$current_blog_status = get_theme_mod( 'focus_news_status');
        $choice_post_type= get_theme_mod( 'focus_news_post_type' );
		$blog_display_type = false;
		if($current_blog_status == true && $choice_post_type == 'select-category'){
			$blog_display_type = true;
		}
		return $blog_display_type;
    }

    function walkerpress_first_banner_layout(){
		$current_banner_sts = get_theme_mod( 'featured_news_status');
        $banner_layout_type= get_theme_mod( 'walkerpress_featured_layout','featured-banner-one' );
		$sidepost_display_type = false;
		if($current_banner_sts == true && $banner_layout_type == 'featured-banner-one'){
			$sidepost_display_type = true;
		}
		return $sidepost_display_type;
    }

    
    function walkerpress_current_feature_type(){
		$current_featured_status = get_theme_mod( 'featured_news_status');
        $featured_layout_type= get_theme_mod( 'walkerpress_featured_layout','featured-banner-one' );
		$featured_display_grid = false;
		if($current_featured_status == true && $featured_layout_type == 'featured-banner-one' || $featured_layout_type == 'featured-banner-two' || $featured_layout_type == 'featured-banner-three' || $featured_layout_type == 'featured-banner-four'){
			$featured_display_grid = true;
		}
		return $featured_display_grid;
    }
    function walkerpress_slider_width_layout(){
		$current_layout_status = get_theme_mod( 'featured_news_status');
        $featured_layout_type= get_theme_mod( 'walkerpress_featured_layout','featured-banner-one' );
		$featured_layout_option = false;
		if($current_layout_status == true && $featured_layout_type == 'featured-banner-two' || $featured_layout_type == 'featured-banner-three' || $featured_layout_type == 'featured-banner-four' || $featured_layout_type == 'featured-banner-five' || $featured_layout_type == 'featured-banner-six' || $featured_layout_type == 'featured-banner-seven'){
			$featured_layout_option = true;
		}
		return $featured_layout_option;
    }
    function walkerpress_check_focus_layout(){
		$current_focus_status = get_theme_mod( 'focus_news_status');
        $choice_focus_type= get_theme_mod( 'walkerpress_focus_layout' );
		$focus_display_status = false;
		if($current_focus_status == true && $choice_focus_type == 'focus-layout-one' || $choice_focus_type == 'focus-layout-two'){
			$focus_display_status = true;
		}
		return $focus_display_status;
    }
}
add_action( 'customize_register', 'walkerpress_frontpage_options_register' );