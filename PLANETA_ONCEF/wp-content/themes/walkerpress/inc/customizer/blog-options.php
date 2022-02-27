<?php
/**
*Frontpage  customizer options
*
* @package WalkerPress
*
*/
if (! function_exists('walkerpress_blog_options_register')) {
	function walkerpress_blog_options_register( $wp_customize ) {
		$wp_customize->add_section('walkerpress_blog_options', 
		 	array(
		        'title' => esc_html__('Blog', 'walkerpress'),
		        'panel' =>'walkerpress_theme_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );

		/** header layout layout */
	    $wp_customize->add_setting( 
	        'walkerpress_blog_layout', 
	        array(
	            'default'           => 'sidebar-layout-right',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );

	   
    	$focus_news_choices = array(
			'sidebar-layout-right'  => esc_url( get_template_directory_uri() . '/images/dashboard/sidebar-right.png' ),
			'sidebar-layout-none'  => esc_url( get_template_directory_uri() . '/images/dashboard/no-sidebar.png' ),
            'sidebar-layout-left' => esc_url( get_template_directory_uri() . '/images/dashboard/sidebar-left.png' ),
		);

	    
	    $wp_customize->add_control(
			new walkerpress_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkerpress_blog_layout',
				array(
					'section'	  => 'walkerpress_blog_options',
					'label'		  => esc_html__( 'Choose Sidebar Position', 'walkerpress' ),
					'description' => '',
					'choices'	  => $focus_news_choices,
				)
			)
		);

		
	    $wp_customize->add_setting( 
	        'walkerpress_blog_post_view', 
	        array(
	            'default'           => 'post-layout-grid',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );

	    
    	$focus_news_choices = array(
    		'post-layout-grid'  => esc_url( get_template_directory_uri() . '/images/dashboard/post-grid.png' ),
    		'post-layout-list'  => esc_url( get_template_directory_uri() . '/images/dashboard/post-list.png' ),
            'post-layout-full' => esc_url( get_template_directory_uri() . '/images/dashboard/post-big-image.png' ),
		);
	  
	    
	    $wp_customize->add_control(
			new walkerpress_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkerpress_blog_post_view',
				array(
					'section'	  => 'walkerpress_blog_options',
					'label'		  => esc_html__( 'Choose Post View', 'walkerpress' ),
					'description' => '',
					'choices'	  => $focus_news_choices,
				)
			)
		);
	    $wp_customize->add_setting( 'walkerpress_excerpt_more', 
		 	array(
				'capability' => 'edit_theme_options',
				'default' =>'',
				'sanitize_callback' => 'walkerpress_sanitize_text',

			) 
		);
		$wp_customize->add_control( 'walkerpress_excerpt_more', 
			array(
				'type' => 'text',
				'section' => 'walkerpress_blog_options',
				'label' => esc_html__( 'Read More Text','walkerpress' ),
			)
		);
		if(walkerpress_set_to_premium()){
		$walkerpress_blog_pagination_choices = array(
				'walkerpress-default-style'  => esc_html__('Next/Preview - Default','walkerpress'),
				'walkerpress-numeric-style'  => esc_html__('Numeric Style','walkerpress'),
					
			);

			$wp_customize->add_setting( 
		        'walkerpress_pagination_style', 
		        array(
		            'default'           => 'walkerpress-default-style',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		    
		    $wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'walkerpress_pagination_style',
					array(
						'section'	  => 'walkerpress_blog_options',
						'label'		  => esc_html__( 'Choose Pagination Style', 'walkerpress' ),
						'description' => '',
						'type'           => 'select',
						'choices'	  => $walkerpress_blog_pagination_choices,
					)
				)
			);
			$wp_customize->add_setting( 'author_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'author_status', 
				array(
				  'label'   => __( 'Show Author', 'walkerpress' ),
				  'section' => 'walkerpress_blog_options',
				  'settings' => 'author_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'post_date_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'post_date_status', 
				array(
				  'label'   => __( 'Show Date', 'walkerpress' ),
				  'section' => 'walkerpress_blog_options',
				  'settings' => 'post_date_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'category_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'category_status', 
				array(
				  'label'   => __( 'Show Category', 'walkerpress' ),
				  'section' => 'walkerpress_blog_options',
				  'settings' => 'category_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'tags_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'tags_status', 
				array(
				  'label'   => __( 'Show Tags', 'walkerpress' ),
				  'section' => 'walkerpress_blog_options',
				  'settings' => 'tags_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'comment_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'comment_status', 
				array(
				  'label'   => __( 'Show Comment', 'walkerpress' ),
				  'section' => 'walkerpress_blog_options',
				  'settings' => 'comment_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'estimate_reading_time_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'estimate_reading_time_status', 
				array(
				  'label'   => __( 'Show Estimated Reading Time', 'walkerpress' ),
				  'section' => 'walkerpress_blog_options',
				  'settings' => 'estimate_reading_time_status',
				  'type'    => 'checkbox',
				)
			);
		}
		if(walkerpress_set_to_premium()){
			$walkerpress_blog_top_ads_choices = array(
		        'blog-top-ads-type-image'  => esc_html__('Image- Default','walkerpress'),
		        'blog-top-ads-type-widget'  => esc_html__('Widget Content','walkerpress'),
		     );
			$wp_customize->add_setting( 
		        'walkerpress_blog_top_ads_type', 
		        array(
		            'default'           => 'blog-top-ads-type-image',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		        
		    $wp_customize->add_control( new WP_Customize_Control(
		      	$wp_customize,
		      	'walkerpress_blog_top_ads_type',
			      array(
			        'section'   => 'walkerpress_blog_options',
			        'label'     => esc_html__( 'Blog Top Ads Settings', 'walkerpress' ),
			        'description' => esc_html__( 'Choose Ads Type', 'walkerpress' ),
			        'type'           => 'select',
			        'choices'   => $walkerpress_blog_top_ads_choices,
			    )
		    ));
		    $walkerpress_blog_top_ads_info_text = '<span class="widget-ads-info">'.esc_html('- Click on "Publish" to save your settings and go to dashboard > appearance > widgets > Blog/Archive: Top Area Ads. - and add the advertisement content here!','walkerpress').'</span>';
			
		    $wp_customize->add_setting( 'walkerpress_blog_top_ads_info', array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses_post',
	        ) );

	        $wp_customize->add_control( new WalkerPress_Custom_Text_Control( $wp_customize, 'walkerpress_blog_top_ads_info', array(
		        'section' => 'walkerpress_blog_options',
		        'label'   => $walkerpress_blog_top_ads_info_text,
		        'type' => 'walkerpress-custom-text',
		        'active_callback' =>'walkerpress_blog_top_widget_message',
		        
		    ) ) );


			$wp_customize->add_setting('blog_top_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_top_ads_image', array(
		        'label'             => esc_html__('Upload image for top ads', 'walkerpress'),
		        'description'       => esc_html__('Advertisement Image to be shown on top of the blog page', 'walkerpress'),
		        'section'           => 'walkerpress_blog_options',
		        'settings'          => 'blog_top_ads_image',
		        'active_callback'	=> 'walkerpress_blog_top_image_ads'
		    )));
		    $wp_customize->add_setting( 'blog_top_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'blog_top_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Top Advertisement Link', 'walkerpress' ),
	              'section' => 'walkerpress_blog_options',
	              'settings'   => 'blog_top_ads_image_link',
	              'type'     => 'text',
	              'active_callback'	=> 'walkerpress_blog_top_image_ads'
	          )
	        );
	        $walkerpress_blog_bottom_ads_choices = array(
		        'blog-bottom-ads-type-image'  => esc_html__('Image- Default','walkerpress'),
		        'blog-bottom-ads-type-widget'  => esc_html__('Widget Content','walkerpress'),
		     );
			$wp_customize->add_setting( 
		        'walkerpress_blog_bottom_ads_type', 
		        array(
		            'default'           => 'blog-bottom-ads-type-image',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		        
		    $wp_customize->add_control( new WP_Customize_Control(
		      	$wp_customize,
		      	'walkerpress_blog_bottom_ads_type',
			      array(
			        'section'   => 'walkerpress_blog_options',
			        'label'     => esc_html__( 'Blog Bottom Ads Settings', 'walkerpress' ),
			        'description' => esc_html__( 'Choose Ads Type', 'walkerpress' ),
			        'type'           => 'select',
			        'choices'   => $walkerpress_blog_bottom_ads_choices,
			    )
		    ));
		    $walkerpress_blog_bottom_ads_info_text = '<span class="widget-ads-info">'.esc_html('- Click on "Publish" to save your settings and go to dashboard > appearance > widgets > Blog/Archive: Bottom Area Ads. - and add the advertisement content here!','walkerpress').'</span>';
			
		    $wp_customize->add_setting( 'walkerpress_blog_bottom_ads_info', array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses_post',
	        ) );

	        $wp_customize->add_control( new WalkerPress_Custom_Text_Control( $wp_customize, 'walkerpress_blog_bottom_ads_info', array(
		        'section' => 'walkerpress_blog_options',
		        'label'   => $walkerpress_blog_bottom_ads_info_text,
		        'type' => 'walkerpress-custom-text',
		        'active_callback' =>'walkerpress_blog_bottom_widget_message',
		        
		    ) ) );

	        $wp_customize->add_setting('blog_bottom_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_bottom_ads_image', array(
		        'label'             => esc_html__('Bottom Ads: Upload Image', 'walkerpress'),
		        'description'       => esc_html__('Advertisement Image to be shown on bottom of the blog page', 'walkerpress'),
		        'section'           => 'walkerpress_blog_options',
		        'settings'          => 'blog_bottom_ads_image',
		        'active_callback'	=> 'walkerpress_blog_bottom_image_ads'
		    )));
		    $wp_customize->add_setting( 'blog_bottom_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'blog_bottom_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Bottom Advertisement Link', 'walkerpress' ),
	              'section' => 'walkerpress_blog_options',
	              'settings'   => 'blog_bottom_ads_image_link',
	              'type'     => 'text',
	              'active_callback'	=> 'walkerpress_blog_bottom_image_ads'
	          )
	        );
	    }

		/*Single post page*/
		$wp_customize->add_section('walkerpress_single_blog_options', 
		 	array(
		        'title' => esc_html__('Single Blog Page', 'walkerpress'),
		        'panel' =>'walkerpress_theme_option',
		        'priority' => 5,
		        'divider' => 'before',
	    	)
		 );
		$wp_customize->add_setting( 
	        'walkerpress_single_blog_layout', 
	        array(
	            'default'           => 'single-sidebar-layout-right',
	            'sanitize_callback' => 'walkerpress_sanitize_choices'
	        ) 
	    );

	   
    	$single_post_layout = array(
			'single-sidebar-layout-right'  => esc_url( get_template_directory_uri() . '/images/dashboard/sidebar-right.png' ),
			'single-sidebar-layout-none'  => esc_url( get_template_directory_uri() . '/images/dashboard/no-sidebar.png' ),
            'single-sidebar-layout-left' => esc_url( get_template_directory_uri() . '/images/dashboard/sidebar-left.png' ),
		);

	    
	    $wp_customize->add_control(
			new walkerpress_Radio_Image_Control_Horizontal(
				$wp_customize,
				'walkerpress_single_blog_layout',
				array(
					'section'	  => 'walkerpress_single_blog_options',
					'label'		  => esc_html__( 'Choose Sidebar Position', 'walkerpress' ),
					'description' => '',
					'choices'	  => $single_post_layout,
				)
			)
		);
		if(walkerpress_set_to_premium()){
			$wp_customize->add_setting( 'related_post_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'related_post_status', 
				array(
				  'label'   => __( 'Enable Related Post', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'related_post_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_featured_image_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'single_featured_image_status', 
				array(
				  'label'   => __( 'Enable Featured Image', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_featured_image_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_content_title_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );

			$wp_customize->add_control( 'single_content_title_status', 
				array(
				  'label'   => __( 'Enable Post Title', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_content_title_status',
				  'type'    => 'checkbox',
				)
			);
		
			$wp_customize->add_setting( 'single_author_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_author_status', 
				array(
				  'label'   => __( 'Show Author', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_author_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_post_date_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_post_date_status', 
				array(
				  'label'   => __( 'Show Date', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_post_date_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_category_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_category_status', 
				array(
				  'label'   => __( 'Show Category', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_category_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_tags_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_tags_status', 
				array(
				  'label'   => __( 'Show Tags', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_tags_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_postnav_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_postnav_status', 
				array(
				  'label'   => __( 'Show Post Navigation', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_postnav_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_author_box_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_author_box_status', 
				array(
				  'label'   => __( 'Enable Author Box', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_author_box_status',
				  'type'    => 'checkbox',
				)
			);
			$wp_customize->add_setting( 'single_estimate_reading_time_status', 
		    	array(
			      'default'  =>  true,
			      'sanitize_callback' => 'walkerpress_sanitize_checkbox'
			  	)
		    );
			$wp_customize->add_control( 'single_estimate_reading_time_status', 
				array(
				  'label'   => __( 'Show Estimated Reading Time', 'walkerpress' ),
				  'section' => 'walkerpress_single_blog_options',
				  'settings' => 'single_estimate_reading_time_status',
				  'type'    => 'checkbox',
				)
			);
			
		}
		$wp_customize->add_setting( 'single_post_related_post_title',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_text'
	          ) 
	        );
	        $wp_customize->add_control( 'single_post_related_post_title', 
	            array(
	              'label'   => esc_html__( 'Heading for Related Post', 'walkerpress' ),
	              'section' => 'walkerpress_single_blog_options',
	              'settings'   => 'single_post_related_post_title',
	              'type'     => 'text',
	          )
	        );
		if(walkerpress_set_to_premium()){
			$walkerpress_single_top_ads_choices = array(
		        'single-top-ads-type-image'  => esc_html__('Image- Default','walkerpress'),
		        'single-top-ads-type-widget'  => esc_html__('Widget Content','walkerpress'),
		     );
			$wp_customize->add_setting( 
		        'walkerpress_single_top_ads_type', 
		        array(
		            'default'           => 'single-top-ads-type-image',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		        
		    $wp_customize->add_control( new WP_Customize_Control(
		      	$wp_customize,
		      	'walkerpress_single_top_ads_type',
			      array(
			        'section'   => 'walkerpress_single_blog_options',
			        'label'     => esc_html__( 'Single Post Top Ads Settings', 'walkerpress' ),
			        'description' => esc_html__( 'Choose Ads Type', 'walkerpress' ),
			        'type'           => 'select',
			        'choices'   => $walkerpress_single_top_ads_choices,
			    )
		    ));
		    $walkerpress_single_top_ads_info_text = '<span class="widget-ads-info">'.esc_html('- Click on "Publish" to save your settings and go to dashboard > appearance > widgets > Single Post: Top Area Ads. - and add the advertisement content here!','walkerpress').'</span>';
			
		    $wp_customize->add_setting( 'walkerpress_single_top_ads_info', array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses_post',
	        ) );

	        $wp_customize->add_control( new WalkerPress_Custom_Text_Control( $wp_customize, 'walkerpress_single_top_ads_info', array(
		        'section' => 'walkerpress_single_blog_options',
		        'label'   => $walkerpress_single_top_ads_info_text,
		        'type' => 'walkerpress-custom-text',
		        'active_callback' 	=> 'walkerpress_single_top_widget_message'
		        
		    ) ) );

			$wp_customize->add_setting('single_post_top_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_post_top_ads_image', array(
		        'label'             => esc_html__('Upload image for top ads', 'walkerpress'),
		        'description'       => esc_html__('Advertisement Image to be shown ontop of the single post', 'walkerpress'),
		        'section'           => 'walkerpress_single_blog_options',
		        'settings'          => 'single_post_top_ads_image',
		        'active_callback' 	=> 'walkerpress_single_top_image_ads'
		    )));
		    $wp_customize->add_setting( 'single_post_top_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'single_post_top_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Top Advertisement Link', 'walkerpress' ),
	              'section' => 'walkerpress_single_blog_options',
	              'settings'   => 'single_post_top_ads_image_link',
	              'type'     => 'text',
	              'active_callback' 	=> 'walkerpress_single_top_image_ads'
	          )
	        );
	        $walkerpress_single_bottom_ads_choices = array(
		        'single-bottom-ads-type-image'  => esc_html__('Image- Default','walkerpress'),
		        'single-bottom-ads-type-widget'  => esc_html__('Widget Content','walkerpress'),
		     );
			$wp_customize->add_setting( 
		        'walkerpress_single_bottom_ads_type', 
		        array(
		            'default'           => 'single-bottom-ads-type-image',
		            'sanitize_callback' => 'walkerpress_sanitize_choices'
		        ) 
		    );
		        
		    $wp_customize->add_control( new WP_Customize_Control(
		      	$wp_customize,
		      	'walkerpress_single_bottom_ads_type',
			      array(
			        'section'   => 'walkerpress_single_blog_options',
			        'label'     => esc_html__( 'Single Post Bottom Ads Settings', 'walkerpress' ),
			        'description' => esc_html__( 'Choose Ads Type', 'walkerpress' ),
			        'type'           => 'select',
			        'choices'   => $walkerpress_single_bottom_ads_choices,
			    )
		    ));
		    $walkerpress_single_bottom_ads_info_text = '<span class="widget-ads-info">'.esc_html('- Click on "Publish" to save your settings and go to dashboard > appearance > widgets > Single Post: Bottom Area Ads. - and add the advertisement content here!','walkerpress').'</span>';
			
		    $wp_customize->add_setting( 'walkerpress_single_bottom_ads_info', array(
	            'default'           => '',
	            'sanitize_callback' => 'wp_kses_post',
	        ) );

	        $wp_customize->add_control( new WalkerPress_Custom_Text_Control( $wp_customize, 'walkerpress_single_bottom_ads_info', array(
		        'section' => 'walkerpress_single_blog_options',
		        'label'   => $walkerpress_single_bottom_ads_info_text,
		        'type' => 'walkerpress-custom-text',
		        'active_callback' =>'walkerpress_single_bottom_widget_message',
		        
		    ) ) );
	        $wp_customize->add_setting('single_post_bottom_ads_image', array(
		        'transport'         => 'refresh',
		        'sanitize_callback'     =>  'walkerpress_sanitize_file',
		    ));

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'single_post_bottom_ads_image', array(
		        'label'             => esc_html__('Upload image for bottom ads', 'walkerpress'),
		        'description'       => esc_html__('Advertisement Image to be shown on bottom of the single page', 'walkerpress'),
		        'section'           => 'walkerpress_single_blog_options',
		        'settings'          => 'single_post_bottom_ads_image',
		        'active_callback'	=> 'walkerpress_single_bottom_image_ads'
		    )));
		    $wp_customize->add_setting( 'single_post_bottom_ads_image_link',
	          array(
	            'default'        => '',
	            'sanitize_callback' => 'walkerpress_sanitize_url'
	          ) 
	        );
	        $wp_customize->add_control( 'single_post_bottom_ads_image_link', 
	            array(
	              'label'   => esc_html__( 'Bottom Advertisement Link', 'walkerpress' ),
	              'section' => 'walkerpress_single_blog_options',
	              'settings'   => 'single_post_bottom_ads_image_link',
	              'type'     => 'text',
	              'active_callback'	=> 'walkerpress_single_bottom_image_ads'
	          )
	        );
	    }
		
		
	}
	function walkerpress_blog_top_widget_message(){
    	$ads_content_type = get_theme_mod('walkerpress_blog_top_ads_type');
    	$widget_content = false;
    	if($ads_content_type=='blog-top-ads-type-widget'){
    		$widget_content = true;
    	}
    	return $widget_content;
    }
    function walkerpress_blog_top_image_ads(){
    	$ads_content_type = get_theme_mod('walkerpress_blog_top_ads_type');
    	$image_content = false;
    	if($ads_content_type=='blog-top-ads-type-image'){
    		$image_content = true;
    	}
    	return $image_content;
    }
    function walkerpress_blog_bottom_widget_message(){
    	$ads_content_type = get_theme_mod('walkerpress_blog_bottom_ads_type');
    	$widget_content = false;
    	if($ads_content_type=='blog-bottom-ads-type-widget'){
    		$widget_content = true;
    	}
    	return $widget_content;
    }
    function walkerpress_blog_bottom_image_ads(){
    	$ads_content_type = get_theme_mod('walkerpress_blog_bottom_ads_type');
    	$image_content = false;
    	if($ads_content_type=='blog-bottom-ads-type-image'){
    		$image_content = true;
    	}
    	return $image_content;
    }
    function walkerpress_single_top_widget_message(){
    	$ads_content_type = get_theme_mod('walkerpress_single_top_ads_type');
    	$widget_content = false;
    	if($ads_content_type=='single-top-ads-type-widget'){
    		$widget_content = true;
    	}
    	return $widget_content;
    }
    function walkerpress_single_top_image_ads(){
    	$ads_content_type = get_theme_mod('walkerpress_single_top_ads_type');
    	$image_content = false;
    	if($ads_content_type=='single-top-ads-type-image'){
    		$image_content = true;
    	}
    	return $image_content;
    }
    function walkerpress_single_bottom_widget_message(){
    	$ads_content_type = get_theme_mod('walkerpress_single_bottom_ads_type');
    	$widget_content = false;
    	if($ads_content_type=='single-bottom-ads-type-widget'){
    		$widget_content = true;
    	}
    	return $widget_content;
    }
    function walkerpress_single_bottom_image_ads(){
    	$ads_content_type = get_theme_mod('walkerpress_single_bottom_ads_type');
    	$image_content = false;
    	if($ads_content_type=='single-bottom-ads-type-image'){
    		$image_content = true;
    	}
    	return $image_content;
    }
}
add_action( 'customize_register', 'walkerpress_blog_options_register' );