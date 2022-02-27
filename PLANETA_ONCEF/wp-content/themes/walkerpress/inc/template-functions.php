<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WalkerPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function walkerpress_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'walkerpress_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function walkerpress_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'walkerpress_pingback_header' );

if(!function_exists('walkerpress_navigation')):
	function walkerpress_navigation(){?>
		<nav id="site-navigation" class="main-navigation">
				<button type="button" class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
	<?php }
endif;

if(!function_exists('walkerpress_branding')){
	function walkerpress_branding(){
		$brand_sub_class='';
		if(get_theme_mod('header_ads_image') || is_active_sidebar( 'header-ads-1' ) ){
			$brand_sub_class= 'header-ads-exist';
		}?>
		<div class="site-branding <?php echo esc_attr($brand_sub_class);?>">
			<?php
			the_custom_logo();?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				
			<?php $walkerpress_description = get_bloginfo( 'description', 'display' );
			if ( $walkerpress_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $walkerpress_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	<?php }
}
if(!function_exists('walkerpress_header_current_date')){
	function walkerpress_header_current_date(){
		if(get_theme_mod('current_date_status','true')){
			?>
			<span class="walkerpress-current-date"><i class="far fa-clock"></i> 
				<?php echo date_i18n("l, F j, Y");// WPCS: XSS OK.?>
			</span>
		<?php }
	}
}
if(!function_exists('walkerpress_header_section')){
	function walkerpress_header_section(){
		if(walkerpress_set_to_premium()){
			$walkerpress_current_header_layout = get_theme_mod('walkerpress_header_layout','header-layout-1');
			if($walkerpress_current_header_layout =='header-layout-2'){
				get_template_part( 'template-parts/partials/header/header-layout-2');
			}elseif($walkerpress_current_header_layout =='header-layout-3'){
				get_template_part( 'template-parts/partials/header/header-layout-3');
			}elseif($walkerpress_current_header_layout =='header-layout-4'){
				get_template_part( 'template-parts/partials/header/header-layout-4');
			}else{
				get_template_part( 'template-parts/partials/header/header-layout-1');
			}
		}else{
			get_template_part( 'template-parts/partials/header/header-layout-1');
		}
	}
}
if(!function_exists('walkerpress_header_social_media')){
	function walkerpress_header_social_media(){
		if(get_theme_mod('header_social_icons_status','true')){
			get_template_part( 'template-parts/partials/social-icons');
		}
	}
}
if(!function_exists('walkerpress_frontpage_category_posts')){
	function walkerpress_frontpage_category_posts(){
		get_template_part( 'template-parts/partials/category-posts/categorylayout-1');
	}
}
if(!function_exists('walkerpress_header_ads_section')){
	function walkerpress_header_ads_section(){
		if(get_theme_mod('header_ads_image') || is_active_sidebar( 'header-ads-1' )){
			$heaer_ads_postion = get_theme_mod('walkerpress_heaer_ads_postion','header-ads-below-brand');
			if($heaer_ads_postion=='header-ads-above-brand'){
				$header_banner_class= 'ads-above-branding';
			}else{
				$header_banner_class= 'ads-below-branding';
			}
			?>
			<div class="header-banner <?php echo esc_attr($header_banner_class);?>">
				<?php 
				$walkerpress_header_ads_type = get_theme_mod('walkerpress_heaer_ads_type');

				 if ( $walkerpress_header_ads_type=='header-ads-type-widget' ) { ?>
				    <?php dynamic_sidebar( 'header-ads-1' ); ?>
				<?php } else {
						if(get_theme_mod('header_ads_image')){
							if(get_theme_mod('header_ads_image_link')){
								$header_ads_link = get_theme_mod('header_ads_image_link');
							}else{
								$header_ads_link = '#';
							}
							$header_image_source= get_theme_mod('header_ads_image');?>
							<a href="<?php echo esc_url($header_ads_link);?>" target="_blank" ><img src="<?php echo esc_url($header_image_source);?>" /></a>
						<?php }
					}?>
				</div>
			<?php
		}
	}
}

if(!function_exists('walkerpress_banner_layout')){
	function walkerpress_banner_layout(){
		$walkerpress_current_banner_layout= get_theme_mod('walkerpress_featured_layout','featured-banner-one');
		if($walkerpress_current_banner_layout =='featured-banner-two'){
			$walkerpress_current_banner = 'banner-layout-2';
		}elseif($walkerpress_current_banner_layout =='featured-banner-three'){
			$walkerpress_current_banner = 'banner-layout-3';
		}elseif($walkerpress_current_banner_layout =='featured-banner-four'){
			$walkerpress_current_banner = 'banner-layout-4';
		}elseif($walkerpress_current_banner_layout =='featured-banner-five'){
			$walkerpress_current_banner = 'banner-layout-5';
		}elseif($walkerpress_current_banner_layout =='featured-banner-six'){
			$walkerpress_current_banner = 'banner-layout-6';
		}elseif($walkerpress_current_banner_layout =='featured-banner-seven'){
			$walkerpress_current_banner = 'banner-layout-7';
		}elseif($walkerpress_current_banner_layout =='featured-banner-eight'){
			$walkerpress_current_banner = 'banner-layout-8';
		}elseif($walkerpress_current_banner_layout =='featured-banner-nine'){
			$walkerpress_current_banner = 'banner-layout-9';
		}else{
			$walkerpress_current_banner = 'banner-layout-1';
		}
		get_template_part( 'template-parts/partials/banner-layout/'.$walkerpress_current_banner);
	}
}
if(!function_exists('walkerpress_newsticker_layout')){
	function walkerpress_newsticker_layout(){
		if(walkerpress_set_to_premium()){
			$walkerpress_current_ticker = get_theme_mod('walkerpress_focus_layout','focus-layout-one');
			if($walkerpress_current_ticker == 'focus-layout-two'){
				get_template_part( 'template-parts/partials/news-ticker/news-ticker-2');
			}else{
				get_template_part( 'template-parts/partials/news-ticker/news-ticker-1');
			}
		}else{
			get_template_part( 'template-parts/partials/news-ticker/news-ticker-1');
		}
		
	}
}
if(!function_exists('walkerpress_featured_posts')){
	function walkerpress_featured_posts(){
		get_template_part( 'template-parts/partials/featured-posts/featured-post-layout-1');
	}
}
if(!function_exists('walkerpress_missed_posts')){
	function walkerpress_missed_posts(){
		get_template_part( 'template-parts/partials/missed-post/missed-post-layout-1');
	}
}
if(!function_exists('walkerpress_footer_widgets_status')){
	function walkerpress_footer_widgets_status(){
		$walkerpress_footer_widgets= false;
		if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' ) ||  is_active_sidebar( 'footer-3' ) ||  is_active_sidebar( 'footer-4' ) ){
			$walkerpress_footer_widgets= true;
		}
		return $walkerpress_footer_widgets;
	}
}
if(!function_exists('walkerpress_latest_posts')){
	function walkerpress_latest_posts(){
		get_template_part( 'template-parts/partials/latest-posts');
	}
}
if(!function_exists('walkerpress_popular_posts')){
	function walkerpress_popular_posts(){
		get_template_part( 'template-parts/partials/popular-posts');
	}
}
if(!function_exists('walkerpress_footer_copyright')){
	function walkerpress_footer_copyright(){?>
	<div class="walkerwp-wraper footer-copyright-wraper">
		<?php
		if(get_theme_mod('copyright_text_alignment') =='copyright-text-align-center'){
			$copyright_text_align_class ="text-center";
		}else{
			$copyright_text_align_class ="text-left";
		}
		$walkerpress_copyright = get_theme_mod('footer_copiright_text');
		?>

		<div class="walkerwp-container credit-container <?php echo esc_attr($copyright_text_align_class);?>">
			<?php
			$current_footer_layout = get_theme_mod('walkerpress_footer_layout','footer-layout-one');
			if($current_footer_layout=='footer-layout-three'){
				 
				if($walkerpress_copyright && walkerpress_set_to_premium() ){?>
				<div class="site-info <?php echo esc_attr($copyright_text_align_class);?>"><?php echo wp_kses_post($walkerpress_copyright);?></div>
			<?php } else{ ?>
				<div class="site-info">
					<!-- <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'walkerpress' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'walkerpress' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'walkerpress' ), 'WalkerPress', '<a href="http://walkerwp.com/">WalkerWP</a>' );
						?> -->

				</div><!-- .site-info -->
			<?php } 
			if( get_theme_mod('footer_copyright_social_status','true')){?>
					<div class="footer-social-media"><?php walkerpress_header_social_media();?></div>
				<?php }
			}else{?>
				<div class="footer-social-media walkerwp-grid-12">
				<?php	
				if( get_theme_mod('footer_copyright_social_status','true')){
					walkerpress_header_social_media();
				}
				?>
				</div>
			<?php
				
			if($walkerpress_copyright && walkerpress_set_to_premium() ){?>
				<div class="site-info walkerwp-grid-12 <?php echo esc_attr($copyright_text_align_class);?>"><?php echo wp_kses_post($walkerpress_copyright);?></div>
			<?php } else{ ?>
				<div class="site-info walkerwp-grid-12">
				

				</div><!-- .site-info -->
			<?php } ?>
			<?php }
			?>
			
			
			
			</div>
		</div>
