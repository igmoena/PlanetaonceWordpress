<?php
    $primary_color = sanitize_hex_color( get_theme_mod( 'walkerpress_primary_color', '#5306cf' ) );
    $secondary_color = sanitize_hex_color( get_theme_mod( 'walkerpress_secondary_color', '#d51922' ) );
    $text_color = sanitize_hex_color( get_theme_mod( 'walkerpress_text_color', '#404040' ) );
    $heading_color = sanitize_hex_color( get_theme_mod( 'walkerpress_heading_color', '#000000' ) );
    $light_color = sanitize_hex_color( get_theme_mod( 'walkerpress_light_color', '#ffffff' ) );
    $meta_color = sanitize_hex_color(get_theme_mod('walkerpress_home_meta_color', '#b5b5b5'));
    $category_color = sanitize_hex_color(get_theme_mod('walkerpress_home_category_color'));
    if(empty($category_color)){
        $category_color =$primary_color;
    }
    $subheader_background_color = sanitize_hex_color(get_theme_mod('walkerpress_subheader_background_color','#0d1741'));
    $subheader_text_color = sanitize_hex_color(get_theme_mod('walkerpress_subheader_text_color','#ffffff'));
    $category_text_transform = get_theme_mod('walkerpress_category_text_transform','cat-transform-initial');
    if($category_text_transform =='cat-transform-uppercase'){
        $post_category_text_transform = 'uppercase';
    }elseif($category_text_transform =='cat-transform-capitalize'){
         $post_category_text_transform = 'capitalize';
    }elseif($category_text_transform =='cat-transform-lowercase'){
         $post_category_text_transform = 'lowercase';
    }else{
         $post_category_text_transform = 'initial';
    }
    $category_font_weight = get_theme_mod('walkerpress_category_font_weight','cat-weight-initial');
    if($category_font_weight=='cat-weight-light'){
        $post_cat_font_weight='300';
    }elseif($category_font_weight=='cat-weight-medium'){
        $post_cat_font_weight='600';
    }elseif($category_font_weight=='cat-weight-bold'){
        $post_cat_font_weight='700';
    }elseif($category_font_weight=='cat-weight-dark'){
        $post_cat_font_weight='900';
    }else{
         $post_cat_font_weight='normal';
    }
    $header_bg_opacity = get_theme_mod('header_bg_opacity','0.6');
    $sub_header_bg_opacity = get_theme_mod('subheader_background_opacity','0.60');
    $brand_logo_size = get_theme_mod('walkerpress_site_title_size','30');
    $site_name_color = sanitize_hex_color(get_theme_mod('walkerpress_header_site_name_color'));

    $box_background_color = sanitize_hex_color(get_theme_mod('walkerpress_home_boxes_bg_color','#ffffff'));
    $box_border_color = sanitize_hex_color(get_theme_mod('walkerpress_home_boxes_border_color','#ffffff'));
    $box_border_size='0';
    if(get_theme_mod('enable_box_border')){
        $box_border_size = absint(get_theme_mod('walkerpress_home_boxes_border_size','1'));
    }
 

    $social_icon_color  = sanitize_hex_color(get_theme_mod('walkerpress_social_icons_color','#ffffff'));
    $social_icon_hover_color = sanitize_hex_color(get_theme_mod('walkerpress_social_icons_hover_color','#ea1c0e'));
    $social_icon_background = sanitize_hex_color(get_theme_mod('walkerpress_social_icons_bg_color','#222222'));
    $social_icon_background_hover = sanitize_hex_color(get_theme_mod('walkerpress_social_icons_bg_hover_color','#ffffff'));
    $main_container_width = absint(get_theme_mod('walkerpress_container_width','1280'));
    $sidebar_width = absint(get_theme_mod('walkerpress_sidebar_width','28'));
    $primary_content_width = 100-$sidebar_width;

    $main_menu_primary_color = sanitize_hex_color(get_theme_mod('walkerpress_navigation_primary_color','#000000'));
    $main_menu_secondary_color = sanitize_hex_color(get_theme_mod('walkerpress_navigation_secondary_color'));
    if(empty($main_menu_secondary_color)){
        $main_menu_secondary_color=$secondary_color;
    }
    $main_menu_text_color= sanitize_hex_color(get_theme_mod('walkerpress_navigation_color'));
    if(empty($main_menu_text_color)){
        $main_menu_text_color =$light_color;
    }
    $main_menu_text_hover_color= sanitize_hex_color(get_theme_mod('walkerpress_navigation_hover_color','#ffffff'));
    $button_radius = absint(get_theme_mod('walkerpress_button_radius','3'));
    $current_button_text_transform = get_theme_mod('walkerpress_button_text_option','walkerpress-texttransform-initial');
    if($current_button_text_transform=='walkerpress-texttransform-uppercase'){
        $button_text_transform = 'uppercase';
    }elseif($current_button_text_transform=='walkerpress-texttransform-capitalize'){
         $button_text_transform = 'capitalize';
    }elseif($current_button_text_transform=='walkerpress-texttransform-lowercase'){
         $button_text_transform = 'lowercase';
    }else{
        $button_text_transform = 'initial';
    }
    $button_font_size = absint(get_theme_mod('walkerpress_button_text_size','14'));
    $meta_font_size = absint(get_theme_mod('walkerpress_homepage_meta_size','12'));
    $topbar_bg_color = sanitize_hex_color(get_theme_mod('walkerpress_topbarbg_color','#000000'));
    $topbar_text_color = sanitize_hex_color(get_theme_mod('walkerpress_topbar_color','#ffffff'));
    if($site_name_color){
        $brand_name_color = $site_name_color;
    }else{
        $brand_name_color = $light_color;
    }
    $header_text_color = sanitize_hex_color(get_theme_mod('walkerpress_header_text_color'));

    $header_bg_color = sanitize_hex_color(get_theme_mod('walkerpress_heaer_bg_color','#313131'));
    $footer_bg_color = sanitize_hex_color(get_theme_mod('walkerpress_footer_background_color'));
    if(empty($footer_bg_color)){
        $footer_bg_color = $primary_color;
    }
    $footer_text_color = sanitize_hex_color(get_theme_mod('walkerpress_footer_text_color'));
    if(empty($footer_text_color)){
        $footer_text_color=$light_color;
    }
    $footer_link_color = sanitize_hex_color(get_theme_mod('walkerpress_footer_link_color'));
    if(empty($footer_link_color)){
        $footer_link_color=$light_color;;
    }
    $footer_link_hover_color = sanitize_hex_color(get_theme_mod('walkerpress_footer_link_hover_color'));
    if(empty($footer_link_hover_color)){
        $footer_link_hover_color=$secondary_color;
    }
    $footer_bg_opacity = get_theme_mod('footer_bg_opacity','0');
    $footer_box_opacity = get_theme_mod('footer_box_opacity','0.2');
    $footer_box_bg = sanitize_hex_color(get_theme_mod('walkerpress_footer_box_color','#000000'));
    $copyright_bg_color = sanitize_hex_color(get_theme_mod('walkerpress_footer_bottom_color','#0d1741'));
    $copyright_bg_opacity = get_theme_mod('copyright_bg_opacity','0');
    $copyright_top_space = absint(get_theme_mod('walkerpress_copyright_section_padding_top','15'));
    $copyright_bottom_space = absint(get_theme_mod('walkerpress_copyright_section_padding_bottom','15'));
    $header_top_space = absint(get_theme_mod('walkerpress_header_section_padding_top','50'));
    $copyright_text_color = sanitize_hex_color(get_theme_mod('walkerpress_copyright_text_color','#ffffff'));
    $header_bottom_space = absint(get_theme_mod('walkerpress_header_section_padding_bottom','50'));
    if(walkerpress_set_to_premium() ){
        $subheader_padding_top = absint(get_theme_mod('walkerpress_subheader_section_padding_top','50'));
        $subheader_padding_bottom = absint(get_theme_mod('walkerpress_subheader_section_padding_bottom','170'));
    }else{
        $subheader_padding_top='15';
        $subheader_padding_bottom='5';
    }
    $subheader_min_height = absint(get_theme_mod('walkerpress_sub_header_height','400'));
   
    $footer_top_space = absint(get_theme_mod('walkerpress_footer_section_padding_top','70'));
    $footer_bottom_space = absint(get_theme_mod('walkerpress_footer_section_padding_bottom','50'));
  
   

    if($header_text_color){
        $brand_section_text_color = $header_text_color;
    }else{
        $brand_section_text_color = $light_color;
    }
    $site_font = esc_attr(get_theme_mod('walkerpress_body_fonts','Oxygen'));
    if( $site_font ){
        switch ( $site_font) {
            case "Source Sans Pro:400,700,400italic,700italic":
                $site_font = 'Source Sans Pro';
            break;

            case "Open Sans:400italic,700italic,400,700":
                $site_font = 'Open Sans';
            break;

            case "Oswald:400,700":
                $site_font = 'Oswald';
            break;

            case "Montserrat:400,700":
                $site_font = 'Montserrat';
            break;

            case "Playfair Display:400,700,400italic":
                $site_font = 'Playfair Display';
            break;

            case "Raleway:400,700":
                $site_font = 'Raleway';
            break;

            case "Raleway:400,700":
                $site_font = 'Raleway';
            break;

            case "Droid Sans:400,700":
                $site_font = 'Droid Sans';
            break;

            case "Lato:400,700,400italic,700italic":
                $site_font = 'Lato';
            break;

            case "Arvo:400,700,400italic,700italic":
                $site_font = 'Arvo';
            break;

            case "Lora:400,700,400italic,700italic":
                $site_font = 'Lora';
            break;

            case "Merriweather:400,300italic,300,400italic,700,700italic":
                $site_font = 'Merriweather';
            break;

            case "Oxygen:400,300,700":
                $site_font = 'Oxygen';
            break;

            case "PT Serif:400,700' => 'PT Serif":
                $site_font = 'PT Serif';
            break;

            case "PT Sans:400,700,400italic,700italic":
                $site_font = 'PT Sans';
            break;

            case "PT Sans Narrow:400,700":
                $site_font = 'PT Sans Narrow';
            break;

            case "Cabin:400,700,400italic":
                $site_font = 'Cabin';
            break;

            case "Fjalla One:400":
                $site_font = 'Fjalla One';
            break;

            case "Francois One:400":
                $site_font = 'Francois One';
            break;

            case "Josefin Sans:400,300,600,700":
                $site_font = 'Josefin Sans';
            break;

            case "Libre Baskerville:400,400italic,700":
                $site_font = 'Libre Baskerville';
            break;

            case "Arimo:400,700,400italic,700italic":
                $site_font = 'Arimo';
            break;

            case "Ubuntu:400,700,400italic,700italic":
                $site_font = 'Ubuntu';
            break;

            case "Bitter:400,700,400italic":
                $site_font = 'Bitter';
            break;

            case "Droid Serif:400,700,400italic,700italic":
                $site_font = 'Droid Serif';
            break;

            case "Roboto:400,400italic,700,700italic":
                $site_font = 'Roboto';
            break;

            case "Open Sans Condensed:700,300italic,300":
                $site_font = 'Open Sans Condensed';
            break;

            case "Roboto Condensed:400italic,700italic,400,700":
                $site_font = 'Roboto Condensed';
            break;

            case "Roboto Slab:400,700":
                $site_font = 'Roboto Slab';
            break;

            case "Yanone Kaffeesatz:400,700":
                $site_font = 'Yanone Kaffeesatz';
            break;

            case "Rokkitt:400":
                $site_font = 'Rokkitt';
            break;

            default:
                $site_font = 'Oxygen';
        }
    }else{
        $site_font = 'Oxygen';
    }

    $heading_font = esc_attr(get_theme_mod('walkerpress_heading_fonts','Roboto'));
    if( $heading_font ){
        switch ( $heading_font) {
            case "Source Sans Pro:400,700,400italic,700italic":
                $heading_font = 'Source Sans Pro';
            break;

            case "Open Sans:400italic,700italic,400,700":
                $heading_font = 'Open Sans';
            break;

            case "Oswald:400,700":
                $heading_font = 'Oswald';
            break;

            case "Montserrat:400,700":
                $heading_font = 'Montserrat';
            break;

            case "Playfair Display:400,700,400italic":
                $heading_font = 'Playfair Display';
            break;

            case "Raleway:400,700":
                $heading_font = 'Raleway';
            break;

            case "Raleway:400,700":
                $heading_font = 'Raleway';
            break;

            case "Droid Sans:400,700":
                $heading_font = 'Droid Sans';
            break;

            case "Lato:400,700,400italic,700italic":
                $heading_font = 'Lato';
            break;

            case "Arvo:400,700,400italic,700italic":
                $heading_font = 'Arvo';
            break;

            case "Lora:400,700,400italic,700italic":
                $heading_font = 'Lora';
            break;

            case "Merriweather:400,300italic,300,400italic,700,700italic":
                $heading_font = 'Merriweather';
            break;

            case "Oxygen:400,300,700":
                $heading_font = 'Oxygen';
            break;

            case "PT Serif:400,700' => 'PT Serif":
                $heading_font = 'PT Serif';
            break;

            case "PT Sans:400,700,400italic,700italic":
                $heading_font = 'PT Sans';
            break;

            case "PT Sans Narrow:400,700":
                $heading_font = 'PT Sans Narrow';
            break;

            case "Cabin:400,700,400italic":
                $heading_font = 'Cabin';
            break;

            case "Fjalla One:400":
                $heading_font = 'Fjalla One';
            break;

            case "Francois One:400":
                $heading_font = 'Francois One';
            break;

            case "Josefin Sans:400,300,600,700":
                $heading_font = 'Josefin Sans';
            break;

            case "Libre Baskerville:400,400italic,700":
                $heading_font = 'Libre Baskerville';
            break;

            case "Arimo:400,700,400italic,700italic":
                $heading_font = 'Arimo';
            break;

            case "Ubuntu:400,700,400italic,700italic":
                $heading_font = 'Ubuntu';
            break;

            case "Bitter:400,700,400italic":
                $heading_font = 'Bitter';
            break;

            case "Droid Serif:400,700,400italic,700italic":
                $heading_font = 'Droid Serif';
            break;

            case "Roboto:400,400italic,700,700italic":
                $heading_font = 'Roboto';
            break;

            case "Open Sans Condensed:700,300italic,300":
                $heading_font = 'Open Sans Condensed';
            break;

            case "Roboto Condensed:400italic,700italic,400,700":
                $heading_font = 'Roboto Condensed';
            break;

            case "Roboto Slab:400,700":
                $heading_font = 'Roboto Slab';
            break;

            case "Yanone Kaffeesatz:400,700":
                $heading_font = 'Yanone Kaffeesatz';
            break;

            case "Rokkitt:400":
                $heading_font = 'Rokkitt';
            break;

            default:
                $heading_font = 'Roboto';
        }
    }else{
        $heading_font = 'Roboto';
    }
    

    $site_font_size = absint(get_theme_mod('walkerpress_font_size','14'));


    $heading_font_one = absint(get_theme_mod('walkerpress_heading_one_size','40'));
    $heading_font_two = absint(get_theme_mod('walkerpress_heading_two_size','32'));
    $heading_font_three = absint(get_theme_mod('walkerpress_heading_three_size','24'));
    $heading_font_four = absint(get_theme_mod('walkerpress_heading_four_size','20'));
    $heading_font_five = absint(get_theme_mod('walkerpress_heading_five_size','16'));
    $heading_font_six = absint(get_theme_mod('walkerpress_heading_six_size','14'));

    
