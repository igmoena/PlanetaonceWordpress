<?php
function walker_core_get_theme_name(){
    $current_theme = wp_get_theme();
    return $current_theme->get('Name');
}

function walker_core_plugin_check_activated(){
    $pluginList = get_option( 'active_plugins' );
    $walker_core_plugin = 'advanced-import/advanced-import.php'; 
    $checkPlugin = in_array( $walker_core_plugin , $pluginList );
    return $checkPlugin;
}
function walker_core_plugin_file_exists(){
    $walker_core_plugin = 'advanced-import/advanced-import.php'; 
    $pathpluginurl = WP_PLUGIN_DIR .'/'. $walker_core_plugin;
    $isinstalled = file_exists( $pathpluginurl );
    return $isinstalled;
}
function walker_core_get_theme_screenshot(){
    $current_theme = wp_get_theme();
    return $current_theme->get_screenshot();
}
function walker_core_get_current_theme_slug(){
    $current_theme = wp_get_theme();
    return $current_theme->stylesheet;
}

function walker_core_get_templates_lists( $theme_slug ){
    
    switch ( $theme_slug ):
        case "gridchamp":
            $demo_templates_lists = array(

                'gridchamp' =>array(
                    'title' => esc_html__( 'Gridchamp', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*Premium*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'gridchamp' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/free/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=gridchmap-free',
                    'plugins' => ''
                ),

                'gridchamp-full' =>array(
                    'title' => esc_html__( 'Gridchamp Pro 1', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'gridchamp' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=gridchamp-demo-1',
                    'plugins' => ''
                ),
                'gridchamp-pro' =>array(
                    'title' => esc_html__( 'Grid Agency', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'gridchamp' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/2/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/2/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/2/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/2/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=pro-demo-2',
                    'plugins' => ''
                ),
                'gridchamp-minimal' =>array(
                    'title' => esc_html__( 'GridConstruct', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'gridchamp' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/3/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/3/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/3/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/3/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=pro-demo-3',
                    'plugins' => ''
                ),
                'gridchamp-fair' =>array(
                    'title' => esc_html__( 'GridFit', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'gridchamp' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/4/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/4/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/4/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/gridchamp/pro/4/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=pro-demo-4',
                    'plugins' => ''
                ),

        
            );
         break;
        case "walkermag":
            $demo_templates_lists = array(

                'walkermag' =>array(
                    'title' => esc_html__( 'WalkerMag', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*Premium*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkermag' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkermag',
                    'plugins' => ''
                ),
                'walkermag-blog' =>array(
                    'title' => esc_html__( 'WalkerMag Blog', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*Premium*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkermag' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/2/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/2/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/2/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/free/2/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkermag-blog',
                    'plugins' => ''
                ),
                'walkemag-pro' =>array(
                    'title' => esc_html__( 'WalkerMag Pro', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkermag' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkermag-pro',
                    'plugins' => ''
                ),
                'walkemag-pro-box' =>array(
                    'title' => esc_html__( 'WalkerMag Pro 2', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkermag' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/2/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/2/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/2/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkermag/pro/2/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkermag-pro-2',
                    'plugins' => ''
                ),
        );
        break;

        case "walkernews":
            $demo_templates_lists = array(
                'walkernews' =>array(
                    'title' => esc_html__( 'WalkerNews', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*Premium*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkernews' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/free/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkernews',
                    'plugins' => ''
                ),
                'walkernews-pro' =>array(
                    'title' => esc_html__( 'WalkerNews Pro', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkernews' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkernews-pro',
                    'plugins' => ''
                ),
                'walkernews-pro-box' =>array(
                    'title' => esc_html__( 'WalkerNews Pro', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkernews' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/2/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/2/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/2/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkernews/pro/2/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkernews-pro-2',
                    'plugins' => ''
                ),
            );
        break;

        case "home-care":
            $demo_templates_lists = array(
                'home-care' =>array(
                    'title' => esc_html__( 'Home Care', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*Premium*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'home-care' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/free/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=home-care-free',
                    'plugins' => ''
                ),
                'home-care-pro' =>array(
                    'title' => esc_html__( 'Home Care Pro', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkernews' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/pro/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/pro/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/pro/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/home-care/pro/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=home-care-pro',
                    'plugins' => ''
                ),
            );
        break;

        case "business-launcher":
            $demo_templates_lists = array(
                'business-launcher' =>array(
                    'title' => esc_html__( 'Business Launcher', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*free*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'business-launcher' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/free/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=business-launcher',
                    'plugins' => ''
                ),
                'business-launcher-pro' =>array(
                    'title' => esc_html__( 'Business Launcher Pro', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'business launcher' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/pro/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/pro/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/pro/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/business-launcher/pro/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=business-launcher-pro',
                    'plugins' => ''
                ),
            );
        break;
        
        case "walker-charity":
            $demo_templates_lists = array(
                'walker-charity' =>array(
                    'title' => esc_html__( 'Walker Charity Free', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*free*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walker-charity' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/free/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walker-charity',
                    'plugins' => ''
                ),
                'walker-charity-pro' =>array(
                    'title' => esc_html__( 'Walker Charity Pro 1', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walker-charity' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walker-charity-pro',
                    'plugins' => ''
                ),
                'walker-charity-pro-two' =>array(
                    'title' => esc_html__( 'Walker Charity Pro 2', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walker-charity' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/2/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/2/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/2/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/2/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walker-charity-pro-2',
                    'plugins' => ''
                ),
                'walker-charity-pro-three' =>array(
                    'title' => esc_html__( 'Walker Charity Pro 3', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walker-charity' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/3/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/3/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/3/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/3/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walker-charity-pro-3',
                    'plugins' => ''
                ),
                'walker-charity-pro-four' =>array(
                    'title' => esc_html__( 'Walker Charity Pro 4', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walker-charity' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/4/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/4/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/4/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walker-charity/pro/4/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walker-charity-pro-4',
                    'plugins' => ''
                ),
            );
        break;
        case "walkerpress":
            $demo_templates_lists = array(
                'walkerpress' =>array(
                    'title' => esc_html__( 'WalkerPress Default Demo', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*free*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'free' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress',
                    'plugins' => ''
                ),
                'walkerpress-one' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 2 (Free)', 'walker-core' ),/*Title*/
                    'is_pro' => false,  /*Premium*/
                    'type' => 'free',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress blog' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/2/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/free/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-demo-2',
                    'plugins' => ''
                ),
                'walkerpress-pro' =>array(
                    'title' => esc_html__( 'WalkerPress (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/1/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/1/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/1/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/1/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro',
                    'plugins' => ''
                ),
                'walkerpress-pro-2' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 2 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/2/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/2/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/2/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/2/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-2',
                    'plugins' => ''
                ),
                'walkerpress-pro-3' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 3 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/3/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/3/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/3/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/3/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-3',
                    'plugins' => ''
                ),
                'walkerpress-pro-4' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 4 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/4/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/4/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/4/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/4/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-4',
                    'plugins' => ''
                ),
                'walkerpress-pro-5' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 5 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/5/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/5/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/5/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/5/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-5',
                    'plugins' => ''
                ),
                'walkerpress-pro-6' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 6 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/6/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/6/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/6/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/6/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-6',
                    'plugins' => ''
                ),
                'walkerpress-pro-7' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 7 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/7/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/7/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/7/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/7/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-7',
                    'plugins' => ''
                ),
                'walkerpress-pro-8' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 8 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/8/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/8/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/8/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/8/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-8',
                    'plugins' => ''
                ),
                'walkerpress-pro-9' =>array(
                    'title' => esc_html__( 'WalkerPress Demo 9 (Pro)', 'walker-core' ),/*Title*/
                    'is_pro' => true,  /*Premium*/
                    'type' => 'premium',
                    'author' => esc_html__( 'WalkerWP', 'walker-core' ),    /*Author Name*/
                    'keywords' => array( 'walkerpress pro' , 'walker-core'),  /*Search keyword*/
                    'categories' => array( 'pro' ), /*Categories*/
                    'template_url' => array(
                        'content' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/9/content.json',
                        'options' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/9/options.json',
                        'widgets' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/9/widgets.json'
                    ),
                    'screenshot_url' => WALKER_CORE_SETUP_TEMPLATE_URL.'/walkerpress/pro/9/screenshot.png',
                    'demo_url' => 'https://walkerwp.com/demo-page/?product_id=walkerpress-pro-9',
                    'plugins' => ''
                ),
            );
        break;

        default:
            $demo_templates_lists = array();
    endswitch;

    return $demo_templates_lists;

}

if(!function_exists('walker_core_most_view_post')):
    function walker_core_most_view_post() {
       if( is_single() ) {
          global $post;
          $views = get_post_meta( $post->ID, 'walker_post_viewed', true );
          if( $views == '' ) {
             update_post_meta( $post->ID, 'walker_post_viewed', '1' );   
          } else {
             $views_no = intval( $views );
             update_post_meta( $post->ID, 'walker_post_viewed', ++$views_no );
          }
       }
    }
endif;
add_action( 'wp_head', 'walker_core_most_view_post' );
if ( wc_fs()->can_use_premium_code() ) {
    if(!function_exists('walkermag_topbar_navigation')){
        function walkermag_topbar_navigation(){
            if(get_theme_mod('walkermag_topbar_menu_select')){?>
                <div class="secondary-menu-section">
                    <?php 

                    $walkermag_top_menu= get_theme_mod('walkermag_topbar_menu_select');
                    $nav_menu = wp_get_nav_menu_object( $walkermag_top_menu );
                    $malkermag_topbarmenu= $nav_menu->name; 

                    if(get_theme_mod('walkermag_header_layout')=='header-layout-1' || get_theme_mod('walkermag_header_layout')!='header-layout-2'){
                        wp_nav_menu( array( 'menu' => $malkermag_topbarmenu, 'depth'=>'1', 'menu_class'     => 'nav secondary-menu', 'container_class' => 'walkermag-secondary-menu layout-1-container') );
                    }?>
                    <button class="btn-default secondary-menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    <div id="secondaryMenuModel" class="secondary-menu-modal modal">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button  class="menu-modal-close">&times;</button>
                           <?php
                            wp_nav_menu( array( 'menu' => $malkermag_topbarmenu, 'depth'=>'1', 'menu_class'     => 'nav secondary-menu', 'container_class' => 'walkermag-secondary-menu') );?>
                        </div>
                    </div>
                </div>
                    
                </div>
            <?php }
        }
    }
add_action('walkermag_after_date','walkermag_topbar_navigation');
}
if ( wc_fs()->can_use_premium_code() ) {
    add_action( 'advanced_import_is_pro_active','walker_core_set_premium_active' );
    function walker_core_set_premium_active( $is_pro_active ) {
        return true;
    }
}