<?php }
}

if(!function_exists('walkerpress_meta_data')){
	function walkerpress_meta_data(){?>
		<div class="entry-meta">
			<?php 
			if(walkerpress_set_to_premium()){
				if(get_theme_mod('author_status','true')){
					walkerpress_custom_post_author();
				}
				if(get_theme_mod('post_date_status','true')){
					walkerpress_custom_post_date();
				}
				
				if(get_theme_mod('comment_status','true')){
					walkerpress_post_comments();
				}
				
			}else{
				walkerpress_custom_post_author();
				walkerpress_custom_post_date();
				walkerpress_post_comments();
				
			}
				
			?>
		</div><!-- .entry-meta -->
	<?php }
}

if(!function_exists('walkerpress_page_subheader')){
	function walkerpress_page_subheader(){
		if(walkerpress_set_to_premium()){
			$current_subheader_layout = get_theme_mod('subheader_layout_option','subheader-layout-1');
			if($current_subheader_layout =='subheader-layout-2'){
				get_template_part( 'template-parts/partials/sub-header/subheader-layout-2');
			}else{
				get_template_part( 'template-parts/partials/sub-header/subheader-layout-1');
			}
		}else{
			get_template_part( 'template-parts/partials/sub-header/subheader-layout-1');
		}
		
	}
}