?>
<style type="text/css">
    :root{
        --primary-color: <?php echo $primary_color;?>;
        --secondary-color: <?php echo $secondary_color;?>;
        --text-color:<?php echo $text_color;?>;
        --heading-color:<?php echo $heading_color;?>;
        --light-color:<?php echo $light_color;?>;
    }

    body{
        font-family: '<?php echo $site_font;?>',sans-serif;
        font-size: <?php echo $site_font_size;?>px;
        color: var(--text-color);
    }
    
    h1, h2, h3, h4, h5,h6,
    .news-ticker-box span.focus-news-box a{
        font-family: '<?php echo $heading_font;?>',sans-serif;
    }
    h1{
        font-size: <?php echo $heading_font_one;?>px;
    }
    h2{
        font-size: <?php echo $heading_font_two;?>px;
    }
    h3{
        font-size: <?php echo $heading_font_three;?>px;
    }
    h4{
        font-size: <?php echo $heading_font_four;?>px;
    }
    h5{
        font-size: <?php echo $heading_font_five;?>px;
    }
    h6{
        font-size: <?php echo $heading_font_six;?>px;
    }
    .main-navigation ul li a{
        font-family: '<?php echo $heading_font;?>',sans-serif;
        text-transform: uppercase;
    }
    <?php if(walkerpress_set_to_premium() ){?>
        .walkerwp-wraper.inner-page-subheader{
            background:<?php echo $subheader_background_color;?>;
            color: <?php echo $subheader_text_color;?>;
            padding-top: <?php echo $subheader_padding_top;?>px;
            padding-bottom: <?php echo $subheader_padding_bottom;?>px;
        }
    <?php }else {?>
        .walkerwp-wraper.inner-page-subheader{
            background: transparent;
            color: var(--text-color);
            padding-top: <?php echo $subheader_padding_top;?>px;
            padding-bottom: <?php echo $subheader_padding_bottom;?>px;
        }
    <?php } ?>
    .single .walkerwp-wraper.inner-page-subheader.sub-header-2,
    .page .walkerwp-wraper.inner-page-subheader.sub-header-2{
        min-height: <?php echo $subheader_min_height;?>px;
    }
    <?php if(walkerpress_set_to_premium() ){?>
    .walkerwp-wraper.inner-page-subheader a,
    .normal-subheader .walkerpress-breadcrumbs ul li a,
    .normal-subheader .walkerpress-breadcrumbs ul li{
        color: <?php echo $subheader_text_color;?>;
        text-decoration: none;
    }
<?php } else{?>
    .walkerwp-wraper.inner-page-subheader a,
    .normal-subheader .walkerpress-breadcrumbs ul li a,
    .normal-subheader .walkerpress-breadcrumbs ul li{
        color: var(--text-color);
        text-decoration: none;
    }
<?php }?>
    .walkerwp-wraper.inner-page-subheader img{
        opacity:<?php echo $sub_header_bg_opacity;?>;
    }
    .walkerwp-wraper.inner-page-subheader a:hover{
        color: var(--secondary-color);
    }
    .walkerwp-wraper.main-header{
        background:<?php echo $header_bg_color;?>;
    }
    .walkerwp-wraper.main-header img.header-overlay-image{
        opacity:<?php echo $header_bg_opacity;?> ;
    }
    .site-branding img.custom-logo{
        max-height: <?php echo $brand_logo_size;?>px;
        width: auto;
        max-width: 100%;
        height: 100%;
    }
    .site-branding h1.site-title{
        font-size: <?php echo $brand_logo_size;?>px;
    }
    .site-branding h1.site-title a{
        color: <?php echo $brand_name_color; ?>;
        text-decoration: none;
    }
    .site-branding .site-description,
    .site-branding,
    header.header-layout-3 span.walkerpress-current-date {
        color: <?php echo $brand_section_text_color;?>;
    }
    a.walkerpress-post-date, .entry-meta a, .entry-meta, .news-ticker-box span.focus-news-box a.walkerpress-post-date,
    .single  span.category a, .single .article-inner span.category a{
        color: <?php echo $meta_color;?>;
        font-size: <?php echo $meta_font_size;?>px;
        font-weight: initial;
    }
    span.estimate-time, span.estimate-reading-time{
        font-size: <?php echo $meta_font_size;?>px;
    }
    span.category a{
        color: <?php echo $category_color;?>;
        text-transform: <?php echo esc_attr($post_category_text_transform);?>;
        font-weight: <?php echo esc_attr($post_cat_font_weight);?>;
    }
    footer.site-footer{
        background: <?php echo $footer_bg_color;?>;
        color: <?php echo $footer_text_color;?>;
    }
     footer.site-footer .wp-block-latest-posts__post-author, 
     footer.site-footer .wp-block-latest-posts__post-date,
     .footer-wiget-list .sidebar-widget-block{
        color: <?php echo $footer_text_color;?>;
    }
   .site-footer .walkerpress-footer-column .wp-block-latest-posts a, 
   .site-footer .walkerpress-footer-column .widget ul li a, 
   .site-footer .wp-block-tag-cloud a, 
   .site-footer  .sidebar-block section.widget ul li a,
   .footer-wiget-list .sidebar-widget-block a{
        color:<?php echo $footer_link_color;?>;
    }
    .site-footer .site-info a,
     .site-footer .site-info{
        color: <?php echo $copyright_text_color;?>;
    }
    .site-footer .site-info a:hover{
        color: <?php echo $secondary_color?>;
    }
    .site-footer .walkerpress-footer-column .wp-block-latest-posts a:hover, 
   .site-footer .walkerpress-footer-column .widget ul li a:hover, 
   .site-footer .wp-block-tag-cloud a:hover, 
   .site-footer .site-info a:hover,
   .site-footer  .sidebar-block section.widget ul li a:hover,
   .footer-wiget-list .sidebar-widget-block a:hover{
        color:<?php echo $footer_link_hover_color;?>;
    }
    .footer-overlay-image{
        opacity:<?php echo $footer_bg_opacity;?>;
    }
    .footer-copyright-wraper:before{
        background: <?php echo $copyright_bg_color;?>;
        opacity: <?php echo $copyright_bg_opacity;?>;
    }
    .walkerwp-wraper.footer-copyright-wraper{
        padding-top: <?php echo $copyright_top_space;?>px;
        padding-bottom: <?php echo $copyright_bottom_space;?>px;
    }
    .banner-layout-1 .walkerwp-grid-3,
    .featured-post-box,
    .category-post-wraper .category-post-box,
    .category-post-wraper .category-post-2 .category-post-content,
    .frontpage-content-block .walkerpress-widget-content,
    .sidebar-widget-block,
    .walkerwp-wraper.inner-wraper main#primary .content-layout.list-layout article,
    .sidebar-block section.widget,
    .missed-post-box,
    .walkerwp-wraper.banner-layout ul.tabs li.active,
    .single article,
    .page article,
    .single .comments-area,
    .related-posts,
    ul.tabs li.active:after,
    .walkerwp-wraper.inner-wraper main#primary .content-layout.grid-layout article,
    .walkerwp-wraper.inner-wraper main#primary .content-layout.full-layout article,
    .ticker-layout-2 .news-ticker-box span.focus-news-box,
    .ticker-arrows,
    .news-ticker-box,
    .wc-author-box,
    .frontpage-sidebar-block .walkerpress-widget-content,
    main#primary section.no-results.not-found,
    .search.search-results main#primary article,
    section.error-404.not-found {
        background: <?php echo $box_background_color;?>;
        
    }
    .featured-post-box,
    .category-post-wraper .category-post-box,
    .category-post-wraper .category-post-2 .category-post-content,
    .frontpage-content-block .walkerpress-widget-content,
    .sidebar-widget-block,
    .walkerwp-wraper.inner-wraper main#primary .content-layout.list-layout article,
    .sidebar-block section.widget,
    .missed-post-box,
    .single article,
    .page article,
    .single .comments-area,
    .related-posts,
    .walkerwp-wraper.inner-wraper main#primary .content-layout.grid-layout article,
    .walkerwp-wraper.inner-wraper main#primary .content-layout.full-layout article,
    .ticker-layout-2 .news-ticker-box span.focus-news-box,
    .news-ticker-box,
    .wc-author-box,
    .frontpage-sidebar-block .walkerpress-widget-content,
    main#primary section.no-results.not-found,
    .search.search-results main#primary article,
    section.error-404.not-found {
        border: <?php echo $box_border_size; ?>px solid <?php echo $box_border_color;?>;
    }
    .sidebar-panel .sidebar-widget-block {
        border: 0;
    }
    ul.walkerpress-social.icons-custom-color.normal-style li a{
        color: <?php echo $social_icon_color;?>;
    }
    ul.walkerpress-social.icons-custom-color.normal-style li a:hover{
        color: <?php echo $social_icon_hover_color;?>;
    }
    ul.walkerpress-social.icons-custom-color.boxed-style li a{
        background: <?php echo $social_icon_background;?>;
        color: <?php echo $social_icon_color;?>;
    }
    ul.walkerpress-social.icons-custom-color.boxed-style li a:hover{
        background: <?php echo $social_icon_background_hover;?>;
        color: <?php echo $social_icon_hover_color;?>;
    }
    .walkerwp-container{
        max-width: <?php echo $main_container_width;?>px;
    }
    header#masthead.header-layout-4 .walkerwp-container,
    .walkerwp-wraper.main-header{
        padding-top: <?php echo $header_top_space;?>px;
        padding-bottom: <?php echo $header_bottom_space;?>px;
    }
    .walkerwp-wraper.navigation{
        background: <?php echo $main_menu_primary_color;?>;
    }
    
    .main-navigation ul li a,
    .main-navigation ul ul li a:hover, .main-navigation ul ul li a:focus{
         color: <?php echo $main_menu_text_color;?>;
          background: <?php echo $main_menu_primary_color;?>;
    }
    .main-navigation ul li:hover a,
    .main-navigation ul li.current-menu-item a{
        background: <?php echo $main_menu_secondary_color;?>;
        color: <?php echo $main_menu_text_hover_color;?>;
    }
    .main-navigation ul ul li a:hover, 
    .main-navigation ul ul li a:focus,{
         background: <?php echo $main_menu_primary_color;?>;
         color: <?php echo $main_menu_text_hover_color;?>;
    }
    .sidebar-slide-button .slide-button,
    button.global-search-icon{
        color: <?php echo $main_menu_text_color;?>;
    }
    .sidebar-slide-button .slide-button:hover,
    button.global-search-icon:hover{
        color: <?php echo $main_menu_secondary_color;?>;
    }
    .walkerwp-wraper.top-header{
        background: <?php echo $topbar_bg_color;?>;
        color: <?php echo $topbar_text_color;?>;
    }
    .sidebar-block,
    .frontpage-sidebar-block{
        width: <?php echo $sidebar_width;?>%;
    }
    .walkerwp-wraper.inner-wraper main#primary,
    .frontpage-content-block{
        width: <?php echo $primary_content_width;?>%;
    }
    .footer-widgets-wraper{
        padding-bottom: <?php echo $footer_bottom_space;?>px;
        padding-top: <?php echo $footer_top_space;?>px;
    }
    .walkerpress-footer-column:before{
        background: <?php echo $footer_box_bg;?>;
        opacity: <?php echo $footer_box_opacity;?> ;
    }
    a.walkerpress-primary-button,
    .walkerpress-primary-button
    a.walkerpress-secondary-button,
    .walkerpress-secondary-button{
        border-radius: <?php echo esc_attr($button_radius);?>px;
        text-transform: <?php echo esc_attr($button_text_transform);?>;
        font-size: <?php echo esc_attr($button_font_size);?>px;
    }
    @media(max-width:1024px){
        .sidebar-block,
        .walkerwp-wraper.inner-wraper main#primary,
        .frontpage-sidebar-block,
        .frontpage-content-block {
            width:100%;
        }
    }
</style>