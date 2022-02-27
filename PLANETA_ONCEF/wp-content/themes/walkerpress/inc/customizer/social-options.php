<?php
/**
*Social Media customizer options
*
* @package WalkerPress
*
*/

if (! function_exists('walkerpress_social_options_register')) {
    function walkerpress_social_options_register( $wp_customize ) {
        // Social media 
        $wp_customize->add_section('walkerpress_social_setup', 
          array(
            'title' => esc_html__('Social Media', 'walkerpress'),
            'panel' => 'walkerpress_theme_option',
            'priority' => 6
          )
        );

      $wp_customize->add_setting( 
          'walkerpress_social_setting_tabs', 
          array(
              'default'           => 'social-setting-tab-content',
              'sanitize_callback' => 'walkerpress_sanitize_choices'
          ) 
      );

      $social_media_tabs = array(
      'social-setting-tab-content'  => esc_html__('General','walkerpress'),
      'social-setting-tab-style'  => esc_html__('Style','walkerpress'),
  
    );
      
      $wp_customize->add_control( 'walkerpress_social_setting_tabs',
        array(
          'type' => 'radio',
          'section'   => 'walkerpress_social_setup',
          'label'     => '',
          'description' => '',
          'choices'   => $social_media_tabs,
          'priority' => 1,
        )
    );
      if(walkerpress_set_to_premium()){
        $walkerpress_social_icon_style_choice = array(
          'walkerpress-social-style-boxed'  => esc_html__('Boxed Layout - Default','walkerpress'),
          'walkerpress-social-style-normal'  => esc_html__('Normal Layout','walkerpress'),
        );
        $wp_customize->add_setting( 
              'walkerpress_social_icon_style', 
              array(
                  'default'           => 'walkerpress-social-style-boxed',
                  'sanitize_callback' => 'walkerpress_sanitize_choices'
              ) 
          );
          
          $wp_customize->add_control(
          new WP_Customize_Control(
            $wp_customize,
            'walkerpress_social_icon_style',
            array(
              'section'   => 'walkerpress_social_setup',
              'label'     => esc_html__( 'Icon Style', 'walkerpress' ),
              'description' => '',
              'type'           => 'select',
              'choices'   => $walkerpress_social_icon_style_choice,
              'priority' => 1,
              'active_callback' => 'walkerpress_social_style_tabs',
            )
          )
        );

        $walkerpress_social_icon_color_choice = array(
          'walkerpress-social-brand-color'  => esc_html__('Brand Color - Default','walkerpress'),
          'walkerpress-social-custom-color'  => esc_html__('Custom Color','walkerpress'),
        );

        $wp_customize->add_setting( 
              'walkerpress_social_icon_color', 
              array(
                  'default'           => 'walkerpress-social-brand-color',
                  'sanitize_callback' => 'walkerpress_sanitize_choices'
              ) 
          );
          
          $wp_customize->add_control(
          new WP_Customize_Control(
            $wp_customize,
            'walkerpress_social_icon_color',
            array(
              'section'   => 'walkerpress_social_setup',
              'label'     => esc_html__( 'Icon Color', 'walkerpress' ),
              'description' => '',
              'type'           => 'select',
              'choices'   => $walkerpress_social_icon_color_choice,
              'priority' => 1,
               'active_callback' => 'walkerpress_social_style_tabs',
            )
          )
        );
        $wp_customize->add_setting( 'walkerpress_social_icons_color', 
          array(
                'default'        => '#ffffff',
                'sanitize_callback' => 'walkerpress_sanitize_hex_color',
            ) 
        );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
          'walkerpress_social_icons_color', 
          array(
                'label' => esc_html__('Normal Style','walkerpress'),
                'description'   => esc_html__( 'Icon Color', 'walkerpress' ),
                'section' => 'walkerpress_social_setup',
                'settings'   => 'walkerpress_social_icons_color',
                'priority' => 1,
                'active_callback' => 'walkerpress_icons_custom_color'
            ) ) 
        );
        $wp_customize->add_setting( 'walkerpress_social_icons_bg_color', 
          array(
                'default'        => '#222222',
                'sanitize_callback' => 'walkerpress_sanitize_hex_color',
            ) 
        );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
          'walkerpress_social_icons_bg_color', 
          array(
                'label' => '',
                'description'   => esc_html__( 'Background Color', 'walkerpress' ),
                'section' => 'walkerpress_social_setup',
                'settings'   => 'walkerpress_social_icons_bg_color',
                'priority' => 1,
                'active_callback' => 'walkerpress_icons_custom_color_boxed'
            ) ) 
        );
        $wp_customize->add_setting( 'walkerpress_social_icons_hover_color', 
          array(
                'default'        => '#ea1c0e',
                'sanitize_callback' => 'walkerpress_sanitize_hex_color',
            ) 
        );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
          'walkerpress_social_icons_hover_color', 
          array(
               'label' => esc_html__('Hover Style','walkerpress'),
                'description'   => esc_html__( 'Icon Color', 'walkerpress' ),
                'section' => 'walkerpress_social_setup',
                'settings'   => 'walkerpress_social_icons_hover_color',
                'priority' => 1,
                'active_callback' => 'walkerpress_icons_custom_color'
            ) ) 
        );
        
        $wp_customize->add_setting( 'walkerpress_social_icons_bg_hover_color', 
          array(
                'default'        => '#ffffff',
                'sanitize_callback' => 'walkerpress_sanitize_hex_color',
            ) 
        );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
          'walkerpress_social_icons_bg_hover_color', 
          array(
                'label' => '',
                'description'   => esc_html__( 'Background Color', 'walkerpress' ),
                'section' => 'walkerpress_social_setup',
                'settings'   => 'walkerpress_social_icons_bg_hover_color',
                'priority' => 1,
                'active_callback' => 'walkerpress_icons_custom_color_boxed'
            ) ) 
        );
        
      }
      $walkerpress_social_media_info_text = '<span class="widget-ads-info">'.esc_html('Social Media Layouts and Style only Available for Premium Version','walkerpress').'</span>';
    $wp_customize->add_setting( 'walkerpress_social_media_info', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ) );

        $wp_customize->add_control( new WalkerPress_Custom_Text_Control( $wp_customize, 'walkerpress_social_media_info', array(
          'section' => 'walkerpress_social_setup',
          'label'   => $walkerpress_social_media_info_text,
          'type' => 'walkerpress-custom-text',
          'active_callback' =>'walkerpress_social_style_tabs',
          'priority' => 1,
      ) ) );
      
        //Facebook Link
        $wp_customize->add_setting( 'walkerpress_facebook',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_facebook', 
            array(
              'label'   => esc_html__( 'Facebook', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_facebook',
              'type'     => 'text',
              'priority' => 1,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        $wp_customize->selective_refresh->add_partial( 'walkerpress_facebook', array(
            'selector' => '.walkerpress-top-header ul.walkerpress-social',
        ) );
        //Twitter Link
        $wp_customize->add_setting( 'walkerpress_twitter',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_twitter', 
            array(
              'label'   => esc_html__( 'Twitter', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_twitter',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        $wp_customize->selective_refresh->add_partial( 'walkerpress_twitter', array(
            'selector' => '.walkerpress-top-header ul.walkerpress-social',
        ) );
        //Youtube Link
        $wp_customize->add_setting( 'walkerpress_youtube',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_youtube', 
            array(
              'label'   => esc_html__( 'Youtube', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_youtube',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        //Instagram
        $wp_customize->add_setting( 'walkerpress_instagram',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_instagram', 
            array(
              'label'   => esc_html__( 'Instagram', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_instagram',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        //Linkedin
        $wp_customize->add_setting( 'walkerpress_linkedin',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_linkedin', 
            array(
              'label'   => esc_html__( 'Linkedin', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_linkedin',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        //Google
        $wp_customize->add_setting( 'walkerpress_google',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_google', 
            array(
              'label'   => esc_html__( 'Google Business', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_google',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'walkerpress_pinterest',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_pinterest', 
            array(
              'label'   => esc_html__( 'Pinterest', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_pinterest',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        //Pinterest
        $wp_customize->add_setting( 'walkerpress_vk',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_vk', 
            array(
              'label'   => esc_html__( 'VK', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_vk',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        //yelp
        $wp_customize->add_setting( 'walkerpress_yelp',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_yelp', 
            array(
              'label'   => esc_html__( 'Yelp', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_yelp',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        $wp_customize->add_setting( 'walkerpress_git',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_git', 
            array(
              'label'   => esc_html__( 'Github', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_git',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        $wp_customize->add_setting( 'walkerpress_dribbble',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_dribbble', 
            array(
              'label'   => esc_html__( 'Dribbble', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_dribbble',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        $wp_customize->add_setting( 'walkerpress_reddit',
          array(
            'default'        => '',
            'sanitize_callback' => 'walkerpress_sanitize_url'
          ) 
        );
        $wp_customize->add_control( 'walkerpress_reddit', 
            array(
              'label'   => esc_html__( 'Reddit', 'walkerpress' ),
              'section' => 'walkerpress_social_setup',
              'settings'   => 'walkerpress_reddit',
              'type'     => 'text',
              'priority' => 2,
              'active_callback' => 'walkerpress_social_content_tabs'
          )
        );
        
    }
    function walkerpress_icons_custom_color(){
        $current_icon_colors_option = get_theme_mod( 'walkerpress_social_icon_color');
        $social_tabs_style = get_theme_mod( 'walkerpress_social_setting_tabs');
        $icos_color_type = false;
        if($current_icon_colors_option == 'walkerpress-social-custom-color' && $social_tabs_style == 'social-setting-tab-style'){
          $icos_color_type = true;
        }
        return $icos_color_type;
    }

    function walkerpress_icons_custom_color_boxed(){
        $current_icon_colors_choice = get_theme_mod( 'walkerpress_social_icon_color');
        $social_tabs_style = get_theme_mod( 'walkerpress_social_setting_tabs');
        $currnet_icon_layout = get_theme_mod('walkerpress_social_icon_style');
        $custom_color_style_boxed = false;
        if($current_icon_colors_choice == 'walkerpress-social-custom-color' && $currnet_icon_layout=='walkerpress-social-style-boxed' && $social_tabs_style == 'social-setting-tab-style'){
          $custom_color_style_boxed = true;
        }
        return $custom_color_style_boxed;
    }

    function walkerpress_social_style_tabs(){
        $social_tabs_style = get_theme_mod( 'walkerpress_social_setting_tabs');
        $tabs_style = false;
        if($social_tabs_style == 'social-setting-tab-style'){
          $tabs_style = true;
        }
        return $tabs_style;
    }

    function walkerpress_social_content_tabs(){
        $social_tabs_content = get_theme_mod( 'walkerpress_social_setting_tabs');
        $content_tab_status = false;
        if($social_tabs_content == 'social-setting-tab-content'){
          $content_tab_status = true;
        }
        return $content_tab_status;
    }



}
add_action( 'customize_register', 'walkerpress_social_options_register' );