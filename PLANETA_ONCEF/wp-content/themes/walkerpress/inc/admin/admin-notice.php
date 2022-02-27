<?php
/**
 * Adding Admin Notice for recommended plugins
 */
if( ! function_exists( 'walkerpress_welcome_notice' ) ) :
    function walkerpress_welcome_notice() {
            global $pagenow;
            // $theme_args      = wp_get_theme();
            // $name            = $theme_args->__get( 'Name' );
            $meta            = get_option( 'walkerpress-welcome-notice-update' );
            $current_screen  = get_current_screen();

            if ( is_admin() && !$meta ) {
                
                if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
                    return;
                }

                if ( is_network_admin() ) {
                    return;
                }

                if ( ! current_user_can( 'manage_options' ) ) {
                    return;
                } ?>
                <div class="notice notice-info is-dismissible content-install-plugin theme-info-notice">

                    <div class="theme-screen">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/image/theme_screen.png'); ?>" />
                    </div>
                     <div class="info-content">
                        <h2><?php echo __('Welcome! Thank you for choosing WalkerPress!','walkerpress');?></h2>
                        <h4>
                            <?php echo __('To get fully advantage of theme please install and activate recommended plugins listed below at recommended plugin section.','walkerpress');?>
                            </h4>
                        <h4><a href="<?php echo admin_url();?>themes.php?page=tgmpa-install-plugins&plugin_status=install"><?php echo __('Getting Started','walkerpress');?></a> <?php echo __('with installing and activating recommended plugins.','walkerpress');?></h4>
                           
                       <a target="_blank" href="https://walkerwp.com/walkerpress/" class="admin-button info-button"><?php echo __('More Information','walkerpress');?></a>
                        
                    
                        <a href="<?php echo admin_url();?>themes.php?walkerpress-welcome-notice-update=true" class="admin-button dismiss-notice btn-notice-dismiss"><?php echo __('Dismiss Notice','walkerpress');?></a>
                   
                    </div>
                 </div>
            <?php 
            }
        }
    endif;
    add_action( 'admin_notices', 'walkerpress_welcome_notice' );


    if( ! function_exists( 'walkerpress_ignore_admin_notice' ) ) :
        /**
         * ignore notice if dismissed!
         */
        function walkerpress_ignore_admin_notice() {

            if ( isset( $_GET['walkerpress-welcome-notice-update'] ) && $_GET['walkerpress-welcome-notice-update'] = 'true' ) {
                update_option( 'walkerpress-welcome-notice-update', true );
            }
        }
    endif;
    add_action( 'admin_init', 'walkerpress_ignore_admin_notice' );