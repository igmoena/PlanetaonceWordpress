<?php
/**
*Promotion customizer options
*
* @package gridchamp
*
*/

if (! function_exists('walkerpress_themeinfo_options_register')) {
	function walkerpress_themeinfo_options_register( $wp_customize ) {
		if(!walkerpress_set_to_premium()){
			require get_template_directory() . '/inc/custom-controls/upgrade-control.php';
			$wp_customize->register_section_type( 'WalkerPress_Customize_Section_Ugrade' );
			$wp_customize->add_section('walkerpress_info_section', 
			 	array(
			        'title' => esc_html__('Upgrade To Pro', 'walkerpress'),
			        'priority' => 1,
		
		    	)
			 );

			
            $wp_customize->add_setting( 'walkerpress_info_message_text', 
                array(
                   'sanitize_callback' => 'sanitize_text_field',
                ) 
            );

        $wp_customize->add_control( new Walkerpress_Custom_Text_Control( $wp_customize, 'walkerpress_info_message_text', 
            array(
                'label' => esc_html__( 'Upgrade to premium version to unlock more premium features:', 'walkerpress' ),
                'section' => 'walkerpress_info_section',
                'settings' => 'walkerpress_info_message_text',
                'description' => '',
                'type' => 'walkerpress-custom-text',
                
            ) )
        );
        $walkerpress_info = '';
	    $walkerpress_info.='<ul classs="features-list"><li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('4 Header Layout','walkerpress').'</li>';
	    $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('9 Slider/banner Layout','walkerpress').'</li>';
	    $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('8 Custom Widgets','walkerpress').'</li>';
	    $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Dynamic Sidebar for Homepage content section and their individual sidebar section','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Multiple Footer Layout with Color Scheme Option','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Multiple Layout for inner page Title','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Advance Color option for theme','walkerpress').'</li>';
	    $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Post Meta Control for Archive & Single blog Seperately','walkerpress').'</li>';
	    $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Advertisement section enable for each section and posts','walkerpress').'</li>';
	    $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Related Post Enable/disable option','walkerpress').'</li>';
	    $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Sidebar Panel for Secondary Menu or content','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Button Setting Option','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Menu Color Setting Option','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Topbar color Setting Option','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Social media multiple Layout and color option','walkerpress').'</li>';
        $walkerpress_info.='<li class="walkerpress-info-row list"><label class="row-element">'.esc_html__('Content Width Option and More...','walkerpress').'</li></ul>';
	    $walkerpress_info .= '<span class="walkerpress-info-row"><label class="row-element"> </label><a class="button walkerpress-pro-button" href="' . esc_url( 'https://walkerwp.com/pricing-plans/' ) . '" target="_blank">' . esc_html__( 'Ugrade to Pro', 'walkerpress' ) . '</a></span>';
	    $walkerpress_info .= '<span class="walkepress-info-row"><label class="row-element"> </label><a class="button walkerpress-pro-button theme-info" href="' . esc_url( 'https://walkerwp.com/walkerpress/' ) . '" target="_blank">' . esc_html__( 'More Features', 'walkerpress' ) . '</a></span>';
        
	    



        $wp_customize->add_setting( 'walkerpress_upsell_info', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ) );

        $wp_customize->add_control( new Walkerpress_Custom_Text_Control( $wp_customize, 'walkerpress_upsell_info', array(
	        'section' => 'walkerpress_info_section',
	        'label'   => $walkerpress_info,
	        'type' => 'walkerpress-custom-text',
	    ) ) );


	    $front_page_upsell_description= '';
	    
        $front_page_upsell_description .= '<ul class="upsell-features"> <li>'.esc_html('Dynamic Sidebar for Homepage content section and their individual sidebar for each section','walkerpress').'</li><li>'.esc_html('8 More Banner Layout','walkerpress').'</li><li>'.esc_html('6 More Custom Widgets','walkerpress').'</li><li>'.esc_html('Advertisement Section for each home section','walkerpress').'</li><li>'.esc_html('Single Category Custom Widget with 8 seperate Layout','walkerpress').'</li><li>'.esc_html('Double Category Custom Widget with 6 seperate Layout','walkerpress').'</li><li>'.esc_html('Three Category Custom Widget with 6 seperate Layout','walkerpress').'</li><li>'.esc_html('Social Media Icon Custom Widget','walkerpress').'</li><li>'.esc_html('Popular Post Custom Widget','walkerpress').'</li><li>'.esc_html('Newsletter Custom Widget','walkerpress').'</li></ul>';
        $front_page_upsell_description .= '<span class="walkerpress-info-row"><label class="row-element"> </label><a class="button walkerpress-pro-button" href="' . esc_url( 'https://walkerwp.com/pricing-plans/' ) . '" target="_blank">' . esc_html__( 'Ugrade to Pro', 'walkerpress' ) . '</a></span>';
        $front_page_upsell_description .= '<span class="walkerpress-info-row"><label class="row-element"> </label><a class="button walkerpress-pro-button theme-info" href="' . esc_url( 'https://walkerwp.com/walkerpress/' ) . '" target="_blank">' . esc_html__( 'More Featrues', 'walkerpress' ) . '</a></span>';

        $wp_customize->add_section(
            new WalkerPress_Customize_Section_Ugrade(
                $wp_customize,
                'walkerpress_upsell_features_notices',
                array(
                    'title'    => esc_html__('Upgrade To Premium Version to unlock more features, Premium Features of Homepage:','walkerpress'),
                    'description' => $front_page_upsell_description,
                    'priority'  => 40,
                    'panel' => 'walkerpress_frontpage_option',

                )
            )
        );

        $general_setting_upsell_message='';
        $general_setting_upsell_message .= '<ul class="upsell-features"> <li>'.esc_html('Multiple Header Option','walkerpress').'</li><li>'.esc_html('Page Option','walkerpress').'</li><li>'.esc_html('Container Width Option','walkerpress').'</li><li>'.esc_html('Sub Header Layout','walkerpress').'</li><li>'.esc_html('Multiple Footer Layout and Color Scheme','walkerpress').'</li><li>'.esc_html('Copyright Section Option','walkerpress').'</li><li>'.esc_html('Button Option','walkerpress').'</li><li>'.esc_html('Social Media Layouts and Custom Color','walkerpress').'</li><li>'.esc_html('Post meta option for archive and single post seperately','walkerpress').'</li><li>'.esc_html('Extra Setting for Front Page general','walkerpress').'</li><li>'.esc_html('Menu color option','walkerpress').'</li><li>'.esc_html('Topbar color option','walkerpress').'</li></ul>';
        $general_setting_upsell_message .= '<span class="walkerpress-info-row"><label class="row-element"> </label><a class="button walkerpress-pro-button" href="' . esc_url( 'https://walkerwp.com/pricing-plans/' ) . '" target="_blank">' . esc_html__( 'Ugrade to Pro', 'walkerpress' ) . '</a></span>';
        $general_setting_upsell_message .= '<span class="walkerpress-info-row"><label class="row-element"> </label><a class="button walkerpress-pro-button theme-info" href="' . esc_url( 'https://walkerwp.com/walkerpress/' ) . '" target="_blank">' . esc_html__( 'More Featrues', 'walkerpress' ) . '</a></span>';

        $wp_customize->add_section(
            new WalkerPress_Customize_Section_Ugrade(
                $wp_customize,
                'walkerpress_general_featrues_notices',
                array(
                    'title'    => esc_html__('Upgrade To Premium Version to unlock more features:','walkerpress'),
                    'description' => $general_setting_upsell_message,
                    'priority'  => 40,
                    'panel' => 'walkerpress_theme_option',

                )
            )
        );

	}
  }
}
add_action( 'customize_register', 'walkerpress_themeinfo_options_register' );