if(!function_exists('walkerpress_header_global_search')){
	function walkerpress_header_global_search(){
		if(get_theme_mod('search_icon_status','true')){
			?>

		<button class="global-search-icon">
			<i class="fas fa-search"></i>
		</button>
		<span class="header-global-search-form">
			<button class="global-search-close"><i class="fas fa-times"></i></button>
			<?php get_Search_form()?>

		</span>
	<?php }
	}
}

if( ! function_exists( 'better_comments' ) ):
function better_comments($comment, $args, $depth) {
    ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div class="comment">
        <div class="img-thumbnail d-none d-sm-block">
            <?php echo get_avatar($comment,$size='80'); ?>
        </div>
        <div class="comment-block">
            <div class="comment-arrow"></div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php esc_html_e('Your comment is awaiting moderation.','walkerpress') ?></em>
                    <br />
                <?php endif; ?>
                <span class="comment-by">
                    <strong><?php echo get_comment_author() ?></strong>
                    
                </span>
                <span class="date float-right"><?php printf(/* translators: 1: date and time(s). */ esc_html__('%1$s at %2$s' , 'walkerpress'), get_comment_date(),  get_comment_time()) ?></span>
            <?php comment_text() ?>
            <span class="comment-reply-btn">
                <span> <i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
            </span>
        </div>
        </div>

<?php
        }
endif;

if(! function_exists('walkerpress_scroll_top')):
	function walkerpress_scroll_top(){
		if(get_theme_mod('enable_scroll_top_icon','true')){ ?>
			<a href="#" class="walkerpress-top"><i class="fas fa-arrow-up"></i></a>
	<?php }
	}
endif;

if(!function_exists('walkerpress_sidebar_panel')):
	function walkerpress_sidebar_panel(){
		if ( is_active_sidebar( 'sidebar-panel' ) ) : ?>
		    <div class="sidebar-panel">
		    	<div class="panel-content">
		    		<div class="panel-close">
		    			<i class="fas fa-times"></i>
		    		</div>
		        	<?php dynamic_sidebar( 'sidebar-panel' ); ?>
		        </div>
		   </div>
		<?php endif;
	}
endif; 

if(!function_exists('sidebar_panel_switcher')):
	function sidebar_panel_switcher(){
		if(walkerpress_set_to_premium()){
			if(get_theme_mod('sidebar_panel_status','true')){?>
				<div class="sidebar-slide-button">
					<button class="slide-button">
						<i class="fas fa-bars"></i>
					</button>
				</div>
			<?php } 
		}
	}
endif;

if(! function_exists('walkerpress_single_post_before')):
	function walkerpress_single_post_before(){
		if(walkerpress_set_to_premium() && get_theme_mod('walkerpress_single_top_ads_type')){
			echo '<div class="walkerwp-container single-post-ads before-post">';
		$single_post_top_ads_type = get_theme_mod('walkerpress_single_top_ads_type','single-top-ads-type-image');
		if($single_post_top_ads_type =='single-top-ads-type-widget'){
			dynamic_sidebar('single-ads-top');
		}else{
			if(get_theme_mod('single_post_top_ads_image_link')){
				$ads_url = get_theme_mod('single_post_top_ads_image_link');
			}else{
				$ads_url="#";
			}
			if(get_theme_mod('single_post_top_ads_image')){
				echo '<a href="'.esc_url($ads_url).'" target="_blank"><img src="'.esc_url(get_theme_mod('single_post_top_ads_image')).'" /></a>'; 
			}
		}
		echo '</div>';
		}	
	}
endif;
if(! function_exists('walkerpress_single_post_after')):
	function walkerpress_single_post_after(){
		if(walkerpress_set_to_premium() && get_theme_mod('walkerpress_single_bottom_ads_type')){
			echo '<div class="walkerwp-container single-post-ads after-post">';
			$single_post_bottom_ads_type = get_theme_mod('walkerpress_single_bottom_ads_type','single-bottom-ads-type-image');
			if($single_post_bottom_ads_type =='single-bottom-ads-type-widget'){
				dynamic_sidebar('single-ads-bottom');
			}else{
				if(get_theme_mod('single_post_bottom_ads_image_link')){
					$ads_url = get_theme_mod('single_post_bottom_ads_image_link');
				}else{
					$ads_url="#";
				}
				if(get_theme_mod('single_post_bottom_ads_image')){
					echo '<a href="'.esc_url($ads_url).'" target="_blank"><img src="'.esc_url(get_theme_mod('single_post_bottom_ads_image')).'" /></a>';
				}
			}
			echo '</div>';
		}
	}
endif;
if(! function_exists('walkerpress_blog_post_before')):
	function walkerpress_blog_post_before(){
		if(walkerpress_set_to_premium() && get_theme_mod('walkerpress_blog_top_ads_type')){
			echo '<div class="walkerwp-container blog-post-ads before-post">';
			$blog_page_top_ads_type = get_theme_mod('walkerpress_blog_top_ads_type','blog-top-ads-type-image');
			if($blog_page_top_ads_type =='blog-top-ads-type-widget'){
				dynamic_sidebar('blog-ads-top');
			}else{
				if(get_theme_mod('blog_top_ads_image_link')){
					$ads_url = get_theme_mod('blog_top_ads_image_link');
				}else{
					$ads_url="#";
				}
				if(get_theme_mod('blog_top_ads_image')){
					echo '<a href="'.esc_url($ads_url).'" target="_blank"><img src="'.esc_url(get_theme_mod('blog_top_ads_image')).'" /></a>'; 
				}
			}
			echo '</div>';
		}
	}
endif;
if(! function_exists('walkerpress_blog_post_after')):
	function walkerpress_blog_post_after(){
		if(walkerpress_set_to_premium() && get_theme_mod('walkerpress_blog_bottom_ads_type')){
			echo '<div class="walkerwp-container blog-post-ads after-post">';
			$blog_page_bottom_ads_type = get_theme_mod('walkerpress_blog_bottom_ads_type','blog-bottom-ads-type-image');
			if($blog_page_bottom_ads_type =='blog-bottom-ads-type-widget'){
				dynamic_sidebar('blog-ads-bottom');
			}else{
				if(get_theme_mod('blog_bottom_ads_image_link')){
					$ads_url = get_theme_mod('blog_bottom_ads_image_link');
				}else{
					$ads_url="#";
				}
				if(get_theme_mod('blog_bottom_ads_image')){
					echo '<a href="'.esc_url($ads_url).'" target="_blank"><img src="'.esc_url(get_theme_mod('blog_bottom_ads_image')).'" /></a>'; 
				}
			}
			echo '</div>';
		}
	}
endif;

if(! function_exists('walkerpress_banner_section_ads')):
	function walkerpress_banner_section_ads(){
		if(get_theme_mod('featured_secton_ads_image')){
			echo '<div class="walkerwp-container banners-section-ads">';
				if(get_theme_mod('featured_secton_ads_image_link')){
					$ads_url = get_theme_mod('featured_secton_ads_image_link');
				}else{
					$ads_url="#";
				}
				
				echo '<a href="'.esc_url($ads_url).'" target="_blank"><img src="'.esc_url(get_theme_mod('featured_secton_ads_image')).'" /></a>'; 
				
			echo '</div>';
		}
	}
endif;
if(! function_exists('walkerpress_feature_post_section_ads')):
	function walkerpress_feature_post_section_ads(){
		if(get_theme_mod('featured_post_ads_image')){
			echo '<div class="walkerwp-container featured-post-section-ads">';
				if(get_theme_mod('featured_post_ads_image_link')){
					$ads_url = get_theme_mod('featured_post_ads_image_link');
				}else{
					$ads_url="#";
				}
				
					echo '<a href="'.esc_url($ads_url).'" target="_blank"><img src="'.esc_url(get_theme_mod('featured_post_ads_image')).'" /></a>'; 
				
			echo '</div>';
		}
	}
endif;
if(! function_exists('walkerpress_feature_category_section_ads')):
	function walkerpress_feature_category_section_ads(){
		if(get_theme_mod('featured_category_ads_image')){
			echo '<div class="walkerwp-container featured-category-section-ads">';
				if(get_theme_mod('featured_category_ads_image_link')){
					$ads_url = get_theme_mod('featured_category_ads_image_link');
				}else{
					$ads_url="#";
				}
				
					echo '<a href="'.esc_url($ads_url).'" target="_blank"><img src="'.esc_url(get_theme_mod('featured_category_ads_image')).'" /></a>'; 
				
			echo '</div>';
		}
	}
endif;

if( ! function_exists('walkerpress_before_footer')){
	function walkerpress_before_footer(){
			if( get_theme_mod('missed_posts_status') && is_front_page() || get_theme_mod('missed_posts_status') && is_home() || get_theme_mod('missed_posts_status') && 'post' === get_post_type()){
			walkerpress_missed_posts();
		}
	}
}
if(! function_exists('walkerpress_after_header')){
	function walkerpress_after_header(){
		if ( is_front_page() || is_home() ){
			if(get_theme_mod('focus_news_status')){
				walkerpress_newsticker_layout();
			}	
			if(get_theme_mod('featured_news_status')){
				walkerpress_banner_layout();
				if(walkerpress_set_to_premium()){
					walkerpress_banner_section_ads();
				}
			}
			if(get_theme_mod('featured_posts_status')){
				walkerpress_featured_posts();
			}
			if(get_theme_mod('category_section_status')){
				walkerpress_frontpage_category_posts();
			}
		}
	}
}
if(!function_exists('walkerpress_sub_header')){
	function walkerpress_sub_header(){
		if (! is_front_page() || !is_home() ){
			walkerpress_page_subheader();
		}
	}
}
if(!function_exists('walkerpress_before_header')){
	function walkerpress_before_header(){?>
		<div class="walkerwp-pb-container">
			<div class="walkerwp-progress-bar"></div>
		</div>
	<?php }
}